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

					<!-- Search container start -->
					<div class="search-container me-4 d-xl-block d-lg-none">

						<!-- Search input group start -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" />
							<button class="btn btn-outline-secondary" type="button">
								<i class="bi bi-search"></i>
							</button>
						</div>
						<!-- Search input group end -->

					</div>
					<!-- Search container end -->

					<!-- Header actions start -->
				
					<!-- Header actions start -->

					<!-- Header profile start -->
					@include('admin/headerprofile')
					<!-- Header profile end -->

				</div>
				<!-- Header actions ccontainer end -->

			</div>
			<!-- Page header ends -->

			<!-- Main container start -->
			<div class="main-container">

				

					<!-- Sidebar menu starts -->
					@include('admin/sidebar')
					<!-- Sidebar menu ends -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

			
	
								</div>
							</div>


							
</br>
							

								<!-- Card start -->
								<div class="card">
									<div class="card-header">
										<div class="card-title">Plans</div>
                  <a href="{{route('addtype')}}" class="btn btn-success" style="margin-left:80%">Add Type</a>

									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="apiCallbacks" class="table custom-table">
												<thead>
													<tr>
														<th>S.No</th>
														<th>Name</th>
														
														<th>Status </th>
                            <th>Action </th>
													
													</tr>
												</thead>
                        <tbody>
                          <?php $i='0';?>
                          @foreach($types as $t)
                          <tr>
                            <td><?php echo $i+1?></td>
                            <td>{{$t->name}}</td>
                            <td>@if($t->status=='Active')<div class="btn btn-primary">Active

</div> @elseif($t->status=='Inactive') <div class="btn btn-danger">Inactive</div> @endif</span></td>
<td>
 <a href="edittype/{{$t->type_id}}" class="btn btn-primary">Edit</a>
 <a href="deletetype/{{$t->type_id}}" class="btn btn-danger">Delete</a>

 

</td>
                         </tr>
                       <?php  $i++?>
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

		<!-- Data Tables -->
		<script src="{{asset('public/assets/vendor/datatables/dataTables.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
		<script src="{{asset('public/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
	</body>

</html>