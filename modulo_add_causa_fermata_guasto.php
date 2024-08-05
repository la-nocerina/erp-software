<?php

if( empty($_GET['id']) || empty($_GET['causa']) ){
    exit('accesso ad area in modo non consentito');
}

include 'common/generated/include_dao.php';

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

    <form name="form1" method="post" action="add_causa_fermata_guasto.php">
        <input type="hidden" name="id_modulo" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="causa" value="<?php echo $_GET['causa']; ?>" />
        <?php
            include 'cause_fermate_guasti.php';
            for( $i=0; $i<count($nomi_gruppi); $i++ ){
                if( ($_GET['causa'] >= $gruppi_inizio[$i]) && ($_GET['causa'] <= $gruppi_fine[$i])  ){
                    echo "<p><span style=\"font-weight: bold;\">$nomi_gruppi[$i]</span> -> {$nomi_cause_fermate[$_GET['causa']]}</p>";
                }
            }
        ?>

        <p>Da Ora <input name="ora_inizio" id="ora_inizio" size="10" maxlength="5" value="<?php echo date('H')+1 .':'. date('i'); ?>" />
            <br/>
            A Ora <input name="ora_fine" id="ora_fine" value="" size="10" maxlength="5"/>
        </p>
        <p><input class="submit" type="submit" name="aggiungi" value="" />&nbsp;Aggiungi </p>
    </form>

</body>
</html>