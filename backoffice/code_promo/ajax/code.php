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
        $delete =   $db->update('type_code_promos', $datas, array('id' => $val));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND id="' . $_REQUEST['id'] . '"';
    $prix = $db->getAllRecords('type_code_promos', '*', $condition, 'ORDER BY name ASC');
    $prixName = $prix[0]['name'];
    $description = $prix[0]['description'];
    $Categorie[] = $prixName;
    $Categorie[] = $description;
    header("Content-Type: application/json");
    echo json_encode($Categorie);
    exit;
}
