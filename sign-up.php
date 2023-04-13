<?php
session_start();
require_once('assets/database/config.php');
if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {
    extract($_REQUEST);
    $login = addslashes($email);
    $password = md5(addslashes($password));
   
    $row    =   $db->getAllRecords('users', '*', ' AND email="' . $login . '"AND particulier="non"');

    $nbUser = count($row);
    
    if ($nbUser == 0) {
        if (isset($_FILES['dfe']) && !empty($_FILES['dfe']['name'])) {
            // $taillemax=2097152;
            $extensionok = ['pdf'];
           
            $extensionupload = strtolower(substr(strrchr($_FILES['dfe']['name'], '.'), 1));
            if (in_array($extensionupload, $extensionok)) {
                $chemin = "backoffice/clients/dfe/" . $_FILES['dfe']['name'];
                $deplacement = move_uploaded_file($_FILES['dfe']['tmp_name'], $chemin);
            }
            $dfe = $_FILES['dfe']['name'];
        }
        $data   =   array(
            'nomentreprise' => $nomentreprise,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $login,
            'password' => $password,
            'phone' => $phone,
            'address' => $adresse,
            'particulier' => "non",
            'city' => $city,
            'quartier' => $quartier,
            'carrefour' => $carrefour,
            'NCC' => $ncc,
            'DFE' => $dfe,
        );
        $update =   $db->insert('users', $data);
        if ($update) {
            header('location: sign-in.php?msg=ccree');
            exit;
        } else {
            header('location: ' . PATH . '404.php');
            exit;
        }
    } else {
        header('location:' . $_SERVER['PHP_SELF'] . '?msg=emailexist');
        exit;
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">



<?php include("link.php"); ?>

</head>


<body>
<?php include("inscription.php"); ?>
    <!-- JS
============================================ -->
<?php include("script.php"); ?>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Oct 2022 22:16:35 GMT -->

</html>