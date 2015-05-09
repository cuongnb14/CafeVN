<?php 
class AdminStoreController extends BaseController {
    
	public function index(){
		$user = Session::get('user');
		$places = Place::where('user_id','=',$user->id)->orderBy('updated_at','desc')->get();
		dd($places->count());
		$data['services'] = Service::all();
		
	 //    return View::make("public.home.index",$data);
	}

	public function listStore(){
		$user = Session::get('user');
		$data['places'] = Place::where('user_id','=',$user->id)->orderBy('updated_at','desc')->get();
		return View::make("admin.store.list_store", $data);
	}

	public function updateStore($id){
	    $data['services'] = Service::all();
	    $data['purports'] = Purport::all();
		$data['provinces'] = Province::all();
		$data['place'] = Place::where('id','=',$id)->where('user_id','=',Session::get('user')->id)->first();
		$data['province_id'] = District::find($data['place']->district_id)->province()->first()->id;
		$data['districts'] = Province::find($data['province_id'])->districts()->get();
		$data['place_services'] = CfHelper::toArrayId($data['place']->services()->get());
		$data['place_purports'] = CfHelper::toArrayId($data['place']->purports()->get());
    
        
		return View::make("admin.store.update", $data);
	}

	public function addStore(){
		$data['services'] = Service::all();
		$data['purports'] = Purport::all();
		$data['provinces'] = Province::all();
		return View::make("admin.store.add", $data);
	}

	public function postAddStore(){
		$place = new Place;
		
		$place->name = Input::get('name');
		$place->latitude = Input::get('lat');
		$place->longitude = Input::get('long');
		$place->street_address =  Input::get('street');
		$place->district_id = Input::get('district');
		$place->region_address =  Input::get('region');
		$place->introduce = Input::get('introduce');
		$place->user_id = Session::get('user')->id;
		$purports = Input::get('purport');
		$services = Input::get('service');
		$place->save();
		
		if($_FILES['icon']['error'] == 0){
		    move_uploaded_file($_FILES["icon"]["tmp_name"],CfHelper::getUrlPlaceIcon() . "cf-".$place->id.".jpg");
		}
		
		foreach ($purports as $purport_id) {
			$place_purport = new PlacePurport;
			$place_purport->place_id = $place->id;
			$place_purport->purport_id = $purport_id;
			$place_purport->save();
		}
		foreach ($services as $service_id) {
			$place_service = new PlaceService;
			$place_service->place_id = $place->id;
			$place_service->service_id = $service_id;
			$place_service->save();
		}
		return Redirect::route("ad_list_store");
	}
	
	public function postUpdateStore(){
	    $place = Place::find(Input::get('id'));
	    if($place->user_id != Session::get('user')->id) 
	        return Redirect::route("ad_list_store");
	    
	    
	    $place->name = Input::get('name');
	    $place->latitude = Input::get('lat');
	    $place->longitude = Input::get('long');
	    $place->street_address =  Input::get('street');
	    $place->district_id = Input::get('district');
	    $place->region_address =  Input::get('region');
	    $place->introduce = Input::get('introduce');
	    $place->user_id = Session::get('user')->id;
	    $purports = Input::get('purport');
	    $services = Input::get('service');
	    $place->save();
	    
	    PlaceService::where('place_id','=',$place->id)->delete();
	    PlacePurport::where('place_id','=',$place->id)->delete();
	    
	    foreach ($purports as $purport_id) {
	        $place_purport = new PlacePurport;
	        $place_purport->place_id = $place->id;
	        $place_purport->purport_id = $purport_id;
	        $place_purport->save();
	    }
	    foreach ($services as $service_id) {
	        $place_service = new PlaceService;
	        $place_service->place_id = $place->id;
	        $place_service->service_id = $service_id;
	        $place_service->save();
	    }

        if(isset($_FILES['icon']) && $_FILES['icon']['error'] == 0){
            echo "doi icon";
            move_uploaded_file($_FILES["icon"]["tmp_name"],CfHelper::getUrlPlaceIcon() . "cf-".$place->id.".jpg");
        }
	    return Redirect::route("ad_list_store");
	}

}
?>