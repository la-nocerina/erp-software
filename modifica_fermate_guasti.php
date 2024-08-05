<?php
include 'common/generated/include_dao.php';

if( array_key_exists('salva', $_POST) ){
    $modulo = DAOFactory::getFermateGuastiDAO()->load($_POST['id_modulo']);
    $modulo->data = $_POST['data'];
    $modulo->standard = $_POST['standard'];
    $modulo->operatore = $_POST['operatore'];
    switch ( $_POST['turno'] ){
        case 'M': $modulo->turno = $_POST['turno'];break;
        case 'P': $modulo->turno = $_POST['turno'];break;
        case 'N': $modulo->turno = $_POST['turno'];break;
        case 'I': $modulo->turno = $_POST['txt_intermedio'];break;
    }
    $modulo->altreCause = $_POST['altre_cause'];
    $modulo->dataVerifica = $_POST['data_verifica'];
    $modulo->rProduzione = $_POST['r_produzione'];
    $modulo->rAssicurazioneQualita = $_POST['r_ass_qualita'];
    $modulo->rManutenzione = $_POST['r_manutenzione'];

    try {
        DAOFactory::getFermateGuastiDAO()->update($modulo);
        header('Location: gestione_fermate_guasti.php?linea='.$modulo->linea);
    }
    catch (Exception $exc) {
        exit('non è stato possibile aggiornare il modulo');
    }
}


if( empty($_GET['id']) ){
    exit('accesso ad area in modo non consentito');
}


include 'cause_fermate_guasti.php';

