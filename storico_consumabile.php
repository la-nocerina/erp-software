<?php

if( empty($_GET['id']) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['id']);
if(!$prodotto_giac){
    exit('accesso ad area assente');
}
$prodotto = DAOFactory::getProdottiDAO()->load($prodotto_giac->idProdotto);
$unita_misura = DAOFactory::getUnitaMisuraDAO()->load($prodotto->idUnitaMisura);

$batch_fasi = DAOFactory::getBatchFaseDAO()->queryByIdProdottoGiacenza($_GET['id'])

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
    <p>Storico prodotto</p>
    <p>Id prodotto: <?php echo $prodotto_giac->idProdottoInGiacenza; ?><br/>
       Batch: <?php echo $prodotto_giac->batch; ?> <br/>
       Codice interno: <?php echo $prodotto->codiceInterno; ?> <br/>
       Quantità disponibile: <?php echo $prodotto_giac->quantita .' '. $unita_misura->descrizioneUm; ?> </p>
    <p>Consumi:</p>
    <?php

    $batch = new BatchFase();
    for($i=0; $i<count($batch_fasi); $i++){
        $batch = $batch_fasi[$i];
        echo "<p>Fase: $batch->idFase - consumo: $batch->consumo $unita_misura->descrizioneUm</p>";

    }
    ?>
</body>
</html>