
<form action="#" method="POST">
                                <div class="axil-checkout-billing">
                                    <h4 class="title mb--40">Details de Facturation</h4>
                                    <p><i>Les champs contenant <span class="text-danger">*</span> sont obligatoires</i></p>
                                    <!-- <div class="row"> -->
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Nom<span>*</span></label>
                                            <input type="text" id="first-name" value="<?php if (isset($connected) && $connected != array()) {
                                                                                            echo $connected['firstname'];
                                                                                        } else {
                                                                                            echo "";
                                                                                        } ?>" name="nom" placeholder="Nom" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Prenom <span>*</span></label>
                                            <input type="text" id="last-name" value="<?php if (isset($connected) && $connected != array()) {
                                                                                            echo $connected['lastname'];
                                                                                        } else {
                                                                                            echo "";
                                                                                        } ?>" name="prenom" placeholder="Prenom(s)" required>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <div class="form-group">
                                        <label>Telephone <span>*</span></label>
                                        <input type="tel" id="phone" name="phone" value="<?php if (isset($connected) && $connected != array()) {
                                                                                                echo $connected['phone'];
                                                                                            } else {
                                                                                                echo "(+225) ";
                                                                                            } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Numero Whatsapp</label>
                                        <input type="tel" id="whatsapp" name="whatsapp" value='(+225) '>
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse Email</label>
                                        <input type="email" class="form-control" value="<?php if (isset($connected) && $connected != array()) {
                                                                                            echo $connected['email'];
                                                                                        } else {
                                                                                            echo "";
                                                                                        } ?>" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Ville / Region <span>*</span></label>
                                        <select id="Region" name="region">
                                            <option value="Abidjan" selected>Abidjan</option>
                                        
                                        </select>
                                    </div>
                                   

                                    <div class="form-group">
                                        <label>Quartier ou Commune</label>
                                        <input type="text" id="quartier" name="quartier" placeholder="Quartier ou commune (facultatif)">
                                    </div>
                                    <div class="form-group">
                                        <label>Carrefour / Rue</label>
                                        <input type="text" id="Carrefour" name="carrefour" placeholder="Carrefour (facultatif)">
                                    </div>
                                    <label style="font-size:small">Etes vous un Particulier ou une entreprise ? <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select <?php if (isset($connected) && $connected != array()) {
                                                    echo "disabled";
                                                } ?> id="particulier" name="particulier">
                                            <option value="oui" selected>Partiulier</option>
                                            <option value="non" <?php if (isset($connected) && $connected != array()) {
                                                                    echo "selected";
                                                                } ?>>Entreprise</option>
                                        </select>
                                    </div>
                                    <div class="form-group different-shippng ml-4">
                                        <div class="toggle-bar ml-4">
                                            <label class="toggle-bar ml-4"></label>
                                        </div>
                                      
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Adresse(détaillée)</label>
                                        <textarea id="notes" name="address" rows="2" placeholder="Saisissez votre adresse de livraison de sorte a pouvoir vous reperez lors de la livraison de vos articles"><?php if (isset($connected) && $connected != array()) {
                                                                                                                                                                                                                    echo $connected['address'];
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo "";
                                                                                                                                                                                                                } ?></textarea>
                                    </div> -->
                                </div>
                        </div>