<?php

if(empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />
<title>Documento senza titolo</title>
</head>
<body>
    <table>
        <tr><th>ID</th><th>Descrizione<br/>lavorazione</th><th>Codice Prodotto</th><th>Numero attuale fogli</th> </tr>
        <?php
        $fasi = DAOFactory::getFasiDAO()->queryByIdCommessa($_GET['id']);
        $fase = new Fasi();
        for($i=0; $i<count($fasi); $i++){
            $fase = $fasi[$i];

            $num_fogli = 0;
            $associazioni_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFase($fase->idFase);
            $assoc_giac_fase = new AssociaFasiGiacenze();
            for($j=0; $j<count($associazioni_giac_fase); $j++){
                $assoc_giac_fase = $associazioni_giac_fase[$j];
                $num_fogli += $assoc_giac_fase->numFogli;
            }

            echo "<tr>
                <td><a href=\"visualizza_fase.php?id=$fase->idFase\">$fase->idFase</a></td>
                <td>$fase->descrizione</td>
                <td>$fase->codiceInternoProdotto</td>
                <td>$num_fogli</td>
                <td>$fase->oraInizio</td>
                <td>$fase->oraFine</td>
                <td><a href=\"modulo_fase_terminata.php?id=$fase->idFase\">Modulo fase terminata</a></td>
                </tr>";
        }

        $fasi_stampa = DAOFactory::getFasiStampaDAO()->queryByIdCommessa($_GET['id']);
        $fase_stampa = new FasiStampa();
        for($i=0; $i<count($fasi_stampa); $i++){
            $fase_stampa = $fasi_stampa[$i];

            $num_fogli = 0;
            $associazioni_giac_fase_stampa = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->queryByIdFase($fase_stampa->idFaseStampa);
            $assoc_giac_fase_s = new AssociaFasiStampaGiacenze();
            for($j=0; $j<count($associazioni_giac_fase_stampa); $j++){
                $assoc_giac_fase_s = $associazioni_giac_fase_stampa[$j];
                $num_fogli += $assoc_giac_fase_s->numFogli;
            }

            echo "<tr>
                <td><a href=\"visualizza_fase_stampa.php?id=$fase_stampa->idFaseStampa\">$fase_stampa->idFaseStampa</a></td>
                <td>$fase_stampa->descrizione</td>
                <td>&nbsp;</td>
                <td>$num_fogli</td>
                <td>$fase_stampa->oraInizio</td>
                <td>$fase_stampa->oraFine</td>
                <td><a href=\"modulo_fase_stampa_terminata.php?id=$fase_stampa->idFaseStampa\">Modulo fase terminata</a></td>
                </tr>";

        }
        ?>
    </table>

</body>
</html>