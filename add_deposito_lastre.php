<?php

if(!array_key_exists('aggiungi', $_POST)){
    exit('accesso in modo non consentio');
}

include 'common/generated/include_dao.php';
$deposito = new DepositoLastre();

$deposito->idPartner = $_POST['id_partner'];
if(!empty ($_POST['nome_lavoro'])){ $deposito->nomeLavoro = $_POST['nome_lavoro']; }
if(!empty ($_POST['num_lastre'])){ $deposito->numLastre = $_POST['num_lastre']; }
if(!empty ($_POST['colori'])){ $deposito->colori = $_POST['colori']; }
if(!empty ($_POST['firma'])){ $deposito->firma = $_POST['firma']; }
$deposito->daRifare = $_POST['da_rifare'];
$deposito->data = date('Y-m-d');


try {
    DAOFactory::getDepositoLastreDAO()->insert($deposito);
    header('Location: gestione_deposito_lastre.php');
}
catch (Exception $exc) {
    echo 'non è stato possibile aggiungere il deposito delle lastre';
}

?>
