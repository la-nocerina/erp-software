<?php

if( array_key_exists( 'aggiungi', $_POST) ){

    include 'common/generated/include_dao.php';

    $associazioni_giac_fase_stampa = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->queryByIdFase($_POST['id_fase']);
    $assoc_giac_fase_s = new AssociaFasiStampaGiacenze();
    for($i=0; $i<count($associazioni_giac_fase_stampa); $i++){
        $assoc_giac_fase_s = $associazioni_giac_fase_stampa[$i];
        if( $assoc_giac_fase_s->numFogli == NULL ){
            exit('un pacco è ancora in lavorazione. non è possibile lavorarne un altro');
        }
    }

    $assoc_giac_fase_s = new AssociaFasiStampaGiacenze();
    $assoc_giac_fase_s->idFaseStampa = $_POST['id_fase_stampa'];
    $assoc_giac_fase_s->idProdottoInGiacenza = $_POST['id_giacenza'];
    $assoc_giac_fase_s->dataOra = date('Y-m-d H:i:s');

    try {
        DAOFactory::getAssociaFasiStampaGiacenzeDAO()->insert($assoc_giac_fase_s);
        //echo 'il pacco è stato aggiunto alla fase di lavorazione';
        header('Location: modulo_lavorazione_stampa_pacco.php?id='.$_POST['id_fase_stampa']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiungere il pacco in lavorazione';
        //echo $exc->__toString();
    }

    
}

?>
