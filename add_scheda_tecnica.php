<?php

if(array_key_exists('Aggiungi', $_POST) && !empty($_POST['id_prodotto']) && !empty($_POST['temp_forno']) && !empty($_POST['gr_umido']) && !empty($_POST['gr_secco']) && !empty($_POST['viscosita']) && !empty($_POST['velocita']) ){

    include 'common/generated/include_dao.php';
    $scheda = new SchedeTecniche();
    $scheda->descrizione = $_POST['descrizione'];
    $scheda->idProdotto = $_POST['id_prodotto'];
    $scheda->tempForno = $_POST['temp_forno'];
    $scheda->grUmido = $_POST['gr_umido'];
    $scheda->grSecco = $_POST['gr_secco'];
    $scheda->viscosita= $_POST['viscosita'];
    $scheda->velocita = $_POST['velocita'];

    try {
        DAOFactory::getSchedeTecnicheDAO()->insert($scheda);
        //echo 'categoria inserita';
        header('Location: modifica_prodotto.php?id='.$_POST['id_prodotto']);
    }
    catch (Exception $exc) {
        echo 'scheda non inserita';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
