<?php
session_start();

include_once('../assets/config/config.php');
include_once('../assets/config/connected.php');
include_once('../assets/config/Database.php');
define('MENU', 'COMMANDES');
$SSMENU = 'VALIDATION';
$condition = '';
$mois=date('m');
$annee=date('Y');
$nb_jour = date('t',mktime(0, 0, 0, $mois, 1, $annee));
if (isset($_REQUEST['start']) and $_REQUEST['start'] != "" and isset($_REQUEST['end']) and $_REQUEST['end'] != "") {
  $condition .= 'AND orders.created_at BETWEEN "' . $_REQUEST['start'] . ' 00:00:00" AND "' . $_REQUEST['end'] . ' 23:59:59"';
} 
// else {
//   $condition .= 'AND orders.created_at BETWEEN "' . date('Y-m-d') . ' 00:00:00" AND "' . date('Y-m-'.$nb_jour) . ' 23:59:59"';
// }
if (isset($_REQUEST['product']) and $_REQUEST['product'] != "") {
  $condition .= 'AND product_id="' . $_REQUEST['product'] . '"';
}
// $condition .=' AND orders.id=orders_details.orders_id';
// $condition .=' AND products.id=orders_details.products_id';
// $condition .=' AND users.id=orders.users_id';
$condition .= ' AND orders.statut="EAV"';
$allCmdEAV = $db->getAllRecords1('orders', 'orders_details', '*,GROUP_CONCAT( orders_details.price SEPARATOR "," ) as priceInOrder,GROUP_CONCAT( orders_details.quantity SEPARATOR "," ) as allQuantity,SUM(price) as allPrice,GROUP_CONCAT( orders_details.products_id SEPARATOR "," ) as AllProducts', 'id', 'orders_id', $condition, 'GROUP BY orders.id,orders.created_at ORDER BY orders.created_at DESC');
$allUsers = $db->getAllRecords('users', '*', '', 'ORDER BY lastname ASC');
$allProducts = $db->getAllRecords('products', '*', '', 'ORDER BY name ASC');
$Allstock = $db->getAllRecords('stock', '*', '', 'ORDER BY id ASC');
// var_dump($allCmdEAV);exit;
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
// if (isset($_REQUEST['valider']) and $_REQUEST['valider'] != "") {
//   extract($_REQUEST);


//   $checkCat  =   $db->getAllRecords('masse', '*', 'AND statut="1"');
//   foreach ($checkCat as $key) {
//     if (strtolower($key['libelle']) == strtolower($libelleI)) {
//       $cpt += 1;
//     }
//   }
//   $error = '';
//   if ($cpt > 0) {
//     header("location:masse.php?msg=exist");
//     exit;
//   } else {
//     $data   =   array(
//       'libelle' => $libelleI,
//       'created_By' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
//     );
//     $insert =   $db->insert('masse', $data);
//     if ($insert) {
//         header('location:masse.php?msg=ras');
//         exit;
//       } else {
//         header('location:masse.php?msg=rna');
//         exit;
//       }
//   }
// }
// // script pour modifier
// if (isset($_REQUEST['update']) and $_REQUEST['update'] != "") {
//   extract($_REQUEST);
// // var_dump($_REQUEST);exit;
//   $data   =   array(
//     'libelle' => $LibelleU,
//     'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
//     'updated_at' =>  gmdate("Y-m-d H:i:s"),
//   );
//   $insert =   $db->update('masse', $data, array('id' => $category_Id));
//   if ($insert) {

