<?php

if(array_key_exists('Aggiungi', $_POST) && !empty($_POST['um']) ){

    include 'common/generated/include_dao.php';
    $um = new UnitaMisura();
    $um->descrizioneUm = $_POST['um'];
    try {
        DAOFactory::getUnitaMisuraDAO()->insert($um);
        echo 'unità di misura inserita';
    }
    catch (Exception $exc) {
        echo 'unità di misura non inserita';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
