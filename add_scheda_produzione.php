<?php

if(array_key_exists('aggiungi', $_POST)){

    include 'common/generated/include_dao.php';
    $scheda_produzione = new SchedeProduzione();

    if(!empty($_POST['turno'])){
        switch ( $_POST['turno'] ){
            case 'M': $scheda_produzione->turno = $_POST['turno'];break;
            case 'P': $scheda_produzione->turno = $_POST['turno'];break;
            case 'N': $scheda_produzione->turno = $_POST['turno'];break;
            case 'I': $scheda_produzione->turno = $_POST['txt_intermedio'];break;
        }
    }
    if(!empty($_POST['tipo_macchina'])){ $scheda_produzione->tipoMacchina = $_POST['tipo_macchina']; }
    if(!empty($_POST['macchinista'])){ $scheda_produzione->macchinista = $_POST['macchinista']; }
     $scheda_produzione->idPartner = $_POST['id_partner'];
    if(!empty($_POST['lavorazione'])){ $scheda_produzione->lavorazione = $_POST['lavorazione']; }
    $scheda_produzione->data = $_POST['data'];
    $scheda_produzione->ora = $_POST['ora'];
    $scheda_produzione->linea = $_POST['linea'];

    try {
        DAOFactory::getSchedeProduzioneDAO()->insert($scheda_produzione);
        echo 'scheda di produzione aggiunta';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiungere la scheda di produzione';
    }

}

?>
