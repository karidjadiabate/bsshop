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
    if ($_REQUEST['sec'] == "STOCK") {
        $Stock = $db->getAllRecords('histo_stock', '*', 'AND id="' . $editId . '"', 'ORDER BY id ASC');
        $allStock = $db->getAllRecords('stock', '*', 'AND product_id="' . $Stock[0]['product_id'] . '"', 'ORDER BY id ASC');

        $en_Hstock = $Stock[0]['en_stock'];
        $dispo_Hstock = $Stock[0]['disponible'];
        $en_stock = $allStock[0]['en_stock'];
        $dispo_stock = $allStock[0]['disponible'];
        $data = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('histo_stock', $data, array('id' => $editId));
        $data2 = [
            'en_stock' => $en_stock - $en_Hstock,
            'disponible' => $dispo_stock - $dispo_Hstock,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete2 =   $db->update('stock', $data2, array('product_id' => $Stock[0]['product_id']));

        if ($delete2) {
            header('location: index.php?msg=rds');
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