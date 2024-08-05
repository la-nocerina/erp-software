<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getSchedeProduzioneDAO()->delete($_GET['id']);
        header('Location: gestione_schede_produzione.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la scheda di produzione';
    }

}

?>
