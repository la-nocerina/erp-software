<?php

if ( !empty($_GET['fasestampa']) ){

    include 'common/generated/include_dao.php';

    $associazioni_giac_fase_stampa = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->queryByIdFase($_GET['fasestampa']);
    $assoc_giac_fase_s = new AssociaFasiStampaGiacenze();
    for($i=0; $i<count($associazioni_giac_fase_stampa); $i++){
        $assoc_giac_fase_s = $associazioni_giac_fase_stampa[$i];
        if( $assoc_giac_fase_s->numFogli == NULL ){
            exit('un pacco è ancora in lavorazione. non è possibile terminare la fase di lavorazione');
        }
    }

    $fase_stampa = DAOFactory::getFasiStampaDAO()->load($_GET['fasestampa']);
    $fase_stampa->oraFine = date('G')+1 . ':' . date('i');

    try {
        DAOFactory::getFasiStampaDAO()->customUpdate($fase_stampa);
        echo 'la fase di lavorazione è stata terminata';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile terminare la fase di lavorazione';
    }

}

?>
