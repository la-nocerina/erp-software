<?php
include 'common/generated/include_dao.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    function scegli_prodotto(){
        open('scegli_prodotto_popup.php', 'Lista prodotti', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_id(id){
        $('#id_prodotto').val(id);
    }
</script>
</head>

<body>
<p>Aggiungi prodotto a magazzino</p>
<form id="form1" method="post" action="add_prodotto_giac.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_prodotto </td>
      <td><input type="text" name="id_prodotto" id="id_prodotto" value="" />
      <input class="select" type="button" name="apri_finestra_prodotti" value="&nbsp;&nbsp;Scegli" onclick="javascript: scegli_prodotto()" />
      </td>
    </tr>
    <tr>
      <td align="center"> quantita </td>
      <td><input name="quantita" value="" size="10" id="quantita" type="text" /></td>
    </tr>
    <tr>
      <td align="center"> id_magazzino </td>
      <td><select name="magazzino" id="magazzino">
        <?php
        $magazzini = DAOFactory::getMagazziniDAO()->queryAll();
        $num_magazzini = count($magazzini);
        $magazzino=new Magazzini();
        for($i=0;$i<$num_magazzini;$i++){
            $magazzino = $magazzini[$i];
            echo "<option value=\"$magazzino->idMagazzino\">$magazzino->descrizione</option>";
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <td align="center">batch</td>
      <td><input name="batch" value="" size="10" id="batch" type="text" /></td>
    </tr>
  </table>
  <p>
    <input class="submit" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
