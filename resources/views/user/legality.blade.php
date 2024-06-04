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

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						<div class="d-flex align-items-center justify-content-center">
							<div class="page-icon">
								<i class="bi bi-layout-sidebar"></i>
							</div>
							<div class="page-title d-none d-md-block">
								<h5>Legality</h5>
							</div>
						</div>
						<!-- Live updates start -->
					
						<!-- Live updates end -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">
						<!-- Hero header start -->
						<div class="hero-header"  style="background-color:#2A229C">
							<div class="container-fluid">
								<!-- Row start -->
								<div class="row justify-content-center" >
									<div class="col-xxl-10">
										<div class="text-center">
											<h1 class="text-white mb-3">Legality Documents</h1>
											
										
										</div>
									</div>
								</div>
								<!-- Row end -->
							</div>
						</div>
						<div class="hero-body">
							<!-- Row start -->
							<div class="row justify-content-center">
								<div class="col-xxl-12">
									<div class="card mb-5">
										<div class="card-body p-5">

										<center>
       
        <object data=
"http://localhost/ecom/public/doc1.pdf" 
                width="800"
                height="500">
        </object>
        <object data=
"http://localhost/ecom/public/doc2.pdf" 
                width="800"
                height="500">
        </object>
        <object data=
"http://localhost/ecom/public/doc3.pdf" 
                width="800"
                height="500">
        </object>
   
    </center>
                
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Hero header end -->
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