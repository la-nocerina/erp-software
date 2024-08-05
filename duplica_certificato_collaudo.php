<?php
if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';
$t = new Transaction();
 try{
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->load($_GET['id']);
    if(! $certificato){
        exit('accesso in modo non consentito');
    }

    //duplica giacenza
    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($certificato->idProdottoInGiacenza);
    $id_prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->customInsert($prodotto_giac);

    //duplica certificato
    $certificato->idProdottoInGiacenza = $id_prodotto_giac;
    $id_certificato = DAOFactory::getCertificatiCollaudoDAO()->insert($certificato);
    
    $t->commit();
    echo 'certificato di collaudo duplicato';
 }
 catch (Exception $exc){
     $t->rollback();
     echo 'non è stato possibile clonare il certificato';
 }
 
?>