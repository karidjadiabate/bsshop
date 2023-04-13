<?php
include('assets/database/config.php');
$allCategories = $db->getAllRecords('categories', '*', "AND statut='1'", 'ORDER BY name ASC');
$allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
$condition = "";
$condition .= "AND products.statut='1'";
if (isset($_REQUEST['categories']) && $_REQUEST['categories'] != "" && $_REQUEST['categories'] != "all") {
    $condition .= "AND products.categories_id='" . $_REQUEST['categories'] . "'";
}
if (isset($_REQUEST['prod-search']) && $_REQUEST['prod-search'] != "" && $_REQUEST['prod-search'] != "all") {
    $condition .= "AND products.name like '%" . $_REQUEST['prod-search'] . "%'";
}
if (isset($_REQUEST['intValPrice']) && $_REQUEST['intValPrice'] != "" && $_REQUEST['intValPrice'] != "Tous") {
    $_REQUEST['intValPrices'] = explode(" - ", $_REQUEST['intValPrice']);
    // var_dump($_REQUEST['intValPrice']);exit;
    $condition .= "AND prix.valeur BETWEEN '" . $_REQUEST['intValPrices'][0] . "' AND '" . $_REQUEST['intValPrices'][1] . "'";
}
$condition .= "AND images.statut='1'";

if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'search') {
    $allProducts = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', $condition, 'ORDER BY products.name ASC LIMIT 40');
} else if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'search2') {
    $allProducts = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', $condition, 'ORDER BY products.name ASC LIMIT 80');
} else {
    $allProducts = $db->getAllRecords3('products', 'images', 'prix', '*,products.id as idDuProduit,products.statut as statutDuProduit,products.name as nomDuProduit,images.name as imageDuProduit', 'products.id', 'product_id', 'prix.id', 'products.price', $condition, 'ORDER BY products.name ASC LIMIT 20');
}
// var_dump($allProducts);exit;
$allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');

define('MENU', 'SHOP');
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:15:57 GMT -->

<head>
   <?php include("link.php"); ?>
</head>


