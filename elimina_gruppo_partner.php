<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getGruppiPartnerDAO()->delete($_GET['id']);
        header('Location: gestione_gruppi_partner.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il gruppo';
    }


}

?>
