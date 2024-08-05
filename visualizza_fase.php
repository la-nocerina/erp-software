<?php
include 'common/generated/include_dao.php';

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

$fase = DAOFactory::getFasiDAO()->load($_GET['id']);
if( !$fase){
    exit('accesso in modo non consentito');
}
$commessa = DAOFactory::getCommesseDAO()->load($fase->idCommessa);


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
$pdf->SetFont('helvetica', '', 8, '', false);
$pdf->AddPage();


$html = '';

$html .= "<style type=\"text/css\">
.header_tabella {
	font-size: xx-small;
}
.tabella1 td{
	height:30px;
	vertical-align:top;
}
.tabella2 td{
        height:15px;
}
</style>";

$html .= "<p>La Nocerina S.R.L - Mod.20 - L'ORDINE DI SERVIZIO - REV.1<br/>
        DATA:   FIRMA PROGRAMMATORE:</p>

<table width=\"100%\" border=\"1\" class=\"tabella1\">
  <tr>
    <td>COMM. N°.<br/> $commessa->idCommessa</td>
    <td>CLIENTE:<br/> $commessa->idPartner</td>
    <td>MARCA<br/> $commessa->marca</td>
    <td>D.D.T.:<br/> $commessa->ddtN</td>
    <td>DATA:<br/> $commessa->dataDdt</td>
    <td>COLLI:<br/> $commessa->colli</td>
    <td>KG.:<br/> $commessa->kg</td>
    <td>N. FOGLI:<br/> $commessa->numFogli</td>
    <td>RESA:<br/> $commessa->resa</td>
  </tr>
</table>
<table width=\"100%\" border=\"1\" class=\"tabella1\">
  <tr>
    <td>RIF.CONF.N°<br/> $commessa->rifConfNum</td>
    <td>DEL<br/> $commessa->dataConf</td>
    <td>FASI DI LAVORO PREV. N°<br/> $commessa->numFasiLavoro</td>
    <td>LINEA N°<br/>$fase->numLinea</td>
    <td>FASE N°<br/>$fase->numFase</td>
    <td>FORMATO<br/> $commessa->formato</td>
    <td>TOTALE<br/> $commessa->totale</td>
  </tr>
</table>";


$html .= "<table width=\"100%\" border=\"1\" class=\"tabella2\">
  <tr style=\"text-align: center;\">
    <td rowspan=\"2\"  width=\"11.5%\">DESCRIZIONE FASI<br />
      DI LAVORAZIONE</td>
    <td rowspan=\"2\"  class=\"header_tabella\" width=\"2.5%\">OPERA-<br />
      TORE</td>
    <td colspan=\"14\" width=\"86%\">LAVORAZIONE DA ESEGUIRE: VERNICIATURA E SMALTATURA</td>
  </tr>
  <tr style=\"text-align: center;\">
    <td width=\"9%\" >COD.PROD.</td>
    <td width=\"9%\" >BATCH</td>
    <td width=\"5%\" >GR.UM.</td>
    <td width=\"5%\" >GR.SEC.</td>
    <td width=\"5%\" >VEL.</td>
    <td width=\"9%\" >TEMPER.</td>
    <td width=\"6%\">VISC.</td>
    <td width=\"8%\" >FOGLI</td>
    <td width=\"4%\" >CORPI</td>
    <td width=\"3%\" >COP/<br />
    FON</td>
    <td class=\"header_tabella\" width=\"3%\" >C<br />
      A<br />
      P<br />
      S</td>
    <td class=\"header_tabella\" width=\"3%\" >T<br />A<br />P<br />P<br />I </td>
    <td width=\"4%\" >ALTRO</td>
    <td width=\"13%\" >OPERATORE</td>
  </tr>";

    $array_descrizioni[1] = "1 DORE' INT.";
    $array_descrizioni[2] = "1 DORE' INT. DOPP.";
    $array_descrizioni[3] = "1 DORE' INT./ZINCO";
    $array_descrizioni[4] = "1 DORE' EST.";
    $array_descrizioni[5] = "1 ARG. A FINIRE";
    $array_descrizioni[6] = "1 SM. EST.";
    $array_descrizioni[7] = "1 SM. INT.";
    $array_descrizioni[7] = "1 SM. DOPP MANO";
    $array_descrizioni[8] = "1 ANCORANTE INT.";
    $array_descrizioni[9] = "1 ANCORANTE EST.";
    $array_descrizioni[10] = "2 ANCORANTE INT.";
    $array_descrizioni[11] = "1 DORE' A FINIRE";
    $array_descrizioni[12] = "1 ALLUMINATA INT.";
    $array_descrizioni[13] = "1 ALLUMINATA EST.";
    $array_descrizioni[14] = "ORGANOSOL";
    $array_descrizioni[15] = "SGRASSAGGIO";

    for($i=1; $i<=15; $i++){
        if ($fase->descrizione == $i ){
            $html .=  "<tr>
                        <td>{$array_descrizioni[$i]}</td>
                        <td align=\"center\">V</td>
                        <td>$fase->codiceInternoProdotto &nbsp;</td>
                        <td>";
            $lista_batch_fase = DAOFactory::getBatchFaseDAO()->queryByFase($fase->idFase);
            for($b=0; $b<count($lista_batch_fase); $b++){
                $batch = $lista_batch_fase[$b];
                $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($batch->idProdottoInGiacenza);
                 if($b>0){ echo '<br/>'; }
                $html .= "$prodotto_giac->batch";
            }
            $html .= "  </td>
                        <td>$fase->grUm &nbsp;</td>
                        <td>$fase->grSec &nbsp;</td>
                        <td>$fase->velocita &nbsp;</td>
                        <td>$fase->tempForno &nbsp;</td>
                        <td>$fase->viscosita &nbsp;</td>
                        <td>$fase->fogli &nbsp;</td>
                        <td>$fase->corpi &nbsp;</td>
                        <td>$fase->copFon &nbsp;</td>
                        <td>$fase->caps &nbsp;</td>
                        <td>$fase->tappi &nbsp;</td>
                        <td>$fase->altro &nbsp;</td>
                        <td>$fase->operatore &nbsp;</td>
                     </tr>";

        }else{
            $html .=  "<tr><td>{$array_descrizioni[$i]}</td><td align=\"center\">V</td><td>&nbsp;</td>
    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
        }
    }


