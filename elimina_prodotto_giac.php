<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getProdottiInGiacenzaDAO()->delete($_GET['id']);
        header('Location: gestione_prodotti_in_giacenza.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il prodotto';
    }


}

?>
