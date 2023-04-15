<?php
$allCategories = $db->getAllRecords('categories', '*', "AND statut='1'", 'ORDER BY name ASC');

?>
<?php if (MENU == 'HOME') { ?>
   
    <!-- End Mainmenu Area  -->
<?php } else { ?>
    <div class="axil-mainmenu  header-style-5">
        <div class="container">
            <div class="header-navbar">

                <div class="header-brand">
                    <a href="<?php echo PATH ?>index.php" class="logo logo-dark">
                        <img src="<?php echo PATH ?>assets/images/logo/logo.png" alt="Site Logo">
                    </a>
                    <a href="<?php echo PATH ?>index.php" class="logo logo-light">
                        <img src="<?php echo PATH ?>assets/images/logo/logo-light.png" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="index.html" class="logo">
                                <img src="<?php echo PATH ?>assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li><a href="<?php echo PATH ?>index.php" class="<?php if (MENU == "HOME") {
                                                                                    echo "active";
                                                                                } ?>">Accueil</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Categories</a>
                                <ul class="axil-submenu">
                                    <?php foreach ($allCategories as $val) { ?>
                                        <li><a href="shop.php?categories=<?php echo $val['id'] ?>">
                                                <?php $images = $db->getAllRecords('images_category', 'id,name', 'AND category_id="' . $val['id'] . '"', '', '') ?>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img style="border:1px solid #f15f79;border-radius:5px;width:50px;height:50px" src="<?php echo PATH ?>backoffice/images/categories/<?php echo $images[0]['name'] ?>" alt="Site Logo"/>
                                                    </div>
                                                    <div class="col-8">
                                                        <?php echo ucfirst(strtolower($val['name'])) ?>
                                                    </div>
                                                </div>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            
                            <li><a href="about-us.php">A propos</a></li>
                           
                            <li><a href="contact.php">Contactez nous</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-xl-block d-none">
                            <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="Que cherchez-vous?" autocomplete="off">
                            <button type="submit" class="icon wooc-btn-search">
                                <i class="flaticon-magnifying-glass"></i>
                            </button>
                        </li>
                        <li class="axil-search d-xl-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                       
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                <span class="cart-count "style="background-color:#f15f79"></span>
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
                                            <a href="sign-in.php" class="axil-btn text-white"style="background-color:#f15f79">Se connecter</a>
                                        <?php } ?>
                                    </div>
                                    <?php if (!isset($_SESSION["userYopciConnected"]) || isset($_SESSION["userYopciConnected"]) && $_SESSION["userYopciConnected"] == array()) { ?>
                                    <div class="reg-footer text-center">Pas de compte ? <a href="sign-up.php" class="btn-link">S'inscrire.</a></div>
                               <?php }?>
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
<?php } ?>
<div class="cart-dropdown" id="cart-dropdown">
   
</div>