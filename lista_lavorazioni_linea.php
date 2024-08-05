<?php

if( empty($_GET['linea']) ){
    exit('accesso in modo non autorizzato');
}
$linea = $_GET['linea'];
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
    <p>LN LA NOCERINA S.R.L</p>
    <p>MOD.60 - FOGLIO DI TRASMISSIONE DELL'ORDINE DI LAVORAZIONE DELLA LINEA <?php echo $linea; ?> - REV.1</p>
    <p>&nbsp;</p>
    <p>LAVORAZIONE DA ESEGUIRE: VERNICIATURA E SMALTATURA</p>
    <table>
        <tr><th>ID</th><th>CLIENTE</th><th>COMM.</th><th>PRODOTTO</th><th>CODICE</th><th>LAVORAZIONE</th><th>FOGLI</th></tr>
    <?php

    $fasi = DAOFactory::getFasiDAO()->queryByNumLinea($linea);
    $fase = new Fasi();
    for($i=0; $i<count($fasi); $i++){
        $fase = $fasi[$i];
        if( $fase->oraFine!=NULL ){
            continue; //se la fase è terminata non visualizzare
        }
        $commessa = DAOFactory::getCommesseDAO()->load($fase->idCommessa);
        $inizia = "<a href=\"modulo_inizia_fase.php?id=$fase->idFase\">INIZIA</a>";
        $lavorazione = "VISUALIZZA LAVORAZIONE";
        $controllo = 'CONTROLLO IN LINEA';
        if( $fase->oraInizio!=NULL ){
            $inizia ='INIZIA';
            $lavorazione = "<a href=\"modulo_lavorazione_pacco.php?id=$fase->idFase\"><img class=\"img\" src=\"img/icon_view.png\" />VISUALIZZA LAVORAZIONE</a>";
            $controllo = "<a href=\"modulo_controllo_in_linea.php?id=$fase->idFase\"><img class=\"img\" src=\"img/icon_mod.png\" />CONTROLLO IN LINEA</a>";
        }
        echo "<tr>
                <td><a href=\"visualizza_fase.php?id=$fase->idFase\">$fase->idFase</a></td>
                <td>$commessa->idPartner</td>
                <td>$fase->idCommessa</td>
                <td></td>
                <td>$fase->codiceInternoProdotto</td>
                <td>$commessa->marca</td>
                <td>$commessa->numFogli</td>
                <td>$inizia</td>
                <td>$lavorazione</td>
                <td>$controllo</td>
            </tr>";
    }

    ?>
    </table>

    <p>LAVORO DA ESEGUIRE: LITOGRAFIA</p>
    <table>
        <tr><th>ID</th><th>Commessa</th><th>num fase</th></tr>
    <?php

    $fasi_stampa = DAOFactory::getFasiStampaDAO()->queryByNumLinea($linea);
    $fase_stampa = new FasiStampa();
    for($i=0; $i<count($fasi_stampa); $i++){
        $fase_stampa = $fasi_stampa[$i];
        if( $fase_stampa->oraFine!=NULL ){
            continue; //se la fase è terminata non visualizzare
        }
        $inizia = "<a href=\"modulo_inizia_fase_stampa.php?id=$fase_stampa->idFaseStampa\">INIZIA</a>";
        $lavorazione = "VISUALIZZA LAVORAZIONE";
        $controllo = 'CONTROLLO IN LINEA';
        if( $fase_stampa->oraInizio!=NULL ){
            $inizia ='INIZIA';
            $lavorazione = "<a href=\"modulo_lavorazione_stampa_pacco.php?id=$fase_stampa->idFaseStampa\"><img class=\"img\" src=\"img/icon_view.png\" />VISUALIZZA LAVORAZIONE</a>";
            $controllo = "<a href=\"modulo_controllo_in_linea_stampa.php?id=$fase_stampa->idFaseStampa\"><img class=\"img\" src=\"img/icon_delete.png\" />CONTROLLO IN LINEA</a>";
        }
        echo "<tr>
                <td><a href=\"visualizza_fase_stampa.php?id=$fase_stampa->idFaseStampa\">$fase_stampa->idFaseStampa</a></td>
                <td>$fase_stampa->idCommessa</td>
                <td>$fase_stampa->numFase</td>
                <td>$inizia</td>
                <td>$lavorazione</td>
                <td>$controllo</td>
            </tr>";
    }

    ?>
    </table>
</body>
</html>