<?php

include 'common/generated/include_dao.php';
$um = DAOFactory::getUnitaMisuraDAO()->queryAll();
$num_um = count($um);

//print_r( $um );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
Gestione Unità di misura

<table>

    <tr><th>id</th><th>Descrizione</th></tr>
    <?php
        for($i=0;$i<$num_um;$i++){
            $u = $um[$i];
            echo "<tr>
            <td>{$u->idUnitaMisura}</td>
            <td>{$u->descrizioneUm}</td>
            <td><a href=\"elimina_um.php?id={$u->idUnitaMisura}\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_um.php?id={$u->idUnitaMisura}\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_um.html"><img class="img" src="img/icon_add.png" />Aggiungi UM</a></p>
</body>
</html>