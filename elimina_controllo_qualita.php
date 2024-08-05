<?php

if( !empty($_GET['id']) ){
    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getControlliQualitaDAO()->delete( $_GET['id'] );
        header( 'Location: gestione_controllo_qualita.php' );
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la scheda di controllo qualità';
    }

}
else{
    echo 'accesso in modo non consentito';
}

?>
