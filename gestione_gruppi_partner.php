<?php

include 'common/generated/include_dao.php';
$gruppi = DAOFactory::getGruppiPartnerDAO()->queryAll();
$num_gruppi = count($gruppi);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
Gestione Gruppi Partner

<table>

    <tr><th>id</th><th>Nome Gruppo</th></tr>
    <?php
    $gruppo = new GruppiPartner();
        for($i=0;$i<$num_gruppi;$i++){
            $gruppo = $gruppi[$i];
            echo "<tr>
            <td>{$gruppo->idGruppoPartner}</td>
            <td>{$gruppo->nome}</td>
            <td><a href=\"elimina_gruppo_partner.php?id={$gruppo->idGruppoPartner}\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_gruppo_partner.php?id={$gruppo->idGruppoPartner}\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_gruppo_partner.html"><img class="img" src="img/icon_add.png" />Aggiungi Gruppo Partner</a></p>
</body>
</html>