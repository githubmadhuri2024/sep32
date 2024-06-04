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
<!-- Row start -->
						<div class="row gx-3">
							
							<div class="col-xxl-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
								
									<div class="sale-details text-white">
                    <input type="date"  name="sdate">
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