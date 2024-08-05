<?php

if( empty($_GET['fase']) || empty($_GET['id_giac']) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$batch_fase  = new BatchFase();

$batch_fase->idFase = $_GET['fase'];
$batch_fase->idProdottoInGiacenza =$_GET['id_giac'];

try {
    DAOFactory::getBatchFaseDAO()->insert($batch_fase);
    echo 'il prodotto è stato assegnato alla fase di lavorazione';
}
catch (Exception $exc) {
    echo 'non è stato possibile assegnare il prodotto alla fase di lavorazione';
}


?>
