<?php


if( array_key_exists('aggiungi', $_POST) ){

    include 'common/generated/include_dao.php';

    $cause_fermate = DAOFactory::getCauseFermateDAO()->queryByIdFermateGuastiAndCausa($_POST['id_modulo'], $_POST['causa']);
    if( count($cause_fermate)==3 ){
        exit('sono state inserite già 3 fermate per la causa selezionate. impossibile continuare');
    }

    $causa = new CauseFermate();
    $causa->idFermateGuasti = $_POST['id_modulo'];
    $causa->numCausa = $_POST['causa'];
    $causa->daOra = $_POST['ora_inizio'];
    $causa->aOra = $_POST['ora_fine'];

    try {
        DAOFactory::getCauseFermateDAO()->customInsert($causa);
        //echo 'causa inserita';
        header('Location: modifica_fermate_guasti.php?id='.$_POST['id_modulo']);
    }
    catch (Exception $exc) {
        echo 'non è stato possibile inserire la causa';
    }
    
}

?>
