<?php

if(array_key_exists('Aggiungi', $_POST) && !empty($_POST['codice']) && !empty($_POST['descrizione']) && !empty($_POST['um']) && !empty($_POST['categoria']) ){

    include 'common/generated/include_dao.php';
    $prodotto = new Prodotti();
    $prodotto->codiceInterno = $_POST['codice'];
    $prodotto->descrizione  = $_POST['descrizione'];
    if(!empty($_POST['dettagli'])){
        $prodotto->dettagli = $_POST['dettagli'];
    }
    $prodotto->idUnitaMisura = $_POST['um'];
    $prodotto->idCategorieProd = $_POST['categoria'];
    $prodotto->creatoIl = date("Y-m-d");
    $prodotto->aggiornatoIl = date("Y-m-d");
    $prodotto->isAttivo=1;
    try {
        DAOFactory::getProdottiDAO()->insert($prodotto);
        echo 'prodotto inserito';
    }
    catch (Exception $exc) {
        echo 'prodotto non inserito';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
