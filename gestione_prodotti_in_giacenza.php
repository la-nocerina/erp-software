<?php

include 'common/generated/include_dao.php';
$prodotti = DAOFactory::getProdottiInGiacenzaDAO()->queryAll();
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
Gestione Prodotti in giacenza

<table>

    <tr><th>ID</th><th>Codice</th><th>Batch</th><th>Descrizione</th><th>Quantità</th><th>Magazzino</th></tr>
    <?php
        for($i=0;$i<$num_prodotti;$i++){
            $prodotto_giac = new ProdottiInGiacenza();
            $prodotto_giac = $prodotti[$i];
            $prodotto = DAOFactory::getProdottiDAO()->load($prodotto_giac->idProdotto);
            if(empty($prodotto_giac->idMagazzino) ){
                $magazzino = new Magazzini();
            }else{
                $magazzino = DAOFactory::getMagazziniDAO()->load($prodotto_giac->idMagazzino);
            }
            echo "<tr>
            <td>{$prodotto_giac->idProdottoInGiacenza}</td>
            <td>{$prodotto->codiceInterno}</td>
            <td>{$prodotto_giac->batch}</td>
            <td>{$prodotto->descrizione}</td>
            <td>{$prodotto_giac->quantita}</td>
            <td>{$magazzino->descrizione}</td>
            <td><a href=\"elimina_prodotto_giac.php?id={$prodotto_giac->idProdottoInGiacenza}\"><img class=\"img\" src=\"img/icon_delete.png\" /></a></td>
            <td><a href=\"modifica_prodotto_giac.php?id={$prodotto_giac->idProdottoInGiacenza}\"><img class=\"img\" src=\"img/icon_mod.png\" /></a></td>";

            $certificati = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($prodotto_giac->idProdottoInGiacenza);
            if($certificati){
                echo "<td><a href=\"recupera_certificato_collaudo.php?id={$prodotto_giac->idProdottoInGiacenza}\">Cert.Coll</a></td>
                        <td><a href=\"spezza_pacco.php?id=$prodotto_giac->idProdottoInGiacenza\">Spezza pacco</a></td>
                    <td><a href=\"storico_giacenza_paccho.php?id={$prodotto_giac->idProdottoInGiacenza}\">Storico</a></td>
                    <td><a href=\"modulo_uscita_pacco.php?id={$prodotto_giac->idProdottoInGiacenza}\">Uscita Pacco</a></td>";

            }else{

                echo "<td><a href=\"visualizza_cartellino_consumabili.php?id={$prodotto_giac->idProdottoInGiacenza}\">Cartellino</a></td>
                    <td>&nbsp;</td>
                    <td><a href=\"storico_consumabile.php?id={$prodotto_giac->idProdottoInGiacenza}\">Storico</a></td>
                    <td>&nbsp;</td>";
            }
            
            echo "</tr>";
        }
    ?>
</table>
<p><a href="modulo_add_prodotto_giac.php"><img class="img" src="img/icon_add.png" />Aggiungi Prodotto a magazzino</a></p>
</body>
</html>