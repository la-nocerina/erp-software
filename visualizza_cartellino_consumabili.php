<?php

if( empty($_GET['id']) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$giacenza = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['id']);

if(!$giacenza){
    exit('accesso ad area assente');
}

$prodotto = DAOFactory::getProdottiDAO()->load($giacenza->idProdotto);


require_once 'common/tcpdf/config/lang/ita.php';
require_once 'common/tcpdf/tcpdf.php';
$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(5, 10, 5);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setLanguageArray($l);
$pdf->setFontSubsetting(false);
$pdf->SetFont('helvetica', '', 14, '', false);
$pdf->AddPage();

$html="<table width=\"100%\">
  <tr>
    <td>Codice: $prodotto->codiceInterno </td>
    <td>Descrizione: $prodotto->descrizione </td>
  </tr>
  <tr>
    <td colspan=\"2\">";

include 'common/Image_Barcode-1.1.1/Image/Barcode/ean13.php';
$bc_gen = new Image_Barcode_ean13();
$code = str_pad($giacenza->idProdottoInGiacenza, 12, "0", STR_PAD_LEFT);
$img = $bc_gen->draw($code);
$name_img = uniqid('barcode_').'.png';
imagepng($img, $name_img);

$html .="&nbsp;<br/>&nbsp; <img src=\"$name_img\" height=\"80\" width=\"200\"/>";
    
$html.= "</td>
  </tr>
</table>";

$pdf->writeHTML($html);

$pdf->Output('cartellino_consumabili.pdf', 'I');
?>
