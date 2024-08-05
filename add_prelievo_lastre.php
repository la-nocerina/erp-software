<?php

if(!array_key_exists('aggiungi', $_POST)){
    exit('accesso in modo non consentio');
}

include 'common/generated/include_dao.php';
$prelievo = new PrelievoLastre();

$prelievo->idPartner = $_POST['id_partner'];
if(!empty ($_POST['nome_lavoro'])){ $prelievo->nomeLavoro = $_POST['nome_lavoro']; }
if(!empty ($_POST['num_lastre'])){ $prelievo->numLastre = $_POST['num_lastre']; }
if(!empty ($_POST['colori'])){ $prelievo->colori = $_POST['colori']; }
if(!empty ($_POST['firma'])){ $prelievo->firma = $_POST['firma']; }
$prelievo->data = date('Y-m-d');

try {
    DAOFactory::getPrelievoLastreDAO()->insert($prelievo);
    header('Location: gestione_prelievo_lastre.php');
}
catch (Exception $exc) {
    echo 'non è stato possibile aggiungere il prelievo delle lastre';
}

?>
