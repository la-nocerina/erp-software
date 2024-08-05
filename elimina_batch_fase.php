<?php

if(!empty($_GET['id_giac']) && !empty($_GET['fase']) ){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getBatchFaseDAO()->delete($_GET['id_giac'], $_GET['fase']);
        echo 'il batch non è più assegnato alla fase di lavorazione';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare l\'associazione batch->fase';
    }


}

?>
