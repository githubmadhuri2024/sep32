

<nav class="sidebar-wrapper">

<!-- Sidebar brand starts -->
<div class="brand">
	<a href="index.html" class="logo">
		<img src="{{asset('public/images/logo.jpg')}}" class="d-none d-md-block me-4" alt="Rapid Admin Dashboard"   style="margin-left:50px" />
		<img src="{{asset('public/images/logo.jpg')}}" class="d-block d-md-none me-4" alt="Rapid Admin Dashboard" />
	</a>
</div>
<div class="sidebar-menu">
						<div class="sidebarMenuScroll">
							<ul>
								<li class="active-page-link">
									<a href="{{route('userdashboard')}}">
										<i class="bi bi-house"></i>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
				
								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-collection"></i>
										<span class="menu-text">Products</span>
									
									</a>
									<div class="sidebar-submenu">
										<ul>
											<li>
												<a href="{{route('productone')}}">Sep Plan-23</a>
											</li>
											<li>
												<a href="{{route('producttwo')}}">Sep Plan-100</a>
											</li>
											<li>
												<a href="{{route('productthree')}}">Sep Plan-500</a>
											</li>
										
									
											
										</ul>
									</div>
								</li>


								<li>
									<a href="{{route('subscribeplan')}}">
										<i class="bi bi-box"></i>
										<span class="menu-text">Userplan</span>
									</a>
								</li>
								<li class="sidebar-dropdown">
									<a href="{{route('adduser')}}">
										<i class="bi bi-stickies"></i>
										<span class="menu-text">Add User</span>
										
									</a>
							
								</li>
								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-calendar4"></i>
										<span class="menu-text">Down Line Users</span>
									</a>
									<div class="sidebar-submenu">
										<ul>
											<li>
												<a href="{{route('activedownlineusers')}}">Active Users</a>
											</li>
											<li>
												<a href="{{route('inactivedownlineusers')}}">In Active Users</a>
											</li>
											
											
										</ul>
									</div>
								</li>
								<li class="sidebar-dropdown">
									<a href="{{route('levelusers')}}">
										<i class="bi bi-columns-gap"></i>
										<span class="menu-text">Level Users</span>
									</a>
							
								</li>
								<li class="sidebar-dropdown">
									<a href="{{route('referallusers')}}">
										<i class="bi bi-window-split"></i>
										<span class="menu-text">Referal Users</span>
									</a>
									
								</li>
								<li class="sidebar-dropdown">
									<a href="{{route('fundtransftertoother')}}">
										<i class="bi bi-map"></i>
										<span class="menu-text">Fund Tranfer</span>
									
									</a>
							
								</li>


								<li class="sidebar-dropdown">
									<?php 
									$id=Session::get('userid');?>
									
									<a href="{{route('usertree',$id)}}">
										<i class="bi bi-collection"></i>
										<span class="menu-text">User Tree</span>
									
									</a>
								
								</li>
								<li class="sidebar-dropdown">
									<a href="{{route('passbook')}}">
										<i class="bi bi-layout-sidebar"></i>
										<span class="menu-text">Passbook</span>
									</a>
								
								</li>
								<li>
									<a href="{{route('legality')}}">
										<i class="bi bi-shield-lock"></i>
										<span class="menu-text">legality</span>
									</a>
								</li>
								<li>
									<a href="{{route('kycupdate')}}">
										<i class="bi bi-unlock"></i>
										<span class="menu-text">Kyc Update</span>
									</a>
								</li>
								<li>
									<a href="{{route('orders')}}">
										<i class="bi bi-unlock"></i>
										<span class="menu-text">Order</span>
									</a>
								</li>
				
								<li>
									<a href="{{route('logout')}}">
										<i class="bi bi-code-square"></i>
										<span class="menu-text">Logout</span>
									</a>
								</li>
							</ul>
						</div>
					</div>


						</nav>
				<!-- Sidebar wrapper end -->

				<!-- Content wrapper scroll start -->
				<div class="content-wrapper-scroll">

					<!-- Main header starts -->
					<div class="main-header d-flex align-items-center justify-content-between position-relative">
						<div class="d-flex align-items-center justify-content-center">
							
							<div class="page-title d-none d-md-block">
							<h5><strong>You Are on Plan <b style="color:red;font-size:15px">{{ session('activeplan') }}</b></strong></h5>
							</div>
						</div>
						<!-- Live updates start -->
					
						<!-- Live updates end -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->




				</nav>






				