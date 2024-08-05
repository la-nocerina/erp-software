<?php

if(array_key_exists('aggiungi', $_POST) && !empty($_POST['data'])){

    include 'common/generated/include_dao.php';
    $scheda = new SchedeProve();
    $scheda->data=$_POST['data'];

    try {
        DAOFactory::getSchedeProveDAO()->insert($scheda);
        header('Location: gestione_prove_controlli.php');
    }
    catch (Exception $exc) {
        echo 'scheda prove e controlli di laboratorio non aggiunta';
    }

}else{
    echo 'accesso ad area in modo non consentito';
}
?>
