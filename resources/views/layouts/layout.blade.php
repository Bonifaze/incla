<!DOCTYPE html>
<html>
<head>
 
	
	@yield('pagetitle')
 
 	@include("partials.header")
 
 	@yield('css')
 	
 </head>
 
 @yield('body')






<div class="wrapper">

  <header class="main-header">
  
	<!-- Logo -->
    <a href="{{ url('dash2') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          
          
          
         
         
      
          <!-- Messages: style can be found in dropdown.less-->
        
						 <li class="dropdown messages-menu">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              <i class="fa fa-envelope-o"></i>
				              <span class="label label-success">4</span>
				            </a>
				           
				           
				            <ul class="dropdown-menu">
				              <li class="header">You have 4 messages</li>
				              <li>
				                
				                <!-- inner menu: contains the actual data -->
				                <ul class="menu">
				                 
				                  
				                  <!-- start message -->
				                  <li>
				                    <a href="#">
				                      <div class="pull-left">
				                        <img src="<?php echo asset('dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        Support Team
				                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
				                      </h4>
				                      <p>Why not buy a new awesome theme?</p>
				                    </a>
				                  </li>
				                  <!-- end message -->
				                  
				                  
				                 <!-- start message --> 
				                  <li>
				                    <a href="#">
				                      <div class="pull-left">
				                        <img src="<?php echo asset('dist/img/user3-128x128.jpg')?>" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        AdminLTE Design Team
				                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
				                      </h4>
				                      <p>Why not buy a new awesome theme?</p>
				                    </a>
				                  </li>
				                  
				                  
				                  
				                  <!-- start message -->
				                  <li>
				                    <a href="#">
				                      <div class="pull-left">
				                        <img src="<?php echo asset('dist/img/user4-128x128.jpg')?>" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        Developers
				                        <small><i class="fa fa-clock-o"></i> Today</small>
				                      </h4>
				                      <p>Why not buy a new awesome theme?</p>
				                    </a>
				                  </li>
				                  <!-- end message -->
				                  
				                 
				                 
				                  <!-- start message -->
				                  <li>
				                    <a href="#">
				                      <div class="pull-left">
				                        <img src="<?php echo asset('dist/img/user3-128x128.jpg')?>" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        Sales Department
				                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
				                      </h4>
				                      <p>Why not buy a new awesome theme?</p>
				                    </a>
				                  </li>
				                  <!-- end message -->
				                  
				                  
				                  
				                  
				                 <!-- start message --> 
				                  <li>
				                    <a href="#">
				                      <div class="pull-left">
				                        <img src="<?php echo asset('dist/img/user4-128x128.jpg')?>" class="img-circle" alt="User Image">
				                      </div>
				                      <h4>
				                        Reviewers
				                        <small><i class="fa fa-clock-o"></i> 2 days</small>
				                      </h4>
				                      <p>Why not buy a new awesome theme?</p>
				                    </a>
				                  </li>
				                  <!-- end message -->
				                  
				                  
				                  
				                </ul>
				              </li>
				              <li class="footer"><a href="#">See All Messages</a></li>
				            </ul>
				          </li>
			
				<!-- End Messages-->           
         
     
          
      
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
         
         
          <!-- End Notifications -->
         
         
   		 
          
          <!-- Tasks: style can be found in dropdown.less -->
          
			          <li class="dropdown tasks-menu">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              <i class="fa fa-flag-o"></i>
			              <span class="label label-danger">9</span>
			            </a>
			            <ul class="dropdown-menu">
			              
			              <li class="header">You have 9 tasks</li>
			              
			              <li>
			                
			               
			                <!-- inner menu: contains the actual data -->
			                <ul class="menu">
			                  
			                
			                
			                
			                 <!-- Task item -->
			                  <li>
			                    <a href="#">
			                      <h3>
			                        Design some buttons
			                        <small class="pull-right">20%</small>
			                      </h3>
			                      <div class="progress xs">
			                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
			                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
			                          <span class="sr-only">20% Complete</span>
			                        </div>
			                      </div>
			                    </a>
			                  </li>
			                  <!-- end task item -->
			                  
			                  
			                  
			                  
			                  
			                  <li><!-- Task item -->
			                    <a href="#">
			                      <h3>
			                        Create a nice theme
			                        <small class="pull-right">40%</small>
			                      </h3>
			                      <div class="progress xs">
			                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
			                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
			                          <span class="sr-only">40% Complete</span>
			                        </div>
			                      </div>
			                    </a>
			                  </li>
			                  <!-- end task item -->
			                  
			                  
			                </ul>
			                <!-- task inner menu end -->
			              </li>
			              
			              
			              <li class="footer">
			                <a href="#">View all tasks</a>
			              </li>
			            </ul>
			          </li>
           
           <!-- Tasks end -->
           
         
		
			
		
		
         
       
          <!-- User Account: style can be found in dropdown.less -->
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo asset('dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo asset('dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              
              <!-- User Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
          
 				<!-- end User Account -->
  
          
          
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 
 
 
 
 @include("partials.sidebar")
  
  
  
  
		@yield('content')
  
 
  

<!-- Footer starts -->
  
  
 @include("partials.footer")
  
  
  
  
  
  
  
  
  <!-- Control Sidebar -->
   @include("partials.controlbar")
  <!-- /.control-sidebar -->
  
  
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->





 @include("partials.js")
 
 
 @yield('pagescript')
  
</body>
</html>
