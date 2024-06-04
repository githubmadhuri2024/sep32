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


					<!-- Search container end -->

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
							<div class="page-icon">
								<i class="bi bi-collection"></i>
							</div>
							<div class="page-title d-none d-md-block">
								<h5>Orders</h5>
							</div>
						</div>
						<!-- Live updates start -->
					
						<!-- Live updates end -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
<div class="content-wrapper">
 <?php
 $count=count($orderlist);
//echo $count;
 ?>






<?php
if($count=='0'){?>
              <div class="col-xl-6 col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">	No Orders </div>
									</div>
									<div class="card-body">
										
									
									</div>
								</div>
							</div>
						
<?php
}
else{?>

@foreach($orderlist as $ol)
<div class="col-xl-6 col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">{{$ol->pname}}</div>
									</div>
									<div class="card-body">
										<p class="mb-3">
										<b>Productname:</b>{{$ol->pname}}
										</p>
                    <p class="mb-3">
										<b>Size:</b>{{$ol->size}},<b>Color:</b>{{$ol->color}},<b>Price</b>{{$ol->totalprice}}
										</p>
                







                  
                  

               

           


                
                   
									</div>
									<div class="card-footer">2 days ago</div>
								</div>
							</div>
              @endforeach
<?php
}

?>

											</div>
										</form>
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