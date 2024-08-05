<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
    <form id="form1" method="post" action="add_partner.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">ragione_sociale</td>
      <td><input name="ragione_sociale" value="" size="40" id="ragione_sociale" type="text" /></td>
    </tr>
    <tr>
      <td align="center">partita_iva</td>
      <td><input name="piva" value="" size="33" id="piva" type="text" /></td>
    </tr>
    <tr>
      <td align="center">codice_fiscale</td>
      <td><input name="codice_fiscale" value="" size="40" id="codice_fiscale" type="text" /></td>
    </tr>
    <tr>
      <td align="center">indirizzo</td>
      <td><textarea name="indirizzo" rows="2" cols="40" dir="ltr" id="indirizzo" ></textarea></td>
    </tr>
    <tr>
      <td align="center">provincia</td>
      <td><input name="provincia" value="" size="40" id="provincia" type="text" /></td>
    </tr>
    <tr>
      <td align="center">comune</td>
      <td><input name="comune" value="" size="40" id="comune" type="text" /></td>
    </tr>
    <tr>
      <td align="center">cap</td>
      <td><input name="cap" value="" size="15" id="cap" type="text" /></td>
    </tr>
    <tr>
      <td align="center">id_nazione</td>
      <td>
          <select name="nazione" id="nazione">
          <?php
            include 'common/generated/include_dao.php';
            $nazioni = DAOFactory::getNazioniDAO()->queryAll();
            $num_nazioni = count($nazioni);

            $nazione= new Nazioni();
            for($i=0; $i<$num_nazioni; $i++){
                $nazione = $nazioni[$i];
                echo "<option value=\"$nazione->idNazione\">$nazione->nomeNazione</option>";
            }
          ?>
          </select>
</td>
    </tr>
    <tr>
      <td align="center">sito_web</td>
      <td><textarea name="sito_web" rows="2" cols="40" dir="ltr" id="sito_web" ></textarea></td>
    </tr>
  </table>
  <p>
    <input class="submit" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
  </p>
</form>
</body>
</html>
