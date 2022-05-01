<?php
include'../../config/base.php';

    $id = $_GET['id'];
    

    // $req = $db->prepare('');
    // $req->execute(array($id_card));


    $card = $db->prepare("SELECT * FROM attendance INNER JOIN tbl_agent ON attendance.STUDENTID=tbl_agent.STUDENTID WHERE id =:id");
	$card->execute([
		'id' => $id
	]);
	$carte = $card->fetch(PDO::FETCH_OBJ);


    ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historique de payement de :: <?=($carte->nom_complet); ?> </title>

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
      <!--            Topbar Start              -->
      <!-- ============================================================== -->
      <div class="top-bar primary-top-bar">
      <?php include 'part/_side.php'; ?>
    </div>
    <!-- ============================================================== -->
    <!--                        Topbar End                              -->
    <!-- ============================================================== -->
  
    <?php 
if (isset($_POST['payer'])) {
    extract($_POST);
    $date_o = date('Y-m-d');
  $req=$db->prepare("INSERT INTO depot (id_user,montant,id_agent,date_o) VALUES (:id_user,:montant,:id_agent,:date_o)");

  $res=$req->execute(array(
    'id_agent' => $_SESSION['PROFILE']['id_utilisateur'],
    
    'id_user' => $id_user,
    'montant' => $montant,
    'date_o' => $date_o
    
  ));
  if ($res) {
     echo "
     <script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Payement effectuer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>
     ";
  }else{
      echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Operation non effectuer!',
                         footer: ''
                          })
                  </script>";
  
  }
  }




 ?>
    
    <!-- ============================================================== -->
    <!--                        Right Side Start                        -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!--                        Right Side End                          -->
    <!-- ============================================================== -->


        <!-- ============================================================== -->
    <!--            Navigation Start            -->
    <!-- ============================================================== -->
        <?php include 'part/_menu.php'; ?>
        <!-- ============================================================== -->
    <!--            Navigation End              -->
    <!-- ============================================================== -->

    
        <!-- ============================================================== -->
    <!--            Content Start             -->
    <!-- ============================================================== -->
    
        <div class="row page-header">
      <div class="col-lg-6 align-self-center ">
          <h2>Le compte de : <?=($carte->nom_complet); ?> || <?=($carte->ref_grade); ?> FC/versement || <?=($carte->secteur); ?></h2>
        
      </div>
    </div>

        <section class="main-content">
       

      
          <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Historique de payement de  <?=($carte->nom_complet); ?>
                          <div class="col" align="right">
                              
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>MONTANT</th>
                                                    <th>AGENT</th> 
                                                    <th>DATE OPERATION</th>                                                                                                      
                                                    <!-- <th>ACTION</th> -->
                                                </tr>
                                            </thead>
<?php $rec=$db->query("SELECT * FROM depot INNER JOIN tbl_agent ON depot.id_agent=tbl_agent.id_utilisateur ORDER BY id_depot DESC"); ?>

                                            <tbody>
                                               <?php while ($us= $rec->fetch()) { ?>

                                                <tr>
                                                    <td><?= $us['id_depot']; ?></td>
                                                   <td><?= $us['montant']; ?></td>
                                                   <td><?= $us['nom_complet']; ?></td>
                                                   <td><?= $us['created']; ?></td>
                                                   
                                                   <!-- <td>
                                                   <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg<?= $us['id_utilisateur']; ?>"><i class="fa fa-pencil"></i></button>
                                                   </td> -->
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel"> Nouveau payement de <?=($carte->nom_complet); ?> </h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                          <div class="row">
                              <div class="col-md-6">
                              <label for=""><?=($carte->nom_complet); ?></label>
                              <input type="hidden" name="id_user" value="<?=($carte->id_utilisateur); ?>">
                              </div>
                              <div class="col-md-6">
                              <label for="">Montant a payer : <?=($carte->ref_grade); ?> FC </label>
                              <input type="hidden" name="montant" value="<?=($carte->ref_grade); ?>">
                              </div>
                              

                          </div>
                          <br>
                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="payer" class="btn btn-primary">Payer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

           

      
            

            

           <?php include '../../partials/_foot.php'; ?>


        </section>
        <!-- ============================================================== -->
    <!--            Content End               -->
    <!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../../partials/_scripto.php'; ?>
      


        

     
    </body>
   

</html>