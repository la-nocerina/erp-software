<?php
include 'common/generated/include_dao.php';
if( array_key_exists('salva', $_POST) && !empty($_POST['id_certificato']) ){
    
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->load( $_POST['id_certificato'] );
    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($certificato->idProdottoInGiacenza);
    if( !empty($_POST['id_partner']) ){ $certificato->idPartner = $_POST['id_partner']; }
    if( !empty($_POST['ddt']) ){ $certificato->ddtN = $_POST['ddt']; }
    if( !empty($_POST['data_ddt']) ){ $certificato->del = $_POST['data_ddt']; }
    if( !empty($_POST['num_colli']) ){ $certificato->numColli = $_POST['num_colli']; }else{ $certificato->numColli=NULL; }
    if( !empty($_POST['kg']) ){ $certificato->kg = $_POST['kg']; }else{ $certificato->kg=NULL; }
    if( !empty($_POST['formato1']) && !empty($_POST['formato2']) ){ $certificato->formato = $_POST['formato1'].' X '.$_POST['formato2']; }else{ $certificato->formato=NULL; }
    if( !empty($_POST['tempra']) ){ $certificato->tempra = $_POST['tempra']; }else{ $certificato->tempra=NULL; }
    if( !empty($_POST['spessore']) ){ $certificato->spessore = $_POST['spessore']; }else{ $certificato->spessore=NULL; }
    if( !empty($_POST['comm_n']) ){ $certificato->commN = $_POST['comm_n']; }else{ $certificato->commN=NULL; }
    if( !empty($_POST['coll_n']) ){ $certificato->collN = $_POST['coll_n']; }else{ $certificato->collN=NULL; }
    if( !empty($_POST['pacco_n']) ){ $certificato->paccoN = $_POST['pacco_n']; }
    if( !empty($_POST['fogli']) ){ $prodotto_giac->quantita = $_POST['fogli']; }
    if( !empty($_POST['magazzino']) ){ $prodotto_giac->idMagazzino = $_POST['magazzino']; }
    if( !empty($_POST['bozzetto']) ){ $certificato->bozzetto = $_POST['bozzetto']; }else{ $certificato->bozzetto=NULL; }
    if( !empty($_POST['verificatore']) ){ $certificato->verificatore = $_POST['verificatore']; }else{ $certificato->verificatore=NULL; }
    if( !empty($_POST['contestazione']) ){ $certificato->contestazione = $_POST['contestazione']; }else{ $certificato->contestazione=NULL; }
    if( !empty($_POST['num_ferriera']) ){ $certificato->numPaccoFerriera = $_POST['num_ferriera']; }else{ $certificato->numPaccoFerriera=NULL; }
    if( !empty($_POST['note']) ){ $certificato->note = $_POST['note']; }else{ $certificato->note=NULL; }
    if( array_key_exists('classificazione', $_POST) ){
        $classificazione = $_POST['classificazione'];
        if( empty($classificazione) ){
            $certificato->classificazione = NULL;
        }else{
            $certificato->classificazione = implode('|', $classificazione);
        }
    }else{
        $certificato->classificazione = NULL;
    }
    $certificato->materiale = $_POST['materiale'];

    $t = new Transaction();
    try {
        DAOFactory::getCertificatiCollaudoDAO()->update($certificato);
        DAOFactory::getProdottiInGiacenzaDAO()->customUpdate($prodotto_giac);

        $t->commit();
        echo 'il certificato è stato aggiornato';
    }
    catch (Exception $exc) {
        $t->rollback();
        echo 'impossibile aggiornare il certificato';
    }


}else{
    if( empty($_GET['id'])){
        exit('accesso in modo non consentito');
    }


    $certificato = DAOFactory::getCertificatiCollaudoDAO()->load($_GET['id']);
    if(! $certificato){
        exit('accesso in modo non consentito');
    }
    $prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($certificato->idProdottoInGiacenza);
    $lavorazioni = explode('|', $certificato->lavorazioni);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    /*
    function scegli_prodotto(){
        open('scegli_prodotto_popup.php', 'Lista prodotti', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_id(id){
        $('#id_prodotto').val(id);
    }
    */
    function scegli_partner(){
        open('scegli_partner_popup.php', 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_partner(id){
        $('#id_partner').val(id);
    }
</script>
</head>

<body>
<p>Modifica certificato di collaudo</p>
<form id="form1" method="post" action="">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_certificato</td>
      <td><input type="text" name="id_certificato" id="id_certificato" size="20" value="<?php echo $certificato->idCertificatoCollaudo; ?>" readonly /></td>
    </tr>
    <tr>
      <td align="center">id_partner</td>
      <td><input type="text" name="id_partner" id="id_partner" size="20" value="<?php echo $certificato->idPartner; ?>" readonly />
          <input type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="Scegli..." onclick="javacript: scegli_partner();"/></td>
    </tr>
    <tr>
      <td align="center">ddt_n</td>
      <td><input name="ddt" value="<?php echo $certificato->ddtN; ?>" size="40" id="ddt" type="text" /></td>
    </tr>
    <tr>
      <td align="center">del</td>
      <td><input name="data_ddt" value="<?php echo $certificato->del; ?>" size="10" id="data_ddt" type="text" /></td>
    </tr>
    <tr>
      <td align="center">num_colli</td>
      <td><input name="num_colli" value="<?php echo $certificato->numColli; ?>" size="10" id="num_colli" type="text" /></td>
    </tr>
    <tr>
      <td align="center">kg</td>
      <td><input name="kg" size="10" id="kg" type="text" value="<?php echo $certificato->kg; ?>" /></td>
    </tr>
    <tr>
      <td align="center">formato</td>
      <td>
          <?php
          $parti = explode(' X ', $certificato->formato);
          ?>
          <input name="formato1" size="10" id="formato1" type="text" value="<?php echo $parti[0]; ?>" /> X <input name="formato2" value="<?php echo $parti[1]; ?>" size="10" id="formato2" type="text" /></td>
    </tr>
    <tr>
      <td align="center">tempra</td>
      <td><input name="tempra" value="<?php echo $certificato->tempra; ?>" size="40" id="tempra" type="text" /></td>
    </tr>
    <tr>
      <td align="center">spessore</td>
      <td><input name="spessore" value="<?php echo $certificato->spessore; ?>" size="40" id="spessore" type="text" /></td>
    </tr>
    <tr>
      <td align="center">comm_n</td>
      <td><input name="comm_n" value="<?php echo $certificato->commN; ?>" size="40" id="comm_n" type="text" /></td>
    </tr>
    <tr>
      <td align="center">coll_n</td>
      <td><input name="coll_n" value="<?php echo $certificato->collN; ?>" size="40" id="coll_n" type="text" /></td>
    </tr>
    <tr>
      <td align="center">pacco_n</td>
      <td><input name="pacco_n" value="<?php echo $certificato->paccoN; ?>" size="40" id="pacco_n" type="text" /></td>
    </tr>
    <!--
    <tr>
      <td align="center">id_prodotto</td>
      <td>
          <input type="text" name="id_prodotto" id="id_prodotto" size="20" value="<?php echo $prodotto_giac->idProdotto; ?>" readonly />
      </td>
    </tr>
    -->
    <?php
    $band_st = $band_crom = $allum = $altro = '';
    switch($certificato->materiale){
        case '1': $band_st='checked="checked"'; break;
        case '2': $band_crom='checked="checked"'; break;
        case '3': $allum='checked="checked"'; break;
        case '4': $altro='checked="checked"'; break;

    }
    ?>
    <tr>
      <td align="center">Materiale</td>
      <td><input name="materiale" type="radio" id="materiale" value="1" <?php echo $band_st; ?> />
        BANDA STAGN.<br />
        <input name="materiale" type="radio" id="materiale2" value="2" <?php echo $band_crom; ?> />
        BANDA CROM<br />
        <input name="materiale" type="radio" id="materiale3" value="3" <?php echo $allum; ?> />
        ALLUMINIO
        <br />
        <input name="materiale" type="radio" id="materiale4" value="4" <?php echo $altro; ?> />
        ALTRO
        <br /></td>
    </tr>
    <tr>
      <td align="center">fogli</td>
      <td><input type="text" name="num_fogli" id="num_fogli" size="20" value="<?php echo $prodotto_giac->quantita; ?>"/></td>
    </tr>
    <tr>
      <td align="center">magazzino</td>
      <td>
          <select name="magazzino" id="magazzino">
        <?php
            $magazzini = DAOFactory::getMagazziniDAO()->queryAll();
            $num_magazzini = count($magazzini);
            $magazzino=new Magazzini();
            for($i=0;$i<$num_magazzini;$i++){
                $magazzino = $magazzini[$i];
                $selected ='';
                if ($prodotto_giac->idMagazzino == $magazzino->idMagazzino){
                    $selected = 'selected="selected"';
                }
                echo "<option value=\"$magazzino->idMagazzino\" $selected >$magazzino->descrizione</option>";
            }
        ?>
          </select>
      </td>
    </tr>
    <tr>
      <td align="center">bozzetto</td>
      <td><input name="bozzetto" value="<?php echo $certificato->bozzetto; ?>" size="40" id="bozzetto" type="text" /></td>
    </tr>
    <tr>
      <td align="center">verificatore</td>
      <td><input name="verificatore" value="<?php echo $certificato->verificatore; ?>" size="40" id="verificatore" type="text" /></td>
    </tr>
    <tr>
      <td align="center">contestazione</td>
      <td><input name="contestazione" value="<?php echo $certificato->contestazione; ?>" size="40" id="contestazione" type="text" /></td>
    </tr>
    <tr>
      <td align="center">Classificazione</td>
      <td><?php
            $classificazione = explode('|', $certificato->classificazione);
            $checked1 = $checked2 = $checked3 = '';
            if( in_array('1', $classificazione)){ $checked1 = ' checked="checked" '; }
            if( in_array('2', $classificazione)){ $checked2 = ' checked="checked" '; }
            if( in_array('3', $classificazione)){ $checked3 = ' checked="checked" '; }
            ?>
          <input type="checkbox" name="classificazione[]" id="classificazione" value="1" <?php echo $checked1; ?> /> Conforme (Verde)<br />
          <input type="checkbox" name="classificazione[]" id="classificazione2" value="2" <?php echo $checked2; ?> /> Declassato (Blu)<br />
          <input type="checkbox" name="classificazione[]" id="classificazione3" value="3" <?php echo $checked3; ?> /> Non conforme (Rosso)<br />
      </td>
    </tr>
    <tr>
        <td align="center">Lavorazioni</td>
        <td>
            <p>VERNICIATURA INTERNA:<br/>
                ANCORANTE 1 [ <?php if(in_array('9', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ANCORANTE 2 [ <?php if(in_array('11', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ORGANOSOL [ <?php if(in_array('15', $lavorazioni)){ echo 'X';} ?> ]<br/>
                DORE' 1 [ <?php if(in_array('1', $lavorazioni)){ echo 'X';} ?> ]<br/>
                DORE' 2 [<?php if(in_array('2', $lavorazioni)){ echo 'X';} ?> ]<br/>
                DORE' CON PASTA [ <?php if(in_array('3', $lavorazioni)){ echo 'X';} ?> ]<br/>
                SMALTO 1 [ <?php if(in_array('7', $lavorazioni)){ echo 'X';} ?> ]<br/>
                SMALTO 2 [ <?php if(in_array('8', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ALLUMINIO [ <?php if(in_array('13', $lavorazioni)){ echo 'X';} ?> ]<br/>
                SGRASSAGGIO [ <?php if(in_array('16', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ALTRO [ ]</p>

            <p>VERNICIATURA ESTERNA:<br/>
                SMALTO [ <?php if(in_array('6', $lavorazioni)){ echo 'X';} ?> ]<br/>
                DORE' [ <?php if(in_array('4', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ANCORANTE [ <?php if(in_array('10', $lavorazioni)){ echo 'X';} ?> ]<br/>
                DORE' A FINIRE [ <?php if(in_array('12', $lavorazioni)){ echo 'X';} ?> ]<br/>
                TRASPARENTE [ <?php if(in_array('5', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ALLUMINIO [ <?php if(in_array('14', $lavorazioni)){ echo 'X';} ?> ]<br/>
                ALTRO [ ]</p>

            <p>STAMPA:<br/>
                1 COLORE [ <?php if( $certificato->numStampe==1){ echo 'X';} ?> ]<br/>
                2 COLORI [ <?php if( $certificato->numStampe==2){ echo 'X';} ?> ]<br/>
                3 COLORI [ <?php if( $certificato->numStampe==3){ echo 'X';} ?> ]<br/>
                4 COLORI [ <?php if( $certificato->numStampe==4){ echo 'X';} ?> ]<br/>
                5 COLORI [ <?php if( $certificato->numStampe==5){ echo 'X';} ?> ]<br/>
                6 COLORI [ <?php if( $certificato->numStampe==6){ echo 'X';} ?> ]<br/>
                7 COLORI [ <?php if( $certificato->numStampe==7){ echo 'X';} ?> ]</p>
        </td>
    </tr>
    <tr>
    <td>Num_pacco_ferriera</td>
    <td><input name="num_ferriera" value="<?php echo $certificato->numPaccoFerriera; ?>" size="40" id="num_ferriera" type="text" /></td>
    </tr>
    <tr>
    <td>note</td>
    <td><textarea name="note" cols="40" rows="5" id="note" ><?php echo $certificato->note; ?></textarea></td>
    </tr>
  </table>
  <p>
    <input name="salva" type="submit" class="submit" id="salva" value="" />&nbsp;Salva
  </p>
</form>
</body>
</html>

<?php
}
?>