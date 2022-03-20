<?php session_start();?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Presences</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="js/instascan.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    #divvideo {
        box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body style="background:#eee">
    <nav class="navbar" style="background:#2c3e50">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"> <i class="glyphicon glyphicon-qrcode"></i> </a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="../dashboard"><span class="glyphicon glyphicon-home"></span> Retour</a></li>


                <li><a href="#"><span class="glyphicon glyphicon-time"></span> Actualisé</a></li>
            </ul>
            <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="padding:10px;background:#fff;border-radius: 5px;" id="divvideo">
                <center>
                    <p class="login-box-msg"> <i class="glyphicon glyphicon-camera"></i> TAP HERE</p>
                </center>
                <video id="preview" width="100%" height="50%" style="border-radius:10px;"></video>
                <br>
                <br>
                <?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

            </div>

            <div class="col-md-4">
                <form action="CheckInOut.php" method="post" class="form-horizontal"
                    style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                    <i class="glyphicon glyphicon-qrcode"></i> <label>SCAN QR CODE</label>
                    <p id="time"></p>
                    <input type="text" name="studentID" id="text" placeholder="scan qrcode" class="form-control"
                        autofocus>
                </form>
                <div style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                    <table id="example2" class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <!-- <td>Identifiant</td> -->
                                <td>Heure d'entree</td>
                                <td>Heure de sortie</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="rh_manager";
                    
                        $conn = new mysqli($server,$username,$password,$dbname);
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                           $sql ="SELECT * FROM attendance LEFT JOIN tbl_agent ON attendance.STUDENTID=tbl_agent.STUDENTID WHERE LOGDATE='$date' ORDER BY TIMEOUT desc";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){

                             $myAudioFile = "audio/96.wav";
                            echo '<audio autoplay="true" style="display:none;">
                                <source src="'.$myAudioFile.'" type="audio/wav">
                            </audio>';
                        ?>
                            <tr>
                                <td><?php echo $row['nom_complet'];?></td>
                                <!-- <td><?php echo $row['STUDENTID'];?></td> -->
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['TIMEOUT'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                            </tr>




                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="col-md-4">
                <?php
                $sql ="SELECT * FROM attendance LEFT JOIN tbl_agent ON attendance.STUDENTID=tbl_agent.STUDENTID WHERE
                LOGDATE='$date' ORDER BY TIMEOUT desc LIMIT 1";
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()){
                ?>


                <img width="100%" height="50%" style="border-radius:10px;" src="../avatars/<?php echo $row['photo'];?>"
                    alt="photo agent">
                <?php } ?>
            </div>

        </div>

    </div>
    <script>
    function Export() {
        var conf = confirm("Confirmer si vous voulez importer dans excel");
        if (conf == true) {
            window.open("export.php", '_blank');
        }
    }
    </script>
    <script>
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert('Aucune camera trouver');
        }

    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(c) {
        document.getElementById('text').value = c;
        document.forms[0].submit();
    });
    </script>
    <script type="text/javascript">
    var timestamp = '<?=time();?>';

    function updateTime() {
        $('#time').html(Date(timestamp));
        timestamp++;
    }
    $(function() {
        setInterval(updateTime, 1000);
    });
    </script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>

</body>

</html>