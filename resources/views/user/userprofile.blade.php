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

					<!-- Search container start -->
					<div class="search-container me-4 d-xl-block d-lg-none">

						<!-- Search input group start -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" />
							<button class="btn btn-outline-secondary" type="button">
								<i class="bi bi-search"></i>
							</button>
						</div>
						<!-- Search input group end -->

					</div>
					<!-- Search container end -->

					<!-- Header actions start -->
					<!-- <div class="header-actions d-xl-flex d-lg-none gap-4">
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
					</div> -->
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

			
					@include('user/sidebar')
					<!-- Sidebar menu ends -->

		
				<!-- Sidebar wrapper end -->

	<!-- Content wrapper scroll start -->
	<div class="content-wrapper-scroll">

<!-- Main header starts -->

<!-- Main header ends -->

<!-- Content wrapper start -->
<div class="content-wrapper">
	@if(Session::has('message'))
	<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
{{ session('message') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
	<div class="subscribe-header">
		<img src="{{asset('public/assets/images/bg.svg')}}" class="img-fluid w-100" alt="Header" />
	</div>
	<div class="subscriber-body">
		<!-- Row start -->
		<div class="row justify-content-center mt-4">
			<div class="col-lg-12">
				<!-- Row start -->
				<div class="row align-items-end">
					<div class="col-auto">

					@if(session('profileimage'))
    
						<img src="{{asset('uploads').'/'.session('profileimage')}}" class="img-7xx rounded-circle" />
						@endif

					</div>
					<div class="col">
						<h6>User</h6>
						<h4 class="m-0">{{session('username')}}</h4>
					</div>
					<div class="col-12 col-md-auto">
						<span class="badge shade-green">79% Completed</span>
					</div>
				</div>
				<!-- Row end -->
			</div>
		</div>
		<!-- Row end -->

		<!-- Row start -->
		<div class="row justify-content-center mt-4">
			<div class="col-lg-12">
				<div class="card light">
					<div class="card-body">
						<div class="custom-tabs-container">
							<ul class="nav nav-tabs" id="customTab2" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA" role="tab"
										aria-controls="oneA" aria-selected="true">General</a>
								</li>
						
						
							</ul>
							<div class="tab-content h-350">
								<div class="tab-pane fade show active" id="oneA" role="tabpanel">
									<!-- Row start -->

									<form class="form-sample"  action="{{route('submitprofilesetting')}}"  method="post"   enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="row gx-3">
										
								

										<div class="col-sm-8 col-12">
											<div class="row gx-3">
												<div class="col-6">
													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="fullName" class="form-label">First Name</label>
														<input type="text" class="form-control"  name="fstname"  placeholder="Full Name"  value="{{$data->firstname}}" />
														@if($errors->has('fstname'))
                        <span class="text-danger">{{$errors->first('fstname')}}</span>
                     @endif
													</div>

													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="contactNumber" class="form-label">Last Name</label>
														<input type="text" name="lastname" class="form-control" id="contactNumber"
															placeholder="Contact"  value="{{$data->lastname}}" />
															@if($errors->has('lastname'))
<span class="text-danger">{{$errors->first('lastname')}}</span>
@endif
													</div>
												</div>
												<div class="col-6">
													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="emailId" class="form-label">Email</label>
														<input type="email" name="email" class="form-control" id="emailId" placeholder="Email ID"    value="{{$data->email}}" />

														@if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                               @endif
													</div>

													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="birthDay" class="form-label">Mobile Number</label>
														<div class="input-group">
															<input type="number"name="mobile"  class="form-control" placeholder="Enter Mobilenumber" value="{{$data->mobile}}"/>
															@if($errors->has('mobile'))
                    <span class="text-danger">{{$errors->first('mobile')}}</span>
                           @endif
															
														</div>
													</div>
												</div>

												<div class="col-6">
													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="emailId" class="form-label">Password</label>
														<input type="password" name="password" class="form-control" id="password" placeholder="Email ID" value="{{$data->password}}">

														@if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                               @endif
													</div>

													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="birthDay" class="form-label">Conform Password</label>
														<div class="input-group">
															<input type="password"  name="cpassword"  class="form-control" placeholder="Enter State" value="{{$data->conform_password}}"/>
															@if($errors->has('cpassword'))
                    <span class="text-danger">{{$errors->first('cpassword')}}</span>
                           @endif
															
														</div>
													</div>
													<div class="mb-3">
														<label for="emailId" class="form-label">Address</label>
														<input type="text" name="address" class="form-control" id="address" placeholder="Enter address"  value="{{$data->address}}" >

														@if($errors->has('address'))
                            <span class="text-danger">{{$errors->first('address')}}</span>
                               @endif
													</div>
													
												</div>

												<div class="col-6">

												
												<div class="mb-3">
														<label for="emailId" class="form-label">State</label>
														<input type="text" name="state" class="form-control" id="state" placeholder="Enter state"  value="{{$data->state}}" >

														@if($errors->has('state'))
                            <span class="text-danger">{{$errors->first('state')}}</span>
                               @endif
													</div>
													<!-- Form Field Start -->
													<!-- Form Field Start -->
													<div class="mb-3">
														<label for="emailId" class="form-label">City</label>
														<input type="text" name="city" class="form-control" id="city" placeholder="Enter city"  value="{{$data->city}}" >

														@if($errors->has('city'))
                            <span class="text-danger">{{$errors->first('city')}}</span>
                               @endif
													</div>

													<div class="mb-3">
														<label for="emailId" class="form-label">Pincode</label>
														<input type="number" name="pincode" class="form-control" id="state" placeholder="Enter pincode"  value="{{$data->pincode}}" >

														@if($errors->has('pincode'))
                            <span class="text-danger">{{$errors->first('pincode')}}</span>
                               @endif
													</div>
												

													


												
												</div>


												
			

								
												<div class="col-12">
													<!-- Form Field Start -->
													<div class="mb-3">
														<label class="form-label">ChooseFile</label>
														<input type="file" name="uploadfile" class="form-control" />
                            @if($errors->has('uploadfile'))
<span class="text-danger">{{$errors->first('uploadfile')}}</span>
@endif
													</div>
												</div>
											</div>
										</div>
									</div>


			
						
							</div>
							<div class="d-flex gap-2 justify-content-end">
							
								<button type="submit" class="btn btn-success">
									Update
								</button>

								
							</div>


							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Row end -->
	</div>

	
	
	
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