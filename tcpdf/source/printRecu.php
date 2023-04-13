<?php
include_once('../../assets/database/config.php');
define('MENU', 'HOME');
extract($_REQUEST);
if (isset($orders_id)) {
  $orders_info = $db->getAllRecords1('orders', 'orders_details', '*,orders.created_at as DateCommande', 'id', 'orders_id', "AND orders_id='" . $orders_id . "'AND (orders.statut='V' OR orders.statut='L')", 'ORDER BY orders.created_at ASC');
  // var_dump($orders_info);exit;
  $users_id = $orders_info[0]['users_id'];
  $users_id = $db->getAllRecords('users', '*', 'AND id="' . $users_id . '"', 'ORDER by id ASC');
  $total = 0;
  $reference = "Commande de :";
  // var_dump($_SESSION);exit;
  // if (isset($_SESSION['InfoProduct'])) {
  // if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
  //     foreach ($_SESSION['InfoProduct'] as $val) {

  //         unset($_SESSION['InfoProduct'][array_search($_REQUEST['product_id'], $_SESSION['InfoProduct'])]);
  //     }
  // }
  $total = 0;

  $InfoProduct = $db->getAllRecords('orders_details', 'quantity,orders_id,products_id', 'AND orders_id="' . $orders_id . '"', 'ORDER by orders_id ASC');;
  foreach ($InfoProduct as $val) {
    for ($li = 0; $li < $val['quantity']; $li++) {
      $InfoForAll[] = $val['products_id'];
    }
  }
  $occurence = array_count_values($InfoForAll);
  $lastProducts = array_unique($InfoForAll);
}
$intituleCommande = $orders_info[0]["users_id"] . ' ' . $orders_info[0]["DateCommande"];

//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
  //Page header
  public function Header()
  {
    $this->Rect(0, 0, 210, 297, 'F', '', $fill_color = array(255, 170, 96));
  }
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Pinso Market');
$pdf->SetTitle('Commande N¨' . $intituleCommande);
$pdf->SetSubject('Recu de Commande');
$pdf->SetKeywords(' Recu de Commande du client');

