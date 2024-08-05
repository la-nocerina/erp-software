<?php

if(array_key_exists('salva', $_POST)){

    include 'common/generated/include_dao.php';

    $controllo = DAOFactory::getControlliFaseDAO()->load($_POST['fase'] , $_POST['ora']);

    if(!$controllo){
        $controllo = new ControlliFase();
        $controllo->idFase = $_POST['fase'];
        $controllo->ora = $_POST['ora'];
    }

    $controllo->c1 = $_POST['c1'];
    $controllo->c2 = $_POST['c2'];
    $controllo->c3 = $_POST['c3'];
    $controllo->c4 = $_POST['c4'];
    $controllo->c5 = $_POST['c5'];
    $controllo->c6 = $_POST['c6'];
    $controllo->c7 = $_POST['c7'];
    $controllo->c8 = $_POST['c8'];
    $controllo->c9 = $_POST['c9'];
    $controllo->c10 = $_POST['c10'];
    $controllo->c11 = $_POST['c11'];
    $controllo->c12 = $_POST['c12'];
    $controllo->c13 = $_POST['c13'];
    $controllo->c14 = $_POST['c14'];
    $controllo->c15 = $_POST['c15'];
    $controllo->c16 = $_POST['c16'];

    try {
        if ( ! DAOFactory::getControlliFaseDAO()->update($controllo)){
            DAOFactory::getControlliFaseDAO()->insert($controllo);
        }
        header('Location: modulo_controllo_in_linea.php?id='.$_POST['fase']);
    }
    catch (Exception $exc) {
        exit('non è stato possibile aggiungere il controllo');
    }


}else{
    echo 'i dati non sono stati forniti in modo corretto';
}

?>
