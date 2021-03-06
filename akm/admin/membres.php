<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Membres</title>

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
    <?php  

if (isset($_POST['submit'])) {
   function imgup()
{
  
  $url_img=basename($_FILES['img']['name']);
  $nom_complet=htmlspecialchars($_POST['nom_complet']);
  $sexe=htmlspecialchars($_POST['sexe']);
  $numero_tel=htmlspecialchars($_POST['numero_tel']);
  $date_naiss=htmlspecialchars($_POST['date_naiss']);
  $adresse=htmlspecialchars($_POST['adresse']);
 $tribut = htmlspecialchars($_POST['tribut']);
  $ref_domaine=htmlspecialchars($_POST['ref_domaine']);
  $ref_grade=htmlspecialchars($_POST['ref_grade']);
  $ref_niveau=htmlspecialchars($_POST['ref_niveau']);
  $mail = htmlspecialchars($_POST['mail']);
  $etat_civil=htmlspecialchars($_POST['etat_civil']);
  $secteur = htmlspecialchars($_POST['secteur']);



$verif_img=getimagesize($_FILES['img']['tmp_name']);

  if (isset($_FILES['img']) AND $_FILES['img']['error']== 0){
if ($_FILES['img']['size'] <= 2000000){


$infosfichier = pathinfo($_FILES['img']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['img']['tmp_name'],'../avatars/'.$url_img)){
   require '../../config/base.php';
    $check_query = "SELECT * FROM tbl_agent 
            WHERE nom_complet=:nom_complet
           ";
          $statement = $db->prepare($check_query);
          $check_data = array(
             ':nom_complet'   =>  $nom_complet
             
          );
          if($statement->execute($check_data))  
         {
            if($statement->rowCount() > 0)
             {
                echo "<script>
                         Swal.fire({
                          icon: 'error',
                           title: 'Oops...',
                      text: 'Cet membre existe deja!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
  
            $req=$db->prepare('INSERT INTO tbl_agent(nom_complet,photo,sexe,numero_tel,date_naiss,tribut,adresse,ref_domaine,ref_grade,ref_niveau,mail,etat_civil,secteur) VALUES (:nom_complet,:photo,:sexe,:numero_tel,:date_naiss,:tribut,:adresse,:ref_domaine,:ref_grade,:ref_niveau,:mail,:etat_civil,:secteur)');
            $req->execute(array(
            'photo' => $_FILES['img']['name'],
            'nom_complet' => $nom_complet,
            'sexe' => $sexe,
            'numero_tel' => $numero_tel,
            'date_naiss' => $date_naiss,
            'adresse' => $adresse,
             'tribut' => $tribut,
            'ref_domaine' => $ref_domaine,
            'ref_grade' => $ref_grade,
            'ref_niveau' => $ref_niveau,
            'mail' => $mail,
            'etat_civil' => $etat_civil,
            'secteur' => $secteur
            ));
            
        
if ($req) {
  echo "<script>
                Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Agent inserer avec success',
                    showConfirmButton: false,
                     timer: 1500
                   })

            </script>";
}else{
  echo "<script>
                     Swal.fire({
                      icon: 'error',
                       title: 'Oops...',
                  text: 'Agent non inserer!',
                     footer: ''
                      })
              </script>";
}
return true;

}
}
}
}

}


      }

      else{

          unlink($_FILES['img']['tmp_name']);
          unset($_FILES['img']);



      }
    }


}



if(imgup()){



}
}
// var_dump($_FILES);

?>
		
		
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
			    <h2>Nos membres</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des membres
                          <div class="col" align="right">
                          <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i></button>
                                    
                                </div>
                        </div>
                        
                        <div class="card-body">
                            <table id="datatable2" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NOM COMPLET</th>
                                                    <th>MATRICULE</th>
                                                    <th>ZONE</th>
                                                    <th>MONTANT</th>
                                                    <th>TYPE</th>
                                                    <th>DATE NAISSANCE</th>
                                                    <th>LIEU NAISSANCE</th>
                                                    <th>TELEPHONE</th>
                                                    <th>EMAIL</th>
                                                    <th>ETAT CIVIL</th>
                                                     <th>GENRE</th>
                                                    <th>PHOTO</th>
                                                    <th>Date de creation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
