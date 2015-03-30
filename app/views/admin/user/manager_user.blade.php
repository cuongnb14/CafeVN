@extends('admin.layout.main_layout') @section('content')


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tất cả người dùng</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div id="notification">

</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th >Username</th>
        <th width="15%">Tên đầy đủ</th>
        <th width="15%">Số điện thoại</th>
        <th width="15%">Email</th>
        <th width="5%">Nhóm</th>
        <th width="25%">Ngày tạo</th>
        <th width="5%">Xóa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr id="p-{{$user->id}}">
        <td>{{$user->username}}</td>
        <td>{{$user->fullname}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->group_id}}</td>
        <td>{{$user->created_at}}</td>
        <td><a href="javascript:deleteUser({{$user->id}})" class="btn btn-default">Xóa</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop
