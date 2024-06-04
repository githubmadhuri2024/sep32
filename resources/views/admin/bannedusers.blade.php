<!DOCTYPE html>
<html lang="en">
@include('admin/headerlinks')
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
          @include('admin/headerprofile')

					<!-- Header profile end -->

				</div>
				<!-- Header actions ccontainer end -->

			</div>
			<!-- Page header ends -->

			<!-- Main container start -->
			<div class="main-container">

	
					<!-- Sidebar brand ends -->

					<!-- Sidebar menu starts -->
					@include('admin/sidebar')
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

						   	<!-- Row start -->
						<div class="row gx-3">
							<div class="col-sm-12 col-12">
						
							<div class="col-xxl-12">
								<div class="card">
									<div class="card-body">


                  <form action="{{route('banneduser')}}">
									<div class="row">
											<div class="col-md-3  position-relative">
												<input type="date"  name="startdate"  class="form-control" id="validationTooltip01" placeholder="Search" />
											
											</div>
</br>
										
				            <div class="col-md-3 position-relative">
												
                      <input type="date"  name="enddate"   class="form-control" id="validationTooltip01" placeholder="Search" />

											</div>
											<div class="col-md-3 position-relative">
												<input type="text"  name="uname"   class="form-control" id="validationTooltip03"  />
												
											</div>
                      <div class="col-md-3 position-relative">
												<select   name="plan_id"   class="form-control" id="validationTooltip03"  >
                        <option>Select Plan</option>
                          <option value="1">SEP Plan-23</option>
                          <option value="2">SEP Plan-500</option>
                          <option value="3">SEP Plan-100</option>
</select>
											</div>

											<div class="col-12" >
												<button  type="submit" class="btn btn-primary"  style="margin-top:20px">
													Search 
												</button>
											</div>
</form>
</div>
									
									</div>
								</div>
							</div>


							

							
   
        
						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
                    <h4 class="card-title"> Active Users</h4>

											<table class="table nowrap m-0"  >
												<thead>
													<tr>
														
                          <th> User Name</th>
                          <th>Login-ID</th>
                          <th>Phone No</th>
                          <th>Password</th>
                           <th>Joined At</th>
                           <th>Balance</th>
                           <th>Details</th>
									
													</tr>
												</thead>

                        <tbody>
                    
												@foreach( $activeusers as $a)
											
                        <tr>
                       <td data-order="{{$a->id}}">{{$a->username}}</td>
                       <td>{{$a->login_id}}</td>
                       <td>{{$a->mobile}}</td>
                       <td>{{$a->password}}</td> 
                        <td>{{$a->created_at}}</td> 
                       <td>{{$a->balance}}</td>
                          <td> <a href="" class="badge badge-primary">Details</a></td></tr>                       
                       
                    
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