$html .= "<tr>
    <td height=\"50\" colspan=\"16\" valign=\"top\"><p>NOTE:<br/> $commessa->note </p></td>
  </tr>
</table>

<table width=\"100%\" border=\"1\">
  <tr>
    <td rowspan=\"2\">DESCRIZIONE FASI<br />
DI LAVORAZIONE</td>
    <td colspan=\"14\" align=\"center\">LAVORO DA ESEGUIRE: LITOGRAFIA</td>
  </tr>
  <tr>
    <td>MARCA</td>
    <td>FOGLI</td>
    <td>VEL.</td>
    <td>COL.</td>
    <td>TEMP.</td>
    <td>RIS.</td>
    <td>COD.PROD.</td>
    <td>LASTRE</td>
    <td>CORPI</td>
    <td>COP/<br />
    FON.</td>
    <td>CAPS.</td>
    <td>TAPPI</td>
    <td>ALTRO</td>
    <td>OPERATORE</td>
  </tr>";


$array_desc_stampa[1] = "1 COLORE";
$array_desc_stampa[2] = "2 COLORI";
$array_desc_stampa[3] = "2 COLORI";
$array_desc_stampa[4] = "2 COLORI";
for($i=1; $i<=4; $i++){
    $html .= "<tr>
    <td>{$array_desc_stampa[$i]}</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    <td>&nbsp;</td><td>&nbsp;</td></tr>";
}

$html .= "</table>";

$pdf->writeHTML($html);
//$pdf->lastPage();
$pdf->AddPage();



//tabella controllo qualità
include 'common/caratteristiche_test_fase.php';
$controlli=array();
for($i=1; $i<=24; $i++){
    $controllo = DAOFactory::getControlliFaseDAO()->load($_GET['id'], $i);
    $nome = "controlli_$i";
    if( $controllo ){
        $$nome= get_object_vars($controllo);
    }else{
        $$nome=get_object_vars(new ControlliFase());
    }
}
$html1="<table width=\"100%\" border=\"1\">
  <tr>
    <td rowspan=\"2\"><p>CARATTERISTICHE<br />
    TEST</p></td>
    <td colspan=\"26\">FASI DEL PROCESSO RIFERITE N.3 TURNI DI 8 ORE</td>
  </tr>
  <tr>
    <td>&nbsp;</td>";

for($i=6;$i<=29;$i++){
    $ora = str_pad($i%24, 2, "0", STR_PAD_LEFT);
    if($ora=='00'){
        $ora=24;
    }
    $html1.= "<td>$ora</td>";
}

$html1.="<td>NOTE</td>
  </tr>";



