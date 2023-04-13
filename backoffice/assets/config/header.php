<?php
$conditionH = ' AND orders.statut="V"';
$cmdLivrees = $db->getAllRecords1('orders', 'orders_details', '*,orders.created_at as orders_created_at,GROUP_CONCAT( orders_details.price SEPARATOR "," ) as priceInOrder,GROUP_CONCAT( orders_details.quantity SEPARATOR "," ) as allQuantity,SUM(price) as allPrice,GROUP_CONCAT( orders_details.products_id SEPARATOR "," ) as AllProducts', 'id', 'orders_id', $conditionH, 'GROUP BY orders.id,orders.created_at ORDER BY orders.created_at DESC');
$stockInf5 = $db->getAllRecords('stock', 'updated_at,disponible,product_id', 'AND disponible < 5', 'ORDER BY id DESC');
$alUsers = $db->getAllRecords('users', '*', '', 'ORDER BY lastname ASC');
$products = $db->getAllRecords('products', 'id,name', '', 'ORDER BY name ASC');
$TotNotif=count($cmdLivrees)+count($stockInf5);
?>
<header class="main-header" id="header">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle">
      <span class="sr-only">Toggle navigation</span>
    </button>

    <span class="page-title"><?php  if (MENU == 'COMMANDES') {
                                echo 'GESTION DES COMMANDES';
                              }
                              if (MENU == 'ANALYSE') {
                                echo 'ANALYSE';
                              }
                              if (MENU == 'UTILISATEUR') {
                                echo 'COMPTES UTILISATEURS';
                              }
                              if (MENU == 'PROFIL') {
                                echo 'PROFILS UTILISATEURS';
                              }
                              if (MENU == 'CATEGORIES') {
                                echo 'CATEGORIES DE PRODUITS';
                              }
                              if (MENU == 'MAIN') {
                                echo 'TABLEAU DE BORD';
                              }
                              if (MENU == 'PRODUITS') {
                                echo 'PRODUITS';
                              }
                              if (MENU == 'PRIX') {
                                echo 'PRIX DES PRODUITS';
                              }
                              if (MENU == 'MASSE') {
                                echo 'MASSE DES PRODUITS';
                              }
                              if (MENU == 'CODEPROMO') {
                                echo 'CODE PROMO SUR LES COMMANDES';
                              }
                              if (MENU == 'TYPECODEPROMO') {
                                echo 'TYPE DE CODE PROMO SUR LES COMMANDES';
                              }
                              if (MENU == 'STOCKS') {
                                echo 'GESTION DU STOCK';
                              } ;
                              ?></span>

    <div class="navbar-right ">



      <ul class="nav navbar-nav">
        <!-- Offcanvas -->

        <li class="custom-dropdown">
          <button class="notify-toggler custom-dropdown-toggler">
            <i class="mdi mdi-bell-outline icon"></i>
            <span class="badge badge-xs  bg-primary rounded-circle"><?php echo $TotNotif ?></span>
          </button>
          <div class="dropdown-notify">

            <header>

              <div class="nav nav-underline" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" style="font-size:14px"id="all-tabs" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">Commandes non livrees (<?php echo count($cmdLivrees) ?>)</a>
                <a class="nav-item nav-link"style="font-size:14px" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="nav-profile" aria-selected="false">stocks (<?php echo count($stockInf5) ?>)</a>
                <!-- <a class="nav-item nav-link" style="font-size:14px"id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="nav-contact" aria-selected="false">Autres (3)</a> -->
              </div>
            </header>

            <div class="" data-simplebar style="height: 325px;">
              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tabs">
                  <?php foreach ($cmdLivrees as $val) { ?>
                    <div class="media media-sm bg-light-10 p-4 mb-0">
                      <div class="media-sm-wrapper bg-primary">
                        <a href="">
                          <!-- <img src="" alt="User Image"> -->
                          <i class="mdi mdi mdi-newspaper "></i>
                        </a>
                      </div>
                      <div class="media-body">
                        <?php if(in_array('commandes',json_decode($_SESSION["userYopci"]["sessionPages"]))){?>
                        <a href="<?php echo PATH ?>commandes/valides.php">
                        <?php }else{?>
                        <a href="#">
                        <?php }?>
                          <span class="title mb-0"style="font-size:14px">
                            <?php foreach ($alUsers as $val1) {
                              if ($val1['id'] == $val['users_id']) { ?>
                            <?php echo ucwords($val1['firstname']) . ' ' . strtoupper($val1['lastname']);
                              }
                            } ?>
                          </span>
                          <span class="discribe"style="font-size:12px"> Lieu de livraison: ...</span>
                          <span class="time">
                            <time>Date de Commande: <?php echo $val['orders_created_at'] ?></time>...
                          </span>
                        </a>
                      </div>
                    </div>
              <?php } ?>

                </div>
              <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">

              <?php foreach($stockInf5 as $val ){
                 foreach($products as $val1 ){ 
                  if($val['product_id'] == $val1['id'] ){ ?>
                <div class="media media-sm p-4 mb-0">
                <div class="media-sm-wrapper bg-primary">
                        <a href="">
                          <!-- <img src="" alt="User Image"> -->
                          <i class="mdi mdi mdi-newspaper "></i>
                        </a>
                      </div>
                  <div class="media-body">
                  <?php if(in_array('stocks',json_decode($_SESSION["userYopci"]["sessionPages"]))){?>
                        <a href="<?php echo PATH ?>stocks/index.php">
                        <?php }else{?>
                        <a href="#">
                        <?php }?>
                      <span class="title mb-0"><?php echo $val1['name'] ?></span>
                      <span class="discribe">il reste exactement <?php echo $val['disponible'] ?> disponible(s) en stock</span>
                      <span class="time">
                        <time><?php echo $val['updated_at'] ?></time>...
                      </span>
                    </a>
                  </div>
                </div>

                <?php }}} ?>

              </div>
              <!-- <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="contact-tab">

                <div class="media media-sm p-4 bg-light mb-0">
                  <div class="media-sm-wrapper bg-primary">
                    <a href="user-profile.html">
                      <i class="mdi mdi-calendar-check-outline"></i>
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="user-profile.html">
                      <span class="title mb-0">New event added</span>
                      <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                      <span class="time">
                        <time>10 min ago...</time>...
                      </span>
                    </a>
                  </div>
                </div>

                <div class="media media-sm p-4 mb-0">
                  <div class="media-sm-wrapper bg-info-dark">
                    <a href="user-profile.html">
                      <i class="mdi mdi-account-multiple-check"></i>
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="user-profile.html">
                      <span class="title mb-0">Add request</span>
                      <span class="discribe">Add Dany Jones as your contact.</span>
                      <div class="buttons">
                        <a href="#" class="btn btn-sm btn-success shadow-none text-white">accept</a>
                        <a href="#" class="btn btn-sm shadow-none">delete</a>
                      </div>
                      <span class="time">
                        <time>6 hrs ago</time>...
                      </span>
                    </a>
                  </div>
                </div>

                <div class="media media-sm p-4 mb-0">
                  <div class="media-sm-wrapper bg-info">
                    <a href="user-profile.html">
                      <i class="mdi mdi-playlist-check"></i>
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="user-profile.html">
                      <span class="title mb-0">Task complete</span>
                      <span class="discribe">Afraid at highly months do things on at.</span>
                      <span class="time">
                        <time>1 hrs ago</time>...
                      </span>
                    </a>
                  </div>
                </div>

              </div> -->
              </div>
            </div>

            <footer class="border-top dropdown-notify-footer">
              <div class="d-flex justify-content-between align-items-center py-2 px-4">
                <span></span>
                <a id="refress-button" href="<?php echo $_SERVER['PHP_SELF'] ?>" class="btn mdi mdi-cached btn-refress"></a>
              </div>
            </footer>
          </div>
        </li>
        <!-- User Account -->
        <li class="dropdown user-menu">
          <button class="dropdown-toggle nav-link" data-toggle="dropdown">
            <img src="<?php echo PATH ?>images/user/<?php echo $_SESSION["userYopci"]['photo'] ?>" width="40px" height="40px" class="user-image rounded-circle" alt="User Image" />
            <span class="d-none d-lg-inline-block"><?php echo strtoupper($_SESSION["userYopci"]['prenom'] . ' ' . $_SESSION["userYopci"]['nom']); ?></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li>
              <a class="dropdown-link-item" href="<?php echo PATH; ?>profil.php">
                <i class="mdi mdi-account-outline"></i>
                <span class="nav-text">Mon Profil</span>
              </a>
            </li>
            <li class="dropdown-footer bg-danger">
              <a class="dropdown-link-item text-white" href="<?php echo PATH ?>assets/config/deconnexion.php">
                <i class="mdi mdi-logout"></i>
                <span class="nav-text">Se déconnecter</span> </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>


</header>