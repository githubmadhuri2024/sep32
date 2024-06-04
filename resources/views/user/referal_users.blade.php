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
                          
									
													</tr>
												</thead>

                        <tbody>
                    
                    <?php $i='1'; ?>
                    
                  @foreach($downline as $downline)
                 
                    <tr>
                 
                    <tr>
                    <td>{{$downline['login_id']}}</td>
                      
                      <td>{{$downline['username']}}</td>
                      <td>{{$downline['mobile']}}</td>
                      <td>{{$downline['address']}}</td>
                      <td> <?php  $dt = new DateTime($downline['created_at']);
$tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

$dt->setTimezone($tz);
echo $dt->format('Y-m-d H:i:s');
?></td>   <td>
                <span>@if($downline['status']=='1')<div class="btn btn-primary">Active

</div> @else($downline['status']=='0') <div class="btn btn-danger">Inactive</div>  @endif</span>
                     </td>
                      <td class="py-1">
                

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

				@include('user.footer')		

			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->



	

<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/modernizr.js"></script>
		<script src="assets/js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<!-- News ticker -->
		<script src="assets/vendor/newsticker/newsTicker.min.js"></script>
		<script src="assets/vendor/newsticker/custom-newsTicker.js"></script>

		<!-- Main Js Required -->
		<script src="assets/js/main.js"></script>
	</body>

</html>