@extends("public.layout.main_layout") @section('content')
<div class="slide col-md-12">
		<!-- Start WOWSlider.com -->
		<iframe src="{{URL::route('slide')}}" style="width:1500px;height:480px;max-width:100%;max-height:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0" scrolling="no"></iframe>
		<!-- End WOWSlider.com -->
	</div>
<div class="content-container container-fluid">

	
	
	<div class="main-content col-md-9">
		<div class="box">
			<h3 class="box-title">Quán mới cập nhật</h3>
			<div class="box-body">

				@if($places != null)
					@foreach($places as $place)
					<div class="place col-md-6">
						<div class="thumnail col-md-4">
							<a href="{{URL::route('quan_cafe',$place->id)}}"><img src="{{asset('/public/assets/mutidata/avatar_cafe/cf-'.$place->id.'.jpg')}}" width="100%" height="100%"></a>
						</div>
						<div class="description col-md-8">
							<h3 class="name-place">
								<a class="link_name" href="{{URL::route('quan_cafe',$place->id)}}">{{$place->name}}</a> <a href="{{URL::route('quan_cafe_map',array($place->id))}}" class="link_map"><i class="fa fa-map-marker"></i></a>
							</h3>
							<p class="address">{{CfHelper::getAddress($place->id)}}</p>
							<p class="info">{{CfHelper::cutString($place->introduce,100)}}</p>
						</div>
					</div>
					@endforeach
				@else
					<p>Không tìm thấy quán nào!</p>
				@endif
				

			</div>
		</div>
	</div>
	
	
	<div class="col-md-3 meta-sidebar">
	
		<div class="panel panel-default">
			<div class="panel-heading">Thông tin liên hệ</div>
			<div class="panel-body">
				<ul>
					<li>Số điện thoại: 0164868686</li>
				</ul>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">Đăng kí tài khoản</div>
			<div class="panel-body">
				<p>
					Đăng kí tài khoản miễn phí và tạo trang quảng bá quán cafe của bạn để nhiều người biết hơn
				</p>
				<p>
					<a href="{{URL::route('ad_register')}}">Đăng kí</a>
				</p>
			</div>
		</div>

	</div>

</div>
<!-- End .content-container -->
@stop
