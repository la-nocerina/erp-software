<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        $deposito = DAOFactory::getDepositoLastreDAO()->load($_GET['id']);
        $data = $deposito->data;
        DAOFactory::getDepositoLastreDAO()->delete($_GET['id']);

        header('Location: lista_deposito.php?data='.$data);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il deposito';
    }


}

?>
