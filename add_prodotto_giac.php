<?php

if(array_key_exists('aggiungi', $_POST) && !empty($_POST['id_prodotto']) && !empty($_POST['quantita']) && !empty($_POST['magazzino']) ){

    include 'common/generated/include_dao.php';
    $prodotto = new ProdottiInGiacenza();
    $prodotto->idProdotto = $_POST['id_prodotto'];
    $prodotto->idMagazzino = $_POST['magazzino'];
    $prodotto->quantita = $_POST['quantita'];
    $prodotto->batch = $_POST['batch'];
    if(!empty($_POST['codice_barre'])){
        $prodotto->codiceBarre = $_POST['codice_barre'];
    }

    try {
        DAOFactory::getProdottiInGiacenzaDAO()->customInsert($prodotto);
        echo 'prodotto inserito nel magazzino';
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
