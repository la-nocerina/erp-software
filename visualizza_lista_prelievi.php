<?php

include 'common/generated/include_dao.php';

$prelievi = DAOFactory::getPrelievoLastreDAO()->queryByData($_GET['data']);


require_once 'common/tcpdf/config/lang/ita.php';
require_once 'common/tcpdf/tcpdf.php';
$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(5, 10, 5);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setLanguageArray($l);
$pdf->setFontSubsetting(false);
$pdf->SetFont('helvetica', '', 12, '', false);
$pdf->AddPage();


$html = '';
$html.="<p>LN LA NOCERINA S.R.L.</p>
<p>MOD. 422 - LISTA PRELIEVO LASTRE - REV.0</p>
<table border=\"1\">
    <tr>
        <th>CLIENTE</th>
        <th>NOME LAVORO</th>
        <th>N°<br/>LASTRE</th>
        <th>COLORI</th>
        <th>FIRMA</th>
    </tr>";

$prelievo = new PrelievoLastre();
for($i=0; $i<count($prelievi); $i++){
    $prelievo = $prelievi[$i];
    $html.= "<tr>
            <td>$prelievo->idPartner</td>
            <td>$prelievo->nomeLavoro</td>
            <td>$prelievo->numLastre</td>
            <td>$prelievo->colori</td>
            <td>$prelievo->firma</td>
        </tr>";
}

$righe_mancanti = 24-count($prelievi);
if($righe_mancanti<0){
    $righe_mancanti=0;
}
for($i=0; $i<$righe_mancanti; $i++){
    $html.= "<tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>";
}
    
$html.="</table>";

$html.="<table border=\"1\">
            <tr>
                <td>Data {$_GET['data']}</td>
                <td>Firma Fotoincisione</td></tr>
        </table>";

$pdf->writeHTML($html);
$pdf->Output("lista_prelievo_lastre.pdf", 'I');
?>

