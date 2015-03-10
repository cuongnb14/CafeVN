<?php 
class AdminStoreController extends BaseController {
    
	public function index(){
		$user = Session::get('user');
		$places = Place::where('user_id','=',$user->id)->get();
		dd($places->count());
		$data['services'] = Service::all();
		
	 //    return View::make("public.home.index",$data);
	}

	public function listStore(){
		$user = Session::get('user');
		$data['places'] = Place::where('user_id','=',$user->id)->get();
		return View::make("admin.store.list_store", $data);
	}

	public function updateStore($id){
		$data['provinces'] = Province::all();
		$data['place'] = Place::where('id','=',$id)->where('user_id','=',Session::get('user')->id)->first();
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

}
?>