<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:26:21 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil</title>
		<?php include '../../partials/_linka.php'; ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

			<!-- ============================================================== -->
			<!-- 						Topbar Start 							-->
			<!-- ============================================================== -->
			<div class="top-bar primary-top-bar">
			<?php include 'part/_side.php'; ?>
		</div>
		<!-- ============================================================== -->
		<!--                        Topbar End                              -->
		<!-- ============================================================== -->
		
		
		<!-- ============================================================== -->
		<!--                        Right Side Start                        -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!--                        Right Side End                          -->
		<!-- ============================================================== -->
		

        <!-- ============================================================== -->
		<!-- 						Navigation Start 						-->
		<!-- ============================================================== -->
       <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
		<!-- 						Navigation End	 						-->
		<!-- ============================================================== -->

			
		<!-- ============================================================== -->
		<!-- 						Content Start	 						-->
		<!-- ============================================================== -->
		 <div class="row page-header"><div class="col-lg-6 align-self-center ">
			  <h2>Profile</h2>
				<ol class="breadcrumb">
					
					<li class="breadcrumb-item active">Profile</li>
				</ol></div></div>

        <section class="main-content">

            <div class="row">
                <div class="col-md-4">
                    <div class="widget white-bg">
                        <div class="padding-20 text-center">
						 <img alt="Profile Picture" width="140" class="rounded-circle mar-btm margin-b-10 circle-border " src="../avatars/<?= $user_infos->photo; ?>">
                            <p class="lead font-500 margin-b-0"><?= ucwords($user_infos->nom_complet); ?></p>
                            <p class="text-muted"><?= ucwords($user_infos->designation); ?></p>
                            <p class="text-muted"><?=($user_infos->STUDENTID); ?></p>
                            <!-- <p class="text-sm margin-b-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p> -->
                            <hr>
                            <ul class="list-unstyled margin-b-0 text-center row">
                                <li class="col-4">
                                    <span class="font-600">Type de mutualite</span>
                                    <p class="text-muted text-sm margin-b-0"><?= ucwords($user_infos->ref_domaine); ?></p>
                                </li>
                                <li class="col-4">
                                    <span class="font-600">Montant</span>
                                    <p class="text-muted text-sm margin-b-0"><?= ucwords($user_infos->ref_grade); ?></p>
                                </li>
                                <li class="col-4">
                                    <span class="font-600">Zone</span>
                                    <p class="text-muted text-sm margin-b-0"><?= ucwords($user_infos->ref_niveau); ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="col-8">
						
					 <div class="card">
                        <div class="card-body">
						<div class="tabs">
						<ul class="nav nav-tabs">
                          
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                       </ul>

                        <div class="tab-content">
                            
                            <div role="tabpanel" class="tab-pane active" id="profile">
                               <div class="widget white-bg">
                                    <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Nom complet</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->nom_complet); ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Contact</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->numero_tel); ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?=($user_infos->mail); ?></p>
                                            </div>
                                          
                                    </div>
									<hr>
									   <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Sexe</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->sexe); ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Date naissance</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->date_naiss); ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Lieu naissance</strong>
                                                <br>
                                                <p class="text-muted"><?=($user_infos->adresse); ?></p>
                                            </div>
                                           
                                    </div>
									<hr>
									   <div class="row">
                                           
                                            <div class="col-md-12 col-xs-6 b-r"> <strong>Contact</strong>
                                                <br>
                                                <p class="text-muted"><?= ucwords($user_infos->numero_tel); ?></p>
                                            </div>
                                           
                                            
                                    </div>
									
									
									
								
							  </div>
                            </div>

                        </div>
                    </div>
					</div>
					</div>
				
                </div>
            </div>

            

           <?php include '../../partials/_foot.php'; ?>


        </section>
		
     
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->

		
        <!-- Common Plugins -->
       <?php include '../../partials/_scripta.php'; ?>
		
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:27:14 GMT -->
</html>