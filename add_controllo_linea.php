<?php

if( array_key_exists('salva', $_POST) ){

    include 'common/generated/include_dao.php';

    $controllo = DAOFactory::getProveControlliLineaDAO()->load($_POST['scheda'], $_POST['linea'], $_POST['ora']);
    if(!$controllo){
        //insert
        $controllo = new ProveControlliLinea();
        $controllo->idSchedaProve = $_POST['scheda'];
        $controllo->linea = $_POST['linea'];
        $controllo->ora = $_POST['ora'];
        $controllo->idProdottoInGiacenza = $_POST['id_giac'];
        if(!empty($_POST['id_fase'])){ $controllo->idFase = $_POST['id_fase']; }
        if(!empty($_POST['id_fase_stampa'])){ $controllo->idFaseStampa = $_POST['id_fase_stampa']; }
        $controllo->c1 = $_POST['c1'];
        $controllo->c2 = $_POST['c2'];
        $controllo->c3 = $_POST['c3'];
        $controllo->c4 = $_POST['c4'];
        $controllo->c5 = $_POST['c5'];
        $controllo->c6 = $_POST['c6'];
        $controllo->c7 = $_POST['c7'];
        $controllo->c8 = $_POST['c8'];

        try {
            DAOFactory::getProveControlliLineaDAO()->insert($controllo);
            echo 'controllo inserito';
        }
        catch (Exception $exc) {
            echo 'non è stato possibile inserire i controlli effettutati';
        }


    }else{
        $controllo->c1 = $_POST['c1'];
        $controllo->c2 = $_POST['c2'];
        $controllo->c3 = $_POST['c3'];
        $controllo->c4 = $_POST['c4'];
        $controllo->c5 = $_POST['c5'];
        $controllo->c6 = $_POST['c6'];
        $controllo->c7 = $_POST['c7'];
        $controllo->c8 = $_POST['c8'];
        try {
            DAOFactory::getProveControlliLineaDAO()->update($controllo);
            echo 'controllo aggiornato';
        }
        catch (Exception $exc) {
            echo 'non è stato possibile aggiornare i controlli effettutati';
        }
    }

}

?>
