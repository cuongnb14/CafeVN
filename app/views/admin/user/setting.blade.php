@extends('admin.layout.main_layout') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thiết lập tài khoản</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Thông tin tài khoản</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="{{URL::route('ad_post_user_setting')}}">
	    <div class="row cf-input">
	    	<label>Tên tài khoản: </label><input id="username" disabled type="text" class="form-control input-sm" value="{{$user->username}}">
	    </div>

	    <div class="row cf-input">
	    	<a class="btn btn-default">Hủy bỏ</a>
	    	<button class="btn btn-default" type="submit">Tạo quán</button>
	    </div>

	</form>

  </div>
</div>

@stop
