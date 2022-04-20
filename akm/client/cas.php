<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:28:59 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>agents</title>

        <!-- Common Plugins -->
       <?php include '../partials/_linko.php'; ?>
		
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
  $ref_fonction=htmlspecialchars($_POST['ref_fonction']);
  $ref_domaine=htmlspecialchars($_POST['ref_domaine']);
  $ref_grade=htmlspecialchars($_POST['ref_grade']);
  $ref_niveau=htmlspecialchars($_POST['ref_niveau']);
  $email=htmlspecialchars($_POST['email']);
  $etat_civil=htmlspecialchars($_POST['etat_civil']);



$verif_img=getimagesize($_FILES['img']['tmp_name']);

  if (isset($_FILES['img']) AND $_FILES['img']['error']== 0){
if ($_FILES['img']['size'] <= 2000000){


$infosfichier = pathinfo($_FILES['img']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['img']['tmp_name'],'avatars/'.$url_img)){
   require '../config/base.php';
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
                      text: 'Cet agent existe deja!',
                         footer: ''
                          })
                  </script>";
             }
        
          else
          {
            if ($statement->rowCount() == 0 ) {
  
            $req=$db->prepare('INSERT INTO tbl_agent(nom_complet,photo,sexe,numero_tel,date_naiss,adresse,ref_fonction,ref_domaine,ref_grade,ref_niveau,email,etat_civil) VALUES (:nom_complet,:photo,:sexe,:numero_tel,:date_naiss,:adresse,:ref_fonction,:ref_domaine,:ref_grade,:ref_niveau,:email,:etat_civil)');
            $req->execute(array(
            'photo' => $_FILES['img']['name'],
            'nom_complet' => $nom_complet,
            'sexe' => $sexe,
            'numero_tel' => $numero_tel,
            'date_naiss' => $date_naiss,
            'adresse' => $adresse,
            'ref_fonction' => $ref_fonction,
            'ref_domaine' => $ref_domaine,
            'ref_grade' => $ref_grade,
            'ref_niveau' => $ref_niveau,
            'email' => $email,
            'etat_civil' => $etat_civil
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
			    <h2>Nos agents</h2>
				
			</div>
		</div>

        <section class="main-content">
			 

			
			    <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                          Liste des cas sociaux
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
                                                    <th>CAS SOCIAUX</th>
                                                    <th>DATE CAS</th>
                                                    <th>DETAILS</th>
                                                    
                                                    <th>Date de creation</th>
                                                </tr>
                                            </thead>
<!-- <?php $requete=$db->query("SELECT * FROM cas_sociaux INNER JOIN tbl_agent ON cas_sociaux.id_agent=tbl_agent.id_agent"); ?> -->

                                         <!--    <tbody>
                                              <?php while ($g = $requete->fetch()) { ?>
                                                <tr>
                                                    <td><?= $g['id_d']; ?></td>
                                                   <td><?= $g['nom_complet']; ?></td>
                                                   <td><?= $g['cas']; ?></td>
                                                   <td><?= $g['dates']; ?></td>
                                                   <td><?= $g['detail']; ?></td>
                                                  

                                                   <td><?= $g['created_at']; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody> -->
                                        </table>

                        </div>
                    </div>
                </div>
            </div>

			
            

            

           <?php include '../partials/_foot.php'; ?>


        </section>
        <!-- ============================================================== -->
		<!-- 						Content End		 						-->
		<!-- ============================================================== -->



        <!-- Common Plugins -->
      <?php include '../partials/_scripto.php'; ?>

     
    </body>

<!-- Mirrored from www.aksisweb.com/theme/fixed/layouts-1/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Feb 2021 22:29:11 GMT -->
</html>