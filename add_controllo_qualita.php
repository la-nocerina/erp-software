<?php

if( array_key_exists('aggiungi', $_POST)){

    include 'common/generated/include_dao.php';
    $scheda = new ControlliQualita();
    $scheda->idPartner = $_POST['id_partner'];
    $scheda->ddtN = $_POST['ddt_n'];
    $scheda->dataDdt = $_POST['data_ddt'];
    $scheda->numColli = $_POST['num_colli'];
    $scheda->kg = $_POST['kg'];
    $scheda->numFerriera = $_POST['num_ferriera'];
    $scheda->tipo = $_POST['tipo'];
    if( ($_POST['tipo']=='corpi') && !empty($_POST['txt_corpi']) ){
        $scheda->txtCorpi = $_POST['txt_corpi'];
    }
    $scheda->operatore = $_POST['operatore'];
    $scheda->rLaboratorio = $_POST['r_laboratorio'];

    try {
        $t = new Transaction();
        DAOFactory::getControlliQualitaDAO()->insert($scheda);
        $data = new DateControlliQualita();
        $data->idControlliQualita = $scheda->idControlliQualita;
        $data->data = date('Y-m-d');
        DAOFactory::getDateControlliQualitaDAO()->insert($data);
        $t->commit();
        echo 'scheda di controllo qualità aggiunta';
    }
    catch (Exception $exc) {
        $t->rollback();
        echo 'non è stato possibile aggiungere la scheda di controllo qualità';
    }

}else{
    echo 'accesso in modo non consentito';
}


?>
