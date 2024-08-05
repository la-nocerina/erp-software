<?php

if(array_key_exists('aggiungi_ref', $_POST) && !empty($_POST['nome']) && !empty($_POST['cognome']) ){

    include 'common/generated/include_dao.php';
    $reference = new PartnerReference();
    $reference->idPartner = $_POST['id_partner'];
    $reference->nome = $_POST['nome'];
    $reference->cognome = $_POST['cognome'];
    if( !empty($_POST['telefono']) ){
        $reference->telefono = $_POST['telefono'];
    }
    if( !empty($_POST['mobile']) ){
        $reference->mobile = $_POST['mobile'];
    }
    if( !empty($_POST['email']) ){
        $reference->email = $_POST['email'];
    }

    try {
        DAOFactory::getPartnerReferenceDAO()->insert($reference);
        echo 'reference inserita';
        header('Location: modifica_partner.php?id='.$_POST['id_partner']);
    }
    catch (Exception $exc) {
        echo 'reference non inserita';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
