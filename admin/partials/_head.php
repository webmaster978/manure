<?php require('config/database.php');
if (empty($_SESSION['user'])) {
    header('location:login.php');
}?>
<div class="row">
					<div class="col">
						<a class="admin-logo" href="index.php">
							<h1>
								<img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
								<img alt="" src="assets/img/logo-dark.png" class="toggle-none hidden-xs">
							</h1>
						</a>				
						<div class="left-nav-toggle" >
							<a  href="#" class="nav-collapse"><i class="fa fa-bars"></i></a>
						</div>
						<div class="left-nav-collapsed" >
							<a  href="#" class="nav-collapsed"><i class="fa fa-bars"></i></a>
						</div>
						
						<ul class="list-inline top-right-nav">
							<li class="dropdown icons-dropdown d-none-m">
								<a class="dropdown-toggle " data-toggle="dropdown" href="#"><i class="fa fa-envelope"></i> <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div></a>
								
								<ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
									<li>
										<div class="dropdown-header">
											<a class="float-right" href="#"><small>View All</small></a> Messages
										</div>
										
										<!-- <div class="scrollDiv">
											<div class="notification-list">
												
											</div>
										</div>
 -->									</li>
								</ul>
							</li>
							<li class="dropdown icons-dropdown d-none-m">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell"></i> <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div></a>
								<ul class="dropdown-menu top-dropdown lg-dropdown notification-dropdown">
									<li>
										<div class="dropdown-header">
											<a class="float-right" href="#"><small>View All</small></a> Notifications
										</div>
										<!-- <div class="scrollDiv">
											
										</div> -->
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="right-sidebar-toggle d-none-m" href="javascript:%20void(0);"><i class="fa fa-align-right"></i></a>
							</li>
							<li class="dropdown avtar-dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<img alt="" class="rounded-circle" src="assets/img/avtar-2.png" width="30">
									<?php
                                            if ($_SESSION['user']['username'] !== array()) {
                                                $users = $_SESSION['user']['username'];

                                                echo "$users";
                                            }
                                            ?>
								</a>
								<ul class="dropdown-menu top-dropdown">
									
									<li>
										<a class="dropdown-item" href="#"><i class="icon-user"></i> Profile</a>
									</li>
									<li>
										<a class="dropdown-item" href="#"><i class="icon-settings"></i>Paramettre</a>
									</li>
									<li class="dropdown-divider"></li>
									<li>
										<a class="dropdown-item" href="logout.php"><i class="icon-logout"></i> Deconnexion</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>