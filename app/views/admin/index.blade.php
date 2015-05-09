@extends('admin.layout.main_layout') @section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-coffee fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">26</div>

					</div>
				</div>
			</div>
			<a href="{{URL::route('ad_list_store')}}">
				<div class="panel-footer">
					<span class="pull-left">Xem danh sách quán</span> <span
						class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-plus fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>Thêm quán mới</div>
					</div>
				</div>
			</div>
			<a href="{{URL::route('ad_store_add')}}">
				<div class="panel-footer">
					<span class="pull-left">Tạo quán mới</span> <span
						class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
</div>
<!-- /.row -->

@stop
