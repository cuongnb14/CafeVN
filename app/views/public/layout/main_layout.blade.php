<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<meta charset='utf-8'>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{Asset('public/assets/css/bootstrap.min.css')}}">

	<!-- Optional theme -->
	<link rel="stylesheet" href="{{Asset('public/assets/css/comos-theme.css')}}">
	<!-- font-awesome -->
	<link rel="stylesheet" href="{{Asset('public/assets/css/font-awesome.css')}}">
	<!-- Custom css -->
	<link rel="stylesheet" href="{{Asset('public/assets/css/custom.css')}}">
	<!-- jquery -->
	<script src="{{Asset('public/assets/js/jquery-2.1.3.min.js')}}"></script>
</head>
<body>
	<div class="wrapper">
		<div class="page container-fluid">
			<div class="header-container"> 
				<div class="top-line clearfix">
					<ul class="pull-right list-inline list-unstyled"> 
						<li><a href="">Liên hệ</a></li>
						<li><a href="">Thông tin</a></li> 
						<li><a href="{{URL::route('ad_register')}}">Đăng kí</a></li> 
					</ul>
				</div>
				<div class="header container-fluid">
					<div id="logo" class="col-md-4">
						<a href="{{URL::route('home')}}" ><img alt="Cafe Garden" src="{{asset('/public/assets/images/logo.png')}}" /></a>
					</div>
					<div class="search-box col-md-8">
                        <form action="{{URL::route('quan_cafes')}}" method="get">
                            <input type="text" name="ten-quan" class="finput" placeholder=" Tên quán">
                           <!--  <input type="text" name="" class="finput" placeholder=" Địa điểm"> -->
                            <button type="submit" class="btn btn-info">Tìm kiếm</button>
                        </form>
                    </div>
				</div>
				<!-- End .header -->
				
			</div>
			<!-- End .header-container -->
			
			
			<!-- ************Start content  ***********************-->
				@yield('content')
			<!-- ************Start content  ***********************-->
			
			
			<div class="footer">
				<div>
					<h4>CafeGarden</h4>
					Design by bacuong, 2014

				</div>
				
			</div>
		</div>
		<!-- End .page -->
	</div>
	<!-- End .wrapper -->

	
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{Asset('public/assets/js/bootstrap.min.js')}}"></script>
	<!-- Custom js -->
	<script src="{{Asset('public/assets/js/custom.js')}}"></script>
</body>


</html>