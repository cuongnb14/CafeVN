<?php
class User extends Eloquent{

	protected $table = 'users';
	/**
	 * Kiểm tra đăng nhập với username và password
	 * @param string $username
	 * @param string $password
	 * @return boolean
	 */
	public static function checkLogin($username, $password){
		$password = md5($password);
		$flag = User::where("username","=",$username)->where("password","=",$password)->count();
		if($flag > 0) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * Kiểm tra username đã tồn tại hay chưa?
	 * @param string $username
	 * @return boolean
	 */
	public static function isAvalibleUser($username){
		if(User::where("username","=",$username)->count()>0)
			return true;
		else 
			return false;
	}
}