<body class="sticky-header">
   
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->

    <?php include('assets/menu.php'); ?>
    <!-- End Header -->

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Produits</li>
                            </ul>
                            <h1 class="title">Explorer tous les produits</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="assets/images/product/product-45.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
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
        }
        ?>
        <!-- End Breadcrumb Area  -->
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <form method="GET" action="">
                        <div class="col-lg-12">
                            <div class="axil-shop-top">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="category-select">

                                            <!-- Start Single Select  -->
                                            <select class="single-select" name="categories" id="categories">
                                                <option value="all">Categories</option>
                                                <?php foreach ($allCategories as $val) { ?>
                                                    <option <?php if (isset($_REQUEST['categories']) && $_REQUEST['categories'] == $val['id']) { ?>selected <?php } ?>value="<?php echo  $val['id'] ?>"><?php echo  $val['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- End Single Select  --->
                                            <select class="single-select" name="intValPrice" id="intValPrice">
                                                <option value="Tous">Intervalle de Prix</option>
                                                <?php for ($i = 1; $i < count($allPrice); $i++) { ?>
                                                    <option <?php if (isset($_REQUEST['intValPrice']) && $_REQUEST['intValPrice'] == $allPrice[$i - 1]['valeur'] . ' - ' . $allPrice[$i]['valeur']) { ?>selected <?php } ?>value="<?php echo  $allPrice[$i - 1]['valeur'] . ' - ' . $allPrice[$i]['valeur'] ?>"><?php echo  $allPrice[$i - 1]['valeur'] . ' - ' . $allPrice[$i]['valeur'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- End Single Select  -->
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                            <!-- Start Single Select  -->
                                            <input type="submit" class="btn btn-bg-secondary" value="Rechercher">

                                            <!-- End Single Select  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row row--15">
                    <?php if (count($allProducts) > 0) {
                        foreach ($allProducts as $val) {
                            $allStockss = $db->getAllRecords('stock', 'product_id,disponible', "AND statut='1' AND product_id='" . $val['idDuProduit'] . "'");
                    ?>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="axil-product product-style-one has-color-pick mt--40">
                                    <div class="thumbnail">
                                        <a href="single-product.php?product_id=<?php echo $val['idDuProduit'];  ?>">
                                            <img src="backoffice/images/products/<?php echo $val['imageDuProduit'] ?>" alt="Product Images" style="width:200;height:250px;">
                                        </a>
                                        <div class="label-block label-right">
                                            <?php foreach ($allStockss as $val1) {
                                                if ($val['idDuProduit'] == $val1['product_id']) {
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
                                               
                                                <li class="select-option "><a href="#" onclick="AddToCart('<?php echo $val['idDuProduit']; ?>')">Ajouter au panier</a></li>
                                                <!-- <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.php?product_id=<?php echo $val['idDuProduit'];  ?>"><?php echo strtoupper($val['nomDuProduit']) ?></a></h5>
                                           
                                            <div class="product-price-variant">
                                                <span class="price current-price">F CFA <?php echo $val['valeur']; ?></span>
                                                <span class="price old-price"><?php if (isset($val['oldPrice'])) {
                                                                                    echo $val['oldPrice'];
                                                                                } ?></span>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="row mt-4">
                            <div class="row mt-4">
                                <div class="col-4 mt-4">
                                </div>
                                <div class="col-6 mt-4">
                                    <p>Aucun produit ne correspond a votre critere de recherche</p>
                                </div>
                                <div class="col-3 mt-4">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- End Single Product  -->


                </div>

                <div class="text-center pt--30">
                    <?php if (count($allProducts) > 0) {
                        if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'search2') { ?>
                            <a href="<?php echo $_SERVER['PHP_SELF'] ?>" class="axil-btn btn-bg-lighter btn-load-more">Charger moins</a>
                            <?php } else {
                            if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'search') {  ?>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?search=search2" class="axil-btn btn-bg-lighter btn-load-more">Charger plus</a>
                            <?php } else { ?>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?search=search" class="axil-btn btn-bg-lighter btn-load-more">Charger plus</a>

                    <?php }
                        }
                    } ?>

                </div>
            </div>
            <!-- End .container -->
        </div>
       
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--12">
                    <form method="POST">
                        <div class="newsletter-content">
                            <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open bg-white text-black"></i><span class="text-white">Newsletter</span> </span>
                            <h2 class="title mb--40 mb_sm--30 text-white">Nous aimerions avoir de vos nouvelles.</h2>
                            <p class="title mb--40 mb_sm--30 text-white " style="font-size:16px">Si vous avez d’excellents produits que vous fabriquez ou <br>si vous cherchez à travailler avec nous, envoyez-nous un message.</hp>
                            <div class="input-group newsletter-form">
                                <div class="position-relative newsletter-inner mb--15">
                                    <input placeholder="Entrez votre adresse email" name="emailTosend" type="email" required>
                                </div>
                                <div class="position-relative shop-inner mb--15">
                                    <input placeholder="saisissez votre message" name='messageTosend' type="text" required>
                                </div>
                                <button type="submit" name="envoyer" value="envoyer" class="axil-btn mb--15">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End .container -->
        </div>
      
    </main>



    <!-- Start Footer Area  -->
    <?php include("assets/service-area.php"); ?>
    <?php include("assets/footer.php"); ?>
    <!-- End Footer Area  -->

   


    <div class="cart-dropdown" id="cart-dropdown">

    </div>
    <!-- JS
============================================ -->
    <!-- ajax and swal2 script -->
    <script type="text/javascript" src="backoffice/js/jqueryAjax.min.js"></script>
   <?php include("script.php"); ?>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:15:58 GMT -->

</html>