<?php

if(array_key_exists('aggiungi', $_POST) && !empty($_POST['id_partner']) && !empty ($_POST['gruppo']) ){
    include 'common/generated/include_dao.php';
    $associazione = new AssociaGruppiPartner();
    $associazione->idGruppoPartner = $_POST['gruppo'];
    $associazione->idPartner = $_POST['id_partner'];

    try{
        DAOFactory::getAssociaGruppiPartnerDAO()->insert($associazione);
        echo 'associazione memorizzata';
        header('Location: modifica_partner.php?id='.$_POST['id_partner']);
    }catch (Exception $exc){
        echo 'Impossibile effettuare l\'associazione';
    }
}

?>
