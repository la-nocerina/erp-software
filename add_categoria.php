<?php

if(array_key_exists('Aggiungi', $_POST) && !empty($_POST['nomeCategoria']) ){

    include 'common/generated/include_dao.php';
    $categoria = new CategorieProd();
    $categoria->nomeCategoria = $_POST['nomeCategoria'];
    try {
        DAOFactory::getCategorieProdDAO()->insert($categoria);
        echo 'categoria inserita';
    }
    catch (Exception $exc) {
        echo 'categoria non inserita';
        //echo $exc->getMessage();
    }

}
else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
