<?php
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

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

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
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style

$html = '<div class="container" style="border: 1px solid black;">
    <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 30%;"></td>
        <td style="width: 70%;">
          <div>
            <b>
              <span>ARRETE N°______________________/MCLU/DGUF/DDU/«op_cod»/NAF</span><br>
              <span>accordant à «lib_sexe» «nom», «adresse», la Concession Définitive «dulot» «num_lot» «lot» de l’îlot n° «ilot», d’une superficie de «super» m², du lotissement « «lotis» », Commune «lib_com», objet du Titre Foncier                        n° «titre» de la Circonscription Foncière «lib_cir».</span>
            </b>
          </div> 
        </td>
      </tr>
    </table>
    <br>
    <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span></span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span><b>LE MINISTRE DE LA CONSTRUCTION, DU LOGEMENT ET DE L’URBANISME</b></span>
              </div>
              <br>
              <br>
          </div>
        </td>
      </tr>

      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret-loi du 26 juillet 1932 portant réorganisation du régime de la propriété foncière en Afrique Occidentale Française ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>la Loi n° 62-253 du 31 juillet 1962 relative aux plans d’urbanisme ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>la Loi n°71-340 du 12 juillet 1971 réglementant la mise en valeur des terrains urbains détenus en pleine propriété ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>l’Ordonnance n° 2013-481 du 02 juillet 2013 fixant les règles d’acquisition de la propriété des terrains urbains ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°71-341 du 12 juillet 1971 fixant les modalités d’application de la loi n°71-340 du 12 juillet 1971 réglementant la mise en valeur des terrains urbains détenus en pleine propriété ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°2013-482 du 02 juillet 2013 relatif aux modalités d’application de l’Ordonnance fixant les règles d’acquisition de la propriété des terrains urbains ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°2017-155 du 1er mars 2017 portant organisation du Ministère de la Construction, du Logement, de l’Assainissement et de l’Urbanisme ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°2018-618 du 10 juillet 2018 portant nomination des Membres du Gouvernement;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n° 2018-648 du 1er août 2018 portant attributions des membres du Gouvernement;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>l’Arrêté n° 2164 du 9 juillet 1936 modifié par l\'Arrêté n° 83 du 31 janvier 1938, réglementant  l’aliénation des terrains domaniaux ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>«art_acte»«lib_acte» n° «numlet» du «date_lettre», établie au profit de «lib_sexe» «nom» sur «lelot» «num_lot» «lot» de l’îlot n° «ilot» du lotissement « «lotis» », Commune «lib_com» ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>la demande «nb_interet» en date du «inte» sollicitant un Arrêté de Concession Définitive, enregistrée au Service du Guichet Unique du Foncier et de l’Habitat sous le          n° «numgu» du «dategu» ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>«art_piece» «lib_piece» de «lib_sexe» «nom», délivré(e) le «etablie» sous le n° «numcarte» ;</span>
              </div>
              <br><br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le procès-verbal du «datepv» de la commission de fixation des prix de cession des terrains du lotissement « «lotis» », Commune «lib_com» ; </span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le plan du Titre Foncier n° «titre» de la Circonscription Foncière «lib_cir», délivré le «dateti» par le Géomètre Assermenté du Cadastre ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
    </table>
    
      <br>
      <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 100%;">
          <div>
            <p><b>Sur proposition du Directeur du Domaine Urbain,</b></p>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="container" style="border: 1px solid black;">
    <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 100%;">
          <div style="width: 100%">
          <!-- header -->
            <div> <center>
                <h2 style="color: black;letter-spacing: 8px;"><b><u>ARRETE</u></b></h2>
            </center></div>
            <!-- articles -->
            <div>
              <p>
                <span><b><u>Article 1er</u></b></span> : Il est concédé à titre définitif à «lib_sexe» «nom» la propriété «dulot» «lot_num» «lotlet» («lot») de l’îlot numéro «ilotlet» («ilot») du lotissement « «lotis» », Commune «lib_com», d’une superficie de «superlet» («super») mètres carrés, «lot_immatricule» au nom de l’Etat sous le numéro «titrelet» («titre») de la Circonscription Foncière «lib_cir».
              </p>

              <p>
                <span><b><u>Article 2</u></b></span> : La Concession Définitive, objet du Titre Foncier n° «titre» «lib_cir», accordée à «lib_sexe» «nom» suivant Arrêté  n°_________________________/MCLU/DGUF/DDU/«op_cod»/«op_acp», est frappée, à compter de la date de signature, des clauses restrictives suivantes : 
                <br>
                <span>1°) commencer les travaux de construction dans un délai de douze (12) mois ;</span>
                <br>
                <span>2°) réaliser entièrement la mise en valeur «du_terrain» en cause par l\'édification de bâtiments en matériaux définitifs à usage «type» dans un délai de cinq (05) ans.</span>
                <br>
                <span>L\'édification des bâtiments sur «le_terrain» «lot_concerne» est subordonnée à l’obtention d’un Permis de Construire délivré dans les conditions fixées par la Loi n° 97-523 du 04 septembre 1997 modifiant et complétant la Loi n° 65-248 du 04 août 1965 et le Décret n° 92-398 du 01 juillet 1992 portant réglementation du Permis de Construire.</span>
              </p>

              <p>
                <span><b><u>Article 3</u></b> : La propriété «dulot» «num_lot» «lot» de l’îlot n° «ilot» du lotissement « «lotis» », Commune «lib_com», est accordée moyennant un prix de «PAYELET» («PAYE1») Francs CFA, sur la base de «prixlet» («prix») Francs CFA le mètre carré.</span>
              </p>

              <p>
                <span><b><u>Article 4</u></b> : «nb_concessionnaire» «nb_acquit» des frais d\'immatriculation et de la taxe de la publicité foncière sur la base de la valeur vénale «du_terrain» avant le retrait du présent Arrêté.</span>
              </p>

              <p>
                <span><b><u>Article 5</u></b> : Dans le cas de reprise amiable ou forcée de tout ou partie «du_terrain» pour cause d\'utilité publique, défaut de mise en valeur ou insuffisance de mise en valeur, la valeur de «celui_ci» sera calculée sur la base des versements effectués au jour de la reprise.
                  <p>
              
                Cette disposition au droit de concession sera inscrite au tableau B de la Section III du Titre Foncier et de sa copie.</p>
              </span>
              </p>

              <p>
                <span><b><u>Article 6</u></b> : Le Directeur du Domaine Urbain, le Directeur du Domaine de la Conservation Foncière, de l’Enregistrement et du Timbre et le Directeur du Cadastre sont chargés, chacun en ce qui le concerne, de l’exécution du présent Arrêté qui sera enregistré, publié au Journal Officiel de la République de Côte d’Ivoire et communiqué partout où besoin sera. /-</span>
              </p>

            </div>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;">
          <div style="width: 100%"><br>
              <div style="width: 60%;float: left;">
                <p><b><u>Ampliations</u> :</b></p>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Cabinet MCLU</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">J.O</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Intéressé(e)</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">D.D.C.F.E.T</div>
                  <div style="width: 75%;float: right;">2</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Chrono/DDU</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">D. Cad</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Dossier</div>
                  <div style="width: 75%;float: right;">3</div>
                </div>
              </div> 
              <div style="width: 40%;float: right;">
                <p>Abidjan, le </p>
                <br><br><br><br><br><br><br><br>
                <p><b>«nomministre»</b></p>
              </div>
              <br>
          </div>
        </td>
      </tr>
    </table>
  </div>';
