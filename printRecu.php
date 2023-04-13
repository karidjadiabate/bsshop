<?php
session_start();
// session_destroy();

include_once('assets/database/config.php');
define('MENU', 'HOME');
extract($_REQUEST);
if(isset($orders_id)){
$orders_info = $db->getAllRecords1('orders', 'orders_details', '*,orders.created_at as DateCommande', 'id', 'orders_id', "AND orders_id='" . $orders_id . "'AND orders.statut='V'", 'ORDER BY orders.created_at ASC');
// var_dump($orders_info);exit;
$users_id = $orders_info[0]['users_id'];
$users_id = $db->getAllRecords('users', '*', 'AND id="' . $users_id . '"', 'ORDER by id ASC');
$total = 0;
$reference = "Commande de :";
// var_dump($_SESSION);exit;
if (isset($_SESSION['InfoProduct'])) {
  
  $total = 0;
  $occurence = array_count_values($_SESSION['InfoProduct']);
  $lastProducts = array_unique($_SESSION['InfoProduct']);

  }
?>
  <!DOCTYPE html>
  <html lang="en">


    <!-- Bootstrap CSS -->
    <?php include("link.php"); ?>
    </style>
  </head>

  <body class="app sidebar-mini rtl">
    <span style="display:none;" id="idactenaissance"><?php echo $idactenaissance; ?></span>
    <span style="display:none;" id="nbMentions"><?php echo $nbMentions; ?></span>
    <main class="main-wrapper">

      <!-- Start Checkout Area  -->
      <div class="axil-checkout-area axil-section-gap">
        <div class="container">
          <form action="#" method="POST">
            <div class="row">
              <div class="col-lg-3">

              </div>
              <div class="col-lg-6">
                <div class="axil-order-summery order-checkout-summery">
                  <h5 class="title mb--20">COMMANDE N°<?php echo $orders_info[0]["users_id"] . ' ' . $orders_info[0]["DateCommande"] ?></h5>
                  <h5 class="title mb--20 "><span class="float-left"><img src="<?php echo PATH ?>backoffice/images/logo.png" alt="logo image"></span><span class="float-end mt-5"><?php echo APP_NAME ?></span></h5>
                  <hr>
                  <div class="row col">
                    <div class="col-12">
                      <span class="text-center">==============================================================</span>
                    </div>
                  </div>
                  <div class="row col">
                    <div class="col-4">
                      Nom et prenom(s)
                    </div>
                    <div class="col-8">
                      <?php echo ucwords($users_id[0]['lastname']) . ' ' . strtoupper($users_id[0]['firstname']) ?>
                    </div>
                    <div class="col-4">
                      Telephone
                    </div>
                    <div class="col-8">
                      <?php echo $users_id[0]['phone']; ?>
                    </div>
                    <div class="col-4">
                      Adresse de Livraison
                    </div>
                    <div class="col-8">
                      <?php echo $users_id[0]['address']; ?>
                    </div>
                    <div class="col-4">
                      Date de Commande
                    </div>
                    <div class="col-8">
                      <?php echo $orders_info[0]["DateCommande"]; ?>
                    </div>
                  </div>

                  <span class="text-center">==============================================================</span>
                  <br>
                  <div class="summery-table-wrap">
                    <table class="table summery-table">
                      <thead>
                        <tr>
                          <th>Produit</th>
                          <th>Sous Total</th>
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
                              $images = $db->getAllRecords('images', '*', $condition, 'ORDER BY id ');
                              $category_id = $product[0]['categories_id'];
                              $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');
                              $price_id = $product[0]['price'];
                              $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');
                              $masse_id = $product[0]['mass'];
                              $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');
                        ?>
                              <tr class="order-product">
                                <td><?php echo strtoupper($product[0]['name']) ?><span class="quantity "> <b>x<?php echo $occurence[$val] ?> </b></span></td>
                                <td><?php echo $prixPerArticle = $price[0]['valeur'] * $occurence[$val] ?> FCFA</td>
                              </tr>
                        <?php $total = $total + $prixPerArticle;
                            }
                          }
                        } ?>
                        <tr class="order-subtotal">
                          <td>Sous Total</td>
                          <td><?php echo $total ?> FCFA</td>
                        </tr>
                        <tr class="order-shipping">
                          <td colspan="2">
                            <div class="shipping-amount">
                              <span class="title"><b>Prix de la livraison</b></span>
                              <span class="amount"><?php echo $prixLivraison = $total * 0.18 ?> FCFA</span>
                            </div>
                          </td>
                        </tr>
                        <tr class="order-total">
                          <td>Total</td>
                          <td class="order-total-amount"><?php echo $prixTotal = $prixLivraison + $total ?> FCFA</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="order-payment-method text-center">
                   <h2>MERCI</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- End Checkout Area  -->

    </main>
<?php include("script.php"); ?>

    <!-- Main JS -->
  
    <script>
     
      window.print();

      (function() {
        var beforePrint = function() {
          console.log('Functionality to run before printing.');
        };
        var afterPrint = function() {
          console.log('Functionality to run after printing');
        };

        if (window.matchMedia) {
          var mediaQueryList = window.matchMedia('print');
          mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
              beforePrint();
            } else {
           
            }
          });
        }
      }());
    </script>
  </body>

  </html>
<?php
}else{ header('location:'.PATH);}
?>