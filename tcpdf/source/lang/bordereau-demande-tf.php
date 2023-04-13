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
    $row    =   $db->getAllRecords('acd','*',' AND statut_ad="5" AND print="'.$_REQUEST['print'].'"');
    $condition = "";
    $minData   =   $db->getAllRecords('ministere','*',$condition,'ORDER BY num_min DESC');
    $datas = array();

    $nbRow = count($row);

    if($nbRow > 0){
      foreach ($row as $k) {
        $commune   =   $db->getAllRecords('commune','*',' AND code_com = "'.$k['code_com'].'"','ORDER BY code_com DESC');
        $k['commune'] = $commune[0]['lib_com'];
        $datas[] = $k;
      }
    }

    
}

$s  = '<table cellpadding="4" cellspacing="0" border="1">
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

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}

$pdf->SetFont('helvetica', '', 10);
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
    <h2 style="color: black;font-size:12px;">Bordereau d'envoi de Correspondances de Demande de TF N°__________/MCLAU/DGUF/DGUFH/{$op_centre}/ <span style="padding: 15px;font-size: 10px;">{$op_code}</span></h2>
  </center>
  </td>
 </tr>
</table>
{$s}
<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="100%">
    <b><h5 style="color: black;font-weight: bold;font-size:13px;">NB : <span style="margin-left: 20px;">{$nbRow} Correspondances de Demande de TF adressés au Directeur du Domaine Urbain</span></h5></b>
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

$pdf->Output('Bordereau-demande-tf.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