//       header('location:masse.php?msg=rus');
//       exit;
//     } else {
//       header('location:masse.php?msg=rnu');
//       exit;
//     }
// }
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
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Commande Annulée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Commande modifié avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Vous n\'avez rien changé!", icon: "warning", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Commande validée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnad") {
                echo '<script type="text/javascript">swal({ title: "Refusé !", text: "Erreur d\'enregistrement. Prière de réessayer!", icon: "error", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Commande réinitialisée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
                echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cette Commande Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "Crna") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
              } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ls") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Resignation reussie avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
              } ?>
              <!-- Sales by Product -->
              <div class="card card-default">
                <form class="mt-5 ml-8 " method="GET">
                  <h3 class="mb-5">Rechercher </h3>
                  <div class="form-row">
                    <span class="mt-2 text-dark"><b>PERIODE DU</b></span>
                    <div class="col-3 ">
                      <input type="date" name="start" class="form-control" placeholder="col-3">
                    </div>
                    <span class="mt-2"><b>AU</b></span>

                    <div class="col-3">
                      <input type="date" name="end" class="form-control" placeholder="col-3">
                    </div>
                    <div class="col-4">
                      <button type="submit" class="btn btn-info btn-sm">Rechercher</button>
                      <a href="<?php echo PATH ?>commandes/validation.php" class="btn btn-danger btn-sm ">Reinitialiser</a>

                    </div>
                  </div>
                </form>
                <hr>
                <div class="card-header align-items-center">
                  <h2 class="">LISTE DES COMMANDES EN ATTENTE DE VALIDATION </h2>
                  <!-- <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock" style="background-color:#000000">AJOUTER</a> -->
                </div>
                <div align="center">
                  <h3><b><?php echo count($allCmdEAV); ?> Commande(s) trouvée(s)</b></h3>
                </div>
                <!-- Table Product -->
                <div class="row">
                  <div class="col-12">
                    <div class="card card-default">
                      <div class="card-body">
                        <button class="btn btn-danger  btn-sm text-white col-md-3 rounded-0 DeleteAll-actif ">tout Supprimer</button>
                        <table class="display compact cell-border nowrap" cellspacing="0" width="100%" id='maintable' class="table table-hover table-product" style="width:100%">
                          <thead class="text-center ">
                            <tr>
                              <th align="right">
                                <span class="custom-checkbox">
                                  <input align="right" type="checkbox" id="selectAll-actif">
                                  <label for="selectAll-actif"></label>
                                </span>
                              </th>
                              <th>#</th>
                              <th>Reference</th>
                              <th>Article(s)</th>
                              <th>Quantité</th>
                              <th>Prix <br> Unitaire</th>
                              <th>Client</th>
                              <th>Numero <br>de telephone</th>
                              <th>Adresse</th>
                              <th>Prix Total <br>de la commande</th>
                              <th>Date <br>de la commande</th>
                              <th>Statut</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <?php $count = '';
                            if (count($allCmdEAV) > 0) {
                              foreach ($allCmdEAV as $val) {
                                $count++; ?>
                                <tr>
                                  <td>
                                    <span class="custom-checkbox">
                                      <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $val["id"]; ?>">
                                      <label for="checkbox2"></label>
                                    </span>
                                  </td>
                                  <td><?php echo $count ?> </td>
                                  <td><?php echo $val['reference'] ?></td>
                                  <td>
                                    <?php
                                    $productInOrder = explode(',', $val['AllProducts']);
                                    foreach ($allProducts as $val1) {
                                      if (in_array($val1['id'], $productInOrder)) {
                                        echo strtoupper($val1['name'])."<br>";
                                      }
                                    }
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                    $QuantityInOrder = explode(',', $val['allQuantity']);
                                    foreach ($QuantityInOrder as $val1) {
                                        echo $val1."<br>";
                                    }
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                    $priceInOrder = explode(',', $val['priceInOrder']);
                                    foreach ($priceInOrder as $val1) {
                                        echo $val1."<br>";
                                    }
                                    ?>
                                  </td>
                                  <?php
                                  foreach ($allUsers as $val1) {
                                    if ($val1['id'] == $val['users_id']) { ?>
                                      <td><?php echo ucwords($val1['firstname']) . ' ' . strtoupper($val1['lastname']); ?> </td>
                                      <td><?php echo $val1['phone'] ?></td>
                                      <td><?php echo $val1['address'] ?></td>
                                    <?php
                                    } ?>
                                  <?php
                                  }
                                  ?>                                  
                                  <td><?php echo $val['allPrice'] ?></td>
                                  <td><?php echo $val['created_at'] ?></td>
                                  <td class="text-sm"><span class="bg-dark text-white p-3 font-weight-bold " >EN ATTENTE DE VALIDATION</span></td>
                                  <td>
                                    <a class="btn btn-success btn-sm" href="#" onClick="update('<?php echo $val['id']; ?>')">Valider</a>
                                    <a class="btn btn-danger btn-sm" onclick="supprimer('<?php echo $val['id']; ?>')" href="#">Annuler</a>
                                  </td>
                                </tr>
                              <?php }
                            } else { ?>
                              <tr>
                                <td colspan="13"><b>Aucun enregistrement trouvé</b></td>
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
          <!-- <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header align-items-center ">
                    <h2 class="modal-title" id="exampleModalGridTitle">Ajouter une masse  des articles</h2>
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> Retour </button>
                      <button type="submit" class="btn btn-primary  btn-pill" name="valider" style="background-color:#000000" value="valider"> Valider </button>
                    </div>

                  </div>
                  <div class="modal-body ">
                    <div class="row">
                      <div class="col-lg-12">
                        <h3 class="h5 mb-5">les champs contenant <span class="text-danger">*</span> sont obligatoires</h3>
                        <div class="form-group mb-5">
                          <label for="new-product">Masse de l'article<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" required id="new-product" name='libelleI' placeholder="ajouter une masse ">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade update-modal-stock" id="update-modal-stock" aria-labelledby="update-modal-stock" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header align-items-center p3 p-md-5">
                    <h2 class="modal-title" id="exampleModalGridTitle">Modifier une masse  des articles</h2>
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> Retour </button>
                      <button type="submit" class="btn btn-warning  btn-pill" name="update" value="update"> Modifier </button>
                    </div>
                  </div>
                  <div class="modal-body p3 p-md-5">
                    <div class="row">
                      <div class="col-lg-8">
                        <h3 class="h5 mb-5">les champs contenant <span class="text-danger">*</span> sont obligatoires</h3>
                        <div class="form-group mb-5">
                          <label for="new-product">Masse de l'article <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" required id="LibelleU" name='LibelleU' placeholder="ajouter une masse ">
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" id="category_Id" name="category_Id" />
                </div>
              </form>
            </div>
          </div> -->
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
                url: "ajax/validation.php",
                cache: false,
                dataType: 'JSON',
                data: {
                  submit: 'delete_multiple',
                  id: selected_values
                },
                success: function(data) {
                  if (data['result'] == "deleteAllOk") {
                    window.location.href = "validation.php?msg=rds";
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

    function update(id) {
      swal({
          title: "Confirmation",
          text: "Etes-vous sûr de valider cette commande ?",
          icon: "warning",
          buttons: ["Non, annuler", "Oui, je confirme"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "supprimer.php?delId=" + id + "&sec=EAV";
          } else {
            swal({
              title: "Alerte !",
              text: "Operation de validation non confirmée!",
              icon: "warning",
              confirmButtonText: "OK"
            });
          }
        });
    }

    function supprimer(id) {
      swal({
          title: "Confirmation",
          text: "Etes-vous sûr d'annuler cette commande  ?",
          icon: "warning",
          buttons: ["Non, annuler", "Oui, je confirme"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "supprimer.php?delId=" + id + "&sec=XEAV";
          } else {
            swal({
              title: "Alerte !",
              text: "Operation d'annulation non confirmée!",
              icon: "warning",
              confirmButtonText: "OK"
            });
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