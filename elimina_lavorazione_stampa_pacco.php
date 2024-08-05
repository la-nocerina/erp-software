<?php

if( !empty($_GET['f']) && !empty($_GET['g'])){
    include 'common/generated/include_dao.php';

    try {
        DAOFactory::getAssociaFasiStampaGiacenzeDAO()->delete($_GET['g'], $_GET['f']);
        header('Location: modulo_lavorazione_stampa_pacco.php?id='.$_GET['f']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la lavorazione del pacco';
    }

}
else{
    echo 'accesso in modo non consentito';
}

?>
