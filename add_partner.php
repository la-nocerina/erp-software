<?php

if(array_key_exists('aggiungi', $_POST) && !empty($_POST['ragione_sociale']) ){

    include 'common/generated/include_dao.php';
    $partner = new Partner();

    $partner->ragioneSociale = $_POST['ragione_sociale'];

    if(!empty($_POST['piva']) ){
        $partner->partitaIva = $_POST['piva'];
    }
    if(!empty($_POST['codice_fiscale']) ){
        $partner->codiceFiscale = $_POST['codice_fiscale'];
    }
    if(!empty($_POST['indirizzo']) ){
        $partner->indirizzo = $_POST['indirizzo'];
    }
    if(!empty($_POST['provincia']) ){
        $partner->provincia = $_POST['provincia'];
    }
    if(!empty($_POST['comune']) ){
        $partner->comune = $_POST['comune'];
    }
    if(!empty($_POST['cap']) ){
        $partner->cap = $_POST['cap'];
    }
    if(!empty($_POST['nazione']) ){
        $partner->idNazione = $_POST['nazione'];
    }
    if(!empty($_POST['sito_web']) ){
        $partner->sitoWeb = $_POST['sito_web'];
    }
    $partner->creatoIl = date("Y-m-d");
    $partner->aggiornatoIl = date("Y-m-d");
    $partner->isAttivo=1;
    try {
        $id = DAOFactory::getPartnerDAO()->insert($partner);
        echo 'partner inserito';
        header('Location: modifica_partner.php?id='.$id);
    }
    catch (Exception $exc) {
        echo 'partner non inserito';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
