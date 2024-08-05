<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>
<body>
    <p>Modulo creazione nuovo modulo di controllo fermate e guasti</p>
    <form name="form1" method="post" action="add_fermate_guasti.php">
<table cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">linea      </td>
    <td><input name="linea" value="<?php echo $_GET['linea'] ?>" size="5" id="linea" type="text" readonly /></td>
  </tr>
  <tr>
    <td align="center"> standard      </td>
    <td><select name="standard" id="standard">
    	<option value="fogli">fogli</option>
        <option value="ora">ora</option>
    	</select></td>
  </tr>
  <tr>
    <td align="center"> operatore      </td>
    <td><input name="operatore" value="" size="40" id="operatore" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> turno      </td>
    <td><input name="turno" type="radio" id="turno1" value="M" checked="checked" />
        Mattina<br />
        <input type="radio" name="turno" id="turno2" value="P" />
        Pomeriggio<br />
        <input type="radio" name="turno" id="turno3" value="N" />
        Notte<br />
        <input type="radio" name="turno" id="turno4" value="I" />
        Intermedio <input name="txt_intermedio" value="" size="30" id="turno" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> altre_cause      </td>
    <td><textarea name="altre_cause" rows="3" cols="40" dir="ltr" id="altre_cause" ></textarea></td>
  </tr>
  <tr>
    <td align="center"> data verifica  </td>
    <td><input name="data_verifica" value="" size="10" id="data_verifica" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> r_produzione      </td>
    <td><input name="r_produzione" value="" size="40" id="r_produzione" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> r_assicurazione_qualita      </td>
    <td><input name="r_ass_qualita" value="" size="40" id="r_ass_qualita" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> r_manutenzione      </td>
    <td><input name="r_manutenzione" value="" size="40" id="r_manutenzione" type="text" /></td>
  </tr>
</table>
        <input class="add" type="submit" name="aggiungi" value=""/>&nbsp;Aggiungi
    </form>
    

</body>
</html>
