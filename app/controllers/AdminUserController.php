<?php 
class AdminUserController extends BaseController {
    
	public function setting(){
		$data['user'] = Session::get('user');
	    return View::make("admin.user.setting",$data);
	}

	public function postSetting(){
		
	}

}
?>