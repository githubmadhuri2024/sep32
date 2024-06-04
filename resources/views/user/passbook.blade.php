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

	
					<!-- Sidebar menu starts -->
					@include('user/sidebar')
					<!-- Sidebar menu ends -->

				<div class="content-wrapper-scroll">

			
					<!-- Content wrapper start -->
					<div class="content-wrapper">
          @if (session('message'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif
						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-sm-12 col-12">
						
							<div class="col-xxl-12">
								<div class="card">
									<div class="card-body">
									<div class="row">
											<div class="col-md-4  position-relative">
												<input type="date"  name="startdate" value="<?php print(date("Y-m-d")); ?>"  class="form-control" id="validationTooltip01" placeholder="Search" />
											
											</div>
</br>
										
				            <div class="col-md-4 position-relative">
												
                      <input type="date"  name="enddate" value="<?php print(date("Y-m-d")); ?>"   class="form-control" id="validationTooltip01" placeholder="Search" />

											</div>
											<div class="col-md-4 position-relative">
												<input type="text"  name="Type"   class="form-control" id="validationTooltip03"  />
												
											</div>

											<div class="col-12" >
												<button class="btn btn-primary" type="submit" style="margin-top:20px">
													Search 
												</button>
											</div>
</div>
									
									</div>
								</div>
							</div>


							

							

								<!-- Card start -->
								<div class="card">
									<div class="card-header">
										<div class="card-title">Transactions</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="apiCallbacks" class="table custom-table">
												<thead>
													<tr>
														<th>Date</th>
														<th>Debit</th>
														<th>Credit</th>
														<th>Deatils</th>
														<th>Status </th>
													
													</tr>
												</thead>
                        <tbody>
            @foreach( $transactiondata as $ac)
                        <tr>
                            <td> <?php  $dt = new DateTime($ac['created']);
$tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

$dt->setTimezone($tz);
echo $dt->format('Y-m-d H:i:s');
 ?></td>
                       <td>{{$ac['debitamount']}}</td>
                       <td>{{$ac['creditamount']}}</td>
                       <td>{{$ac['msg']}}</td>
                       <td>@if($ac['status']=='2')<div class="btn btn-warning">Pending

</div> @elseif($ac['status']=='1') <div class="btn btn-primary">Success</div> @elseif($ac['status']=='5') <div class="btn btn-danger">Rejected</div> @elseif($ac['status']=='0') <div class="btn btn-primary">
    Success </div>@endif</span></td>
		
                          
</tr>    
                    
                 @endforeach
                      </tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Card end -->

							
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

		<!-- Data Tables -->
		<script src="{{asset('public/assets/vendor/datatables/dataTables.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
	</body>

</html>