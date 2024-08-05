<?php

include 'common/generated/include_dao.php';

if(array_key_exists('salva', $_POST)){
    $scheda = DAOFactory::getSchedeProveDAO()->load($_POST['scheda']);
    $scheda->note = $_POST['note'];
    $scheda->rLaboratorio = $_POST['r_laboratorio'];

    try {
        DAOFactory::getSchedeProveDAO()->update($scheda);
        exit('la scheda è stata aggiornata');
    }
    catch (Exception $exc) {
        exit('non è stato possibile aggiornare la scheda');
    }

}

if(empty($_GET['id'])){
    exit('accesso ad area in modo non consentito');
}


$scheda = DAOFactory::getSchedeProveDAO()->load($_GET['id']);

if(!$scheda){
    exit('accesso ad area assente');
}

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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>

    <p>LN LA NOCERINA S.R.L.</p>
    <p>MOD.34 - PROVE E CONTROLLI DI LABORATORIO - REV.2 - DATA: <?php echo $scheda->data; ?></p>

    <?php

    for($i=1; $i<=7; $i++){

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
        
        echo "<p>LINEA N° $i</p>";
        echo "<table border=\"1\">";

        echo "<tr><td>&nbsp;</td>";
        for($j=6;$j<=29;$j++){
            $ora = str_pad($j%24, 2, "0", STR_PAD_LEFT);
            if($ora=='00'){
                $ora=24;
            }
            echo "<td><a href=\"modifica_controllo_linea.php?scheda={$_GET['id']}&linea=$i&ora=$ora\">$ora</a></td>";
        }
        echo "<td><a href=\"modifica_note_controllo_linea.php?scheda={$_GET['id']}&linea=$i\">NOTE</a></td></tr>";

        for($r=1; $r<=count($test); $r++ ){
            if($r==1){
                echo "<tr>
                <td>$test[$r]</td><td>$pacchi[6]</td><td>$pacchi[7]</td><td>$pacchi[8]</td><td>$pacchi[9]</td>
                <td>$pacchi[10]</td><td>$pacchi[11]</td><td>$pacchi[12]</td><td>$pacchi[13]</td><td>$pacchi[14]</td>
                <td>$pacchi[15]</td><td>$pacchi[16]</td><td>$pacchi[17]</td><td>$pacchi[18]</td><td>$pacchi[19]</td>
                <td>$pacchi[20]</td><td>$pacchi[21]</td><td>$pacchi[22]</td><td>$pacchi[23]</td><td>$pacchi[24]</td>
                <td>$pacchi[1]</td><td>$pacchi[2]</td><td>$pacchi[3]</td><td>$pacchi[4]</td><td>$pacchi[5]</td>
                <td>{$note['n1']}</td></tr>";
            }
            if($r==2){
                echo "<tr>
                <td>$test[$r]</td><td>$id_commesse[6]</td><td>$id_commesse[7]</td><td>$id_commesse[8]</td>
                <td>$id_commesse[9]</td><td>$id_commesse[10]</td><td>$id_commesse[11]</td><td>$id_commesse[12]</td>
                <td>$id_commesse[13]</td><td>$id_commesse[14]</td><td>$id_commesse[15]</td><td>$id_commesse[16]</td>
                <td>$id_commesse[17]</td><td>$id_commesse[18]</td><td>$id_commesse[19]</td><td>$id_commesse[20]</td>
                <td>$id_commesse[21]</td><td>$id_commesse[22]</td><td>$id_commesse[23]</td><td>$id_commesse[24]</td>
                <td>$id_commesse[1]</td><td>$id_commesse[2]</td><td>$id_commesse[3]</td><td>$id_commesse[4]</td>
                <td>$id_commesse[5]</td><td>{$note['n2']}</td></tr>";
            }
            if($r==3){
                echo "<tr>
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
                echo "<tr>
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
        echo "</table>";

    }

    echo '<p>&nbsp;</p>';
    
    echo '<table border="1">
            <tr>
                <td>&nbsp;</td>
                <td colspan="4">LIVELLO VASCHETTA</td>
                <td colspan="4">GRAMMATURA UMIDA</td>
                <td colspan="4">VISCOSITA\'</td>
           </tr>';

    for($i=1; $i<=7; $i++){
        echo "<tr><td><a href=\"modifica_controlli_aggiuntivi.php?scheda=$scheda->idSchedaProve&linea=$i\">LINEA $i</a></td>";
        $controlli1 = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $i, 1 );
        $controlli2 = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $i, 2 );
        $controlli3 = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $i, 3 );
        for($j=0;$j<4;$j++){
            if($j<count($controlli1)){
                $controllo = $controlli1[$j];
                echo "<td>$controllo->valore</td>";
            }else{
                echo '<td>&nbsp;</td>';
            }
        }
        for($j=0;$j<4;$j++){
            if($j<count($controlli2)){
                $controllo = $controlli2[$j];
                echo "<td>$controllo->valore</td>";
            }else{
                echo '<td>&nbsp;</td>';
            }
        }
        for($j=0;$j<4;$j++){
            if($j<count($controlli3)){
                $controllo = $controlli3[$j];
                echo "<td>$controllo->valore</td>";
            }else{
                echo '<td>&nbsp;</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>

    <p>&nbsp;</p>
    
    <form name="form_scheda_prove" method="post" action="modifica_prove_controlli.php">
        <input type="hidden" name="scheda" value="<?php echo $scheda->idSchedaProve; ?>" />
        <table>
            <tr>
                <td>FIRMA RESP. LABORATORIO<br/>
                    <input type="text" name="r_laboratorio" id="r_laboratorio" value="<?php echo $scheda->rLaboratorio; ?>" />
                </td>
                <td>
                    NOTE:<br/>
                    <textarea cols="30" rows="3" name="note" id="note"><?php echo $scheda->note; ?></textarea>
                </td>
            </tr>
        </table>
        <input class="submit" type="submit" name="salva" value="" />&nbsp;Salva
    </form>
</body>
</html>