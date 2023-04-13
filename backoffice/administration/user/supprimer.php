<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');




if (isset($_REQUEST['delId']) and $_REQUEST['delId'] != "" and isset($_REQUEST['sec']) and $_REQUEST['sec'] != "") {

    $editId = $_REQUEST['delId'];
    $data = [
        'statut' => 0,
        'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'updated_at' =>  gmdate("Y-m-d H:i:s"),
    ];
   if($_REQUEST['sec']=="COMPTE"){
        $delete =   $db->update('compte', $data, array('id' => $editId));
        if ($delete) {
                header('location: index.php?msg=rds');
                exit;
            } else {
                header('location:index.php?msg=rnu');
                exit;
            }
        }
   
}else{
    header('location: '.PATH.'404.php');
}
exit;
?>