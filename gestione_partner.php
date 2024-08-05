<?php

include 'common/generated/include_dao.php';
$partners = DAOFactory::getPartnerDAO()->queryAll();
$num_partners = count($partners);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
Gestione Partner

<table>

    <tr><th>id</th><th>Ragione Sociale</th><th>Attivo</th></tr>
    <?php
        $partner = new Partner();
        for($i=0;$i<$num_partners;$i++){
            $partner = $partners[$i];
            echo "<tr>
            <td>{$partner->idPartner}</td>
            <td>{$partner->ragioneSociale}</td>
            <td>{$partner->isAttivo}</td>
            <td><a href=\"elimina_partner.php?id={$partner->idPartner}\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_partner.php?id={$partner->idPartner}\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_partner.php"><img class="img" src="img/icon_add.png" />Aggiungi Partner</a></p>
</body>
</html>