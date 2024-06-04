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

		

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
					
			
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->
					<div class="content-wrapper">
          <div class="search-container me-4 d-xl-block d-lg-none">

          <div  class="row"  >
            
            <div class="form-group">
            <label><b>Join A</b></label>
              <div class="input-group"  >
              <input   id="myInput" type="text" class="form-control"   style="width:100px"  value="<?php echo $left1; ?>"
                   placeholder="Recipient's username" aria-label="Recipient's username" >
                <div class="input-group-append">
                  <button class="btn btn-sm btn-primary" onclick="myFunction()">Copy</button>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-left:3px;">
            <label><b>Join B</b></label>
              <div class="input-group"  >
              <input   id="myInput_one" type="text" class="form-control"   style="width:240px" value="<?php echo $left2; ?>"
                   placeholder="Recipient's username" aria-label="Recipient's username">
                <div class="input-group-append">
                  <button class="btn btn-sm btn-primary" onclick="myFunctionone()">Copy</button>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-left:3px;">
            <label><b>Join C</b></label>
              <div class="input-group"  >
              <input   id="myInput_two" type="text" class="form-control"   style="width:240px" value="<?php echo $right1; ?>"
                   placeholder="Recipient's username" aria-label="Recipient's username">
                <div class="input-group-append">
                  <button class="btn btn-sm btn-primary" onclick="myFunctiontwo()">Copy</button>
                </div>
              </div>
            </div>

            <div class="form-group"   style="margin-left:3px;">
            <label><b>Join D</b></label>
              <div class="input-group"  >
         
                <input type="text"   id="myInput_three" class="form-control"  style="width:240px" value="<?php echo $right2; ?>"
                    placeholder="Recipient's username" aria-label="Recipient's username">
                <div class="input-group-append">
                  <button class="btn btn-sm btn-primary"  onclick="myFunctionthree()">Copy</button>
                </div>
              </div>
            </div>

            


          </div>
</br>


						<!-- Row start -->
						<div class="row gx-3">
							<div class="col-xxl-12">
								<div class="card">
									<div class="card-body">
										<form    action="{{route('adduserpost')}}"  method="post" class="row g-3 needs-validation" novalidate>
                    @csrf
											<div class="col-md-6">
												<label for="validationCustom01" class="form-label">User name</label>
												<input type="text"  name="fname"  class="form-control" id="validationCustom01"  />
											</div>
											<div class="col-md-6">
												<label for="validationCustom02" class="form-label">E-mail</label>
												<input type="email"  name="mail"   class="form-control" id="validationCustom02" />
											</div>
											<div class="col-md-6">
												<label for="validationCustomUsername" class="form-label">Gender</label>
                        <select class="form-control" name="gender" required>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
											</div>
                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">Date Birth</label>
												<input type="date" class="form-control" id="validationCustom05"   name="dob" required />
											
											</div>
											<div class="col-md-6">
												<label for="validationCustom04" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" placeholder="******" name="mobile_number" required >

											
											</div>
								

                      <div class="col-md-6">
												<label for="validationCustom03" class="form-label">Position</label>
                        <select class="form-control" name="position" required>
                            <option value="">Select</option>
                             
                              <option value="lefttree1">A</option>
                              <option value="lefttree2">B</option>
                              <option value="righttree1">C</option>
                              <option value="righttree2">D</option>
                            </select>
											</div>


                     

                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">state</label>
												<input type="text"   name="state" class="form-control" id="validationCustom05" required />
											
											</div>

                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">City</label>
												<input type="text" name="city"  class="form-control" id="validationCustom05" required />
												
											</div>
                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">password</label>
												<input type="password"   name="password" class="form-control" id="validationCustom05" required />
											
											</div>
                      <div class="col-md-6">
												<label for="validationCustom05" class="form-label">Confirm password</label>
												<input type="password"   name="cpassword" class="form-control" id="validationCustom05" required />
											
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