@extends("public.layout.main_layout") @section('content')
<div class="content-container container-fluid">

	<div class="slide col-md-9">
		<!-- Start WOWSlider.com -->
		<iframe src="{{URL::route('slide')}}"
			style="width: 720px; height: 360px; max-width: 100%; overflow: hidden; border: none; padding: 0; margin: 0 auto; display: block;"
			marginheight="0" marginwidth="0" scrolling="no"></iframe>
		<!-- End WOWSlider.com -->
	</div>
	<div class="btn-container col-md-3">
		<!-- <a href="#" class="btn btn-cf btn-lg"><i class="fa fa-list"></i> Map Google</a>
					<a href="#" class="btn btn-cf btn-lg"><i class="fa fa-list"></i> Map Google</a>
					<a href="#" class="btn btn-cf btn-lg"><i class="fa fa-list"></i> Map Google</a> -->


		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary cf-btn"
			data-toggle="modal" data-target="#f-service">Tìm theo dịch vụ</button>

		<!-- Modal -->
		<div class="modal fade" id="f-service" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Chọn các dịch vụ bạn
							muốn</h4>
					</div>
					<div class="modal-body container-fluid">


						<!-- A list of checkboxes -->

						<label class="col-md-4"> <input type="checkbox"> Check me out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
						<button type="button" class="btn btn-primary">Tìm kiếm</button>
					</div>
				</div>
			</div>
		</div>



		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary cf-btn"
			data-toggle="modal" data-target="#f-location">Tìm theo tỉnh/thành phố
		</button>

		<!-- Modal -->
		<div class="modal fade" id="f-location" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Chọn các dịch vụ bạn
							muốn</h4>
					</div>
					<div class="modal-body container-fluid">


						<!-- A list of checkboxes -->

						<label class="col-md-4"> <input type="checkbox"> Check me out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label> <label class="col-md-4"> <input type="checkbox"> Check me
							out
						</label>



					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
						<button type="button" class="btn btn-primary">Tìm kiếm</button>
					</div>
				</div>
			</div>
		</div>




	</div>
	<!-- End btn-container -->
	<div class="main-content col-md-12">
		<div class="box">
			<h3 class="box-title">Quan noi bat</h3>
			<div class="box-body">

				<div class="place col-md-6">
					<div class="thumnail col-md-4">
						<img src="images/20.jpg" width="100%" height="100%">
					</div>
					<div class="description col-md-8">
						<h3 class="name-place">
							Ten quan <a href="#"><i class="fa fa-map-marker"></i></a>
						</h3>
						<p class="address">3f Tăng Bạt Hổ, Tp. Đà Lạt, Lâm Đồng, Việt Nam</p>
						<p class="info">Ai đó đã từng nói “Người Mỹ không cần một sản phẩm
							khác, người Mỹ cần một câu chuyện khác”. Trong thời điểm ngột
							ngạt hiện nay,</p>
					</div>
				</div>

				<div class="place col-md-6">
					<div class="thumnail col-md-4">
						<img src="images/20.jpg" width="100%" height="100%">
					</div>
					<div class="description col-md-8">
						<h3 class="name-place">Ten quan</h3>
						<p class="address">3f Tăng Bạt Hổ, Tp. Đà Lạt, Lâm Đồng, Việt Nam</p>
						<p class="info">Ai đó đã từng nói “Người Mỹ không cần một sản phẩm
							khác, người Mỹ cần một câu chuyện khác”. Trong thời điểm ngột
							ngạt hiện nay,</p>
					</div>
				</div>

				<div class="place col-md-6">
					<div class="thumnail col-md-4">
						<img src="images/20.jpg" width="100%" height="100%">
					</div>
					<div class="description col-md-8">
						<h3 class="name-place">Ten quan</h3>
						<p class="address">3f Tăng Bạt Hổ, Tp. Đà Lạt, Lâm Đồng, Việt Nam</p>
						<p class="info">Ai đó đã từng nói “Người Mỹ không cần một sản phẩm
							khác, người Mỹ cần một câu chuyện khác”. Trong thời điểm ngột
							ngạt hiện nay,</p>
					</div>
				</div>

				<div class="place col-md-6">
					<div class="thumnail col-md-4">
						<img src="images/20.jpg" width="100%" height="100%">
					</div>
					<div class="description col-md-8">
						<h3 class="name-place">Ten quan</h3>
						<p class="address">3f Tăng Bạt Hổ, Tp. Đà Lạt, Lâm Đồng, Việt Nam</p>
						<p class="info">Ai đó đã từng nói “Người Mỹ không cần một sản phẩm
							khác, người Mỹ cần một câu chuyện khác”. Trong thời điểm ngột
							ngạt hiện nay,</p>
					</div>
				</div>

				<div class="place col-md-6">
					<div class="thumnail col-md-4">
						<img src="images/20.jpg" width="100%" height="100%">
					</div>
					<div class="description col-md-8">
						<h3 class="name-place">Ten quan</h3>
						<p class="address">3f Tăng Bạt Hổ, Tp. Đà Lạt, Lâm Đồng, Việt Nam</p>
						<p class="info">Ai đó đã từng nói “Người Mỹ không cần một sản phẩm
							khác, người Mỹ cần một câu chuyện khác”. Trong thời điểm ngột
							ngạt hiện nay,</p>
					</div>
				</div>









			</div>
		</div>
	</div>

</div>
<!-- End .content-container -->
@stop
