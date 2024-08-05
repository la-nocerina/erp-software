<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
<p>Gestione schede di produzione</p>
<table>
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Ora</th>
        <th>Linea</th>
        <th>Turno</th>
    </tr>

    <?php

    include 'common/generated/include_dao.php';
    $schede_produzione = DAOFactory::getSchedeProduzioneDAO()->queryAll();
    $num_schede_p = count($schede_produzione);
    $scheda = new SchedeProduzione();
    for($i=0; $i<$num_schede_p; $i++){
        $scheda = $schede_produzione[$i];
        echo '<tr>';
        echo "<td><a href=\"visualizza_scheda_produzione.php?id=$scheda->idSchedaProduzione\">$scheda->idSchedaProduzione</a></td>";
        echo "<td>$scheda->data</td>";
        echo "<td>$scheda->ora</td>";
        echo "<td>$scheda->linea</td>";
        echo "<td>$scheda->turno</td>";
        echo "<td><a href=\"elimina_scheda_produzione.php?id=$scheda->idSchedaProduzione\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>";
        echo "<td><a href=\"modifica_scheda_produzione.php?id=$scheda->idSchedaProduzione\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>";
        echo '</tr>';
    }

    ?>
    
</table>
<p><a href="modulo_add_scheda_produzione.php"><img class="img" src="img/icon_add.png" />Aggiungi scheda di produzione</a></p>
</body>
</html>
