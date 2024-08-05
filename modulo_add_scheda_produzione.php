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
<p>Aggiungi scheda di produzione</p>
<form id="form1" method="post" action="add_scheda_produzione.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">turno</td>
      <td colspan="2"><p>
        <input name="turno" type="radio" id="turno1" value="M" checked="checked" />
        Mattina<br />
        <input type="radio" name="turno" id="turno2" value="P" />
        Pomeriggio<br />
        <input type="radio" name="turno" id="turno3" value="N" />
        Notte<br />
        <input type="radio" name="turno" id="turno4" value="I" />
        Intermedio <input name="txt_intermedio" value="" size="30" id="turno" type="text" /></p>
      </td>
    </tr>
    <!--
    <tr>
      <td align="center"> bicolore_crabtree_n </td>
      <td><input name="bicolore_crabtree" value="" size="11" id="bicolore_crabtree" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> verniciatrice </td>
      <td><input name="verniciatrice" value="" size="11" id="verniciatrice" type="text" /></td>
    </tr>
    -->
    <tr>
      <td align="center"> macchinista </td>
      <td colspan="2"><input name="macchinista" value="" size="40" id="macchinista" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> id_partner </td>
      <td colspan="2"><input type="text" name="id_partner" id="id_partner" size="20" readonly />
          <input class="select" type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_partner();"/></td>
    </tr>
    <tr>
      <td align="center"> lavorazione </td>
      <td colspan="2"><input name="lavorazione" value="" size="40" id="lavorazione" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> data </td>
      <td colspan="2"><input name="data" value="" size="10" id="data" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> ora </td>
      <td colspan="2"><input name="ora" value="" size="8" id="ora" type="text" /></td>
    </tr>
    <tr>
      <td align="center">tipo macchina</td>
      <td><p>
          <input name="tipo_macchina" type="radio" id="tipo" value="B" checked="checked" />
      Bicolore Crabtree<br />
      <input type="radio" name="tipo_macchina" id="tipo2" value="V" />
      Verniciatrice</p></td>
      <td><select name="linea" id="linea">
        <option value="1">Linea 1</option>
        <option value="2">Linea 2</option>
        <option value="3">Linea 3</option>
        <option value="4">Linea 4</option>
        <option value="5">Linea 5</option>
        <option value="6">Linea 6</option>
        <option value="7">Linea 7</option>
      </select></td>
    </tr>
  </table>
  <p>
    <input class="submit" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>