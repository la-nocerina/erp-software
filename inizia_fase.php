<?php

if( array_key_exists('inizia', $_POST) ){
    include 'common/generated/include_dao.php';

    $fase = DAOFactory::getFasiDAO()->load($_POST['id_fase']);
    if(!$fase){
        exit('accesso ad area assente');
    }
    //verifica che la scheda di rpduzione sia giusta
    $commessa = DAOFactory::getCommesseDAO()->load($fase->idCommessa);
    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->loadLastByLinea($fase->numLinea);
    if( $scheda_produzione ){
        if(($scheda_produzione->idPartner!=$commessa->idPartner) || ($scheda_produzione->lavorazione!=$fase->descrizione)){
            //non è possibile iniziare la fase
            exit('non è possibile inserire la fase di lavorazione sull\'attuale scheda di produzione.<br/>crearne una nuova');
        }else{
            //è possibile iniziare la fase
            //if( ($fase->oraInizio==NULL) || ($fase->oraInizio=='00:00:00') ){
            if( $fase->oraInizio==NULL){
                $fase->oraInizio = $_POST['ora_inizio'];
            }
            else{
                exit('la fase di lavorazione è stata già iniziata');
            }
            
            try {
                DAOFactory::getFasiDAO()->customUpdate($fase);
                header('Location: lista_lavorazioni_linea.php?linea='.$fase->numLinea);
            }
            catch (Exception $exc) {
                echo 'non è stato possibile iniziare la fase di produzione';
            }
        }
    }else{
        exit('non è stato possibile recuperare nessuna scheda di produzione.<br/>impossibile iniziare la fase');
    }

}
?>
