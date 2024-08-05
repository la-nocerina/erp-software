<?php
include 'common/generated/include_dao.php';

if( array_key_exists('salva', $_POST)){
    $causa = DAOFactory::getCauseFermateDAO()->load($_POST['id_causa']);
    $causa->daOra = $_POST['ora_inizio'];
    $causa->aOra = $_POST['ora_fine'];

    try {
        DAOFactory::getCauseFermateDAO()->customUpdate($causa);
        header('Location: modifica_fermate_guasti.php?id='.$causa->idFermateGuasti);
    }
    catch (Exception $exc) {
        exit('non è stato possibile modificare la causa della fermata');
    }


}

if( empty($_GET['id']) || empty($_GET['causa']) ){
    exit('accesso ad area in modo non consentito');
}



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
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>

</head>

<body>
<table>
  <tr>
    <td>Linea n°: <?php echo $modulo_fermate_guasti->linea; ?> </td>
    <td>Data: <?php echo $modulo_fermate_guasti->data; ?> </td>
    <td>Standard: <?php echo $modulo_fermate_guasti->standard; ?></td>
    <td>Operatore: <?php echo $modulo_fermate_guasti->operatore; ?></td>
    <?php $matt=$pom=$nott=$interm='';
        switch ($modulo_fermate_guasti->turno){
            case 'M': $matt='[x]';break;
            case 'P': $pom='[x]';break;
            case 'N': $nott='[x]';break;
            default: $interm = $modulo_fermate_guasti->turno;
        }
    ?>
    <td><?php echo $matt; ?>Mattina 06,00 - 14,00</td>
    <td><?php echo $pom; ?>Pomer. 14,00 - 22,00</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $nott; ?>Notte 22,00 - 06,00</td>
    <td>Interm. <?php echo $interm; ?></td>
  </tr>
</table>
    
<?php
    include 'cause_fermate_guasti.php';
    for( $i=0; $i<count($nomi_gruppi); $i++ ){
        if( ($_GET['causa'] >= $gruppi_inizio[$i]) && ($_GET['causa'] <= $gruppi_fine[$i])  ){
            echo "<p><span style=\"font-weight: bold;\">$nomi_gruppi[$i]</span> -> {$nomi_cause_fermate[$_GET['causa']]}</p>";
        }
    }

    echo '<p>Già esistenti:</p>';
    $cause_fermate = DAOFactory::getCauseFermateDAO()->queryByIdFermateGuastiAndCausa($_GET['id'], $_GET['causa']);
    $causa = new CauseFermate();
    for($i=0; $i<count($cause_fermate); $i++ ){
        $causa = $cause_fermate[$i];
        echo "<form name=\"from_$i\" method=\"post\" action=\"modifica_causa_fermata_guasto.php\" >";
        echo "<input type=\"hidden\" name=\"id_causa\" value=\"$causa->idCausaFermata\" /> ";
        echo "<p>Da Ora <input name=\"ora_inizio\" value=\"$causa->daOra\" /> <br/>";
        echo "A Ora <input name=\"ora_fine\" value=\"$causa->aOra\" /> </p>";
        echo "<p><input type=\"submit\" name=\"salva\" value=\"Salva\" /></p>";
        echo "</form>";
    }

    ?>

    <p>Aggiungi</p>
    <form name="formAdd" method="post" action="add_causa_fermata_guasto.php">
        <input type="hidden" name="id_modulo" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="causa" value="<?php echo $_GET['causa']; ?>" />
        

        <p>Da Ora <input name="ora_inizio" id="ora_inizio" size="10" maxlength="5" value="<?php echo date('H')+1 .':'. date('i'); ?>" />
            <br/>
            A Ora <input name="ora_fine" id="ora_fine" value="" size="10" maxlength="5"/>
        </p>
        <p><input name="aggiungi" type="submit" class="submit" value="" /> 
          salva</p>
    </form>

</body>
</html>