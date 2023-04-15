<?php
session_start();
include('assets/database/config.php');
if (isset($_REQUEST['publier']) && $_REQUEST['publier'] != "") {
    extract($_REQUEST);
    $data = array(
        'product_id' => $product_id,
        'nomClient' => $nom,
        'prenomClient' => $prenom,
        'etoiles' => $Notes,
        'commentaires' => $message
    );
    $insert = $db->insert('comment_by_product', $data);
    if ($insert) {
        header("location:" . $_SERVER['PHP_SELF'] . "?product_id=".$product_id."&msg=pub");
    }
}
if (isset($_REQUEST['product_id']) && $_REQUEST['product_id'] != "") {

    $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
    $allStockss = $db->getAllRecords('stock', 'disponible', "AND statut='1'AND product_id='" . $_REQUEST['product_id'] . "'", '');

    $condition = "";
    $condition .= "AND statut='1'";
    $condition .= "AND id='" . $_REQUEST['product_id'] . "'";
    $product = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ');
    $conditionI = "";
    $conditionI .= "AND statut='1'";
    $conditionI .= "AND product_id='" . $_REQUEST['product_id'] . "'";
    $imagesU = $db->getAllRecords('images', '*', $conditionI, 'ORDER BY id ');
  
    $category_id = $product[0]['categories_id'];


    $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');

    $price_id = $product[0]['price'];
    $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');

    $masse_id = $product[0]['mass'];
    $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');


    $allCategories = $db->getAllRecords('categories', '*', "AND statut='1'", 'ORDER BY name ASC');
    $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
    $condition = "";
    $condition .= "AND products.id!='" . $_REQUEST['product_id'] . "'";
    $condition .= "AND products.statut='1'";
    $condition .= "AND products.categories_id='" . $product[0]['categories_id'] . "'";

    $allProduct  = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', $condition, 'ORDER BY products.name ASC LIMIT 20');

    $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
    $comment = $db->getAllRecords('comment_by_product', '*', "AND statut='1' AND product_id='" . $_REQUEST['product_id'] . "'", 'ORDER BY created_at DESC LIMIT 5');
    $comments = $db->getAllRecords('comment_by_product', '*', "AND statut='1' AND product_id='" . $_REQUEST['product_id'] . "'", 'ORDER BY created_at DESC ');
    $etoiles = $db->getAllRecords('comment_by_product', 'SUM(etoiles) as etoiles', "AND statut='1' AND product_id='" . $_REQUEST['product_id'] . "'", 'ORDER BY created_at DESC');
    $etoiles = $etoiles[0]['etoiles'];
    define('MENU', 'SHOP');
?>
    <!doctype html>
    <html class="no-js" lang="en">


    

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo APP_NAME ?></title>
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


    <body class="sticky-header overflow-md-visible">
     
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <?php include('assets/menu.php'); ?>
        <!-- End Header -->

        <main class="main-wrapper">
            <?php

            if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil supprimé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "deconnecte") {
                echo '<script type="text/javascript">swal({ title: "Deconnecté !", text: "Vous vous etes déconnectés!", icon: "info", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "Vconnecte") {
                echo '<script type="text/javascript">swal({ title: "Hey!!!", text: "Veullez vous connectés pour acceder a votre compte!", icon: "info", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil modifié avec succès! \n Vos infos seront mises a jour a la prochaine connexion", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Vous n\'avez rien changé!", icon: "warning", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil ajouté avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil réinitialisé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
                echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cet Profil Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "pub") {
                echo '<script type="text/javascript">swal({ title: "publié !", text: "Message publié avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            };
            ?>
            <!-- Start Shop Area  -->
            <div class="axil-single-product-area bg-color-white">
                <div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
                    <div class="container">
                        <div class="row row--50">
                            <div class="col-lg-6 mb--40">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-large-thumbnail-2 single-product-thumbnail axil-product slick-layout-wrapper--15 axil-slick-arrow arrow-both-side-3">
                                            <?php foreach ($imagesU as $val) { ?>
                                                <div class="thumbnail">
                                                    <img src="backoffice/images/products/<?php echo $val['name'] ?>" style="height:400px;width:570px"alt="Product Images">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="small-thumb-wrapper product-small-thumb-2 small-thumb-style-two small-thumb-style-three">
                                            <?php foreach ($imagesU as $val) { ?>
                                                <div class="small-thumb-img ">
                                                    <img src="backoffice/images/products/<?php echo $val['name'] ?>" style="height:50px;width:50px" alt="samll-thumb">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb--40">
                                <div class="h-100">
                                    <div class="position-sticky sticky-top">
                                        <div class="single-product-content nft-single-product-content">
                                            <div class="inner">
                                                <h2 class="product-title"><?php echo strtoupper($product[0]['name']) ?></h2>
                                                <div class="price-amount price-offer-amount">
                                                    <span class="price current-price"><?php echo $price[0]['valeur'] ?> F CFA </span>
                                                </div>
                                                <div class="product-rating">
                                                    <div class="star-rating">
                                                        <?php if ($etoiles != null) {
                                                            $notes = ($etoiles / count($comments));
                                                            if (is_float($notes)) {
                                                                $notes = explode(".", $notes);
                                                                $notes = $notes[0];
                                                            }
                                                        } else {
                                                            $notes = 0;
                                                        };
                                                        for ($ii = 1; $ii <= $notes; $ii++) { ?>
                                                            <i class="fas fa-star"></i>
                                                        <?php } ?>
                                                        <?php for ($ii = $notes; $ii <= 4; $ii++) { ?>
                                                            <i class="far fa-star"></i>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="review-link">
                                                        <a href="#"><span><?php echo count($comments) ?> </span> Commentaire(s) pour ce produit</a>
                                                    </div>
                                                </div>
                                                <?php
                                                if (isset($allStockss[0]['disponible'])) {
                                                    if ($allStockss[0]['disponible'] > 0 && $allStockss[0]['disponible'] <= 10) { ?>
                                                        <div class="product-badget text-warning"><b> <?php echo $allStockss[0]['disponible'] ?> article(s) seulement disponible(s) en stock</b></div><br>
                                                    <?php } else if (isset($allStockss[0]['disponible']) && $allStockss[0]['disponible'] > 5) { ?>
                                                        <div class="product-badget text-success"><b> <?php echo $allStockss[0]['disponible'] ?> article(s) disponible(s) en stock</b></div><br>

                                                    <?php  } else { ?>
                                                        <div class="product-badget text-danger"><b> Article en rupture de stock<b><br>
                                                                    <span class="text-danger" style="font-size:14px"><b><i><u>Pour les articles indisponibles, la livraison se fera au maximum dans les 10 prochains jours</u></i></b></span>
                                                        </div><br>

                                                <?php }
                                                }
                                                ?>
                                                <!-- Start Product Action Wrapper  -->
                                                <div class="product-action-wrapper d-flex-center">
                                                    <!-- Start Quentity Action  -->

                                                    <div class="pro-qty mr--20">
                                                        <span class="dec qtybtn">-</span>
                                                        <input type="number" id="quantite" value="1" min='1' step='1'>
                                                        <span class="inc qtybtn">+</span>
                                                    </div>


                                                    <!-- End Quentity Action  -->

                                                    <!-- Start Product Action  -->
                                                    <ul class="product-action d-flex-center mb--0">
                                                        <li class="add-to-cart"> 
                                                            <div class="row">
                                                                <div class="col-1 mt-4 mr-2">
                                                                <a href="#" class="btn btn-warning btn-lg"  onclick="Retour()">
                                                <i class="fa fa-arrow-left"></i>
                                                        </a>
                                                                </div>
                                                                <div class="col-10 ml-2">
                                                        <a onclick="AddToCartDetail(<?php echo $_REQUEST['product_id'] ?>)" class="axil-btn  text-white" style="background-color:#ffb347;cursor:pointer">Ajouter au panier</a>

                                                                </div>
                                                            </div>
                                                            
                                                    </li>
                                                      
                                                    </ul>
                                                    <!-- End Product Action  -->

                                                </div>
                                                <!-- End Product Action Wrapper  -->
                                                <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white nft-info-tabs">
                                                    <div class="container">
                                                        <ul class="nav tabs" id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                                            </li>
                                                            <li class="nav-item " role="presentation">
                                                                <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab" aria-controls="additional-info" aria-selected="false">Information Additionnelle</a>
                                                            </li>

                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                                                <div class="product-additional-info">
                                                                    <p class="mb--15"><strong>A Propos de ce Produit</strong></p>
                                                                    <p><?php echo ucfirst(strtolower($product[0]['description'])) ?></p>

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                                                                <div class="product-additional-info">
                                                                    <div class="table-responsive">
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Categorie</th>
                                                                                    <td><?php echo ucwords(strtolower($categorie[0]['name'])) ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>En stock </th>
                                                                                    <td> <?php if (isset($allStockss[0]['disponible'])) echo $allStockss[0]['disponible'] ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Masse</th>
                                                                                    <td><?php echo ucwords(strtolower($masse[0]['libelle'])) ?></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .single-product-thumb -->
            </div>
            <!-- End Shop Area  -->
            <!-- Start Recently Viewed Product Area  -->
            <div class="axil-product-area bg-color-white pt--10 pb--50 pb_sm--30">
                <div class="container">
                    <div class="reviews-wrapper">
                        <h4 class="mb--60">Commentaires</h4>
                        <div class="row">
                            <div class="col-lg-6 mb--40">
                                <div class="axil-comment-area pro-desc-commnet-area">
                                    <h5 class="title"><?php echo count($comment) ?> Commentaire(s) pour ce produit</h5>
                                    <ul class="comment-list">
                                        <?php if (count($comment) > 0) {
                                            foreach ($comment as $vals) { ?>
                                                <!-- Start Single Comment  -->
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="single-comment">
                                                            <div class="comment-img">
                                                                <img src="assets/images/user/imguser.png" style="width: 65px;height:65px" alt="Author Images">
                                                            </div>
                                                            <div class="comment-inner">
                                                                <h6 class="commenter">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text=""><?php echo ucwords($vals['prenomClient']) . " " . ucwords($vals['nomClient']) ?></span>
                                                                        </span>
                                                                    </a>
                                                                    <span class="commenter-rating ratiing-four-star">
                                                                        <?php if ($vals["etoiles"] != null) {
                                                                            $notes = $vals["etoiles"];
                                                                        } else {
                                                                            $notes = 0;
                                                                        };
                                                                        for ($ii = 1; $ii <= $notes; $ii++) { ?>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        <?php } ?>
                                                                        <?php for ($ii = $notes; $ii <= 4; $ii++) { ?>
                                                                            <a href="#"><i class="fas fa-star empty-rating"></i></a>
                                                                        <?php } ?>
                                                                    </span>
                                                                </h6>
                                                                <div class="comment-text">
                                                                    <p>“<?php echo $vals['commentaires'] ?>” </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- End Single Comment  -->
                                            <?php }
                                        } else { ?>
                                            <li>
                                                <div class="comment-text">
                                                    <p> Aucun commentaire pour ce produit</p>
                                                </div>

                                            </li>
                                        <?php }  ?>
                                    </ul>
                                </div>
                                <!-- End .axil-commnet-area -->
                            </div>
                            <!-- End .col -->
                            <?php include("au-click.php"); ?>
            <!-- End Recently Viewed Product Area  -->
        </main>
        <?php include("assets/service-area.php"); ?>
        <!-- Start Footer Area  -->
        <?php include("assets/footer.php"); ?>
        <!-- End Footer Area  -->
        <!-- JS
============================================ -->
        <!-- Modernizer JS -->
        <?php include('script.php')?>
        <!-- Main JS -->
        <?php include('etoile.php')?>
       
    </body>


    <!-- Mirrored from new.axilthemes.com/demo/template/etrade/single-product-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:13 GMT -->

    </html><?php } else {
            header('location:' . PATH);
        } ?>