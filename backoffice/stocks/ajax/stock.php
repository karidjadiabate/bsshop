<?php
session_start();

include_once('../../assets/config/config.php');
include_once('../../assets/config/connected.php');
include_once('../../assets/config/Database.php');
define('MENU', 'STOCK');
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] != "" &&   $_REQUEST['submit'] == 'delete_multiple') {
    extract($_REQUEST);

    $data = explode(",", $id);

    foreach ($data as $val) {
       
        $datas = [
            'statut' => 0,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('histo_stock', $datas, array('id' => $val));
        $HistoStocks = $db->getAllRecords('histo_stock', 'product_id,en_stock', 'AND id="'.$val.'"');
        $en_stock=$HistoStocks[0]['en_stock'];
        $product=$HistoStocks[0]['product_id'];
        $conditionss='and product_id="'.$product.'"';
        $allStocks = $db->getAllRecords('stock', '*', $conditionss, 'ORDER BY id ASC');
        $actu_en_stock=$allStocks[0]['en_stock'] - $HistoStocks[0]['en_stock'];
        $actu_dispo=$allStocks[0]['disponible'] - $HistoStocks[0]['en_stock'];
        $datas = [
            'en_stock' => $actu_en_stock,
            'disponible' => $actu_dispo,
            'updated_by' => $_SESSION['userYopci']['nom'] . "#" . $_SESSION['userYopci']['iduser'],
            'updated_at' =>  gmdate("Y-m-d H:i:s"),
        ];
        $delete =   $db->update('stock', $datas, array('product_id' => $product));
    }
    echo json_encode(['result' => 'deleteAllOk']);
    exit;
} else {
    $condition = 'AND id="' . $_REQUEST['id'] . '"';
    $stock = $db->getAllRecords('histo_stock', '*', $condition, '');
    
    $disponible = $stock[0]['disponible'];
    $en_stock = $stock[0]['en_stock'];
    $product_id = $stock[0]['product_id'];
    $date_appro = $stock[0]['date_appro'];
   
    $Stock['disponible'] = $disponible;
    $Stock['en_stock'] = $en_stock;
    $Stock['product_id'] = $product_id;
    $Stock['date_appro'] = $date_appro;
    header("Content-Type: application/json");
    echo json_encode($Stock);
    exit;
}