// $html = <<<EOF
// <!-- EXAMPLE OF CSS STYLE -->
// <style>
// 	h1 {
// 		color: navy;
// 		font-family: times;
// 		font-size: 24pt;
// 		text-decoration: underline;
// 	}
// 	p.first {
// 		color: #003300;
// 		font-family: helvetica;
// 		font-size: 12pt;
// 	}
// 	p.first span {
// 		color: #006600;
// 		font-style: italic;
// 	}
// 	p#second {
// 		color: rgb(00,63,127);
// 		font-family: times;
// 		font-size: 12pt;
// 		text-align: justify;
// 	}
// 	p#second > span {
// 		background-color: #FFFFAA;
// 	}
// 	table.first {
// 		color: #003300;
// 		font-family: helvetica;
// 		font-size: 8pt;
// 		border-left: 3px solid red;
// 		border-right: 3px solid #FF00FF;
// 		border-top: 3px solid green;
// 		border-bottom: 3px solid blue;
// 		background-color: #ccffcc;
// 	}
// 	td {
// 		border: 2px solid blue;
// 		background-color: #ffffee;
// 	}
// 	td.second {
// 		border: 2px dashed green;
// 	}
// 	div.test {
// 		color: #CC0000;
// 		background-color: #FFFF66;
// 		font-family: helvetica;
// 		font-size: 10pt;
// 		border-style: solid solid solid solid;
// 		border-width: 2px 2px 2px 2px;
// 		border-color: green #FF00FF blue red;
// 		text-align: center;
// 	}
// 	.lowercase {
// 		text-transform: lowercase;
// 	}
// 	.uppercase {
// 		text-transform: uppercase;
// 	}
// 	.capitalize {
// 		text-transform: capitalize;
// 	}
// </style>

