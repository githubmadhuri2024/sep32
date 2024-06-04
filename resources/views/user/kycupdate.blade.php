<!DOCTYPE html>
<html lang="en">
@foreach($kycupate as $k)
@endforeach
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

				<!-- Sidebar wrapper start -->
				<nav class="sidebar-wrapper">


					<!-- Sidebar brand starts -->
					<div class="brand">
						<a href="index.html" class="logo">
            <img src="{{asset('public/assets/images/logo.svg')}}"  class="d-none d-md-block me-4" alt="Rapid Admin Dashboard" />
							<img src="{{asset('public/assets/images/logo-sm.svg')}}"  class="d-block d-md-none me-4" alt="Rapid Admin Dashboard" />
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

<form   action="{{route('updatekyc')}}"  method="post" class="form-sample"    enctype="multipart/form-data">
@csrf
<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<div class="row">
											<div class="col-md-4  position-relative">
												<input type="file"  name="pannumber"   value="{{$k->panno}}" class="form-control"  />
                        @if($k->panno!='')
                            <img  id="original" src="{{asset('uploads/'.$k->panno)}}"  width="100px" height="100px">
@endif
                            @if($errors->has('pannumber'))
                        <span class="text-danger">{{$errors->first('pannumber')}}</span>
                     @endif
											</div>
</br>
										
				            <div class="col-md-4 position-relative">
												
                      <input type="file" name="adahrno" class="form-control" />
                      @if($k->adharno!='')
                            <img  id="original" src="{{asset('uploads/'.$k->adharno)}}" value="{{$k->adharno}}"  width="100px" height="100px">
                            @endif

                            @if($errors->has('adahrno'))
<span class="text-danger">{{$errors->first('adahrno')}}</span>
@endif
											</div>
										

											<div class="col-12" >
												<button class="btn btn-primary" type="submit" style="margin-top:20px">
													Search 
												</button>
											</div>
</div>
</form>
									
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