<?php
include 'common/generated/include_dao.php';

if( array_key_exists('salva', $_POST) && !empty($_POST['id_commessa']) ){
    $commessa = DAOFactory::getCommesseDAO()->load($_POST['id_commessa']);
    if ( !empty($_POST['id_partner']) ){
        $commessa->idPartner = $_POST['id_partner'];
    }
    if ( !empty($_POST['marca']) ){ $commessa->marca = $_POST['marca']; }
    if ( !empty($_POST['ddt_n']) ){ $commessa->ddtN = $_POST['ddt_n']; }
    if ( !empty($_POST['data_ddt']) ){ $commessa->dataDdt = $_POST['data_ddt']; }
    if ( !empty($_POST['num_colli']) ){ $commessa->colli = $_POST['num_colli']; }else{ $commessa->colli = NULL; }
    if ( !empty($_POST['kg']) ){ $commessa->kg = $_POST['kg']; } else { $commessa->kg = NULL;}
    if ( !empty($_POST['num_fogli']) ){ $commessa->numFogli = $_POST['num_fogli']; } else { $commessa->numFogli = NULL; }
    if ( !empty($_POST['resa']) ){ $commessa->resa = $_POST['resa']; } else { $commessa->resa = NULL; }
    if ( !empty($_POST['rif_conf_num']) ){ $commessa->rifConfNum = $_POST['rif_conf_num']; } else { $commessa->rifConfNum = NULL; }
    if ( !empty($_POST['data_conf']) ){ $commessa->dataConf = $_POST['data_conf']; } else { $commessa->dataConf = NULL; }
    if ( !empty($_POST['num_fasi_lavoro']) ){ $commessa->numFasiLavoro = $_POST['num_fasi_lavoro']; } else { $commessa->numFasiLavoro = NULL; }
    if ( !empty($_POST['formato']) ){ $commessa->formato = $_POST['formato']; } else { $commessa->formato = NULL; }
    if ( !empty($_POST['totale']) ){ $commessa->totale = $_POST['totale']; } else { $commessa->totale = NULL; }
    if ( !empty($_POST['note']) ){ $commessa->note = $_POST['note']; } else { $commessa->note = NULL; }

    try {
        $t = new Transaction();
        DAOFactory::getCommesseDAO()->update($commessa);

        //eliminazione fasi
        if ( !empty($_POST['rimuovi_fase']) ){
            $fasi_da_eliminare = $_POST['rimuovi_fase'];
            $num_fasi_da_eliminare = count($fasi_da_eliminare);
            for($i=0;$i<$num_fasi_da_eliminare; $i++){
                if( $fasi_da_eliminare[$i] != 0 ){
                    DAOFactory::getFasiDAO()->delete($fasi_da_eliminare[$i]);
                }
            }
        }
        //aggiornamento e inserimento fasi
        if( !empty($_POST['id_fase'])  ){
            $id_fase = $_POST['id_fase'];
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
            for($i=0;$i<$num_fasi;$i++){
                $fase = new Fasi();
                if(($id_fase[$i] == 0) &&  (!empty($cod_prod[$i]))  ){
                    $fase->idCommessa = $_POST['id_commessa'];
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
                }else{
                    $fase = DAOFactory::getFasiDAO()->load($id_fase[$i]);
                    $fase->descrizione = $desc_fase[$i];
                    $fase->codiceInternoProdotto=$cod_prod[$i];
                    //if( !empty($id_giacenza[$i]) ){ $fase->idProdottoInGiacenza=$id_giacenza[$i]; echo 'giacenza<br/>';} else { $fase->idProdottoInGiacenza=NULL; }
                    if( !empty($gr_um[$i]) ){ $fase->grUm=$gr_um[$i]; } else { $fase->grUm=NULL; }
                    if( !empty($gr_sec[$i]) ){ $fase->grSec=$gr_sec[$i]; } else { $fase->grSec=NULL;}
                    if( !empty($velocita[$i]) ){ $fase->velocita=$velocita[$i]; } else { $fase->velocita=NULL; }
                    if( !empty($temp_forno[$i]) ){ $fase->tempForno=$temp_forno[$i]; } else { $fase->tempForno=NULL;}
                    if( !empty($viscosita[$i])){ $fase->viscosita=$viscosita[$i]; } else { $fase->viscosita=NULL;}
                    if(!empty($num_fase[$i])){ $fase->numFase=$num_fase[$i]; } else { $fase->numFase=NULL; }
                    if(!empty($num_linea[$i])){ $fase->numLinea=$num_linea[$i]; } else { $fase->numLinea=NULL; }
                    DAOFactory::getFasiDAO()->customUpdate($fase);
                    echo 'fase aggiornata<br/>';
                }
            }
        }

        //eliminazione fasi stampa
        if ( !empty($_POST['rimuovi_fase_stampa']) ){
            $fasi_stampa_da_eliminare = $_POST['rimuovi_fase_stampa'];
            $num_fasi_stampa_da_eliminare = count($fasi_stampa_da_eliminare);
            for($i=0;$i<$num_fasi_stampa_da_eliminare; $i++){
                if( $fasi_stampa_da_eliminare[$i] != 0 ){
                    DAOFactory::getFasiStampaDAO()->delete($fasi_stampa_da_eliminare[$i]);
                }
            }
        }
        //aggiornamento e inserimento fasi
        if( !empty($_POST['id_fase_stampa'])  ){
            $id_fase_stampa = $_POST['id_fase_stampa'];
            $desc_lav_stampa = $_POST['desc_lav_stampa'];
            //$stampa_marca = $_POST['stampa_marca'];
            $stampa_velocita = $_POST['stampa_velocita'];
            $stampa_col = $_POST['stampa_col'];
            $stampa_temp = $_POST['stampa_temp'];
            $stampa_ris = $_POST['stampa_ris'];
            $stampa_cod_prod = $_POST['stampa_cod_prod'];
            $stampa_num_fase = $_POST['stampa_num_fase'];
            $stampa_num_linea = $_POST['stampa_num_linea'];

            $num_fasi_stampa = count($id_fase_stampa);
            for($i=0;$i<$num_fasi_stampa;$i++){
                $fase_stampa = new FasiStampa();
                if( ($id_fase_stampa[$i]==0) && !empty($stampa_cod_prod[$i]) ){
                    $fase_stampa->idCommessa = $_POST['id_commessa'];
                    $fase_stampa->descrizione = $desc_lav_stampa[$i];
                    $fase_stampa->velocita = $stampa_velocita[$i];
                    $fase_stampa->colore = $stampa_col[$i];
                    $fase_stampa->temperatura = $stampa_temp[$i];
                    $fase_stampa->ris = $stampa_ris[$i];
                    $fase_stampa->codiceInternoPtodotto = $stampa_cod_prod[$i];
                    if(!empty($stampa_num_fase[$i])){$fase_stampa->numFase = $stampa_num_fase[$i];}else{ $fase_stampa->numFase = NULL;}
                    if(!empty($stampa_num_linea[$i])){$fase_stampa->numLinea = $stampa_num_linea[$i];}else{ $fase_stampa->numLinea = NULL;}
                    DAOFactory::getFasiStampaDAO()->customInsert($fase_stampa);
                    echo 'fase stampa aggiunta<br/>';
                }else{
                    $fase_stampa = DAOFactory::getFasiStampaDAO()->load($id_fase_stampa[$i]);
                    $fase_stampa->descrizione = $desc_lav_stampa[$i];
                    if( !empty($stampa_velocita[$i]) ){ $fase_stampa->velocita = $stampa_velocita[$i]; } else { $fase_stampa->velocita = NULL; }
                    if( !empty($stampa_col[$i]) ){ $fase_stampa->colore = $stampa_col[$i]; } else { $fase_stampa->colore = NULL; }
                    if( !empty($stampa_temp[$i]) ){ $fase_stampa->temperatura = $stampa_temp[$i];}else { $fase_stampa->temperatura=NULL; }
                    if( !empty($stampa_ris[$i]) ){ $fase_stampa->ris = $stampa_ris[$i]; } else { $fase_stampa->ris = NULL; }
                    $fase_stampa->codiceInternoPtodotto = $stampa_cod_prod[$i];
                    if(!empty($stampa_num_fase[$i])){$fase_stampa->numFase = $stampa_num_fase[$i];}else{ $fase_stampa->numFase = NULL;}
                    if(!empty($stampa_num_linea[$i])){$fase_stampa->numLinea = $stampa_num_linea[$i];}else{ $fase_stampa->numLinea = NULL;}
                    DAOFactory::getFasiStampaDAO()->customUpdate($fase_stampa);
                    echo 'fase stampa aggiornata<br/>';
                }
            }
        }

        $t->commit();
        echo 'commessa aggiornata';
    }
    catch (Exception $exc) {
        $t->rollback();
        echo 'impossibile aggiornare la commessa';
    }


}else{

    if( empty($_GET['id'])){
        exit('accesso in modo non consentito');
    }

    
    $commessa = DAOFactory::getCommesseDAO()->load($_GET['id']);
    if(! $commessa){
        exit('accesso in modo non consentito');
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    element_id='';
    batch_id='';
    function scegli_partner(){
        open('scegli_partner_popup.php', 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_partner(id){
        $('#id_partner').val(id);
    }
    function scegli_prodotto(id_element){
        element_id = id_element;
        open('scegli_prodotto_codice_popup.html', 'Lista prodotti', 'width=800,height=500,toolbar=0,resizable=0,scrollbars=1');
    }
    function scrivi_id(codice, gr_um, gr_sec, vel, temp, visc){
        $('#cod_prod_'+element_id).val(codice);
        //$('#id_giacenza_'+element_id).val('');
        $('#batch_'+element_id).val('');
        $('#gr_um_'+element_id).val(gr_um);
        $('#gr_sec_'+element_id).val(gr_sec);
        $('#velocita_'+element_id).val(vel);
        $('#temp_forno_'+element_id).val(temp);
        $('#viscosita_'+element_id).val(visc);
    }

    /*
    function scegli_batch(id){
        batch_id = id;
        codice = $('#cod_prod_'+id).val();
        if(codice!=''){
            open('scegli_batch_popup.php?codice='+codice, 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
        }else{
            alert('non è stato selezionato un prodotto');
        }

    }
    function scrivi_batch(batch, id){
        $('#batch_'+batch_id).val(batch);
        $('#id_giacenza_'+batch_id).val(id);
    }
    */
   
    function aggiungi_fase(){
        num_fasi=0;
        num = $('#tabella_fasi tr').length;
        num--; //la prima riga è l'header della tabella
        //alert(num);
        if(num){
            id_ultima_fase = $('#tabella_fasi tr')[num].id;
            num_fasi = id_ultima_fase.split('_')[1];
            num_fasi++;
        }
        da_aggiungere="<tr id=\"fase_"+num_fasi+"\">";
        da_aggiungere+="<td><input name=\"id_fase[]\" type=\"hidden\" id=\"id_fase_"+num_fasi+"\" value=\"0\" /><select name=\"desc_fase[]\" id=\"desc_fase_1\">";
        da_aggiungere+="<option value=\"1\">1 DORE' INT.</option>";
        da_aggiungere+="<option value=\"2\">1 DORE' INT. DOPP.</option>";
        da_aggiungere+="<option value=\"3\">1 DORE' INT./ZINCO</option>";
        da_aggiungere+="<option value=\"4\">1 DORE' EST.</option>";
        da_aggiungere+="<option value=\"5\">1 ARG. A FINIRE</option>";
        da_aggiungere+="<option value=\"6\">1 SM. EST.</option>";
        da_aggiungere+="<option value=\"7\">1 SM. INT.</option>";
        da_aggiungere+="<option value=\"7\">1 SM. DOPP MANO</option>";
        da_aggiungere+="<option value=\"8\">1 ANCORANTE INT.</option>";
        da_aggiungere+="<option value=\"9\">1 ANCORANTE EST.</option>";
        da_aggiungere+="<option value=\"10\">2 ANCORANTE INT.</option>";
        da_aggiungere+="<option value=\"11\">1 DORE' A FINIRE</option>";
        da_aggiungere+="<option value=\"12\">1 ALLUMINATA INT.</option>";
        da_aggiungere+="<option value=\"13\">1 ALLUMINATA EST.</option>";
        da_aggiungere+="<option value=\"14\">ORGANOSOL</option>";
        da_aggiungere+="<option value=\"15\">SGRASSAGGIO</option>";
        da_aggiungere+="</select></td>";
        da_aggiungere+="<td><input name=\"cod_prod[]\" type=\"text\" id=\"cod_prod_"+num_fasi+"\" size=\"15\" readonly /><input type=\"button\" value=\"...\" name=\"scegli_prod\" onclick=\"javascript: scegli_prodotto('"+num_fasi+"')\" /></td>";
        //da_aggiungere+="<td><input name=\"id_giacenza[]\" id=\"id_giacenza_"+num_fasi+"\" type=\"hidden\" /><input name=\"batch[]\" type=\"text\" id=\"batch_"+num_fasi+"\" size=\"15\" readonly /><input type=\"button\" value=\"...\" name=\"btn_scegli_batch\" onclick=\"javascript: scegli_batch('"+num_fasi+"')\" /></td>"
        da_aggiungere+="<td><input name=\"gr_um[]\" type=\"text\" id=\"gr_um_"+num_fasi+"\" size=\"8\" /></td>";
        da_aggiungere+="<td><input name=\"gr_sec[]\" type=\"text\" id=\"gr_sec_"+num_fasi+"\" size=\"8\" /></td>";
        da_aggiungere+="<td><input name=\"velocita[]\" type=\"text\" id=\"velocita_"+num_fasi+"\" size=\"16\" /></td>";
        da_aggiungere+="<td><input name=\"temp_forno[]\" type=\"text\" id=\"temp_forno_"+num_fasi+"\" size=\"16\" /></td>";
        da_aggiungere+="<td><input name=\"viscosita[]\" type=\"text\" id=\"viscosita_"+num_fasi+"\" size=\"16\" /></td>";
        da_aggiungere+="<td><input name=\"num_fase[]\" type=\"text\" id=\"num_fase_"+num_fasi+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"num_linea[]\" type=\"text\" id=\"num_linea_"+num_fasi+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input class=\"delete\" name=\"btn_rimuovi\" type=\"button\" id=\"btn_rimuovi_"+num_fasi+"\" value=\"\" onclick=\"javascript: rimuovi_fase("+num_fasi+");\" />&nbsp;Rimuovi</td>";
        da_aggiungere+="</tr>";
        $('#tabella_fasi').append(da_aggiungere);
        
    }
    function rimuovi_fase(id_riga, id_fase){
        $('#fase_'+id_riga).remove();
        $('#fasi_da_eliminare').append("<input name=\"rimuovi_fase[]\" type=\"hidden\" value=\""+id_fase+"\" />");
    }

    function aggiungi_fase_stampa(){
        num_fasi_stampa=0;
        num = $('#tabella_fasi_stampa tr').length;
        num--; //la prima riga è l'header della tabella
        //alert(num);
        if(num){
            id_ultima_fase = $('#tabella_fasi_stampa tr')[num].id;
            num_fasi_stampa = id_ultima_fase.split('_')[2];
            num_fasi_stampa++;
        }
        da_aggiungere='';
        da_aggiungere+="<tr id=\"fase_stampa_"+num_fasi_stampa+"\" ><td><input name=\"id_fase_stampa[]\" type=\"hidden\" id=\"id_fase_stampa_"+num_fasi_stampa+"\" value=\"0\" /><select name=\"desc_lav_stampa[]\">";
        da_aggiungere+="<option value=\"1\">1 COLORE</option>";
        da_aggiungere+="<option value=\"2\">2 COLORI</option>";
        da_aggiungere+="</select></td>";
        //da_aggiungere+="<td><input name=\"stampa_marca[]\" type=\"text\" id=\"stampa_marca_"+num_fasi_stampa+"\" size=\"20\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_velocita[]\" type=\"text\" id=\"stampa_velocita_"+num_fasi_stampa+"\" size=\"10\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_col[]\" type=\"text\" id=\"stampa_col_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_temp[]\" type=\"text\" id=\"stampa_temp_"+num_fasi_stampa+"\" size=\"15\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_ris[]\" type=\"text\" id=\"stampa_ris_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_cod_prod[]\" type=\"text\" id=\"stampa_cod_prod_"+num_fasi_stampa+"\" size=\"15\" /> <input type=\"button\" value=\"...\" name=\"btn_scegli_cod_prod_stampa\" onclick=\"javascript: scegli_prodotto_stampa('"+num_fasi_stampa+"')\" /> </td>";
        da_aggiungere+="<td><input name=\"stampa_num_fase[]\" type=\"text\" id=\"stampa_num_fase_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_num_linea[]\" type=\"text\" id=\"stampa_num_linea_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input type=\"button\" onclick=\"javascript: rimuovi_fase_stampa("+num_fasi_stampa+");\" value=\"Rimuovi\" id=\"btn_stp_rimuovi_"+num_fasi_stampa+"\" name=\"btn_stp_rimuovi\" /></td>";
        da_aggiungere+="</tr>";
        $('#tabella_fasi_stampa').append(da_aggiungere);
    }
    function rimuovi_fase_stampa(id_riga, id_fase_stampa){
        $('#fase_stampa_'+id_riga).remove();
        $('#fasi_stampa_da_eliminare').append("<input name=\"rimuovi_fase_stampa[]\" type=\"hidden\" value=\""+id_fase_stampa+"\" />");
    }

    function scegli_prodotto_stampa(id_element){
        element_id = id_element;
        open('scegli_prodotto_stampa_popup.php', 'Lista prodotti', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_codProdStampa(codice){
        $('#stampa_cod_prod_'+element_id).val(codice);
    }
</script>
</head>
<body>
    <p>Modifica commessa</p>

    <form id="form1" method="post" action="modifica_commessa.php">

    <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_commessa</td>
      <td><input type="text" name="id_commessa" id="id_commessa" value="<?php echo $commessa->idCommessa; ?>" size="20" readonly /></td>
    </tr>
    <tr>
      <td align="center">id_partner</td>
      <td><input type="text" name="id_partner" id="id_partner" size="20" value="<?php echo $commessa->idPartner; ?>" readonly />
          <input type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="Scegli..." onclick="javacript: scegli_partner();"/></td>
    </tr>
    <tr>
      <td align="center">marca</td>
      <td><input name="marca" value="<?php echo $commessa->marca; ?>" size="40" id="marca" type="text" /></td>
    </tr>
    <tr>
      <td align="center">ddt_n</td>
      <td><input name="ddt_n" value="<?php echo $commessa->ddtN; ?>" size="40" id="ddt_n" type="text" /></td>
    </tr>
    <tr>
      <td align="center">data_ddt</td>
      <td><input name="data_ddt" value="<?php echo $commessa->dataDdt; ?>" size="10" id="data_ddt" type="text" /></td>
    </tr>
    <tr>
      <td align="center">colli</td>
      <td><input name="num_colli" value="<?php echo $commessa->colli; ?>" size="11" id="num_colli" type="text" /></td>
    </tr>
    <tr>
      <td align="center">kg</td>
      <td><input name="kg" value="<?php echo $commessa->kg; ?>" size="11" id="kg" type="text" /></td>
    </tr>
    <tr>
      <td align="center">num_fogli</td>
      <td><input name="num_fogli" value="<?php echo $commessa->numFogli; ?>" size="11" id="num_fogli" type="text" /></td>
    </tr>
    <tr>
      <td align="center">resa</td>
      <td><input name="resa" value="<?php echo $commessa->resa; ?>" size="40" id="resa" type="text" /></td>
    </tr>
    <tr>
      <td align="center">rif_conf_num</td>
      <td><input name="rif_conf_num" value="<?php echo $commessa->rifConfNum; ?>" size="40" id="rif_conf_num" type="text" /></td>
    </tr>
    <tr>
      <td align="center">data_conf</td>
      <td><input name="data_conf" value="<?php echo $commessa->dataConf; ?>" size="10" id="data_conf" type="text" /></td>
    </tr>
    <tr>
      <td align="center">num_fasi_lavoro</td>
      <td><input name="num_fasi_lavoro" value="<?php echo $commessa->numFasiLavoro; ?>" size="11" id="num_fasi_lavoro" type="text" /></td>
    </tr>
    <tr>
      <td align="center">formato</td>
      <td><input name="formato" value="<?php echo $commessa->formato; ?>" size="40" id="formato" type="text" /></td>
    </tr>
    <tr>
      <td align="center">totale</td>
      <td><input name="totale" value="<?php echo $commessa->totale; ?>" size="40" id="totale" type="text" /></td>
    </tr>
  </table>

    <table border="1" id="tabella_fasi">
    <tr>
      <th><p>DESCRIZIONE FASI<br/>DI LAVORAZIONE</p></th>
      <!-- <th>OPERATORE</th> -->
      <th>COD.PROD.</th>
      <!-- <th>BATCH</th> -->
      <th>GR.UM</th>
      <th>GR.SEC</th>
      <th>VEL.</th>
      <th>TEMPER.</th>
      <th>VISC.</th>
      <th>FASE N°</th>
      <th>LINEA N°</th>
    </tr>
    <?php
    $array_descrizioni[1] = "1 DORE' INT.";
    $array_descrizioni[2] = "1 DORE' INT. DOPP.";
    $array_descrizioni[3] = "1 DORE' INT./ZINCO";
    $array_descrizioni[4] = "1 DORE' EST.";
    $array_descrizioni[5] = "1 ARG. A FINIRE";
    $array_descrizioni[6] = "1 SM. EST.";
    $array_descrizioni[7] = "1 SM. INT.";
    $array_descrizioni[7] = "1 SM. DOPP MANO";
    $array_descrizioni[8] = "1 ANCORANTE INT.";
    $array_descrizioni[9] = "1 ANCORANTE EST.";
    $array_descrizioni[10] = "2 ANCORANTE INT.";
    $array_descrizioni[11] = "1 DORE' A FINIRE";
    $array_descrizioni[12] = "1 ALLUMINATA INT.";
    $array_descrizioni[13] = "1 ALLUMINATA EST.";
    $array_descrizioni[14] = "ORGANOSOL";
    $array_descrizioni[15] = "SGRASSAGGIO";
    $fasi = DAOFactory::getFasiDAO()->queryByIdCommessa($commessa->idCommessa);
    $num_fasi = count($fasi);
    $fase = new Fasi();
    for($i=0; $i<$num_fasi; $i++){
        $fase = $fasi[$i];
        echo "<tr id=\"fase_$i\">";
        echo "<td><input name=\"id_fase[]\" type=\"hidden\" id=\"id_fase_$i\" value=\"$fase->idFase\" />";
        echo "<select name=\"desc_fase[]\" id=\"desc_fase_$i\">";
        for($j=1; $j<count($array_descrizioni); $j++){
            $selected='';
            if($j == $fase->descrizione){
                $selected=' selected="selected" ';
            }
            echo "<option value=\"$j\" $selected >$array_descrizioni[$j]</option>";
        }
        echo "</select>";
        echo "</td>";
        echo "<td><input name=\"cod_prod[]\" type=\"text\" id=\"cod_prod_$i\" size=\"15\" value=\"$fase->codiceInternoProdotto\" readonly /><input type=\"button\" value=\"...\" name=\"scegli_prod\" onclick=\"javascript: scegli_prodotto('$i')\" /></td>";
        $batch ='';
        if ($prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($fase->idProdottoInGiacenza)){

            $batch = $prodotto_giac->batch;
        }
        //echo "<td><input name=\"id_giacenza[]\" id=\"id_giacenza_$i\" type=\"hidden\" value=\"$fase->idProdottoInGiacenza\"/><input name=\"batch[]\" type=\"text\" id=\"batch_$i\" size=\"15\" value=\"$batch\" readonly/><input type=\"button\" value=\"...\" name=\"btn_scegli_batch\" onclick=\"javascript: scegli_batch('$i')\" /></td>";
        echo "<td><input name=\"gr_um[]\" type=\"text\" id=\"gr_um_$i\" size=\"8\" value=\"$fase->grUm\" /></td>";
        echo "<td><input name=\"gr_sec[]\" type=\"text\" id=\"gr_sec_$i\" size=\"8\" value=\"$fase->grSec\" /></td>";
        echo "<td><input name=\"velocita[]\" type=\"text\" id=\"velocita_$i\" size=\"16\" value=\"$fase->velocita\" /></td>";
        echo "<td><input name=\"temp_forno[]\" type=\"text\" id=\"temp_forno_$i\" size=\"16\" value=\"$fase->tempForno\" /></td>";
        echo "<td><input name=\"viscosita[]\" type=\"text\" id=\"viscosita_$i\" size=\"16\" value=\"$fase->viscosita\" /></td>";
        echo "<td><input name=\"num_fase[]\" type=\"text\" id=\"num_fase_$i\" size=\"5\" value=\"$fase->numFase\" /></td>";
        echo "<td><input name=\"num_linea[]\" type=\"text\" id=\"num_linea_$i\" size=\"5\" value=\"$fase->numLinea\" /></td>";
        echo "<td><input class=\"delete\" type=\"button\" onclick=\"javascript: rimuovi_fase($i,$fase->idFase);\" value=\"\" id=\"btn_rimuovi_$i\" name=\"btn_rimuovi\" />&nbsp;Rimuovi</td>";
        echo '</tr>';
    }

    ?>
    </table>
    <input class="add" type="button" name="aggiungi" value="" onclick="javascript: aggiungi_fase();" />&nbsp;Aggiungi fase
    <div id="fasi_da_eliminare" style="display:none"></div>
  <p>Note:<br />
    <textarea name="note" id="note" cols="100" rows="3"><?php echo $commessa->note; ?></textarea>
  </p>

  <table id="tabella_fasi_stampa">
    <tr>
      <th><p>DESCRIZIONE FASI<br/>DI LAVORAZIONE</p></th>
      <!-- <th>MARCA</th> -->
      <th>VEL.</th>
      <th>COL.</th>
      <th>TEMP.</th>
      <th>RIS.</th>
      <th>COD.PROD.</th>
      <th>FASE N°</th>
      <th>LINEA N°</th>
    </tr>

    <?php
    $fasi_stampa = DAOFactory::getFasiStampaDAO()->queryByIdCommessa($commessa->idCommessa);
    $num_fasi_stampa = count($fasi_stampa);
    $fase_stampa = new FasiStampa();
    for($i=0; $i<$num_fasi_stampa; $i++){
        $fase_stampa = $fasi_stampa[$i];
        echo "<tr id=\"fase_stampa_$i\">";
        echo "<td><input name=\"id_fase_stampa[]\" type=\"hidden\" id=\"id_fase_stampa_$i\" value=\"$fase_stampa->idFaseStampa\" />";
        echo "<select name=\"desc_lav_stampa[]\">";
        $selected =''; if($fase_stampa->descrizione==1) { $selected=' selected="selected" '; }
        echo "<option value=\"1\" $selected >1 COLORE</option>";
        $selected =''; if($fase_stampa->descrizione==2) { $selected=' selected="selected" '; }
        echo "<option value=\"2\" $selected >2 COLORI</option>";
        echo "</select></td>";
        //echo "<td><input name=\"stampa_marca[]\" type=\"text\" id=\"stampa_marca_$i\" size=\"20\" value=\"\" /></td>";
        echo "<td><input name=\"stampa_velocita[]\" type=\"text\" id=\"stampa_velocita_$i\" size=\"10\" value=\"$fase_stampa->velocita\" /></td>";
        echo "<td><input name=\"stampa_col[]\" type=\"text\" id=\"stampa_col_$i\" size=\"5\" value=\"$fase_stampa->colore\" /></td>";
        echo "<td><input name=\"stampa_temp[]\" type=\"text\" id=\"stampa_temp_$i\" size=\"15\" value=\"$fase_stampa->temperatura\" /></td>";
        echo "<td><input name=\"stampa_ris[]\" type=\"text\" id=\"stampa_ris_$i\" size=\"5\" value=\"$fase_stampa->ris\" /></td>";
        echo "<td><input name=\"stampa_cod_prod[]\" type=\"text\" id=\"stampa_cod_prod_$i\" size=\"15\" value=\"$fase_stampa->codiceInternoPtodotto\" /> <input type=\"button\" value=\"...\" name=\"btn_scegli_cod_prod_stampa\" onclick=\"javascript: scegli_prodotto_stampa('$i')\" /></td>";
        echo "<td><input name=\"stampa_num_fase[]\" type=\"text\" id=\"stampa_num_fase_$i\" size=\"5\" value=\"$fase_stampa->numFase\" /></td>";
        echo "<td><input name=\"stampa_num_linea[]\" type=\"text\" id=\"stampa_num_linea_$i\" size=\"5\" value=\"$fase_stampa->numLinea\" /></td>";
        echo "<td><input type=\"button\" onclick=\"javascript: rimuovi_fase_stampa($i,$fase_stampa->idFaseStampa);\" value=\"Rimuovi\" id=\"btn_stp_rimuovi_$i\" name=\"btn_stp_rimuovi\" /></td>";
        echo '</tr>';
    }
    ?>
  </table>
  <input class="add" type="button" name="aggiungi_stampa" value="" onclick="javascript: aggiungi_fase_stampa();" />&nbsp;Aggiungi fase di stampa
  <div id="fasi_stampa_da_eliminare" style="display:none"></div>
  <p>
    <input class="submit" type="submit" name="salva" id="salva" value="" />&nbsp;Salva
  </p>
    </form>
</body>
</html>

<?php
}
?>