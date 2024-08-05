<?php

if(array_key_exists('aggiungi', $_POST)){
    include 'common/generated/include_dao.php';
    $modulo_fermate_guasti = new FermateGuasti();
    $modulo_fermate_guasti->linea = $_POST['linea'];
    $modulo_fermate_guasti->data = date('Y-m-d');
    $modulo_fermate_guasti->standard = $_POST['standard'];
    $modulo_fermate_guasti->operatore = $_POST['operatore'];
    switch ( $_POST['turno'] ){
        case 'M': $modulo_fermate_guasti->turno = $_POST['turno'];break;
        case 'P': $modulo_fermate_guasti->turno = $_POST['turno'];break;
        case 'N': $modulo_fermate_guasti->turno = $_POST['turno'];break;
        case 'I': $modulo_fermate_guasti->turno = $_POST['txt_intermedio'];break;
    }
    $modulo_fermate_guasti->altreCause = $_POST['altre_cause'];
    $modulo_fermate_guasti->dataVerifica = $_POST['data_verifica'];
    $modulo_fermate_guasti->rProduzione = $_POST['r_produzione'];
    $modulo_fermate_guasti->rAssicurazioneQualita = $_POST['r_ass_qualita'];
    $modulo_fermate_guasti->rManutenzione = $_POST['r_manutenzione'];

    try {
        DAOFactory::getFermateGuastiDAO()->insert($modulo_fermate_guasti);
        echo 'nuovo modulo Controllo fermate e guasti aggiunto';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiungere il modulo';
    }

}

?>
