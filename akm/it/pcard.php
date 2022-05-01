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

    
    $id_card = $_GET['id_card'];
    // $req = $db->prepare('');
    // $req->execute(array($id_card));


    $card = $db->prepare("SELECT * FROM card INNER JOIN tbl_agent ON card.STUDENTID=tbl_agent.STUDENTID WHERE id_card =:id_card");
	$card->execute([
		'id_card' => $id_card
	]);
	$carte = $card->fetch(PDO::FETCH_OBJ);


    ?>

<div>

 <div class="row">
<div class="col-md-2">
<img width="100px;" src="img/L.PNG" alt="">
</div>
<div class="col-md-8">
<h1 class="text-primary text-center">UNIVERSITE DE GOMA</h1>
<h1 class="text-primary text-center">UNIGOM</h1>
</div>
<div class="col-md-2">
<img width="100px;" src="img/dddd.PNG" alt="">
</div>
 </div>

 <div class="row">
   <div class="col-md-12">
  <div class="text-center">
  <h3>CARTE DE SERVICE || SERVICE CARD</h3>
  </div>
   </div>
 </div>
 <br>
 <br>
 <br>
 <br>
 <div class="row">
 <div class="col-md-6">
 <h3 style="text-align:center;">Matricule UNIGOM-<?=($carte->STUDENTID); ?></h3>
 
 <h3 style="text-align:center;">Noms : <?=ucwords($carte->nom_complet); ?></h3>
 <h3 style="text-align:center;">Domaine : <?=ucwords($carte->ref_domaine); ?></h3>
 </div>
 <div class="col-md-2">
   
 </div>
 <div clas="col-md-4">
  <img width="200px;" src="../avatars/<?=($carte->photo); ?>" alt="">
  <h3 style="text-align:center;">Code</h3>
  <h3 style="text-align:center;"><?=($carte->STUDENTID); ?></h3>
 </div>
 </div>
 <hr>
 <div class="row">
   <br>
   <br>
   <div class="col-md-6">
   <img width="300px;" src="bul/codes/<?=($carte->codeFile); ?>">
   <br>
   <br>
   <br>
  
   Recteur
   </div>
   <div class="col-md-6">
    <h4>REPUBLIQUE DEMOCRATIQUE DU CONGO</h4>
    <img style="margin-left:200px;" src="img/im.JPG" alt="">
    <h2 style="text-align:center">Laissez-passer</h2>
    <p>Les autorites tant Civils que Militaires et ce;;es de ;a police nationale sont priees d'apporter leur secours au porteur de la presente en cas de necessite</p>
   </div>

 </div>

</div>

</body>
</html>