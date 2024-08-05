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
<p>Aggiungi certificato di collaudo</p>
<form id="form1" method="post" action="add_certificato_collaudo.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_partner</td>
      <td><input type="text" name="id_partner" id="id_partner" size="20" readonly />
          <input class="select" type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_partner();"/></td>
    </tr>
    <tr>
      <td align="center">ddt_n</td>
      <td><input name="ddt" value="" size="40" id="ddt" type="text" /></td>
    </tr>
    <tr>
      <td align="center">del</td>
      <td><input name="data_ddt" value="" size="10" id="data_ddt" type="text" /></td>
    </tr>
    <tr>
      <td align="center">num_colli</td>
      <td><input name="num_colli" value="" size="10" id="num_colli" type="text" /></td>
    </tr>
    <tr>
      <td align="center">kg</td>
      <td><input name="kg" value="" size="10" id="kg" type="text" /></td>
    </tr>
    <tr>
      <td align="center">formato</td>
      <td><input name="formato1" value="" size="10" id="formato1" type="text" /> X <input name="formato2" value="" size="10" id="formato2" type="text" /></td>
    </tr>
    <!--
    <tr>
      <td align="center">tempra</td>
      <td><input name="tempra" value="" size="40" id="tempra" type="text" /></td>
    </tr>
    <tr>
      <td align="center">spessore</td>
      <td><input name="spessore" value="" size="40" id="spessore" type="text" /></td>
    </tr>
    -->
    <tr>
      <td align="center">comm_n</td>
      <td><input name="comm_n" value="" size="40" id="comm_n" type="text" /></td>
    </tr>
    <!--
    <tr>
      <td align="center">coll_n</td>
      <td><input name="coll_n" value="" size="40" id="coll_n" type="text" /></td>
    </tr>
    -->
    <tr>
      <td align="center">pacco_n</td>
      <td><input name="pacco_n" value="" size="40" id="pacco_n" type="text" /></td>
    </tr>
    <!--
    <tr>
      <td align="center">id_prodotto</td>
      <td><input type="text" name="id_prodotto" id="id_prodotto" size="20" readonly />
          <input type="button" name="btn_scegli_prodotto" id="btn_scegli_prodotto" value="Scegli..." onclick="javascript: scegli_prodotto();" /></td>
    </tr>
    
    <tr>
      <td align="center">fogli</td>
      <td><input type="text" name="num_fogli" id="num_fogli" size="20"/></td>
    </tr>
    -->
    <tr>
      <td align="center">magazzino</td>
      <td>
          <select name="magazzino" id="magazzino">
            <?php
            include 'common/generated/include_dao.php';
            $magazzini = DAOFactory::getMagazziniDAO()->queryAll();
            $num_magazzini = count($magazzini);
            $magazzino=new Magazzini();
            for($i=0;$i<$num_magazzini;$i++){
                $magazzino = $magazzini[$i];
                echo "<option value=\"$magazzino->idMagazzino\">$magazzino->descrizione</option>";
            }
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td align="center">bozzetto</td>
      <td><input name="bozzetto" value="" size="40" id="bozzetto" type="text" /></td>
    </tr>
    <!--
    <tr>
      <td align="center">verificatore</td>
      <td><input name="verificatore" value="" size="40" id="verificatore" type="text" /></td>
    </tr>
    -->
    <tr>
      <td align="center">contestazione</td>
      <td><input name="contestazione" value="" size="40" id="contestazione" type="text" /></td>
    </tr>
    <tr>
    <td>Num_pacco_ferriera</td>
    <td><input name="num_ferriera" value="" size="40" id="num_ferriera" type="text" /></td>
    </tr>
    <tr>
      <td>Materiale</td>
      <td><input name="materiale" type="radio" id="materiale" value="1" checked="checked" />
        BANDA STAGN.<br />
        <input name="materiale" type="radio" id="materiale2" value="2" />
BANDA CROM<br />
<input name="materiale" type="radio" id="materiale3" value="3" />
ALLUMINIO
<br />
<input name="materiale" type="radio" id="materiale4" value="4" /> 
ALTRO
<br /></td>
    </tr>
    <tr>
    <td>note</td>
    <td><textarea name="note" cols="40" rows="5" id="note" ></textarea></td>
    </tr>
  </table>
  <p>
    <input class="add" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
  </p>
</form>
</body>
</html>