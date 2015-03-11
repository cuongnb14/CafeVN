<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
	<link href="{{asset('public/assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
	
    <!-- MetisMenu CSS -->
	<link href="{{asset('public/assets/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">
	
    <!-- Custom CSS -->
	<link href="{{asset('public/assets/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">
	
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
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form id="form-login" role="form" method="post" action="{{URL::route('post_login')}}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                                </div>
                                @if(Session::has("error"))
                                	<div class="alert alert-danger">
		                                {{Session::get("error")}}
		                            </div>
                                @endif
                                
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
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
				username: {
					required: true,
					minlength: 6
				},
				password: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				username: {
					required: "Vui lòng nhập username"
				}
			}
				
		})
	</script>
</body>

</html>