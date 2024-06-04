<!DOCTYPE html>
<html lang="en">

	@include('header')

	<body class="login-container">

		<!-- Login box start -->
		<div class="container">
			<form action="{{route('loginpost')}}"  method="post">
				@csrf
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="login-box rounded-2 p-5">
					<div class="login-form" >
						<a href="{{route('login')}}" class="login-logo mb-3">
            <img src="{{asset('public/assets/images/logo.jpg')}}" alt="logo" style="margin-left:20%" >
						</a>
						<h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
						@if ($message = Session::get('error'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
						
						<div class="mb-3">
							<label class="form-label">Your Email</label>
							<input type="text"  name="email" class="form-control" placeholder="Enter your email" />
							@if($errors->has('email'))
                  <span class="text-danger">{{$errors->first('email')}}</span>

                  @endif
						</div>
						<div class="mb-3">
							<label class="form-label">Your Password</label>
							<input type="password" name="password" class="form-control" placeholder="Enter password" id="passInput"/>
              <span class="input-group-addon" role="button" title="veiw password" id="passBtn">
             <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
						 @if($errors->has('password'))
                  <span class="text-danger">{{$errors->first('password')}}</span>

                  @endif
          </span>
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<div class="form-check m-0">
								<input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
								<label class="form-check-label" for="rememberPassword">Remember</label>
							</div>
						</div>
						<div class="d-grid py-3">
							<button type="submit" class="btn btn-lg btn-primary">
								Login
							</button>
						</div>
						<div class="text-center py-3">or login with</div>
						<div class="d-flex gap-2 justify-content-center">
							<button type="submit" class="btn btn-outline-light">
								<img src="{{asset('public/assets/images/google.svg')}}" class="login-icon" alt="Login with Google" />
							</button>
							<button type="submit" class="btn btn-outline-light">
								<img src="{{asset('public/assets/images/facebook.svg')}}" class="login-icon" alt="Login with Facebook" />
							</button>
						</div>
						<div class="text-center pt-3">
							<span>Not registered?</span>
							<a href="{{route('register')}}" class="text-blue text-decoration-underline ms-2">
								Create an account</a>
						</div>
					</div>
				</div>
			</form>
		</div>
		<!-- Login box end -->
	</body>
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

</html>