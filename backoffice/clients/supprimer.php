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
        'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'updated_at' =>  gmdate("Y-m-d H:i:s"),
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
        $delete =   $db->update('prix', $data, array('id' => $editId));
        if ($delete) {
            header('location: prix.php?msg=rds');
            exit;
        } else {
            header('location:prix.php?msg=rnu');
            exit;
        }
    } else if ($_REQUEST['sec'] == "MASSE") {
        $delete =   $db->update('users_message', $data, array('id' => $editId));
        if ($delete) {
            header('location: index.php?msg=rds');
            exit;
        } else {
            header('location:index.php?msg=rnu');
            exit;
        }
    } else if ($_REQUEST['sec'] == "DES") {
        $delete =   $db->update('users', $data, array('id' => $editId));
        if ($delete) {
            header('location: index.php?msg=rdes');
            exit;
        } else {
            header('location:index.php?msg=rnu');
            exit;
        }
    } else if ($_REQUEST['sec'] == "REA") {
        $data = [
            'statut' => 1,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('users', $data, array('id' => $editId));
        if ($delete) {
            header('location: index.php?msg=reac');
            exit;
        } else {
            header('location:index.php?msg=rnu');
            exit;
        }
    }
} else {
    header('location: ' . PATH . '404.php');
}
?>
exit;
?>