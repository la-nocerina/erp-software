<?php

include 'common/generated/include_dao.php';

$controlli_liv_vasc = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($_POST['scheda'], $_POST['linea'], $_POST['controllo'] );

if(count($controlli_liv_vasc)<4){
    $controllo = new ControlliAggiuntivi();
    $controllo->idSchedaProve = $_POST['scheda'];
    $controllo->linea = $_POST['linea'];
    $controllo->controllo = $_POST['controllo'];
    $controllo->valore = $_POST['valore'];

    try {
        DAOFactory::getControlliAggiuntiviDAO()->insert($controllo);
        echo 'controllo aggiunto';
    }
    catch (Exception $exc) {
        echo ' nn è stato possibile aggiungere il controllo';
    }

}else{
    echo 'non è possibili aggiungere altri controlli. sono stati già aggiunti 4 controlli.';
}
?>