$modulo_fermate_guasti =DAOFactory::getFermateGuastiDAO()->load($_GET['id']);
if(!$modulo_fermate_guasti){
    exit('accesso ad area assente');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
    <form name="form1" method="post" action="modifica_fermate_guasti.php">
        <input name="id_modulo" value="<?php echo $modulo_fermate_guasti->idFermateGuasti; ?>" type="hidden" />
<table>
  <tr>
    <td>Linea n°:  <?php echo $modulo_fermate_guasti->linea; ?> </td>
    <td>Data: <input name="data" value="<?php echo $modulo_fermate_guasti->data; ?>" size="10" id="data" type="text" /></td>
    <td>Standard:
    <?php
    $fogli=$ora='';
    if ($modulo_fermate_guasti->standard == "fogli"){
        $fogli = ' selected="selected" ';
    }
    if($modulo_fermate_guasti->standard == "ora"){
        $ora = ' selected="selected" ';
    }
     ?>
        <select name="standard" id="standard">
            <option value="fogli" <?php echo $fogli; ?> >fogli</option>
            <option value="ora" <?php echo $ora; ?> >ora</option>
    	</select>
    </td>
    <td>Operatore: <input name="operatore" value="<?php echo $modulo_fermate_guasti->operatore; ?>" size="40" id="operatore" type="text" /></td>
    <?php $matt=$pomer=$notte=$interm=$txt_interm='';
        switch ($modulo_fermate_guasti->turno){
            case 'M': $matt='checked="checked"';break;
            case 'P': $pomer='checked="checked"';break;
            case 'N': $notte='checked="checked"';break;
            default: $interm = 'checked="checked"'; $txt_interm=$modulo_fermate_guasti->turno;
        }
    ?>
    <td><input name="turno" type="radio" id="turno1" value="M" <?php echo $matt; ?> />Mattina 06,00 - 14,00</td>
    <td><input type="radio" name="turno" id="turno2" value="P" <?php echo $pomer; ?> />Pomer. 14,00 - 22,00</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="radio" name="turno" id="turno3" value="N" <?php echo $notte; ?> />Notte 22,00 - 06,00</td>
    <td><input type="radio" name="turno" id="turno4" value="I" <?php echo $interm; ?> />Interm. <input name="txt_intermedio" value="<?php echo $txt_interm; ?>" size="30" id="turno" type="text" /></td>
  </tr>
</table>
<div style="float:left">
    <table>
        <tr><td>Ora</td><td>da</td><td>a</td><td>da</td><td>a</td><td>da</td><td>a</td></tr>
   <?php 
   for($k=0;$k<7;$k++){
       echo "<tr><td colspan=\"7\" style=\"font-weight: bold;\">$nomi_gruppi[$k]</td></tr>";
       for($i=$gruppi_inizio[$k];$i<=$gruppi_fine[$k];$i++){
            echo "<tr><td><a href=\"modifica_causa_fermata_guasto.php?id={$_GET['id']}&causa=$i\">$nomi_cause_fermate[$i]</a></td>";
            $cause = DAOFactory::getCauseFermateDAO()->queryByIdFermateGuastiAndCausa($_GET['id'], $i);
            for($j=0;$j<3;$j++){
                if( $j<count($cause) ){
                    $causa = $cause[$j];
                    echo "<td width=\"60px\" >$causa->daOra</td><td width=\"60px\">$causa->aOra</td>";
                }else{
                    echo "<td width=\"60px\">&nbsp;</td><td width=\"60px\">&nbsp;</td>";
                }
            }
        }
        echo "<tr><td colspan=\"7\">&nbsp;</td></tr>";
   }
    
    ?>
    </table>
</div>
    <div style="float:left">
    <table>
        <tr><td>&nbsp;</td><td>da</td><td>a</td><td>da</td><td>a</td><td>da</td><td>a</td></tr>
   <?php
   for($k=7;$k<9;$k++){
       echo "<tr><td colspan=\"7\" style=\"font-weight: bold;\">$nomi_gruppi[$k]</td></tr>";
       for($i=$gruppi_inizio[$k];$i<=$gruppi_fine[$k];$i++){
            echo "<tr><td><a href=\"modifica_causa_fermata_guasto.php?id={$_GET['id']}&causa=$i\">$nomi_cause_fermate[$i]</a></td>";
            $cause = DAOFactory::getCauseFermateDAO()->queryByIdFermateGuastiAndCausa($_GET['id'], $i);
            for($j=0;$j<3;$j++){
                if( $j<count($cause) ){
                    $causa = $cause[$j];
                    echo "<td >$causa->daOra</td><td>$causa->aOra</td>";
                }else{
                    echo "<td width=\"60px\">&nbsp;</td><td width=\"60px\">&nbsp;</td>";
                }
            }
            echo "</tr>";
        }
        echo "<tr><td colspan=\"7\">&nbsp;</td></tr>";
   }

    ?>
    </table>
</div>

<table>
    <tr><td colspan="4">Altre Cause d fermata:<br/>
            <textarea name="altre_cause" rows="3" cols="60" dir="ltr" id="altre_cause" ><?php echo $modulo_fermate_guasti->altreCause; ?></textarea>
        </td> </tr>
    <tr><td width="25%">Data<br/><input name="data_verifica" value="<?php echo $modulo_fermate_guasti->dataVerifica; ?>" size="10" id="data_verifica" type="text" /></td>
        <td width="25%">R.Produzione<br/><input name="r_produzione" value="<?php echo $modulo_fermate_guasti->rProduzione; ?>" size="40" id="r_produzione" type="text" /></td>
        <td width="25%">R.Assicurazione Qualità<br/><input name="r_ass_qualita" value="<?php echo $modulo_fermate_guasti->rAssicurazioneQualita; ?>" size="40" id="r_ass_qualita" type="text" /></td>
        <td width="25%">R.Manutenzione<br/><input name="r_manutenzione" value="<?php echo $modulo_fermate_guasti->rManutenzione; ?>" size="40" id="r_manutenzione" type="text" /></td>
    </tr>
</table>
        <p><input name="salva" type="submit" class="submit" value="" />&nbsp;Salva</p>
    </form>
    
</body>
</html>