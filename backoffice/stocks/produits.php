<?php
session_start();

include_once('../assets/config/config.php');
include_once('../assets/config/connected.php');
include_once('../assets/config/Database.php');
define('MENU', 'PRODUITS');
$condition = '';
$condition .= 'AND statut="1"';
$allProducts = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ASC');
$allCategories = $db->getAllRecords('categories', '*', 'AND statut="1"');
$allMass = $db->getAllRecords('masse', '*', 'AND statut="1"');
$imageNames = $db->getAllRecords('images', '*', 'AND statut="1"');
$allPrice = $db->getAllRecords('prix', '*', 'AND statut="1"', 'ORDER BY valeur ASC');
$error = '';
$sessionPages = json_decode($_SESSION['userYopci']['sessionPages']);
if (!in_array('admin.user', $sessionPages)) {
  //header('location: '.PATH.'pagenonautorisee.php');
  //exit;
}
// script pour ajouter
$cpt = 0;
$cpt1 = 0;
$extensionupload = '';
if (isset($_REQUEST['valider']) and $_REQUEST['valider'] != "") {
  extract($_REQUEST);

  if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
    // $taillemax=2097152;
    $extensionok = ['jpg', 'jpeg', 'png', 'jfif'];
    // if($_FILES['photo']['size']<=$taillemax){
    $extensionupload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
    if (in_array($extensionupload, $extensionok)) {

      $chemin = "../images/products/" . $_FILES['photo']['name'];
      $deplacement = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
    }
    $photo = $_FILES['photo']['name'];
  }
  $checkCat  =   $db->getAllRecords('products', '*', 'AND statut="1"');
  foreach ($checkCat as $key) {
    if (strtolower($key['name']) == strtolower($libelleI)) {
      $cpt += 1;
    }
  }
  $error = '';
  if ($cpt > 0) {
    header("location:produits.php?msg=exist");
    exit;
  } else {
    $data   =   array(
      'name' => $libelleI,
      'mass' => $masse_id,
      'description' => $desc,
      'price' => $prix,
      'categories_id' => $categories_id,
      'created_By' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
    );
    $insert =   $db->insert('products', $data);
    if ($insert) {
      $last    =   $db->lastInsertId();


      $data2 = array(
        'name' => $photo,
        'created_By' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'product_id' => $last,
      );
      $insert3 =   $db->insert('images', $data2);
      if ($insert3) {
        header('location:produits.php?msg=ras');
        exit;
      } else {
        header('location:produits.php?msg=rna');
        exit;
      }
    }
  }
}
// script pour modifier
if (isset($_REQUEST['update']) and $_REQUEST['update'] != "") {
  extract($_REQUEST);
  // var_dump($_REQUEST);
  // exit;
  if (isset($_FILES['photoU']) && !empty($_FILES['photoU']['name'])) {
    // $taillemax=2097152;
    $extensionok = ['jpg', 'jpeg', 'png', 'jfif'];
    // if($_FILES['photo']['size']<=$taillemax){
    $extensionupload = strtolower(substr(strrchr($_FILES['photoU']['name'], '.'), 1));
    if (in_array($extensionupload, $extensionok)) {

      $chemin = "../images/products/" . $_FILES['photoU']['name'];
      $deplacement = move_uploaded_file($_FILES['photoU']['tmp_name'], $chemin);
    }
    $photo = $_FILES['photoU']['name'];
  }

  $error = '';

  $data   =   array(
    'name' => $libelleU,
    'price' => $prix,
    'mass' => $masse_id,
    'categories_id' => $categories_id,
    'description' => $desc,
    'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
    'updated_at' =>  gmdate("Y-m-d H:i:s"),
  );
  $insert =   $db->update('products', $data, array('id' => $products_id));
  if (isset($photo) and $photo != "") {
    $data   =   array(
      'name' => $photo,
      'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
      'updated_at' =>  gmdate("Y-m-d H:i:s"),
    );
  } else {
    $data   =   array(
      'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
      'updated_at' =>  gmdate("Y-m-d H:i:s"),
    );
  }
  if ($insert) {
    $insert3 =   $db->update('images', $data, array('product_id' => $products_id));
    if ($insert3) {
      header('location:produits.php?msg=rus');
      exit;
    } else {
      header('location:produits.php?msg=rnu');
      exit;
    }
  } else {
    header('location:produits.php?msg=rnu');
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

  <title>mono - Responsive Admin & Dashboard Template</title>

  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="../plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="../plugins/simplebar/simplebar.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="../plugins/costum.css" rel="stylesheet" />
  <link href="../plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="../plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="../plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="../plugins/toaster/toastr.min.css" rel="stylesheet" />
  <!-- mono CSS -->
  <link id="main-css-href" rel="stylesheet" href="../css/style.css" />
  <!-- FAVICON -->
  <link rel="stylesheet" type="text/css" href="../assets/datatables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/datatables/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/datatables/css/style.css">
  <script type="text/javascript" src="../css/swal.css"></script>

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="../js/swal2.min.js"></script>

  <script src="../plugins/nprogress/nprogress.js"></script>

</head>


<body class="navbar-fixed sidebar-fixed" id="body">
  <script>
    NProgress.configure({
      showSpinner: false
    });
    NProgress.start();
  </script>


  <!-- <div id="toaster"></div> -->


  <!-- ====================================
    ——— WRAPPER
    ===================================== -->
  <div class="wrapper">


    <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
    <!-- sidebar ici -->

    <?php include_once('../assets/config/sidebar.php') ?>

    <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
    <div class="page-wrapper">

      <!-- Header ici -->
      <?php include_once('../assets/config/header.php') ?>

      <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
      <div class="content-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-xl-12">
              <?php if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Enregistrement supprimé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Enregistrement modifié avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Vous n\'avez rien changé!", icon: "warning", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Enregistrement ajouté avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnad") {
                echo '<script type="text/javascript">swal({ title: "Refusé !", text: "Erreur d\'enregistrement. Prière de réessayer!", icon: "error", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Enregistrement réinitialisé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
                echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cet Enregistrement Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "Crna") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ls") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Resignation reussie avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } ?>
              <!-- Sales by Product -->
              <div class="card card-default">
                <div class="card-header align-items-center">
                  <h2 class="">LISTE DES PRODUITS </h2>
                  <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock" >AJOUTER</a>
                </div>
                <div align="center">
                  <h3><b><?php echo count($allProducts); ?> enregistrement(s) trouvé(s)</b></h3>
                </div>
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-body">
                        <button class="btn btn-danger  btn-sm text-white col-md-3 rounded-0 DeleteAll-actif ">tout Supprimer</button>
                        <table class="display compact cell-border nowrap" cellspacing="0" width="100%" id='maintable' class="table table-hover table-product" style="width:100%">
                          <thead class="text-center">
                            <tr>
                              <th align="right">
                                <span class="custom-checkbox">
                                  <input align="right" type="checkbox" id="selectAll-actif">
                                  <label for="selectAll-actif"></label>
                                </span>
                              </th>
                              <th>#</th>
                              <th>Illustration</th>
                              <th>Libellé de l'article</th>
                              <th>Categorie</th>
                              <th>Prix</th>
                              <th>Masse</th>
                              <th>En stock</th>
                              <th>Disopnible</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <?php $count = '';
                            if (count($allProducts) > 0) {
                              foreach ($allProducts as $val) {
                                $count++; ?>
                                <tr>
                                  <td>
                                    <span class="custom-checkbox">
                                      <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $val["id"]; ?>">
                                      <label for="checkbox2"></label>
                                    </span>
                                  </td>
                                  <td>
                                    <?php echo $count ?>
                                  </td>
                                  <td class="py-0 xs">
                                    <?php foreach ($imageNames as $imageCatName) {
                                      if ($imageCatName['product_id'] == $val['id']) { ?>
                                        <img src="../images/products/<?php echo $imageCatName['name'] ?>" height="110px" width="100px" alt="Product Image">
                                    <?php    }
                                    } ?>
                                  </td>
                                  <td><?php echo $val['name'] ?></td>

                                  <td>
                                    <?php foreach ($allCategories as $key) {
                                      if ($key['id'] == $val['categories_id']) {
                                        echo $key['name'];
                                      }
                                    } ?>
                                  </td>
                                  <td>
                                    <?php foreach ($allPrice as $key) {
                                      if ($key['id'] == $val['price']) {
                                        echo $key['valeur'];
                                      }
                                    } ?>
                                  </td>
                                  <td>
                                    <?php foreach ($allMass as $key) {
                                      if ($key['id'] == $val['mass']) {
                                        echo $key['libelle'];
                                      }
                                    } ?>
                                  </td>
                                  <td><?php echo $val['name'] ?></td>
                                  <td><?php echo $val['name'] ?></td>

                                  <td>
                                    <a class="btn btn-warning btn-sm" href="#" onClick="update('<?php echo $val['id']; ?>')" data-toggle="modal" data-target="#update-modal-stock">Modifier</a>
                                    <a class="btn btn-danger btn-sm" onclick="supprimer('<?php echo $val['id']; ?>')" href="#">supprimer</a>
                                  </td>
                                </tr>
                              <?php }
                            } else { ?>
                              <tr>
                                <td colspan="10"><b>Aucun enregistrement trouvé</b></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Stock Modal -->
          <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header align-items-center p3 p-md-5">
                    <h2 class="modal-title" id="exampleModalGridTitle">Ajouter un article</h2>
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> Retour </button>
                      <button type="submit" class="btn btn-primary  btn-pill" name="valider"  value="valider"> Valider </button>
                    </div>

                  </div>
                  <div class="modal-body p3 p-md-5">
                    <div class="row">
                      <div class="col-lg-8">
                        <h3 class="h5 mb-5">les champs contenant <span class="text-danger">*</span> sont obligatoires</h3>
                        <div class="form-group mb-5">
                          <label for="new-product"> Libellé de l'article<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" required id="libelleI" name='libelleI' placeholder="Ajouter un libelle">
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Prix de l'article<span class="text-danger">*</span></label>
                          <select name="prix" id="prix" required class="form-control">
                            <option>SELECTIONNER UN PRIX</option>
                            <?php foreach ($allPrice as $val) { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['valeur'] ?></option>
                            <?php } ?>

                          </select>
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Masse<span class="text-danger">*</span></label>
                          <select name="masse_id" required id="masse_id" class="form-control">
                            <option>SELECTIONNER UNE MASSE</option>
                            <?php foreach ($allMass as $val) { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['libelle'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Categorie<span class="text-danger">*</span></label>
                          <select name="categories_id" required id="categories_id" class="form-control">
                            <option>SELECTIONNER UNE CATEGORIE</option>
                            <?php foreach ($allCategories as $val) { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Description</label>
                          <textarea name="desc" class="form-control" id="desc"></textarea>
                        </div>

                      </div>
                      <div class="col-lg-4">
                        <div class="custom-file">
                          <input type="file" accept=".jpg,.jfif,.jpeg,.png" required class="custom-file-input" name='photo' id="customFile" placeholder="please imgae here">
                          <span class="upload-image">cliquez ici <span class="text-primary">pour ajouter une image.<br><b>(les extensions acceptees sont .jpg,.jfif,.jpeg,.png)</b></span> </span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
          <!-- Update Stock Modal -->
          <div class="modal fade update-modal-stock" id="update-modal-stock" aria-labelledby="update-modal-stock" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header align-items-center p3 p-md-5">
                    <h2 class="modal-title" id="exampleModalGridTitle">Ajouter un article</h2>
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> Retour </button>
                      <button type="submit" class="btn btn-primary  btn-pill" name="update"  value="update"> Modifier </button>
                    </div>
                  </div>
                  <div class="modal-body p3 p-md-5">
                    <div class="row">
                      <div class="col-lg-8">
                        <h3 class="h5 mb-5">les champs contenant <span class="text-danger">*</span> sont obligatoires</h3>
                        <div class="form-group mb-5">
                          <label for="new-product"> Libellé de l'article<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" required id="libelleU" name='libelleU' placeholder="Ajouter un libelle">
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Prix de l'article<span class="text-danger">*</span></label>
                          <select name="prix" id="prixU" required class="form-control">
                            <option>SELECTIONNER UN PRIX</option>
                            <?php foreach ($allPrice as $val) { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['valeur'] ?></option>
                            <?php } ?>

                          </select>
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Masse<span class="text-danger">*</span></label>
                          <select name="masse_id" required id="masse_idU" class="form-control">
                            <option>SELECTIONNER UNE MASSE</option>
                            <?php foreach ($allMass as $val) { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['libelle'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Categorie<span class="text-danger">*</span></label>
                          <select name="categories_id" required id="categories_idU" class="form-control">
                            <option>SELECTIONNER UNE CATEGORIE</option>
                            <?php foreach ($allCategories as $val) { ?>
                              <option value="<?php echo $val['id'] ?>"><?php echo $val['name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group mb-5">
                          <label for="new-product">Description</label>
                          <textarea name="desc" class="form-control" id="descriptionU"></textarea>
                        </div>

                      </div>
                      <div class="col-lg-4" align="center">

                        <img id="imageU" src="" alt="" height="110px" width="100px">
                        <div class="custom-file">
                          <hr>
                          <span class="upload-image">cliquez juste apres l'instruction <br><span class="text-primary">pour ajouter une image.<br><b>(les extensions acceptees sont .jpg,.jfif,.jpeg,.png)</b></span> </span>
                          <span class="mdi mdi-download-multiple"></span>
                          <input type="file" class="custom-file-input" id="customFile" name='photoU' accept=".jpg,.jfif,.jpeg,.png" placeholder="image ici">
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" id="products_id" name="products_id" />
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <?php include('../assets/config/footer.php'); ?>

    </div>
  </div>
  <!-- ajax and swal2 script -->
  <script type="text/javascript" src="../js/jqueryAjax.min.js"></script>
  <script type="text/javascript" src="../js/swal2.min.js"></script>
  <!-- end ajax and swal2 script -->

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
  <script src="../plugins/apexcharts/apexcharts.js"></script>
  <script src="../plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
  <script src="../plugins/daterangepicker/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>

  <!-- script datatable -->

  <script type="text/javascript" src="../assets/datatables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/jszip.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/app.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/jquery.mark.min.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/datatables.mark.js"></script>
  <script type="text/javascript" src="../assets/datatables/js/buttons.colVis.min.js"></script>
  <!-- end script datatable -->


  <script>
    // suppression multiple
    $(document).on("click", ".DeleteAll-actif", function() {
      var user = [];
      $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-id'));
      });
      if (user.length <= 0) {
        swal({
          title: "Erreur !",
          text: "Selectionner au moins un enregistrement",
          icon: "error",
          confirmButtonText: "OK"
        });

      } else {
        // WRN_PROFILE_DELETE = "Etes vous sur de vouloir supprimer " + (user.length > 1 ? "ces enregistrements" : "cet enregistrement") + " ?";
        swal({
            title: "Confirmation",
            text: "Etes vous sur de vouloir supprimer " + (user.length > 1 ? "ces enregistrements" : "cet enregistrement") + " ?",
            icon: "warning",
            buttons: ["Non, annuler", "Oui, je confirme"],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              var selected_values = user.join(",");
              console.log(selected_values);
              $.ajax({
                type: "GET",
                url: "ajax/produits.php",
                cache: false,
                dataType: 'JSON',
                data: {
                  submit: 'delete_multiple',
                  id: selected_values
                },
                success: function(data) {
                  if (data['result'] == "deleteAllOk") {
                    window.location.href = "produits.php?msg=rds";
                  }
                }
              });
            } else {
              swal({
                title: "Alerte !",
                text: "Operation de suppression non confirmée!",
                icon: "warning",
                confirmButtonText: "OK"
              });
            }
          });
      }
    });
    $(document).on("click", "#selectAll-actif", function() {
      var checkbox = $('table tbody input[type="checkbox"]');
      if (this.checked) {
        checkbox.each(function() {
          this.checked = true;
        });
      } else {
        checkbox.each(function() {
          this.checked = false;
        });
      }
    });
    checkbox.click(function() {
      if (!this.checked) {
        $("#selectAll-actif").prop("checked", false);
      }
    });

    function supprimer(id) {
      swal({
          title: "Confirmation",
          text: "Etes-vous sûr de supprimer cet enregistrment  ?",
          icon: "warning",
          buttons: ["Non, annuler", "Oui, je confirme"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "supprimer.php?delId=" + id + "&sec=PRODUITS";
          } else {
            swal({
              title: "Alerte !",
              text: "Operation de suppression non confirmée!",
              icon: "warning",
              confirmButtonText: "OK"
            });
          }
        });
    }

    function update(id) {
      $.ajax({
        type: "GET",
        url: "ajax/produits.php",
        data: {
          "idCategory": id
        },
        dataType: "JSON",
        success: function(data) {
          console.log(data);
          $("#libelleU").val(data['name']);
          $("#prixU").val(data['price']);
          $("#masse_idU").val(data['mass']);
          $("#descriptionU").val(data['description']);
          $("#categories_idU").val(data['categories_id']);
          src = "../images/products/" + data['image'];
          $("#imageU").attr("src", src);
          $("#products_id").val(id);
        }
      });
    }
    $(document).ready(function() {
      jQuery('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        locale: {
          cancelLabel: 'Clear'
        }
      });
      jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
      });
      jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
        jQuery(this).val('');
      });
    });
  </script>
  <script src="../js/quill.js"></script>
  <script src="../plugins/toaster/toastr.min.js"></script>
  <script src="../js/mono.js"></script>
  <script src="../js/chart.js"></script>
  <script src="../js/map.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>