<?php

if(empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$fase = DAOFactory::getFasiDAO()->load($_GET['id']);
$commessa = DAOFactory::getCommesseDAO()->load( $fase->idCommessa );

if( $fase->oraFine!=NULL ){
    echo "Cliente: $commessa->idPartner <br/>";
    echo "n°commessa: $commessa->idCommessa <br/>";
    echo "DDT: $commessa->ddtN <br/>";
    echo "del: $commessa->dataDdt <br/>";
    echo "Kg: $commessa->kg <br/>";
    echo "colli: $commessa->colli <br/>";
    echo "lavorazione: $fase->descrizione <br/>";
    echo "marca: $commessa->marca <br/>";

    $associazioni_giacenze = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFase($fase->idFase);
    $ass_giac_fase = new AssociaFasiGiacenze();
    $tot_fogli = 0;
    for($i=0; $i<count($associazioni_giacenze); $i++){
        $ass_giac_fase = $associazioni_giacenze[$i];
        $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_fase->idProdottoInGiacenza);
        echo "$ass_giac_fase->numFogli  -> $cert_collaudo->formato <br/>";
        $tot_fogli += $ass_giac_fase->numFogli;
    }
    echo "Totale fogli: $tot_fogli";
}else{
    echo 'la fasa di lavorazione non è ancora terminata';
}

