<?php include'../../config/base.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<h1 class="text-success text-center"></h1>
</div>
<div class="col-md-2">
<img width="100px;" src="img/dddd.PNG" alt="">
</div>
 </div>

 <div class="row">
   <div class="col-md-12">
  <div class="text-center">
  <h3>FICHE DE <?=ucwords($carte->nom_complet); ?> </h3>
  </div>
   </div>
 </div>
 <br>
 <br>
 <br>
 <br>
 <div class="row">
 <div class="col-md-4">
 
 <h3 style="text-align:center;">Noms : <?=ucwords($carte->nom_complet); ?></h3>
 
 </div>
 <div class="col-md-2">

 </div>

 <div clas="col-md-4">
  <img width="200px;" src="../avatars/<?=($carte->photo); ?>" alt="">
  <h3 style="text-align:center;">Code</h3>
  <h3 style="text-align:center;"><?=($carte->STUDENTID); ?></h3>
 </div>
 </div>



</div>

</body>
</html>