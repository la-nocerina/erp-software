<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<p>Aggiungi scheda controllo qualità</p>
<form id="form1" method="post" action="add_controllo_qualita.php">
<table cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">id_partner      </td>
    <td><input type="text" name="id_partner" id="id_partner" size="20" readonly="readonly" />
      <input class="select" type="button" name="btn_scegli_partner" id="btn_scegli_partner" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli..." onclick="javacript: scegli_partner();"/></td>
  </tr>
  <tr>
    <td align="center"> ddt_n      </td>
    <td><input name="ddt_n" value="" size="40" id="ddt_n" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> data_ddt      </td>
    <td><input name="data_ddt" value="" size="10" id="data_ddt" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> num_colli      </td>
    <td><input name="num_colli" value="" size="11" id="num_colli" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> kg      </td>
    <td><input name="kg" value="" size="40" id="kg" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> num_ferriera      </td>
    <td><input name="num_ferriera" value="" size="40" id="num_ferriera" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> corpi      </td>
    <td><p>
      <input name="tipo" type="radio" id="tipo1" value="corpi" checked="checked" />
    </p>
    </td>
  </tr>
  <tr>
    <td align="center"> txt_corpi      </td>
    <td><input name="txt_corpi" value="" size="40" id="txt_corpi" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> coper      </td>
    <td><input type="radio" name="tipo" id="tipo2" value="coperchi" /></td>
  </tr>
  <tr>
    <td align="center"> capsule      </td>
    <td><input type="radio" name="tipo" id="tipo3" value="capsule" /></td>
  </tr>
  <tr>
    <td align="center"> tappi      </td>
    <td><input type="radio" name="tipo" id="tipo4" value="tappi" /></td>
  </tr>
  <tr>
    <td align="center"> altro      </td>
    <td><input type="radio" name="tipo" id="tipo5" value="altro" /></td>
  </tr>
  <tr>
    <td align="center"> operatore      </td>
    <td><input name="operatore" value="" size="40" id="operatore" type="text" /></td>
  </tr>
  <tr>
    <td align="center"> r_laboratorio      </td>
    <td><input name="r_laboratorio" value="" size="40" id="r_laboratorio" type="text" /></td>
  </tr>
</table>
<p>
  <input class="submit" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
</p>
</form>
<p>&nbsp;</p>
</body>
</html>