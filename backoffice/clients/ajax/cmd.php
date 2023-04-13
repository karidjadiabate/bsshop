<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');
define('MENU', 'MASSE');

extract($_REQUEST);
if (isset($userId) && $userId != "") {
    $cond = "AND users_id=" . $userId;
    $cond1 = "AND id=" . $userId;
    $commandes = $db->getAllRecords("orders", "*", $cond, "ORDER BY created_at DESC");
    $user = $db->getAllRecords("users", "*", $cond1, "ORDER BY created_at DESC");
    // var_dump($commandes);
    // var_dump($user);
    // exit;

    $infoCmd = '<table class="table table-responsive">
    <thead >
        <tr>
            <th  class="text-white" scope="col">Commande</th>
            <th  class="text-white" scope="col">Date</th>
            <th  class="text-white" scope="col">Statut</th>
            <th  class="text-white" scope="col">Total</th>
            <th  class="text-white" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>';
    if (count($commandes) > 0) {
        foreach ($commandes as $val) {
            $infoCmd .= '   <tr>
                    <th scope="row">#' . $val["id"] . '</th>
                    <td>' . $dateToFrench = ucwords(dateToFrench($val["created_at"], "l j F Y")) . '</td>
                    <td>';

            if ($val['statut'] == "V") {
                $infoCmd .= "En traitement";
            } else if ($val['statut'] == "L") {
                $infoCmd .= "Livree";
            } else{
                $infoCmd .= "Annulee";
            }
            $infoCmd .= '
                    </td>
                    <td>';
            $TQte = $db->getAllRecords("orders_details", "SUM(quantity) AS unit,SUM(price) AS total", "AND orders_id='" . $val['id'] . "'");
            $infoCmd .= '<b><i>' . $TQte[0]['total'] . ' F CFA</i></b> pour <b><i>' . $TQte[0]['unit'] . ' unité(s) </i></b> de produit(s)</td>';
            if ($val['statut'] != "X") {
            $infoCmd .= '<td><a href="#" onclick="Impression(\'' . $val['id'] . '\')" class="btn btn-primary">Reçu</a></td>';
                
            }
            $infoCmd .='</tr>';
        }
    } else {
        $infoCmd .= ' <tr>
                <td colspan="6">Aucune commande effectuee</td>
            </tr>';
    }
    $infoCmd .= ' </tbody>
</table>';
    // var_dump($infoCmd);exit;
    echo json_encode([
        'nomentreprise' => $user[0]['nomentreprise'],
        'firstname' => $user[0]['firstname'],
        'lastname' => $user[0]['lastname'],
        'email' => $user[0]['email'],
        'phone' => $user[0]['phone'],
        'address' => $user[0]['address'],
        'city' => $user[0]['city'],
        'quartier' => $user[0]['quartier'],
        'carrefour' => $user[0]['carrefour'],
        'NCC' => $user[0]['NCC'],
        'DFE' => $user[0]['DFE'],
        'infocmd' => $infoCmd,
    ]);
    exit;
} else {
    header("location:../../main.php");
    exit;
}
