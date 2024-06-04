<!DOCTYPE html>
<html lang="en">

@include('user/headerlinks')>
<style>
    .container{
    border: 1px solid #000;
    padding: 15px;
}
.user:after {
 display:none;
}
.user{
    height: 70px;
    width: 70px;
    margin-left: auto;
    margin-right: auto;
    line-height: 120px;
    position: relative;
    border-radius: 50%;
    background-color: #ffffff;
    border: none;
    -webkit-appearance: initial!important;
}
.user-8{
    height: 50px;
    width: 50px;
    margin-left: auto;
    margin-right: auto;
    line-height: 120px;
    position: relative;
    border-radius: 50%;
    background-color: #ffffff;
    border: none;
    -webkit-appearance: initial!important;
}
.user-8 img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    position: relative;
    z-index: 99;
}

.user img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    object-fit: cover;
    position: relative;
    z-index: 99;
}
.line {
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    height: 80px;
    display: inherit;
    border: 2px dotted #bbb;
    border-bottom: none;
    position: relative;
}
.line::before, .line::after {
    position: absolute;
    content: "\f107";
    font-family: "Line Awesome Free";
    font-weight: 600;
    font-size: 24px;
    color: #bbb;
    bottom: 0;
    width: 30px;
    text-align: center;
    background: #fff;
    z-index: 1;
    line-height: 20px;
    height: 20px;
}
.line::before {
    left: -15px;
}
.line::after {
    right: -15px;
}

.w-8 .line::before, .w-8 .line::after {
    display: none;
}
.llll:last-child  .line {
    border: none;
}

.w-1 {
    width: 100%;
}
.w-2 {
    width: 50%;
}
.w-4 {
    width: 25%;
}
.w-8 {
    width: 6%;
}
.user .user-name {
    line-height: 1.5;
    font-size: 16px;
    font-weight: 500;
    color: red;
}
.user-8 .user-name {
    font-weight: 500;
    color: red;
}

@media (max-width: 767px) {
    .user {
        line-height: 0;
        position: relative;
        z-index: 2;
    }

    .w-4 .line::before, .w-4 .line::after {
        display: none;
    }

    .user img {
        border-width: 3px;
    }
    .line {
        transform: translateY(-10px);
    }
    .w-1 .user {
        width: 80px;
        height: 80px;
    }
    .w-1 .user img {
        width: 80px;
        height: 80px;
    }
    .w-1 .line {
        height: 50px;
    }
    .w-2 .user {
        width: 70px;
        height: 70px;
    }
    .w-2 .user img {
        width: 70px;
        height: 70px;
    }
    .w-2 .line {
        height: 50px;
    }
    .w-4 .user {
        width: 60px;
        height: 60px;
    }
    .w-4 .user img {
        width: 60px;
        height: 60px;
    }
    .w-4 .line {
        height: 40px;
        margin-top: 17px;
        width: 60%;
        transform: translate(-8px,-20px);
        z-index: 0;
    }
    .w-8 {
        transform: translateY(-30px);
    }
    .w-8 .user {
        width: 50px;
        height: 50px;
    }
    .w-8 .user img {
        width: 50px;
        height: 50px;
    }
    .w-8 .line {
        height: 0;
    }
    .user .user-name {
        display: none;
    }
}

