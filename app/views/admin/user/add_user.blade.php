@extends('admin.layout.main_layout') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thêm tài khoản mới</h1>
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
		<form method="post" action="{{URL::route('sad_post_add_user')}}">
			<div class="row cf-input">
				<label>Tên tài khoản: </label><input id="username" name="username" 
					type="text" class="form-control input-sm" >
			</div>
			<div class="row cf-input">
				<label>Mật khẩu: </label><input name="password" type="password"
					class="form-control input-sm">
			</div>

			<div class="row cf-input">
				<label>Tên hiển thị: </label><input name="fullname" id="fullname" type="text"
					class="form-control input-sm" >
			</div>
			<div class="row cf-input">
				<label>Điện thoại: </label><input name="phone" id="phone" type="number"
					class="form-control input-sm" >
			</div>
			<div class="row cf-input">
				<label>Email: </label><input name="email" id="email" type="email"
					class="form-control input-sm" >
			</div>

			<div class="row cf-input">
				<label>Nhóm: </label>
				<select name="group_id" class="form-control input-sm">
					<option value="1">administrator</option>
					<option value="2">chủ quán</option>
				</select>
			</div>

			<div class="row cf-input">
				<a href="{{URL::route('ad_index')}}" class="btn btn-default">Hủy bỏ</a>
				<button class="btn btn-default" type="submit">Thêm</button>
			</div>

		</form>

	</div>
</div>

@stop
