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
					<div class="header-actions d-xl-flex d-lg-none gap-4">
						<div class="dropdown">
							<a class="dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-envelope-open fs-5 lh-1"></i>
								<span class="count-label"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="assets/images/user.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
											<p class="mb-1">Membership has been ended.</p>
											<p class="small m-0 text-secondary">Today, 07:30pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="assets/images/user2.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Benjamin Michiels</h6>
											<p class="mb-1">Congratulate, James for new job.</p>
											<p class="small m-0 text-secondary">Today, 08:00pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<img src="assets/images/user1.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Jehovah Roy</h6>
											<p class="mb-1">Lewis added new schedule release.</p>
											<p class="small m-0 text-secondary">Today, 09:30pm</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-primary">View all</a>
								</div>
							</div>
						</div>
					</div>
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

					

					<!-- Content wrapper start -->
					<div class="content-wrapper">
						<!-- Row start -->

            @foreach($successfulkyc as $s)
					@endforeach
						<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">
							<div class="col">
								<div class="card card-cover rounded-4" >
									<div  class="p-5 text-white">

                  <img  id="original" src="{{asset('uploads/'.$s->panno)}}" 
                  width="100px" height="100px">
										<h2 class="display-6 fw-bold">
											Another longer title belongs here
										</h2>
									</div>
								</div>
							</div>

							<div class="col">
								<div class="card card-cover rounded-4" >
									<div class="p-5 text-white">

                  <img  id="original" src="{{asset('uploads/'.$s->adharno)}}" 
                  width="100px" height="100px">
										<h2 class="display-6 fw-bold">
											Another longer title belongs here
										</h2>
									</div>
								</div>
							</div>

						
						</div>
						<!-- Row end -->

					

						

					

					

					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->

				<!-- App Footer start -->
				<div class="app-footer">
					<span>© Bootstrap Gallery 2023</span>
				</div>
				<!-- App footer end -->

			</div>
			<!-- Main container end -->

		</div>
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

		<!-- Data Tables -->
		<script src="{{asset('public/assets/vendor/datatables/dataTables.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>

	</body>

</html>