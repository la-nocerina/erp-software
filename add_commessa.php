<?php

if(array_key_exists('aggiungi', $_POST) ){
    include 'common/generated/include_dao.php';
    $commessa = new Commesse();
    
    if ( !empty($_POST['id_partner']) ){
        $commessa->idPartner = $_POST['id_partner'];
    }
    if ( !empty($_POST['marca']) ){
        $commessa->marca = $_POST['marca'];
    }
    if ( !empty($_POST['ddt_n']) ){
        $commessa->ddtN = $_POST['ddt_n'];
    }
    if ( !empty($_POST['data_ddt']) ){
        $commessa->dataDdt = $_POST['data_ddt'];
    }
    if ( !empty($_POST['num_colli']) ){
        $commessa->colli = $_POST['num_colli'];
    }
    if ( !empty($_POST['kg']) ){
        $commessa->kg = $_POST['kg'];
    }
    if ( !empty($_POST['num_fogli']) ){
        $commessa->numFogli = $_POST['num_fogli'];
    }
    if ( !empty($_POST['resa']) ){
        $commessa->resa = $_POST['resa'];
    }
    if ( !empty($_POST['rif_conf_num']) ){
        $commessa->rifConfNum = $_POST['rif_conf_num'];
    }
    if ( !empty($_POST['data_conf']) ){
        $commessa->dataConf = $_POST['data_conf'];
    }
    if ( !empty($_POST['num_fasi_lavoro']) ){
        $commessa->numFasiLavoro = $_POST['num_fasi_lavoro'];
    }
    if ( !empty($_POST['formato']) ){
        $commessa->formato = $_POST['formato'];
    }
    if ( !empty($_POST['totale']) ){
        $commessa->totale = $_POST['totale'];
    }
    if ( !empty($_POST['note']) ){
        $commessa->note = $_POST['note'];
    }

    
    try {
        $t = new Transaction();
        $id_commessa = DAOFactory::getCommesseDAO()->insert($commessa);
        echo 'commessa aggiunta<br/>';
        if( !empty($_POST['desc_fase'])  ){
            $desc_fase = $_POST['desc_fase'];
            $cod_prod = $_POST['cod_prod'];
            //$id_giacenza = $_POST['id_giacenza'];
            $gr_um = $_POST['gr_um'];
            $gr_sec = $_POST['gr_sec'];
            $velocita = $_POST['velocita'];
            $temp_forno = $_POST['temp_forno'];
            $viscosita = $_POST['viscosita'];
            $num_fase = $_POST['num_fase'];
            $num_linea = $_POST['num_linea'];

            $num_fasi = count($desc_fase);//uno qualsiasi degli array precedenti andrebbe bene
            //ciclo salvataggio fasi
            for($i=0;$i<$num_fasi;$i++){
                $fase = new Fasi();
                if(!empty($cod_prod[$i])){
                    $fase->idCommessa = $id_commessa;
                    $fase->descrizione = $desc_fase[$i];
                    $fase->codiceInternoProdotto=$cod_prod[$i];
                    /*
                    if( !empty($id_giacenza[$i]) ){
                        $fase->idProdottoInGiacenza=$id_giacenza[$i];
                        echo 'giacenza<br/>';
                    }
                    */
                    $fase->grUm=$gr_um[$i];
                    $fase->grSec=$gr_sec[$i];
                    $fase->velocita=$velocita[$i];
                    $fase->tempForno=$temp_forno[$i];
                    $fase->viscosita=$viscosita[$i];
                    if(!empty($num_fase[$i]))
                        $fase->numFase=$num_fase[$i];
                    if(!empty($num_linea[$i]))
                        $fase->numLinea=$num_linea[$i];

                    DAOFactory::getFasiDAO()->customInsert($fase);
                    echo 'fase aggiunta<br/>';
                }
            }
        }
        if( !empty($_POST['desc_lav_stampa'])  ){
            $desc_lav_stampa = $_POST['desc_lav_stampa'];
            //$stampa_marca = $_POST['stampa_marca'];
            $stampa_velocita = $_POST['stampa_velocita'];
            $stampa_col = $_POST['stampa_col'];
            $stampa_temp = $_POST['stampa_temp'];
            $stampa_ris = $_POST['stampa_ris'];
            $stampa_cod_prod = $_POST['stampa_cod_prod'];
            $stampa_num_fase = $_POST['stampa_num_fase'];
            $stampa_num_linea = $_POST['stampa_num_linea'];


            $num_fasi_stampa = count($desc_lav_stampa);
            for($i=0;$i<$num_fasi_stampa;$i++){
                $fase_stampa = new FasiStampa();
                if (!empty($stampa_cod_prod[$i])){
                    $fase_stampa->idCommessa = $id_commessa;
                    $fase_stampa->descrizione = $desc_lav_stampa[$i];
                    $fase_stampa->velocita = $stampa_velocita[$i];
                    $fase_stampa->colore = $stampa_col[$i];
                    $fase_stampa->temperatura = $stampa_temp[$i];
                    $fase_stampa->ris = $stampa_ris[$i];
                    $fase_stampa->codiceInternoPtodotto = $stampa_cod_prod[$i];
                    if(!empty($stampa_num_fase[$i])){$fase_stampa->numFase = $stampa_num_fase[$i];}
                    if(!empty($stampa_num_linea[$i])){$fase_stampa->numLinea = $stampa_num_linea[$i];}

                    DAOFactory::getFasiStampaDAO()->customInsert($fase_stampa);
                }
            }
        }

        $t->commit();
        echo 'commessa aggiunta';
    } catch (Exception $exc) {
        $t->rollback();
        echo'errore nel salvataggio della commessa<br/>';
        echo $exc->getMessage();
    }

}else{
    echo 'i dati non sono stati forniti in modo giusto';
}

?>
