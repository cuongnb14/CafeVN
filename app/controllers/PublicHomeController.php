<?php 
class PublicHomeController extends BaseController {
    
	public function index(){
		$places = Place::paginate(6);
		$data['services'] = Service::all();
		$data['purports'] = Purport::all();
		$data['provinces'] = Province::all();
		$data['places'] = $places;
		$data['title'] = "Trang chủ | Cafe Garden";
	    return View::make("public.home.index",$data);
	}
}
?>