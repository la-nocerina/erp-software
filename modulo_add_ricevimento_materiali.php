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
<form id="form1" method="post" action="add_ricevimento_materiali.php">
  <table width="100%">
    <tr>
      <td>DOCUMENTO N°</td>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><p>Fornitore/Cliente:</p>
      <p>
        <input type="text" name="id_partner" id="id_partner" size="20" readonly />
          <input class="select" type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_partner();"/>
      </p></td>
      <td>D.d.t. n°
      <input name="ddt_n" type="text" id="ddt_n" size="10" maxlength="10" /></td>
      <td>Colli n°
      <input name="num_colli" type="text" id="num_colli" size="10" maxlength="10" /></td>
      <td>Ordine n°
      <input name="num_ordine" type="text" id="num_ordine" size="10" maxlength="10" /></td>
      <td>&nbsp;</td>
      <td colspan="2">KG.
      <input name="kg" type="text" id="kg" size="15" maxlength="15" /></td>
    </tr>
    <tr>
      <td>Destinazione:</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="P" />
      Produz.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="M" />
      Magazz.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="L" />
      Laborat.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="F" />
      Fotoinc.</td>
      <td><input name="destinazione[]" type="checkbox" id="destinazione" value="A" />
      Altro</td>
    </tr>
    <tr>
      <td colspan="6">Materiale destinato alla lavorazione di:</td>
    </tr>
    <tr>
      <td><input name="tipo" type="radio" id="tipo1" value="1" checked="checked" />
      Capsule<br />
      <input name="txt_capsule" type="text" id="txt_capsule" size="10" maxlength="10" /></td>
      <td><input name="tipo" type="radio" id="tipo2" value="2" />
      Fondi<br />
      <input name="txt_fondi" type="text" id="txt_fondi" size="10" maxlength="10" /></td>
      <td><input name="tipo" type="radio" id="tipo3" value="3" />
        Corpi<br />
      Gr.
      <input name="txt_corpi" type="text" id="txt_corpi" size="10" maxlength="10" /></td>
      <td><input name="tipo" type="radio" id="tipo4" value="4" />
      Tappi<br />
      <input name="txt_tappi" type="text" id="txt_tappi" size="10" maxlength="10" /></td>
      <td><input name="tipo" type="radio" id="tipo5" value="5" />
      Altro<br />
      <input name="txt_altro" type="text" id="txt_altro" size="10" maxlength="10" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6">Provenienza:
      <input name="provenienza" type="text" id="provenienza" readonly="readonly" />
      <input class="select" type="button" name="btn_scegli_provenienza" id="btn_scegli_provenienza" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_provenienza();"/>
      </td>
    </tr>
  </table>

<p align="center">CONTROLLO</p>
<table width="100%">
  <tr>
    <td width="19%">Tipo controllo</td>
    <td width="9%"><div align="center">SI</div></td>
    <td width="72%"><p align="center">Non conformità rilevate</p></td>
  </tr>
  <tr>
    <td>Imballo chiuso</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo1" value="1" />
    </div></td>
    <td><input name="n1" type="text" id="n1" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Imballo a vista</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo2" value="2" />
    </div></td>
    <td><input name="n2" type="text" id="n2" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Ruggine</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo3" value="3" />
    </div></td>
    <td><input name="n3" type="text" id="n3" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Ammaccature</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo4" value="4" />
    </div></td>
    <td><input name="n4" type="text" id="n4" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Piegature</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo5" value="5" />
    </div></td>
    <td><input name="n5" type="text" id="n5" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Bordi<br />
      tagliati/danneggiati</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo6" value="6" />
    </div></td>
    <td><input name="n6" type="text" id="n6" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Condensa</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo7" value="7" />
    </div></td>
    <td><input name="n7" type="text" id="n7" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Ondulazione</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo8" value="8" />
    </div></td>
    <td><input name="n8" type="text" id="n8" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Impilaggio imperfetto</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo9" value="9" />
    </div></td>
    <td><input name="n9" type="text" id="n9" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Peso</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo10" value="10" />
    </div></td>
    <td><input name="n10" type="text" id="n10" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Colli</td>
    <td><div align="center">
      <input name="controllo[]" type="checkbox" id="controllo11" value="11" />
    </div></td>
    <td><input name="n11" type="text" id="n11" size="100" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Altro</td>
    <td><div align="center">
      <input type="checkbox" name="controllo[]" id="controllo12" value="12" />
    </div></td>
    <td><input name="n12" type="text" id="n12" size="100" maxlength="100" /></td>
  </tr>
</table><br />

<table width="100%">
  <tr>
    <td width="40%">Firma del Compilatore<br />
      <input name="compilatore" type="text" id="compilatore" size="50" maxlength="150" /></td>
    <td width="50%" >Data<br />
      <input name="data_ddt" type="text" id="data_ddt" size="10" maxlength="10" />
      /
      <input name="data_scarico" type="text" id="data_scarico" size="10" maxlength="10" /></td>
  </tr>
</table>
<p>
  <input class="submit" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
</p>
</form>
</body>
</html>
