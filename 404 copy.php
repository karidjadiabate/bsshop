<?php 
session_start();
include_once('assets/database/config.php');
?>
<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo APP_NAME; ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/sal.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/base.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="backoffice/css/swal.css">
    <link rel="stylesheet" href="assets/css/toastr.min.css">
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="backoffice/js/swal2.min.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/toast.js"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
  <div class="d-flex flex-column justify-content-between">
    <div class="row justify-content-center mt-5">
      <div class="text-center page-404">
        <h1 class="error-title"style="font-size:100px">404</h1>
        <p class="pt-4 pb-5 error-subtitle"style="font-size:30px">On dirait que quelque chose s'est mal passé..</p>
        <a href="<?php echo PATH ?>" class="btn text-white"style="font-size:20px;background-color:#84ADEA">Aller a l'accueil</a>
      </div>
    </div>
  </div>
</div>


</body>
</html>
