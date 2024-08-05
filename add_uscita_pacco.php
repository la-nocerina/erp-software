<?php

if( !array_key_exists('salva', $_POST) || empty($_POST['ddt_n']) || empty($_POST['data_ddt'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';
$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_POST['id_giacenza']);


$prodotto_giac->uscitaDdtN = $_POST['ddt_n'];
$prodotto_giac->uscitaDataDdt = $_POST['data_ddt'];
$prodotto_giac->idMagazzino = NULL;

try {
    DAOFactory::getProdottiInGiacenzaDAO()->customUpdate($prodotto_giac);
    echo 'il pacco risulta inviato al cliente';
}
catch (Exception $exc) {
    echo 'non è stato possibile salvare l\'invio del pacco al cliente';
}

?>
