<?php
include 'common/generated/include_dao.php';

if(array_key_exists('Salva', $_POST) && !empty($_POST['id']) && !empty($_POST['codice']) && !empty($_POST['descrizione']) && !empty($_POST['um']) && !empty($_POST['categoria'])&& array_key_exists('attivo', $_POST) ){
    $prodotto = new Prodotti();
    $prodotto = DAOFactory::getProdottiDAO()->load($_POST['id']);
    //$prodotto->idProdotto = $_POST['id'];
    $prodotto->codiceInterno = $_POST['codice'];
    $prodotto->descrizione  = $_POST['descrizione'];
    if(!empty($_POST['dettagli'])){
        $prodotto->dettagli = $_POST['dettagli'];
    }
    $prodotto->idUnitaMisura = $_POST['um'];
    $prodotto->idCategorieProd = $_POST['categoria'];
    $prodotto->aggiornatoIl = date("Y-m-d");
    $prodotto->isAttivo=$_POST['attivo'];
    try {
        DAOFactory::getProdottiDAO()->update($prodotto);
        echo 'prodotto aggiornato';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare il prodotto';
        //exit();
    }
}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$prodotto = DAOFactory::getProdottiDAO()->load($_GET['id']);
if(!$prodotto){
    exit('accesso ad area assente');
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
<p>Modifica prodotto</p>
<form id="form1" method="post" action="modifica_prodotto.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_prodotto</td>
      <td><input name="id" value="<?php echo $prodotto->idProdotto; ?>" size="10" id="id" type="text" readonly /></td>
    </tr>
    <tr>
      <td align="center">codice_interno</td>
      <td><input name="codice" value="<?php echo $prodotto->codiceInterno; ?>" size="30" id="codice" type="text" /></td>
    </tr>
    <tr>
      <td align="center">descrizione</td>
      <td><input name="descrizione" value="<?php echo $prodotto->descrizione; ?>" size="40" id="descrizione" type="text" /></td>
    </tr>
    <tr>
      <td align="center">dettagli</td>
      <td><textarea name="dettagli" rows="7" cols="40" id="dettagli" ><?php echo $prodotto->dettagli; ?></textarea></td>
    </tr>
    <tr>
      <td align="center">Unita di misura</td>
      <td><select name="um" id="um">
          <?php
            $um = DAOFactory::getUnitaMisuraDAO()->queryAll();
            $num_um = count($um);
            for($i=0;$i<$num_um;$i++){
                $u = new UnitaMisura();
                $u = $um[$i];
                $selected = "";
                if($u->idUnitaMisura==$prodotto->idUnitaMisura){
                    $selected = 'selected="selected"';
                }
                echo "<option value=\"{$u->idUnitaMisura}\" $selected >{$u->descrizioneUm}</option>";
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
                $selected = "";
                if($categoria->idCategorieProd==$prodotto->idCategorieProd){
                    $selected = 'selected="selected"';
                }
                echo "<option value=\"{$categoria->idCategorieProd}\" $selected >{$categoria->nomeCategoria}</option>";
            }
        ?>
        </select></td>
    </tr>
    <tr>
      <td align="center">creato il</td>
      <td><input name="creato" type="text" id="creato" value="<?php echo $prodotto->creatoIl; ?>" size="10" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="center">aggiornato il</td>
      <td><input name="aggiornato" type="text" id="aggiornato" value="<?php echo $prodotto->aggiornatoIl; ?>" size="10" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="center">Attivo</td>
      <td>
          <select name="attivo" id="attivo">
              <?php
              $select_true = $select_false = "";
              if ($prodotto->isAttivo){
                  $select_true = 'selected="selected"';
              }else{
                  $select_false = 'selected="selected"';
              }
              ?>
              <option value="0" <?php echo $select_false; ?> >No</option>
              <option value="1" <?php echo $select_true; ?> >Si</option>
          </select>
          </td>
    </tr>
  </table>
  <p>
    <input name="Salva" type="submit" class="submit" id="Salva" value="" />&nbsp;Salva
  </p>
</form>
Schede tecniche
<table>
    <tr><th>ID</th><th>Descrizione</th><th>Temperatura Forno</th><th>gr Umido</th><th>gr Secco</th><th>Viscosità</th><th>Velocità</th></tr>
    <?php
    $SchedeTecniche = DAOFactory::getSchedeTecnicheDAO()->queryByIdProdotto($prodotto->idProdotto);
    $num_schede = count($SchedeTecniche);
    $scheda = new SchedeTecniche();
    for($i=0; $i<$num_schede; $i++){
        $scheda = $SchedeTecniche[$i];
        echo "<tr>
            <td>{$scheda->idSchedaTecnica}</td>
            <td>{$scheda->descrizione}</td>
            <td>{$scheda->tempForno}</td>
            <td>{$scheda->grUmido}</td>
            <td>{$scheda->grSecco}</td>
            <td>{$scheda->viscosita}</td>
            <td>{$scheda->velocita}</td>
            <td><a href=\"elimina_scheda_tecnica.php?id={$scheda->idSchedaTecnica}\">Elimina</a></td>
            </tr>";
    }
    ?>
    <form action="add_scheda_tecnica.php" method="post" name="form2" id="form2" >
        <tr>
            <td>&nbsp;</td>
            <td><input type="text" name="descrizione" id="descrizione" /></td>
            <td><input type="text" name="temp_forno" id="temp_forno" /></td>
            <td><input type="text" name="gr_umido" id="gr_umido" /></td>
            <td><input type="text" name="gr_secco" id="gr_secco" /></td>
            <td><input type="text" name="viscosita" id="viscosita" /></td>
            <td><input type="text" name="velocita" id="velocita" /></td>
            <td><input type="hidden" name="id_prodotto" value="<?php echo $prodotto->idProdotto ?>" />
                <input name="Aggiungi" type="submit" class="add" id="Aggiungi" value="" /></td>
            </tr>
    </form>
</table>
</body>
</html>

<?php
}
?>