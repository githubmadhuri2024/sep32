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





		<!-- Header profile start -->
		@include('user/headerprofile')
		<!-- Header profile end -->

	</div>
	<!-- Header actions ccontainer end -->

</div>
<!-- Page header ends -->

<!-- Main container start -->
<div class="main-container">



		<!-- Sidebar menu starts -->
		@include('user/sidebar')

		
	<!-- Sidebar wrapper end -->

	<!-- Content wrapper scroll start -->
	<div class="content-wrapper-scroll">


		<!-- Content wrapper start -->
		<div class="content-wrapper">

			


	
			<!-- Row start -->
			<div class="row gx-3">
				<div class="col-xl-4 col-sm-6 col-12">
					<div class="card">
						<div class="card-img">
							<img src="{{asset('/uploads/level13.jpg')}}"  class="card-img-top img-fluid" alt="Google Admin" />
						</div>
						<div class="card-body">
							
							<h4 class="fw-light mb-4">Bed Sheet</h4>
							<button class="btn btn-danger">Level 1</button>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-sm-6 col-12">
					<div class="card">
						<div class="card-img">
							<img src="{{asset('/uploads/level22.jpg')}}"   class="card-img-top img-fluid" alt="Google Admin" />
						</div>
						<div class="card-body text-center">
							
							<h4 class="fw-light mb-4">Queen size Bedsheet</h4>
							<button class="btn btn-danger">Level 2</button>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-sm-12 col-12">
					<div class="card">
						<div class="card-img">
							<img  src="{{asset('/uploads/level33.jpg')}}"   class="card-img-top img-fluid" alt="Google Admin" />
						</div>
						<div class="card-body text-center">
							
							<h4 class="fw-light mb-4">Diwan Cot</h4>
							<button class="btn btn-danger">Level 3</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Row end -->



			<!-- Row start -->
			<div class="row gx-3">
				<div class="col-lg-4 col-sm-6 col-12">
					<div class="card">
						<div class="card-body">
							
							<img  src="{{asset('/uploads/level43.png')}}"  class="rounded-4 img-fluid mb-4" alt="Google Admin" />
							<h4 class="mb-3">Bike</h4>
							<a href="#" class="btn btn-danger">Level 4</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-12">
					<div class="card">
						<div class="card-body text-center">
							
							<img  src="{{asset('/uploads/level53.jpg')}}"  class="rounded-4 img-fluid mb-4" alt="Google Admin" />
							<h4 class="mb-3">Car</h4>
							<a href="#" class="btn btn-danger">Level 5</a>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-sm-12 col-12">
					<div class="card">
						<div class="card-body text-center">
						
							<img  src="{{asset('/uploads/level63.jpg')}}"   class="rounded-4 img-fluid mb-4" alt="Google Admin" />
							<h4 class="mb-3">House</h4>
							<a href="#" class="btn btn-danger">Level 6</a>
						</div>
					</div>
				</div>
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


</body>
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

		<!-- Apex Charts -->
		<script src="{{asset('public/assets/vendor/apex/apexcharts.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/apex/custom/widgets/sparkline.js')}}"></script>
		<script src="{{asset('public/assets/vendor/apex/custom/widgets/sparkline2.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
	</body>

</html>