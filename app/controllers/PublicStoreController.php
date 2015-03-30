<?php 
class PublicStoreController extends BaseController {
    
	public function index(){
		$places = null;
		if(isset($_GET['ten-quan']) && $_GET['ten-quan'] != ""){
			$result = array();
			$allPlaces = Place::all();
			$keySearch = CfHelper::utf8ToAscii($_GET['ten-quan']);
			foreach ($allPlaces as $key => $place) {
				if( ($s = CfHelper::similarity(CfHelper::utf8ToAscii($place->name), $keySearch)) > 0.5)
					$result[$key] = $s;
			}
			if(!empty($result)){
				arsort($result);
				$places = array();
				foreach ($result as $key => $place) {
					$places[] = $allPlaces[$key];
				}
				$data['paginate'] = false;
				//$places = array_keys($result);
				//$places = Place::whereIn('id', $result)->paginate(20);
			
			}
			

		} else {
			$places = Place::paginate(20);
			$places->setBaseUrl('/Cafevn/ajax/tim-kiem');
			$data['paginate'] = true;
		}
		
		$data['places'] = $places;
		$data['services'] = Service::all();
		$data['purports'] = Purport::all();
		$data['provinces'] = Province::all();
		$data['title'] = "Tìm kiếm quán cafe";
	    return View::make("public.store.index",$data);
	}
	
	public function detail($id){
		$data['place'] = Place::find($id);
		$data['services'] = Service::all();
		$data['purports'] = Purport::all();
		$purports_sps = PlacePurport::where('place_id','=',$id)->get(array('purport_id'))->toArray();
		$service_sps = PlaceService::where('place_id','=',$id)->get(array('service_id'))->toArray();
		foreach ($purports_sps as $purports_sp){
			$data['purport_sps'][] = $purports_sp['purport_id'];
		}
		
		foreach ($service_sps as $service_sp){
			$data['service_sps'][] = $service_sp['service_id'];
		}
		$data['title'] = $data['place']->name;
		return View::make("public.store.detail",$data);
	}
	
	public function map($id){
		$data['place'] = Place::find($id);
		$data['title'] = "Bản đồ | ".$data['place']->name;
		return View::make("public.store.map",$data);
	}
	
}
?>