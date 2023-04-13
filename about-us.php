<?php
session_start();

include('assets/database/config.php');

define('MENU', 'ABOUT-US');
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:37 GMT -->

<head>
  <?php include("link.php"); ?>
    <script type="text/javascript" src="backoffice/js/swal2.min.js"></script>

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
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item " aria-current="page">A Propos</li>
                            </ul>
                            <h1 class="title">À propos de notre boutique</h1>
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
        <!-- End Breadcrumb Area  -->
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
        <!-- Start About Area  -->
        <div class="axil-about-area about-style-1 axil-section-gap ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-6">
                        <div class="about-thumbnail">
                            <div class="thumbnail">
                                <img src="assets/images/about/about-01.png" alt="About Us">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6">
                        <div class="about-content content-right">
                            <span class="title-highlighter highlighter-primary2"> <i class="far fa-shopping-basket"></i>About Store</span>
                            <h3 class="title">Les achats en ligne comprennent à la fois l’achat de choses en ligne.</h3>
                            <span class="text-heading">Pinso Market peut vous aider à créer un commerce numérique unifié et intelligent
                                Expériences — en ligne et en magasin.</span>
                            <div class="row">
                                <div class="col-xl-6">
                                    <p>Offrez à vos équipes de vente des solutions sur mesure qui aident les fabricants à passer au numérique et s’adaptent plus rapidement à l’évolution des marchés et des clients en créant de nouvelles affaires..</p>
                                </div>
                                <div class="col-xl-6">
                                    <p class="mb--0">Pinso Market Commerce offre aux acheteurs l'
                                        expérience transparente et en libre-service en ligne
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->

        <!-- Start About Area  -->
        <div class="about-info-area">
            <div class="container">
                <div class="row row--20">
                    <div class="col-lg-4">
                        <div class="about-info-box">
                            <div class="thumb">
                                <img src="assets/images/about/shape-01.png" alt="Shape">
                            </div>
                            <div class="content">
                                <h6 class="title">10,000+ client(s) satisfait(s)</h6>
                                <p>Responsabilisez vos équipes de vente avec
                                Des solutions sur mesure qui soutiennent.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about-info-box">
                            <div class="thumb">
                                <img src="assets/images/about/shape-02.png" alt="Shape">
                            </div>
                            <div class="content">
                                <h6 class="title">5 ans d’expériences</h6>
                                <p>Offrez à vos équipes de vente des solutions adaptées à l'industrie qui prennent en charge.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="about-info-box">
                            <div class="thumb">
                                <img src="assets/images/about/shape-03.png" alt="Shape">
                            </div>
                            <div class="content">
                                <h6 class="title">12 prix remportés</h6>
                                <p>Offrez à vos équipes de vente des solutions adaptées à l'industrie qui prennent en charge.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Area  -->

        <!-- Start Team Area  -->
       
        <!-- End About Area  -->

      <!-- Start Axil Newsletter Area  -->
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
        <!-- End Axil Newsletter Area  -->
    </main>
    <?php include("assets/service-area.php"); ?>
    <!-- Start Footer Area  -->
    <?php include('assets/footer.php') ?>
   
   
    <!-- Modernizer JS -->
  <?php include("script.php"); ?>

    <!-- Main JS -->
    <script src="ajax/js/shop.js"></script>
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:42 GMT -->

</html>