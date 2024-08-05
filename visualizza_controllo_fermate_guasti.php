<?php
if( empty($_GET['id']) ){
    exit("accesso ad area in modo non consentito");
}

include 'common/generated/include_dao.php';
include 'cause_fermate_guasti.php';
$modulo_fermate_guasti =DAOFactory::getFermateGuastiDAO()->load($_GET['id']);
if(!$modulo_fermate_guasti){
    exit('accesso ad area assente');
}



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
$pdf->SetFont('helvetica', '', 7, '', false);
$pdf->AddPage();


$html='';

$html.="<table width=\"100%\" border=\"1\">
  <tr>
    <td>Linea n°: $modulo_fermate_guasti->linea </td>
    <td>Data: $modulo_fermate_guasti->data </td>
    <td>Standard: $modulo_fermate_guasti->standard </td>
    <td>Operatore: $modulo_fermate_guasti->operatore </td>";


$matt=$pom=$nott=$interm='';
switch ($modulo_fermate_guasti->turno){
    case 'M': $matt='[x]';break;
    case 'P': $pom='[x]';break;
    case 'N': $nott='[x]';break;
    default: $interm = $modulo_fermate_guasti->turno;
}

$html.="<td> $matt Mattina 06,00 - 14,00</td>
    <td> $pom Pomer. 14,00 - 22,00</td>
  </tr>
  <tr>
    <td colspan=\"3\">&nbsp;</td>
    <td>&nbsp;</td>
    <td> $nott Notte 22,00 - 06,00</td>
    <td>Interm. $interm </td>
  </tr>
</table>";


$html.="<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" ><tr><td >
    <table border=\"1\" >
        <tr><td>Ora</td><td>da</td><td>a</td><td>da</td><td>a</td><td>da</td><td>a</td></tr>";

   for($k=0;$k<7;$k++){
       $html.= "<tr><td colspan=\"7\" style=\"font-weight: bold;\">$nomi_gruppi[$k]</td></tr>";
       for($i=$gruppi_inizio[$k];$i<=$gruppi_fine[$k];$i++){
            $html.= "<tr><td>$nomi_cause_fermate[$i]</td>";
            $cause = DAOFactory::getCauseFermateDAO()->queryByIdFermateGuastiAndCausa($_GET['id'], $i);
            for($j=0;$j<3;$j++){
                if( $j<count($cause) ){
                    $causa = $cause[$j];
                    $html.= "<td>$causa->daOra</td><td>$causa->aOra</td>";
                }else{
                    $html.= "<td>&nbsp;</td><td>&nbsp;</td>";
                }
            }
            $html.= "</tr>";
        }
        $html.= "<tr><td colspan=\"7\">&nbsp;</td></tr>";
   }

$html.="</table>
    </td>";

       $html.=" <td>
    <table border=\"1\">
        <tr><td>&nbsp;</td><td>da</td><td>a</td><td>da</td><td>a</td><td>da</td><td>a</td></tr>";
   
   for($k=7;$k<9;$k++){
       $html.= "<tr><td colspan=\"7\" style=\"font-weight: bold;\">$nomi_gruppi[$k]</td></tr>";
       for($i=$gruppi_inizio[$k];$i<=$gruppi_fine[$k];$i++){
            $html.= "<tr><td>$nomi_cause_fermate[$i]</td>";
            $cause = DAOFactory::getCauseFermateDAO()->queryByIdFermateGuastiAndCausa($_GET['id'], $i);
            for($j=0;$j<3;$j++){
                if( $j<count($cause) ){
                    $causa = $cause[$j];
                    $html.= "<td>$causa->daOra</td><td>$causa->aOra</td>";
                }else{
                    $html.= "<td>&nbsp;</td><td>&nbsp;</td>";
                }
            }
            $html.= "</tr>";
        }
        $html.= "<tr><td colspan=\"7\">&nbsp;</td></tr>";
   }

$html.= "</table>
            </td></tr></table>";

   $html.= " <table border=\"1\" width=\"100%\">
    <tr><td colspan=\"4\">Altre Cause d fermata:<br/> $modulo_fermate_guasti->altreCause</td></tr>
    <tr><td width=\"25%\">Data</td>
        <td width=\"25%\">R.Produzione<br/> $modulo_fermate_guasti->rProduzione </td>
        <td width=\"25%\">R.Assicurazione Qualità<br/> $modulo_fermate_guasti->rAssicurazioneQualita </td>
        <td width=\"25%\">R.Manutenzione<br/> $modulo_fermate_guasti->rManutenzione </td>
    </tr>
</table>";

$pdf->writeHTML($html);
$pdf->Output('modulo_controllo_fermate_guasti.pdf', 'I');

   ?>