@extends('admin.layout.main_layout') @section('content')


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh sách quán bạn quản lí</h1>
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
	  		<th width="20%">Ngày tạo</th>
	  		<th width="20%">Cập nhật lần cuối</th>
	  		<th width="15%">Cập nhật</th>
	  		<th width="5%">Xóa</th>
	  	</tr>
	</thead>
	<tbody>
	@foreach($places as $place)
		<tr id="p-{{$place->id}}">
			<td>{{$place->name}}</td>
			<td>{{$place->created_at}}</td>
			<td>{{$place->updated_at}}</td>
			<td><a href="{{URL::route('ad_update_store', array($place->id))}}" class="btn btn-default">Cập nhật</a></td>
			<td><a href="javascript:deletePlace('{{$place->id}}')" class="btn btn-default">Xóa</a></td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
