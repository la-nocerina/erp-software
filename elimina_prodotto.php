<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getProdottiDAO()->delete($_GET['id']);
        header('Location: gestione_prodotti.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il prodotto';
    }


}

?>
