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

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
					
			
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">
          <div class="search-container me-4 d-xl-block d-lg-none">

         
</br>
						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-xxl-12">
								<div class="card">
									<div class="card-body">
										<form    method="post"   action="{{route('cancelorder',$oid)}}" class="row g-3 needs-validation" novalidate>
                    @csrf
											<div class="col-md-6">
												<label for="validationCustom01" class="form-label">Reason For CAancel</label>
												<select   name="reason"  class="form-control" >
                        <option >Select Cancel Reason</option>
                          <option value="dontlikethisorder">Dont like this order</option>
                          <option value="bymistake">By mistake</option>
                          <option value="wrongsize">Wrong size</option>
                      </select>
											</div>
											<div class="col-md-6">
												<label for="validationCustom02" class="form-label">Comment</label>
												<textarea type="text"  name="comment"   class="form-control" ></textarea>
											</div>
										
                     
											<div class="col-md-6">
												<label for="validationCustom01" class="form-label">status</label>
												<select   name="status"  class="form-control" >
                        <option >Select Active</option>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        
                      </select>
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

		<!-- Main Js Required -->
		<script src="{{asset('public/assets/js/main.js')}}"></script>
		<script src="{{asset('public/assets/js/validations.js')}}"></script>





      <script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}


function myFunctionOne() {
  // Get the text field
  var copyTextOne = document.getElementById("myInput_one");

  // Select the text field
  copyTextOne.select();
  copyTextOne.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyTextOne.value);
  
  // Alert the copied text
  alert("Copied the text: " + copyTextOne.value);
}



function myFunctiontwo() {
  // Get the text field
  var copyText = document.getElementById("myInput_two");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}




function myFunctionthree() {
  // Get the text field
  var copyText = document.getElementById("myInput_three");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}






</script>
		




	</body>

</html>