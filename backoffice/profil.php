<?php
session_start();

include_once('assets/config/config.php');
include_once('assets/config/connected.php');
include_once('assets/config/Database.php');
define('MENU', 'PROFIL');
$profil=$_SESSION['userYopci']['profil'];
$allProfil = $db->getAllRecords('profil', '*', "AND statut='1'", 'ORDER BY profil ASC');
if (isset($_REQUEST['update']) and $_REQUEST['update'] != "") {
  // var_dump($profil);exit;

  extract($_REQUEST);
  if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
    // $taillemax=2097152;
    $extensionok = ['jpg', 'jpeg', 'png', 'jfif'];
    // if($_FILES['photo']['size']<=$taillemax){
    $extensionupload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
    // var_dump($extensionupload);exit;
    if (in_array($extensionupload, $extensionok)) {

      $chemin = "images/user/" . $_FILES['photo']['name'];
      $deplacement = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
      
    }else{
      header("location:profil.php?msg=error");
      exit;
    }
    $photo = $_FILES['photo']['name'];
  }

  if (isset($photo) && $photo != "" && isset($password) && $password != "") {

    $data   =   array(
      'nom' => $nom,
      'prenom' => $prenom,
      'profil' => $profil,
      'login' => $email,
      'photo' => $photo,
      'password' => md5($password),
      'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
      'updated_at' =>  gmdate("Y-m-d H:i:s"),
    );
  } else {
    if (isset($photo) && $photo != "") {
      $data   =   array(
        'nom' => $nom,
        'prenom' => $prenom,
        'profil' => $profil,
        'login' => $email,
        'photo' => $photo,
        'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'updated_at' =>  gmdate("Y-m-d H:i:s"),
      );
    } else if (isset($password) && $password != "") {
      $data   =   array(
        'nom' => $nom,
        'prenom' => $prenom,
        'profil' => $profil,
        'login' => $email,
        'password' => md5($password),
        'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'updated_at' =>  gmdate("Y-m-d H:i:s"),
      );
    }else{
      $data   =   array(
        'nom' => $nom,
        'prenom' => $prenom,
        'profil' => $profil,
        'login' => $email,
        // 'password' => md5($password),
        'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'updated_at' =>  gmdate("Y-m-d H:i:s"),
      );
    }
  }

  $insert =   $db->update('compte', $data, array('iduser' => $_SESSION['userYopci']['iduser']));
  if ($insert) {
    header('location:profil.php?msg=rus');
    exit;
  } else {
    header('location:profil.php?msg=rnu');
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

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php echo APP_NAME ?></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />

  <!-- mono CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />


  <script type="text/javascript" src="css/swal.css"></script>

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
  <script type="text/javascript" src="js/swal2.min.js"></script>
  <script src="plugins/nprogress/nprogress.js"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
  <script>
    NProgress.configure({
      showSpinner: false
    });
    NProgress.start();
  </script>



  <!-- ====================================
    ——— WRAPPER
    ===================================== -->
  <div class="wrapper">

    <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
    <!-- sidebar ici -->

    <?php include_once('assets/config/sidebar.php') ?>



    <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
    <div class="page-wrapper">

      <!-- Header ici -->
      <?php include_once('assets/config/header.php') ?>

      <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
      <div class="content-wrapper">
        <?php if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {
          echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil supprimé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
          echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil modifié avec succès! \n Vos infos seront mises a jour a la prochaine connexion", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {
          echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Vous n\'avez rien changé!", icon: "warning", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
          echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
          echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil ajouté avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "error") {
          echo '<script type="text/javascript">swal({ title: "Refusé !", text: "Erreur . Les extensions acceptees sont : .jpg .jpeg .pnf .jfif!", icon: "error", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
          echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil réinitialisé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
          echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cet Profil Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "Crna") {
          echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ls") {
          echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Resignation reussie avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
        } ?>
        <div class="content">
          <!-- Card Profile -->
          <div class="card card-default card-profile">

            <div class="card-header-bg" style="background-image:url(assets/img/user/user-bg-01.jpg)"></div>

            <div class="card-body card-profile-body">

              <div class="profile-avata">
                <?php // var_dump($_SESSION ["userYopci"]); exit; 
                ?>
                <!-- <img class="rounded-circle" src="images/user/user-md-01.jpg" alt="Avata Image"> -->
                <img class="rounded-circle" src="images/user/<?php echo $_SESSION["userYopci"]['photo'] ?>" width="120px" height="120px" alt="Avata Image">

                <a class="h5 d-block mt-3 mb-2" href="#"><?php echo ucwords($_SESSION["userYopci"]['prenom']) . ' ' . strtoupper($_SESSION["userYopci"]['nom']) ?></a>
                <a class="d-block text-color" href="#"><?php echo $_SESSION["userYopci"]['login'] ?></a>
              </div>

              <ul class="nav nav-profile-follow text-white">
                <li class="nav-item text-white">
                  <a class="nav-link text-white" href="#">
                    <span class="h5 d-block text-white">1503</span>
                    <span class="text-color d-block text-white"style="color:white!important">Friends</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="h5 d-block text-white">2905</span>
                    <span class="text-color d-block text-white"style="color:white!important">Followers</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="h5 d-block text-white">1200</span>
                    <span class="text-color d-block text-white"style="color:white!important">Following</span>
                  </a>
                </li>

              </ul>

              <div class="profile-button"style="color:white!important">
                <a class=" btn-pill" href="#"style="color:white!important">Upgrade Plan</a>
              </div>

            </div>

            <div class="card-footer card-profile-footer">
              <ul class="nav nav-border-top justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" href="#">PARAMETRES</a>
                </li>

              </ul>
            </div>

          </div>

          <div class="row">
            <div class="col-xl-3">
              <!--  -->
              <div class="card card-default">
                <div class="card-header">
                  <h2>PARAMETRES</h2>
                </div>

                <div class="card-body pt-0">
                  <ul class="nav nav-settings">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">
                        <i class="mdi mdi-account-outline mr-1"></i> Profil
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-9">
              <div class="card card-default">
                <div class="card-header">
                  <h2 class="mb-5">PARAMETRES DU PROFIL</h2>

                </div>

                <div class="card-body">
                  <form method="POST" action="#" enctype="multipart/form-data">
                    <div class="form-group row mb-6">
                      <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Photo de Profil</label>
                      <div class="col-sm-8 col-lg-10">
                        <div class="custom-file mb-1">
                          <input type="file" name="photo" accept=".png,.jpeg,.jpg,.jfif"class="custom-file-input" id="coverImage">
                          <label class="custom-file-label" for="coverImage">Selectionner une image...</label>
                          <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                        <span class="d-block ">Les images acceptees sont : .jpg, .jpeg, .png, .jfif</span>
                      </div>
                    </div>

                    <div class="form-group row mb-6">
                      <label for="occupation" class="col-sm-4 col-lg-2 col-form-label">Nom </label>
                      <div class="col-sm-8 col-lg-10">
                        <input type="text" name="nom" required value="<?php echo $_SESSION["userYopci"]['nom'] ?>" class="form-control" id="occupation">
                      </div>
                    </div>
                    <div class="form-group row mb-6">
                      <label for="occupation" class="col-sm-4 col-lg-2 col-form-label">Prenom(s) </label>
                      <div class="col-sm-8 col-lg-10">
                        <input type="text" name="prenom" required value="<?php echo $_SESSION["userYopci"]['prenom'] ?>" class="form-control" id="occupation">
                      </div>
                    </div>
                    <div class="form-group row mb-6">
                      <label for="occupation" class="col-sm-4 col-lg-2 col-form-label">Email </label>
                      <div class="col-sm-8 col-lg-10">
                        <input type="text" name="email" required value="<?php echo $_SESSION["userYopci"]['login'] ?>" class="form-control" id="occupation">
                      </div>
                    </div>
                    <div class="form-group row mb-6">
                      <label for="occupation" class="col-sm-4 col-lg-2 col-form-label">Mot de Passe</label>
                      <div class="col-sm-8 col-lg-10">
                        <input name="password" type="text" class="form-control" id="occupation">
                      </div>
                    </div>
                    <?php if($_SESSION['userYopci']['profil']==1){?>
                    <div class="form-group row mb-6">
                      <label for="occupation" class="col-sm-4 col-lg-2 col-form-label">Profil</label>
                      <div class="col-sm-8 col-lg-10">
                        <select required name="profil" class="form-control" id="">
                          <?php foreach ($allProfil as $val) {
                            if ($val['id'] == $_SESSION["userYopci"]['profil']) { ?>
                              <option selected="selected" value="<?php echo $val['id'] ?>"><?php echo $val['profil'] ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['profil'] ?></option>
                          <?php }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="d-flex justify-content-end">
                      <button type="submit" name="update" value="update" class="btn btn-primary sm mb-2 btn-pill">Mettre a jour le profil</button>
                    </div>

                  </form>
                </div>
              </div>
              <!-- <div class="card card-default">

      <div class="card-header">
        <h2>Social Networks</h2>

      </div>

      <div class="card-body">
        <div class="media media-sm">
          <div class="media-body">
            <div class="row">

              <div class="col-lg-6">

                <div class="d-flex mb-5">
                  <button type="button" class="btn btn-icon facebook mr-2">
                    <i class="mdi mdi-facebook"></i>
                  </button>
                  <input type="text" class="form-control" placeholder="Facebook username">
                </div>

                <div class="d-flex mb-5">
                  <button type="button" class="btn btn-icon google-plus mr-2">
                    <i class="mdi mdi-google-plus"></i>
                  </button>
                  <input type="text" class="form-control" placeholder="Google plus username">
                </div>

                <div class="d-flex mb-5">
                  <button type="button" class="btn btn-icon vimeo mr-2">
                    <i class="mdi mdi-vimeo"></i>
                  </button>
                  <input type="text" class="form-control" placeholder="Vimeo username">
                </div>

              </div>

              <div class="col-lg-6">

                <div class="d-flex mb-5">
                  <button type="button" class="btn btn-icon twitter mr-2">
                    <i class="mdi mdi-twitter"></i>
                  </button>
                  <input type="text" class="form-control" placeholder="Twitter username">
                </div>

                <div class="d-flex mb-5">
                  <button type="button" class="btn btn-icon linkedin mr-2">
                    <i class="mdi mdi-linkedin"></i>
                  </button>
                  <input type="text" class="form-control" placeholder="Linkedin username">
                </div>

                <div class="d-flex mb-5">
                  <button type="button" class="btn btn-icon pinterest mr-2">
                    <i class="mdi mdi-pinterest"></i>
                  </button>
                  <input type="text" class="form-control" placeholder="Pinterest username">
                </div>


              </div>
            </div>
          </div>
        </div>

      </div>
    </div> -->
            </div>
          </div>
        </div>

      </div>

      <!-- Footer -->
      <?php include('assets/config/footer.php') ?>
    </div>
  </div>

  <!-- Card Offcanvas -->
  <!-- <div class="card card-offcanvas" id="contact-off" >
                      <div class="card-header">
                        <h2>Contacts</h2>
                        <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
                      </div>
                      <div class="card-body">

                        <div class="mb-4">
                          <input type="text" class="form-control form-control-lg form-control-secondary rounded-0" placeholder="Search contacts...">
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-01.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span class="discribe">Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-02.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Walter Reuter</span>
                              <span>Developer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-03.jpg" alt="User Image">
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Larissa Gebhardt</span>
                              <span>Cyber Punk</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-04.jpg" alt="User Image">
                            </a>

                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Albrecht Straub</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-05.jpg" alt="User Image">
                              <span class="active bg-danger"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Leopold Ebert</span>
                              <span>Fashion Designer</span>
                            </a>
                          </div>
                        </div>

                        <div class="media media-sm">
                          <div class="media-sm-wrapper">
                            <a href="user-profile.html">
                              <img src="images/user/user-sm-06.jpg" alt="User Image">
                              <span class="active bg-primary"></span>
                            </a>
                          </div>
                          <div class="media-body">
                            <a href="user-profile.html">
                              <span class="title">Selena Wagner</span>
                              <span>Photographer</span>
                            </a>
                          </div>
                        </div>

                      </div>
                    </div> -->




  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>


  <script src="js/mono.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/map.js"></script>
  <script src="js/custom.js"></script>




  <!--  -->


</body>

</html>