<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
<p>Nuovo Prodotto</p>
<form id="form1" method="post" action="add_prodotto.php">
<table cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">codice_interno</td>
    <td><input name="codice" value="" size="30" id="codice" type="text" /></td>
  </tr>
  <tr>
    <td align="center">descrizione</td>
    <td><input name="descrizione" value="" size="40" id="descrizione" type="text" /></td>
  </tr>
  <tr>
    <td align="center">dettagli</td>
    <td><textarea name="dettagli" rows="7" cols="40" id="dettagli"></textarea></td>
  </tr>
  <tr>
    <td align="center">Unita di misura</td>
    <td><select name="um" id="um">
            <?php
            include 'common/generated/include_dao.php';
            $um = DAOFactory::getUnitaMisuraDAO()->queryAll();
            $num_um = count($um);
            for($i=0;$i<$num_um;$i++){
                $u = new UnitaMisura();
                $u = $um[$i];
                echo "<option value=\"{$u->idUnitaMisura}\">{$u->descrizioneUm}</option>";
            }
            ?>
      </select></td>
  </tr>
  <tr>
    <td align="center">Categoria</td>
    <td><select name="categoria" id="categoria">
        <?php
        $categorie = DAOFactory::getCategorieProdDAO()->queryAll();
        $num_categorie = count($categorie);
        for($i=0;$i<$num_categorie;$i++){
                $categoria = new CategorieProd();
                $categoria = $categorie[$i];
                echo "<option value=\"{$categoria->idCategorieProd}\">{$categoria->nomeCategoria}</option>";
            }
        ?>
      </select></td>
  </tr>
</table>
<p>
  <input class="submit" type="submit" name="Aggiungi" id="Aggiungi" value="" />&nbsp;Aggiungi
</p>
</form>
</body>
</html>
