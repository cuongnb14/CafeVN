@extends('admin.layout.main_layout') @section('content')
<script type="text/javascript">
<!--
function changePass(){
	    $("#new-pass").slideToggle();
}
//-->
</script>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thiết lập tài khoản</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@if(Session::has("alert"))
    <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{Session::get("alert")}}
                            </div>
@endif
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Thông tin tài khoản</h3>
	</div>
	<div class="panel-body">
		<form method="post" action="{{URL::route('ad_post_user_setting')}}">
			<div class="row cf-input">
				<label>Tên tài khoản: </label><input id="username" disabled
					type="text" class="form-control input-sm"
					value="{{$user->username}}">
			</div>
			<div class="row cf-input">
				<label>Mật khẩu: </label> <a href="javascript:changePass()">Đổi mật khẩu mới</a>
			</div>

			<div id="new-pass" style="display: none;">
				<div class="row cf-input">
					<label>Mật khẩu cũ: </label><input name="old-pass" id="old-pass" type="password"
						class="form-control input-sm">
				</div>
				<div class="row cf-input">
					<label>Mật khẩu mới: </label><input id="new-pass" name="new-pass" type="password"
						class="form-control input-sm">
				</div>
				<div class="row cf-input">
					<label>Nhập lại mật mới: </label><input id="confim-new-pass" name="confim-new-pass" type="password"
						class="form-control input-sm">
				</div>
			</div>

			<div class="row cf-input">
				<label>Tên hiển thị: </label><input name="fullname" id="fullname" type="text"
					class="form-control input-sm" value="{{$user->fullname}}">
			</div>
			<div class="row cf-input">
				<label>Điện thoại: </label><input name="phone" id="phone" type="number"
					class="form-control input-sm" value="{{$user->phone}}">
			</div>
			<div class="row cf-input">
				<label>Email: </label><input name="email" id="email" type="email"
					class="form-control input-sm" value="{{$user->email}}">
			</div>

			<div class="row cf-input">
				<a href="{{URL::route('ad_index')}}" class="btn btn-default">Hủy bỏ</a>
				<button class="btn btn-default" type="submit">Cập nhật</button>
			</div>

		</form>

	</div>
</div>

@stop
