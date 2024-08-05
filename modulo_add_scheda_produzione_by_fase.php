<?php

include 'common/generated/include_dao.php';

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$fase = DAOFactory::getFasiDAO()->load($_GET['id']);
if(!$fase){
    exit('accesso ad area assente');
}

$commessa = DAOFactory::getCommesseDAO()->load($fase->idCommessa);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">

</script>
</head>

<body>
<p>Aggiungi scheda di produzione</p>
<form id="form1" method="post" action="add_scheda_produzione_by_fase.php">
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
    <tr>
      <td align="center"> macchinista </td>
      <td colspan="2"><input name="macchinista" value="" size="40" id="macchinista" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> id_partner </td>
      <td colspan="2"><input type="text" name="id_partner" id="id_partner" size="20" value="<?php echo $commessa->idPartner;  ?>" readonly /></td>
    </tr>
    <tr>
      <td align="center"> lavorazione </td>
      <td colspan="2"><input name="lavorazione" value="<?php echo $fase->descrizione; ?>" size="40" id="lavorazione" type="text" readonly /></td>
    </tr>
    <tr>
      <td align="center"> data </td>
      <td colspan="2"><input name="data" value="<?php echo date('Y-m-d'); ?>" size="10" id="data" type="text" readonly /></td>
    </tr>
    <tr>
      <td align="center"> ora </td>
      <td colspan="2"><input name="ora" value="<?php echo date('G:i'); ?>" size="8" id="ora" type="text" readonly/></td>
    </tr>

    <tr>
      <td align="center">tipo macchina</td>
      <td><p>
          <input name="tipo_macchina" type="radio" id="tipo" value="B" checked="checked" />
      Bicolore Crabtree<br />
      <input type="radio" name="tipo_macchina" id="tipo2" value="V" />
      Verniciatrice</p></td>
      <td><input name="linea" value="<?php echo $fase->numLinea; ?>" size="11" id="linea" type="text" readonly /></td>
    </tr>

  </table>
  <p>
      <input type="hidden" name="id_fase" value="<?php echo $_GET['id']; ?>" />
    <input class="submit" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>