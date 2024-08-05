<?php

if( array_key_exists('aggiungi', $_POST) ){

    include 'common/generated/include_dao.php';
    $scheda = new RicezioneMateriali();
    
    $scheda->idPartner = $_POST['id_partner'];
    
    $anno = date('Y');
    $last_scheda = DAOFactory::getRicezioneMaterialiDAO()->loadLastByAnno($anno);
    $numero='1';
    if($last_scheda){
        $parti_num_documento = explode('/', $last_scheda->numDocumento);
        $numero = $parti_num_documento[0];
        $numero++;
    }

    $scheda->numDocumento = $numero . '/' . date('Y');
    
    if( !empty($_POST['ddt_n']) ){ $scheda->ddtN = $_POST['ddt_n']; }
    if( !empty($_POST['num_colli']) ){ $scheda->numColli = $_POST['num_colli']; }
    if( !empty($_POST['num_ordine']) ){ $scheda->ordineN = $_POST['num_ordine']; }
    if( !empty($_POST['kg']) ){ $scheda->kg = $_POST['kg']; }
    if( array_key_exists('destinazione', $_POST) ){
        $destinazione = $_POST['destinazione'];
        if( !empty($destinazione) ){
            $scheda->destinazione = implode('|', $destinazione);
        }
    }
    $scheda->tipo = $_POST['tipo'];
    switch( $_POST['tipo'] ){
        case '1': $scheda->tipoNote = $_POST['txt_capsule']; break;
        case '2': $scheda->tipoNote = $_POST['txt_fondi']; break;
        case '3': $scheda->tipoNote = $_POST['txt_corpi']; break;
        case '4': $scheda->tipoNote = $_POST['txt_tappi']; break;
        case '5': $scheda->tipoNote = $_POST['txt_altro']; break;
    }
    $scheda->idPartnerProvenienza = $_POST['provenienza'];

    if( array_key_exists('controllo', $_POST) ){
        $controllo = $_POST['controllo'];
        if( !empty($controllo) ){
            $scheda->controlli = implode('|', $controllo);
        }
    }
    $scheda->n1 = $_POST['n1'];
    $scheda->n2 = $_POST['n2'];
    $scheda->n3 = $_POST['n3'];
    $scheda->n4 = $_POST['n4'];
    $scheda->n5 = $_POST['n5'];
    $scheda->n6 = $_POST['n6'];
    $scheda->n7 = $_POST['n7'];
    $scheda->n8 = $_POST['n8'];
    $scheda->n9 = $_POST['n9'];
    $scheda->n10 = $_POST['n10'];
    $scheda->n11 = $_POST['n11'];
    $scheda->n12 = $_POST['n12'];

    if( !empty($_POST['compilatore']) ){ $scheda->compilatore = $_POST['compilatore']; }
    if( !empty($_POST['data_ddt']) ){ $scheda->dataDdt = $_POST['data_ddt']; }
    if( !empty($_POST['data_scarico']) ){ $scheda->dataScarico = $_POST['data_scarico']; }

    try {
        DAOFactory::getRicezioneMaterialiDAO()->customInsert($scheda);
        echo 'modulo di ricevimento materiali inserito';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile inserire il modulo di ricevimento materiali';
        echo $exc->__toString();
    }


}else{
    echo 'accesso in modo non consentito';
}

?>
