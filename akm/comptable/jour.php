<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
        <?php 
        require'../../config/base.php';
   
   $id_utilisateur = $_GET['id_agent'];
                        $ag = $db->prepare('SELECT * FROM tbl_agent WHERE id_utilisateur=:id_utilisateur');
$ag->execute(array(
  'id_utilisateur' => $_GET['id_agent']
  
));

$aa = $ag->fetchAll(PDO::FETCH_OBJ);
foreach ($aa as $ss) :
 
    ?>
Rapport du
<?php $daaa= date('Y-m-d'); echo $daaa ?> de <?= $ss->nom_complet; ?>

<?php
endforeach;


?>
        </title>

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
            <?php 
   
   $id_utilisateur = $_GET['id_agent'];
                        $ag = $db->prepare('SELECT * FROM tbl_agent WHERE id_utilisateur=:id_utilisateur');
$ag->execute(array(
  'id_utilisateur' => $_GET['id_agent']
  
));

$aa = $ag->fetchAll(PDO::FETCH_OBJ);
foreach ($aa as $ss) :
 
    ?>
			    <h2> Rapport du <?php $daaa= date('Y-m-d'); echo $daaa ?> de <?= $ss->nom_complet; ?></h2>
	
                <?php
endforeach;


?>
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
               
                          <div class="col" align="right">
                          <!-- <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button> -->
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>MONTANT</th>
                                                    
                                                    <th>CLIENT</th> 
                                                    <th>DATE OPERATION</th> 
                                                    
                                                </tr>
                                            </thead>
   <?php 
   $date_o = date('Y-m-d');
   $id_agent = $_GET['id_agent'];
                        $service = $db->prepare('SELECT * FROM depot INNER JOIN tbl_agent ON depot.id_user=tbl_agent.id_utilisateur WHERE id_agent=:id_agent AND date_o=:date_o ORDER BY id_depot DESC');
$service->execute(array(
  'id_agent' => $_GET['id_agent'],
  'date_o' => $date_o
));

$don = $service->fetchAll(PDO::FETCH_OBJ);
foreach ($don as $s) :
 
    ?>

                                            
                                             
                                                <tr>
                                                    <td><?= $s->id_depot; ?></td>
                                                   <td><?= $s->montant; ?></td>
                                                   <td><?= $s->nom_complet; ?></td>
                                                   <td><?= $s->created_at; ?></td>
                                                   
                                                  
                                                </tr>
                                                <?php
endforeach;


?>
                                            </tbody>
                                        </table>

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
      <?php include '../../partials/_scripto.php'; ?>


    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>