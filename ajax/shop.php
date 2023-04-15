<?php
session_start();
// session_destroy();

include_once('../assets/database/config.php');
$total = 0;

if (isset($_REQUEST['product_id']) && isset($_REQUEST['action']) && $_REQUEST['action'] != 'delete' && $_REQUEST['action'] != 'deleteOne') {
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
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteOne') {
        unset($_SESSION['InfoProduct'][array_search($_REQUEST['product_id'], $_SESSION['InfoProduct'])]);
    }
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'deleteAll') {
        $_SESSION['InfoProduct'] = array();
    }


    $occurence = array_count_values($_SESSION['InfoProduct']);
    $lastProducts = array_unique($_SESSION['InfoProduct']);
}
?>
<div class="cart-content-wrap">
    <div class="cart-header">
        <h2 class="header-title">Votre Panier</h2>
        <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="cart-body">
        <ul class="cart-item-list">
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
                        $images = $db->getAllRecords('images', '*', $conditionsss, 'ORDER BY id ');
                        $category_id = $product[0]['categories_id'];


                        $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');

                        $price_id = $product[0]['price'];
                        $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');

                        $masse_id = $product[0]['mass'];
                        $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');
            ?>
                        <li class="cart-item">
                            <div class="item-img">
                                <a href="single-product.php?product_id=<?php echo $product[0]['id'] ?>"><img src="<?php echo PATH ?>backoffice/images/products/<?php echo $images[0]['name'] ?>" alt="Commodo Blown Lamp"></a>
                                <button class="close-btn" onclick="removeProduct(<?php echo $val ?>)"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="item-content">
                                <!-- <div class="product-rating">
                                    <span class="icon">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="rating-number">(64)</span>
                                </div> -->
                                <h3 class="item-title"><a href="single-product.php?product_id=<?php echo $product[0]['id'] ?>"><?php echo strtoupper($product[0]['name']) ?></a></h3>
                                <div class="item-price"><span class="currency-symbol">F CFA</span> <?php echo $price[0]['valeur'] ?></div>
                                <div class="pro-qty item-quantity">
                                    <span class="dec qtybtn" onclick="RemoveToCart(<?php echo $val ?>)">-</span>
                                    <input type="number" class="quantity-input" value="<?php echo $occurence[$val] ?>">
                                    <span class="inc qtybtn" onclick="AddToCartDetailCart(<?php echo $val ?>)">+</span>
                                </div>
                            </div>
                        </li>
            <?php $total = $total + ($price[0]['valeur'] * $occurence[$val]);
                    }
                }
            } ?>
        </ul>
    </div>
    <div class="cart-footer">
        <h3 class="cart-subtotal">
            <span class="subtotal-title">Sous Total:</span>
            <span class="subtotal-amount">F CFA <?php echo $total ?></span>
        </h3>
        <div class="group-btn">
            <a href="cart.php" class="axil-btn text-white viewcart-btn"style="background-color:#f15f79">Voir le Panier</a>
            <a href="checkout.php" class="axil-btn btn-bg-secondary checkout-btn">Commander</a>
        </div>
    </div>
</div>
<input type="hidden" name="countProducts" id="countProducts" value="<?php if (isset($_SESSION['InfoProduct'])) {
                                                                        echo count($_SESSION['InfoProduct']);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?>">