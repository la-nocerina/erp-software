<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getPartnerDAO()->delete($_GET['id']);
        header('Location: gestione_partner.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il partner';
    }


}

?>
