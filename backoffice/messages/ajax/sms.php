<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');
define('MENU', 'MASSE');
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multiple') {
    extract($_REQUEST);

    $data = explode(",", $id);

    foreach ($data as $val) {
       
        $datas = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('users_message', $datas, array('id' => $val));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multipleM') {
    extract($_REQUEST);
    $data = explode(",", $id);
    foreach ($data as $val) {
        $datas = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('comment_by_product', $datas, array('id' => $val));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
}else {
    // $condition = 'AND id="' . $_REQUEST['id'] . '"';
    // $masse = $db->getAllRecords('masse', '*', $condition, 'ORDER BY libelle ASC');
    // $masseName = $masse[0]['libelle'];
    // $Categorie[] = $masseName;
    // header("Content-Type: application/json");
    // echo json_encode($Categorie);
    // exit;
}
