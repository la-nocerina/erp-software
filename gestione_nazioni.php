<?php

include 'common/generated/include_dao.php';
$nazioni = DAOFactory::getNazioniDAO()->queryAll();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
Gestione Nazioni

<table>

    <tr><th>id</th><th>Nazione</th></tr>
    <?php
        $nazione =new Nazioni();
        for($i=0;$i<count($nazioni);$i++){
            $nazione = $nazioni[$i];
            echo "<tr>
            <td>$nazione->idNazione</td>
            <td>$nazione->nomeNazione</td>
            <td><a href=\"elimina_nazione.php?id=$nazione->idNazione\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_nazione.php?id=$nazione->idNazione\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_nazione.html"><img src="img/icon_add.png" />Aggiungi Nazione</a></p>
</body>
</html>