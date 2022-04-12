<?php	
 require '../../config/database.php';
 if (!isset($_SESSION['PROFILE']['id_utilisateur']) || $_SESSION['PROFILE']['designation'] != 'admin') {
	header('location:../../');
 }
 else {
	$recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
	$recup_informations->execute([
		'id_utilisateur' => $_SESSION['PROFILE']['id_utilisateur']
	]);
	$user_infos = $recup_informations->fetch(PDO::FETCH_OBJ);
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="img" href="../../assets/img/ok.jpg">
 <link href="../../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../../assets/lib/toast/jquery.toast.min.css" rel="stylesheet">
		
        <!-- DataTables -->
        <link href="../../assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="../../assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
		 <link href="../../assets/lib/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css">
		 
        <!-- Custom Css-->
        <link href="../../assets/scss/style.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="top-bar primary-top-bar">
			<h1 class="text-center">Akiba</h1>
		</div>

        <section>
            
    
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                        <?php

   
$id_o = $_GET['id'];
$req = $db->prepare('SELECT * FROM offres WHERE id_o = ?');
$req->execute(array($id_o));


?>
                        
                        </div>
                        
                        <div class="card-body">
                         <div class="row">
                         
                         <?php while ($g = $req->fetch()) { ?>
                           <div class="col-md-12">
                           <div class="card text-center">
                             <div class="card-header">
                                 Status :
                             <?php
  $d = date("Y-m-d");
  $dd = $g['datef'];
   if($dd > $d){
       echo'<span class="badge badge-primary"> en cours</span>';
   }else{
    echo'<span class="badge badge-danger"> expirer</span>';
   }
?>
                               <p>Date publication<?= $g['created_at']; ?></p>  
                             offre numero <?= $g['id_o']; ?> / <?php $d = date('Y');  echo $d;?>
                             
                                 </div>
  <div class="card-body">
    <h5 class="card-title">Poste : <?= $g['poste']; ?></h5>
   <p>
   <?= $g['designation']; ?> 
   </p>
      <br>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Postuler</button>
  </div>
  <div class="card-footer text-muted">
  
  Offre disponible jusqu au : <?= $g['datef']; ?>
  </div>
</div>



<!-- modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Postuler</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                          
                          <div class="row">
                              <div class="col-md-6">
                                  <label for="">Un petit text</label>
                                <textarea name="designation" id="" cols="30" rows="10">

                                </textarea>
                              </div>
                              <input type="hidden" name="id_o" value="<?= $g['id_o']; ?>">
                              <input type="hidden" name="poste" value="<?= $g['poste']; ?>">
                              <div class="col-md-6">
                                  <label for="">Mon dossier</label>
                               <input class="form-control" type="file" name="file" required="" >
                                
                              </div>

                          </div>
                         
                    
                          
                           
                          
                          <br>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- end modal -->
                           </div>
                           <?php } ?>
                         </div>









                       

                        </div>
                    </div>
                </div>
            </div>
            

           

         

           
            

            <?php include '../../partials/_foot.php'; ?>


        </section>
    
</body>
</html>