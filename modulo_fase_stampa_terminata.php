<?php

if(empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$fase_stampa = DAOFactory::getFasiStampaDAO()->load($_GET['id']);
$commessa = DAOFactory::getCommesseDAO()->load( $fase_stampa->idCommessa );

if( $fase_stampa->oraFine!=NULL ){
    echo "Cliente: $commessa->idPartner <br/>";
    echo "n°commessa: $commessa->idCommessa <br/>";
    echo "DDT: $commessa->ddtN <br/>";
    echo "del: $commessa->dataDdt <br/>";
    echo "Kg: $commessa->kg <br/>";
    echo "colli: $commessa->colli <br/>";
    echo "lavorazione: $fase_stampa->descrizione <br/>";
    echo "marca: $commessa->marca <br/>";

    $associazioni_giacenze = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->queryByIdFase($fase_stampa->idFaseStampa);
    $ass_giac_fase_s = new AssociaFasiStampaGiacenze();
    $tot_fogli = 0;
    for($i=0; $i<count($associazioni_giacenze); $i++){
        $ass_giac_fase_s = $associazioni_giacenze[$i];
        $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_fase_s->idProdottoInGiacenza);
        echo "$ass_giac_fase_s->numFogli  -> $cert_collaudo->formato <br/>";
        $tot_fogli += $ass_giac_fase_s->numFogli;
    }
    echo "Totale fogli: $tot_fogli";
}else{
    echo 'la fasa di lavorazione non è ancora terminata';
}

