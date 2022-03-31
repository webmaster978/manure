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

        
        <?php

   
$id_o = $_GET['id'];
$req = $db->prepare('SELECT * FROM offres WHERE id_o = ?');
$req->execute(array($id_o));


?>
    
</body>
</html>