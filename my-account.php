<?php
session_start();
require_once('assets/database/config.php');
define("MENU", "");
// session_destroy();
if (isset($_SESSION["userYopciConnected"]) && $_SESSION["userYopciConnected"] != array()) {
    $cond = "AND users_id=" . $_SESSION['userYopciConnected']['id'];
    $commandes = $db->getAllRecords("orders", "*", $cond, "ORDER BY created_at DESC");
    // var_dump($commandes);exit;
?>
    <!doctype html>
    <html class="no-js" lang="en">


    <!-- Mirrored from new.axilthemes.com/demo/template/etrade/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:36 GMT -->

    <head>
    <?php include('link.php'); ?>
        <script type="text/javascript" src="backoffice/js/swal2.min.js"></script>

    </head>


    <body class="sticky-header">
      
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <?php include("assets/menu.php"); ?>
        <!-- End Header -->

        <main class="main-wrapper">
            <!-- Start Breadcrumb Area  -->
            <?php

            if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {
                echo '<script type="text/javascript">swal({ title: "Effectué !", text: "Commande annulée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rdse") {
                echo '<script type="text/javascript">swal({ title: "Effectué !", text: "Nouvelle Commande effectuée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } 
            elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "deconnecte") {
                echo '<script type="text/javascript">swal({ title: "Deconnecté !", text: "Vous vous etes déconnectés!", icon: "info", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "Vconnecte") {
                echo '<script type="text/javascript">swal({ title: "Hey!!!", text: "Veullez vous connectés pour acceder a votre compte!", icon: "info", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil modifié avec succès! \n Vos infos seront mises a jour a la prochaine connexion", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Vous n\'avez rien changé!", icon: "warning", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {
                echo '<script type="text/javascript">swal({ title: "Alerte !", text: "Il y a une erreur. Prière de réessayer!", icon: "warning", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil ajouté avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "noproduct") {
                // echo '<script type="text/javascript">swal({ title: "Oups !", text: "Aucun produit dans le panier", icon: "info", confirmButtonText: "OK" });</script>';
                echo '<script type="text/javascript"> // Set the options that I want
     toastr.info("Aucun produit dans le panier!","Oups!!!");</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "reinitialiser") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Profil réinitialisé avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "exist") {
                echo '<script type="text/javascript">swal({ title: "Erreur !", text: "Ajout Impossible,Cet Profil Existe Deja !", icon: "error", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "vider") {
                echo '<script type="text/javascript">
    // Set the options that I want
     toastr.success("Commande annulée avec succès!","validé!!!");
     </script>';
                // echo '<script type="text/javascript">swal({ title: "Validé !", text: "Commande annulée avec succès", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "viderPanier") {
                echo '<script type="text/javascript">
    // Set the options that I want
     toastr.success("Panier vidé avec succès!","validé!!!");
     </script>';
                // echo '<script type="text/javascript">swal({ title: "Validé !", text: "Panier vidé avec succès", icon: "success", confirmButtonText: "OK" });</script>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ls") {
                echo '<script type="text/javascript">swal({ title: "Accepté !", text: "Resignation reussie avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
            };
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
            if (isset($_REQUEST['update_adress']) && $_REQUEST['update_adress'] != "") {
                extract($_REQUEST);
                if ($email != "" || $adresse != "") {
                    $data = array(
                        'email' => $email,
                        'address' => $adresse
                    );
                    $update = $db->update('users', $data, array("id" => $_SESSION["userYopciConnected"]["id"]));
                    if ($update) {
                        echo '<script type="text/javascript">swal({ title: "Effectué !", text: "Mise a jour Effectuée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
                    } else {
                        echo '<script type="text/javascript">swal({ title: "Oups !!!", text: "Rien a été modifié!", icon: "info", confirmButtonText: "OK" });</script>';
                    }
                } else {
                    echo '<script type="text/javascript">swal({ title: "Oups !!!", text: "Rien a été modifié!", icon: "info", confirmButtonText: "OK" });</script>';
                }
            }
            if (isset($_REQUEST['update_details']) && $_REQUEST['update_details'] != "") {
                extract($_REQUEST);
                $data = array(
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'city' => $ville,
                    'password' => md5($ConfirmMdp)
                );
                $update = $db->update('users', $data, array("id" => $_SESSION["userYopciConnected"]["id"]));
                if ($update) {
                    echo '<script type="text/javascript">swal({ title: "Effectué !", text: "Mise a jour Effectuée avec succès!", icon: "success", confirmButtonText: "OK" });</script>';
                } else {
                    echo '<script type="text/javascript">swal({ title: "Oups !!!", text: "Rien a été modifié!", icon: "info", confirmButtonText: "OK" });</script>';
                }
            } ?>
            <div class="axil-breadcrumb-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-8">
                            <div class="inner">
                                <ul class="axil-breadcrumb">
                                    <li class="axil-breadcrumb-item"><a href="index.php">Acceuil</a></li>
                                    <li class="separator"></li>
                                    <li class="axil-breadcrumb-item active" aria-current="page">Mon compte</li>
                                </ul>
                                <h1 class="title">Mon compte</h1>
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

            <!-- Start My Account Area  -->
            <div class="axil-dashboard-area axil-section-gap">
                <div class="container">
                    <div class="axil-dashboard-warp">
                        <div class="axil-dashboard-author">
                            <div class="media">
                                <div class="thumbnail">
                                    <img src="assets\images\user/imguser.png" alt="Hello" width="70px" height="70px">
                                </div>
                                <div class="media-body">
                                    <h5 class="title mb-0">Bonjour <?php echo ucwords($_SESSION["userYopciConnected"]['firstname']) . " " . ucwords($_SESSION["userYopciConnected"]['lastname']) ?></h5>
                                    <span class="joining-date">Membre Pinso Market Depuis le <b><?php echo  $dateToFrench = ucwords(dateToFrench($_SESSION["userYopciConnected"]["created_at"], 'l j F Y')); ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-4">
                                <aside class="axil-dashboard-aside">
                                    <nav class="axil-dashboard-nav">
                                        <div class="nav nav-tabs" role="tablist">
                                            <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Tableau De Bord</a>
                                            <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false"><i class="fas fa-shopping-basket"></i>Commandes</a>
                                            <!-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false"><i class="fas fa-file-download"></i>Downloads</a> -->
                                            <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false"><i class="fas fa-home"></i>Adresses</a>
                                            <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false"><i class="fas fa-user"></i>Details</a>
                                            <a class="nav-item nav-link" href="deconnexion.php"><i class="fal fa-sign-out"></i>Deconnexion</a>
                                        </div>
                                    </nav>
                                </aside>
                            </div>
                            <div class="col-xl-9 col-md-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                        <div class="axil-dashboard-overview">
                                            <div class="welcome-text">Bonjour <?php echo ucwords($_SESSION["userYopciConnected"]['firstname']) . " " . ucwords($_SESSION["userYopciConnected"]['lastname']) ?>(Vous n'etes pas <span><?php echo ucwords($_SESSION["userYopciConnected"]['lastname']) ?> ?</span><u><a href="deconnexion.php">Deconnexion</a></u>)</div>
                                            <p>À partir du tableau de bord de votre compte, vous pouvez afficher vos commandes récentes, gérer vos adresses de livraison et de facturation et modifier votre mot de passe et les détails de votre compte.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                        <div class="axil-dashboard-order">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Commande</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Statut</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (count($commandes) > 0) {
                                                            foreach ($commandes as $val) { ?>
                                                                <tr>
                                                                    <th scope="row">#<?php echo $val['id'] ?></th>
                                                                    <td> <?php echo  $dateToFrench = ucwords(dateToFrench($val["created_at"], 'l j F Y')); ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($val['statut'] == "V") {
                                                                            echo "En traitement";
                                                                        } else if ($val['statut'] == "L") {
                                                                            echo "Livree";
                                                                        } else if ($val['statut'] == "X") {
                                                                            echo "Annulee";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php $TQte = $db->getAllRecords("orders_details", "SUM(quantity) AS unit,SUM(price) AS total", "AND orders_id='" . $val['id'] . "'");
                                                                        echo "<b><i>" . $TQte[0]['total'] . " F CFA</i></b> pour <b><i>" . $TQte[0]['unit'] . " unité(s) </i></b> de produit(s)"; ?></td>
                                                                    <td>
                                                                        <?php if ($val['statut'] != "X") { ?>
                                                                            <a href="#" onclick="Impression('<?php echo $val['id'] ?>')" class="btn btn-warning">Reçu</a>
                                                                            <?php if ($val['statut'] == "V") { ?>
                                                                                <a href="#" onclick="Annuler('<?php echo $val['id'] ?>')" class="btn btn-danger">Annuler</a>
                                                                        <?php }
                                                                        }else{?>
                                                                            <a href="#" onclick="Recommander('<?php echo $val['id'] ?>')" class="btn btn-success">Recommander</a>
                                                                       <?php  } ?>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <tr>
                                                                <td colspan="4">Aucune commande effectuee</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                        <div class="axil-dashboard-address">
                                            <p class="notice-text">Les adresses suivantes seront utilisées sur la page de paiement par défaut.</p>
                                            <div class="row row--30">

                                                <div class="col-lg-6">
                                                    <div class="address-info mb--40">
                                                        <div class="addrss-header d-flex align-items-center justify-content-between">
                                                            <h4 class="title mb-0">Adresse de livraison</h4>
                                                            <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                        </div>
                                                        <ul class="address-details">
                                                            <li>Nom et Prenom(s) : <?php echo $_SESSION['userYopciConnected']['firstname'] . ' ' . $_SESSION['userYopciConnected']['lastname'] ?></li>
                                                            <li> Adress Email : <?php echo $_SESSION['userYopciConnected']['email'] ?></li>
                                                            <li>Numero de Telephone : <?php echo $_SESSION['userYopciConnected']['phone'] ?></li>
                                                            <li><?php echo $_SESSION['userYopciConnected']['address'] ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="addrss-header d-flex align-items-center justify-content-between">
                                                        <h4 class="title mb-0">Modifier l'adresse de livraison</h4>
                                                        <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                                                    </div>
                                                    <div class="axil-dashboard-account">
                                                        <form class="account-details-form" method="POST">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Nouvelle adresse Email</label>
                                                                        <input type="email" name="email" id="email" class="form-control">
                                                                        <span id="errorMessage" class="text-danger"><i>Ce champ est vide</i></span>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Nouvelle adresse de livraison</label>
                                                                        <textarea type="text" name="adresse" id="adresse" class="form-control"></textarea>
                                                                        <span id="errorMessage1" class="text-danger"><i>Ce champ est vide</i></span>
                                                                    </div>
                                                                    <div class="form-group mb--0">
                                                                        <input type="submit" name="update_adress" id="update_adress" class="axil-btn" value="Modifier">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                        <div class="col-lg-9">
                                            <div class="axil-dashboard-account">
                                                <form class="account-details-form" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Nom</label>
                                                                <input type="text" name="firstname" class="form-control" value="<?php echo $_SESSION['userYopciConnected']['firstname'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Prenom(s)</label>
                                                                <input type="text" name="lastname" class="form-control" value="<?php echo $_SESSION['userYopciConnected']['lastname'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb--40">
                                                                <label>Ville/ Region</label>
                                                                <select class="select2" name="ville">
                                                                    <option value="Abidjan" selected>Abidjan</option>
                                                                    <option value="Hors d'Abidjan">Hors d'Abidjan</option>
                                                                </select>
                                                                <p class="b3 mt--10">Ce sera ainsi que votre nom sera affiché dans la section compte et dans les avis</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <h5 class="title"> Changer le mot de passe</h5>
                                                            <div class="form-group">
                                                                <label>Mot de passe</label>
                                                                <input type="password" disabled class="form-control" value="<?php echo $_SESSION['userYopciConnected']['password'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nouveau Mot de passe</label>
                                                                <input type="password" class="form-control" id="Mdp" name="Mdp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Confirmer le Nouveau Mot de passe</label>
                                                                <input type="password" class="form-control" id="ConfirmMdp" name="ConfirmMdp">
                                                            </div>
                                                            <div class="form-group mb--0">
                                                                <input type="submit" name="update_details" id="update_details" class="axil-btn" value="Modifier">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End My Account Area  -->

            <!-- Start Axil Newsletter Area  -->
            <div class="axil-newsletter-area axil-section-gap pt--0">
                <div class="container">
                    <div class="etrade-newsletter-wrapper bg_image bg_image--12">
                        <form method="POST">
                            <div class="newsletter-content">
                                <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open text-white" style="background-color:#84ADEA"></i><span class="text-white">Newsletter</span> </span>
                                <h2 class="title mb--40 mb_sm--30 text-white">Nous aimerions avoir de vos nouvelles.</h2>
                                <p class="title mb--40 mb_sm--30 text-white " style="font-size:16px">Si vous avez d’excellents produits que vous fabriquez ou <br>si vous cherchez à travailler avec nous, envoyez-nous un message.</hp>
                                <div class="input-group newsletter-form">
                                    <div class="position-relative newsletter-inner mb--15">
                                        <input placeholder="Entrez votre adresse email" name="emailTosend" type="email" required>
                                    </div>
                                    <div class="position-relative shop-inner mb--15">
                                        <input placeholder="saisissez votre message" name='messageTosend' type="text" required>
                                    </div>
                                    <button type="submit" name="envoyer" value="envoyer" class="mb--15" style="background-color:#84ADEA">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End .container -->
            </div>
            <!-- End Axil Newsletter Area  -->
        </main>
        <?php include("assets/service-area.php") ?>
        <?php include("assets/footer.php") ?>



        <!-- JS
============================================ -->
        <!-- Modernizer JS -->
        <?php include("script.php"); ?>

        <!-- Main JS -->
        <script src="ajax/js/shop.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
            function Impression(recuID) {
                url = 'http://localhost/bsshop/'
                window.open(url + "tcpdf/source/printrecu.php?orders_id=" + recuID, "", " largeur = 300 , hauteur = 200 ");
            }

            function Annuler(id) {
                swal({
                        title: "Confirmation",
                        text: "Etes-vous sûr d'annuler cette commande  ?",
                        icon: "warning",
                        buttons: ["Non, annuler", "Oui, je confirme"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "supprimer.php?delId=" + id + "&sec=XXX";
                        } else {
                            swal({
                                title: "Alerte !",
                                text: "Operation d'annulation non confirmée!",
                                icon: "warning",
                                confirmButtonText: "OK"
                            });
                        }
                    });
            }
            function Recommander(id) {
                swal({
                        title: "Confirmation",
                        text: "Cette action effectuera une nouvelle cette commande",
                        icon: "warning",
                        buttons: ["Non, annuler", "Oui, je confirme"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "supprimer.php?delId=" + id + "&sec=REC";
                        } else {
                            swal({
                                title: "Alerte !",
                                text: "Operation non confirmée!",
                                icon: "warning",
                                confirmButtonText: "OK"
                            });
                        }
                    });
            }
            
        </script>
        <script>
            $("#update_details").attr('disabled', 'true');
            $("#update_adress").attr('disabled', 'true');
            $("#errorMessage1").hide();
            $("#errorMessage").hide();

            $("#ConfirmMdp").focusout(function() {
                mdp = $("#Mdp").val();
                if ($(this).val() != mdp) {
                    swal({
                        title: "Erreur !",
                        text: "Vos mots de passe ne correspondent pas !",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                    $("#update_details").attr('disabled', 'true');
                    // $("#ConfirmMdp").focus();
                } else {
                    $("#update_details").removeAttr('disabled');
                }
            });
            $("#email").focusout(function() {
                if ($(this).val() == "") {
                    $("#errorMessage").show();
                    $("#update_adress").attr('disabled', 'true');
                    $("#email").focus();
                } else {
                    $("#errorMessage").hide();
                    $("#update_adress").removeAttr('disabled');
                }
            });
            $("#adresse").focusout(function() {
                if ($(this).val() == "") {
                    $("#errorMessage1").show();
                    $("#update_adress").attr('disabled', 'true');
                    $("#adresse").focus();
                } else {
                    $("#errorMessage1").hide();

                    $("#update_adress").removeAttr('disabled');
                }
            });
        </script>
    </body>
<?php
} else {
    header("location:index.php?msg=Vconnecte");
}
?>

<!-- Mirrored from new.axilthemes.com/demo/template/etrade/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:36 GMT -->

    </html>