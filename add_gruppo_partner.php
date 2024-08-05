<?php

if( !array_key_exists('aggiungi', $_POST ) || empty($_POST['nome'])  ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$gruppo = new GruppiPartner();
$gruppo->nome= $_POST['nome'];

try{
    DAOFactory::getGruppiPartnerDAO()->insert($gruppo);
    echo 'gruppo aggiunto';
}
catch (Exception $exc){
    echo 'impossibile aggiungere il gruppo';
}


?>
