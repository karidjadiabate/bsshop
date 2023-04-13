<?php
session_start();
require_once('assets/database/config.php');
if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    $login = addslashes($email);
    $password = md5(addslashes($password));
    $row = $db->getAllRecords('users', '*', ' AND email="' . $login . '" AND password="' . $password . '" AND particulier="non"');

    $nbUser = count($row);
    
    if ($nbUser === 1) {
       
        $statut = $row[0]['statut'];

        if ($statut == 1) {

            $data   =   array(
                'connected' => 1,
            );

            $update =   $db->update('users', $data, array('id' => $row[0]['id']));
      
            $_SESSION['userYopciConnected'] = $row[0];
            $_SESSION['userYopciConnected']['statutSession'] = 1;

            if (!empty($_SESSION['lastUrluserYopci'])) {
                $lastUrluserYopci = explode('backoffice/', $_SESSION['lastUrluserYopci']);
                header('location: ' . $lastUrluserYopci[1]);
                exit;
            }

            header('location: my-account.php');
            exit;
            } else {
            header('location:' . $_SERVER['PHP_SELF'] . '?msg=inactif');
            exit;
        }
    } else {
        header('location:' . $_SERVER['PHP_SELF'] . '?msg=error');
        exit;
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include("link.php"); ?>

</head>


<body>
<?php include("connexion.php"); ?>

    <!-- JS
============================================ -->
  <?php include("script.php"); ?>

</body>


</html>