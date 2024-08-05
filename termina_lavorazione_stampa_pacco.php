<?php

if( !empty($_GET['f']) && !empty($_GET['g'])){
    include 'common/generated/include_dao.php';

    $fase_stampa = DAOFactory::getFasiStampaDAO()->load($_GET['f']);
    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->loadLastByLinea($fase_stampa->numLinea);

    $assoc_giac_fase_s = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->load($_GET['g'], $_GET['f']);
    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['g']);

    $assoc_giac_fase_s->numFogliIngresso = 1500;
    $assoc_giac_fase_s->numFogli = 1500;
    $prodotto_giac->quantita = $assoc_giac_fase_s->numFogli;

    //associazione con l'ultima scheda di produzione generata
    $assoc_giac_fase_s->idSchedaProduzione = $scheda_produzione->idSchedaProduzione;

    //aggiorna il numero di stampe effettuate sul pacco
    $certificato =DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($_GET['g']);
    $certificato->numStampe += $fase_stampa->descrizione;

    try {
        $t = new Transaction();
        DAOFactory::getAssociaFasiStampaGiacenzeDAO()->update($assoc_giac_fase_s);
        DAOFactory::getProdottiInGiacenzaDAO()->customUpdate($prodotto_giac);
        DAOFactory::getCertificatiCollaudoDAO()->update($certificato);
        $t->commit();
        header('Location: modulo_lavorazione_stampa_pacco.php?id='.$_GET['f']);
    }
    catch (Exception $exc) {
        $t->rollback();
        echo 'non è stato possibile terminare la lavorazione del pacco';
    }
}
?>
