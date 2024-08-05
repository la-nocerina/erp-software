<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getRicezioneMaterialiDAO()->delete($_GET['id']);
        header('Location: gestione_ingresso_materiali.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la scheda di ingresso merci';
    }


}

?>
