<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';
    $scheda = DAOFactory::getSchedeTecnicheDAO()->load($_GET['id']);
    try {
        DAOFactory::getSchedeTecnicheDAO()->delete($_GET['id']);
        header('Location: modifica_prodotto.php?id='.$scheda->idProdotto);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare la categoria';
    }


}

?>
