<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');
define('MENU', 'PRIX');
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multiple') {
    extract($_REQUEST);

    $data = explode(",", $id);

    foreach ($data as $val) {
       
        $datas = [
            'statut' => 0,
            'update_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'update_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('code_promo', $datas, array('id' => $val));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND id="' . $_REQUEST['id'] . '"';
    $prix = $db->getAllRecords('code_promo', '*', $condition, 'ORDER BY create_at DESC');
    $prixName = $prix[0]['code'];
    $id_type_code_promo = $prix[0]['id_type_code_promo'];
    $max_usage = $prix[0]['max_usage'];
    $discount = $prix[0]['discount'];
    $validity = $prix[0]['validity'];
    $valid = $prix[0]['valid'];
    $Categorie[] = $prixName;
    $Categorie[] = $id_type_code_promo;
    $Categorie[] = $max_usage;
    $Categorie[] = $discount;
    $Categorie[] = $validity;
    $Categorie[] = $valid;
    header("Content-Type: application/json");
    echo json_encode($Categorie);
    exit;
}
