<?php

include 'common/generated/include_dao.php';
$prodotti = DAOFactory::getProdottiDAO()->queryAll();
$num_prodotti = count($prodotti);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
Gestione Prodotti

<table>

    <tr><th>ID</th><th>Codice Interno</th><th>Descrizione</th></tr>
    <?php
        for($i=0;$i<$num_prodotti;$i++){
            $prodotto = new Prodotti();
            $prodotto = $prodotti[$i];
            echo "<tr>
            <td>{$prodotto->idProdotto}</td>
            <td>{$prodotto->codiceInterno}</td>
            <td>{$prodotto->descrizione}</td>
            <td><a href=\"elimina_prodotto.php?id={$prodotto->idProdotto}\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_prodotto.php?id={$prodotto->idProdotto}\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_prodotto.php"><img class="img" src="img/icon_add.png" />Aggiungi Prodotto</a></p>
</body>
</html>