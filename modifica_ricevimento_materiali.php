<?php
include 'common/generated/include_dao.php';

if( array_key_exists('salva', $_POST) ){
    $scheda = DAOFactory::getRicezioneMaterialiDAO()->load($_POST['id_scheda']);

    $scheda->idPartner = $_POST['id_partner'];

    if( array_key_exists('ddt_n', $_POST) ){ $scheda->ddtN = $_POST['ddt_n']; }
    if( array_key_exists('num_colli', $_POST) ){ $scheda->numColli = $_POST['num_colli']; }
    if( array_key_exists('num_ordine', $_POST) ){ $scheda->ordineN = $_POST['num_ordine']; }
    if( array_key_exists('kg', $_POST) ){ $scheda->kg = $_POST['kg']; }
    if( array_key_exists('destinazione', $_POST) ){
        $destinazione = $_POST['destinazione'];
        if( !empty($destinazione) ){
            $scheda->destinazione = implode('|', $destinazione);
        }
    }
    $scheda->tipo = $_POST['tipo'];
    switch( $_POST['tipo'] ){
        case '1': $scheda->tipoNote = $_POST['txt_capsule']; break;
        case '2': $scheda->tipoNote = $_POST['txt_fondi']; break;
        case '3': $scheda->tipoNote = $_POST['txt_corpi']; break;
        case '4': $scheda->tipoNote = $_POST['txt_tappi']; break;
        case '5': $scheda->tipoNote = $_POST['txt_altro']; break;
    }
    $scheda->idPartnerProvenienza = $_POST['provenienza'];

    if( array_key_exists('controllo', $_POST) ){
        $controllo = $_POST['controllo'];
        if( !empty($controllo) ){
            $scheda->controlli = implode('|', $controllo);
        }
    }
    $scheda->n1 = $_POST['n1'];
    $scheda->n2 = $_POST['n2'];
    $scheda->n3 = $_POST['n3'];
    $scheda->n4 = $_POST['n4'];
    $scheda->n5 = $_POST['n5'];
    $scheda->n6 = $_POST['n6'];
    $scheda->n7 = $_POST['n7'];
    $scheda->n8 = $_POST['n8'];
    $scheda->n9 = $_POST['n9'];
    $scheda->n10 = $_POST['n10'];
    $scheda->n11 = $_POST['n11'];
    $scheda->n12 = $_POST['n12'];

    if( array_key_exists('compilatore', $_POST) ){ $scheda->compilatore = $_POST['compilatore']; }
    if( array_key_exists('data_ddt', $_POST) ){ $scheda->dataDdt = $_POST['data_ddt']; }
    if( array_key_exists('data_scarico', $_POST) ){ $scheda->dataScarico = $_POST['data_scarico']; }
    

    try {
        DAOFactory::getRicezioneMaterialiDAO()->customUpdate($scheda);
        echo 'scheda ricevimento materiali aggiornata';
      }
      catch (Exception $exc) {
          exit('non è stato possibile aggiornare la scheda di ricevimento materiale');
      }

}else{

    if(empty($_GET['id'])){
        exit('accesso ad area in modo non consentito');
    }

    $scheda = DAOFactory::getRicezioneMaterialiDAO()->load($_GET['id']);

    if(!$scheda){
        exit('accesso ad area assente');
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<style type="text/css">
<!--
td {
	vertical-align: top;
}
-->
</style>

<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    function scegli_partner(){
        open('scegli_partner_popup.php', 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_partner(id){
        $('#id_partner').val(id);
    }

    function scegli_provenienza(){
        open('scegli_provenienza_popup.php', 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_provenienza(id){
        $('#provenienza').val(id);
    }
</script>

</head>

<body>
<p>LN LA NOCERINA S.R.L.</p>
<p>MOD.18 - MODULO DI RICEVIMENTO MATERIALI - REV.0</p>
<form id="form1" method="post" action="modifica_ricevimento_materiali.php">
    <input type="hidden" name="id_scheda" value="<?php echo $scheda->idRicezioneMateriali; ?>" />
  <table>
    <tr>
      <td>DOCUMENTO N°</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><p>Fornitore/Cliente:</p>
      <p>
        <input type="text" name="id_partner" id="id_partner" size="20" value="<?php echo $scheda->idPartner; ?>" readonly />
          <input name="btn_scegli_partner" type="button" class="select" id="btn_scegli_partner" onclick="javacript: scegli_partner();" value="    Scegli..."/>
      </p></td>
      <td>D.d.t. n°
      <input name="ddt_n" type="text" id="ddt_n" size="10" maxlength="10" value="<?php echo $scheda->ddtN; ?>" /></td>
      <td>Colli n°
      <input name="num_colli" type="text" id="num_colli" size="10" maxlength="10" value="<?php echo $scheda->numColli; ?>" /></td>
      <td>Ordine n°
      <input name="num_ordine" type="text" id="num_ordine" size="10" maxlength="10" value="<?php echo $scheda->ordineN; ?>" /></td>
      <td>&nbsp;</td>
      <td colspan="2">KG.
      <input name="kg" type="text" id="kg" size="15" maxlength="15" value="<?php echo $scheda->kg; ?>" /></td>
    </tr>
    <tr>
        <?php
        $destinazione = explode('|', $scheda->destinazione);
        $P = $M = $L = $F = $A = '';
        if( in_array('P', $destinazione) ){ $P = 'checked="checked"'; }
        if( in_array('M', $destinazione) ){ $M = 'checked="checked"'; }
        if( in_array('L', $destinazione) ){ $L = 'checked="checked"'; }
        if( in_array('F', $destinazione) ){ $F = 'checked="checked"'; }
        if( in_array('A', $destinazione) ){ $A = 'checked="checked"'; }
        ?>
      <td>Destinazione:</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="P" <?php echo $P; ?> />
      Produz.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="M" <?php echo $M; ?> />
      Magazz.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="L" <?php echo $L; ?> />
      Laborat.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="F" <?php echo $F; ?> />
      Fotoinc.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="A" <?php echo $A; ?> />
      Altro</td>
    </tr>
    <tr>
      <td colspan="6">Materiale destinato alla lavorazione di:</td>
    </tr>
    <tr>
        <?php
        $cap = $fond = $cor = $tap = $altro = '';
        $txt_cap = $txt_fond = $txt_cor = $txt_tap = $txt_altro = '';
        switch($scheda->tipo){
            case '1': $cap='checked="checked"'; $txt_cap=$scheda->tipoNote; break;
            case '2': $fond='checked="checked"'; $txt_fond=$scheda->tipoNote; break;
            case '3': $cor='checked="checked"'; $txt_cor=$scheda->tipoNote; break;
            case '4': $tap='checked="checked"'; $txt_tap=$scheda->tipoNote; break;
            case '5': $altro='checked="checked"'; $txt_altro=$scheda->tipoNote; break;
        }
        ?>
      <td><input name="tipo" type="radio" id="tipo1" value="1" <?php echo $cap; ?>  />
      Capsule<br />
      <input name="txt_capsule" type="text" id="txt_capsule" size="10" maxlength="10" value="<?php echo $txt_cap; ?>" /></td>
      <td><input name="tipo" type="radio" id="tipo2" value="2" <?php echo $fond; ?>/>
      Fondi<br />
      <input name="txt_fondi" type="text" id="txt_fondi" size="10" maxlength="10" value="<?php echo $txt_fond; ?>" /></td>
      <td><input name="tipo" type="radio" id="tipo3" value="3" <?php echo $cor; ?> />
        Corpi<br />
      Gr.
      <input name="txt_corpi" type="text" id="txt_corpi" size="10" maxlength="10" value="<?php echo $txt_cor; ?>" /></td>
      <td><input name="tipo" type="radio" id="tipo4" value="4" <?php echo $tap; ?>/>
      Tappi<br />
      <input name="txt_tappi" type="text" id="txt_tappi" size="10" maxlength="10" value="<?php echo $txt_tap; ?>" /></td>
      <td><input name="tipo" type="radio" id="tipo5" value="5" <?php echo $altro; ?> />
      Altro<br />
      <input name="txt_altro" type="text" id="txt_altro" size="10" maxlength="10" value="<?php echo $txt_altro; ?>" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6">Provenienza:
      <input name="provenienza" type="text" id="provenienza" readonly="readonly" value="<?php echo $scheda->idPartnerProvenienza; ?>" />
      <input class="select" type="button" name="btn_scegli_provenienza" id="btn_scegli_provenienza" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_provenienza();"/>
      </td>
    </tr>
  </table>
<?php
$controlli = explode('|', $scheda->controlli);
$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = '';
if( in_array('1', $controlli) ){ $c1='checked="checked"'; }
if( in_array('2', $controlli) ){ $c2='checked="checked"'; }
if( in_array('3', $controlli) ){ $c3='checked="checked"'; }
if( in_array('4', $controlli) ){ $c4='checked="checked"'; }
if( in_array('5', $controlli) ){ $c5='checked="checked"'; }
if( in_array('6', $controlli) ){ $c6='checked="checked"'; }
if( in_array('7', $controlli) ){ $c7='checked="checked"'; }
if( in_array('8', $controlli) ){ $c8='checked="checked"'; }
if( in_array('9', $controlli) ){ $c9='checked="checked"'; }
if( in_array('10', $controlli) ){ $c10='checked="checked"'; }
if( in_array('11', $controlli) ){ $c11='checked="checked"'; }
if( in_array('12', $controlli) ){ $c12='checked="checked"'; }
?>
<p align="center">CONTROLLO</p>
<table>
  <tr>
    <td width="19%">Tipo controllo</td>
    <td width="9%"><div align="center">SI</div></td>
    <td width="72%"><p align="center">Non conformità rilevate</p></td>
  </tr>
  <tr>
    <td>Imballo chiuso</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo1" value="1" <?php echo $c1; ?> />
    </div></td>
    <td><input name="n1" type="text" id="n1" size="100" maxlength="100" value="<?php echo $scheda->n1; ?>" /></td>
  </tr>
  <tr>
    <td>Imballo a vista</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo2" value="2" <?php echo $c2; ?> />
    </div></td>
    <td><input name="n2" type="text" id="n2" size="100" maxlength="100" value="<?php echo $scheda->n2; ?>" /></td>
  </tr>
  <tr>
    <td>Ruggine</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo3" value="3" <?php echo $c3; ?> />
    </div></td>
    <td><input name="n3" type="text" id="n3" size="100" maxlength="100" value="<?php echo $scheda->n3; ?>" /></td>
  </tr>
  <tr>
    <td>Ammaccature</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo4" value="4" <?php echo $c4; ?> />
    </div></td>
    <td><input name="n4" type="text" id="n4" size="100" maxlength="100" value="<?php echo $scheda->n4; ?>" /></td>
  </tr>
  <tr>
    <td>Piegature</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo5" value="5" <?php echo $c5; ?> />
    </div></td>
    <td><input name="n5" type="text" id="n5" size="100" maxlength="100" value="<?php echo $scheda->n5; ?>" /></td>
  </tr>
  <tr>
    <td>Bordi<br />
      tagliati/danneggiati</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo6" value="6" <?php echo $c6; ?> />
    </div></td>
    <td><input name="n6" type="text" id="n6" size="100" maxlength="100" value="<?php echo $scheda->n6; ?>" /></td>
  </tr>
  <tr>
    <td>Condensa</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo7" value="7" <?php echo $c7; ?> />
    </div></td>
    <td><input name="n7" type="text" id="n7" size="100" maxlength="100" value="<?php echo $scheda->n7; ?>" /></td>
  </tr>
  <tr>
    <td>Ondulazione</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo8" value="8" <?php echo $c8; ?> />
    </div></td>
    <td><input name="n8" type="text" id="n8" size="100" maxlength="100" value="<?php echo $scheda->n8; ?>" /></td>
  </tr>
  <tr>
    <td>Impilaggio imperfetto</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo9" value="9" <?php echo $c9; ?> />
    </div></td>
    <td><input name="n9" type="text" id="n9" size="100" maxlength="100" value="<?php echo $scheda->n9; ?>" /></td>
  </tr>
  <tr>
    <td>Peso</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo10" value="10" <?php echo $c10; ?> />
    </div></td>
    <td><input name="n10" type="text" id="n10" size="100" maxlength="100" value="<?php echo $scheda->n10; ?>" /></td>
  </tr>
  <tr>
    <td>Colli</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo11" value="11" <?php echo $c11; ?> />
    </div></td>
    <td><input name="n11" type="text" id="n11" size="100" maxlength="100" value="<?php echo $scheda->n11; ?>" /></td>
  </tr>
  <tr>
    <td>Altro</td>
    <td><div align="center">
      <input type="checkbox" name="controllo[]" id="controllo12" value="12" <?php echo $c12; ?>/>
    </div></td>
    <td><input name="n12" type="text" id="n12" size="100" maxlength="100" value="<?php echo $scheda->n12; ?>" /></td>
  </tr>
</table>
<table>
  <tr>
    <td width="40%">Firma del Compilatore<br />
      <input name="compilatore" type="text" id="compilatore" size="50" maxlength="150" value="<?php echo $scheda->compilatore; ?>" /></td>
    <td width="50%" >Data<br />
      <input name="data_ddt" type="text" id="data_ddt" size="10" maxlength="10" value="<?php echo $scheda->dataDdt; ?>" />
      /
      <input name="data_scarico" type="text" id="data_scarico" size="10" maxlength="10" value="<?php echo $scheda->dataScarico; ?>" /></td>
  </tr>
</table>
<p>
  <input type="submit" class="submit" value=""/> 
  salva
</p>
</form>
</body>
</html>

<?php
}
?>