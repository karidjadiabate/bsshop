<?php
session_start();

include_once('../assets/config/config.php');
include_once('../assets/config/connected.php');
include_once('../assets/config/Database.php');


/*$sessionPages = json_decode($_SESSION['userEcommune']['sessionPages']);
if(!in_array('admin.user', $sessionPages)){
    header('location: '.PATH.'pagenonautorisee.php');
    exit;
}*/

if (isset($_REQUEST['delId']) and $_REQUEST['delId'] != "" and isset($_REQUEST['sec']) and $_REQUEST['sec'] != "") {

    $editId = $_REQUEST['delId'];
    $data = [
        'statut' => 0,
        'update_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'update_at' =>  gmdate("Y-m-d H:i:s"),
    ];
    if ($_REQUEST['sec'] == "CATEGORIE") {
        $delete =   $db->update('categories', $data, array('id' => $editId));
        if ($delete) {
            $deleteImage =   $db->update('images_category', $data, array('category_id' => $editId));
            if ($deleteImage) {
                header('location: categories.php?msg=rds');
                exit;
            } else {
                header('location:categories.php?msg=rna');
                exit;
            }
        } else {
            header('location:categories.php?msg=rna');
            exit;
        }
    } else if ($_REQUEST['sec'] == "PRODUITS") {
        $delete =   $db->update('products', $data, array('id' => $editId));
        if ($delete) {

            $deleteImage =   $db->update('images', $data, array('product_id' => $editId));
            if ($deleteImage) {
                header('location: produits.php?msg=rds');
                exit;
            } else {
                header('location:produits.php?msg=rnu');
                exit;
            }
        } else {
            header('location:produits.php?msg=rnu');
            exit;
        }
    } else if ($_REQUEST['sec'] == "PRIX") {
        $delete =   $db->update('type_code_promos', $data, array('id' => $editId));
        if ($delete) {
            header('location: index2.php?msg=rds');
            exit;
        } else {
            header('location:index2.php?msg=rnu');
            exit;
        }
    } else if ($_REQUEST['sec'] == "PRIX1") {
        $delete =   $db->update('code_promo', $data, array('id' => $editId));
        if ($delete) {
            header('location: index.php?msg=rds');
            exit;
        } else {
            header('location:index.php?msg=rnu');
            exit;
        }
    }else if ($_REQUEST['sec'] == "MASSE") {
        $delete =   $db->update('masse', $data, array('id' => $editId));
        if ($delete) {
            header('location: masse.php?msg=rds');
            exit;
        } else {
            header('location:masse.php?msg=rnu');
            exit;
        }
    }
} else {
    header('location: ' . PATH . '404.php');
}
exit;
?>