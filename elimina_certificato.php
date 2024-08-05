<?php

if(!empty($_GET['id'])){

    include 'common/generated/include_dao.php';

    try {
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->load($_GET['id']);
        DAOFactory::getProdottiInGiacenzaDAO()->delete($certificato->idProdottoInGiacenza);

        header('Location: gestione_certificati_collaudo.php');
    }
    catch (Exception $exc) {
        echo 'non è stato possibile eliminare il prodotto';
    }


}

?>
