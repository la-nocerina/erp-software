<?php

if( !empty($_GET['f']) && !empty($_GET['g'])){
    include 'common/generated/include_dao.php';

    $fase = DAOFactory::getFasiDAO()->load($_GET['f']);
    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->loadLastByLinea($fase->numLinea);

    $assoc_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->load($_GET['g'], $_GET['f']);
    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['g']);

    $assoc_giac_fase->numFogliIngresso = 1500;
    $assoc_giac_fase->numFogli = 1500;
    

    $prodotto_giac->quantita = $assoc_giac_fase->numFogli;

    //associazione con l'ultima scheda di produzione generata
    $assoc_giac_fase->idSchedaProduzione = $scheda_produzione->idSchedaProduzione;

    //aggiornamento lavorazioni effettuate sul pacco
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($_GET['g']);
    if($certificato->lavorazioni){
        $certificato->lavorazioni .= '|'.$fase->descrizione;
    }else{
        $certificato->lavorazioni = $fase->descrizione;
    }

    try {
        $t = new Transaction();
        DAOFactory::getAssociaFasiGiacenzeDAO()->update($assoc_giac_fase);
        DAOFactory::getProdottiInGiacenzaDAO()->customUpdate($prodotto_giac);
        DAOFactory::getCertificatiCollaudoDAO()->update($certificato);
        $t->commit();
        header('Location: modulo_lavorazione_pacco.php?id='.$_GET['f']);
    }
    catch (Exception $exc) {
        $t->rollback();
        echo 'non è stato possibile terminare la lavorazione del pacco';
    }
}
?>
