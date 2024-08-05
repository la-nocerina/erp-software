<?php
if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}


include 'common/generated/include_dao.php';

$certificati = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($_GET['id']);
if(! $certificati){
    exit('accesso in modo non consentito');
}

$certificato = $certificati[0];

header('Location: visualizza_certificato_collaudo.php?id='.$certificato->idCertificatoCollaudo);

?>