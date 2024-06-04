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
					<!-- Sidebar menu ends -->

				

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">


					<!-- Content wrapper start -->
					<div class="content-wrapper">
          @if (session('message'))
					<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
          {{ session('message') }}
															<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
														</div>
														@endif
						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
                    <h4 class="card-title">DownLine Inactive Users</h4>

											<table class="table nowrap m-0">
												<thead>
													<tr>
														
														<th>Sr.no</th>
												
														<th>Username	</th>
														<th>Phone No</th>
														<th>Address </th>
														<th>Created</th>
														<th>status</th>
                            <th>Action</th>
									
													</tr>
												</thead>

                        <tbody>
                        <?php $i='1'; ?>
                      @foreach($downline as $downline)
                        <tr>
                     
                        <tr>
                        <td>{{$i}}</td>
                          
                        <td>{{$downline['0']['username']}}</td>
                          <td>{{$downline['0']['mobile']}}</td>
                          <td>{{$downline['0']['address']}}</td>
                          <td>{{$downline['0']['created_at']}}</td>
                         
                          <td><label class="btn btn-danger">InActive</label></td>
                          <td class="py-1">
                          <a href="#" class="btn btn-danger btn-icon-text">
                          Not Paid
                          </a>
                           </td>
                        
                        </tr>
                        <?php $i++; ?>
                 
                        @endforeach
                 
                      </tbody>
											
											</table>
										</div>
									</div>
								</div>
							</div>
						
						</div>
						<!-- Row end -->

					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->

			@include('user/footer')

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->



	

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