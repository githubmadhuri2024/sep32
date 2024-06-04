<!DOCTYPE html>
<html lang="en">

@include('user/headerlinks')

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Page header starts -->
			<div class="page-header">

				<div class="toggle-sidebar" id="toggle-sidebar">
					<i class="bi bi-list"></i>
				</div>

				<!-- Header actions ccontainer start -->
				<div class="header-actions-container">

	
					<!-- Header actions start -->
			
					<!-- Header actions start -->

					<!-- Header profile start -->
					@include('user/headerprofile')
					<!-- Header profile end -->

				</div>
				<!-- Header actions ccontainer end -->

			</div>
			<!-- Page header ends -->

			<!-- Main container start -->
			<div class="main-container">

				<!-- Sidebar wrapper start -->
				<nav class="sidebar-wrapper">


					<!-- Sidebar brand starts -->
					<div class="brand">
						<a href="index.html" class="logo">
							<img src="{{asset('public/assets/images/logo.svg')}}"  class="d-none d-md-block me-4" alt="Rapid Admin Dashboard" />
							<img src="{{asset('public/assets/images/logo-sm.svg')}}"  class="d-block d-md-none me-4" alt="Rapid Admin Dashboard" />
						</a>
					</div>
					<!-- Sidebar brand ends -->

					<!-- Sidebar menu starts -->
					@include('user/sidebar')
					<!-- Sidebar menu ends -->

				</nav>
				<!-- Sidebar wrapper end -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						<div class="d-flex align-items-center justify-content-center">
						
						</div>
						<!-- Live updates start -->
					
						<!-- Live updates end -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">
					@if (session('success'))
					<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
															<b>Successfully!</b> Subscribed the plan!
															<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
														</div>
														@endif
						<!-- Row start -->
						<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">

						@foreach($usersubcribeplan as $ap)
							<div class="col">
								<div class="card card-cover rounded-4" style="background-image: url('assets/images/food/img2.jpg')">
									<div  class="p-5 text-white">

										<h4 class="fw-bold mb-4" style="color:black">
										{{$ap['name']}}
										</h4>
										@if($ap['status'] =='1') 
										<a href="#" class="btn btn-primary"> Activated</a>
										@else
<a href="subscribe/{{$ap['planid']}}" class="btn btn-info">Click Here To Activate</a>
										@endif
									</div>
								</div>
							</div>

							@endforeach
						</div>
						<!-- Row end -->



				

					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->

	@include('user.footer')		
			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('public/assets/js/modernizr.js')}}"></script>
		<script src="{{asset('public/assets/js/moment.js')}}"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="{{asset('public/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>

		<!-- News ticker -->
		<script src="{{asset('public/assets/vendor/newsticker/newsTicker.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/newsticker/custom-newsTicker.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
	</body>

</html>