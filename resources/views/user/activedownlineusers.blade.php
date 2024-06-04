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

	
					<!-- Sidebar brand ends -->

					<!-- Sidebar menu starts -->
					@include('user/sidebar')
					<!-- Sidebar menu ends -->

			

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

		

					<!-- Content wrapper start -->
					<div class="content-wrapper">


					<div class="row">
			
				 
				 <!-- The Modal -->
				 <div class="modal" id="myModal">
						 <div class="modal-dialog">
						 <div class="respdata">
						
		 </div>
								 </div>
						 </div>

						   
   
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
                    <h4 class="card-title">DownLine Active Users(<strong>Current level <?php if($currentlevel) echo $currentlevel; ?></strong>)</h4>

											<table class="table nowrap m-0"  id="apiCallbacks">
												<thead>
													<tr>
														
														<th>Sr.no</th>
														<th>Login Id	</th>
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
                        <td>{{$i}}</td>
                    <td>{{$downline['0']['login_id']}}</td>
                      
                      <td>{{$downline['0']['username']}}</td>
                      <td>{{$downline['0']['mobile']}}</td>
                      <td>{{$downline['0']['address']}}</td>
                      
                      <td> <?php  $dt = new DateTime($downline['0']['created_at']);
$tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after

$dt->setTimezone($tz);
echo $dt->format('Y-m-d h:i A');
?></td>
                     
                      <td><label class="btn btn-primary">Active</label></td>
                      <td class="py-1">
                      <button type="button" data-id="{{$downline['0']['id']}}" class="btn btn-primary userdetailsget" data-bs-toggle="modal" data-bs-target="#myModal">
        Click Here To User Detailssss
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

					</div>
					<!-- Content wrapper end -->

				</div>
				<!-- Content wrapper scroll end -->

				@include('user/footer')
			</div>
			<!-- Main container end -->

		</div>
		<!-- Page wrapper end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	
    <script  type="text/javascript">
		//	alert("hii");
          $('body').on('click','.userdetailsget',function(){
            var serachphone=$(this).attr("data-id") ;
				
            $.ajax({
              method:'post',
              url:'{{route("getuserdetails")}}',
              data:{
                '_token':'{{csrf_token()}}',
               'serachphone'  :serachphone,
              },
              success:function(res){
                
                  $(".respdata").html(res)
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

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>

		<script src="{{asset('public/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
		
	</body>

</html>