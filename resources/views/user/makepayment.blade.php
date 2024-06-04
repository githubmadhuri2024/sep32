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

		

					</div>
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


					<!-- Content wrapper start -->
<div class="content-wrapper">
@if (session('message'))
<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
{{ session('message') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (session('error'))
<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
{{ session('error') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
						<!-- Row start -->
						<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">

							<div class="col">
								<div class="card card-cover rounded-4" style="background-image: url('assets/images/food/img2.jpg')">
									<div  class="p-5 text-white">

										<h4 class="fw-bold mb-4" style="color:black">
									SEP-23 Plan
										</h4>
										
										<h4 class="btn btn-light"> Rs. 23/-</h4>
									
									</div>
								</div>
							</div>


							<div class="col">
								<div class="card card-cover rounded-4" style="background-image: url('assets/images/food/img2.jpg')">
									<div  class="p-5 text-white">

										<h4 class="fw-bold mb-4" style="color:black">
									SEP-100 Plan
										</h4>
										
										<h4 class="btn btn-light"> Rs. 100/-</h4>
									
									</div>
								</div>
							</div>

							<div class="col">
								<div class="card card-cover rounded-4" style="background-image: url('assets/images/food/img2.jpg')">
									<div  class="p-5 text-white">

										<h4 class="fw-bold mb-4" style="color:black">
									SEP-500 Plan
										</h4>
										
										<h4 class="btn btn-light"> Rs. 500/-</h4>
									
									</div>
								</div>
							</div>


					
						</div>
						<!-- Row end -->



						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-xxl-6">
								<div class="card">
									<div class="card-body">
										<form class="row g-3 needs-validation" novalidate>
											<div class="col-md-4 position-relative">
												<h4>Payment Details</h4>
												<h5>please send amount to UPI ID :</h5>
												
											</div>
											
										
											<div class="col-12">
												<h4  style="color:red">
												Sanyaasep-23@ybl
</h4>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="col-xxl-6">
								<div class="card">
									<div class="card-body">
										<h3>Add Money</h3>
										<form method="post"  action="{{route('depositmoney')}}"  class="row g-3 needs-validation" novalidate    enctype="multipart/form-data">
											@csrf
											
											<div class="col-md-12 position-relative">
												<label for="validationTooltip01" class="form-label">Screen Shot of payment</label>
												<input type="file"  name="uploadfile" class="form-control" id="validationTooltip01" value="Mark" required />
												@if($errors->has('uploadfile'))
                      <span class="text-danger">{{$errors->first('uploadfile')}}</span>

											@endif
											</div>
										
										
											<div class="col-md-12 position-relative">
												<label for="validationTooltip03" class="form-label">Amount</label>
												<select class="form-control" name="amount" required>
                              <option value='23'>Rs.23/-</option>
                               <option value='100'>Rs.100/-</option>
                              <option value='123'>Rs.123/-</option>
                             <option value='500'>Rs.500/-</option>
                             <option value='600'>Rs.600/-</option>
                             <option value='623'>Rs.623/-</option>
                             
                            </select>

														@if($errors->has('amount'))
                      <sapn  class="text-danger">{{$errors->first('amount')}}</span>
                      @endif
											</div>
											<div class="col-md-12 position-relative">
												<label for="validationTooltip03" class="form-label">UTR NO</label>
												<input type="num"   name="utrno"  class="form-control" id="validationTooltip03" required />
												@if($errors->has('utrno'))
                      <sapn  class="text-danger">{{$errors->first('utrno')}}</span>
                      @endif
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

				<!-- App Footer start -->
			@include('user/footer')
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