<?php $requete=$db->query("SELECT * FROM tbl_agent INNER JOIN fonct ON tbl_agent.ref_fonction=fonct.id_fonction"); ?>

                                            <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>
                                                
                                                <tr>
                                                    <td><?= $g['id_utilisateur']; ?></td>
                                                    
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?= $g['STUDENTID']; ?></td>
                                                   <td><?= $g['ref_niveau']; ?></td>
                                                   <td><?= $g['ref_grade']; ?></td>
                                                   <td><?= $g['ref_domaine']; ?></td>
                                                  <td><?= $g['date_naiss']; ?></td>
                                                   <td><?= $g['adresse']; ?></td>
                                                   <td><?= $g['numero_tel']; ?></td>
                                                   <td><?= $g['mail']; ?></td>
                                                   <td><?= $g['etat_civil']; ?></td>
                                                   <td><?= $g['sexe']; ?></td>
                                                   <td><img class="mage" src="../avatars/<?= $g['photo']; ?>"></td>

                                                   <td><?= $g['created_at']; ?></td>
                                                   <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?= $g['id_utilisateur']; ?>">
 <i class="fa fa-pencil"></i>
</button>
                                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?= $g['id_utilisateur']; ?>"><i class="fa fa-eye"></i>
                                                        
                                                     </button>
                                                    
                                                   </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                        </div>
                    </div>
                </div>
            </div>
<!-- Button trigger modal -->


<!-- Modal -->

            

            

           <?php include '../../partials/_foot.php'; ?>


        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../../partials/_scripto.php'; ?>

      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        <h5 class="modal-title" id="myModalLabel">Nouveau agent</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                          <div class="row">
                             <div class="col-md-12">
                             <input class="form-control" type="text" name="nom_complet" placeholder="nom complet du membre" required="">
                             </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="tribut" placeholder="tribut du membre" required="">
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="sexe" required="">
                                   <option value="Masculin">Masculin</option>
                                   <option value="Feminin">Feminin</option>
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="number" placeholder="Numero de telephone" name="numero_tel" required="">
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="date" name="date_naiss" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="adresse" placeholder="Lieu naissance" required="">
                              </div>
                              <div class="col-md-6">
                                <input class="form-control" type="text" name="secteur" placeholder="Secteur activite">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_domaine" required="">
                                   <option>-type-</option>
                                  <?php $rdom=$db->query("SELECT * FROM domaine"); ?>
                                                <?php while ($g = $rdom->fetch()) { ?>
                                 
                                  <option value="<?= $g['ndomaine']; ?>"><?= $g['ndomaine']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <select class="form-control" name="ref_grade" required="">
                                  <option>-montant-</option>
                                   <?php $recupgrade=$db->query("SELECT * FROM grade"); ?>
                                                <?php while ($grade = $recupgrade->fetch()) { ?>
                                   
                                   <option value="<?= $grade['ngrade']; ?>"><?= $grade['ngrade']; ?></option>
                                   <?php } ?>
                                 </select>
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="ref_niveau" required="">
                                  <option>-zone-</option>
                                  <?php $recupniveau=$db->query("SELECT * FROM niveau"); ?>
                                                <?php while ($niv = $recupniveau->fetch()) { ?>
                                  
                                  <option value="<?= $niv['nniveau']; ?>"><?= $niv['nniveau']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="email" name="mail" placeholder="Email" required="">
                              </div>

                          </div>
                          <br>
                           <div class="row">
                              <div class="col-md-6">
                                <select class="form-control" name="etat_civil" required="">
                                  <option>-etat civil-</option>
                                  <option value="celibataire">celibataire</option>
                                  <option value="mariee">mariee</option>
                                  <option value="divorce">divorce</option>
                                  <option value="">celibataire</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                 <input class="form-control" type="file" name="img" required="" >
                                 
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
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>