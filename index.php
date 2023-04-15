<?php
session_start();

include('assets/database/config.php');

$allCategories = $db->getAllRecords('categories', '*', "AND statut='1'", 'ORDER BY name ASC');
$conditionSD = ' AND products.id=stock.products_id';
$conditionSD .= ' AND images.products_id=products.id';
$conditionSD .= ' AND prix.id=products.price';
$conditionSD .= ' AND products.statut="1"';
$ProduitsPlusVendu = [];

$ProduitsPlusVendu  = $db->getAllRecords('stock', 'disponible,product_id', '',  'ORDER BY disponible ASC LIMIT 12');
$allProducts  = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', 'AND products.statut="1"', 'ORDER BY products.name ASC LIMIT 12');
$allProducts1  = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', 'AND products.statut="1"', 'ORDER BY products.name ASC LIMIT 13,24');
$allProducts2  = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', 'AND products.statut="1"', 'ORDER BY products.name ASC LIMIT 25,38');

$allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
define('MENU', 'HOME');
if (isset($_REQUEST['orders_id']) && $_REQUEST['orders_id'] != "") {
    extract($_REQUEST);
    echo '<script type="text/javascript"> var orders_id=' . $orders_id . '; window.open("tcpdf/source/printrecu.php?orders_id="+orders_id, "", " largeur = 300 , hauteur = 200 "); ;</script>';
}

?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/index-3.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:15:16 GMT -->



    <!-- CSS
    ============================================ -->
   
    <!-- Bootstrap CSS -->
