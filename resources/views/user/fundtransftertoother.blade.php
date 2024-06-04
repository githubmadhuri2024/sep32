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

	@if (session('status'))
<div class="alert box-bdr-green alert-dismissible fade show text-green" role="alert">
{{ session('status') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
									<h5>SEP-100 DPS:0</h5>
									
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

							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
								
									<div class="sale-details text-white">
										<h5>Total DPs 0</h5>
									
									</div>
								</div>
							</div>
					
					
						</div>
						<!-- Row end -->

						<div class="row gx-3">
							<div class="col-xxl-12">
								<div class="card">
									<div class="card-body">
										<form action="{{route('postsendmoney')}}"  method="post"   class="row g-3 needs-validation" >
                    @csrf
											<div class="col-md-6">
												<label for="validationCustom01" class="form-label">User Id</label>
												<input type="text"  name="accname" id="useridsearch" class="form-control" id="validationCustom01"  />
												<div class="referaldetails"></div>

												
											</div>
											<div class="col-md-6">
												<label for="validationCustom02" class="form-label">Remarks</label>
												<input type="text"  name="accnumber"    class="form-control" id="validationCustom02" />
												
											</div>
											<div class="col-md-6">
												<label for="validationCustom02" class="form-label">Amount</label>
												<input type="number"  name="amount" id="amount"   class="form-control" id="transferamount" />
												<div class="chargesdetails"></div>

											
											</div>
                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">T-PIN</label>
												<input type="number"   name="tpin"    class="form-control" id="validationCustom05"  name="tpin" required />

												
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
		<!-- Page wrapper end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


		<script  type="text/javascript">
$('body').on('keyup','#transferamount',function(){
var amount=$(this).val();
var percentage = '4';
    var perprice = ((amount / 100) * percentage);
    var perpriceround = perprice.toFixed(2); 

         
        //      $('.chargesdetails').html('<span class="text-danger">'+perprice+'/- charges will applied</span>');
               
            }
          );
     
          $('body').on('keyup','#useridsearch',function(){
            var serachphone=$(this).val();
           // alert(serachphone);
            $.ajax({
              method:'post',
              url:'{{route("serachphonenumber")}}',
              data:{
                '_token':'{{csrf_token()}}',
               'serachphone'  :serachphone,
              },
              success:function(res){
                if(res=='no'){
                  
                  $('.referaldetails').html('<span class="text-danger">User Is Not Available</span>');
                  $('#referallcheck').focus();
                  }else{
                    $('.referaldetails').html('<span class="text-success">Transfer Username-UserId :'+res+'</span>');
             
                  }
                              }
            });
        // console.log(serachphone);
        // alert(serachphone);
          });
          </script>
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
		<script src="assets/vendor/apex/apexcharts.min.js"></script>
		<script src="assets/vendor/apex/custom/widgets/sparkline.js"></script>
		<script src="assets/vendor/apex/custom/widgets/sparkline2.js"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
	</body>

</html>