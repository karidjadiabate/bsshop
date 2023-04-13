<aside class="left-sidebar sidebar-light" id="left-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="<?php echo PATH ?>">
        <img src="<?php echo PATH ?>images/logo.png" alt="mono">
        <span class="brand-name">Pinso Market</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-left" data-simplebar style="height: 100%;">
      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
        <li class="" <?php if (MENU == 'MAIN') { ?> style="background-color:white;" <?php } ?>>
          <a class="sidenav-item-link" href="<?php echo PATH; ?>main.php" <?php if (MENU == 'MAIN') { ?> style="color:#84ADEA !important;font-weight:bolder;" <?php } ?>>
            <i class="mdi mdi-briefcase-account-outline"></i>
            <span class="nav-text">TABLEAU DE BORD </span>
          </a>
        </li>
        <!-- <li class="" <?php if (MENU == 'ANALYSE') { ?> style="background-color:white;" <?php } ?>>

          <a class="sidenav-item-link" href="<?php echo PATH; ?>analytics.php" <?php if (MENU == 'ANALYSE') { ?> style="color:#84ADEA !important;font-weight:bolder;" <?php } ?>>
            <i class="mdi mdi-chart-line"></i>
            <span class="nav-text">ANALYSE</span>
          </a>
        </li> -->
        <?php if (in_array('produits', json_decode($_SESSION["userYopci"]['sessionPages']))) { ?>
          <li class="section-title">
            PRODUITS
          </li>
          <li class="" <?php if (MENU == 'CATEGORIES') { ?> style="background-color:white;" <?php } ?>>
            <a class="sidenav-item-link" href="<?php echo PATH; ?>produits/categories.php" <?php if (MENU == 'CATEGORIES') { ?> style="color:#84ADEA !important;font-weight:bolder;" <?php } ?>>
              <i class="mdi mdi-lan"></i>
              <span class="nav-text">CATEGORIES</span>
            </a>
          </li>
          <li class="" <?php if (MENU == 'PRODUITS') { ?> style="background-color:white;" <?php } ?>>
            <a class="sidenav-item-link" href="<?php echo PATH; ?>produits/produits.php" <?php if (MENU == 'PRODUITS') { ?> style="color:#84ADEA !important;font-weight:bolder;" <?php } ?>>
              <i class="mdi mdi-paper-cut-vertical"></i>
              <span class="nav-text">PRODUITS</span>
            </a>
          </li>
          <li class="" <?php if (MENU == 'PRIX') { ?> style="background-color:white;" <?php } ?>>
            <a class="sidenav-item-link" href="<?php echo PATH; ?>produits/prix.php" <?php if (MENU == 'PRIX') { ?> style="color:#84ADEA !important;font-weight:bolder;" <?php } ?>>
              <i class="mdi mdi-currency-usd"></i>
              <span class="nav-text">PRIX DES PRODUITS</span>
            </a>
          </li>
          <li class="" <?php if (MENU == 'MASSE') { ?> style="background-color:white;" <?php } ?>>
            <a class="sidenav-item-link" href="<?php echo PATH; ?>produits/masse.php" <?php if (MENU == 'MASSE') { ?> style="color:#84ADEA !important;font-weight:bolder;" <?php } ?>>
              <i class="mdi mdi-weight-kilogram"></i>
              <span class="nav-text">MASSE DES PRODUITS</span>
            </a>
          </li>
        <?php }
        if (in_array('commandes', json_decode($_SESSION["userYopci"]['sessionPages']))) { ?>
          <li class="section-title">
            COMMANDES
          </li>
          <li class="has-sub <?php if (MENU == "COMMANDES") { ?>expand <?php } ?>" <?php if (MENU == "COMMANDES") { ?> style="background-color:white" <?php
                                                                                                                                                    } ?>>
            <a class="sidenav-item-link <?php if (MENU == "COMMANDES") { ?>collapsed <?php } ?>" <?php if (MENU == "COMMANDES") { ?> style="color:#84ADEA !important;font-weight:bolder" <?php
                                                                                                                                                                                        } ?> href="javascript:void(0)" data-toggle="collapse" data-target="#email" aria-expanded="<?php if (MENU == "COMMANDES") { ?> true <?php } else { ?>false <?php } ?>" aria-controls="email">
              <i class="mdi mdi-newspaper"></i>
              <span class="nav-text">COMMANDES</span> <b class="caret"></b>
            </a>
            <ul class="collapse <?php if (MENU == "COMMANDES") { ?>show <?php } ?>" id="email" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <!-- <li class="<?php //if ($SSMENU == "VALIDATION") {
                                //echo "active";
                                //} 
                                ?>">
                  <a class="sidenav-item-link" href="<?php // echo PATH; 
                                                      ?>commandes/validation.php">
                    <span class="nav-text">En validation</span>
                  </a>
                </li> -->
                <li class="" <?php if ($SSMENU == "VALIDES") {
                                echo " style='background-color:#84ADEA !important;font-weight:bolder'";
                              } ?>>
                  <a class="sidenav-item-link" <?php if ($SSMENU == "VALIDES") {
                                                  echo " style='color:white'";
                                                } ?> href="<?php echo PATH; ?>commandes/valides.php">
                    <span class="nav-text">validées</span>
                  </a>
                </li>
                <li class="" <?php if ($SSMENU == "LIVRES") {
                                echo " style='background-color:#84ADEA !important;font-weight:bolder'";
                              } ?>>
                  <a class="sidenav-item-link" <?php if ($SSMENU == "LIVRES") {
                                                  echo " style='color:white'";
                                                } ?> href="<?php echo PATH; ?>commandes/livres.php">

                    <span class="nav-text">Livrées</span>
                  </a>
                </li>
                <li class="" <?php if ($SSMENU == "ANNULES") {
                                echo " style='background-color:#84ADEA !important;font-weight:bolder'";
                              }
                              ?>>
                  <a class="sidenav-item-link" <?php if ($SSMENU == "ANNULES") {
                                                  echo " style='color:white'";
                                                } ?>href="<?php echo PATH; ?>commandes/annules.php">

                    <span class="nav-text">Annulées</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>
        <?php }
        if (in_array('stocks', json_decode($_SESSION["userYopci"]['sessionPages']))) { ?>

          <li class="section-title">
            GESTION DES STOCKS
          </li>
          <li class="" <?php if (MENU == 'STOCKS') { ?> style='background-color:White' <?php } ?>>
            <a class="sidenav-item-link" <?php if (MENU == 'STOCKS') { ?> style='color:#84ADEA !important;font-weight:bolder' ; <?php } ?> href="<?php echo PATH; ?>stocks/index.php">
              <i class="mdi mdi-developer-board"></i>
              <span class="nav-text">STOCKS</span>
            </a>
          </li>
        <?php }
        // if (in_array('codespromo', json_decode($_SESSION["userYopci"]['sessionPages']))) { 
        ?>

        <!-- <li class="section-title">
             CODES PROMO
           </li>
           <li class=""<?php if (MENU == 'CODEPROMO') { ?> style='background-color:White' <?php } ?>>
             <a class="sidenav-item-link"<?php if (MENU == 'CODEPROMO') { ?> style='color:#84ADEA !important;font-weight:bolder'; <?php } ?> href="<?php echo PATH; ?>code_promo/index.php">
               <i class="mdi mdi-view-day"></i>
               <span class="nav-text">CODES PROMO </span>
             </a>
           </li>
           <li class=""<?php if (MENU == 'TYPECODEPROMO') { ?> style='background-color:White' <?php } ?>>
             <a class="sidenav-item-link"<?php if (MENU == 'TYPECODEPROMO') { ?> style='color:#84ADEA !important;font-weight:bolder'; <?php } ?> href="<?php echo PATH; ?>code_promo/index2.php">
               <i class="mdi mdi-credit-card-scan"></i>
               <span class="nav-text">TYPE CODES PROMO </span>
             </a>
           </li> -->
        <?php
        //  }
        if (in_array('messages', json_decode($_SESSION["userYopci"]['sessionPages']))) { ?>

          <li class="section-title">
            CLIENTS
          </li>
          <li class="" <?php if (MENU == 'MESSAGES') { ?> style='background-color:White' <?php } ?>>
            <a class="sidenav-item-link" <?php if (MENU == 'MESSAGES') { ?> style='color:#84ADEA !important;font-weight:bolder' ; <?php } ?> href="<?php echo PATH; ?>messages/index.php">
              <i class="mdi mdi-cellphone-message"></i>
              <span class="nav-text">MESSAGES </span>
            </a>
          </li>
          <li class="" <?php if (MENU == 'COMMENTAIRES') { ?> style='background-color:White' <?php } ?>>
            <a class="sidenav-item-link" <?php if (MENU == 'COMMENTAIRES') { ?> style='color:#84ADEA !important;font-weight:bolder' ; <?php } ?> href="<?php echo PATH; ?>messages/commentaires.php">
              <i class="mdi mdi-comment-text-multiple"></i>
              <span class="nav-text">COMMANTAIRES <BR> SUR LES PRODUITS</span>
            </a>
          </li>
          <li class="" <?php if (MENU == 'CLIENTS') { ?> style='background-color:White' <?php } ?>>
            <a class="sidenav-item-link" <?php if (MENU == 'CLIENTS') { ?> style='color:#84ADEA !important;font-weight:bolder' ; <?php } ?> href="<?php echo PATH; ?>clients/index.php">
              <i class="mdi mdi-account-group-outline"></i>
              <span class="nav-text">CLIENTS</span>
            </a>
          </li>
        <?php }
        if (in_array('administration', json_decode($_SESSION["userYopci"]['sessionPages']))) { ?>

          <li class="section-title">
            ADMINISTRATION
          </li>
          <li class="" <?php if (MENU == 'PROFIL') { ?> style='background-color:White' <?php } ?>>
            <a class="sidenav-item-link" <?php if (MENU == 'PROFIL') { ?> style='color:#84ADEA !important;font-weight:bolder' <?php } ?>href="<?php echo PATH; ?>administration/profil/index.php">
              <i class="mdi mdi-nature-people"></i>
              <span class="nav-text">PROFIL</span>
            </a>
          </li>
          <li class="" <?php if (MENU == 'UTILISATEUR') { ?> style='background-color:White' <?php } ?>>
            <a class="sidenav-item-link" href="<?php echo PATH; ?>administration/user/index.php" <?php if (MENU == 'UTILISATEUR') { ?> style='color:#84ADEA !important;font-weight:bolder' <?php } ?>>

              <i class="mdi mdi-account-group"></i>
              <span class="nav-text">UTILISATEURS</span>
            </a>
          </li>
        <?php } ?>
      </ul>

    </div>

    <!-- <div class="sidebar-footer">
      <div class="sidebar-footer-content">
        <ul class="d-flex">
          <li>
            <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a>
          </li>
          <li>
            <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
          </li>
        </ul>
      </div>
    </div> -->
  </div>
</aside>