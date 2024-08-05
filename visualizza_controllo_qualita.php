<?php
if(empty($_GET['id'])){
    exit('accesso ad are in modo non consentito');
}

include 'common/generated/include_dao.php';
$scheda=DAOFactory::getControlliQualitaDAO()->load($_GET['id']);
if(!$scheda){
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



$associazioni = DAOFactory::getAssociaGiacenzaControlloDAO()->queryByIdControlliQualita($_GET['id']);
$ass_giac_contr = new AssociaGiacenzaControllo();
$materiali[1] = $materiali[2] = $materiali[3] = $materiali[4] = '';
$commesse = array();
for($i=0; $i<count($associazioni); $i++){
    $ass_giac_contr = $associazioni[$i];
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_contr->idProdottoInGiacenza);
    switch ($certificato->materiale){
        case '1': $materiali[1]=' X '; break;
        case '2': $materiali[2]=' X '; break;
        case '3': $materiali[3]=' X '; break;
        case '4': $materiali[4]=' X '; break;
    }
    if( !in_array($certificato->commN, $commesse) ){
        $commesse[] = $certificato->commN;
    }
}
$lista_commesse = implode(' - ', $commesse);
unset ($associazioni);


$html='<p>LN LA NOCERINA S.R.L.</p>
<p>VERNICIATURA E LITOGRAFIA SU BANDA STAGNATA<br />
FOTOINCISIONE E RIPRODUZIONI A COLORI</p>
<p>MOD.32 - CONTROLLO QUALITA\' BANDA STAGNATA /CROMATA ED ALLUMINIO - REV.1</p>';

$html.="<table width=\"100%\" border=\"1\">
  <tr>
    <td>COMMITTENTE<br/>$scheda->idPartner</td>
    <td colspan=\"3\">D.D.T.<br/>$scheda->ddtN</td>
    <td colspan=\"2\">del<br/>$scheda->dataDdt</td>
    <td colspan=\"2\">COLLI<br/>$scheda->numColli</td>
    <td colspan=\"2\">KG.<br/>$scheda->kg</td>
  </tr>
  <tr>
    <td>N°COLL.<br/>$scheda->idControlliQualita</td>
    <td colspan=\"5\">COMM.N°<br/>$lista_commesse</td>";


    $corpi = $txt_corpi = $coper = $capsule = $tappi = $altro = '';
    switch($scheda->tipo){
        case 'corpi': $corpi=' X '; $txt_corpi = $scheda->txtCorpi;
        case 'coperchi':$coper=' X ';break;
        case 'capsule':$capsule=' X ';break;
        case 'tappi':$tappi=' X ';break;
        case 'altro':$altro=' X ';break;
    }
    
    
$html.="<td rowspan=\"2\">[ $corpi ]CORPI<br />GR. $txt_corpi</td>
    <td colspan=\"2\" rowspan=\"2\">[ $coper ]COPER.<br />[ $capsule ]CAPSULE</td>
    <td rowspan=\"2\">[ $tappi ]TAPPI<br />[ $altro ]ALTRO</td>
  </tr>
  <tr>
    <td>FERRIERA<br/> $scheda->numFerriera </td>
    <td>PROD.</td>
    <td>[ $materiali[1] ] B.<br />STAGN.</td>
    <td>[ $materiali[2] ] B.<br />CROM.</td>
    <td>[ $materiali[3] ]ALLUM.</td>
    <td>[ $materiali[4] ]ALTRO</td>
  </tr>
</table>";
    
    
$html.="<table border=\"1\" id=\"tabella_pacchi\" width=\"100%\">
        <tr>
            <th>BALLA N°</th>
            <th>LARGH. mm</th>
            <th>LUNG. mm</th>
            <th>SPESS. mm</th>
            <th>DUREZZA<br/>HR30TM</th>
            <th>COPERT<br/>G/m2</th>
            <th>PESO</th>
            <th>PACCO</th>
            <th colspan=\"2\">CONTR.VISIVO</th>
            <th>COMM.</th>
            <th>NOTE</th>
        </tr>";


for($i=1; $i<=25; $i++){

    $ass_giac_contr = DAOFactory::getAssociaGiacenzaControlloDAO()->loadByIdControlliQualitaANDNumPacco($scheda->idControlliQualita, $i);
    if($ass_giac_contr){
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_contr->idProdottoInGiacenza);
        $dimensioni = explode(' X ', $certificato->formato);


        $html.= "<tr>
                <td>$i</td>
                <td>{$dimensioni[0]}</td>
                <td>{$dimensioni[1]}</td>
                <td>0,$certificato->spessore</td>
                <td>T. $certificato->tempra</td>
                <td>$ass_giac_contr->copertura</td>
                <td>$ass_giac_contr->peso</td>
                <td>$ass_giac_contr->pacco</td>
                <td>$ass_giac_contr->controlloVisivo</td>
                <td>$ass_giac_contr->controlloVisivoTxt</td>
                <td>$certificato->commN</td>
                <td>$ass_giac_contr->note</td>
            </tr>";
    }else{
        $html.= "<tr>
                <td>$i</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>0,</td>
                <td>T.</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>";
    }
}

$html.="</table>";

$html.="<table  border=\"1\" width=\"100%\">
    <tr>
        <td>Data:<br/>";

$date = DAOFactory::getDateControlliQualitaDAO()->queryByIdControlliQualita($scheda->idControlliQualita);
$array_date = array();
for($i=0; $i<count($date); $i++){
    $data = $date[$i];
    $array_date[] = $data->data;
}
$html.= implode('<br/>', $array_date);

$html.="</td>
        <td>Firma Operatore<br/> $scheda->operatore </td>
        <td>Firma Resp.Laboratorio<br/> $scheda->rLaboratorio</td>
    </tr>
</table>";

$pdf->writeHTML($html);
$pdf->Output("controllo_qualita.pdf", 'I');
?>
