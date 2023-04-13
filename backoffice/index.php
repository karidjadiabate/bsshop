<?php
session_start();

require_once('assets/config/config.php');


if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
  extract($_REQUEST);

  $login = addslashes($email);
  $password = md5(addslashes($password));
  // var_dump($password);exit;
  // $row    =   $db->getAllRecords('compte','*',' AND login="'.$login.'" AND password="'.$password.'"');
  $row    =   $db->getAllRecords('compte', '*', ' AND login="' . $login . '" AND password="' . $password . '" AND statut="1"');

  $nbUser = count($row);
  // var_dump($nbUser);
  // exit;
  if ($nbUser === 1) {
    // var_dump($row);
    // exit;
    $statut = $row[0]['statut'];

    if ($statut == 1) {

      // if(empty($row[0]['connected']) || is_null($row[0]['connected']) || $row[0]['connected'] == 0){

      $data   =   array(
        'connected' => 1,
      );

      $update =   $db->update('compte', $data, array('iduser' => $row[0]['iduser']));

      if ($password == md5('AttiekeService@2022')) {
        $_SESSION['userYopci']['id'] = $row[0]['iduser'];
        $_SESSION['userYopci']['login'] = $row[0]['login'];
        $_SESSION['userYopci']['statutSession'] = 2;
        header('location: changermotdepasse.php?msg=nouveau_compte');
        exit;
      }
      $profils    =   $db->getAllRecords('profil', '*', ' AND id="' . $row[0]['profil'] . '"');
      $sessionPages = $profils[0]['jsonPage'];

      $_SESSION['userYopci'] = $row[0];
      $_SESSION['userYopci']['sessionPages'] = $sessionPages;
      $_SESSION['userYopci']['statutSession'] = 1;

      if (!empty($_SESSION['lastUrluserYopci'])) {
        $lastUrluserYopci = explode('backoffice/', $_SESSION['lastUrluserYopci']);
        header('location: ' . $lastUrluserYopci[1]);
        exit;
      }

      header('location: main.php');
      exit;
      // }else{
      //   header('location:'.$_SERVER['PHP_SELF'].'?msg=connected');
      //   exit;
      // }
    } else {
      header('location:' . $_SERVER['PHP_SELF'] . '?msg=error');
      exit;
    }
  } else {
    header('location:' . $_SERVER['PHP_SELF'] . '?msg=error');
    exit;
  }
}
?>
<!DOCTYPE html>
<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo APP_NAME; ?></title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="plugins/costum.css" rel="stylesheet" />

    <!-- mono CSS -->
    <link id="main-css-href" rel="stylesheet" href="css/style.css" />




    <!-- FAVICON -->
    <link href="images/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="plugins/nprogress/nprogress.js"></script>
  </head>

</head>

<body class="bg-light-gray" id="body" style="background-image:url('images/elements/ecommerce busines.webp');background-repeat:no repeat;background-size:cover;">
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">

    <div class="d-flex flex-column justify-content-between">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
          <div class="card card-default mb-0">
            <div class="card-header pb-0">
              <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                <a class="w-auto pl-0" href="<?php echo PATH?>">
                  <img src="<?php echo PATH ?>images/logo.png" alt="logo image">
                  <span class="brand-name text-dark"><b><?php echo APP_NAME ?></b></span>
                </a>
              </div>
            </div>
            <div class="card-body px-5 pb-5 pt-0">
              <h4 class="text-dark mb-6 text-center mt-4"><b>SE CONNECTER</b></h4>
              <?php
              if (isset($_GET['msg']) && $_GET['msg'] == "error")
                echo '<div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                    <strong>Erreur de connexion!</strong> <br>Parametres de connexion incorrects
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    </div>';
              if (isset($_GET['msg']) && $_GET['msg'] == "deconnecte")
                echo '<div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                    <strong>Déconnexion!</strong> <br>Vous vous etes déconnectés
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    </div>';
              ?>

              <form action="">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" name="email" required class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="email">
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" name="password" required class="form-control input-lg" id="password" placeholder="Mot de passe">
                  </div>
                  <div class="col-md-12">

                    <div class="d-flex justify-content-between mb-3">

                      <!-- <div class="custom-control custom-checkbox mr-3 mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Se souvenir de moi</label>
                      </div> -->

                      <!-- <a class="text-color" href="#"> Forgot password? </a> -->

                    </div>

                    <button type="submit" value="submit" name="submit" class="btn btn-primary  mb-4">Se connecter</button>

                    <!-- <p>Don't have an account yet ?
                            <a class="text-blue" href="sign-up.html">Sign Up</a>
                          </p> -->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
  <script src="plugins/prism/prism.js"></script>
  <script src="plugins/toaster/toastr.min.js"></script>
  <script src="js/mono.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/map.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>