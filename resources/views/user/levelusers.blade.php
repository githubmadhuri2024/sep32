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

				<!-- Sidebar wrapper start -->
				<nav class="sidebar-wrapper">


					<!-- Sidebar brand starts -->
					<div class="brand">
						<a href="index.html" class="logo">
							<img src="assets/images/logo.svg" class="d-none d-md-block me-4" alt="Rapid Admin Dashboard" />
							<img src="assets/images/logo-sm.svg" class="d-block d-md-none me-4" alt="Rapid Admin Dashboard" />
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
                    <h4 class="card-title">Level Users</h4>

											<table class="table nowrap m-0">
												<thead>
													<tr>
														
														<th>Sr.no</th>
                            <th>Login.ID</th>
														<th>Username	</th>
														<th>Phone No</th>
														<th>Address </th>
														<th>Created</th>
														<th>status</th>
                            <th>Action</th>
									
													</tr>
												</thead>

                        <tbody>
                        <?php //print_r($data); exit; ?>
                    
                        <?php $i='1'; ?>
                      @foreach($data as $downline)
                        <tr>
                     
                        <tr>
                        <td>{{$i}}</td>
                       
                        <td>{{$downline['login_id']}}</td>
                          
                          <td>{{$downline['username']}}</td>
                          <td>{{$downline['mobile']}}</td>
                          <td>{{$downline['address']}}</td>
                          <td><?php  $dt = new DateTime($downline['created_at']);
$tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

$dt->setTimezone($tz);
echo $dt->format('Y-m-d H:i:s');
 ?></td>
                         
                          <td><label class="btn btn-primary">Active</label></td>
                          <td> <button type="button" data-id="{{$downline['id']}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Click Here To User Details
        </button>
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


			
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <div class="thumb" style="width:80px;height:80px;overflow:hidden;border-radius:50%">
                            <img class="w-h-100-p tree_image" style="max-width:100%;vertical-align:middle;height:auto" 
                            src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*">
                          
                         
                          </div>
                          <h5 class="modal-title" id="exampleModalCenterTitle">User Details</h5> 
                          
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <style>
.user-details-header .content .user-name {
    display: block;
    font-size: 22px;
    font-weight: 500;
    text-transform: capitalize;
}
                  </style>
                <div class="modal-body">
                    <div class="user-details-modal">
                        <div class="user-details-header Free">
                            <div class="content" style="width:calc(100% - 80px);padding-left:30px">
                            </div>
                        </div>
                        <div class="user-details-body text-center">
                            <h6 class="my-3">Referred By: <span class="tree_ref">Cameron Pruitt</span></h6>
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th>&nbsp;</th>
                                    <th>LEFT  1</th>
                                    <th>LEFT  2</th>
                                    <th>RIGHT 1</th>
                                    <th>RIGHT 2</th>
                           
                                </tr>
                                <tr>
                                    <td>Current BV</td>
                                    <td><span class="lbv">0.00</span></td>
                                    <td><span class="rbv">0.00</span></td>
                                    <td><span class="lbv">0.00</span></td>
                                    <td><span class="rbv">0.00</span></td>
                               
                                </tr>
                                <tr>
                                    <td>Members</td>
                                    <td><span class="lfree">0</span></td>
                                    <td><span class="rfree">0</span></td>
                                    <td><span class="lbv">0</span></td>
                                    <td><span class="rbv">0</span></td>
                               
                                </tr>
                               </tbody></table>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



					</div>
					<!-- Content wrapper end -->

				</div>


				
			
				<div class="app-footer">
					<span>© Bootstrap Gallery 2023</span>
				</div>
				<!-- App footer end -->

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