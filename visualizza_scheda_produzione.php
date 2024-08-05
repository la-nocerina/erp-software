<?php

include 'common/generated/include_dao.php';

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->load($_GET['id']);
if(!$scheda_produzione){
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
$pdf->SetFont('helvetica', '', 8, '', false);
$pdf->AddPage();


$html='<table width="100%">
      <tr>
        <td width="29%" rowspan="3">LN La Nocerina s.r.l.</td>
        <td width="34%" rowspan="3">REPARTO MACCHINE<br />STAMPA E<br />VERNICIATURA</td>
        <td width="28%">BICOLORE CRABTREE<br />N.</td>
        <td width="9%">';

if($scheda_produzione->tipoMacchina=="B"){
    $html.=$scheda_produzione->linea;
}else{
    $html.='&nbsp;';
}

$html.='</td>
      </tr>
      <tr>
        <td>VERNICIATRICE<br />N.</td>
        <td>';
if($scheda_produzione->tipoMacchina=="V"){
    $html.=$scheda_produzione->linea;
}else{
    $html.='&nbsp;';
}

$html.="</td>
      </tr>
      <tr>
          <td colspan=\"2\">Data $scheda_produzione->data
            Ora $scheda_produzione->ora </td>
      </tr>
    </table>
    <table width=\"100%\" border=\"1\">
      <tr>
        <td>TURNO:</td>";


$selected1=$selected2=$selected3=$selected4=$txtIntermedio='';
switch ($scheda_produzione->turno){
  case 'M': $selected1 = ' checked="checked" ';break;
  case 'P': $selected2 = ' checked="checked" ';break;
  case 'N': $selected3 = ' checked="checked" ';break;
  default : $selected4 = ' checked="checked" ';$txtIntermedio=$scheda_produzione->turno;break;
}
$html.="<td><input name=\"turno\" type=\"radio\" id=\"turno1\" value=\"M\" disabled $selected1 />Mattina<br />
          06,00<br />
          14,00
        </td>
        <td><input type=\"radio\" name=\"turno\" id=\"turno2\" value=\"P\" disabled $selected2 />Pomeriggio<br />
          14,00<br />
          22,00</td>
        <td><input type=\"radio\" name=\"turno\" id=\"turno3\" value=\"N\" disabled $selected3 />Notte<br />
          22,00<br />
          06,00</td>
        <td><input type=\"radio\" name=\"turno\" id=\"turno4\" value=\"I\" disabled $selected4 />Interme.<br/> $txtIntermedio </td>
        <td>MACCHINISTA:<br/> $scheda_produzione->macchinista </td>
      </tr>
      <tr>
        <td colspan=\"5\">CLIENTE:<br/> $scheda_produzione->idPartner </td>
        <td>LAVORAZIONE:<br/> $scheda_produzione->lavorazione </td>
      </tr>
    </table>";

$html.="<table border=\"1\">
        <tr>
            <th>N°COMMESSA</th>
            <th>N°COLLAUDO</th>
            <th>DA ORA</th>
            <th>A ORA</th>
            <th>N°PACCO</th>
            <th>FOGLI</th>
            <th>CONTR. VISIVO</th>
            <th>CONTR. VISIVO</th>
            <th>NOTE</th>
            <th>VERIFICATORE</th>
        </tr>";

$associazioni_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdSchedaProduzione($scheda_produzione->idSchedaProduzione );
$assoc_giac_fase = new AssociaFasiGiacenze();
for($i=0; $i<count($associazioni_giac_fase); $i++){
    $assoc_giac_fase = $associazioni_giac_fase[$i];
    if( $assoc_giac_fase->numFogli == 0 ){
        continue;
    }
    $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($assoc_giac_fase->idProdottoInGiacenza);
    $certificato = new CertificatiCollaudo();
    $certificato = $cert_collaudo[0];
    $fase = DAOFactory::getFasiDAO()->load($assoc_giac_fase->idFase);
    $html.= "<tr>
            <td> $fase->idCommessa </td>
            <td> $certificato->collN </td>
            <td> $fase->oraInizio </td>
            <td> &nbsp; </td>
            <td> $certificato->paccoN </td>
            <td> $assoc_giac_fase->numFogli </td>
            <td> $assoc_giac_fase->controllo1 </td>
            <td> $assoc_giac_fase->controllo2 </td>
            <td> $assoc_giac_fase->note </td>
            <td> $assoc_giac_fase->verificatore </td>
        </tr>";
}
$html.='</table>';

$pdf->writeHTML($html);
$pdf->lastPage();


//Close and output PDF document
$pdf->Output('commessa.pdf', 'I');
?>
