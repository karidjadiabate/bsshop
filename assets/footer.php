 <!-- Header Search Modal End -->
 <div class="header-search-modal" id="header-search-modal">
     <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
     <div class="header-search-wrap">
         <div class="card-header">
             <form method="POST" action="<?php echo PATH ?>shop.php">
                 <div class="input-group">
                     <input type="search" required class="form-control" value="<?php if (isset($_REQUEST['prod-search']) && $_REQUEST['prod-search'] != "") {
                                                                                    echo $_REQUEST['prod-search'];
                                                                                } ?>" name="prod-search" id="prod-search" placeholder="Commencer a ecrire...">
                     <button type="button" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                 </div>
             </form>
         </div>
         <!-- bloc a ajouter -->
         <div class="card-body shop">
             <?php
                


                if (isset($_REQUEST['prod-search']) && $_REQUEST['prod-search'] != "") {
                    $product = $db->getAllRecords('products', '*', "AND name like '%" . $_REQUEST['prod-search'] . "%'AND statut='1'", 'ORDER BY name ASC');

                ?>
                 <div class="search-result-header">
                     <h6 class="title"><?php echo count($product) ?> Resultat(s) trouvé(s)</h6>
                     <!-- <a href="shop.php" class="view-all">View All</a> -->
                 </div>
                 <?php
                    foreach ($product as $val) {
                        $images = $db->getAllRecords('images', '*', "AND product_id='" . $val['id'] . "%'AND statut='1'", 'ORDER BY name ASC');
                        $price = $db->getAllRecords('prix', '*', "AND id='" . $val['price'] . "%'AND statut='1'", 'ORDER BY valeur ASC');
                    ?>
                     <div class="psearch-results">
                         <div class="axil-product-list">
                             <div class="thumbnail">
                                 <a href="<?php echo PATH ?>single-product.php?product_id=<?php echo $val['id'] ?>">
                                     <img src="<?php echo PATH ?>backoffice/images/products/<?php echo $images[0]['name'] ?>" width="60px" height="60px" alt="Images de produits recherches">
                                 </a>
                             </div>
                             <div class="product-content">
                                
                                 <h6 class="product-title"><a href="<?php echo PATH ?>single-product.php?product_id=<?php echo $val['id'] ?>"><?php echo strtoupper($val['name']) ?></a></h6>
                                 <div class="product-price-variant">
                                     <span class="price current-price"><?php echo $price[0]['valeur'] ?></span>
                                     <!-- <span class="price old-price">$49.99</span> -->
                                 </div>
                                 <div class="product-cart">
                                     <a href="<?php echo PATH ?>single-product.php?product_id=<?php echo $val['id'] ?>" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                 </div>
                             </div>
                         </div>
                     </div>
             <?php }
                } ?>
         </div>
         <!-- // bloc a ajouter -->
     </div>
 </div>
 <!-- Header Search Modal End -->
 <footer class="axil-footer-area footer-style-1 bg-color-white">
     <!-- Start Footer Top Area  -->
     <div class="footer-top separator-top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-1 col-sm-6">
                 </div>
                 <!-- Start Single Widget  -->
                 <div class="col-lg-3 col-sm-6">
                     <div class="axil-footer-widget pr--30">
                         <div class="logo mb--30">
                             <a href="index.php">
                                 <img class="light-logo" src="assets/images/logo/logo.png" alt="Logo Images"><?php echo APP_NAME ?>
                             </a>
                         </div>
                         <div class="inner">
                             <p>Nous sommes partout à Abidjan<br>
                                 et bientôt à l'interieur du pays, <br>
                                 Côte d'Ivoire.
                             </p>
                             <div class="social-share">
                                 <a href="karidjadiabate0304@gmail.com"><i class="fas fa-envelope"></i></a>
                                 <a href="+2250787856389"><i class="fab fa-whatsapp"></i></a>
                                 <a href="tel:+2250787856389"><i class="fas fa-phone"></i></a>
                                 
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- End Single Widget  -->
                 <!-- Start Single Widget  -->
                 <div class="col-lg-1 col-sm-6">
                 </div>
                 <div class="col-lg-3 col-sm-6">
                     <div class="axil-footer-widget">
                         <h5 class="widget-title">A PROPOS</h5>
                         <div class="inner">
                             <ul>
                                 <li><a href="about-us.php">A Propos</a></li>
                                  <li><a href="contact.php">Contactez nous</a></li>
                                 
                             </ul>
                         </div>
                     </div>
                 </div>
             
                 <div class="col-lg-3 col-sm-6">
                     <div class="axil-footer-widget">
                         <h5 class="widget-title">SUPPORT</h5>
                         <div class="inner">
                             <ul>
                                 <li><a href="privacy-policy.php">Politique de confidentialité</a></li>
                                 <li><a href="contact.php">Contactez nous</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- End Single Widget  -->

             </div>
         </div>
     </div>
     <!-- End Footer Top Area  -->
     <!-- Start Copyright Area  -->
     <div class="copyright-area copyright-default separator-top">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-xl-8 col-lg-12">
                     <div class="copyright-left d-flex flex-wrap justify-content-xl-start justify-content-center">
                         <ul class="quick-link">
                             <li><a href="privacy-policy.php">Politique de confidentialité</a></li>
                               </ul>
                         <ul class="quick-link">
                             <li>© 2023. Tous Droits reservés par <a href=""><?php echo APP_NAME ?></a>.</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-4 col-lg-12">
                     <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                         <span class="card-text">Bientôt Disponible</span>
                         <ul class="payment-icons-bottom quick-link">
                             <li><img src="assets/images/icons/cart/cart-1.png" alt="paypal cart"></li>
                             <li><img src="assets/images/icons/cart/cart-2.png" alt="paypal cart"></li>
                             <li><img src="assets/images/icons/cart/cart-5.png" alt="paypal cart"></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Copyright Area  -->
 </footer>