<?php include("link.php")?>
    <link rel="stylesheet" href="assets/css/toastr.min.css">
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/toast.js"></script>
  <?php include("heure.php")?>


        <!-- Start Header Top Area  -->
        <?php include("bar-recherche.php")?>
        <!-- End Header Top Area  -->

        <!-- Start Mainmenu Area  -->
        <?php include("menu-categorie.php")?>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.php" class="logo">
                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li>
                                    <a href="index.php">Accueil</a>
                                </li>


                                <li><a href="about-us.php">A propos</a></li>

                                <li><a href="contact.php">Contactez nous</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-sm-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                          
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count " style="background-color:#f15f79 !important"></span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">Les entreprises doivent se connecter</span>
                                    <ul>
                                        <li>
                                            <a href="my-account.php"><u>Mon compte</u></a>
                                        </li>
                                    </ul>
                                    <div class="login-btn">
                                        <?php if (isset($_SESSION["userYopciConnected"]) && $_SESSION["userYopciConnected"] != array()) { ?>
                                            <a href="deconnexion.php" class="axil-btn btn-danger ">Se deconnecter</a>
                                        <?php } else { ?>
                                            <a href="sign-in.php" class="axil-btn text-white" style="background-color:#f15f79">Se connecter</a>
                                        <?php } ?>
                                    </div>
                                    <?php if (!isset($_SESSION["userYopciConnected"]) || isset($_SESSION["userYopciConnected"]) && $_SESSION["userYopciConnected"] == array()) { ?>
                                        <div class="reg-footer text-center">Pas de compte ? <a href="sign-up.php" class="btn-link">S'inscrire.</a></div>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area  -->
    </header>

    <main class="main-wrapper">
        <!-- End Categorie Area  -->
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
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "noproduct") {
            // echo '<script type="text/javascript">swal({ title: "Oups !", text: "Aucun produit dans le panier", icon: "info", confirmButtonText: "OK" });</script>';
            echo '<script type="text/javascript"> // Set the options that I want 
             toastr.info("Aucun produit dans le panier!","Oups!!!");</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
            echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil réinitialisé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
            echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cet Profil Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "vider") {
            echo '<script type="text/javascript"> 
            // Set the options that I want 
             toastr.success("Commande annulée avec succès!","validé!!!");
             </script>';
            // echo '<script type="text/javascript">swal({ title: "Validé !", text: "Commande annulée avec succès", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "viderPanier") {
            echo '<script type="text/javascript"> 
            // Set the options that I want 
             toastr.success("Panier vidé avec succès!","validé!!!");
             </script>';
            // echo '<script type="text/javascript">swal({ title: "Validé !", text: "Panier vidé avec succès", icon: "success", confirmButtonText: "OK" });</script>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ls") {
            echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Resignation reussie avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
        };
        if (isset($_REQUEST['envoyer']) && $_REQUEST['envoyer'] != "") {
            extract($_REQUEST);
            $data = array(
                'email' => $emailTosend,
                'message' => $messageTosend
            );
            $insert = $db->insert('Users_message', $data);
            if ($insert) {
                echo '<script type="text/javascript">swal({ title: "Envoyé !", text: "Message envoyé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            }
        } ?>

        <!-- Start Slider Area -->
        <?php include("entete.php"); ?>

        <!-- End New Arrivals Product Area  -->

        <!-- Start Best Sellers Product Area  -->
        <div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter text-white"><i class="far fa-shopping-basket " style="background-color:#f15f79"></i> <span class="text-dark">Meilleures ventes</span></span>
                    <h2 class="title">Les articles les mieux vendus</h2>
                </div>

                <div class="new-arrivals-product-activation-2 product-transparent-layout slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                    <?php foreach ($ProduitsPlusVendu as $vals) {
                        $ProduitsPlus  = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', 'AND products.statut="1" AND products.id="' . $vals['product_id'] . '"', 'ORDER BY products.name ASC LIMIT 12');
                        // var_dump($ProduitsPlus);exit;
                    ?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-seven ">
                                <div class="product-content">
                                    <div class="cart-btn">
                                        <a href="shop.php">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.php?product_id=<?php echo $vals['product_id'];  ?>"><?php echo $ProduitsPlus[0]['nomDuProduit'] ?></a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price"><?php echo $ProduitsPlus[0]['valeur'] ?> F CFA</span>
                                            <!-- <span class="price old-price">$49.99</span> -->
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="thumbnail">
                                    <a href="single-product.php?product_id=<?php echo $vals['product_id'];  ?>">
                                        <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" style="width:200;height:250px;" loading="lazy" w src="backoffice/images/products/<?php echo $ProduitsPlus[0]['imageDuProduit'] ?> " alt="Product Images">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <!-- End  Best Sellers Product Area  -->

       

        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter text-white"><i class="far fa-shopping-basket" style="background-color:#f15f79"></i> <span class="text-dark">Nos Produits</span></span>
                    <h2 class="title">Explorer Tous nos Produits</h2>
                </div>
                <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <?php foreach ($allProducts1 as $vals) {
                                $allStockss = $db->getAllRecords('stock', 'product_id,disponible', "AND statut='1' AND product_id='" . $vals['idDuProduit'] . "'");
                            ?>
                                <div class="col-xl-3 col-lg-3 col-sm-6 col-12 mb--30">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="single-product.php?product_id=<?php echo $vals['idDuProduit'];  ?>">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="backoffice/images/products/<?php echo $vals['imageDuProduit'] ?>" style="width:200;height:250px;" alt="Product Images">
                                            </a>
                                            <div class="label-block label-right">
                                                <?php foreach ($allStockss as $val1) {
                                                    if ($vals['idDuProduit'] == $val1['product_id']) {
                                                        if ($val1['disponible'] > 0) { ?>

                                                            <div class="product-badget bg-success">En stock</div>
                                                        <?php } else { ?>
                                                            <div class="product-badget bg-danger">Rupture de stock</div>

                                                <?php }
                                                    }
                                                } ?>
                                            </div>
                                            <div class="product-hover-action ">
                                                <ul class="cart-action ">
                                                   
                                                    <li class="select-option"><a href="#" onclick="AddToCart('<?php echo $vals['idDuProduit']; ?>')">Ajouter au panier</a></li>
                                                    <!-- <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="single-product.php?product_id=<?php echo $vals['idDuProduit'] ?>"><?php echo $vals['nomDuProduit']; ?> </a></h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price"><?php echo $vals['valeur']; ?> F CFA</span>
                                                    <!-- <span class="price old-price">$49.99</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <?php foreach ($allProducts2 as $vals) {
                                $allStockss = $db->getAllRecords('stock', 'product_id,disponible', "AND statut='1' AND product_id='" . $vals['idDuProduit'] . "'");
                            ?>
                                <div class="col-xl-3 col-lg-2 col-sm-6 col-12 mb--30">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="single-product.php?product_id=<?php echo $vals['idDuProduit'];  ?>">
                                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="backoffice/images/products/<?php echo $vals['imageDuProduit'] ?>" style="width:200;height:250px;" alt="Product Images">
                                            </a>
                                            <div class="label-block label-right">
                                                <?php foreach ($allStockss as $val1) {
                                                    if ($vals['idDuProduit'] == $val1['product_id']) {
                                                        if ($val1['disponible'] > 0) { ?>

                                                            <div class="product-badget bg-success">En stock</div>
                                                        <?php } else { ?>
                                                            <div class="product-badget bg-danger">Rupture de stock</div>

                                                <?php }
                                                    }
                                                } ?>
                                            </div>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <!-- <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li> -->
                                                    <li class="select-option "><a href="#" onclick="AddToCart('<?php echo $vals['idDuProduit']; ?>')">Ajouter au panier</a></li>
                                                    <!-- <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title"><a href="single-product.php?product_id=<?php echo $vals['idDuProduit'] ?>"><?php echo $vals['nomDuProduit']; ?> </a></h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price"><?php echo $vals['valeur']; ?> F CFA</span>
                                                    <!-- <span class="price old-price">$49.99</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- End .slick-single-layout -->
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.php" class="axil-btn btn-bg-lighter btn-load-more">Voir tous les produits</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Expolre Product Area  -->

        <!-- Start Categorie Area  -->
        <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
                    <h2 class="title">Rechrcher par Categorie</h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <?php foreach ($allCategories as $val) {
                        $imagesN = $db->getAllRecords('images_category', 'id,name', 'AND category_id="' . $val['id'] . '"', '', '') ?>
                        <div class="slick-single-layout">
                            <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                                <a href="shop.php?categories=<?php echo $val['id'] ?>">
                                    <img class="img-fluid" style="border:1px solid #f15f79;border-radius:5px;width:50px;height:50px" src="backoffice/images/categories/<?php echo $imagesN[0]['name'] ?>" alt="Categories Images">
                                    <h6 class="cat-title"><?php echo ucfirst(strtolower($val['name'])) ?></h6>
                                </a>
                            </div>
                            <!-- End .categrie-product -->
                        </div>
                    <?php } ?>

                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
        <!-- End Categorie Area  -->

        <!-- Start New Arrivals Product Area  -->
        <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--50">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter text-white"><i class="far fa-shopping-basket" style="background-color:#f15f79"></i> <span class="text-dark">Cette semaine</span></span>

                    <h2 class="title">Produits Ajoutés Récemment</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                    <?php foreach ($allProducts as $vals) {
                        $allStockss = $db->getAllRecords('stock', 'product_id,disponible', "AND statut='1' AND product_id='" . $vals['idDuProduit'] . "'");

                    ?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-two has-color-pick">
                                <div class="thumbnail">
                                    <a href="single-product.php?product_id=<?php echo $vals['idDuProduit'] ?>">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="backoffice/images/products/<?php echo $vals['imageDuProduit'] ?>" style="width:200;height:250px;" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <?php foreach ($allStockss as $val1) {
                                            if ($vals['idDuProduit'] == $val1['product_id']) {
                                                if ($val1['disponible'] > 0) { ?>

                                                    <div class="product-badget bg-success">En stock</div>
                                                <?php } else { ?>
                                                    <div class="product-badget bg-danger">Rupture de stock</div>

                                        <?php }
                                            }
                                        } ?>

                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.php?product_id=<?php echo $vals['idDuProduit'];  ?>"><?php echo $vals['nomDuProduit'];  ?></a></h5>
                                        <div class="product-price-variant">
                                            <!-- <span class="price old-price">$50</span> -->
                                            <span class="price current-price"><?php echo $vals['valeur']; ?> F CFA</span>
                                        </div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action justify-content-center">
                                            <!-- <li class="select-option"><a href="cart.php">Ajouter au panier</a></li> -->
                                            <li class="select-option"><a href="#" onclick="AddToCart('<?php echo $vals['idDuProduit']; ?>')">Ajouter au panier</a></li>

                                            <!-- <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
        <!-- End New Arrivals Product Area  -->

        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--12">
                    <form method="POST">
                        <div class="newsletter-content">
                            <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open text-white" style="background-color:#f15f79"></i><span class="text-white">Newsletter</span> </span>
                            <h2 class="title mb--40 mb_sm--30 text-white">Nous aimerions avoir de vos nouvelles.</h2>
                            <p class="title mb--40 mb_sm--30 text-white " style="font-size:16px">Si vous avez d’excellents produits que vous fabriquez ou <br>si vous cherchez à travailler avec nous, envoyez-nous un message.</hp>
                            <div class="input-group newsletter-form">
                                <div class="position-relative newsletter-inner mb--15">
                                    <input placeholder="Entrez votre adresse email" name="emailTosend" type="email" required>
                                </div>
                                <div class="position-relative shop-inner mb--15">
                                    <input placeholder="saisissez votre message" name='messageTosend' type="text" required>
                                </div>
                                <button type="submit" name="envoyer" value="envoyer" class="mb--15" style="background-color:#f15f79">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->

    </main>

    <?php include('assets/service-area.php') ?>

  
    <!-- End Footer Area  -->
    <?php include('assets/footer.php') ?>
    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  



    <div class="cart-dropdown" id="cart-dropdown">
      
    </div>


    <!-- JS
============================================ -->
   <?php include("script.php")?>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/index-3.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:15:29 GMT -->

</html>