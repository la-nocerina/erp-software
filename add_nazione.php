<?php

if( !array_key_exists('aggiungi', $_POST) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';
$nazione = new Nazioni();
$nazione->nomeNazione = $_POST['nome_nazione'];
try{
    DAOFactory::getNazioniDAO()->insert($nazione);
    echo 'Nazione aggiunta';
}
catch(Exception $exc){
    echo 'Non è stato possibile aggiungere la nazione';
}

?>
