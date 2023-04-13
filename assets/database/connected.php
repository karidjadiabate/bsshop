<?php
// var_dump($_SESSION['userYopci']['statutSession']);exit;
if(!empty($_SESSION['userYopci']) && !empty($_SESSION['userYopci']['statutSession']) && $_SESSION['userYopci']['statutSession'] === 1){
}elseif(!empty($_SESSION['userYopci']) && !empty($_SESSION['userYopci']['statutSession']) && $_SESSION['userYopci']['statutSession'] === 2){
  header("location: ".PATH."changermotdepasse.php?msg=nouveau_compte");
  exit;
}elseif(!empty($_SESSION['userYopci']) && !empty($_SESSION['userYopci']['statutSession']) && $_SESSION['userYopci']['statutSession'] === 0){
	header("location: ".PATH."verrouiller.php?msg=session_verrouiller");
  	exit;
}else{
	header("location: ".PATH);
	exit;
}