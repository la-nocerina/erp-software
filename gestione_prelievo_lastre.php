<?php

include 'common/generated/include_dao.php';

$prelievi = DAOFactory::getPrelievoLastreDAO()->queryLastData(10);

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
<p>Gestione Prelievo lastre</p>
<table>
    <tr>
        <th>Data</th>
    </tr>
    <?php
    $prelievo = new PrelievoLastre();
    for($i=0; $i<count($prelievi); $i++){
        $prelievo = $prelievi[$i];
        echo "<tr>
                <td><a href=\"lista_prelievi.php?data=$prelievo->data\">$prelievo->data</a></td>
            </tr>";
    }
    ?>
</table>

<p>&nbsp;</p>

<form id="form1" method="post" action="add_prelievo_lastre.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_partner </td>
      <td><input type="text" name="id_partner" id="id_partner" size="20" readonly />
          <input class="select" type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_partner();"/></td>
    </tr>
    <tr>
      <td align="center"> nome_lavoro </td>
      <td><input name="nome_lavoro" value="" size="40" id="nome_lavoro" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> num_lastre </td>
      <td><input name="num_lastre" value="" size="11" id="num_lastre" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> colori </td>
      <td><input name="colori" value="" size="40" id="colori" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> firma </td>
      <td><input name="firma" value="" size="40" id="firma" type="text" /></td>
    </tr>
  </table>
  <p>
    <input name="aggiungi" type="submit" class="add" id="aggiungi" value="" />&nbsp;Aggiungi
  </p>
</form>

</body>
</html>
