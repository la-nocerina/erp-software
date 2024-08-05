<?php

include 'common/generated/include_dao.php';

$depositi = DAOFactory::getDepositoLastreDAO()->queryByData($_GET['data']);


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
<p>MOD. 422 - LISTA DEPOSITO LASTRE - REV.0</p>
<table border=\"1\">
    <tr>
        <th>CLIENTE</th>
        <th>NOME LAVORO</th>
        <th>N°<br/>LASTRE</th>
        <th>COLORI</th>
        <th>FIRMA</th>
        <th>LASTRA<br/>DA<br/>RIFARE</th>
    </tr>";

$deposito = new DepositoLastre();
for($i=0; $i<count($depositi); $i++){
    $deposito = $depositi[$i];
    $html.= "<tr>
            <td>$deposito->idPartner</td>
            <td>$deposito->nomeLavoro</td>
            <td>$deposito->numLastre</td>
            <td>$deposito->colori</td>
            <td>$deposito->firma</td>
            <td>$deposito->daRifare</td>
        </tr>";

}

$righe_mancanti = 24-count($depositi);
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

