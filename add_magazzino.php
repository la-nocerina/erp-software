<?php

if(array_key_exists('aggiungi', $_POST) && !empty($_POST['descrizione']) ){

    include 'common/generated/include_dao.php';
    
    $magazzino = new Magazzini();
    $magazzino->descrizione = $_POST['descrizione'];

    try {
        DAOFactory::getMagazziniDAO()->insert($magazzino);
        //echo 'categoria inserita';
        header('Location: gestione_magazzini.php');
    }
    catch (Exception $exc) {
        echo 'magazzino non inserito';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
