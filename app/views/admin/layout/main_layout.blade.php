<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Admin</title>

<!-- Bootstrap Core CSS -->
<link
	href="{{asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"
	rel="stylesheet">

<!-- MetisMenu CSS -->
<link
	href="{{asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}"
	rel="stylesheet">

<!-- Timeline CSS -->
<link
	href="{{asset('public/assets/admin/bower_components/metisMenu/dist/css/timeline.css')}}"
	rel="stylesheet">

<!-- Custom CSS -->
<link href="{{asset('public/assets/admin/dist/css/sb-admin-2.css')}}"
	rel="stylesheet">

<!-- Morris Charts CSS -->
<link
	href="{{asset('public/assets/admin/bower_components/morrisjs/morris.css')}}"
	rel="stylesheet">
<!-- Custom Fonts -->
<link
	href="{{asset('public/assets/admin/bower_components/font-awesome/css/font-awesome.min.css')}}"
	rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Custom css -->
<link href="{{asset('public/assets/admin/css/custom.css')}}"
	rel="stylesheet">

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Cafe Graden</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i>
						{{Session::get('user')->fullname}} <i class="fa fa-caret-down"></i>
				</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="{{URL::route('ad_user_setting')}}"><i
								class="fa fa-user fa-fw"></i> Thiết lập tài khoản</a></li>
						<li class="divider"></li>
						<li><a href="{{URL::route('ad_logout')}}"><i
								class="fa fa-sign-out fa-fw"></i>Đăng xuất</a></li>
					</ul> <!-- /.dropdown-user --></li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div> <!-- /input-group -->
						</li>
						<li><a href="{{URL::route('ad_index')}}"><i class="fa fa-dashboard fa-fw"></i>
								Dashboard</a></li>
								<li><a href="{{URL::route('ad_user_setting')}}"><i class="fa fa-user fa-fw"></i>Thiết lập tài khoản</a></li>
						<li><a href="#"><i class="fa fa-coffee"></i> Quán Cafe<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="{{URL::route('ad_list_store')}}"><i
										class="fa fa-list"></i> Quán của bạn</a></li>
								<li><a href="{{URL::route('ad_store_add')}}"><i
										class="fa fa-plus-circle"></i> Thêm quán mới</a></li>
							</ul> <!-- /.nav-second-level --></li>

						

                        <li><a href="{{URL::route('sad_manager_user')}}"><i class="fa fa-edit"></i> Quản lí người dùng<span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{URL::route('sad_manager_user')}}"><i
                                            class="fa fa-list"></i> Tất cả người dùng</a></li>
                                <li><a href="{{URL::route('sad_add_user')}}"><i
                                            class="fa fa-plus-circle"></i> Thêm tài khoản mới</a></li>
                                <li><a href="{{URL::route('sad_change_padrones')}}"><i
                                            class="fa fa-arrows-h"></i> Chuyển quyền sở hữu quán</a></li>
                            </ul> <!-- /.nav-second-level --></li>
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">@yield('content')</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script
		src="{{asset('public/assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

	<!-- Bootstrap Core JavaScript -->
	<script
		src="{{asset('public/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script
		src="{{asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

	<!-- Morris Charts JavaScript -->
	<script
		src="{{asset('public/assets/admin/bower_components/raphael/raphael-min.js')}}"></script>
	<script
		src="{{asset('public/assets/admin/bower_components/morrisjs/morris.min.js')}}"></script>
	<script src="{{asset('public/assets/admin/js/morris-data.js')}}"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{asset('public/assets/admin/dist/js/sb-admin-2.js')}}"></script>
	<!-- Custom JavaScript -->
	<script src="{{asset('public/assets/admin/js/custom.js')}}"></script>
</body>

</html>
