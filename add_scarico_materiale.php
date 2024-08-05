<?php

if( !array_key_exists('salva', $_POST) || empty($_POST['id_giacenza']) || empty($_POST['fase']) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$batch_fase = DAOFactory::getBatchFaseDAO()->load($_POST['id_giacenza'], $_POST['fase']);
$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_POST['id_giacenza']);

$batch_fase->consumo = $prodotto_giac->quantita - $_POST['quantita'];

$prodotto_giac->quantita = $_POST['quantita'];


try {
    $t = new Transaction();
    DAOFactory::getBatchFaseDAO()->update($batch_fase);
    DAOFactory::getProdottiInGiacenzaDAO()->customUpdate($prodotto_giac);
    $t->commit();
    echo 'la quantità del materiale è stata aggiornata';
}
catch (Exception $exc) {
    $t->rollback();
    echo 'non è stato possibile aggiornare la quantità di materiale';
}


?>
