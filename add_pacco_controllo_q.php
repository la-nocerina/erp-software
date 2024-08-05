<?php

if(array_key_exists('salva', $_POST)){

    include 'common/generated/include_dao.php';

    $associazione = DAOFactory::getAssociaGiacenzaControlloDAO()->loadByIdProdottoInGiacenzaANDIdControlliQualita($_POST['id_scheda'], $_POST['id_giacenza']);
    if($associazione){
        exit('il pacco è stato già sottoposto a controllo qualità');
    }

    $scheda = DAOFactory::getControlliQualitaDAO()->load($_POST['id_scheda']);
    $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($_POST['id_giacenza']);
    $assoc_giac_contr = new AssociaGiacenzaControllo();

    $cert_collaudo->formato = $_POST['larghezza'].' X '.$_POST['lunghezza'];
    $cert_collaudo->spessore = $_POST['spessore'];
    $cert_collaudo->tempra = $_POST['durezza'];
    if(empty($cert_collaudo->commN)){ $cert_collaudo->commN = $_POST['commessa']; }
    $cert_collaudo->collN = $scheda->idControlliQualita;
    
    $assoc_giac_contr->idControlliQualita =$scheda->idControlliQualita;
    $assoc_giac_contr->idProdottoInGiacenza = $cert_collaudo->idProdottoInGiacenza;
    $assoc_giac_contr->copertura = $_POST['copertura'];
    $assoc_giac_contr->peso = $_POST['peso'];
    $assoc_giac_contr->pacco = $_POST['pacco'];
    $assoc_giac_contr->controlloVisivo = $_POST['controllo_visivo'];
    $assoc_giac_contr->controlloVisivoTxt = $_POST['txt_controllo_visivo'];
    $assoc_giac_contr->note = $_POST['note'];

    $ultima_data = DAOFactory::getDateControlliQualitaDAO()->loadLastByIdControlliQualita($scheda->idControlliQualita);

    try {
        $t = new Transaction();
        DAOFactory::getCertificatiCollaudoDAO()->update($cert_collaudo);
        DAOFactory::getAssociaGiacenzaControlloDAO()->insert($assoc_giac_contr);
        $data = date('Y-m-d');
        if( $ultima_data->data != $data ){
            $data_scheda = new DateControlliQualita();
            $data_scheda->idControlliQualita = $scheda->idControlliQualita;
            $data_scheda->data = $data;
            DAOFactory::getDateControlliQualitaDAO()->insert($data_scheda);
        }

        $t->commit();
        echo 'controllo aggiunto';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiungere il controllo';
    }

    
}else{
    echo 'accesso ad area in modo non consentito';
}

?>
