<?php
session_start();

include_once('assets/database/config.php');
define('MENU', 'CHECKOUT');
if (isset($_SESSION["userYopciConnected"]) && $_SESSION["userYopciConnected"] != array()) {
    $connected = $_SESSION["userYopciConnected"];
}
$total = 0;
$reference = "Commande de :";
if (isset($_SESSION['InfoProduct']) && count($_SESSION['InfoProduct']) != 0) {
      $total = 0;
    $occurence = array_count_values($_SESSION['InfoProduct']);
    $lastProducts = array_unique($_SESSION['InfoProduct']);
    if (isset($_REQUEST['process']) && $_REQUEST['process'] != "") {
        extract($_REQUEST);
        if ($_REQUEST['process'] == "ConnectedProcess") {

            $insert = true;
            $userId = $connected['id'];
        } else {
            $data = array(
                'lastname' => $nom,
                'firstname' => $prenom,
                'email' => $email,
                'password' => md5(1234),
                'phone' => $phone,
                // 'address' => $address,
                'city' => $region,
                'quartier' => $quartier,
                'carrefour' => $carrefour,
                'whatsapp' => $whatsapp,
                'particulier' => $particulier,
            );
            $insert = $db->insert('users', $data);
            $userId = $db->lastInsertId();
        }

        if ($insert) {
            foreach ($lastProducts as $val) {
                $allStock = $db->getAllRecords('stock', '*', 'AND product_id="' . $val . '"', 'ORDER BY id ASC');
                $utilise = $occurence[$val];
                $dispo_stock = $allStock[0]['disponible'];
                //pour le stock
                $data2 = [
                    'disponible' => $dispo_stock - $utilise,
                    'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
                    'updated_at' =>  gmdate("Y-m-d H:i:s"),
                ];
                $update222 =   $db->update('stock', $data2, array('product_id' => $val));
                //pour le stock
                $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
                $condition = "";
                $condition .= "AND statut='1'";
                $condition .= "AND id='" . $val . "'";
                $product = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ');
                $images = $db->getAllRecords('images', '*', $condition, 'ORDER BY id ');
                $category_id = $product[0]['categories_id'];
                $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');
                $price_id = $product[0]['price'];
                $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');
                $masse_id = $product[0]['mass'];
                $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');

                $reference .= '<br><b>' . $occurence[$val] . 'x</b> ' . $product[0]['name'];
            }
            $data2 = array(
                'users_id' => $userId,
                'statut' => 'V',
                'reference' => $reference,
            );
            $insert2 = $db->insert('orders', $data2);
            if ($insert2) {
                $orders_id = $db->lastInsertId();
                foreach ($lastProducts as $val) {
                    $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
                    $condition = "";
                    $condition .= "AND statut='1'";
                    $condition .= "AND id='" . $val . "'";
                    $product = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ');
                    $images = $db->getAllRecords('images', '*', $condition, 'ORDER BY id ');
                    $category_id = $product[0]['categories_id'];
                    $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');
                    $price_id = $product[0]['price'];
                    $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');
                    $masse_id = $product[0]['mass'];
                    $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');
                    $prixPerArticle = $price[0]['valeur'] * $occurence[$val];
                    $data3 = array(
                        'orders_id' => $orders_id,
                        'quantity' => $occurence[$val],
                        'products_id' => $val,
                        'statut' => 'V',
                        'price' => $prixPerArticle,
                    );
                    $insert3 = $db->insert('orders_details', $data3);
                }
                if ($insert3) {
                    unset($_SESSION['InfoProduct']) ;
                    header('location:index.php?orders_id=' . $orders_id . '&ampmsg=cmdok');
                   
                }
            }
        } else {
            header('location:' . $_SERVER['PHP_SELF'] . '?email=exist');
        }
    }
   
    $discount=0;

?>
   <?php include("link.php"); ?>

    <body class="sticky-header">
     
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <?php include("assets/menu.php"); ?>
        <!-- End Header -->

        <main class="main-wrapper">

            <!-- Start Checkout Area  -->
            <div class="axil-checkout-area axil-section-gap">
                <div class="ml-1">

                    <div class="row" style="padding-left:5px;padding-right:5px">
                        <div class="col-md-4"id='CheckOutForm'>
                            <div class="axil-checkout-notice">
                               
                                <!-- <?php if (isset($_SESSION["userYopciConnected"]) && $_SESSION["userYopciConnected"] != array()) { ?>
                                   
                                <?php } ?> -->
                            </div>
                            <?php include("facture.php"); ?>
                       <?php include("commande.php") ;?>
            <!-- End Checkout Area  -->
            <input type="hidden" name="coupon" id="coupon" value=<?php if (isset($_REQUEST['coupon'])) {
                                                                        echo $_REQUEST['coupon'];
                                                                    } ?>>
        </main>


        <?php include("assets/service-area.php"); ?>
        <?php include("assets/footer.php"); ?>
        <!-- End Footer Area  -->

        <!-- Product Quick View Modal Start -->

        <!-- JS
============================================ -->
<?php include("script.php"); ?>
        
        <script>
            $("#particulier").on('change', function() {
                if ($(this).val() == "non") {
                    window.location = "http://localhost/bsshop/sign-in.php"
                }
            });
     
            if( $("#CheckOutForm").hasClass('col-md-4') && $("#commandeTable").hasClass('col-md-8')){
            $("#CheckOutForm").hide();
                $("#commandeTable").removeClass('col-md-8')
                $("#commandeTable").addClass('col-md-12')
            }
            
            function ValiderCommande() {
    swal({
        title: "Confirmation",
        text: "Etes-vous sûr de valider cette commande  ?",
        icon: "warning",
        buttons: ["Non, pas encore", "Oui, je confirme"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                if( $("#commandeTable").hasClass('col-md-12')){
            $("#CheckOutForm").show();
                $("#commandeTable").removeClass('col-md-12')
                $("#imprimerCommande").removeClass('d-none')
                $("#commandeTable").addClass('col-md-8')
                $("#annulerCommande").addClass('d-none')
                $("#continuerAchat").addClass('d-none')
                $("#validerCommande").addClass('d-none')
                
                swal({
        title: "Commande Valide",
        text: "Votre Commande a été validée avec succès",
        icon: "success",
       
    });    
        }
            } else {
                swal({
                    title: "Alerte !",
                    text: "Operation de Validation non confirmée!",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
        });

}
            
        </script>
    </body>
    <!-- Mirrored from new.axilthemes.com/demo/template/etrade/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:36 GMT -->

    </html>
<?php } else {
    header('location:' . PATH . '?msg=noproduct');
} ?>