<?php
session_start();
// session_destroy();

include_once('assets/database/config.php');
define('MENU', 'CART');
if (isset($_SESSION['InfoProduct']) && count($_SESSION['InfoProduct']) != 0) {

    // session_destroy();

    $total = 0;

    if (isset($_REQUEST['product_id']) && isset($_REQUEST['action']) && $_REQUEST['action'] != 'delete') {
        $product = $db->getAllRecords('products', '*', "AND id='" . $_REQUEST['product_id'] . "'AND statut='1'", 'ORDER BY name ASC');
        if (isset($_REQUEST['quantite']) && $_REQUEST['quantite'] != "") {
            for ($rr = 0; $rr < $_REQUEST['quantite']; $rr++) {
                $_SESSION['InfoProduct'][] = $product[0]['id'];
            }
        } else {
            $_SESSION['InfoProduct'][] = $product[0]['id'];
        }
    }

    if (isset($_SESSION['InfoProduct'])) {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
            foreach ($_SESSION['InfoProduct'] as $val) {

                unset($_SESSION['InfoProduct'][array_search($_REQUEST['product_id'], $_SESSION['InfoProduct'])]);
            }
        }
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteAll') {
            $_SESSION['InfoProduct'] = array();
        }


        $occurence = array_count_values($_SESSION['InfoProduct']);
        $lastProducts = array_unique($_SESSION['InfoProduct']);
    }
