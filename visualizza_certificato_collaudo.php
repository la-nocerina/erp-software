<?php
if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}


require_once 'common/tcpdf/config/lang/ita.php';
require_once 'common/tcpdf/tcpdf.php';

// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A5', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 054');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 054', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(5, 10, 5);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 8, '', false);

// add a page
$pdf->AddPage();


$html ='
    <H1>LN  LA NOCERINA S.R.L.</H1>
    <p>MOD. 26 - CERTIFICATO DI COLLAUDO - REV.1</p>';

include 'common/generated/include_dao.php';
$certificato = DAOFactory::getCertificatiCollaudoDAO()->load($_GET['id']);
if(! $certificato){
    exit('accesso in modo non consentito');
}
$cliente = DAOFactory::getPartnerDAO()->load($certificato->idPartner);
$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($certificato->idProdottoInGiacenza);

$classificazione = explode('|', $certificato->classificazione);
$checked1 = $checked2 = $checked3 = '';
$colored1 = $colored2 = $colored3 = '';
if( in_array('1', $classificazione)){ $checked1 = 'X'; $colored1=' style="background-color:green" ';}
if( in_array('2', $classificazione)){ $checked2 = 'X'; $colored2=' style="background-color:blue" ';}
if( in_array('3', $classificazione)){ $checked3 = 'X'; $colored3=' style="background-color:red" ';}

$html.= "
<table width=\"100%\" border=\"1\">
  <tr>
    <td colspan=\"3\">CLIENTE: $cliente->ragioneSociale </td>
    <td colspan=\"2\">[ $checked1 ] <span $colored1 >CONFORME (VERDE)</span><br/>
        [ $checked2 ] <span $colored2 >DECLASSATO (BLU)</span><br/>
        [ $checked3 ] <span $colored3 >NON CONFORME (ROSSO)</span>
      </td>
  </tr>
  <tr>
    <td colspan=\"2\">D.D.T. N° <br/> $certificato->ddtN </td>
    <td>DEL <br/> $certificato->del </td>
    <td>COLLI N° <br/> $certificato->numColli </td>
    <td>KG.<br/> $certificato->kg </td>
  </tr>
  <tr>";

$band_st = $band_crom = $allum = $altro = '';
switch($certificato->materiale){
    case '1': $band_st=' X '; break;
    case '2': $band_crom=' X '; break;
    case '3': $allum=' X '; break;
    case '4': $altro=' X '; break;

}

$html.= "<td rowspan=\"2\">MATERIALE <br/>
[ $band_st ] BANDA STAGN.<br/>
[ $band_crom ] BANDA CROM.<br/>
[ $allum ] ALLUMINIO<br/>
[ $altro ] ALTRO
</td>
    <td colspan=\"2\">FORMATO <br/> $certificato->formato </td>
    <td>TEMPRA <br/> $certificato->tempra </td>
    <td>SPESSORE <br/> $certificato->spessore </td>
  </tr>
  <tr>
    <td>N°PACCO FERRIERA <br/> $certificato->numPaccoFerriera </td>
    <td>COMM. N° <br/> $certificato->commN </td>
    <td>COLL. N° <br/> $certificato->collN </td>
    <td>PACCO N° <br/> $certificato->paccoN </td>
  </tr>
  <tr>
    <td colspan=\"5\">BOZZETTO: <br/> $certificato->bozzetto </td>
  </tr>
  </table>";


$lavorazioni = explode('|', $certificato->lavorazioni);
$da_stampare = array(' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ');
for($i=1; $i<=16; $i++){
    if(in_array($i, $lavorazioni)){
        $da_stampare[$i] = 'X';
    }
}

$html.="<table width=\"100%\" border=\"1\">";

