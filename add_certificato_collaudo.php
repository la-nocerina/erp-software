<?php

if(array_key_exists('aggiungi', $_POST)  ){

    include 'common/generated/include_dao.php';
    $certificato = new CertificatiCollaudo();
    $certificato->idPartner = $_POST['id_partner'];
    if (!empty($_POST['ddt'])){ $certificato->ddtN = $_POST['ddt'];}
    if (!empty($_POST['data_ddt'])){ $certificato->del = $_POST['data_ddt'];}
    if (!empty($_POST['num_colli'])){ $certificato->numColli = $_POST['num_colli'];}
    if (!empty($_POST['kg'])){ $certificato->kg = $_POST['kg'];}
    if (!empty($_POST['formato1']) && !empty($_POST['formato2']) ){ $certificato->formato = $_POST['formato1'].' X '.$_POST['formato2'];}
    if (!empty($_POST['tempra'])){ $certificato->tempra = $_POST['tempra'];}
    if (!empty($_POST['spessore'])){ $certificato->spessore = $_POST['spessore'];}
    if (!empty($_POST['comm_n'])){ $certificato->commN = $_POST['comm_n'];}
    if (!empty($_POST['coll_n'])){ $certificato->collN = $_POST['coll_n'];}
    if (!empty($_POST['pacco_n'])){ $certificato->paccoN = $_POST['pacco_n'];}
    if (!empty($_POST['bozzetto'])){ $certificato->bozzetto = $_POST['bozzetto'];}
    if (!empty($_POST['verificatore'])){ $certificato->verificatore = $_POST['verificatore'];}
    if (!empty($_POST['contestazione'])){ $certificato->contestazione = $_POST['contestazione'];}
    $certificato->data = date("Y-m-d");
    if (!empty($_POST['num_ferriera'])){ $certificato->numPaccoFerriera = $_POST['num_ferriera'];}
    if (!empty($_POST['note'])){ $certificato->note = $_POST['note'];}
    $certificato->materiale = $_POST['materiale'];

    $prodotto_giac = new ProdottiInGiacenza();

    $prodotto = DAOFactory::getProdottiDAO()->loadByCodiceInterno('0000');//prodotto standard per i fogli

    $prodotto_giac->idProdotto=$prodotto->idProdotto;
    $prodotto_giac->idMagazzino=$_POST['magazzino'];
    if (!empty($_POST['num_fogli'])){ $prodotto_giac->quantita=$_POST['num_fogli']; }

    try {
        $transazione = new Transaction();

        $id_prod = DAOFactory::getProdottiInGiacenzaDAO()->customInsert($prodotto_giac);
        $certificato->idProdottoInGiacenza = $id_prod;
        $id_certificato = DAOFactory::getCertificatiCollaudoDAO()->insert($certificato);

        $transazione->commit();
        echo 'prodotto inserito';
    }
    catch (Exception $exc) {
        $transazione->rollback();
        echo 'prodotto non inserito';
    }
}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
