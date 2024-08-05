<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getUnitaMisuraDAO()->delete($_GET['id']);
        header('Location: gestione_um.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare l\'unità di misura';
    }


}

?>
