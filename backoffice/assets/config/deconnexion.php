<?php
require_once 'config.php';
session_start();
// var_dump($_SESSION);exit;
try{
	$editId=$_SESSION["userYopci"]["iduser"];

	$data = [
		'connected' => 0
	];
		$delete =   $db->update('compte', $data, array('iduser' => $editId));
	if($delete){
		$_SESSION["userYopci"]=array();
		// if($destroy){
			header("location: ".PATH."?msg=deconnecte");
			exit;
		// }else{
		// 	header("location: ".PATH."404.php");
		// 	exit;
		// }
		
	}else{
		header("location: ".PATH."404.php");
		exit;
	}
}catch(Exception $e){
	header("location: ".PATH."404.php");
		exit;
}
