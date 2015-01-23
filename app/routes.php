<?php

use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'PublicHomeController@index'));

Route::get('/slide',array('as' => 'slide', function(){
	return View::make("public.layout.slide");
}));

Route::get('/quan-cafe', array('as' => 'quan_cafe', 'uses' => 'PublicStoreController@index'));

Route::get('/quan-cafe/{id}', array('as' => 'quan_cafe', 'uses' => 'PublicStoreController@detail'));

Route::group(array('prefix' => 'ajax'), function(){
	Route::post('/tim-kiem', function(){
		$places = new Place;
		if (Input::has('districts') && count(Input::get('districts') > 0)){
			$districts = Input::get('districts');
			$places = $places->whereIn('district_id',$districts);
		}
		
		if (Input::has('services') && !empty(Input::get('services'))){
			$services = Input::get('services');
			foreach ($services as $service){
				$places = $places->whereHas('services', function($q) use ($service){
						$q->where('service_id', '=', $service);
				});
			}
		}
		
		if (Input::has('purports') && !empty(Input::get('purports'))){
			$purports = Input::get('purports');
			foreach ($purports as $purport){
				$places = $places->whereHas('purports', function($q) use ($purport){
						$q->where('purport_id', '=', $purport);
				});
			}	
		}
		$places = $places->paginate(20);
		$data['places'] = $places;
		return View::make('public.store.ajax_tim_kiem',$data);
	});
	
	Route::post('/quan-huyen', function(){
		$province_id = Input::get('province_id');
		$districts = $districts = Province::find($province_id)->districts;
		$data['districts'] = $districts;
		return View::make('public.store.ajax_quan_huyen',$data);
	});
	
});

Route::get('/test', function(){
		$places = new Place;
	
			$districts = array(1);
			$places = $places->whereIn('district_id',array('1'));
	
		
		$places = $places->get()->toArray();
		dd($places);
});

Route::filter('addAsset', function(){
	echo '<meta charset="UTF-8">';
    require app_path().'/assets/simple_html_dom.php';
	define("BASEURL", "http://www.quancafe.vn");
	
});

Route::group(array('before' => 'addAsset','prefix' => 'crawler'), function(){

    Route::get('/services', function(){
        $xhtml = file_get_html(asset('public/assets/sc.html'));

		foreach ($xhtml->find('#listbranch div.itemcf div.bgimg a') as  $link) {
			$xplace = file_get_html(BASEURL.$link->attr['href']);
			foreach ($xplace->find('.ultisize',0)->find('.services') as $name) {
				$name = trim(html_entity_decode($name->plaintext));
				echo $name;
				br();
				$isAvalible = Service::where('name', '=', $name)->count();
				if(!$isAvalible){
					DB::table('services')->insert(array('name' => $name));
				}
			}
			echo "Crawler done!";
			break;
		}
	
    });

    Route::get('/provinces', function(){
        $xhtml = file_get_html('http://www.quancafe.vn/tim-quan-cafe?k=&pro=&dist=&street=&a=&ser=&cate=&pur=&rad=&type=1');
        $i=-1;
		foreach ($xhtml->find('#txtProvince option') as  $province) {
			$i++;
			prln($province->attr['code'].": ".$province->plaintext);
			if($i==0) continue;

			$pro = new Province;
			$pro->name =  html_entity_decode(trim($province->plaintext));
			$pro->save();
			$xdistric = file_get_html('http://www.quancafe.vn/tim-quan-cafe?k=&pro='.$province->attr['code'].'&dist=&street=&a=&ser=&cate=&pur=&rad=&type=1');
			
			foreach ($xdistric->find('#listdist .titleqh') as  $dist){
				$distr = new District;
				$distr->name = html_entity_decode(trim($dist->plaintext));
				$distr->province_id = $pro->id;
				$distr->save();
			}
		
			
		}
		echo "Crawler done!";
    });

    Route::get('/purports', function(){
        $xhtml = file_get_html(asset('public/assets/sc.html'));

		foreach ($xhtml->find('#listbranch div.itemcf div.bgimg a') as  $link) {
			$xplace = file_get_html(BASEURL.$link->attr['href']);
			foreach ($xplace->find('.ultisize',1)->find('.services') as $name) {
				$name = trim(html_entity_decode($name->plaintext));
				echo $name;
				br();
				$isAvalible = Purport::where('name', '=', $name)->count();
				if(!$isAvalible){
					DB::table('purports')->insert(array('name' => $name));
				}
			}
			echo "Crawler done!";
			break;
		}
    });

    Route::get('/places', function(){
    	function GetImageFromUrl($link){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, 0);
			curl_setopt($ch,CURLOPT_URL,$link);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$result=curl_exec($ch);
			curl_close($ch);
			return $result;
		}
	
	
			
		$xhtml = file_get_html(asset('public/assets/sc5.html'));
		foreach ($xhtml->find('#listbranch div.itemcf div.bgimg a') as  $link) {
			
			
			try {
				$xplace = file_get_html(BASEURL.$link->attr['href']);
				$name = trim(html_entity_decode($xplace->find('h1',0)->plaintext));
				$isAvalible = Place::where('name', '=', $name)->count();
				if($isAvalible) continue;
				$place = new Place;
				$place->name = $name;

				$strScript = $xplace->find('body script',8)->innertext;
				preg_match('#myLat\s*=\s*(.*);#imsU', $strScript, $arrMatch);
				$place->latitude = $arrMatch[1];
				preg_match('#myLng\s*=\s*(.*);#imsU', $strScript, $arrMatch);
				$place->longitude = $arrMatch[1];

				$place->street_address = $xplace->find('.logoct',0)->find('span[itemprop=street-address]',0)->plaintext;
				$locality = html_entity_decode(trim($xplace->find('.logoct',0)->find('span[itemprop=locality]',0)->plaintext));
				$locality = substr($locality, 1);
				$pieces = explode(",", $locality);
		
				$district_id = District::getIdWith(trim($pieces[0]),trim($pieces[1]));



				$place->district_id = $district_id;
				$region = trim($xplace->find('.logoct',0)->find('span[itemprop=region]',0)->plaintext);
				$region = substr($region, 1);
				$place->region_address = $region;
				
				$place->introduce = $xplace->find('.overview',0)->plaintext;

				$place->save();
				
				$img = $link->find('img');
				$contents=GetImageFromUrl($img[0]->attr['src']);
				$savefile = fopen('public/assets/mutidata/avatar_cafe/cf-'.$place->id.'.jpg', 'w');
				fwrite($savefile, $contents);
				fclose($savefile);

				$idLast = $place->id;
				
				$idService = 1;
				foreach ($xplace->find('.ultisize',0)->find('.services') as $service) {
					if(!empty($service->find('span.checkBox_checked'))){
						$ps = new PlaceService;
						$ps->place_id = $idLast;
						$ps->service_id = $idService;
						$ps->save();
					}
					$idService++;
				}

				$idPurport = 1;
				foreach ($xplace->find('.ultisize',1)->find('.services') as $purport) {
					if(!empty($purport->find('span.checkBox_checked'))){
						$pp = new PlacePurport;
						$pp->place_id = $idLast;
						$pp->purport_id = $idPurport;
						$pp->save();
					}
					$idPurport++;
				}
			} catch(exception $e){
				prln("Error: ".$e->getMessage());
			}
			
		} //End foreach
			
		
		echo "Crawler done!";
    });


});
