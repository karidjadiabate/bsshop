<?php
session_start();

include_once('assets/database/config.php');




if (isset($_REQUEST['delId']) and $_REQUEST['delId'] != "" and isset($_REQUEST['sec']) and $_REQUEST['sec'] != "") {

    $editId = $_REQUEST['delId'];
    $data = [
        'statut' => 'V',
        'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
        'updated_at' =>  gmdate("Y-m-d H:i:s"),
    ];
    if($_REQUEST['sec']=="EAV"){
        $delete =   $db->update('orders', $data, array('id' => $editId));
        if ($delete) {
            $DeleteSecond =   $db->update('orders_details', $data, array('orders_id' => $editId));
            if ($DeleteSecond) {
                header('location: validation.php?msg=ras');
                exit;
            } else {
                header('location:validation.php?msg=rna');
                exit;
                
            }
        } else {
            header('location:validation.php?msg=rna');
            exit;
        }
    }else if($_REQUEST['sec']=="V"){
        $data = [
            'statut' => 'L',
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('orders', $data, array('id' => $editId));
        if ($delete) {
            $DeleteSecond =   $db->update('orders_details', $data, array('orders_id' => $editId));
            if ($DeleteSecond) {
                header('location: valides.php?msg=ras');
                exit;
            } else {
                header('location:valides.php?msg=rna');
                exit;
                
            }
        } else {
            header('location:valides.php?msg=rna');
            exit;
        }
    }else if($_REQUEST['sec']=="REC"){
        $data = [
            'statut' => 'V',
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('orders', $data, array('id' => $editId));
        if ($delete) {
            $DeleteSecond =   $db->update('orders_details', $data, array('orders_id' => $editId));
            if ($DeleteSecond) {
                header('location: my-account.php?msg=rdse');
                exit;
            } else {
                header('location:my-account.php?msg=rna');
                exit;
                
            }
        } else {
            header('location:my-account.php?msg=rna');
            exit;
        }
    }else if($_REQUEST['sec']=="XXX"){
        $data = [
            'statut' => 'X',
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('orders', $data, array('id' => $editId));
        if ($delete) {
            $DeleteSecond =   $db->update('orders_details', $data, array('orders_id' => $editId));
            if ($DeleteSecond) {
                header('location:my-account.php?msg=rds');
                exit;
            } else {
                header('location:my-account.php?msg=rna');
                exit;
                
            }
        } else {
            header('location:my-account.php?msg=rna');
            exit;
        }
    }else{
        header('location: '.PATH.'404.php');
    }
   
}else{
    header('location: '.PATH.'404.php');
}
exit;
?>