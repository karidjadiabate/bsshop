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
            'statut' => "X",
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('orders', $datas, array('id' => $val));
        if($delete){
            $DeleteSecond =   $db->update('orders_details', $datas, array('orders_id' => $val));
        }else{
            header('location:validation.php?msg=rna');
            exit;
        }
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    header("location:".PATH."404.php");
    // $condition = 'AND id="' . $_REQUEST['id'] . '"';
    // $masse = $db->getAllRecords('masse', '*', $condition, 'ORDER BY libelle ASC');
    // $masseName = $masse[0]['libelle'];
    // $Categorie[] = $masseName;
    // header("Content-Type: application/json");
    // echo json_encode($Categorie);
    // exit;
}
