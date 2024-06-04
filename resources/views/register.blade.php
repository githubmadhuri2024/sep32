<!DOCTYPE html>
<html lang="en">

@include('header')

	<body class="login-container">
		<!-- Login box start -->
		<div class="container">
			<form method="post"  autocomplete="off" action="{{route('registersubmit')}}">
@csrf
				<div class="login-box rounded-2 p-5"  style="width:100%">
					<div class="login-form">
						<a href="index.html" class="login-logo mb-3">
						<img src="{{asset('public/assets/images/logo.jpg')}}" alt="logo" style="margin-left:40%" >
							
						</a>
						<h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
						<div class="row gx-3">
						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" class="form-control" name="username" id="usernamecheck"/>
							<div class="usernamerrror"></div>
							@if($errors->has('username'))
							<span class="text-danger">{{$errors->first('username')}}</span>
							@endif
						</div>
						</div>

						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label">Email</label>
							<input type="text"  name="email" class="form-control" name="email" id="email" />
							<div class="referallcheck"></div>

							@if($errors->has('email'))
                  <span  class="text-danger">{{$errors->first('email')}}</span>
                  @endif
						</div>
						</div>

						
						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label">Mobile</label>
							<input type="number" name="mobile"   class="form-control" name="email"  id="mobile" />	
							@if($errors->has('mobile'))
                  <span class="text-danger">{{$errors->first('mobile')}}</span>
                  @endif					
						</div>
						</div>

						
						<div class="col-sm-3 col-12">
						<div class="mb-3">
							
							<label class="form-label"> Password</label>
							<input type="password" class="form-control"  name="password" placeholder="Enter password" id="passInput"/>
              <span class="input-group-addon" role="button" title="veiw password" id="passBtn">
             <i class="fa fa-eye fa-fw" aria-hidden="true"></i>

						 @if($errors->has('password'))
                  <span class="text-danger">{{$errors->first('password')}}</span>
                  @endif
          </span>
						</div>
						</div>

        </div>


				<div class="row gx-3">
						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label"> Confirm Password</label>
							<input type="password" name="cpassword" class="form-control" placeholder="Enter password" id="cpassInput"/>
              <span class="input-group-addon" role="button" title="veiw password" id="cpassBtn">
             <i class="fa fa-eye fa-fw" aria-hidden="true"></i>

						 @if($errors->has('cpassword'))
                  <span class="text-danger">{{$errors->first('cpassword')}}</span>
                  @endif
						</div>
						</div>

						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label">State</label>
							<select class="form-select" aria-label="Default select example" id="state"  name="state">
													<option selected="">Select State</option>
													<option value="1">Andhra Pradesh</option>
													<option value="2">Telagana</option>
													<option value="3">Arunachal Pradesh</option>
													<option value="4">Bihar</option>
												</select>
						</div>
						</div>

						
						<div class="col-sm-3 col-12">
						<div class="mb-3">
						<label class="form-label">City</label>
								<input type="text" class="form-control" name="city" id="city" />
						</div>
						</div>

						
						<div class="col-sm-3 col-12">
						<div class="mb-3">
						<label class="form-label">Zipcode</label>
								<input type="number" class="form-control" name="zipcode" id="zipcode" />
						</div>
						</div>

        </div>




				<div class="row gx-3">
						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label"> Address</label>
							<input type="text" class="form-control" name="address" id="address"/>
						</div>
						</div>

						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label"> <b>ReferalID <span style="color:red">(Please check referall User Clearly)</span> : </b></label>
							<input type="text" class="form-control"name="rferral"  id="referallcheck"/>
							<div class="referaldetails"></div>
							@if($errors->has('rferral'))
                  <span class="text-danger">{{$errors->first('rferral')}}</span>
                  @endif
						</div>
						</div>
					</div>
						
						<div class="d-flex align-items-center justify-content-between">
							<div class="form-check m-0">
							<input class="form-check-input" type="checkbox" value="" id="check-address" />
									<label class="form-check-label" for="rememberPassword">Present Address Same as Perminant Address</label>
							</div>
						</div>

						<div class="row gx-3">
						<div class="col-sm-3 col-12">
						<div class="mb-3">
						<label class="form-label">Perminant Address</label>
								<input type="text" class="form-control" name="username" id="perminantaddress"/>
						</div>
						</div>

						<div class="col-sm-3 col-12">
						<div class="mb-3">
							<label class="form-label">State</label>
							<select class="form-select" aria-label="Default select example" id="perminantstate">
													<option selected=""> select state</option>
													<option value="1">Andhra Pradesh</option>
													<option value="2">Telagana</option>
													<option value="3">Arunachal Pradesh</option>
													<option value="4">Bihar</option>
												</select>
						</div>
						</div>

						
						<div class="col-sm-3 col-12">
						<div class="mb-3">
						<label class="form-label">City</label>
						<input type="text" class="form-control" name="perminantcity" id="perminantcity"/>
						</div>
						</div>

						
						<div class="col-sm-3 col-12">
						<div class="mb-3">
						<label class="form-label">Zipcode</label>
						<input type="number" class="form-control" name="perminantzipcode"  id="perminantzipcode"/>
						</div>
						</div>

        </div>
						


						<div class="d-grid py-3">
							<button type="submit" class="btn btn-lg btn-primary" style="width:150px">
								Sign up
							</button>
						</div>
						<div class="text-center py-3">or Signup with</div>
						<div class="d-flex gap-2 justify-content-center">
							<button type="submit" class="btn btn-outline-light">
								<img src="{{asset('public/assets/images/google.svg')}}" class="login-icon" alt="Login with Google" />
							</button>
							<button type="submit" class="btn btn-outline-light">
								<img src="{{asset('public/assets/images/facebook.svg')}}" class="login-icon" alt="Login with Facebook" />
							</button>
						</div>
						<div class="text-center pt-3">
							<span>Already have an account?</span>
							<a href="{{route('login')}}" class="text-blue text-decoration-underline ms-2">Login here</a>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- Login box end -->
	</body>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
  <script>
    const PassBtn = document.querySelector('#passBtn');
