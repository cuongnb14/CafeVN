@extends('admin.layout.main_layout') @section('content')


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tất cả quán</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div id="notification">
	
</div>
<table class="table table-striped">
	<thead>
		<tr>
	  		<th >Tên quán</th>
	  		<th width="20%">Id Chủ quán</th>
	  		<th width="20%">ID Chủ quán mới</th>
	  		<th width="15%">Cập nhật</th>
	  	</tr>
	</thead>
	<tbody>
	@foreach($places as $place)
		<tr id="p-{{$place->id}}">
			<td>{{$place->name}}</td>
			<td>{{$place->user_id}}</td>
			<td><input id="new-{{$place->id}}" name="user_id" type="number" class="form-control input-sm" ></td>
			<td><a href="javascript:changeUser({{$place->id}})" class="btn btn-default">Cập nhật</a></td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
