<?php

if( array_key_exists('salva', $_POST) ){

    include 'common/generated/include_dao.php';

    $assoc_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->load($_POST['id_giacenza'], $_POST['id_fase']);
    //if (!empty($_POST['num_fogli'])){ $assoc_giac_fase->numFogli = $_POST['num_fogli']; }else{$assoc_giac_fase->numFogli=NULL;}
    if (!empty($_POST['controllo1'])){ $assoc_giac_fase->controllo1 = $_POST['controllo1']; }else{$assoc_giac_fase->controllo1=NULL;}
    if (!empty($_POST['controllo2'])){ $assoc_giac_fase->controllo2 = $_POST['controllo2']; }else{$assoc_giac_fase->controllo2=NULL;}
    if (!empty($_POST['note'])){ $assoc_giac_fase->note = $_POST['note']; }else{$assoc_giac_fase->note=NULL;}
    if (!empty($_POST['verificatore'])){ $assoc_giac_fase->verificatore = $_POST['verificatore']; }else{$assoc_giac_fase->verificatore=NULL;}

    try {
        DAOFactory::getAssociaFasiGiacenzeDAO()->update($assoc_giac_fase);
        header('Location: modulo_lavorazione_pacco.php?id='.$_POST['id_fase']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare la lavorazione';
    }

}
else{
    echo 'accesso alla pagina in modo non autorizzato';
}
?>
