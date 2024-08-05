<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getCommesseDAO()->delete($_GET['id']);
        header('Location: gestione_commesse.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la commessa';
    }

}

?>