// set default header datax
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . '', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
  require_once(dirname(__FILE__) . '/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 6.5);


// add a page
// $pdf->AddPage();
// add a page
// $pdf->AddPage();

// set JPEG quality
// $pdf->setJPEGQuality(75);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Image example with resizing
// $pdf->Image('images/logo3.jpeg', 5, 10, 15, 15, 'jpeg', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

$intituleCommande = $orders_info[0]["users_id"] . ' ' . $orders_info[0]["DateCommande"];
$html = '<style>
table > th {
  border-collapse:collapse;
  border : 1px solid #84ADEA;
  background-color: #84ADEA;
  color: white;
  border-radius:5px
}
hr{
  color:#84ADEA;
}
body{
  background-color:#E5E9E9;
}


</style>
<!DOCTYPE html>
<html>
  <head>
    <title>Recu de paiement</title>
  </head>
  <body >
  <table >
 <br><br>
 <br><br>

<tr style="width: 100%">
  <td style="width: 50%"><h4>BON DE COMMANDE N°' . $orders_info[0]["id"]. '</h4>
  </td>
  <td style="width: 35%"><h4> ' . $orders_info[0]["DateCommande"] . '</h4><br>
  </td>
</tr>
<tr style="width: 100%" >
  <td style="width: 35%" >Nom et prenom(s) : </td>
  <td style="width: 65%" >' . strtoupper($users_id[0]['lastname']) . ' ' . ucwords(strtolower($users_id[0]['firstname'])) . '</td>
</tr>
<tr style="width: 100%" >
  <td style="width: 35%">Telephone :</td>
  <td style="width: 65%">' .
  $users_id[0]['phone'] . '
  </td>
</tr>
<tr style="width: 100%">
  <td style="width: 35%">Quartier :</td>
  <td style="width: 65%">' .
  $users_id[0]['quartier'] . '
  </td>
</tr>
<tr style="width: 100%">
  <td style="width: 35%">Adresse de Livraison :</td>
  <td style="width: 65%">' .
  $users_id[0]['address'] . '
  </td>
</tr>
 <hr>
<table>
<thead>

  <tr style="width: 100%">
    <th style="width: 45%"><u><b>Produit</b></u></th>
    <th style="width: 15%"><u><b>Masse</b></u></th>
    <th style="width: 10%"><u><b>Qte</b></u></th>
    <th style="width: 10%">  <u><b>P.U.</b></u></th>
    <th style="width: 20%"><u><b>Montant</b></u></th>
  </tr>
</thead>
<tbody>';

if (isset($lastProducts)) {
  foreach ($lastProducts as $val) {
    if (isset($val)) {
      $allPrice = $db->getAllRecords('prix', '*', "AND statut='1'", 'ORDER BY valeur ASC');
      $condition = "";
      $condition .= "AND statut='1'";
      $condition .= "AND id='" . $val . "'";
      $product = $db->getAllRecords('products', '*', $condition, 'ORDER BY name ');
      $images = $db->getAllRecords('images', '*', $condition, 'ORDER BY id ');
      $category_id = $product[0]['categories_id'];
      $categorie = $db->getAllRecords('categories', '*', "AND id='" . $category_id . "'AND statut='1'", 'ORDER BY name ASC');
      $price_id = $product[0]['price'];
      $price = $db->getAllRecords('prix', '*', "AND id='" . $price_id . "'AND statut='1'", 'ORDER BY valeur ASC');
      $masse_id = $product[0]['mass'];
      $masse = $db->getAllRecords('masse', '*', "AND id='" . $masse_id . "'AND statut='1'", 'ORDER BY libelle ASC');
      $html .= '
                                                <tr style="width: 100%">
                                                <td style="width: 45%">' . ucfirst(strtolower($product[0]['name'])) . '</td>
                                                <td style="width: 15%"><span > <b> ' .  $masse[0]["libelle"] . ' </b></span></td>
                                                <td style="width: 10%"><span > <b> ' .  $occurence[$val] . ' </b></span></td>
                                                <td style="width: 10%"><span > ' .  $price[0]['valeur'] . ' </span></td>
                                                
                                                <td style="width: 20%">' .  $price[0]['valeur'] * $occurence[$val] . ' </td>
                                                </tr>';
      $total = $total + ($price[0]['valeur'] * $occurence[$val]);
    }
  }
}
$html .= ' </tbody>

</table><hr><br>
<table>
  <tr style="width: 100%">
                                            <td style="width: 75%"><b>Montant</b></td>
                                            <td style="width: 25%"><b>' . $total  . ' F CFA</b></td>
                                          </tr>
                                          <tr >
                                          <td><span class="title"><b>Prix de la livraison</b></span></td>';
if ($total <= 10000) {
  $prixDeLivraison = 1000;
} else {
  $prixDeLivraison = $total * 0.1;
};
$html .= '
                                          <td><span class="amount"><b>' .  $prixDeLivraison . ' F CFA</b></span></td>
                                        </tr>
                                         
                                          <tr>
                                            <td><b>Total</b></td>
                                            <td ><b>' .  $prixDeLivraison + $total . ' F CFA</b> </td>
                                          </tr>

</tbody>

</table ><center>
<table   bgcolor="grey">
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td colspan="3"><p style="font-size:8px"><b> <i> <u>Nb</u> : vérifiez  vos commandes  à la réception,aucun  retour  n\' est</i></b></p></td>
</tr>
<tr >
<td width="25%"></td>
<td width="60%"><p style="font-size:8px"><b> <i> accepté après   le  départ   du  livreur  </i></b></p></td>
<td width="15%"></td>
</tr>
<tr >
<td ></td>
<td ></td>
<td ></td>
</tr>
<tr width="100%">
<td width="30%"></td>
<td width="60%"><h5 >  MERCI POUR VOTRE CONFIANCE</h5></td>
<td width="10%"></td>
</tr>
<table>
</center>
</body>
</html>';


// var_dump($html);exit;
// $html = '
// <h1>HTML TIPS & TRICKS</h1>

// <h3>REMOVE CELL PADDING</h3>
// <pre>$pdf->SetCellPadding(0);</pre>
// This is used to remove any additional vertical space inside a single cell of text.

// <h3>REMOVE TAG TOP AND BOTTOM MARGINS</h3>
// <pre>$tagvs = array(\'p\' => array(0 => array(\'h\' => 0, \'n\' => 0), 1 => array(\'h\' => 0, \'n\' => 0)));
// $pdf->setHtmlVSpace($tagvs);</pre>
// Since the CSS margin command is not yet implemented on TCPDF, you need to set the spacing of block tags using the following method.

// <h3>SET LINE HEIGHT</h3>
// <pre>$pdf->setCellHeightRatio(1.25);</pre>
// You can use the following method to fine tune the line height (the number is a percentage relative to font height).

// <h3>CHANGE THE PIXEL CONVERSION RATIO</h3>
// <pre>$pdf->setImageScale(0.47);</pre>
// This is used to adjust the conversion ratio between pixels and document units. Increase the value to get smaller objects.<br />
// Since you are using pixel unit, this method is important to set theright zoom factor.<br /><br />
// Suppose that you want to print a web page larger 1024 pixels to fill all the available page width.<br />
// An A4 page is larger 210mm equivalent to 8.268 inches, if you subtract 13mm (0.512") of margins for each side, the remaining space is 184mm (7.244 inches).<br />
// The default resolution for a PDF document is 300 DPI (dots per inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum number of points you can print at 300 DPI for the given width).<br />
// The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots<br />
// If the web page is larger 1280 pixels, on the same A4 page the conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots';

$style = array(
  'border' => true,
  'vpadding' => 'auto',
  'hpadding' => 'auto',
  'fgcolor' => array(0, 0, 0),
  'bgcolor' => false, //array(255,255,255)
  'module_width' => 1, // width of a single module in points
  'module_height' => 1 // height of a single module in points
);
$lienCommande = PATH . 'tcpdf/source/printrecu.php?orders_id=' . $orders_id;
$pdf->write2DBarcode($lienCommande, 'QRCODE,M', 58, 120, 12, 12, $style, 'N');
$pdf->Text(25, 3, '');
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
// $pdf->Output('Commande_' . $intituleCommande . '.pdf', 'D');
$pdf->Output('Commande_' . $intituleCommande . '.pdf', 'I');
// header('location:'.PATH);
// echo'<script>window.open("localhost/bsshop")</script>';
//============================================================+
// END OF FILE
//============================================================+