$html.= "<tr>
    <td colspan=\"2\">VERNICIATURA INTERNA <br/>";

     $html .= "ANCORANTE 1 [ {$da_stampare[9]} ]<br/>";
     $html .= "ANCORANTE 2 [ {$da_stampare[11]} ]<br/>";
     $html .= "ORGANOSOL [ {$da_stampare[15]} ]<br/>";
     $html .= "DORE' 1 [ {$da_stampare[1]} ]<br/>";
     $html .= "DORE' 2 [ {$da_stampare[2]} ]<br/>";
     $html .= "DORE' CON PASTA [ {$da_stampare[3]} ]<br/>";
     $html .= "SMALTO 1 [ {$da_stampare[7]} ]<br/>";
     $html .= "SMALTO 2 [ {$da_stampare[8]} ]<br/>";
     $html .= "ALLUMINIO [ {$da_stampare[13]} ]<br/>";
     $html .= "SGRASSAGGIO [ {$da_stampare[16]} ]<br/>";
     $html .= "ALTRO [ ]";
    $html .= "</td>
        <td colspan=\"2\">VERNICIATURA ESTERNA <br/> ";


    $html .= "SMALTO [ {$da_stampare[6]} ]<br/>";
    $html .= "DORE' [ {$da_stampare[4]} ]<br/>";
    $html .= "ANCORANTE [ {$da_stampare[10]} ]<br/>";
    $html .= "DORE' A FINIRE [ {$da_stampare[12]} ]<br/>";
    $html .= "TRASPARENTE [ {$da_stampare[5]} ]<br/>";
    $html .= "ALLUMINIO [ {$da_stampare[14]} ]<br/>";
    $html .= "ALTRO [ ]";

    $html .= '</td></tr>';
    
    $html.='<tr>
    <td colspan="4">STAMPA <br/>';

    $html .= '1 COLORE '; if( $certificato->numStampe==1){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '2 COLORI '; if( $certificato->numStampe==2){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '3 COLORI '; if( $certificato->numStampe==3){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '4 COLORI '; if( $certificato->numStampe==4){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '5 COLORI '; if( $certificato->numStampe==5){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '6 COLORI '; if( $certificato->numStampe==6){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '7 COLORI '; if( $certificato->numStampe==7){ $html.='[ X ]';}else{$html.='[ ]';}

    $html .= "</td>
  </tr>
  <tr>
    <td width=\"25%\">FOGLI <br/> $prodotto_giac->quantita </td>
    <td width=\"25%\">&nbsp;</td>
    <td width=\"25%\">DATA <br/> $certificato->data </td>
    <td width=\"25%\">VERIFICATORE <br/> $certificato->verificatore </td>
  </tr>
  <tr>
    <td colspan=\"4\">DA RESTITUIRE IN CASO DI CONTESTAZIONE <br/> $certificato->contestazione </td>
  </tr>
  <tr>
    <td colspan=\"4\">NOTE <br/> $certificato->note </td>
  </tr>
  <tr>
    <td colspan=\"4\">Codice univoco (BarCode) <br/>";

include 'common/Image_Barcode-1.1.1/Image/Barcode/ean13.php';
$bc_gen = new Image_Barcode_ean13();
$code = str_pad($certificato->idProdottoInGiacenza, 12, "0", STR_PAD_LEFT);
$img = $bc_gen->draw($code);
$name_img = uniqid('barcode_').'.png';
imagepng($img, $name_img);

$html .="&nbsp;<img src=\"$name_img\" height=\"40\" width=\"100\"/>";

$html.="</td></tr>";
$html.="</table>";


// output the HTML content
//$pdf->writeHTML($html, true, 0, true, 0);
$pdf->writeHTML($html);

unlink($name_img);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('certificato_collaudo.pdf', 'I');

//header('Content-type: application/pdf');
//header('Content-Disposition: attachment; filename="certificato.pdf"');
//echo $html;
/*
// We'll be outputting a PDF
header('Content-type: application/pdf');
// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="certificato.pdf"');
// The PDF source is in original.pdf
readfile('certificato_di_collaudo.pdf');
*/
?>