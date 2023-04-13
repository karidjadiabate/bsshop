<?php
session_start();
include_once('../../assets/database/config.php');
include_once('../../assets/database/connected.php');

$ministere = $db->getAllRecords('ministere','*',' ORDER BY num_min DESC LIMIT 0,1');
$ministere = $ministere[0];
$op_code = $_SESSION['user']['code'];
$op_centre = $_SESSION['user']['centre'];
$date = date('d/m/Y'); 

$nbRow = 0;
if(isset($_REQUEST['print']) and $_REQUEST['print']!=""){
    $row    =   $db->getAllRecords('acd','*',' AND print="'.$_REQUEST['print'].'"');
    $condition = "";
    $minData   =   $db->getAllRecords('ministere','*',$condition,'ORDER BY num_min DESC');
    $datas = array();

    $nbRow = count($row);

    foreach ($row as $k) {
      $commune   =   $db->getAllRecords('commune','*',' AND code_com = "'.$k['code_com'].'"','ORDER BY code_com DESC');
      $k['commune'] = isset($commune[0]['lib_com']) ? $commune[0]['lib_com'] : '';
      $datas[] = $k;
    }
}

$s  =   '<table cellpadding="4" cellspacing="0" border="1">
           <tr>
            <td width="5%;" align="center" >N°</td>
            <td width="20%;" align="center">N° GUFH</td>
            <td width="15%;" align="center">ILOT</td>
            <td width="15%;" align="center">LOT(S)</td>
            <td width="25%;" align="center">LOTISSEMENT(S)</td>
            <td width="20%;" align="center">COMMUNE(S)</td>
           </tr>';
$nb = count($datas);
$i=0;
foreach($datas as $val){
  $i++;
  $s .='<tr>
    <td>'.$i.'</td>
    <td>'.$val["numgu"].'</td>
    <td>'.$val["ilot"].'</td>
    <td>'.$val["lot"].'</td>
    <td>'.$val["lotis"].'</td>
    <td>'.$val["commune"].'</td>
  </tr>';
}

$s .='</table>';

require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 061');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage('Landscape');


$html = <<<EOF

<style>
  body{
        color: black !important;
      }
</style>

<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="50%" align="center">
    <center>
    <span>MINISTERE DE LA CONSTRUCTION, <br> ET DE L’URBANISME</span><br/>
    <span>DIRECTION GENERALE <br>DE L’URBANISME ET DU FONCIER</span><br/>
    <span>DIRECTION DU DOMAINE URBAIN</span><br>
    <span>LE DIRECTEUR</span>
  </center>
  </td>
  <td width="20%" align="center"></td>
  <td width="30%" align="center">
    <span><b>République de Côte d'Ivoire</b></span><br/>
  <span style="">Union - Discipline - Travail</span>
  <br><br>
  <span style="">Abidjan, le {$date}</span>
  </td>
 </tr>
</table>
<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="100%" align="center">
    <center>
    <h2 style="color: black;font-size:13px;">Bordereau d'envoi des attestations domaniales N°__________/MCLAU/DGUF/DGUFH/{$op_centre}/ <span style="padding: 15px;font-size: 10px;">{$op_code}</span></h2>
  </center>
  </td>
 </tr>
</table>
{$s}
<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="100%">
    <b><h5 style="color: black;font-weight: bold;font-size:13px;">NB : <span style="margin-left: 20px;">{$nbRow} Projets AD adressés au Directeur du Domaine Urbain</span></h5></b>
  </td>
 </tr>
</table>
<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="100%" align="right">
    <p><b>Le Sous-Directeur</b></p>
  </td>
 </tr>
</table>
EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// // add a page
// $pdf->AddPage();

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

// // output the HTML content
// $pdf->writeHTML($html, true, false, true, false, '');

// // reset pointer to the last page
// $pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Bordereau-projet-ad.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
