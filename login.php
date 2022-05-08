<?php

    require 'config/database.php';
    if(isset($_SESSION['PROFILE']['id_utilisateur'])) {
        switch ($_SESSION['PROFILE']['designation']) {
            case 'client':
                header('location: ./akm/client/');
            break;
            case 'agent':
                header('location: ./akm/agent/');
            break;
            
            case 'admin':
                header('location: ./akm/admin/');
            break;
            case 'it':
                header('location: ./akm/it/');
                 break;
                 case 'comptable':
                    header('location: ./akm/comptable/');
                     break;
            
            default:
                header('location: ./');
                die('aucune service');
            break;
        }
    }

    if(isset($_POST['btn_submit'])) {
        extract($_POST);
        $sql = "SELECT * FROM authentification  WHERE (username=:username OR email=:email) AND password=:password";
        $req = $db->prepare($sql);
        $req->execute([
            'username' => htmlspecialchars(trim($username)),
            'email' => $username,
            'password' => sha1($password)
        ]);
        
        if($informations = $req->fetch()) { /*Si l'adresse et le mot de passe sont vrai*/
            $_SESSION['TMP_PROFILE'] = $informations;
            //echo $_SESSION['TMP_PROFILE']['ref_utilisateur'];
            
            $recup_informations = $db->prepare("SELECT * FROM fonction INNER JOIN tbl_agent ON fonction.id_fonction=tbl_agent.ref_fonction WHERE id_utilisateur=:id_utilisateur");
            $recup_informations->execute([
            'id_utilisateur' => $_SESSION['TMP_PROFILE']['ref_utilisateur']
            ]);

            while($session = $recup_informations->fetch()) {
                $_SESSION['PROFILE'] = $session;
            }
            
            switch ($_SESSION['PROFILE']['designation']) {
                 case 'client':
                 header('location: ./akm/client/');
                 break;
               
                  case 'admin':
                header('location: ./akm/admin/');
                 break;
                 case 'agent':
                header('location: ./akm/agent/');
                 break;
                 case 'it':
                    header('location: ./akm/it/');
                     break;
                     case 'comptable':
                        header('location: ./akm/comptable/');
                         break;
                default:
                    header('location: ./');
                    die('aucune service');
                break;
            }
        }
        else{
            $error = '';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/counselor/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Oct 2021 05:48:38 GMT -->
<head>
<title>Login</title>
<meta charset="utf-8">
<?php include 'part/_link.php'; ?>
</head>

<body>
<div class="wrap">
<div class="container">
<div class="row">
<div class="col-md-6 d-flex align-items-center">
<?php include'part/_phone.php'; ?>
</div>
<div class="col-md-6 d-flex justify-content-md-end">
<div class="social-media">
<p class="mb-0 d-flex">
<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
</p>
</div>
</div>
</div>
</div>
</div>

<?php include'part/_nav.php'; ?>

<section class="hero-wrap hero-wrap-2" style="background-image:url(img/12.jpg)" data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
<div class="row no-gutters slider-text align-items-end justify-content-center">
<div class="col-md-9 ftco-animate mb-5 text-center">
<p class="breadcrumbs mb-0"><span class="mr-2"><a href="akiba">Home <i class="fa fa-chevron-right"></i></a></span> <span>Connexion <i class="fa fa-chevron-right"></i></span></p>
<h1 class="mb-0 bread">Connexion</h1>
</div>
</div>
</div>
</section>
<section class="ftco-section bg-light">
<div class="container">

<div class="row no-gutters">
<div class="col-md-12">
<div class="contact-wrap w-100 p-md-5 p-4">
<h3 class="mb-4 text-center">Connectez-vous</h3>
<div id="errorConnection" style="margin-top: 30px; margin-bottom: 30px">
                                    <?php if(isset($error)) : ?>
                                    <div class="alert alert-danger" onclick="document.querySelector('#errorConnection').style.display = 'none';">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="color: red"><b>Informations incorrectes !</b></span>
                                    </div>
                                    <?php endif; ?>
                                </div> 

<form method="POST" id="contactForm" name="contactForm" class="contactForm">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label class="label" for="name">Nom d'utilisateur ou email</label>
<input type="text" class="form-control" name="username" value="<?= (isset($username)) ? $username : ''; ?>" id="name" placeholder="Nom d'utilisateur ou email">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="label" for="email">Mot de passe </label>
<input type="password" class="form-control" name="password" value="<?= (isset($password)) ? $password : ''; ?>" id="email" placeholder="mot de passe">
</div>
</div>
 <input class="btn btn-primary" name="btn_submit" type="submit" value="Se connecter">

</div>
</form>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>
<?php include 'part/_foot.php'; ?>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js%2bpopper.min.js%2bbootstrap.min.js.pagespeed.jc.FdE0LLHPtd.js"></script><script>eval(mod_pagespeed_0IKV_M5RZ3);</script>
<script>eval(mod_pagespeed_ptxjWeof0U);</script>
<script>eval(mod_pagespeed_bBlIsR7yNd);</script>
<script src="js/jquery.easing.1.3.js%2bjquery.waypoints.min.js%2bjquery.stellar.min.js%2bowl.carousel.min.js.pagespeed.jc.BjfGsSo9t6.js"></script><script>eval(mod_pagespeed_XPJPs8heUT);</script>
<script>eval(mod_pagespeed_0Vd62sSGQl);</script>
<script>eval(mod_pagespeed_sQMEucBk8w);</script>
<script>eval(mod_pagespeed_MFMeUqlpON);</script>
<script src="js/jquery.magnific-popup.min.js%2bjquery.animateNumber.min.js%2bscrollax.min.js%2bgoogle-map.js%2bmain.js.pagespeed.jc.thsj8F_sbV.js"></script><script>eval(mod_pagespeed_uMNo4risex);</script>
<script>eval(mod_pagespeed_veeYaXkxVX);</script>
<script>eval(mod_pagespeed_YLBUkqL3Ci);</script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script> -->
<script>eval(mod_pagespeed_3dI32cF92X);</script>
<script>eval(mod_pagespeed_6JMgnU0XKP);</script>

<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="js/beacon.min.js" data-cf-beacon='{"rayId":"6a18305a74594f87","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.10.0","si":100}'></script>
<script defer src="js/beacon.min.js" data-cf-beacon='{"rayId":"6a18305a6c124f87","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.10.0","si":100}'></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/counselor/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Oct 2021 05:48:38 GMT -->
</html>