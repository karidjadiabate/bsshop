<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');
define('MENU', 'CATEGORIES');
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multiple') {
    extract($_REQUEST);

    $data = explode(",", $id);

    foreach ($data as $val) {
       
        $datas = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('products', $datas, array('id' => $val));
        if ($delete) {
            $deleteImage =   $db->update('images', $datas, array('product_id' => $val));
        }
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND id="' . $_REQUEST['idCategory'] . '"';
    $condition1 = 'AND product_id="' . $_REQUEST['idCategory'] . '"';
    $Categories = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ASC');
    $CategoriesImage = $db->getAllRecords('images', '*', $condition1, 'ORDER BY name ASC');
    $CategoriesName = $Categories[0]['name'];
    $description = $Categories[0]['description'];
    $price = $Categories[0]['price'];
    $stock = $Categories[0]['stock'];
    $mass = $Categories[0]['mass'];
    $categories_id = $Categories[0]['categories_id'];
    $CategoriesImage = $CategoriesImage[0]['name'];
   
    $Categorie['name'] = $CategoriesName;
    $Categorie['image'] = $CategoriesImage;
    $Categorie['description'] = $description;
    $Categorie['price'] = $price;
    $Categorie['stock'] = $stock;
    $Categorie['mass'] = $mass;
    $Categorie['categories_id'] = $categories_id;
    header("Content-Type: application/json");
    echo json_encode($Categorie);
    exit;
}
