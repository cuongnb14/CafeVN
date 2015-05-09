<?php 
class PublicHomeController extends BaseController {
    
	public function index(){
		$places = Place::orderBy('updated_at','desc')->take(10)->get();
		$data['services'] = Service::all();
		$data['purports'] = Purport::all();
		$data['provinces'] = Province::all();
		$data['places'] = $places;
		$data['title'] = "Trang chủ | Cafe Garden";
	    return View::make("public.home.index",$data);
	}
}
?>