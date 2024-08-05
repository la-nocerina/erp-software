<?php

if( array_key_exists('salva', $_POST) ){

    include 'common/generated/include_dao.php';

    $note = DAOFactory::getNoteProveDAO()->load($_POST['scheda'], $_POST['linea'] );
    if(!$note){
        //insert
        $note = new NoteProve();
        $note->idSchedaProve = $_POST['scheda'];
        $note->linea = $_POST['linea'];
        $note->n1 = $_POST['n1'];
        $note->n2 = $_POST['n2'];
        $note->n3 = $_POST['n3'];
        $note->n4 = $_POST['n4'];
        $note->n5 = $_POST['n5'];
        $note->n6 = $_POST['n6'];
        $note->n7 = $_POST['n7'];
        $note->n8 = $_POST['n8'];
        $note->n9 = $_POST['n9'];
        $note->n10 = $_POST['n10'];
        $note->n11 = $_POST['n11'];

        try {
            DAOFactory::getNoteProveDAO()->insert($note);
            echo 'controllo inserito';
        }
        catch (Exception $exc) {
            echo 'non è stato possibile inserire i controlli effettutati';
        }


    }else{

        $note->n1 = $_POST['n1'];
        $note->n2 = $_POST['n2'];
        $note->n3 = $_POST['n3'];
        $note->n4 = $_POST['n4'];
        $note->n5 = $_POST['n5'];
        $note->n6 = $_POST['n6'];
        $note->n7 = $_POST['n7'];
        $note->n8 = $_POST['n8'];
        $note->n9 = $_POST['n9'];
        $note->n10 = $_POST['n10'];
        $note->n11 = $_POST['n11'];

        try {
            DAOFactory::getNoteProveDAO()->update($note);
            echo 'nota aggiornato';
        }
        catch (Exception $exc) {
            echo 'non è stato possibile aggiornare la nota';
        }

    }

}

?>
