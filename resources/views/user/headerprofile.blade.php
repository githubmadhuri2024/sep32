		<div class="header-profile d-flex align-items-center">
						<div class="dropdown">
							<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
							<h5 style="margin-right:20px;font-size:15px"><strong>Login Id : <b style="color:red">{{ session('login_id') }}</b></strong></h5>
			
								<span class="avatar">


								@if(session('profileimage'))
    <img src="{{asset('uploads').'/'.session('profileimage')}}" alt="profile"/>
   
@else
        <img src="{{asset('public/images/faces/face28.jpg')}}" alt="profile"/>
   
        @endif
									
							</a>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
								<div class="header-profile-actions">
								<a href="{{route('changepassword')}}">Change Password</a>
									<a href="{{route('changetransactionpin')}}">Create Transaction Pin</a>
									<a href="{{route('changepassword')}}">Support Ticket</a>
									<a href="{{route('userprofile')}}">Profile</a>
									
									<a href="{{route('logout')}}">Logout</a>
								</div>
							</div>
						</div>
					</div>