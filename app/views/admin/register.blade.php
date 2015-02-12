<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng kí tài khoản</title>

    <!-- Bootstrap Core CSS -->
	<link href="{{asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	
    <!-- MetisMenu CSS -->
	<link href="{{asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">
	
    <!-- Custom CSS -->
	<link href="{{asset('public/assets/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">
	
	<!-- My Custom CSS -->
	<link href="{{asset('public/assets/admin/css/custom.css')}}" rel="stylesheet">
	
    <!-- Custom Fonts -->
	<link href="{{asset('public/assets/admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng kí tài khoản</h3>
                    </div>
                    <div class="panel-body">
                        <form id="form-login" role="form" method="post" action="{{URL::route('post_register')}}">
                            <fieldset>
                            	<div class="form-group">
                                    <input class="form-control" placeholder="Tên đầy đủ" id="fullname" name="fullname" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên tài khoản" id="username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" id="password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Xác nhận lại mật khẩu " id="password_confirm" name="password_confirm" type="password" value="">
                                </div>                    
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" id="email" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Số điện thoại" id="phone" name="phone" type="number">
                                </div>
                                @if(Session::has("error"))
                                	<div class="alert alert-danger">
		                                {{Session::get("error")}}
		                            </div>
                                @endif
                                
           
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block"  value="Đăng nhập" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
	<script src="{{asset('public/assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
	<script src="{{asset('public/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
	<script src="{{asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
	<script src="{{asset('public/assets/admin/dist/js/sb-admin-2.js')}}"></script>
	 <!-- jQuery Validateion -->
	<script src="{{asset('public/assets/js/jquery_validation/jquery.validate.min.js')}}"></script>
	
	<script type="text/javascript">
		$('#form-login').validate({
			rules: {
				fullname: {
					required: true,
				},
				username: {
					required: true,
					minlength: 6
				},
				password: {
					required: true,
					minlength: 6
				},
				password_confirm: {
					required: true,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				fullname: {
					required: "Vui lòng nhập tên của bạn",
				},
				username: {
					required: "Vui lòng nhập tên người dùng bạn muốn sử dụng",
					minlength: "Tên người dùng phải có ít nhất 6 kí tự "
				},
				password: {
					required: "Vui lòng nhập mật khẩu bạn muốn sử dụng",
					minlength: "Mật khẩu phải có ít nhất 6 kí tự "
				},
				password_confirm: {
					required: "Vui lòng nhập lại mật khẩu của bạn",
					minlength: "Mật khẩu phải có ít nhất 6 kí tự "
				},
				email: {
					required: "Vui lòng nhập email của bạn",
					email: "Địa chỉ email không đúng"
				}
			}
				
		})
	</script>
</body>

</html>