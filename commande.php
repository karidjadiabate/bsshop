<?php
?>
 <div class="col-md-8"id='commandeTable'>
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Votre Commande</h5>
                                <div class="summery-table-wrap">
                                    <table class="table table-hover table-responsive">
                                        <thead style="background-color:#F9F3F0;">
                                            <tr>
                                                <th><b>Produit</b></th>
                                                <th><b>Masse</b></th>
                                                <!-- <th>Qté</th> -->
                                                <th><b>Prix</b></th>
                                                <th><b>Montant</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($lastProducts)) {
                                                foreach ($lastProducts as $val) {
                                                    if (isset($val)) {
                                                        $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
                                                        $condition = "";
                                                        $condition .= "AND statut='1'";
                                                        $condition .= "AND id='" . $val . "'";
                                                        $product = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ');
                                                        $images = $db->getAllRecords('images', '*', $condition, 'ORDER BY id ');
                                                        $category_id = $product[0]['categories_id'];
                                                        $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');
                                                        $price_id = $product[0]['price'];
                                                        $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');
                                                        $masse_id = $product[0]['mass'];
                                                        $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');
                                            ?>
                                                        <tr class="order-product">
                                                            <!-- <td><?php echo strtoupper($product[0]['name']) ?> X<span class="quantity "><b><?php echo $occurence[$val] ?></span></td> -->
                                                            <!-- <td><?php echo strtoupper($product[0]['name']) ?></td> -->
                                                            <td><?php echo strtoupper($masse[0]['libelle']) ?><span class="quantity "></span></td>
                                                            <!-- <td><span class="quantity "> <b><?php echo $occurence[$val] ?> </b></span></td> -->
                                                            <td><span class="quantity "> <?php echo $price[0]["valeur"] ?></span></td>
                                                            <td><?php echo $prixPerArticle = $price[0]['valeur'] * $occurence[$val] ?> F CFA</td>
                                                        </tr>
                                            <?php $total = $total + $prixPerArticle;
                                                    }
                                                }
                                            } ?>
                                            <tr style="margin:1px;padding:1px;background-color:#F9F3F0;border-top:2px solid black">
                                                <td><b>Sous Total</b></td>
                                                <td></td>
                                                <td></td>
                                                <td><b><?php echo $total ?> F CFA </b></td>
                                            </tr>
                                            <tr style="margin:1px;padding:1px;background-color:#F9F3F0;">
                                                <td><b>Methode de Paiement</b></td>
                                                <td></td>
                                                <td></td>
                                                <td><b><?php if ($total <= 10000) {
                                                            $prixLivraison = 1000;
                                                        } else {
                                                            $prixLivraison = $total * 0.1;
                                                        };
                                                        echo $prixLivraison ?> F CFA</b></td>
                                            </tr>
                                             <!-- <tr class="order-total" style="margin:1px;padding:1px;background-color:#F9F3F0;border-top:2px solid black;"">
                                                    <td><b>Total</b></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class=" order-total-amount"><b><?php echo $prixTotal = $prixLivraison + $total ?> F CFA</b></td>
                                            </tr> -->
                                            <tr class="order-shipping" style="margin:1px;padding:1px;background-color:#F9F3F0;">
                                                <td colspan="4">


                                                    <div class="input-group">
                                                        <input type="checkbox" id="radio" checked name="shipping">
                                                        <label for="radio2">Payer Cash a la livraison</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="checkbox" disabled id="radio" name="shipping1">
                                                        <label for="radio2">Paiement Par carte bancaire (bientot disponible)</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="checkbox" disabled id="radio" name="shipping2">
                                                        <label for="radio2">Paiement Par Mobile Money (bientot disponible)</label>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                            <tr class="order-total" style="margin:1px;padding:1px;background-color:#F9F3F0;border-top:2px solid black;">
                                                    <td><b>Total</b></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class=" order-total-amount"><b><?php echo $prixTotal-$discount?> F CFA</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-payment-method">
                                   
                                    <div class="single-payment">
                                        <div class="input-group">
                                            <input type="radio" checked id="radio5" name="payment">
                                            <label for="radio5">Paiement à la livraison</label>
                                        </div>
                                        <p>Paiement en espece à la livraison</p>
                                    </div>
                                   
                                </div>
                                <button type="submit" id="imprimerCommande" name="process" value="<?php if (isset($connected) && $connected != array()) {
                                                                                echo "ConnectedProcess";
                                                                            } else {
                                                                                echo "process";
                                                                            } ?>" class="axil-btn checkout-btn text-white d-none" style="background-color:#f15f79">Imprimer le bon de commande</button>
                               <button type='button' id="validerCommande" onclick="ValiderCommande()" class="axil-btn checkout-btn text-white mt-2" style="background-color:#35FF7D">Valider la commande</button>
                               <div class="row">
                                    <div class="col-6 mt-3">
                                        <button type="button" id="annulerCommande" onclick="annulerCommande()" class="axil-btn bg-danger checkout-btn text-white">Annuler la commande</button>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <a href="index.php" id="continuerAchat" class="axil-btn bg-secondary checkout-btn text-white">Continuez vos achats</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>