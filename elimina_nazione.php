<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getNazioniDAO()->delete($_GET['id']);
        header('Location: gestione_nazioni.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la nazione';
    }


}

?>