for($i=1; $i<=16; $i++){
    $nome = "controlli_$i";
    $campo = "c$i";
    $html1.= "<tr>
    <td>$caratteristiche[$i]</td>
    <td>$operatore[$i]</td>
    <td>$controlli_6[$campo]</td>
    <td>$controlli_7[$campo]</td>
    <td>$controlli_8[$campo]</td>
    <td>$controlli_9[$campo]</td>
    <td>$controlli_10[$campo]</td>
    <td>$controlli_11[$campo]</td>
    <td>$controlli_12[$campo]</td>
    <td>$controlli_13[$campo]</td>
    <td>$controlli_14[$campo]</td>
    <td>$controlli_15[$campo]</td>
    <td>$controlli_16[$campo]</td>
    <td>$controlli_17[$campo]</td>
    <td>$controlli_18[$campo]</td>
    <td>$controlli_19[$campo]</td>
    <td>$controlli_20[$campo]</td>
    <td>$controlli_21[$campo]</td>
    <td>$controlli_22[$campo]</td>
    <td>$controlli_23[$campo]</td>
    <td>$controlli_24[$campo]</td>
    <td>$controlli_1[$campo]</td>
    <td>$controlli_2[$campo]</td>
    <td>$controlli_3[$campo]</td>
    <td>$controlli_4[$campo]</td>
    <td>$controlli_5[$campo]</td>
    <td>$note[$i]</td>
  </tr>";

}

$html1.="</table>";
$pdf->writeHTML($html1);

//tabella pacchi lavorati
$html2='';


$html2.='<table width="100%">
    <tr>
        <td style=\"text-align:center\">NUMERO COLLAUDO/PACCO LAVORATO</td>
        <td style=\"text-align:center\">NUMERO COLLAUDO/PACCO LAVORATO</td>
        <td style=\"text-align:center\">NUMERO COLLAUDO/PACCO LAVORATO</td>
    </tr>';

$html2.= '<tr>';

//tabella turno MATTINA
$html2.= '<td width="33%" style="border-right:2px">';
$associazioni_giacenze = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase->idFase, 'M');
$assoc_giac_fase = new AssociaFasiGiacenze();
$html2.= "<table border=\"1\" width=\"100%\">\n";
for($i=0; $i<30;$i++){
    if(($i%6)==0){
        $html2.= '<tr>';
    }
    if( $i<count($associazioni_giacenze) ){
        $assoc_giac_fase = $associazioni_giacenze[$i];
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
        $html2.= "<td width=\"16.66%\"> $certificato->paccoN <hr style=\"border-top:1px dashed;\"> $certificato->collN </td>";
    }else{
        $html2.= "<td width=\"16.66%\">&nbsp;<hr style=\"border-top:1px dashed\">&nbsp;</td>";
    }
    if(($i%6)==5){
        $html2.= "</tr>\n";
    }
}
$html2.= '</table>';
$html2.= '</td>';

//tabella turno POMERIGGIO
$html2.= '<td width="33%" style="border-right:2px">';
$associazioni_giacenze = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase->idFase, 'P');
$assoc_giac_fase = new AssociaFasiGiacenze();
$html2.= "<table border=\"1\" width=\"100%\">\n";
for($i=0; $i<30;$i++){
    if(($i%6)==0){
        $html2.= '<tr>';
    }
    if( $i<count($associazioni_giacenze) ){
        $assoc_giac_fase = $associazioni_giacenze[$i];
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
        $html2.= "<td width=\"16.66%\"> $certificato->paccoN <hr style=\"border-top:1px dashed\"> $certificato->collN </td>";
    }else{
        $html2.= "<td width=\"16.66%\">&nbsp;<hr style=\"border-top:1px dashed\">&nbsp;</td>";
    }
    if(($i%6)==5){
        $html2.= "</tr>\n";
    }
}
$html2.= '</table>';
$html2.= '</td>';

//tabella turno NOTTE ED INTERMEDIO
$html2.= '<td width="33%">';
$associazioni_giacenze_1 = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase->idFase, 'N');
$associazioni_giacenze_2 = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase->idFase, 'I');
$associazioni_giacenze = array_merge($associazioni_giacenze_1, $associazioni_giacenze_2);
$assoc_giac_fase = new AssociaFasiGiacenze();
$html2.= "<table border=\"1\" width=\"100%\">\n";
for($i=0; $i<30;$i++){
    if(($i%6)==0){
        $html2.= '<tr>';
    }
    if( $i<count($associazioni_giacenze) ){
        $assoc_giac_fase = $associazioni_giacenze[$i];
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
        $html2.= "<td width=\"16.66%\"> $certificato->paccoN <hr style=\"border-top:1px dashed\"> $certificato->collN </td>";
    }else{
        $html2.= "<td width=\"16.66%\">&nbsp;<hr style=\"border-top:1px dashed\">&nbsp;</td>";
    }
    if(($i%6)==5){
        $html2.= "</tr>\n";
    }
}
$html2.= '</table>';
$html2.= '</td>';

$html2.= '</tr>';
$html2.= '</table>';


$pdf->writeHTML($html2);





//Close and output PDF document
$pdf->Output('commessa.pdf', 'I');

?>