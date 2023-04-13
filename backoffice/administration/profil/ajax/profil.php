<?php
session_start();

include_once('../../../assets/config/config.php');
include_once('../../../assets/config/connected.php');
include_once('../../../assets/config/Database.php');
define('MENU', 'PROFIL');
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multiple') {
    extract($_REQUEST);

    $data = explode(",", $id);

    foreach ($data as $val) {
       
        $datas = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('profil', $datas, array('id' => $val));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND id="' . $_REQUEST['id'] . '"';
    $profil = $db->getAllRecords('profil', '*', $condition, 'ORDER BY profil ASC');
    $profilName = $profil[0]['profil'];
    $profilJsonPage = $profil[0]['jsonPage'];
    $Profil['profil'] = $profilName;
    $Profil['jsonPage'] = $profilJsonPage;
    header("Content-Type: application/json");
    echo json_encode($Profil);
    exit;
}
