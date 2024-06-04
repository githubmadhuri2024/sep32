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
					
			
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">

					@if (Session::has('success'))
<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
{{ session('success') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
          <div class="search-container me-4 d-xl-block d-lg-none">

 
						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-xxl-12">
								<div class="card">
									<div class="card-body">
											<form    action="{{route('submitchangepassword')}}"  method="post" class="row g-3 needs-validation" novalidate>
						@csrf
												<div class="col-md-6">
													<label for="validationCustom01" class="form-label">Old Password</label>
													<input type="password" name="password" class="form-control" id="exampleInputUsername1"
						  placeholder="Old Password">
						  @if($errors->has('password'))
						  <sapn  class="text-danger">{{$errors->first('password')}}</span>
						  @endif
												</div>
												<div class="col-md-6">
													<label for="validationCustom02" class="form-label">New Password</label>
							<input type="password" name="newpassword" class="form-control" id="exampleInputUsername1" placeholder="New Password">
						  @if($errors->has('newpassword'))
						  <sapn  class="text-danger">{{$errors->first('newpassword')}}</span>
						  @endif											</div>
												<div class="col-md-6">
													<label for="validationCustomUsername" class="form-label">Conform Password</label>
							<input type="text" name="conformpassword" class="form-control" id="exampleInputUsername1" placeholder="conformpassword">
						  @if($errors->has('conformpassword'))
						  <sapn  class="text-danger">{{$errors->first('conformpassword')}}</span>
						  @endif

												</div>
					 
									

					   
						 






												<div class="col-12">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
														<label class="form-check-label" for="invalidCheck">
															Agree to terms and conditions
														</label>
														<div class="invalid-feedback">
															You must agree before submitting.
														</div>
													</div>
												</div>
												<div class="col-12">
													<button class="btn btn-primary" type="submit">
														Submit form
													</button>
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
		<script src="{{asset('public/assets/js/validations.js')}}"></script>






		




	</body>

</html>