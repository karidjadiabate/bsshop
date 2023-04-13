<?php
session_start();
include('assets/database/config.php');

define('MENU', 'CONTACT');

?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:51 GMT -->


    <?php include("link.php")?>
<body class="sticky-header">
   
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
                                <li class="axil-breadcrumb-item"><a href="index.php">Accuel</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Contactez nous</li>
                            </ul>
                            <h1 class="title">Contactez nous</h1>
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
            // echo 'ok';exit;
            extract($_REQUEST);
            $data = array(
                'nom' => $contact_name,
                'telephone' => $contact_phone,
                'email' => $contact_email,
                'message' => $contact_message
            );
            $insert = $db->insert('Users_message', $data);
            if ($insert) {
                echo '<script type="text/javascript">swal({ title: "Envoyé !", text: "Message envoyé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            }
        }
        ?>
        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <h3 class="title mb--10">Nous aimerions avoir de vos nouvelles.</h3>
                                <p>Si vous avez d’excellents produits que vous fabriquez ou si vous cherchez à travailler avec nous, envoyez-nous un message.e.</p>
                                <form id="contact-form" method="POST">
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">Nom et Prenom(s)<span>*</span></label>
                                                <input type="text" name="contact_name" id="contact-name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-phone">Telephone <span>*</span></label>
                                                <input type="text" name="contact_phone" id="contact-phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-email">E-mail <span>*</span></label>
                                                <input type="email" name="contact_email" id="contact-email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">Votre Message</label>
                                                <textarea required name="contact_message" id="contact-message" cols="1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button name="envoyer" type="submit" id="submit"value="envoyer" class="axil-btn bg-dark text-white">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">Notre Magazin</h4>
                                <span class="address mb--20">Côte d'Ivoire, Abidjan</span>
                                <span class="phone">Phone: +2250787856389</span>
                                <span class="email">Email: karidjadiabate@gmail.com</span>
                            </div>
                            <div class="contact-career mb--40">
                                <h4 class="title mb--20">Carrières</h4>
                                <p>Au lieu d'acheter six choses, une que vous aimez vraiment.</p>
                            </div>
                            <div class="opening-hour">
                                <h4 class="title mb--20">Horaires d'ouvertures:</h4>
                                <p>Du lundi au samedi : 9h - 22h
                                    <br> Dimanche : 10h - 18h
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Google Map Area  -->
                
            </div>
        </div>
        <!-- End Contact Area  -->
    </main>


    <?php include("assets/service-area.php"); ?>
    <!-- Start Footer Area  -->
    <?php include('assets/footer.php') ;?>
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
 <?php include("script.php");?>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:51 GMT -->

</html>