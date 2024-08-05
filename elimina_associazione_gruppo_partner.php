<?php

if(!empty($_GET['id_partner']) && !empty($_GET['id_gruppo']) ){

    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getAssociaGruppiPartnerDAO()->delete($_GET['id_partner'], $_GET['id_gruppo']);
        header('Location: modifica_partner.php?id='.$_GET['id_partner']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare l\'associazione al gruppo';
    }

}
else{
    echo 'accesso in modo non consentito';
}

?>
