 <div class="nano-content sidebar-nav">
				
					<div class="card-body border-bottom text-center nav-profile">
						<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                        <img alt="profile" class="margin-b-10  " src="assets/img/avtar-2.png" width="80">
                        <p class="lead margin-b-0 toggle-none">
                            <?php
                                        //    if ($_SESSION['user']['username'] !== array()) {
                                         //       $users = $_SESSION['user']['username'];

                                         //       echo "$users";
                                          //  }
                                            ?>
                        </p>
                        <p class="text-muted mv-0 toggle-none">Bienvenue</p>						
                    </div>
					
                    <ul class="metisMenu nav flex-column" id="menu">
                        <li class="nav-heading"><span>MAIN</span></li>
						<li class="nav-item active"><a class="nav-link" href="index.php"><i class="fa fa-home"></i> <span class="toggle-none">Dashboard</span></a></li>						
                        <li class="nav-item">
                            <a class="nav-link"  href="javascript: void(0);" aria-expanded="false"><i class="fa fa-th-large"></i> <span class="toggle-none">Blogs <span class="fa arrow"></span></span></a>
                            <ul class="nav-second-level nav flex-column " aria-expanded="false">
								<li class="nav-item"><a class="nav-link" href="nblog.php">Nouveau</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Nos blogs</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="qr/"><i class="fa fa-money"></i> <span class="toggle-none">Operation</span></a></li>
					 
                        
                    </ul>
                </div>