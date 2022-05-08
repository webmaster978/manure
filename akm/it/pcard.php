<?php include'../../config/base.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<link rel="stylesheet" href="../../assets/lib/bootstrap/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="card.css">

<body onload="window.print(); window.close();">
  

<?php

    
    $id_utilisateur = $_GET['id_card'];
    // $req = $db->prepare('');
    // $req->execute(array($id_card));


    $card = $db->prepare("SELECT * FROM tbl_agent WHERE id_utilisateur =:id_utilisateur");
	$card->execute([
		'id_utilisateur' => $id_utilisateur
	]);
	$carte = $card->fetch(PDO::FETCH_OBJ);


    ?>

<div>

 <div class="row">
<div class="col-md-2">
<img width="100px;" src="img/.PNG" alt="">
</div>
<div class="col-md-8">
<h1 class="text-success text-center">AKIBA COMPAGNIE</h1>
<h3 class="text-center">Fiche d'identification du membre</h3>
</div>
<div class="col-md-2">

</div>
 </div>



</body>
</html>