@media (max-width: 575px) {
    .user {
        line-height: 0;
        position: relative;
        z-index: 2;
    }
    .line {
        transform: translateY(-10px);
    }
    .w-1 .user {
        width: 70px;
        height: 70px;
    }
    .w-1 .user img {
        width: 70px;
        height: 70px;
    }
    .w-1 .line {
        height: 50px;
    }
    .w-2 .user {
        width: 60px;
        height: 60px;
    }
    .w-2 .user img {
        width: 60px;
        height: 60px;
    }
    .w-2 .line {
        height: 50px;
    }
    .w-4 .user {
        width: 55px;
        height: 55px;
    }
    .w-4 .user img {
        width: 55px;
        height: 55px;
    }
    .w-4 .line {
        height: 40px;
        margin-top: 18px;
        width: 70%;
        transform: translate(-1px,-20px);
        z-index: 0;
    }
    .w-8 {
        transform: translateY(-30px);
    }
    .w-8 .user {
        width: 45px;
        height: 45px;
    }
    .w-8 .user img {
        width: 45px;
        height: 45px;
    }
    .w-8 .line {
        height: 0;
    }
    .user img {
        border-width: 2px;
    }
}
@media (max-width: 400px) {
    .user {
        line-height: 0;
        position: relative;
        z-index: 2;
    }
    .line {
        transform: translateY(-10px);
    }
    .w-1 .user {
        width: 70px;
        height: 70px;
    }
    .w-1 .user img {
        width: 70px;
        height: 70px;
    }
    .w-1 .line {
        height: 50px;
    }
    .w-2 .user {
        width: 60px;
        height: 60px;
    }
    .w-2 .user img {
        width: 60px;
        height: 60px;
    }
    .w-2 .line {
        height: 50px;
    }
    .w-4 .user {
        width: 50px;
        height: 50px;
    }
    .w-4 .user img {
        width: 50px;
        height: 50px;
    }
    .w-4 .line {
        height: 50px;
        margin-top: 17px;
        width: 49%;
        transform: translate(-2px,-19px);
        z-index: 0;
    }
    .w-8 {
        transform: translateY(-30px);
    }
    .w-8 .user {
        width: 35px;
        height: 35px;
    }
    .w-8 .user img {
        width: 35px;
        height: 35px;
    }
    .w-8 .line {
        height: 0;
    }
    .card {
        padding: 30px;
        margin: 0 -30px;
    }

}

.paid-user {
    border: 5px solid #2ecc71;
}
.free-user {
    border: 5px solid #101536;
}
.no-user {
    border: 5px solid #ddd;
}
.user-details-modal-area .modal-body {
    padding: 0;
}
.user-details-header {
    /*background-color: rgba(6, 243, 183, 0.22);*/
    display: flex;
    align-items: center;
    padding: 25px 30px;
}

.Paid {
    background-color: rgba(6, 243, 183, 0.22);
}

.Free {
    background-color: rgba(241, 196, 15, 0.22);
}




.user-details-header .thumb {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
}
.user-details-header .content {
    width: calc(100% - 80px);
    padding-left: 30px;
}
.user-details-header .content .user-name {
    display: block;
    font-size: 22px;
    font-weight: 500;
    text-transform: capitalize;
}
.user-details-header .content .user-status {
    font-weight: 500;
}
.user-details-body {
    padding: 20px 30px;
}
.user-details-body h4 {
    margin-bottom: 20px;
}
.user-details-body p {
    margin-bottom: 0;
    color: #777777;
}
.user-details-body p+p {
    margin-top: 10px;
}
img {
    max-width: 100%;
}
    </style>
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
					<div class="header-actions d-xl-flex d-lg-none gap-4">
						<div class="dropdown">
							<a class="dropdown-toggle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-envelope-open fs-5 lh-1"></i>
								<span class="count-label"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-lg">
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="assets/images/user.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
											<p class="mb-1">Membership has been ended.</p>
											<p class="small m-0 text-secondary">Today, 07:30pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2 border-bottom">
										<img src="assets/images/user2.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Benjamin Michiels</h6>
											<p class="mb-1">Congratulate, James for new job.</p>
											<p class="small m-0 text-secondary">Today, 08:00pm</p>
										</div>
									</div>
								</div>
								<div class="dropdown-item">
									<div class="d-flex py-2">
										<img src="assets/images/user1.png" class="img-3x me-3 rounded-3" alt="Admin Dashboards" />
										<div class="m-0">
											<h6 class="mb-1 fw-semibold">Jehovah Roy</h6>
											<p class="mb-1">Lewis added new schedule release.</p>
											<p class="small m-0 text-secondary">Today, 09:30pm</p>
										</div>
									</div>
								</div>
								<div class="d-grid mx-3 my-1">
									<a href="javascript:void(0)" class="btn btn-primary">View all</a>
								</div>
							</div>
						</div>
					</div>
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
			  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            
        <div class="card-body">
            <div class="row">



