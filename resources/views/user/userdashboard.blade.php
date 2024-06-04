<!DOCTYPE html>
<html lang="en">
@include('user/headerlinks')
<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			box-shadow: 0 0 5px #ccc;
			text-align: center;
		}
		h1 {
			margin-top: 0;
			color: #333;
		}
		.progress-container {
			display: inline-block;
			width: 100%;
			height: 20px;
			background-color: #eee;
			border-radius: 10px;
			margin-bottom: 20px;
			overflow: hidden;
		}
		.progress-bar {
			display: inline-block;
			height: 100%;
			background-color: #4CAF50;
			border-radius: 10px;
			transition: width 0.5s;
			width: 100%;
		}
		.progress-text {
			display: inline-block;
			margin-left: 10px;
			color: #333;
			font-weight: bold;
			font-size: 16px;
		}
		.congrats-message {
			margin-top: 20px;
			color: #4CAF50;
			font-weight: bold;
			font-size: 24px;
			text-align: center;
		}
    .congrats-status {
			margin-top: 10px;
			color: #4c64af;
			font-weight: bold;
			font-size: 24px;
			text-align: center;
		}
	</style>

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

			
					@include('user/sidebar')
					<!-- Sidebar menu ends -->

		
				<!-- Sidebar wrapper end -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
				
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-red">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-pie-chart font-2x text-red"></i>
									</div>
								

								<a href="{{route('makepayment')}}" class="sale-details text-white">
										<h6>Buy DP</h6>
										<h6 class="m-0">(Click here to Buy)</h6>
</a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-blue">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-sticky font-2x text-blue"></i>
									</div>
									<a href="{{route('withdraw')}}" class="sale-details text-white">
										<h6>Withdrawl</h6>
										<h6 class="m-0">(Click here to withdraw)</h6>
                   </a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-yellow">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-emoji-smile font-2x text-yellow"></i>
									</div>
									<a href="{{route('withdraw')}}" class="sale-details text-white">
										<h6>Wallet</h6>
										<h6 class="m-0">Total DPS( <?php //print_r($data->plan_id); //exit;
             echo $data->plan1+$data->plan2+$data->plan3;?>/-) </h6>
                   </a>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-green">
									<div class="sale-icon icon-box xl rounded-5 me-3">
										<i class="bi bi-star font-2x text-green"></i>
									</div>
									<div class="sale-details text-white">
										<h6>Total DPS</h6>
										<h2 class="m-0">95%</h2>
									</div>
								</div>
							</div>
						</div>




						<div class="row">
            
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                           
                <div class="card-people mt-auto">
                  <?php if($data->kyc=='1' and $data->ev=='1' and $data->ev=='1' ){ ?>
                <div class="congrats-status">Profile Status 100%</div>
	              <div class="container">
		<h2>You Did It Congratulations</h2>
    
		<div class="progress-container">
			<div class="progress-bar"></div>
		</div>
		<div class="congrats-message">Congratulations, you have successfully completed your Profile!</div>
	</div>
  <?php }else{
    ?>     <div class="congrats-status">Profile Status 0%</div>
	 
              <div class="container">
         
		<h2>Please Update KYC</h2>
    
		<div class="progress-container" style="width: 30%;">
			<div class="progress-bar"></div>
		</div>
  </br>
		<div class="congrats-message" style="color:red"> you have Not completed your Profile!</div>
	</div>
  
    <?php 
    
  } ?>
  
                  </div>
                </div>
              </div>
            <div class="col-md-6 grid-margin transparent">
            <div class="container" style="width: 80%;
  margin: 15px auto;">
  <h2></h2>
  <div>
    <canvas id="myChart"></canvas>
  </div>
</div>
                           </div>
          </div>
         
         
    <div class="row">     
          <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-9">
                          </div>
                        </div>
                      </div>
					  
					  
					  
                    

                    </div>
</div>
					
  
</br>
  
  
  
<div class="row">
       <style>
        hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 3px solid #ffff;
}
.glowingbutton {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
        </style>
     


						<div class="row gx-3">
					


							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-red">
									
						<a href="updateactiveplan/1" class="sale-details text-white">
										<h6>Available Balance</h6>
										<h6 class="m-0">{{session('balance')}}</h6>
              </a>

								</div>
							</div>

							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-red">
									
								<?php //print_r($data->plan_id); //exit;
              $resp=json_decode($data->plan_id,true);
              
              if($data->p1=='1'){
              ?>

								<a href="updateactiveplan/1" class="sale-details text-white">
										<h6> SEP-23  Upgrade</h6>
										<h6 class="m-0">Activated</h6>
</a>
<?php
}else{?>
	<a href="#"  data-bs-toggle="modal" data-id="1" class="sale-details text-white  activateplan">
										<h6>SEP-23 Activate</h6>
										<h6 class="m-0">Click here to  Activated</h6>
</a>

<?php
}?>
								</div>
							</div>



							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-red">
									
								<?php //print_r($data->plan_id); //exit;
              $resp=json_decode($data->plan_id,true);
              
              if($data->p2=='1'){
              ?>

								<a href="updateactiveplan/2" class="sale-details text-white">
										<h6> SEP-100 Upgrade</h6>
										<h6 class="m-0">Activated</h6>
</a>
<?php
}else{?>
	<a href="#"  data-bs-toggle="modal" data-id="2" class="sale-details text-white  activateplan">
										<h6>SEP-23 Activate</h6>
										<h6 class="m-0">Click here to  Activated</h6>
</a>

<?php
}?>
								</div>
							</div>


							<div class="col-lg-3 col-sm-6 col-12">
								<div class="stats-tile d-flex align-items-center position-relative tile-red">
									
								<?php //print_r($data->plan_id); //exit;
              $resp=json_decode($data->plan_id,true);
              
              if($data->p3=='1'){
              ?>

								<a href="updateactiveplan/2" class="sale-details text-white">
										<h6> SEP-100 </h6>
										<h6 class="m-0">Activated</h6>
</a>
<?php
}else{?>
	<a href="#"   data-bs-toggle="modal" data-id="3"  class="sale-details text-white  activateplan">
										<h6> Sep-500 Auto Upgrade</h6>
										<h6 class="m-0">Click here to  Activated</h6>
</a>

<?php
}?>
								</div>
							</div>


</div>

						
</div>
			
</div>
<div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-body">
                    <div class="user-details-modal">
                        <div class="user-details-header Free">
                            <div class="content" style="width:calc(100% - 80px);padding-left:30px">
                            </div>
                        </div>
                        <div class="user-details-body text-center modalbodytext">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    	

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



		<script>
     $('body').on('click','.activateplan',function(){
           var plainid= $(this).attr("data-id")

		
            $.ajax({
              method:'post',
              url:'{{route("userplanbal")}}',
              data:{
                '_token':'{{csrf_token()}}',
               'plainid':plainid,
              },
              success:function(res){
                if(res=='nobal'){
                  var text= '<h6 class="my-3" style="color:green">To Activate Plan You Balance is low <span class="tree_ref"><a href="makepayment">Click here to Buy</a></span></h6>';
                 $('.modalbodytext').html(text);
              
                  $('#myModal').modal('show');
                }else{
                  var text= '<h6 class="my-3" style="color:green"> Plan Is Activated. and Amount Deducted from Wallet</h6>';
                 $('.modalbodytext').html(text);
                
                  $('#myModal').modal('show');
                  setTimeout(function() {
    location.reload();
}, 2000);
                }

               
                
                            }
            });
          
        // console.log(serachphone);
        // alert(serachphone);
          });
       
  </script>
	</body>

</html>