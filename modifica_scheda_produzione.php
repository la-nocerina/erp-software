<?php
include 'common/generated/include_dao.php';

if( array_key_exists('salva', $_POST) && !empty($_POST['id_scheda']) ){

    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->load($_POST['id_scheda']);

    if(!empty($_POST['turno'])){
        switch ( $_POST['turno'] ){
            case 'M': $scheda_produzione->turno = $_POST['turno'];break;
            case 'P': $scheda_produzione->turno = $_POST['turno'];break;
            case 'N': $scheda_produzione->turno = $_POST['turno'];break;
            case 'I': $scheda_produzione->turno = $_POST['txt_intermedio'];break;
        }
    }
    //if(!empty($_POST['bicolore_crabtree'])){ $scheda_produzione->bicoloreCrabtreeN = $_POST['bicolore_crabtree']; }else{ $scheda_produzione->bicoloreCrabtreeN = NULL;}
    //if(!empty($_POST['verniciatrice'])){ $scheda_produzione->verniciatrice = $_POST['verniciatrice']; }else{ $scheda_produzione->verniciatrice = NULL;}
    if(!empty($_POST['macchinista'])){ $scheda_produzione->macchinista = $_POST['macchinista']; }else{ $scheda_produzione->macchinista = NULL;}
    $scheda_produzione->idPartner = $_POST['id_partner'];
    if(!empty($_POST['lavorazione'])){ $scheda_produzione->lavorazione = $_POST['lavorazione']; }else{ $scheda_produzione->lavorazione = NULL;}
    $scheda_produzione->data = $_POST['data'];
    $scheda_produzione->ora = $_POST['ora'];
    $scheda_produzione->linea = $_POST['linea'];

    try {
        DAOFactory::getSchedeProduzioneDAO()->update($scheda_produzione);
        echo 'scheda di produzione aggiornata';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare la scheda di produzione';
    }


}else{

    if( empty($_GET['id'])){
        exit('accesso in modo non consentito');
    }
    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->load($_GET['id']);
    if(!$scheda_produzione){
        exit('accesso ad area assente');
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
    function scegli_partner(){
        open('scegli_partner_popup.php', 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_partner(id){
        $('#id_partner').val(id);
    }
</script>
</head>

<body>
<p>Modifica scheda di produzione</p>
<form id="form1" method="post" action="modifica_scheda_produzione.php">
    <p>ID Scheda di produzione: <input name="id_scheda" type="text" id="id_scheda" value="<?php echo $scheda_produzione->idSchedaProduzione; ?>" readonly /></p>
    <table>
        <?php
        $select_Bicolore='';
        $select_Verniciatrice='';
        switch($scheda_produzione->tipoMacchina){
            case "B": $select_Bicolore=' checked="checked" ';break;
            case "V": $select_Verniciatrice=' checked="checked" ';break;
        }
        ?>
  <tr>
    <td width="21%" rowspan="3">LN La Nocerina s.r.l.</td>
    <td width="37%" rowspan="3">REPARTO MACCHINE<br />STAMPA E<br />VERNICIATURA</td>
    <td width="33%"><input name="tipo_macchina" type="radio" id="tipo" value="B" <?php echo $select_Bicolore; ?> /> BICOLORE CRABTREE<br />N.</td>
    <td width="9%" rowspan="2">
        <select name="linea" id="linea">
            <?php
            for($i=1;$i<=7;$i++){
                if($i == $scheda_produzione->linea){
                    echo "<option value=\"$i\" selected=\"selected\">Linea $i</option>";
                }else{
                    echo "<option value=\"$i\">Linea $i</option>";
                }
            }
            ?>
        </select>
    </td>
  </tr>
  <tr>
    <td><input type="radio" name="tipo_macchina" id="tipo2" value="V" <?php echo $select_Verniciatrice; ?> /> VERNICIATRICE<br />N.</td>
    <!-- <td>&nbsp;</td> -->
  </tr>
  <tr>
    <td colspan="2">Data <input name="data" value="<?php echo $scheda_produzione->data; ?>" size="10" id="data" type="text" />
        Ora <input name="ora" value="<?php echo $scheda_produzione->ora; ?>" size="8" id="ora" type="text" /></td>
  </tr>
</table>
<table>
  <tr>
    <td width="7%">TURNO:</td>
      <?php
      $selected1=$selected2=$selected3=$selected4=$txtIntermedio='';
      switch ($scheda_produzione->turno){
          case 'M': $selected1 = ' checked="checked" ';break;
          case 'P': $selected2 = ' checked="checked" ';break;
          case 'N': $selected3 = ' checked="checked" ';break;
          default : $selected4 = ' checked="checked" ';$txtIntermedio=$scheda_produzione->turno;break;
      }
      ?>
    <td width="15%"><input name="turno" type="radio" id="turno1" value="M" <?php echo $selected1 ?> />Mattina<br />
      06,00<br />
      14,00
    </td>
    <td width="17%"><input type="radio" name="turno" id="turno2" value="P" <?php echo $selected2 ?> />Pomeriggio<br />
      14,00<br />
      22,00</td>
    <td width="10%"><input type="radio" name="turno" id="turno3" value="N" <?php echo $selected3 ?> />Notte<br />
      22,00<br />
      06,00</td>
    <td width="22%"><input type="radio" name="turno" id="turno4" value="I" <?php echo $selected4 ?> />Interme.<br/>
    <input name="txt_intermedio" value="<?php echo $txtIntermedio; ?>" size="30" id="turno" type="text" /></td>
    <td width="29%">MACCHINISTA:<br/><input name="macchinista" value="<?php echo $scheda_produzione->macchinista; ?>" size="40" id="macchinista" type="text" /></td>
  </tr>
  <tr>
    <td colspan="5">CLIENTE:<br/>
    <input type="text" name="id_partner" id="id_partner" size="20" value="<?php echo $scheda_produzione->idPartner; ?>" readonly />
          <input name="btn_scegli_partner" type="button" class="select" id="btn_scegli_partner" onclick="javacript: scegli_partner();" value="  Scegli..."/>
    </td>
    <td>LAVORAZIONE:<br/><input name="lavorazione" value="<?php echo $scheda_produzione->lavorazione; ?>" size="40" id="lavorazione" type="text" /></td>
  </tr>
</table>
    
  <p>
    <input name="salva" type="submit" class="submit" id="salva" value="" /> salva</p>
</form>
<p>&nbsp;</p>


<!-- lista lavorazioni eseguite  -->
<table>
        <tr>
            <th>N°COMMESSA</th>
            <th>N°COLLAUDO</th>
            <th>DA ORA</th>
            <th>A ORA</th>
            <th>N°PACCO</th>
            <th>FOGLI</th>
            <th>CONTR. VISIVO</th>
            <th>CONTR. VISIVO</th>
            <th>NOTE</th>
            <th>VERIFICATORE</th>
        </tr>

        <?php

        $associazioni_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdSchedaProduzione($scheda_produzione->idSchedaProduzione );
        $assoc_giac_fase = new AssociaFasiGiacenze();
        for($i=0; $i<count($associazioni_giac_fase); $i++){
            $assoc_giac_fase = $associazioni_giac_fase[$i];
            if( $assoc_giac_fase->numFogli == 0 ){
                continue;
            }
            $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($assoc_giac_fase->idProdottoInGiacenza);
            $certificato = new CertificatiCollaudo();
            $certificato = $cert_collaudo[0];
            $fase = DAOFactory::getFasiDAO()->load($assoc_giac_fase->idFase);
            echo "<tr>
                    <td> $fase->idCommessa </td>
                    <td> $certificato->collN </td>
                    <td> $fase->oraInizio </td>
                    <td> &nbsp; </td>
                    <td> $certificato->paccoN </td>
                    <td> $assoc_giac_fase->numFogli </td>
                    <td> $assoc_giac_fase->controllo1 </td>
                    <td> $assoc_giac_fase->controllo2 </td>
                    <td> $assoc_giac_fase->note </td>
                    <td> $assoc_giac_fase->verificatore </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
}
?>