// <h1 class="title">Example of <i style="color:#990000">XHTML + CSS</i></h1>

// <p class="first">Example of paragraph with class selector. <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.</span></p>

// <p id="second">Example of paragraph with ID selector. <span>Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.</span></p>

// <div class="test">example of DIV with border and fill.
// <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit.
// <br /><span class="lowercase">text-transform <b>LOWERCASE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
// <br /><span class="uppercase">text-transform <b>uppercase</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
// <br /><span class="capitalize">text-transform <b>cAPITALIZE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
// </div>

// <br />

// <table class="first" cellpadding="4" cellspacing="6">
//  <tr>
//   <td width="30" align="center"><b>No.</b></td>
//   <td width="140" align="center" bgcolor="#FFFF00"><b>XXXX</b></td>
//   <td width="140" align="center"><b>XXXX</b></td>
//   <td width="80" align="center"> <b>XXXX</b></td>
//   <td width="80" align="center"><b>XXXX</b></td>
//   <td width="45" align="center"><b>XXXX</b></td>
//  </tr>
//  <tr>
//   <td width="30" align="center">1.</td>
//   <td width="140" rowspan="6" class="second">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
//   <td width="140">XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td width="80">XXXX</td>
//   <td align="center" width="45">XXXX<br />XXXX</td>
//  </tr>
//  <tr>
//   <td width="30" align="center" rowspan="3">2.</td>
//   <td width="140" rowspan="3">XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td align="center" width="45">XXXX<br />XXXX</td>
//  </tr>
//  <tr>
//   <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td align="center" width="45">XXXX<br />XXXX</td>
//  </tr>
//  <tr>
//   <td width="80" rowspan="2" >XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td align="center" width="45">XXXX<br />XXXX</td>
//  </tr>
//  <tr>
//   <td width="30" align="center">3.</td>
//   <td width="140">XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td align="center" width="45">XXXX<br />XXXX</td>
//  </tr>
//  <tr bgcolor="#FFFF80">
//   <td width="30" align="center">4.</td>
//   <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td width="80">XXXX<br />XXXX</td>
//   <td align="center" width="45">XXXX<br />XXXX</td>
//  </tr>
// </table>
// EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// add a page
$pdf->AddPage();

