<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');
define('MENU', 'PROFIL');
$condition = '';
$condition .= 'AND statut="1"';
$allProfil = $db->getAllRecords('profil', '*', $condition, 'ORDER BY profil ASC');
$allPage = $db->getAllRecords('page', '*', 'ORDER BY page ASC');

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


  $checkCat  =   $db->getAllRecords('profil', '*', 'AND statut="1"');
  foreach ($checkCat as $key) {
    if (strtolower($key['profil']) == strtolower($profil)) {
      $cpt += 1;
    }
  }
  $error = '';
  if ($cpt > 0) {
    header("location:index.php?msg=exist");
    exit;
  } else {
    $data   =   array(
      'profil' => $profil,
      'jsonPage' => json_encode($jsonPage),
      'created_By' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
    );
    $insert =   $db->insert('profil', $data);
    if ($insert) {
      header('location:index.php?msg=ras');
      exit;
    } else {
      header('location:index.php?msg=rna');
      exit;
    }
  }
}
// script pour modifier
if (isset($_REQUEST['update']) and $_REQUEST['update'] != "") {
  extract($_REQUEST);
  // var_dump($_REQUEST);exit;
  $data   =   array(
    'profil' => $profilU,
    'jsonPage' => json_encode($jsonPageU),
    'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
    'updated_at' =>  gmdate("Y-m-d H:i:s"),
  );
  $insert =   $db->update('profil', $data, array('id' => $category_Id));
  if ($insert) {

    header('location:index.php?msg=rus');
    exit;
  } else {
    header('location:index.php?msg=rnu');
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

  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="../../plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="../../plugins/simplebar/simplebar.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="../../plugins/costum.css" rel="stylesheet" />
  <link href="../../plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="../../plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="../../plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="../../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="../../plugins/toaster/toastr.min.css" rel="stylesheet" />
  <!-- select2 css -->
  <!-- mono CSS -->
  <link id="main-css-href" rel="stylesheet" href="../../css/style.css" />
  <!-- FAVICON -->
  <!-- FAVICON -->
  <link href="../../images/favicon.png" rel="shortcut icon" />
  <link rel="stylesheet" type="text/css" href="../../assets/datatables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/datatables/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/datatables/css/style.css">
  <link href="../../css/select2.min.css" rel="stylesheet" />

  <script type="text/javascript" src="../../css/swal.css"></script>

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="../../js/swal2.min.js"></script>

  <script src="../../plugins/nprogress/nprogress.js"></script>

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

    <?php include_once('../../assets/config/sidebar.php') ?>

    <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
    <div class="page-wrapper">

      <!-- Header ici -->
      <?php include_once('../../assets/config/header.php') ?>

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
                  <h2 class="">LISTE DES PROFILS UTILISATEURS </h2>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-stock" style="font-size:11px">AJOUTER</a>
                </div>
                <div align="center">
                  <h3><b><?php echo count($allProfil); ?> enregistrement(s) trouvé(s)</b></h3>
                </div>
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-body">
                        <button class="text-white btn btn-danger   DeleteAll-actif " style="font-size:11px">tout Supprimer</button>
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
                              <th>Profil</th>
                              <th>Pages visbles par le profil</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <?php $count = '';
                            if (count($allProfil) > 0) {
                              foreach ($allProfil as $val) {
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
                                  <td><?php echo $val['profil'] ?></td>
                                  <td>
                                    <?php foreach ($allPage as $key) {
                                      if (in_array($key['page'], json_decode($val['jsonPage']))) {
                                        echo  "<span class='badge bg-primary text-white'>" . $key['page'] . "</span>&nbsp;";
                                      }
                                    } ?>

                                  </td>
                                  <td>
                                    <a class="btn btn-warning text-dark " title="Modifier" href="#" onClick="update('<?php echo $val['id']; ?>')" data-toggle="modal" data-target="#update-modal-stock"><i class="mdi mdi-square-edit-outline "></i></a>
                                    <!-- <a class=" text-dark "style="font-size:30px" href="#" onClick="update('<?php echo $val['id']; ?>')" data-toggle="modal" data-target="#update-modal-stock"><i class="mdi mdi-square-edit-outline "title="Modifier"></i></a> -->
                                    <!-- <a class="text-dark" style="font-size:30px" onclick="supprimer('<?php echo $val['id']; ?>')" href="#"><i class="mdi mdi-table-remove"title="supprimer"></i></a> -->
                                    <a class=" btn btn-danger text-white" title="supprimer" onclick="supprimer('<?php echo $val['id']; ?>')" href="#"><i class="mdi mdi-table-remove"></i></a>
                                  </td>
                                </tr>
                              <?php }
                            } else { ?>
                              <tr>
                                <td colspan="5"><b>Aucun enregistrement trouvé</b></td>
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
                  <div class="modal-header align-items-center ">
                    <h2 class="modal-title" id="exampleModalGridTitle">Ajouter un profil utilisateur</h2>
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> Retour </button>
                      <button type="submit" class="btn btn-primary  btn-pill" name="valider" style="background-color:#000000" value="valider"> Valider </button>
                    </div>

                  </div>
                  <div class="modal-body ">
                    <div class="row">
                      <div class="col-12">
                        <h3 class="h5 mb-5">les champs contenant <span class="text-danger">*</span> sont obligatoires</h3>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="new-product">Libelle du Profil<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" required id="profil" name='profil' placeholder="ajouter un profil ">
                        </div>
                      </div>
                      <div class="col-6 ">
                        <div class="form-group ">
                          <label for="new-product">Page(s) visible(s) par ce profil<span class="text-danger">*</span></label><br>
                          <select name="jsonPage[]" id="jsonPage" required class="js-example-basic-multiple col-12 form-control" multiple="multiple">
                            <?php foreach ($allPage as $val) { ?>
                              <option value="<?php echo strtolower($val['page']) ?>"><?php echo $val['page'] ?></option>
                            <?php } ?>

                          </select>
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
                    <h2 class="modal-title" id="exampleModalGridTitle">Modifier un profil utilisateur</h2>
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> Retour </button>
                      <button type="submit" class="btn btn-warning  btn-pill" name="update" value="update"> Modifier </button>
                    </div>
                  </div>
                  <div class="modal-body ">
                    <div class="row">
                      <div class="col-12">
                        <h3 class="h5 mb-5">les champs contenant <span class="text-danger">*</span> sont obligatoires</h3>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="new-product">Libelle du Profil<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" required id="profilU" name='profilU' placeholder="ajouter un profil ">
                        </div>
                      </div>
                      <div class="col-6 ">
                        <div class="form-group ">
                          <label for="new-product">Page(s) visible(s) par ce profil<span class="text-danger">*</span></label><br>
                          <select name="jsonPageU[]" id="jsonPageU" required class="js-example-basic-multiple col-12 form-control" multiple="multiple">
                            <?php foreach ($allPage as $val) { ?>
                              <option value="<?php echo strtolower($val['page']) ?>"><?php echo $val['page'] ?></option>
                            <?php } ?>

                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" id="category_Id" name="category_Id" />
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      <?php include('../../assets/config/footer.php'); ?>

    </div>
  </div>
  <!-- ajax and swal2 script -->
  <script type="text/javascript" src="../../js/jqueryAjax.min.js"></script>
  <script type="text/javascript" src="../../js/swal2.min.js"></script>
  <!-- end ajax and swal2 script -->

  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
  <script src="../../plugins/apexcharts/apexcharts.js"></script>
  <script src="../../plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="../../plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="../../plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
  <script src="../../plugins/daterangepicker/moment.min.js"></script>
  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>

  <!-- script datatable -->

  <script type="text/javascript" src="../../assets/datatables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/jszip.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/app.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/jquery.mark.min.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/datatables.mark.js"></script>
  <script type="text/javascript" src="../../assets/datatables/js/buttons.colVis.min.js"></script>
  <!-- end script datatable -->
  <!--  script select2 -->
  <script type="text/javascript" src="../../js/select2.min.js"></script>
  <!-- end script select2 -->


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
                url: "ajax/profil.php",
                cache: false,
                dataType: 'JSON',
                data: {
                  submit: 'delete_multiple',
                  id: selected_values
                },
                success: function(data) {
                  if (data['result'] == "deleteAllOk") {
                    window.location.href = "index.php?msg=rds";
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
            window.location.href = "supprimer.php?delId=" + id + "&sec=PROFIL";
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
        url: "ajax/profil.php",
        data: {
          "id": id
        },
        dataType: "JSON",
        success: function(data) {
          // console.log(data);
          $("#profilU").val(data['profil']);
          data['jsonPage'] = JSON.parse(data['jsonPage'])
          jsonPageLength = data['jsonPage'].length;
          console.log(jsonPageLength);
          for (var cpt = -1; cpt < jsonPageLength; cpt++) {
            $("#jsonPageU").val(data['jsonPage']);
          }
          $("#category_Id").val(id);
        }
      });
    }
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2({
        placeholder: "Select a state"
      });

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
  <script src="../../js/quill.js"></script>
  <script src="../../plugins/toaster/toastr.min.js"></script>
  <script src="../../js/mono.js"></script>
  <script src="../../js/chart.js"></script>
  <script src="../../js/map.js"></script>
  <script src="../../js/custom.js"></script>
</body>

</html>