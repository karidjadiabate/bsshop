<div class="axil-main-slider-area main-slider-style-2">
            <div class="container">
                <div class="slider-offset-left">
                    <div class="row row--20">
                        <div class="col-lg-12">
                            <div class="slider-box-wrap">
                                <div class="slider-activation-one axil-slick-dots">
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content ">
                                            <span class="subtitle text-black"><i class="fas fa-home " style="background-color:#84ADEA"></i>Quoi de mieux qu'une commande rapide</span>
                                            <h2 class="title">Pinso Market vous souhaite la bienvenue</h2>
                                            <div class="shop-btn">
                                                <a href="shop.php" class="axil-btn">Acheter maintenant <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="assets/images/product/product-48.png" alt="Product">
                                        </div>
                                    </div>
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle text-black"><i class="fas fa-check " style="background-color:#84ADEA"></i>Nos produits sont de haute qualité</span>
                                            <h1 class="title">Nos Produits Vous Satisfairont à Coup Sûr</h1>
                                            <div class="shop-btn">
                                                <a href="shop.php" class="axil-btn">Acheter maintenant <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="assets/images/product/product-47.png" alt="Product">
                                        </div>
                                    </div>
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle text-black"><i class="fas fa-truck " style="background-color:#84ADEA"></i>Nos Produits sont livrés dans les plus brefs délais</span>
                                            <h1 class="title">Livraison Instantanée et Approuvée</h1>
                                            <div class="shop-btn">
                                                <a href="shop.php" class="axil-btn">Acheter maintenant <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img src="assets/images/product/product-49.png" alt="Product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        <div class="service-area">
            <div class="container">
                <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service1.png" alt="Service">
                            </div>
                            <h6 class="title">Livraison rapide &amp; sécurisée</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service2.png" alt="Service">
                            </div>
                            <h6 class="title">100 % de garantie sur le produit</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service3.png" alt="Service">
                            </div>
                            <h6 class="title">Politique de retour de 24 heures</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service4.png" alt="Service">
                            </div>
                            <h6 class="title">Politique de retour de 24 heures</h6>
                        </div>
                    </div>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/service5.png" alt="Service">
                            </div>
                            <h6 class="title">Haute qualité professionnelle</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start New Arrivals Product Area  -->
        <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
            <div class="container ml--xxl-0">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter text-white"><i class="far fa-shopping-basket" style="background-color:#84ADEA"></i> <span class="text-dark">Cette semaine</span></span>
                        <h2 class="title">Produits Ajoutés Récemment</h2>
                    </div>
                    <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <?php foreach ($allProducts as $val) { ?>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-six">
                                    <div class="thumbnail">
                                        <a href="single-product.php?product_id=<?php echo $val['idDuProduit'] ?>">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="backoffice/images/products/<?php echo $val['imageDuProduit'] ?>" alt="Product Images" style="width:200;height:250px;">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="product-price-variant">
                                                <span class="price current-price text-black"><?php echo $val['valeur']; ?> F CFA</span>
                                            </div>
                                            <h5 class="title"><a href="single-product.php?product_id=<?php echo $val['idDuProduit'] ?>"><?php echo strtoupper($val['nomDuProduit']) ?><span class="verified-icon"><i class="fas fa-badge-check " style="color:#84ADEA"></i></span></a></h5>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a href="single-product.php?product_id=<?php echo $val['idDuProduit'] ?>">Acheter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- End .slick-single-layout -->
                    </div>
                </div>
            </div>
        </div>