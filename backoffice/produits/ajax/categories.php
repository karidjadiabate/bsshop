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
        $delete =   $db->update('categories', $datas, array('id' => $val));
        if ($delete) {
            $deleteImage =   $db->update('images_category', $datas, array('category_id' => $val));
        }
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND id="' . $_REQUEST['idCategory'] . '"';
    $condition1 = 'AND category_id="' . $_REQUEST['idCategory'] . '"';
    $Categories = $db->getAllRecords('categories', '*', $condition, 'ORDER BY name ASC');
    $CategoriesImage = $db->getAllRecords('images_category', '*', $condition1, 'ORDER BY name ASC');
    $CategoriesName = $Categories[0]['name'];
    $CategoriesImage = $CategoriesImage[0]['name'];
    $Categorie[] = $CategoriesName;
    $Categorie[] = $CategoriesImage;
    header("Content-Type: application/json");
    echo json_encode($Categorie);
    exit;
}
