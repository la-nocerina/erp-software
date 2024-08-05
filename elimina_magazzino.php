<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getMagazziniDAO()->delete($_GET['id']);
        header('Location: gestione_magazzini.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il magazzino';
    }


}

?>
