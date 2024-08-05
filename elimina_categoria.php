<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getCategorieProdDAO()->delete($_GET['id']);
        header('Location: gestione_categorie.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la categoria';
    }


}

?>
