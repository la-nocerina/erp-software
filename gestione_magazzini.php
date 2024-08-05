<?php

include 'common/generated/include_dao.php';
$magazzini = DAOFactory::getMagazziniDAO()->queryAll();
$num_magazzini = count($magazzini);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />
<title>Documento senza titolo</title>
</head>

<body>
<br />
	<div id="menu">
        <div class="gruppo">MAGAZZINO
		 <div id="voci">
            <p class="voce"><a href="gestione_magazzini.php">Gestione magazzino</a></p>
            ..................................
            <p class="voce"><a href="gestione_ingresso_materiali.php">Ingresso materiali</a></p>
            <p class="voce"><a href="gestione_categorie.php">Gestione categorie</a></p>
            <p class="voce"><a href="gestione_prodotti.php">Gestione prodotti</a></p>
            <p class="voce"><a href="gestione_prodotti_in_giacenza.php">Prodotti in giacenza</a></p>
            <p class="voce"><a href="gestione_certificati_collaudo.php">Certificati Collaudo</a></p>
            <p class="voce"><a href="gestione_controllo_qualita.php">Gestione controllo qualità</a></p>
            ..................................
            <p class="voce"><a href="gestione_um.php">Unità di misura</a></p>
		 </div>
         </div>

        <div class="gruppo">PARTNER
         <div id="voci">
            <p class="voce"><a href="gestione_nazioni.php">Gestione nazioni</a></p>
            <p class="voce"><a href="gestione_gruppi_partner.php">Gestione gruppi</a></p>
            <p class="voce"><a href="gestione_partner.php">Gestione partner</a></p>
		 </div>
         </div>

        <div class="gruppo">PRODUZIONE
         <div id="voci">
            <p class="voce"><a href="gestione_prove_controlli.php">Prove e controlli di laboratorio</a></p>
            <p class="voce"><a href="lista_linee_fermate_guasti.php">Fermate e guasti</a></p>
            <p class="voce">Richieste di intervento</p>
  			..................................
            <p class="voce"><a href="gestione_commesse.php">Gestione commesse</a></p>
            <p class="voce"><a href="gestione_schede_produzione.php">Schede di produzione</a></p>
            <p class="voce"><a href="lista_linee.php">Lista linee</a></p>
            <p class="voce"><a href="lista_linee_carica_batch.php">Caricamento Consumabile in macchina con Batch</a></p>
		 </div>
         </div>

        <div class="gruppo">LITOGRAFIA
         <div id="voci">
            <p class="voce"><a href="gestione_prelievo_lastre.php">Prelievo lastre</a></p>
            <p class="voce"><a href="gestione_deposito_lastre.php">Deposito lastre</a></p>
         </div>
         </div>
	</div>

<br />

Gestione Magazzini

<table>

    <tr><th>id</th><th>Descrizione</th></tr>
    <?php
		$classi[0]= ' class="tr1" ';
		$classi[1]= ' class="tr2" ';
        $magazzino = new Magazzini();
        for($i=0;$i<$num_magazzini;$i++){
            $magazzino = $magazzini[$i];
			$classe= $classi[$i%2];
			echo "<tr $classe >
            <td>{$magazzino->idMagazzino}</td>
            <td>{$magazzino->descrizione}</td>
            <td><a href=\"elimina_magazzino.php?id={$magazzino->idMagazzino}\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_magazzino.php?id={$magazzino->idMagazzino}\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_magazzino.html"><img class="img" src="img/icon_add.png" />Aggiungi magazzino</a></p>
</body>
</html>