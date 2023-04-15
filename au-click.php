<?php
?>
<div class="col-lg-6 mb--40">
                                <!-- Start Comment Respond  -->
                                <div class="comment-respond pro-des-commend-respond mt--0">
                                    <h5 class="title mb--30">Ajouter un commentaire</h5>
                                    <p>Les champs requis sont marqués<span class="text-danger">*</span></p>
                                    <div class="rating-wrapper d-flex-center mb--40">
                                        Votre Note sur 5 <span class="require"> *</span>
                                        <div class="pro-qty ml--20">
                                            <span class="dec qtybtn" id="moins">-</span>
                                            <input type="number" id="etoiles" value="0" max="5" step='1'>
                                            <span class="inc qtybtn" id="plus">+</span>
                                        </div>
                                        <div class="reating-inner ml--10">
                                            <a><i class="fal fa-star" id="1"></i></a>
                                            <a><i class="fal fa-star" id="2"></i></a>
                                            <a><i class="fal fa-star" id="3"></i></a>
                                            <a><i class="fal fa-star" id="4"></i></a>
                                            <a><i class="fal fa-star" id="5"></i></a>
                                        </div>
                                    </div>

                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Commentaire</label>
                                                    <textarea name="message" placeholder="Votre Commentaire"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Nom <span class="require">*</span></label>
                                                    <input id="name" type="text" name="nom" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Prenom(s) <span class="require">*</span> </label>
                                                    <input id="email" type="text" name="prenom" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <button type="submit" id="submit" name="publier" value="publier" class="axil-btn btn-bg-primary w-auto">Publier</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="Notes" id="notes">
                                        </div>
                                    </form>
                                </div>
                                <!-- End Comment Respond  -->
                            </div>
                            <!-- End .col -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="axil-product-area bg-color-white pt--10 pb--50 pb_sm--30">
                <div class="container">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket bg-primary"></i> <span class="text-primary">Relatif</span></span>
                        <h2 class="title">Produit(s) Relatif(s)</h2>
                    </div>
                    <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                        <?php foreach ($allProduct as $val) { ?>
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
                                                <span class="price current-price text-black">F CFA <?php echo $val['valeur']; ?></span>
                                            </div>
                                            <h5 class="title"><a href="single-product.php?product_id=<?php echo $val['idDuProduit'] ?>"><?php echo strtoupper($val['nomDuProduit']) ?><span class="verified-icon"><i class="fas fa-badge-check" style="color:#f15f79"></i></span></a></h5>
                                            <div class="product-hover-action ">
                                                <ul class="cart-action">
                                                    <li class="select-option"><a class="btn-outline-dark" href="single-product.php?product_id=<?php echo $val['idDuProduit'] ?>">Acheter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>