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
                <p>Pas de Compte?</p>
                <a href="sign-up.php" class="axil-btn btn-bg-secondary sign-up-btn">S'inscrire Maintenant</a>
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

    <div class="col-lg-6 offset-xl-2">
        <div class="axil-signin-form-wrap">
            <div class="axil-signin-form">
            <b><i class="text-danger mt-0">Seules les entreprises ont le droit d'obtenir un compte</i></b>
                <h4 class="title">Connectez vous pour poursuivre vos achats</h4>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == "error")
                    echo '<div class="alert alert-danger alert-dismissible bg-danger show text-white" role="alert">
            <strong>Erreur de connexion!</strong> <br>Parametres de connexion incorrects
            </div>';
                if (isset($_GET['msg']) && $_GET['msg'] == "inactif")
                    echo '<div class="alert alert-warning bg-warning  show text-white" role="alert">
            <strong>Compte Inactif!</strong> <br>Votre compte est inactif,veuillez contacter l\'administrateur de ce site pour reactiver votre compte
            </div>';
            if (isset($_GET['msg']) && $_GET['msg'] == "ccree")
                    echo '<div class="alert alert-success bg-success  show text-white" role="alert">
            <strong>Nouveau Compte créé!</strong> <br>Votre compte a été créé avec succès ,veuillez vous connecter pour effectuer vos achats
            </div>';
                ?>
                <!-- <p class="b2 mb--55">Enter your detail below</p> -->
                <form class="singin-form" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Entrez votre email">
                    </div>
                    <div class="form-group">
                        <label>Mot de Passe</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <a href="index.php" class="axil-btn btn-danger submit-btn">Retour</a>
                        <button type="submit" name="submit" value="submit" class="axil-btn btn-bg-primary submit-btn">Se connecter</button>
                       </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>