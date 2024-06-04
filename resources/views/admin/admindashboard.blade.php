<!DOCTYPE html>
<html lang="en">

@include('admin/headerlinks')

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
					@include('admin/headerprofile')
					<!-- Header profile end -->

				</div>
				<!-- Header actions ccontainer end -->

			</div>
			<!-- Page header ends -->

			<!-- Main container start -->
			<div class="main-container">

		
					@include('admin.sidebar')
					<!-- Sidebar menu ends -->

		
				<!-- Sidebar wrapper end -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						
						<!-- Live updates start -->
					
						<!-- Live updates end -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-red">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-pie-chart font-2x text-red"></i>
									</div>
									<div class="sale-details text-white">
										<h6>Total Users</h6>
										<h2 class="m-0">296</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-sticky font-2x text-blue"></i>
									</div>
									<div class="sale-details text-white">
										<h6>Active Users</h6>
										<h2 class="m-0">368</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-yellow">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-emoji-smile font-2x text-yellow"></i>
									</div>
									<div class="sale-details text-white">
										<h6>Email Unverified Users</h6>
										<h2 class="m-0">725</h2>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-green">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-star font-2x text-green"></i>
									</div>
									<div class="sale-details text-white">
										<h6>Total Deposits</h6>
										<h2 class="m-0">95%</h2>
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
		<!-- Page wrapper end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
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
		<script src="{{asset('public/assets/vendor/apex/custom/dash2/revenue.js')}}"></script>
		<script src="{{asset('public/assets/vendor/apex/custom/dash2/analytics.js')}}"></script>
		<script src="{{asset('public/assets/vendor/apex/custom/dash2/sparkline.js')}}"></script>
		<script src="{{asset('public/assets/vendor/apex/custom/dash2/sales.js')}}"></script>
		<script src="{{asset('public/assets/vendor/apex/custom/dash2/reports.js')}}"></script>

		<!-- Vector Maps -->
		<script src="{{asset('public/assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/jvectormap/world-mill-en.js')}}"></script>
		<script src="{{asset('public/assets/vendor/jvectormap/gdp-data.js')}}"></script>
		<script src="{{asset('public/assets/vendor/jvectormap/continents-mill.js')}}"></script>
		<script src="{{asset('public/assets/vendor/jvectormap/custom/world-map-markers4.js')}}"></script>

		<!-- Rating JS -->
		<script src="{{asset('public/assets/vendor/rating/raty.js')}}"></script>
		<script src="{{asset('public/assets/vendor/rating/raty-custom.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
	</body>

</html>