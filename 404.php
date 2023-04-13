<?php 
session_start();
include_once('assets/database/config.php');
define("MENU","");
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:37 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || 404 Not Found</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
   <?php include("link.php"); ?>
</head>


<body class="sticky-header">
  
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
 
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
 <?php include("assets/menu.php") ?>
    <!-- End Header -->

    <section class="error-page onepage-screen-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <span class="title-highlighter highlighter-secondary"> <i class="fa fa-exclamation-circle"></i> Oops!!!</span>
                        <h1 class="title">Page Non trouvee</h1>
                        <p>Quelque chose s'est mal passé.</p>
                        <a href="index.php" class="axil-btn btn-bg-secondary right-icon">Retour a l'accueil <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                        <img src="assets/images/others/404.png" alt="404">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include("assets/service-area.php")?>
<?php include("assets/footer.php")?>
    <!-- End Footer Area  -->

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <?php include("script.php") ; ?>

    <!-- Main JS -->
    <script src="ajax/js/shop.js"></script>
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:37 GMT -->
</html>