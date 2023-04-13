<?php
session_start();

include_once('../../../assets/config/config.php');
include_once('../../../assets/config/connected.php');
include_once('../../../assets/config/Database.php');
define('MENU', 'UTILISATEUR');
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multiple') {
    extract($_REQUEST);
    $data = explode(",", $id);
    foreach ($data as $val) {
        $datas = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('compte', $datas, array('iduser' => $val));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND iduser="' . $_REQUEST['id'] . '"';
    $compte = $db->getAllRecords('compte', '*', $condition, 'ORDER BY profil ASC');
    $nom = $compte[0]['nom'];
    $prenom = $compte[0]['prenom'];
    $profil = $compte[0]['profil'];
    $email = $compte[0]['login'];
    $image = $compte[0]['photo'];
    $compte['nom'] = $nom;
    $compte['prenom'] = $prenom;
    $compte['login'] = $email;
    $compte['image'] = $image;
    $compte['profil'] = $profil;
    header("Content-Type: application/json");
    echo json_encode($compte);
    exit;
}