PassBtn.addEventListener('click', () => {
    const input = document.querySelector('#passInput');
    input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');

   if (input.getAttribute('type') === 'text'){
     PassBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
  } else{
     PassBtn.innerHTML = '<i class="fa fa-eye fa-fw" aria-hidden="true"></i>';
  }

});
    </script>

<script>
    const CPassBtn = document.querySelector('#cpassBtn');
		CPassBtn.addEventListener('click', () => {
    const input = document.querySelector('#cpassInput');
    input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');

   if (input.getAttribute('type') === 'text'){
		CPassBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
  } else{
		CPassBtn.innerHTML = '<i class="fa fa-eye fa-fw" aria-hidden="true"></i>';
  }

});
    </script>

	
  <script  text="type/javascript">
		$(document).ready(function(){
		//	alert("hii");
	$('#check-address').click(function(){
		if($('#check-address').is(":checked")){
			$('#perminantaddress').val($('#address').val());
			$('#perminantstate').val($('#state').val());
			$('#perminantcity').val($('#city').val());
			$('#perminantzipcode').val($('#zipcode').val());
		

		}
		else{
			$('#perminantaddress').val("");
			$('#perminantstate').val("");
			$('#perminantcity').val("");
			$('#perminantzipcode').val("");
			
		}

	});


	$('body').on('keyup','#usernamecheck',function(){
var username=$(this).val();
//alert(username);
$.ajax({
	method:'post',
	url:'{{route("usernamecheck")}}',
	dataType:'json',
	data:{
		'_token':'{{csrf_token()}}',
		'username':username
	},

	success:function(res){
	if(res=='1'){
		$('.usernamerrror').html('<span class="text-danger">Username Is Not Available</span>');
		$('#usernamecheck').focus();
		

	}
	else{
		$('.usernamerrror').html('<span class="text-success">Username Is  Available</span>');

	}
	}
});
	});



  $('body').on('keyup','#referallcheck',function(){
            var referal=$(this).val();
            if(referal.length>4){
            $.ajax({
              method:'post',
              url:'{{route("referaldetails")}}',
              data:{
                '_token':'{{csrf_token()}}',
               'referal'  :referal,
              },
              success:function(res){
                if(res=='no'){
                  
                $('.referaldetails').html('<span class="text-danger">Referall Is Not Available</span>');
                $('#referallcheck').focus();
                }else{
                  $('.referaldetails').html('<span class="text-success">Referal Username :'+res+'</span>');
           
                }
                
                            }
            });
          }else{
            $('.referaldetails').html('<span class="text-danger">Referall Is Not Available</span>');
            
          }





		});
	});
		</script>
</html>