
<?php

include 'common/generated/include_dao.php';
$controllo=DAOFactory::getControlliFaseStampaDAO()->load($_GET['fasestampa'], $_GET['ora']);
if(!$controllo){
    $controllo = new ControlliFaseStampa();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
    <form name="form1" method="post" action="add_controllo_fase_stampa.php" >
        <input type="hidden" name="fasestampa" value="<?php echo $_GET['fasestampa']?>" />
        <input type="hidden" name="ora" value="<?php echo $_GET['ora']?>" />
<table>
  <tr>
    <td><p>CARATTERISTICHE<br />
    TEST</p></td>
    <td>&nbsp;</td>
    <td><?php echo str_pad($_GET['ora'], 2, "0", STR_PAD_LEFT); ?></td>
    <td>NOTE</td>
  </tr>
  <tr>
    <td>CONTROLLO CART. BLUE/VERDE</td>
    <td>LV</td>
    <td><input name="c1" type="text" id="c1" size="10" maxlength="10" value="<?php echo $controllo->c1; ?>" /></td>
    <td>INIZIO COMMESSA</td>
  </tr>
  <tr>
    <td>CORRISPONDENZA ORDINE</td>
    <td>LV</td>
    <td><input name="c2" type="text" id="c2" size="10" maxlength="10" value="<?php echo $controllo->c2; ?>" /></td>
    <td>OGNI PACCO</td>
  </tr>
  <tr>
    <td>CONTROLLO TEMP.FORNO</td>
    <td>LV</td>
    <td><input name="c3" type="text" id="c3" size="10" maxlength="10" value="<?php echo $controllo->c3; ?>"/></td>
    <td>OGNI ORA</td>
  </tr>
  <tr>
    <td>CONTROLLO VISCOSITA' PROD.</td>
    <td>LV</td>
    <td><input name="c4" type="text" id="c4" size="10" maxlength="10" value="<?php echo $controllo->c4; ?>"/></td>
    <td>OGNI ORA</td>
  </tr>
  <tr>
    <td>CONTROLLO PESO UMIDO APPL.</td>
    <td>LV</td>
    <td><input name="c5" type="text" id="c5" size="10" maxlength="10" value="<?php echo $controllo->c5; ?>" /></td>
    <td>OGNI PACCO</td>
  </tr>
  <tr>
    <td> CONTROLLO SQUADRATURE FG.</td>
    <td>LV</td>
    <td><input name="c6" type="text" id="c6" size="10" maxlength="10" value="<?php echo $controllo->c6; ?>"/></td>
    <td>INIZIO PACCO</td>
  </tr>
  <tr>
    <td>CONTROLLO RISERVE</td>
    <td>LV</td>
    <td><input name="c7" type="text" id="c7" size="10" maxlength="10" value="<?php echo $controllo->c7; ?>" /></td>
    <td>INIZIO/FINE PACCO</td>
  </tr>
  <tr>
    <td> CONTROLLO VISIVO GENERALE</td>
    <td>LV</td>
    <td><input name="c8" type="text" id="c8" size="10" maxlength="10" value="<?php echo $controllo->c8; ?>" /></td>
    <td>COSTANTEMENTE</td>
  </tr>
  <tr>
    <td>CONTROLLO DICITURE</td>
    <td>L</td>
    <td><input name="c9" type="text" id="c9" size="10" maxlength="10" value="<?php echo $controllo->c9; ?>" /></td>
    <td>OGNI CAMBIO LASTRA</td>
  </tr>
  <tr>
    <td>CONTROLLO LASTRE</td>
    <td>L</td>
    <td><input name="c10" type="text" id="c10" size="10" maxlength="10" value="<?php echo $controllo->c10; ?>"/></td>
    <td>INIZIO COMMESSA</td>
  </tr>
  <tr>
    <td>CONTROLLO TONALITA' COLORE</td>
    <td>L</td>
    <td><input name="c11" type="text" id="c11" size="10" maxlength="10" value="<?php echo $controllo->c11; ?>" /></td>
    <td>10 FG A PACCO</td>
  </tr>
  <tr>
    <td>CONTROLLO OMOGENEITA' COL</td>
    <td>L</td>
    <td><input name="c12" type="text" id="c12" size="10" maxlength="10" value="<?php echo $controllo->c12; ?>"/></td>
    <td>10 FG A PACCO</td>
  </tr>
  <tr>
    <td>CONTROLLO LATO DA VERN.RE</td>
    <td>V</td>
    <td><input name="c13" type="text" id="c13" size="10" maxlength="10" value="<?php echo $controllo->c13; ?>" /></td>
    <td>OGNI PACCO</td>
  </tr>
  <tr>
    <td>CONTROLLO CROMO SE TFS</td>
    <td>V</td>
    <td><input name="c14" type="text" id="c14" size="10" maxlength="10" value="<?php echo $controllo->c14; ?>" /></td>
    <td>OGNI PACCO</td>
  </tr>
  <tr>
    <td>CONTROLLO LIVELLO VASCHETTA</td>
    <td>LV</td>
    <td><input name="c15" type="text" id="c15" size="10" maxlength="10" value="<?php echo $controllo->c15; ?>" /></td>
    <td>OGNI ORA</td>
  </tr>
  <tr>
    <td>CONTROLLO SCRITTURA DISCHETTO</td>
    <td>LV</td>
    <td><input name="c16" type="text" id="c16" size="10" maxlength="10" value="<?php echo $controllo->c16; ?>" /></td>
    <td>OGNI ORA</td>
  </tr>
</table>
        <input name="salva" type="submit" class="submit" id="salva" value="" />&nbsp;Salva
    </form>
</body>
</html>
