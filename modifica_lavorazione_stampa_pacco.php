<?php

if( array_key_exists('salva', $_POST) ){

    include 'common/generated/include_dao.php';

    $assoc_giac_fase_s = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->load($_POST['id_giacenza'], $_POST['id_fase_stampa']);
    //if (!empty($_POST['num_fogli'])){ $assoc_giac_fase->numFogli = $_POST['num_fogli']; }else{$assoc_giac_fase->numFogli=NULL;}
    if (!empty($_POST['controllo1'])){ $assoc_giac_fase_s->controllo1 = $_POST['controllo1']; }else{$assoc_giac_fase_s->controllo1=NULL;}
    if (!empty($_POST['controllo2'])){ $assoc_giac_fase_s->controllo2 = $_POST['controllo2']; }else{$assoc_giac_fase_s->controllo2=NULL;}
    if (!empty($_POST['note'])){ $assoc_giac_fase_s->note = $_POST['note']; }else{$assoc_giac_fase_s->note=NULL;}
    if (!empty($_POST['verificatore'])){ $assoc_giac_fase_s->verificatore = $_POST['verificatore']; }else{$assoc_giac_fase_s->verificatore=NULL;}

    try {
        DAOFactory::getAssociaFasiStampaGiacenzeDAO()->update($assoc_giac_fase_s);
        header('Location: modulo_lavorazione_stampa_pacco.php?id='.$_POST['id_fase_stampa']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare la lavorazione';
    }

}
else{
    echo 'accesso alla pagina in modo non autorizzato';
}
?>
