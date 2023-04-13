<?php
session_start();

include_once('../assets/database/config.php');

$allCategories = $db->getAllRecords('categories', '*', "AND statut='1'", 'ORDER BY name ASC');
foreach ($allCategories as $val) {
    $imagesCategorie = $db->getAllRecords('images_category', '*', "AND category_id='" . $val['id'] . "'AND statut='1'", 'ORDER BY id ASC');
?>
    <div class="slick-single-layout slick-slide ">
        <div class="categrie-product-2 ">
            <a href="#">
                <img class="img-fluid" src="<?php echo PATH ?>backoffice/images/categories/<?php echo $imagesCategorie[0]['name'] ?>" width="64px" height="64px" alt="product categorie">
                <h6 class="cat-title "><?php echo $val['name'] ?></h6>
            </a>
        </div>
        <!-- End .categrie-product -->
    </div>
<?php
}
?>