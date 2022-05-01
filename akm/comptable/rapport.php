<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Notre historique de depot du <?php $da = date('Y-m-d'); echo $da ?></title>

        <!-- Common Plugins -->
       <?php include '../../partials/_linko.php'; ?>
		
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
          .mage{
            width: 100px;
          }
        </style>
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
		
        <div class="row page-header">
			<div class="col-lg-6 align-self-center ">
			    <h2>Mon historique de depot</h2>
				
			</div>
		</div>

       

                          
                          <section class="main-content">
                              <h1>Notre historique du <?php $da = date('Y-m-d'); echo $da ?></h1>
            <div class="row w-no-padding margin-b-30">
            <?php $requete=$db->query("SELECT * FROM tbl_agent WHERE fonction!=''"); ?>
            <?php while ($g = $requete->fetch()) { ?>
							
				<div class="col-md-6">
                    <div class="widget  bg-light">
                        <div class="row row-table ">
                            <div class="margin-b-30">
								<h2 class="margin-b-5"><?= $g['nom_complet']; ?></h2>
								<p class="text-muted">Total <?php $da = date('Y-m-d'); echo $da ?></p>
								<span class="float-right text-success widget-r-m">1385</span>
                                <a class="btn btn-success float-right" href="jour?id_agent=<?= $g['id_utilisateur']; ?>">Detail</a>
							</div>
                            
                            <br>
							<div class="progress margin-b-10 progress-mini">
								<div style="width:85%;" class="progress-bar bg-success"></div>
							</div>
							<!-- <p class="text-muted float-left margin-b-0">Change</p>
							<p class="text-muted float-right margin-b-0">85%</p> -->
                        </div>
                    </div>
                </div>
				<?php } ?>

            </div>
			
			

				
           <?php include '../../partials/_foot.php'; ?>

        </section>                        
                       

        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../../partials/_scripto.php'; ?>


    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>