$html = '<div class="container" style="border: 1px solid black;">
    <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 30%;"></td>
        <td style="width: 70%;">
          <div>
            <b>
              <span>ARRETE N°______________________/MCLU/DGUF/DDU/«op_cod»/NAF</span><br>
              <span>accordant à «lib_sexe» «nom», «adresse», la Concession Définitive «dulot» «num_lot» «lot» de l’îlot n° «ilot», d’une superficie de «super» m², du lotissement « «lotis» », Commune «lib_com», objet du Titre Foncier                        n° «titre» de la Circonscription Foncière «lib_cir».</span>
            </b>
          </div> 
        </td>
      </tr>
    </table>
    <br>
    <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span></span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span><b>LE MINISTRE DE LA CONSTRUCTION, DU LOGEMENT ET DE L’URBANISME</b></span>
              </div>
              <br>
              <br>
          </div>
        </td>
      </tr>

      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret-loi du 26 juillet 1932 portant réorganisation du régime de la propriété foncière en Afrique Occidentale Française ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>la Loi n° 62-253 du 31 juillet 1962 relative aux plans d’urbanisme ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>la Loi n°71-340 du 12 juillet 1971 réglementant la mise en valeur des terrains urbains détenus en pleine propriété ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>l’Ordonnance n° 2013-481 du 02 juillet 2013 fixant les règles d’acquisition de la propriété des terrains urbains ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°71-341 du 12 juillet 1971 fixant les modalités d’application de la loi n°71-340 du 12 juillet 1971 réglementant la mise en valeur des terrains urbains détenus en pleine propriété ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°2013-482 du 02 juillet 2013 relatif aux modalités d’application de l’Ordonnance fixant les règles d’acquisition de la propriété des terrains urbains ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°2017-155 du 1er mars 2017 portant organisation du Ministère de la Construction, du Logement, de l’Assainissement et de l’Urbanisme ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n°2018-618 du 10 juillet 2018 portant nomination des Membres du Gouvernement;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le Décret n° 2018-648 du 1er août 2018 portant attributions des membres du Gouvernement;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>l’Arrêté n° 2164 du 9 juillet 1936 modifié par l\'Arrêté n° 83 du 31 janvier 1938, réglementant  l’aliénation des terrains domaniaux ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>«art_acte»«lib_acte» n° «numlet» du «date_lettre», établie au profit de «lib_sexe» «nom» sur «lelot» «num_lot» «lot» de l’îlot n° «ilot» du lotissement « «lotis» », Commune «lib_com» ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>la demande «nb_interet» en date du «inte» sollicitant un Arrêté de Concession Définitive, enregistrée au Service du Guichet Unique du Foncier et de l’Habitat sous le          n° «numgu» du «dategu» ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>«art_piece» «lib_piece» de «lib_sexe» «nom», délivré(e) le «etablie» sous le n° «numcarte» ;</span>
              </div>
              <br><br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le procès-verbal du «datepv» de la commission de fixation des prix de cession des terrains du lotissement « «lotis» », Commune «lib_com» ; </span>
              </div>
              <br>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;padding:5px 0px;">
          <div style="width: 100%">
              <div style="width: 5%;float: left;">
                  <span>Vu</span>
              </div> 
              <div style="width: 95%;float: right;">
                  <span>le plan du Titre Foncier n° «titre» de la Circonscription Foncière «lib_cir», délivré le «dateti» par le Géomètre Assermenté du Cadastre ;</span>
              </div>
              <br>
          </div>
        </td>
      </tr>
    </table>
    
      <br>
      <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 100%;">
          <div>
            <p><b>Sur proposition du Directeur du Domaine Urbain,</b></p>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="container" style="border: 1px solid black;">
    <table style="width:100%;">
      <tr style="width: 100%">
        <td style="width: 100%;">
          <div style="width: 100%">
          <!-- header -->
            <div> <center>
                <h2 style="color: black;letter-spacing: 8px;"><b><u>ARRETE</u></b></h2>
            </center></div>
            <!-- articles -->
            <div>
              <p>
                <span><b><u>Article 1er</u></b></span> : Il est concédé à titre définitif à «lib_sexe» «nom» la propriété «dulot» «lot_num» «lotlet» («lot») de l’îlot numéro «ilotlet» («ilot») du lotissement « «lotis» », Commune «lib_com», d’une superficie de «superlet» («super») mètres carrés, «lot_immatricule» au nom de l’Etat sous le numéro «titrelet» («titre») de la Circonscription Foncière «lib_cir».
              </p>

              <p>
                <span><b><u>Article 2</u></b></span> : La Concession Définitive, objet du Titre Foncier n° «titre» «lib_cir», accordée à «lib_sexe» «nom» suivant Arrêté  n°_________________________/MCLU/DGUF/DDU/«op_cod»/«op_acp», est frappée, à compter de la date de signature, des clauses restrictives suivantes : 
                <br>
                <span>1°) commencer les travaux de construction dans un délai de douze (12) mois ;</span>
                <br>
                <span>2°) réaliser entièrement la mise en valeur «du_terrain» en cause par l\'édification de bâtiments en matériaux définitifs à usage «type» dans un délai de cinq (05) ans.</span>
                <br>
                <span>L\'édification des bâtiments sur «le_terrain» «lot_concerne» est subordonnée à l’obtention d’un Permis de Construire délivré dans les conditions fixées par la Loi n° 97-523 du 04 septembre 1997 modifiant et complétant la Loi n° 65-248 du 04 août 1965 et le Décret n° 92-398 du 01 juillet 1992 portant réglementation du Permis de Construire.</span>
              </p>

              <p>
                <span><b><u>Article 3</u></b> : La propriété «dulot» «num_lot» «lot» de l’îlot n° «ilot» du lotissement « «lotis» », Commune «lib_com», est accordée moyennant un prix de «PAYELET» («PAYE1») Francs CFA, sur la base de «prixlet» («prix») Francs CFA le mètre carré.</span>
              </p>

              <p>
                <span><b><u>Article 4</u></b> : «nb_concessionnaire» «nb_acquit» des frais d\'immatriculation et de la taxe de la publicité foncière sur la base de la valeur vénale «du_terrain» avant le retrait du présent Arrêté.</span>
              </p>

              <p>
                <span><b><u>Article 5</u></b> : Dans le cas de reprise amiable ou forcée de tout ou partie «du_terrain» pour cause d\'utilité publique, défaut de mise en valeur ou insuffisance de mise en valeur, la valeur de «celui_ci» sera calculée sur la base des versements effectués au jour de la reprise.
                  <p>
              
                Cette disposition au droit de concession sera inscrite au tableau B de la Section III du Titre Foncier et de sa copie.</p>
              </span>
              </p>

              <p>
                <span><b><u>Article 6</u></b> : Le Directeur du Domaine Urbain, le Directeur du Domaine de la Conservation Foncière, de l’Enregistrement et du Timbre et le Directeur du Cadastre sont chargés, chacun en ce qui le concerne, de l’exécution du présent Arrêté qui sera enregistré, publié au Journal Officiel de la République de Côte d’Ivoire et communiqué partout où besoin sera. /-</span>
              </p>

            </div>
          </div>
        </td>
      </tr>
      <tr style="width: 100%">
        <td style="width: 95%;">
          <div style="width: 100%"><br>
              <div style="width: 60%;float: left;">
                <p><b><u>Ampliations</u> :</b></p>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Cabinet MCLU</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">J.O</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Intéressé(e)</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">D.D.C.F.E.T</div>
                  <div style="width: 75%;float: right;">2</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Chrono/DDU</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">D. Cad</div>
                  <div style="width: 75%;float: right;">1</div>
                </div>
                <div style="width: 100%;">
                  <div style="width: 25%;float: left;">Dossier</div>
                  <div style="width: 75%;float: right;">3</div>
                </div>
              </div> 
              <div style="width: 40%;float: right;">
                <p>Abidjan, le </p>
                <br><br><br><br><br><br><br><br>
                <p><b>«nomministre»</b></p>
              </div>
              <br>
          </div>
        </td>
      </tr>
    </table>
  </div>';
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
  'fgcolor' => array(0,0,0),
  'bgcolor' => false, //array(255,255,255)
  'module_width' => 1, // width of a single module in points
  'module_height' => 1 // height of a single module in points
);
$pdf->write2DBarcode('www.tcpdf.org', 'PDF417', 80, 90, 0, 30, $style, 'N');
$pdf->Text(80, 85, 'PDF417 (ISO/IEC 15438:2006)');
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
