<?php
require_once 'assets/database/config.php';
session_start();
// var_dump($_SESSION);exit;
try{
	$editId=$_SESSION["userYopciConnected"]["id"];

	$data = [
		'connected' => 0
	];
		$delete =   $db->update('users', $data, array('id' => $editId));
	if($delete){
		$_SESSION["userYopciConnected"]=array();
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
