<?php



include 'common/generated/include_dao.php';

if(empty($_GET['id'])){
    exit('accesso ad area in modo non consentito');
}

$scheda = DAOFactory::getSchedeProveDAO()->load($_GET['id']);

if(!$scheda){
    exit('accesso ad area assente');
}


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


$test = array();
$test[1]="Pacco";
$test[2]="Comm.";
$test[3]="Fase";
$test[4]="Gr.Media";
$test[5]="Temper.Forno";
$test[6]="Polimerizzazione";
$test[7]="Porosità";
$test[8]="Aderenza";
$test[9]="Cod.Barra";
$test[10]="Sterilizzazione";
$test[11]="Prova mastice";

$html1='';

$html1.="<p>LN LA NOCERINA S.R.L.</p>
    <p>MOD.34 - PROVE E CONTROLLI DI LABORATORIO - REV.2 - DATA: $scheda->data;</p>";

    for($i=1; $i<=7; $i++){

        if($i==4 || $i==7){
            $pdf->writeHTML($html1);
            $pdf->AddPage();
            $html1='';
        }
        
        //recupero controlli
        $controlli=array();
        for($c=1; $c<=24; $c++){
            $controllo = DAOFactory::getProveControlliLineaDAO()->load($_GET['id'], $i, $c);
            $nome = "controlli_$c";
            if( $controllo ){
                $$nome= get_object_vars($controllo);
            }else{
                $$nome=get_object_vars(new ProveControlliLinea() );
            }
        }

        //recupero certificati e fasi
        $pacchi = array();
        $id_commesse = array();
        $fasi = array();
        for($c=1; $c<=24; $c++){
            $nome = "controlli_$c";
            $var = $$nome;
            if( !empty( $var['idProdottoInGiacenza'] ) ){
                $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($var['idProdottoInGiacenza']);
                if( !empty($var['idFase']) ){
                    $fase = DAOFactory::getFasiDAO()->load($var['idFase']);
                    $pacchi[$c]=$certificato->paccoN;
                    $id_commesse[$c]= $fase->idCommessa;
                    $fasi[$c] = $fase->numFase;
                }else{
                    $fase_stampa = DAOFactory::getFasiStampaDAO()->load($var['idFaseStampa']);
                    $pacchi[$c]=$certificato->paccoN;
                    $id_commesse[$c]= $fase_stampa->idCommessa;
                    $fasi[$c] = $fase_stampa->numFase;
                }

            }else{
                $pacchi[$c]='';
                $id_commesse[$c]='';
                $fasi[$c] ='';
            }
        }

        $note = DAOFactory::getNoteProveDAO()->load($scheda->idSchedaProve, $i);
        if( !$note ){
            $note = new NoteProve();
        }
        $note = get_object_vars($note);

        $html1.= "<p>LINEA N° $i</p>";
        $html1.= "<table border=\"1\">";

        $html1.= "<tr><td>&nbsp;</td>";
        for($j=6;$j<=29;$j++){
            $ora = str_pad($j%24, 2, "0", STR_PAD_LEFT);
            if($ora=='00'){
                $ora=24;
            }
            $html1.= "<td>$ora</td>";
        }
        $html1.= "<td>NOTE</td></tr>";

        for($r=1; $r<=count($test); $r++ ){
            if($r==1){
                $html1.= "<tr>
                <td>$test[$r]</td><td>$pacchi[6]</td><td>$pacchi[7]</td><td>$pacchi[8]</td><td>$pacchi[9]</td>
                <td>$pacchi[10]</td><td>$pacchi[11]</td><td>$pacchi[12]</td><td>$pacchi[13]</td><td>$pacchi[14]</td>
                <td>$pacchi[15]</td><td>$pacchi[16]</td><td>$pacchi[17]</td><td>$pacchi[18]</td><td>$pacchi[19]</td>
                <td>$pacchi[20]</td><td>$pacchi[21]</td><td>$pacchi[22]</td><td>$pacchi[23]</td><td>$pacchi[24]</td>
                <td>$pacchi[1]</td><td>$pacchi[2]</td><td>$pacchi[3]</td><td>$pacchi[4]</td><td>$pacchi[5]</td>
                <td>{$note['n1']}</td></tr>";
            }
            if($r==2){
                $html1.= "<tr>
                <td>$test[$r]</td><td>$id_commesse[6]</td><td>$id_commesse[7]</td><td>$id_commesse[8]</td>
                <td>$id_commesse[9]</td><td>$id_commesse[10]</td><td>$id_commesse[11]</td><td>$id_commesse[12]</td>
                <td>$id_commesse[13]</td><td>$id_commesse[14]</td><td>$id_commesse[15]</td><td>$id_commesse[16]</td>
                <td>$id_commesse[17]</td><td>$id_commesse[18]</td><td>$id_commesse[19]</td><td>$id_commesse[20]</td>
                <td>$id_commesse[21]</td><td>$id_commesse[22]</td><td>$id_commesse[23]</td><td>$id_commesse[24]</td>
                <td>$id_commesse[1]</td><td>$id_commesse[2]</td><td>$id_commesse[3]</td><td>$id_commesse[4]</td>
                <td>$id_commesse[5]</td><td>{$note['n2']}</td></tr>";
            }
            if($r==3){
                $html1.= "<tr>
                <td>$test[$r]</td>
                <td>{$fasi[6]}</td><td>{$fasi[7]}</td><td>{$fasi[8]}</td>
                <td>{$fasi[9]}</td><td>{$fasi[10]}</td><td>{$fasi[11]}</td>
                <td>{$fasi[12]}</td><td>{$fasi[13]}</td><td>{$fasi[14]}</td>
                <td>{$fasi[15]}</td><td>{$fasi[16]}</td><td>{$fasi[17]}</td>
                <td>{$fasi[18]}</td><td>{$fasi[19]}</td><td>{$fasi[20]}</td>
                <td>{$fasi[21]}</td><td>{$fasi[22]}</td><td>{$fasi[23]}</td>
                <td>{$fasi[24]}</td><td>{$fasi[1]}</td><td>{$fasi[2]}</td>
                <td>{$fasi[3]}</td><td>{$fasi[4]}</td><td>{$fasi[5]}</td><td>{$note['n3']}</td></tr>";
            }
            if($r>=4){
                $campo = "c".($r-3);
                $n = "n$r";
                $html1.= "<tr>
                    <td>$test[$r]</td>
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
                    <td>{$note[$n]}</td>
                    </tr>";
            }
        }
        $html1.= "</table>";

    }

    $html1.= '<p>&nbsp;</p>';

    //tabella per layout
    $html1.= '<table ><tr><td>';

    //tabella per controlli aggiuntivi
    $html1.= '<table border="1">
            <tr>
                <td>&nbsp;</td>
                <td colspan="4">LIVELLO VASCHETTA</td>
                <td colspan="4">GRAMMATURA UMIDA</td>
                <td colspan="4">VISCOSITA\'</td>
           </tr>';

    for($i=1; $i<=7; $i++){
        $html1.= "<tr><td>LINEA $i</td>";
        $controlli1 = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $i, 1 );
        $controlli2 = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $i, 2 );
        $controlli3 = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $i, 3 );
        for($j=0;$j<4;$j++){
            if($j<count($controlli1)){
                $controllo = $controlli1[$j];
                $html1.= "<td>$controllo->valore</td>";
            }else{
                $html1.= '<td>&nbsp;</td>';
            }
        }
        for($j=0;$j<4;$j++){
            if($j<count($controlli2)){
                $controllo = $controlli2[$j];
                $html1.= "<td>$controllo->valore</td>";
            }else{
                $html1.= '<td>&nbsp;</td>';
            }
        }
        for($j=0;$j<4;$j++){
            if($j<count($controlli3)){
                $controllo = $controlli3[$j];
                $html1.= "<td>$controllo->valore</td>";
            }else{
                $html1.= '<td>&nbsp;</td>';
            }
        }
        $html1.= '</tr>';
    }
    $html1.= '</table>';
    //fine tabella per controlli aggiuntivi

    $html1.= '</td><td>';
    
    $html1.='<p>&nbsp;</p>';
    
    $html1.="<table border=\"1\">
            <tr>
                <td>FIRMA RESP. LABORATORIO<br/>$scheda->rLaboratorio</td>
                <td>NOTE:<br/> $scheda->note </td>
            </tr>
        </table>

    </td></tr></table>";

    $pdf->writeHTML($html1);
    $pdf->Output('prove_e_controlli.pdf', 'I');
    ?>