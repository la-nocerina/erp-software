<?php

if( !empty($_GET['linea']) ){
    $linea = $_GET['linea'];
}
elseif( !empty($_POST['linea']) ) {
    $linea = $_POST['linea'];
}else{
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$fase = DAOFactory::getFasiDAO()->loadFaseApertaByLinea($linea);

if( !$fase ){
    exit('in questo momento non è stata avviata nessuna fase di lavorazione sulla linea '.$linea);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
</head>

<body>
    <p>Sulla linea <?php echo $linea; ?> è in lavorazione la fase <?php echo $fase->numFase; ?>
        della commessa <?php echo $fase->idCommessa; ?>. </p>
    <form name="form1" method="post" action="modulo_add_batch_fase.php">
        <input type="hidden" name="linea" value="<?php echo $linea; ?>" />
        Codice: <input name="codice" type="text" size="20" />
        <input class="select" type="submit" name="cerca" value="&nbsp;&nbsp;&nbsp;&nbsp;Cerca" />
    </form><br />

<table id="tabella_fasi">
    <tr><th>ID</th><th>COD.PRODOTTO</th><th>BATCH</th><th>QUANTITA'</th></tr>
<?php
if(!empty($_POST['codice'])){
    include 'common/generated/include_dao.php';
    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_POST['codice']);
    if($prodotto_giac){
        $prodotto = DAOFactory::getProdottiDAO()->load( $prodotto_giac->idProdotto );
        echo "<tr>
                <td>$prodotto_giac->idProdottoInGiacenza</td>
                <td>$prodotto->codiceInterno</td>
                <td>$prodotto_giac->batch</td>
                <td>$prodotto_giac->quantita</td>";
        if( $fase->codiceInternoProdotto == $prodotto->codiceInterno ){
            echo "<td><a href=\"add_batch_fase.php?fase=$fase->idFase&id_giac=$prodotto_giac->idProdottoInGiacenza\">Aggiungi</a></td>";
        }else{
            echo "<td>Non caricabile</td>";
        }

        echo "</tr>";
    }
}
?>
</table>


    <p>Batch già assegnati alla fase di lavorazione:<br/>
    <?php
    $lista_batch_fase = DAOFactory::getBatchFaseDAO()->queryByFase($fase->idFase);
    $batch = new BatchFase();
    for($i=0; $i<count($lista_batch_fase); $i++){
        $batch = $lista_batch_fase[$i];
        $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($batch->idProdottoInGiacenza);
        if( empty($batch->consumo) ){
            echo "id: $prodotto_giac->idProdottoInGiacenza  -  batch: $prodotto_giac->batch  - <a href=\"modulo_scarico_consumabili.php?id_giac=$prodotto_giac->idProdottoInGiacenza&fase=$fase->idFase\">Scarica materiale dalla macchina</a> - <a href=\"elimina_batch_fase.php?id_giac=$prodotto_giac->idProdottoInGiacenza&fase=$fase->idFase\">Elimina</a><br/>";
        }else{
            echo "id: $prodotto_giac->idProdottoInGiacenza  -  batch: $prodotto_giac->batch  - Consumo: $batch->consumo <br/>";
        }

    }
    ?>
        </p>
</body>
</html>