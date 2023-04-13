<?php
session_start();

include_once('assets/config/config.php');
include_once('assets/config/connected.php');
$year = date('Y');
$categoriesCount    =   $db->getQueryCount('categories', '*', ' AND statut="1"');
$productsCount    =   $db->getQueryCount('products', '*', ' AND statut="1"');
$ordersCountL1    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-01-%" AND statut="L"');
$ordersCountL2    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-02-%" AND statut="L"');
$ordersCountL3    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-03-%" AND statut="L"');
$ordersCountL4    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-04-%" AND statut="L"');
$ordersCountL5    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-05-%" AND statut="L"');
$ordersCountL6    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-06-%" AND statut="L"');
$ordersCountL7    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-07-%" AND statut="L"');
$ordersCountL8    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-08-%" AND statut="L"');
$ordersCountL9    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-09-%" AND statut="L"');
$ordersCountL10    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-10-%" AND statut="L"');
$ordersCountL11    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-11-%" AND statut="L"');
$ordersCountL12    =   $db->getQueryCount('orders', '*', 'AND created_at like "' . $year . '-12-%" AND statut="L"');
$ordersCountL    =   $db->getQueryCount('orders', '*', ' AND statut="L"');
$ordersCountV    =   $db->getQueryCount('orders', '*', ' AND statut="V"');
$categoriesCount    =  $categoriesCount[0]['total'];
$productsCount    =  $productsCount[0]['total'];
$ordersCountV    =  $ordersCountV[0]['total'];
$ordersCountL    =  $ordersCountL[0]['total'];
$ordersCountL1    =  $ordersCountL1[0]['total'];
$ordersCountL2    =  $ordersCountL2[0]['total'];
$ordersCountL3    =  $ordersCountL3[0]['total'];
$ordersCountL4    =  $ordersCountL4[0]['total'];
$ordersCountL5    =  $ordersCountL5[0]['total'];
$ordersCountL6    =  $ordersCountL6[0]['total'];
$ordersCountL7    =  $ordersCountL7[0]['total'];
$ordersCountL8    =  $ordersCountL8[0]['total'];
$ordersCountL9    =  $ordersCountL9[0]['total'];
$ordersCountL10    =  $ordersCountL10[0]['total'];
$ordersCountL11    =  $ordersCountL11[0]['total'];
$ordersCountL12   =  $ordersCountL12[0]['total'];

$allProducts    =   $db->getAllRecords('products', '*', ' AND statut="1"', "ORDER BY name ASC");


// var_dump($productsCount);exit;
define('MENU', 'MAIN');
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
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/costum.css" rel="stylesheet" />
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="plugins/toaster/toastr.min.css" rel="stylesheet" />
  <!-- mono CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />
  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon" />
  <link rel="stylesheet" type="text/css" href="assets/datatables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="assets/datatables/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/datatables/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="assets/datatables/css/style.css">
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


