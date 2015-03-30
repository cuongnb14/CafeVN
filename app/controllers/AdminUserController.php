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
		    } else {
		    	return Redirect::route('ad_user_setting')->with('alert',"Lỗi xác nhận mật khẩu");
		    }
		}
		Session::get('user')->phone = Input::get('phone');
		Session::get('user')->email = Input::get('email');
		Session::get('user')->save();
		return Redirect::route('ad_user_setting')->with('alert',"Cập nhật thành công");
	}

    public function managerUser(){
        $data['users'] = User::all();
       // echo 1;
        return View::make("admin.user.manager_user",$data);
    }

    public function addUser(){
    	return View::make("admin.user.add_user");
    }

    public function postAddUser(){
    	$user = new User;
    	if(User::isAvalibleUser(Input::get('username')))
    		return Redirect::route('sad_add_user')->with('alert',"Lỗi: Tài khoản đã tồn tại");
    	$user->username = Input::get('username');
    	$user->password = md5(Input::get('password'));
    	$user->fullname = Input::get('fullname');
    	$user->phone = Input::get('phone');
    	$user->email = Input::get('email');
    	$user->group_id = Input::get('group_id');
    	$user->save();
    	return Redirect::route('sad_add_user')->with('alert',"Thêm tài khoản mới thành công");
    }

}
?>