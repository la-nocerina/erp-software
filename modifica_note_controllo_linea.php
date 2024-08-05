<?php

if( empty($_GET['scheda']) || empty($_GET['linea']) ){
    exit('accesso ad area in modo non consentito');
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

    <p>Linea: <?php echo $_GET['linea']; ?></p>
    <form name="form1" method="post" action="add_note_controllo_linea.php">
        <?php
        include 'common/generated/include_dao.php';
        $note = DAOFactory::getNoteProveDAO()->load( $_GET['scheda'], $_GET['linea'] );
        if( !$note ){
            $note = new NoteProve();
        }
        $note = get_object_vars($note);
        ?>
        <input type="hidden" name="scheda" value="<?php echo $_GET['scheda']; ?>" />
        <input type="hidden" name="linea" value="<?php echo $_GET['linea']; ?>" />

<table>
    <tr><td>&nbsp;</td><td>NOTE</td></tr>
    <?php
    for($i=1; $i<=count($test); $i++){
        $campo = "n$i";
        echo "<tr><td>$test[$i]</td><td><input type=\"text\" name=\"n$i\" size=\"50\" maxlength=\"100\" value=\"{$note[$campo]}\" /> </td></tr>";
    }

    ?>
</table>
        
     <p><input class="submit" type="submit" name="salva" value="" />&nbsp;Salva</p>
    </form>
    
</body>
</html>