<body class="navbar-fixed sidebar-fixed" id="body">
  <script>
    NProgress.configure({
      showSpinner: false
    });
    NProgress.start();
  </script>


  <div id="toaster"></div>


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
        <div class="content">
          <!-- Top Statistics -->
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2><?php echo $categoriesCount; ?></h2>
                  <!-- <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div> -->
                  <div class="sub-title">
                    <span class="mr-1">Categorie(s) enregistré(s)</span>
                    <!-- <span class="mx-1">45%</span>
                            <i class="mdi mdi-arrow-up-bold text-success"></i> -->
                  </div>
                </div>
                <!-- <div class="card-body">
                          <div class="chart-wrapper">
                            <div>
                              <div id="spline-area-1"></div>
                            </div>
                          </div>
                        </div> -->
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2><?php echo $productsCount; ?></h2>
                  <!-- <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div> -->
                  <div class="sub-title">
                    <span class="mr-1">Produit(s) enregistré(s)</span>
                    <!-- <span class="mx-1">45%</span>
                            <i class="mdi mdi-arrow-up-bold text-success"></i> -->
                  </div>
                </div>
                <!-- <div class="card-body">
                          <div class="chart-wrapper">
                            <div>
                              <div id="spline-area-1"></div>
                            </div>
                          </div>
                        </div> -->
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2><?php echo $ordersCountV; ?></h2>
                  <!-- <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div> -->
                  <div class="sub-title">
                    <span class="mr-1">commande(s) validée(s)</span>
                    <!-- <span class="mx-1">45%</span>
                            <i class="mdi mdi-arrow-up-bold text-success"></i> -->
                  </div>
                </div>
                <!-- <div class="card-body">
                          <div class="chart-wrapper">
                            <div>
                              <div id="spline-area-1"></div>
                            </div>
                          </div>
                        </div> -->
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2><?php echo $ordersCountL; ?></h2>
                  <!-- <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div> -->
                  <div class="sub-title">
                    <span class="mr-1">commande(s) livrée(s)</span>
                    <!-- <span class="mx-1">45%</span>
                            <i class="mdi mdi-arrow-up-bold text-success"></i> -->
                  </div>
                </div>
                <!-- <div class="card-body">
                          <div class="chart-wrapper">
                            <div>
                              <div id="spline-area-1"></div>
                            </div>
                          </div>
                        </div> -->
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-xl-12">

              <!-- Income and Express -->
              <div class="card card-default">
                <div class="card-header">
                  <h2>Commandes livrees Par Mois (<b>Annee <?php echo $year ?>)</b></h2>
                  <!-- <div class="dropdown">
                          <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-display="static">
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                        </div> -->

                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div id="mixed-chart-1"></div>
                  </div>
                </div>

              </div>


            </div>
            <!-- <div class="col-xl-4">
              <!-- Current Users  
              <div class="card card-default">
                <div class="card-header">
                  <h2>Current Users</h2>
                  <span>Realtime</span>
                </div>
                <div class="card-body">
                  <div id="barchartlg2"></div>
                </div>
                <div class="card-footer bg-white py-4">
                  <a href="#" class="text-uppercase">Current Users Overview</a>
                </div>
              </div>
            </div> -->
          </div>



          <!-- Table Product -->
          <div class="row">
            <div class="col-12">
              <div class="card card-default">
                <div class="card-header">
                  <h2>Inventaire des Produits</h2>
                  <!-- <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Yearly Chart
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div> -->
                </div>
                <div class="card-body">
                <table class=" table table-hover display compact cell-border nowrap table-product" cellspacing="0" width="100%" id='secondtable'  style="width:100%;color:white !important;">

                  <!-- <table id="productsTable" class="table table-hover table-product" style="width:100%"> -->
                  <!-- <table class="display compact cell-border nowrap" cellspacing="0" width="100%" id='maintable' class="table table-hover table-product" style="width:100%"> -->

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nom du Produit</th>
                        <th>Disponible</th>
                        <th>Vendu</th>
                        <th>En Stock</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($allProducts) > 0) {
                        foreach ($allProducts as $val) { ?>
                          <tr>
                            <td class="py-0">
                              <?php
                              $image    =   $db->getAllRecords('images', '*', 'AND product_id="' . $val['id'] . '" AND statut="1"');
                              ?>
                              <img src="<?php echo PATH ?>images/products/<?php echo $image[0]['name'] ?>" alt="Product Image">
                            </td>
                            <td><?php echo strtoupper($val['name']) ?></td>
                            <td>
                              <?php
                              $allStocks    =   $db->getAllRecords('stock', '*', 'AND product_id="' . $val['id'] . '" AND statut="1"');
                              if (count($allStocks) > 0 && $allStocks[0]['disponible'] != "") {
                                echo $allStocks[0]['disponible'];
                              } else {
                                echo '0';
                              } ?>
                            </td>
                            <td>
                              <?php
                              $orders_details    =   $db->getAllRecords('orders_details', 'SUM(quantity) as vendu', 'AND products_id="' . $val['id'] . '"  AND statut="L"');
                              if (count($orders_details) > 0 && $orders_details[0]['vendu'] != "") {
                                echo $orders_details[0]['vendu'];
                              } else {
                                echo '0';
                              } ?>
                            </td>
                            <td>
                              <?php
                              $allStocksV    =   $db->getAllRecords('stock', '*', 'AND product_id="' . $val['id'] . '"  AND statut="1"');
                              if (count($allStocksV) > 0 && $allStocksV[0]['en_stock'] != "") {
                                echo $allStocksV[0]['en_stock'];
                              } else {
                                echo '0';
                              } ?>
                            </td>
                          </tr>
                        <?php }
                      } else { ?>
                        <tr>
                          <td colspan="5">Aucun Produit enregistré</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-xl-4">
              <!-- Top Customers 
              <div class="card card-default">
                <div class="card-header">
                  <h2>Top Customers</h2>
                </div>
                <div class="card-body">
                  <table class="table table-borderless table-thead-border">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th class="text-right">Income</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-dark font-weight-bold">Gunter Reich</td>
                        <td class="text-right">$2,560</td>
                      </tr>
                      <tr>
                        <td class="text-dark font-weight-bold">Anke Kirsch</td>
                        <td class="text-right">$1,720</td>
                      </tr>
                      <tr>
                        <td class="text-dark font-weight-bold">Karolina Beer</td>
                        <td class="text-right">$1,230</td>
                      </tr>
                      <tr>
                        <td class="text-dark font-weight-bold">Lucia Christ</td>
                        <td class="text-right">$875</td>
                      </tr>
                    </tbody>
                    <tfoot class="border-top">
                      <tr>
                        <td><a href="#" class="text-uppercase">See All</a></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

            </div>
            <div class="col-xl-8">
              <div class="card card-default">
                <div class="card-header">
                  <h2>Sales by Country</h2>
                  <div id="country-sales-range" class="date-range">
                    <i class="mdi mdi-calendar"></i>&nbsp;
                    <span class="date-holder"></span>
                    <i class="mdi mdi-menu-down"></i>
                  </div>
                </div>
                <div class="card-body py-0">
                  <div class="row pb-4">
                    <div class="col-lg-7 border-right-lg">
                      <div class="vec-map-wrapper">
                        <div id="home-world" style="height: 100%; width: 100%;"></div>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="chart-wrapper">
                        <div id="horizontal-bar-chart"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div> -->

          <div class="row">
            <div class="col-xl-12">

              <!-- Sales by Product -->
              <div class="card card-default">
                <div class="card-header align-items-center">
                  <h2 class="">Ventes Par Produit</h2>
                  <!-- <a href="#" class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modal-stock">Add Stock</a> -->
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <!-- <table id="product-sale" class="table table-product " style="width:100%"> -->
                  <table class=" table table-hover display compact cell-border nowrap table-product" cellspacing="0" width="100%" id='maintable' class="table table-hover table-product" style="width:100%">

                      <thead>
                        <tr>
                          <th>Nom du Produit</th>
                          <th>Unités Vendue(s)</th>
                          <th>Montant</th>
                          <th>%Vendu</th>
                          <th class="th-width-250">#</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (count($allProducts) > 0) {
                          foreach ($allProducts as $val) { ?>
                            <tr>
                              <td><?php echo strtoupper($val['name']) ?></td>
                              <td>
                                <?php
                                $orders_details    =   $db->getAllRecords('orders_details', '*,SUM(quantity) as vendu , SUM(price) as prixvendu ', 'AND products_id="' . $val['id'] . '"  AND statut="L"');
                                if (count($orders_details) > 0 && $orders_details[0]['vendu'] != "") {
                                  echo $orders_details[0]['vendu'];
                                } else {
                                  echo '0';
                                } ?>
                              </td>
                              <td>
                                <?php if (count($orders_details) > 0 && $orders_details[0]['prixvendu'] != "") {
                                  echo $orders_details[0]['prixvendu'];
                                } else {
                                  echo '0';
                                } ?> F CFA
                              </td>
                              <td>
                                <?php
                                $allStocksV    =   $db->getAllRecords('stock', '*', 'AND product_id="' . $val['id'] . '"  AND statut="1"');
                                if (count($allStocksV) > 0 && $allStocksV[0]['en_stock'] != "") {
                                  echo $percent = round(($orders_details[0]['vendu'] * 100) / $allStocksV[0]['en_stock'], 2);
                                } else {
                                  echo '0';
                                } ?>
                                %</td>
                              <td>
                                <div class="progress progress-md rounded-0">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $percent ?>%" aria-valuenow="<?php echo $percent ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                            </tr>
                          <?php }
                        } else { ?>
                          <tr>
                            <td colspan="5">Aucun produit enregistré</td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- <div class="col-xl-4">

              <!-- Chat 
              <div class="card card-default chat">
                <div class="card-header">
                  <h2>Selena Wagner</h2>
                  <div class="dropdown dropdown-chat-state">
                    <button class="dropdown-toggle btn btn-primary btn-rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                      <i class="mdi mdi-account-alert"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <li>
                        <a href="#" class="user-link">
                          <img src="images/user/user-sm-01.jpg" alt="User Image">
                          <span class="username">anna patuary
                            <span class="badge badge-secondary">18</span>
                          </span>
                          <span class="state active">
                            <i class="mdi mdi-circle-medium"></i>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="user-link">
                          <img src="images/user/user-sm-02.jpg" alt="User Image">
                          <span class="username">riman Ghose
                            <span class="badge badge-secondary">18</span>
                          </span>
                          <span class="state">
                            1hrs
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="user-link">
                          <img src="images/user/user-sm-03.jpg" alt="User Image">
                          <span class="username">riman Ghose
                            <span class="badge badge-secondary">18</span>
                          </span>
                          <span class="state">
                            1hrs
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="user-link">
                          <img src="images/user/user-sm-04.jpg" alt="User Image">
                          <span class="username">riman Ghose
                            <span class="badge badge-secondary">18</span>
                          </span>
                          <span class="state">
                            1hrs
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="user-link">
                          <img src="images/user/user-sm-05.jpg" alt="User Image">
                          <span class="username">riman Ghose</span>
                          <span class="state">15min</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body pb-0" data-simplebar style="height: 363px;">
                  <!-- Media Chat Left 
                  <div class="media media-chat">
                    <img src="images/user/user-sm-01.jpg" class="rounded-circle" alt="Avata Image">
                    <div class="media-body">
                      <div class="text-content">
                        <span class="message">Hello my name is anna.</span>
                        <time class="time">5 mins ago</time>
                      </div>
                    </div>
                  </div>

                  <!-- Media Chat Right 
                  <div class="media media-chat media-chat-right">
                    <div class="media-body">
                      <div class="text-content">
                        <span class="message">Hello i am Riman.</span>
                        <time class="time">4 mins ago</time>
                      </div>
                      <div class="text-content">
                        <span class="message">I want to know about yourself</span>
                        <time class="time">3 mins ago</time>
                      </div>
                    </div>
                    <img src="images/user/user-sm-02.jpg" class="rounded-circle" alt="Avata Image">
                  </div>

                  <!-- Media Chat Left 
                  <div class="media media-chat">
                    <img src="images/user/user-sm-01.jpg" class="rounded-circle" alt="Avata Image">
                    <div class="media-body">
                      <div class="text-content">
                        <span class="message">Its had resolving otherwise she contented therefore.</span>
                        <time class="time">1 mins ago</time>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="chat-footer">
                  <form>
                    <div class="input-group input-group-chat">
                      <div class="input-group-prepend">
                        <span class="emoticon-icon mdi mdi-emoticon-happy-outline"></span>
                      </div>
                      <input type="text" class="form-control" aria-label="Text input with dropdown button">
                    </div>
                  </form>
                </div>
              </div>

            </div> -->
          </div>

          <!-- Stock Modal -->
          <!-- <div class="modal fade modal-stock" id="modal-stock" aria-labelledby="modal-stock" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
              <form action="#">
                <div class="modal-content">
                  <div class="modal-header align-items-center p3 p-md-5">
                    <!-- <h2 class="modal-title" id="exampleModalGridTitle">Add Stock</h2> 
                    <div>
                      <button type="button" class="btn btn-light btn-pill mr-1 mr-md-2" data-dismiss="modal"> cancel </button>
                      <button type="submit" class="btn btn-primary  btn-pill" data-dismiss="modal"> save </button>
                    </div>

                  </div>
                  <div class="modal-body p3 p-md-5">
                    <div class="row">
                      <div class="col-lg-8">
                        <h3 class="h5 mb-5">Product Information</h3>
                        <div class="form-group mb-5">
                          <label for="new-product">Product Title</label>
                          <input type="text" class="form-control" id="new-product" placeholder="Add Product">
                        </div>
                        <div class="form-row mb-4">
                          <div class="col">
                            <label for="price">Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                              </div>
                              <input type="text" class="form-control" id="price" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
                            </div>
                          </div>
                          <div class="col">
                            <label for="sale-price">Sale Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                              </div>
                              <input type="text" class="form-control" id="sale-price" placeholder="Sale Price" aria-label="SalePrice" aria-describedby="basic-addon1">
                            </div>
                          </div>
                        </div>

                        <div class="product-type mb-3 ">
                          <label class="d-block" for="sale-price">Product Type <i class="mdi mdi-help-circle-outline"></i> </label>
                          <div>

                            <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                              <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="customRadio1">Physical Good</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                              <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio2">Digital Good</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                              <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio3">Service</label>
                            </div>

                          </div>
                        </div>

                        <div class="editor">
                          <label class="d-block" for="sale-price">Description <i class="mdi mdi-help-circle-outline"></i></label>
                          <div id="standalone">
                            <div id="toolbar">
                              <span class="ql-formats">
                                <select class="ql-font"></select>
                                <select class="ql-size"></select>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-bold"></button>
                                <button class="ql-italic"></button>
                                <button class="ql-underline"></button>
                              </span>
                              <span class="ql-formats">
                                <select class="ql-color"></select>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-blockquote"></button>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-list" value="ordered"></button>
                                <button class="ql-list" value="bullet"></button>
                                <button class="ql-indent" value="-1"></button>
                                <button class="ql-indent" value="+1"></button>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-direction" value="rtl"></button>
                                <select class="ql-align"></select>
                              </span>
                            </div>
                          </div>
                          <div id="editor"></div>
                          <div class="custom-control custom-checkbox d-inline-block mt-2">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Hide product from published site</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" placeholder="please imgae here">
                          <span class="upload-image">Click here to <span class="text-primary">add product image.</span> </span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div> -->
        </div>
      </div>
      <!-- Footer -->
      <?php include('assets/config/footer.php') ?>
    </div>
  </div>
  <input type="hidden" name="jan" id="jan" value="<?php echo $ordersCountL1 ?>">
  <input type="hidden" name="jan" id="fev" value="<?php echo $ordersCountL2 ?>">
  <input type="hidden" name="jan" id="mar" value="<?php echo $ordersCountL3 ?>">
  <input type="hidden" name="jan" id="avr" value="<?php echo $ordersCountL4 ?>">
  <input type="hidden" name="jan" id="mai" value="<?php echo $ordersCountL5 ?>">
  <input type="hidden" name="jan" id="juin" value="<?php echo $ordersCountL6 ?>">
  <input type="hidden" name="jan" id="juil" value="<?php echo $ordersCountL7 ?>">
  <input type="hidden" name="jan" id="aou" value="<?php echo $ordersCountL8 ?>">
  <input type="hidden" name="jan" id="sep" value="<?php echo $ordersCountL9 ?>">
  <input type="hidden" name="jan" id="oct" value="<?php echo $ordersCountL10 ?>">
  <input type="hidden" name="jan" id="nov" value="<?php echo $ordersCountL11 ?>">
  <input type="hidden" name="jan" id="dec" value="<?php echo $ordersCountL12 ?>">
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
  <!-- datatables links -->
  <script type="text/javascript" src="assets/datatables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/jszip.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="assets/datatables/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/app.js"></script>
  <script type="text/javascript" src="assets/datatables/js/jquery.mark.min.js"></script>
  <script type="text/javascript" src="assets/datatables/js/datatables.mark.js"></script>
  <script type="text/javascript" src="assets/datatables/js/buttons.colVis.min.js"></script>
  <!-- datatables links -->
  <script src="plugins/apexcharts/apexcharts.js"></script>
  <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
  <script src="plugins/daterangepicker/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script>
    jQuery(document).ready(function() {
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
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script src="plugins/toaster/toastr.min.js"></script>
  <script src="js/mono.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/map.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>