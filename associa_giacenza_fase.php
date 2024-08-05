<?php

if( array_key_exists( 'aggiungi', $_POST) ){

    include 'common/generated/include_dao.php';

    $associazioni_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFase($_POST['id_fase']);
    $assoc_giac_fase = new AssociaFasiGiacenze();
    for($i=0; $i<count($associazioni_giac_fase); $i++){
        $assoc_giac_fase = $associazioni_giac_fase[$i];
        if( $assoc_giac_fase->numFogli == NULL ){
            exit('un pacco è ancora in lavorazione. non è possibile lavorarne un altro');
        }
    }

    $assoc_giac_fase = new AssociaFasiGiacenze();
    $assoc_giac_fase->idFase = $_POST['id_fase'];
    $assoc_giac_fase->idProdottoInGiacenza = $_POST['id_giacenza'];
    $assoc_giac_fase->dataOra = date('Y-m-d H:i:s');

    try {
        DAOFactory::getAssociaFasiGiacenzeDAO()->insert($assoc_giac_fase);
        //echo 'il pacco è stato aggiunto alla fase di lavorazione';
        header('Location: modulo_lavorazione_pacco.php?id='.$_POST['id_fase']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiungere il pacco in lavorazione';
        //echo $exc->__toString();
    }

    
}

?>
