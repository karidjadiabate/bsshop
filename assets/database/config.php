<?php
ini_set('memory_limit', '200M');

require_once 'Database.php';
define('SS_DB_NAME', 'bsshop');

define('SS_DB_USER', 'root');
define('SS_DB_PASSWORD', '');

define('SS_DB_HOST', 'localhost');

define('PATH', "http://localhost/bsshop/");

define('APP_NAME', "Pinso Market");

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING) );
}catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);

?>