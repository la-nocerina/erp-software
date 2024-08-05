<?php

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';
$t = new Transaction();
 try{
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($_GET['id']);
    if(! $certificato){
        exit('accesso in modo non consentito');
    }

    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($certificato->idProdottoInGiacenza);
    
    //cambio NUMERO PACCO
    $pacchi=array();
    //echo 'padre: '.$prodotto_giac->idProdottoInGiacenzaPadre.'<br/>';
    if( empty($prodotto_giac->idProdottoInGiacenzaPadre) ){
        //cerca pacchi figli
        $pacchi = DAOFactory::getProdottiInGiacenzaDAO()->queryByIdProdottoInGiacenzaPadre($_GET['id']);
    }else{
        //cerca pacchi fratelli
        $pacchi = DAOFactory::getProdottiInGiacenzaDAO()->queryByIdProdottoInGiacenzaPadre($prodotto_giac->idProdottoInGiacenzaPadre);
    }

    if(count($pacchi)==0){
        $paccoN = $certificato->paccoN;
        $certificato->paccoN = "$paccoN/A";
        DAOFactory::getCertificatiCollaudoDAO()->update($certificato);
        //duplica giacenza
        if( empty($prodotto_giac->idProdottoInGiacenzaPadre) ){
            $prodotto_giac->idProdottoInGiacenzaPadre = $_GET['id'];
        }
        $prodotto_giac->quantita=0;
        $id_prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->customInsert($prodotto_giac);
        //duplica certificato
        $certificato->idProdottoInGiacenza = $id_prodotto_giac;
        $certificato->paccoN = "$paccoN/B";
        $id_certificato = DAOFactory::getCertificatiCollaudoDAO()->insert($certificato);
        
    }else{
        $num_pacchi = count($pacchi);
        $ultimo = $pacchi[$num_pacchi-1];
        $ultimo_certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ultimo->idProdottoInGiacenza);
        $parti_paccoN = explode('/', $ultimo_certificato->paccoN);
        $parti_paccoN[1]++;
        //duplica giacenza
        if( empty($prodotto_giac->idProdottoInGiacenzaPadre) ){
            $prodotto_giac->idProdottoInGiacenzaPadre = $_GET['id'];
        }
        $prodotto_giac->quantita=0;
        $id_prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->customInsert($prodotto_giac);
        //duplica certificato
        $certificato->idProdottoInGiacenza = $id_prodotto_giac;
        $certificato->paccoN = $parti_paccoN[0].'/'.$parti_paccoN[1];
        $id_certificato = DAOFactory::getCertificatiCollaudoDAO()->insert($certificato);
    }


    $t->commit();
    echo 'pacco spezzato';
 }
 catch (Exception $exc){
     $t->rollback();
     echo 'non è stato possibile spezzare il pacco';
 }

?>
