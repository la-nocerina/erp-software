<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        $prelievo = DAOFactory::getPrelievoLastreDAO()->load($_GET['id']);
        $data = $prelievo->data;
        DAOFactory::getPrelievoLastreDAO()->delete($_GET['id']);

        header('Location: lista_prelievi.php?data='.$data);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il prelievo';
    }


}

?>
