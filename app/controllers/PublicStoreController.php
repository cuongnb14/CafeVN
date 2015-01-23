<?php 
class PublicStoreController extends BaseController {
    
	public function index(){
		$places = Place::paginate(20);
		$places->setBaseUrl('/Cafevn/ajax/tim-kiem');
		$data['places'] = $places;
		$data['services'] = Service::all();
		$data['purports'] = Purport::all();
		$data['provinces'] = Province::all();
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

		return View::make("public.store.detail",$data);
	}
}
?>