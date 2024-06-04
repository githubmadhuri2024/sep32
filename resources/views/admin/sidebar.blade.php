

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
									<a href="{{route('admindashboard')}}">
										<i class="bi bi-house"></i>
										<span class="menu-text">Dashboard</span>
									</a>
								</li>
				
							


								<li>
									<a href="{{route('types')}}">
										<i class="bi bi-box"></i>
										<span class="menu-text">Plan</span>
									</a>
								</li>
								<li>
									<a href="{{route('adminproduct')}}">
										<i class="bi bi-stickies"></i>
										<span class="menu-text">Product</span>
										
									</a>
							
								</li>


								<li>
									<a href="{{route('addtolevel')}}">
										<i class="bi bi-stickies"></i>
										<span class="menu-text">Add To level</span>
										
									</a>
							
								</li>


								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-calendar4"></i>
										<span class="menu-text">Manage Users</span>
									</a>
									<div class="sidebar-submenu">
										<ul>
											<li>
												<a href="{{route('activeusers')}}">Active Users</a>
											</li>
											<li>
												<a href="">Banned Users</a>
											</li>

											<li>
												<a href="">Email Unverified</a>
											</li>
											
											<li>
												<a href="">Kyc Pending</a>
											</li>

													
											<li>
												<a href="">With Balance</a>
											</li>
															
											<li>
												<a href="">All Users</a>
											</li>
											
											
											
										</ul>
									</div>
								</li>

								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-columns-gap"></i>
										<span class="menu-text">Deposits</span>
									</a>

									<div class="sidebar-submenu">
										<ul>
											<li>
												<a href="{{route('pendingdeposit')}}">Pending Deposits</a>
											</li>
											<li>
												<a href="">Approved Deposits</a>
											</li>

											<li>
												<a href="">Rejected Deposits</a>
											</li>
											
											<li>
												<a href="">All Deposits</a>
											</li>

													
										
											
											
											
										</ul>
									</div>

							
								</li>
								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-columns-gap"></i>
										<span class="menu-text">Withdrawals</span>
									</a>

									<div class="sidebar-submenu">
										<ul>
											<li>
												<a href="">Pending withdraw</a>
											</li>
											<li>
												<a href="">Approved withdraw</a>
											</li>

											<li>
												<a href="">Rejected withdraw</a>
											</li>
											
											<li>
												<a href="">All withdraw</a>
											</li>

													
										
											
											
											
										</ul>
									</div>

							
								</li>
								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-window-split"></i>
										<span class="menu-text">Level Users</span>
									</a>


									<div class="sidebar-submenu">
										<ul>
											<li>
												<a href="">Level 1</a>
											</li>
											<li>
												<a href="">Level 2</a>
											</li>

											<li>
												<a href="">Level 3</a>
											</li>
											
											<li>
												<a href="">Level 4</a>
											</li>

											<li>
												<a href="">Level 5</a>
											</li>
											<li>
												<a href="">Level 6</a>
											</li>

											<li>
												<a href="">Level 7</a>
											</li>

													
										
											
											
											
										</ul>
									</div>

									
								</li>
								<li class="sidebar-dropdown">
									<a href="">
										<i class="bi bi-map"></i>
										<span class="menu-text">Kyc</span>
									
									</a>
							
								</li>


							
				
								<li>
									<a href="">
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
							<div class="page-icon">
								<i class="bi bi-house"></i>
							</div>
							<div class="page-title d-none d-md-block">
							<h5><strong>You Are on Plan <b style="color:red">{{ session('activeplan') }}</b></strong></h5>
							</div>
						</div>
						<!-- Live updates start -->
					
						<!-- Live updates end -->
					</div>
					<!-- Main header ends -->

					<!-- Content wrapper start -->




				</nav>






				