<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    num_fasi=1;
    element_id='';
    batch_id='';
    num_fasi_stampa=1;
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

    function aggiungi_fase(){
        num_fasi++;
        da_aggiungere="<tr id=\"fase_"+num_fasi+"\">";
        da_aggiungere+="<td height=\"24\"><select name=\"desc_fase[]\" id=\"desc_fase_1\">";
        da_aggiungere+="<option value=\"1\">1 DORE' INT.</option>";
        da_aggiungere+="<option value=\"2\">1 DORE' INT. DOPP.</option>";
        da_aggiungere+="<option value=\"3\">1 DORE' INT./ZINCO</option>";
        da_aggiungere+="<option value=\"4\">1 DORE' EST.</option>";
        da_aggiungere+="<option value=\"5\">1 ARG. A FINIRE</option>";
        da_aggiungere+="<option value=\"6\">1 SM. EST.</option>";
        da_aggiungere+="<option value=\"7\">1 SM. INT.</option>";
        da_aggiungere+="<option value=\"8\">1 SM. DOPP MANO</option>";
        da_aggiungere+="<option value=\"9\">1 ANCORANTE INT.</option>";
        da_aggiungere+="<option value=\"10\">1 ANCORANTE EST.</option>";
        da_aggiungere+="<option value=\"11\">2 ANCORANTE INT.</option>";
        da_aggiungere+="<option value=\"12\">1 DORE' A FINIRE</option>";
        da_aggiungere+="<option value=\"13\">1 ALLUMINATA INT.</option>";
        da_aggiungere+="<option value=\"14\">1 ALLUMINATA EST.</option>";
        da_aggiungere+="<option value=\"15\">ORGANOSOL</option>";
        da_aggiungere+="<option value=\"16\">SGRASSAGGIO</option>";
        da_aggiungere+="</select></td>";
        //da_aggiungere+="<td><input name=\"operatore[]\" type=\"text\" id=\"operatore_"+num_fasi+"\" size=\"10\" /></td>";
        da_aggiungere+="<td><input name=\"cod_prod[]\" type=\"text\" id=\"cod_prod_"+num_fasi+"\" size=\"15\" readonly /><input type=\"button\" value=\"...\" name=\"scegli_prod\" onclick=\"javascript: scegli_prodotto('"+num_fasi+"')\" /></td>";
        //da_aggiungere+="<td><input name=\"id_giacenza[]\" id=\"id_giacenza_"+num_fasi+"\" type=\"hidden\" /><input name=\"batch[]\" type=\"text\" id=\"batch_"+num_fasi+"\" size=\"15\" readonly /><input type=\"button\" value=\"...\" name=\"btn_scegli_batch\" onclick=\"javascript: scegli_batch('"+num_fasi+"')\" /></td>"
        da_aggiungere+="<td><input name=\"gr_um[]\" type=\"text\" id=\"gr_um_"+num_fasi+"\" size=\"8\" /></td>";
        da_aggiungere+="<td><input name=\"gr_sec[]\" type=\"text\" id=\"gr_sec_"+num_fasi+"\" size=\"8\" /></td>";
        da_aggiungere+="<td><input name=\"velocita[]\" type=\"text\" id=\"velocita_"+num_fasi+"\" size=\"16\" /></td>";
        da_aggiungere+="<td><input name=\"temp_forno[]\" type=\"text\" id=\"temp_forno_"+num_fasi+"\" size=\"16\" /></td>";
        da_aggiungere+="<td><input name=\"viscosita[]\" type=\"text\" id=\"viscosita_"+num_fasi+"\" size=\"16\" /></td>";
        da_aggiungere+="<td><input name=\"num_fase[]\" type=\"text\" id=\"num_fase_"+num_fasi+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"num_linea[]\" type=\"text\" id=\"num_linea_"+num_fasi+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"btn_rimuovi\" type=\"button\" id=\"btn_rimuovi_"+num_fasi+"\" value=\"Rimuovi\" onclick=\"javascript: rimuovi_fase("+num_fasi+");\" /></td>";
        da_aggiungere+="</tr>";
        $('#tabella_fasi').append(da_aggiungere);
    }
    function rimuovi_fase(id){
        $('#fase_'+id).remove();
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

    function aggiungi_fase_stampa(){
        num_fasi_stampa++;
        da_aggiungere='';
        da_aggiungere+="<tr id=\"fase_stampa_"+num_fasi_stampa+"\" ><td><select name=\"desc_lav_stampa[]\">";
        da_aggiungere+="<option value=\"1\">1 COLORE</option>";
        da_aggiungere+="<option value=\"2\">2 COLORI</option>";
        da_aggiungere+="</select></td>";
        //da_aggiungere+="<td><input name=\"stampa_marca[]\" type=\"text\" id=\"stampa_marca_"+num_fasi_stampa+"\" size=\"20\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_velocita[]\" type=\"text\" id=\"stampa_velocita_"+num_fasi_stampa+"\" size=\"10\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_col[]\" type=\"text\" id=\"stampa_col_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_temp[]\" type=\"text\" id=\"stampa_temp_"+num_fasi_stampa+"\" size=\"15\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_ris[]\" type=\"text\" id=\"stampa_ris_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_cod_prod[]\" type=\"text\" id=\"stampa_cod_prod_"+num_fasi_stampa+"\" size=\"15\" readonly /> <input type=\"button\" value=\"...\" name=\"btn_scegli_cod_prod_stampa\" onclick=\"javascript: scegli_prodotto_stampa('"+num_fasi_stampa+"')\" /> </td>";
        da_aggiungere+="<td><input name=\"stampa_num_fase[]\" type=\"text\" id=\"stampa_num_fase_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input name=\"stampa_num_linea[]\" type=\"text\" id=\"stampa_num_linea_"+num_fasi_stampa+"\" size=\"5\" /></td>";
        da_aggiungere+="<td><input type=\"button\" onclick=\"javascript: rimuovi_fase_stampa("+num_fasi_stampa+");\" value=\"Rimuovi\" id=\"btn_stp_rimuovi_"+num_fasi_stampa+"\" name=\"btn_stp_rimuovi\" /></td>";
        da_aggiungere+="</tr>";
        $('#tabella_fasi_stampa').append(da_aggiungere);
    }
    function rimuovi_fase_stampa(id){
        $('#fase_stampa_'+id).remove();
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
<p>Aggiungi commessa</p>
<form id="form1" method="post" action="add_commessa.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_partner</td>
      <td><input type="text" name="id_partner" id="id_partner" size="20" readonly />
          <input class="select" type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_partner();"/></td>
    </tr>
    <tr>
      <td align="center">marca</td>
      <td><input name="marca" value="" size="40" id="marca" type="text" /></td>
    </tr>
    <tr>
      <td align="center">ddt_n</td>
      <td><input name="ddt_n" value="" size="40" id="ddt_n" type="text" /></td>
    </tr>
    <tr>
      <td align="center">data_ddt</td>
      <td><input name="data_ddt" value="" size="10" id="data_ddt" type="text" /></td>
    </tr>
    <tr>
      <td align="center">colli</td>
      <td><input name="num_colli" value="" size="11" id="num_colli" type="text" /></td>
    </tr>
    <tr>
      <td align="center">kg</td>
      <td><input name="kg" value="" size="11" id="kg" type="text" /></td>
    </tr>
    <tr>
      <td align="center">num_fogli</td>
      <td><input name="num_fogli" value="" size="11" id="num_fogli" type="text" /></td>
    </tr>
    <tr>
      <td align="center">resa</td>
      <td><input name="resa" value="" size="40" id="resa" type="text" /></td>
    </tr>
    <tr>
      <td align="center">rif_conf_num</td>
      <td><input name="rif_conf_num" value="" size="40" id="rif_conf_num" type="text" /></td>
    </tr>
    <tr>
      <td align="center">data_conf</td>
      <td><input name="data_conf" value="" size="10" id="data_conf" type="text" /></td>
    </tr>
    <tr>
      <td align="center">num_fasi_lavoro</td>
      <td><input name="num_fasi_lavoro" value="" size="11" id="num_fasi_lavoro" type="text" /></td>
    </tr>
    <tr>
      <td align="center">formato</td>
      <td><input name="formato" value="" size="40" id="formato" type="text" /></td>
    </tr>
    <tr>
      <td align="center">totale</td>
      <td><input name="totale" value="" size="40" id="totale" type="text" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table border="0" id="tabella_fasi">
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
    <tr id="fase_1">
      <td height="24"><select name="desc_fase[]" id="desc_fase_1">
        <option value="1">1 DORE' INT.</option>
        <option value="2">1 DORE' INT. DOPP.</option>
        <option value="3">1 DORE' INT./ZINCO</option>
        <option value="4">1 DORE' EST.</option>
        <option value="5">1 ARG. A FINIRE</option>
        <option value="6">1 SM. EST.</option>
        <option value="7">1 SM. INT.</option>
        <option value="8">1 SM. DOPP MANO</option>
        <option value="9">1 ANCORANTE INT.</option>
        <option value="10">1 ANCORANTE EST.</option>
        <option value="11">2 ANCORANTE INT.</option>
        <option value="12">1 DORE' A FINIRE</option>
        <option value="13">1 ALLUMINATA INT.</option>
        <option value="14">1 ALLUMINATA EST.</option>
        <option value="15">ORGANOSOL</option>
        <option value="16">SGRASSAGGIO</option>
      </select></td>
      <!-- <td><input name="operatore[]" type="text" id="operatore_1" size="10" /></td> -->
      <td>
          <input name="cod_prod[]" type="text" id="cod_prod_1" size="15" readonly />
          <input type="button" value="..." name="scegli_prod" onclick="javascript: scegli_prodotto('1')" />
      </td>
      <!--
      <td>
          <input name="id_giacenza[]" id="id_giacenza_1" type="hidden" />
          <input name="batch[]" type="text" id="batch_1" size="15" readonly/>
          <input type="button" value="..." name="btn_scegli_batch" onclick="javascript: scegli_batch('1')" />
      </td>
      -->
      <td><input name="gr_um[]" type="text" id="gr_um_1" size="8" /></td>
      <td><input name="gr_sec[]" type="text" id="gr_sec_1" size="8" /></td>
      <td><input name="velocita[]" type="text" id="velocita_1" size="16" /></td>
      <td><input name="temp_forno[]" type="text" id="temp_forno_1" size="16" /></td>
      <td><input name="viscosita[]" type="text" id="viscosita_1" size="16" /></td>
      <td><input name="num_fase[]" type="text" id="num_fase_1" size="5" /></td>
      <td><input name="num_linea[]" type="text" id="num_linea_1" size="5" /></td>
      <td><input class="delete" type="button" onclick="javascript: rimuovi_fase(1);" value="" id="btn_rimuovi_1" name="btn_rimuovi"/>&nbsp;Rimuovi</td>
    </tr>
  </table>
  <input class="add" type="button" name="aggiungi" value="" onclick="javascript: aggiungi_fase();" />&nbsp;Aggiungi fase
  <p>Note:<br />
    <textarea name="note" id="note" cols="100" rows="3"></textarea>
  </p>
  <table border="0" id="tabella_fasi_stampa">
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
    <tr id="fase_stampa_1">
      <td>
          <select name="desc_lav_stampa[]">
              <option value="1">1 COLORE</option>
              <option value="2">2 COLORI</option>
          </select>
      </td>
      <!-- <td><input name="stampa_marca[]" type="text" id="stampa_marca_1" size="20" /></td> -->
      <td><input name="stampa_velocita[]" type="text" id="stampa_velocita_1" size="10" /></td>
      <td><input name="stampa_col[]" type="text" id="stampa_col_1" size="5" /></td>
      <td><input name="stampa_temp[]" type="text" id="stampa_temp_1" size="15" /></td>
      <td><input name="stampa_ris[]" type="text" id="stampa_ris_1" size="5" /></td>
      <td><input name="stampa_cod_prod[]" type="text" id="stampa_cod_prod_1" size="15" readonly /><input type="button" value="..." name="btn_scegli_cod_prod_stampa" onclick="javascript: scegli_prodotto_stampa('1')" /></td>
      <td><input name="stampa_num_fase[]" type="text" id="stampa_num_fase_1" size="5" /></td>
      <td><input name="stampa_num_linea[]" type="text" id="stampa_num_linea_1" size="5" /></td>
      <td><input class="delete" type="button" onclick="javascript: rimuovi_fase_stampa(1);" value="" id="btn_stp_rimuovi_1" name="btn_stp_rimuovi"/>&nbsp;Rimuovi</td>
    </tr>
  </table>
  <input class="add" type="button" name="aggiungi_stampa" value="" onclick="javascript: aggiungi_fase_stampa();" />&nbsp;Aggiungi fase di stampa
  <p>&nbsp;</p>
  <input class="submit" type="submit" value="" name="aggiungi" />&nbsp;FATTO
</form>
<p>&nbsp;</p>
</body>
</html>
