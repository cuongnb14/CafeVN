<?php 
class PublicHomeController extends BaseController {
    
	public function index(){
	    return View::make("public.home.index");
	}
}
?>