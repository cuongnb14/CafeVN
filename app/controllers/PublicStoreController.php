<?php 
class PublicStoreController extends BaseController {
    
	public function index(){
	    return View::make("public.store.index");
	}
}
?>