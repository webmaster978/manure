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
    <link rel="icon" type="img" href="../../../assets/img/ok.jpg">
 <link href="../../../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../../../assets/lib/toast/jquery.toast.min.css" rel="stylesheet">
		
        <!-- DataTables -->
        <link href="../../../assets/lib/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="../../../assets/lib/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
		 <link href="../../../assets/lib/datatables/buttons.dataTables.css" rel="stylesheet" type="text/css">
		 
        <!-- Custom Css-->
        <link href="../../../assets/scss/style.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="top-bar primary-top-bar">
			<h1 class="text-center">Akiba Soft</h1>
		</div>

        <section>
            
    
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-default">
                        <?php

   
$id = $_GET['id'];
$req = $db->prepare('SELECT * FROM attendance LEFT JOIN tbl_agent ON attendance.STUDENTID=tbl_agent.STUDENTID WHERE id=?');
$req->execute(array($id));


?>
                        
                        </div>
                        <?php while ($g = $req->fetch()) { ?>
                            <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                           <h5 class="card-title">Nom : <?= $g['nom_complet']; ?></h5>
                           </div>
                        </div>
                        </div>
                        <?php } ?>
                        
                        
                    </div>
                </div>
            </div>
            

           

         

           
            

            <?php include '../../../partials/_foot.php'; ?>


        </section>
    
</body>
</html>