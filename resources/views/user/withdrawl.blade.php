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
            <img src="{{asset('public/assets/images/logo.svg')}}" class="d-none d-md-block me-4" alt="Rapid Admin Dashboard" />
							<img src="{{asset('public/assets/images/logo-sm.svg')}}" class="d-block d-md-none me-4" alt="Rapid Admin Dashboard" />
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

					@if(session('message'))
					<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
          {{session('message')}}
															<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
														</div>
														@endif



														
					@if(session('error'))
					<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
          {{session('error')}}
															<button type="button" class="btn-close" data-bs-dismiss="alert"
																aria-label="Close"></button>
														</div>
														@endif
<!-- Row start -->
						<div class="row gx-3">
							
							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
								
									<div class="sale-details text-white">
										<a  href="{{route('withdraw')}}" class="btn btn-primary">SEP-23 DPS:  {{$data->plan1}}</a>
																		</div>
								</div>
							</div>

							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
									
									<div class="sale-details text-white">
									<button  type="button" class="btn btn-primary">SEP-100 DPS:  {{$data->plan2}}</button>
									
									
									</div>
								</div>
							</div>

							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
									
									<div class="sale-details text-white">
									<button  type="button" class="btn btn-success"> Total Earnings Dps: {{$data->plan1+$data->plan2+$data->plan3}}</button>
							
									
									</div>
								</div>
							</div>


							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
									
									<div class="sale-details text-white">
									<button  type="button" class="btn btn-danger"> Total Available Dps:{{$data->balance}}</button>						
									
									<input type="hidden" name="availabledp" id="availabledp" value=" {{$data->balance}}">
									</div>
								</div>
							</div>

						


							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
									
									<div class="sale-details text-white">
									<h5>SEP-500 DPS:0</h5>
									
									</div>
								</div>
							</div>

				
					
					
						</div>
						<!-- Row end -->
						<h4 class="card-title"  style="margin-top:20px">Please fill the form to withdraw <span style="color:red">(minimum Amount to Withdraw Rs.300+20% Charges/-)</span></h4>
						<div class="row gx-3">
							<div class="col-xxl-12">
								<div class="card">
							

									<div class="card-body">
										<form  action="{{route('withdrawmoney')}}" method="post" class="row g-3 needs-validation" novalidate>
                    @csrf
											<div class="col-md-6">
												<label for="validationCustom01" class="form-label">Acc Name</label>
												<input type="text"  name="accname"  class="form-control"  />
													</div>
											<div class="col-md-6">
												<label for="validationCustom02" class="form-label">Account Number Or PhonePay Id</label>
												<input type="text"  name="accnumber"    class="form-control"  />
											</div>
											<div class="col-md-6">
												<label for="validationCustom02" class="form-label">IFSC Code</label>
												<input type="text" name="ifsccode"   class="form-control" />
												<div class="chargesdetails"></div>
											</div>
                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">Bank Name</label>
												<input type="text" class="form-control"    name="bankname" required />
											
											</div>

											<div class="col-md-6">
												<label for="validationCustom05" class="form-label">Amount</label>
												<input type="num" class="form-control"    name="amount" id="amount"  required />
												<div class="erroramountmessage" style="color:red"></div>

											
											</div>

											<div class="col-md-6">
												<label for="validationCustom05" class="form-label">T-Pin</label>
												<input type="text" class="form-control"   name="txnpin" required />
											
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



					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->

				@include('user.footer')		

			</div>
			<!-- Main container end -->

		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script>


          $('body').on('keyup','#amount',function(){
						//alert("amount");
            var amount=$(this).val();
						//alert(amount);
            var aamount=$('#availabledp').val();
            var chargamt=amount*20/100;
            var totalamt=parseFloat(amount)+parseFloat(chargamt);
            if(totalamt>aamount){
              $('.erroramountmessage').html('<span class="text-danger">Please Select AMount '+aamount+'</span>');
           
            }else{
              $('.erroramountmessage').html('<span class="text-danger">Amount debited from wallet Rs. '+amount+' and  Rs.'+chargamt+' charges and Total Rs.'+totalamt+'</span>');
           
            }
          });


      
          </script>


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

		<!-- Apex Charts -->
		<script src="assets/vendor/apex/apexcharts.min.js"></script>
		<script src="assets/vendor/apex/custom/widgets/sparkline.js"></script>
		<script src="assets/vendor/apex/custom/widgets/sparkline2.js"></script>

		<!-- Main Js Required -->
		<script src="assets/js/main.js"></script>
	</body>

</html>