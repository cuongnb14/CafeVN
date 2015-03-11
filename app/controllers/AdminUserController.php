<?php 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class AdminUserController extends BaseController {
    
	public function setting(){
		$data['user'] = Session::get('user');
	    return View::make("admin.user.setting",$data);
	}

	public function postSetting(){
		Session::get('user')->fullname = Input::get('fullname');
		
		if(Session::get('user')->password == md5(Input::get('old-pass'))){
		    if(Input::get('new-pass') == Input::get('confim-new-pass')){
		        Session::get('user')->password = md5(Input::get('new-pass'));
		    }
		}
		Session::get('user')->phone = Input::get('phone');
		Session::get('user')->email = Input::get('email');
		Session::get('user')->save();
		return Redirect::route('ad_user_setting')->with('alert',"Cập nhật thành công");
	}

}
?>