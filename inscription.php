<?php
?>
 <div class="axil-signin-area">

<!-- Start Header -->
<div class="signin-header ">
    <div class="row align-items-center">
        <div class="col-sm-4">
            <a href="index.php" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
        </div>
        <div class="col-sm-8" style="margin-top:-35px">
            <div class="singin-header-btn">
                <p>Deja un Compte?</p>
                <a href="sign-in.php" class="axil-btn btn-bg-secondary sign-up-btn">Se connecter</a>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->

<div class="row">
    <div class="col-xl-4 col-lg-6">
        <div class="axil-signin-banner bg_image bg_image--9">
            <h4 class="title">Nous vous offrons les meilleurs produits</h4>
        </div>
    </div>

    <div class="col-lg-6 offset-xl-2" style="margin-top:-15px">
        <div class="axil-signin-form-wrap">
            <div class="axil-signin-form">
                <b><i class="text-danger mt-0">Seules les entreprises ont le droit d'obtenir un compte</i></b>
                <h4 class="title">Inscription</h4>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == "error")
                    echo '<div class="alert alert-danger alert-dismissible bg-danger show text-white" role="alert">
            <strong>Erreur de connexion!</strong> <br>Parametres de connexion incorrects
            </div>';
                if (isset($_GET['msg']) && $_GET['msg'] == "emailexist")
                    echo '<div class="alert alert-warning bg-warning  show text-white" role="alert">
            <strong>Adresse Email existante!</strong> <br>Cette adresse email a deja ete utisee pour creer un compte
            </div>';
                ?>
                <!-- <p class="b2 mb--55">Enter your detail below</p> -->
                <form class="singin-form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <label>Nom de l'entreprise</label>
                        <input type="text" class="form-control" name="nomentreprise" required placeholder="Entrez le nom de l'entreprise">
                    </div>
                    <div class="form-group">
                        <label>NCC</label>
                        <input type="text" class="form-control" name="ncc" required>
                    </div>
                    <div class="form-group">
                        <label>DFE</label>
                        <input type="file" accept=".pdf" class="form-control" name="dfe" required>
                    </div>
                    <div class="form-group">
                        <span>Ville/Region</span>
                        <select name="city" id="">
                            <option selected value="Abidjan">Abidjan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Carrefour</label>
                        <input type="text" class="form-control" name="carrefour" placeholder="Entrez votre carrefour">
                    </div>
                    <div class="form-group">
                        <label>Quartier</label>
                        <input type="text" class="form-control" name="quartier" placeholder="Entrez votre quartier">
                    </div>
                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Nom du responsable achat</label>
                        <input type="text" class="form-control" name="firstname" required placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                        <label>Prenom(s) du responsable achat</label>
                        <input type="text" class="form-control" name="lastname" required placeholder="Entrez vos prenom(s)">
                    </div>

                    <div class="form-group">
                        <label>Email du responsable achat</label>
                        <input type="email" class="form-control" name="email" required placeholder="Entrez votre adresse email">
                    </div>
                    <div class="form-group">
                        <label>Numero de Telephone du responsable achat</label>
                        <input type="tel" class="form-control" name="phone" required placeholder="Entrez votre numero de telephone">
                    </div>
                    <div class="form-group">
                        <label>Adresse de Livraison</label>
                        <textarea name="adresse" required placeholder="Entrez votre adresse de livraison"></textarea>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <a href="index.php" class="axil-btn btn-danger submit-btn">Retour</a>
                        <button type="submit" name="submit" value="submit" class="axil-btn btn-bg-primary submit-btn">S'inscrire</button>
                       
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