<div class="form-group">
<div class="col-md-4  position-relative"> 
    <label><strong><h5>Select Plan :</h5></strong></label>

<select  name="plan_id" class="form-control" id="planselect"   style="height:45px">      
  <option Value="">Select</option>
      
<option Value="1" {{ ('1' == $plan) ? 'selected' : '' }}>SEP Plan-23</option>
<option Value="2" {{ ('2' == $plan) ? 'selected' : '' }}>SEP Plan-100</option>
<option Value="3" {{ ('3' == $plan) ? 'selected' : '' }}>SEP Plan-500</option>


</select> 
</div>
</div>

                 
</div>


</div>

        <?php   if($data['a']){ ?>
        
        <h3 class="page-title"><strong> Tree of  : <?php echo $data['a']['username']; ?></strong></h3>
        <input type='hidden' id='baseidd' value=' <?php echo $data['a']['id']; ?>'></input>

        <?php } ?>
  
                                        <div class="row text-center justify-content-center llll">
                                            <div class="w-1">

                                            <?php   if($data['a']){ ?>
        
                            
                                              <a href="{{route('usertree',[$data['a']['id']])}}"> <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
                                    <p class="user-name"><?php echo $data['a']['username']; ?></p> </div></a>   <span class="line"></span>    
                            <?php } else{?>
                                    <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
                                    <p class="user-name">No User</p> </div> <span class="line"></span>                       
                         <?php   }?>
                         <?php if($club1=='1'){?>
                         <a href="{{route('withdraw')}}" type="button" data-id="" style="position:absolute;top:139px;right:-18px" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
           Click Here To  Withdraw
                         </a>       
        <?php } ?>
                                              </div>
                                                            </div>


                                            <div class="row text-center justify-content-center llll">
                                            <div class="w-4">
                                            <?php    if($data['b']){ ?>
        
                            
                                              <a href="{{route('usertree',[$data['b']['id']])}}"> <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
                <p class="user-name"><?php echo $data['b']['username']; ?></p> </div> </a>  <span class="line"></span>    
        <?php } else{?>
                <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
                <p class="user-name">No User</p> </div> <span class="line"></span>                       
     <?php   }?>
        </div>
                              <div class="w-4">
                              <?php    if($data['c']){ ?>
        
                            
                                <a href="{{route('usertree',[$data['c']['id']])}}">  <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
                <p class="user-name"><?php echo $data['c']['username']; ?></p> </div> </a>  <span class="line"></span>    
        <?php } else{?>
                <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
                <p class="user-name">No User</p> </div> <span class="line"></span>                       
     <?php   }?>
        </div>                    
                              <div class="w-4">
        <?php    if($data['d']){ ?>
        
                            
          <a href="{{route('usertree',[$data['d']['id']])}}"> <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
                <p class="user-name"><?php echo $data['d']['username']; ?></p> </div>  </a> <span class="line"></span>    
        <?php } else{?>
                <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
                <p class="user-name">No User</p> </div> <span class="line"></span>                       
     <?php   }?>
        </div>                                             <div class="w-4">
        <?php    if($data['e']){ ?>
        
                            
          <a href="{{route('usertree',[$data['e']['id']])}}">   <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
                <p class="user-name"><?php echo $data['e']['username']; ?></p> </div> </a>  <span class="line"></span>    
        <?php } else{?>
                <div class="user" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
                <p class="user-name">No User</p> </div> <span class="line"></span>                       
     <?php   }?>
        </div>                                              </div>
                                            <div class="row text-center justify-content-center llll">
                                            <div class="w-8">
                                            <?php    if($data['f']){ ?>
        
                            
                                              <a href="{{route('usertree',[$data['f']['id']])}}">                    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
                <p class="user-name"><?php echo $data['f']['username']; ?></p> </div> </a>  <span class="line"></span>    
        <?php } else{?>
                <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
                <p class="user-name">No User</p> </div> <span class="line"></span>                       
     <?php   }?>
        </div>     
                                         <div class="w-8">
        <?php    if($data['g']){ ?>
        
                            
          <a href="{{route('usertree',[$data['g']['id']])}}">   <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['g']['username']; ?></p> </div>  </a> <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                       <div class="w-8">
<?php    if($data['h']){ ?>
        
                            
  <a href="{{route('usertree',[$data['h']['id']])}}">   <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['h']['username']; ?></p> </div>  </a> <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                         <div class="w-8">
<?php    if($data['i']){ ?>
        
                            
  <a href="{{route('usertree',[$data['i']['id']])}}">     <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['i']['username']; ?></p> </div>  </a> <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                              <div class="w-8">
                                                                    <?php    if($data['j']){ ?>
        
                            
                                                                      <a href="{{route('usertree',[$data['j']['id']])}}">     <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['j']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No Userrrrr</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                    <div class="w-8">
<?php    if($data['k']){ ?>
        
                            
  <a href="{{route('usertree',[$data['k']['id']])}}">    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['k']['username']; ?></p> </div>  </a> <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                    <div class="w-8">
<?php    if($data['l']){ ?>
        
                            
  <a href="{{route('usertree',[$data['l']['id']])}}">    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['l']['username']; ?></p> </div>  </a> <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                    <div class="w-8">
<?php    if($data['m']){ ?>
        
                            
  <a href="{{route('usertree',[$data['m']['id']])}}">      <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['m']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No user</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                     <div class="w-8">
<?php    if($data['n']){ ?>
        
                            
  <a href="{{route('usertree',[$data['n']['id']])}}">      <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['n']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                        <div class="w-8">
<?php    if($data['o']){ ?>
        
                            
  <a href="{{route('usertree',[$data['o']['id']])}}">     <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['o']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                    <div class="w-8">
<?php    if($data['p']){ ?>
        
                            
  <a href="{{route('usertree',[$data['p']['id']])}}">    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['p']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                    <div class="w-8">
<?php    if($data['q']){ ?>
        
                            
  <a href="{{route('usertree',[$data['q']['id']])}}">     <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['q']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                      <div class="w-8">
                                                                    <?php    if($data['r']){ ?>
        
                            
      <a href="{{route('usertree',[$data['r']['id']])}}">    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['r']['username']; ?></p> </div> </a>  <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                       <div class="w-8">
<?php    if($data['s']){ ?>
        
                            
  <a href="{{route('usertree',[$data['s']['id']])}}">    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['s']['username']; ?></p> </div>  </a> <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                    <div class="w-8">
<?php    if($data['t']){ ?>
        
                            
  <a href="{{route('usertree',[$data['t']['id']])}}">    <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['t']['username']; ?></p> </div>   </a><span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                  

<div class="w-8">
<?php    if($data['u']){ ?>
        
                            
  <a href="{{route('usertree',[$data['u']['id']])}}">   <div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default-member.png" alt="*"  class="free-user">
<p class="user-name"><?php echo $data['u']['username']; ?></p> </div></a>   <span class="line"></span>    
<?php } else{?>
<div class="user-8" type="button"><img src="https://script.viserlab.com/mlmlab/assets/images/default.png" alt="*"  class="no-user">
<p class="user-name">No User</p> </div> <span class="line"></span>                       
<?php   }?>
</div>                                                                   
                                    </div>
    </div>
</div>
         
          </div>




        
       
     
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
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
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/modernizr.js"></script>
		<script src="assets/js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<!-- News ticker -->
		<script src="assets/vendor/newsticker/newsTicker.min.js"></script>
		<script src="assets/vendor/newsticker/custom-newsTicker.js"></script>

		<!-- Main Js Required -->
		<script src="assets/js/main.js"></script>
	</body>

</html>