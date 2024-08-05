<?php

if ( !empty($_GET['fase']) ){

    include 'common/generated/include_dao.php';

    $associazioni_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFase($_GET['fase']);
    $assoc_giac_fase = new AssociaFasiGiacenze();
    for($i=0; $i<count($associazioni_giac_fase); $i++){
        $assoc_giac_fase = $associazioni_giac_fase[$i];
        if( $assoc_giac_fase->numFogli == NULL ){
            exit('un pacco è ancora in lavorazione. non è possibile terminare la fase di lavorazione');
        }
    }

    $fase = DAOFactory::getFasiDAO()->load($_GET['fase']);
    $fase->oraFine = date('G:i');

    try {
        DAOFactory::getFasiDAO()->customUpdate($fase);
        echo 'la fase di lavorazione è stata terminata';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile terminare la fase di lavorazione';
    }

}

?>