?>
    <!doctype html>
    <html class="no-js" lang="en">


    <!-- Mirrored from new.axilthemes.com/demo/template/etrade/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:35 GMT -->

    <head>
        

        <!-- CSS
    ============================================ -->

        <!-- Bootstrap CSS -->
   <?php include("link.php") ; ?>
        <script type="text/javascript" src="assets/js/toastr.min.js"></script>
        <script type="text/javascript" src="assets/js/toast.js"></script>
    </head>


    <body class="sticky-header">
        <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <?php include('assets/menu.php') ?>
        <!-- End Header -->

        <main class="main-wrapper">
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
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "noproduct") {
                echo '<script type="text/javascript"> 
                // Set the options that I want 
                 toastr.info("Aucun produit dans le panie!","oups!!!");
                 </script>';
                // echo '<script type="text/javascript">swal({ title: "Oups !", text: "Aucun produit dans le panier", icon: "info", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil réinitialisé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
                echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cet Profil Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "vide") {
                echo '<script type="text/javascript"> 
                // Set the options that I want 
                 toastr.info("produit retiré avec succès!","validé!!!");
                 </script>';
                // echo '<script type="text/javascript">swal({ title: "Validé !", text: "produit retiré avec succès", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "viderPanier") {
                echo '<script type="text/javascript"> 
                // Set the options that I want 
                 toastr.success("Panier vidé avec succès!","validé!!!");
                 </script>';
                // echo '<script type="text/javascript">swal({ title: "Validé !", text: "Panier vidé avec succès", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ajout") {
                // echo '<script type="text/javascript">swal({ title: "Accepté !", text: "produit ajouté dans le panier  avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
                echo '<script type="text/javascript"> 
                // Set the options that I want 
                 toastr.success("produit ajouté dans le panier  avec succès!","validé!!!");
                 </script>';
            }
            ?>
            <!-- Start Cart Area  -->
            <div class="axil-product-cart-area axil-section-gap">
                <div class="container">
                    <div class="axil-product-cart-wrap">
                        <div class="product-table-heading">
                            <h4 class="title">Votre Panier</h4>
                            <a href="#" class="cart-clear" onclick="DeleteCart()">Vider le panier</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table axil-product-table axil-cart-table mb--40">
                                <thead>
                                    <tr>
                                        <th scope="col" class="product-remove"></th>
                                        <th scope="col" class="product-thumbnail">Produit</th>
                                        <th scope="col" class="product-title"></th>
                                        <th scope="col" class="product-price">Prix</th>
                                        <th scope="col" class="product-quantity">Quantité</th>
                                        <th scope="col" class="product-subtotal">Sous Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($lastProducts)) {
                                        foreach ($lastProducts as $val) {
                                            if (isset($val)) {
                                                $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
                                                $condition = "";
                                                $condition .= "AND statut='1'";
                                                $condition .= "AND id='" . $val . "'";
                                                $product = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ');
                                                $conditionsss = "";
                                                $conditionsss .= "AND statut='1'";
                                                $conditionsss .= "AND product_id='" . $val . "'";
                                                $images = $db->getAllRecords('images', '*', $conditionsss, 'ORDER BY id LIMIT 1');
                                                $category_id = $product[0]['categories_id'];
                                                $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');
                                                $price_id = $product[0]['price'];
                                                $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');
                                                $masse_id = $product[0]['mass'];
                                                $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');
                                    ?>
                                                <tr>
                                                    <td class="product-remove"><a href="#" class="remove-wishlist" onclick="removeProductCart(<?php echo $val ?>)"><i class="fal fa-times"></i></a></td>
                                                    <td class="product-thumbnail"><a href="single-product.html"><img src="<?php echo PATH ?>backoffice/images/products/<?php echo $images[0]['name'] ?>" alt="Digital Product"></a></td>
                                                    <td class="product-title"><a href="single-product.php?product_id=<?php echo $val ?>"><?php echo strtoupper($product[0]['name']) ?></a></td>
                                                    <td class="product-price" data-title="Price"><?php echo $price[0]['valeur'] ?> <span class="currency-symbol"> F CFA</span></td>
                                                    <td class="product-quantity" data-title="Qty">
                                                        <div class="pro-qty">
                                                            <span class="dec qtybtn" onclick="RemoveToCart(<?php echo $val ?>)">-</span>
                                                            <input type="number" class="quantity-input" value="<?php echo $occurence[$val] ?>">
                                                            <span class="inc qtybtn" onclick="AddToCartDetailCart(<?php echo $val ?>)">+</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Subtotal"><?php echo $price[0]['valeur'] * $occurence[$val] ?><span class="currency-symbol"> F CFA</span></td>
                                                </tr>
                                    <?php $total = $total + ($price[0]['valeur'] * $occurence[$val]);
                                            }
                                        }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-update-btn-area col-xl-8 col-lg-7 offset-xl-7 offset-lg-5">
                           
                        </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                                <div class="axil-order-summery mt--80">
                                    <h5 class="title mb--20">Recapitulatif de la commande</h5>
                                    <div class="summery-table-wrap">
                                        <table class="table summery-table mb--30">
                                            <tbody>
                                                <tr class="order-subtotal">
                                                    <td>Sous Total</td>
                                                    <td><?php echo $total ?> F CFA</td>
                                                </tr>
                                                <tr class="order-shipping">
                                                    <td>Livraison</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="checkbox" id="radio1" checked name="shipping" checked>
                                                            <label for="radio1">Paiement en espece à la livraison</label>
                                                        </div>
                                                       
                                                    </td>
                                                </tr>
                                                <tr class="order-tax">
                                                    <td>Prix de la livraison</td>
                                                    <td><?php if ($total <= 10000) {
                                                            $prixDeLivraison = 1000;
                                                        } else {
                                                            $prixDeLivraison = $total * 0.1;
                                                        };
                                                        echo $prixDeLivraison ?> F CFA</td>
                                                </tr>
                                                <tr class="order-total">
                                                    <td>Total</td>
                                                    <td class="order-total-amount"><?php echo $total + $prixDeLivraison ?> F CFA</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout.php" class="axil-btn btn-bg-primary checkout-btn">Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Cart Area  -->

        </main>


        <?php include("assets/service-area.php"); ?>
        <?php include("assets/footer.php"); ?>
        <!-- End Footer Area  -->

        <!-- Product Quick View Modal Start -->
       

                                            </div>

                                            <!-- Start Product Action Wrapper  -->
                                            <div class="product-action-wrapper d-flex-center">
                                                <!-- Start Quentity Action  -->
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                                <!-- End Quentity Action  -->

                                                <!-- Start Product Action  -->
                                                <ul class="product-action d-flex-center mb--0">
                                                    <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                    <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                                <!-- End Product Action  -->

                                            </div>
                                            <!-- End Product Action Wrapper  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Quick View Modal End -->

        <!-- Header Search Modal End -->
       
                
            </div>
        </div>

        <!-- JS
============================================ -->
        <!-- Modernizer JS -->
        <?php include("script.php"); ?>
        <!-- Main JS -->

        <script src="assets/js/main.js"></script>
        <script src="ajax/js/shop.js"></script>


    </body>


    <!-- Mirrored from new.axilthemes.com/demo/template/etrade/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:35 GMT -->

    </html>
<?php } else {
    header('location:' . PATH . '?msg=noproduct');
} ?>