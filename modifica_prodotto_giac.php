<?php
include 'common/generated/include_dao.php';

if(array_key_exists('Salva', $_POST) && !empty($_POST['id']) && !empty($_POST['id_prodotto']) && !empty($_POST['magazzino']) ){
    $prodotto = new ProdottiInGiacenza();
    $prodotto = DAOFactory::getProdottiInGiacenzaDAO()->load($_POST['id']);
    
    $prodotto->idProdotto = $_POST['id_prodotto'];
    $prodotto->idMagazzino  = $_POST['magazzino'];
    $prodotto->quantita = $_POST['quantita'];
    if ( !empty($_POST['batch'])){
        $prodotto->batch = $_POST['batch'];
    }else{
        $prodotto->batch='';
    }
    try {
        DAOFactory::getProdottiInGiacenzaDAO()->customUpdate($prodotto);
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
$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['id']);
if(!$prodotto_giac){
    exit('accesso ad area assente');
}

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
        open('scegli_prodotto_popup.php', 'Lista prodotti', null);
    }
    function scrivi_id(id){
        $('#id_prodotto').val(id);
    }
</script>
</head>

<body>
<p>Modifica prodotto</p>
<form id="form1" method="post" action="modifica_prodotto_giac.php">
  <table cellspacing="0" cellpadding="0">
      <tr>
          <td>ID Prodotto in giacenza</td>
          <td><input type="text" name="id" id="id" value="<?php echo $prodotto_giac->idProdottoInGiacenza; ?>" readonly/></td>
      </tr>
    <tr>
      <td align="center">id_prodotto</td>
      <td><input type="text" name="id_prodotto" id="id_prodotto" value="<?php echo $prodotto_giac->idProdotto; ?>" />
      <input class="select" type="button" name="apri_finestra_prodotti" value="&nbsp;&nbsp;&nbsp;&nbsp;Scegli" onclick="javascript: scegli_prodotto()" />
      </td>
    </tr>
    <tr>
      <td align="center">quantita</td>
      <td><input name="quantita" size="10" id="quantita" type="text" value="<?php echo $prodotto_giac->quantita; ?>" /></td>
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
            $selected ='';
            if ($prodotto_giac->idMagazzino == $magazzino->idMagazzino){
                $selected = 'selected="selected"';
            }
            echo "<option value=\"$magazzino->idMagazzino\" $selected >$magazzino->descrizione</option>";
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <td align="center">batch</td>
      <td><input name="batch" size="10" id="batch" type="text" value="<?php echo $prodotto_giac->batch; ?>" /></td>
    </tr>
    <tr>
      <td >&nbsp;  </td>
      <td>
      IMMAGINE CODICE A BARRE
    </tr>
  </table>
  <p>
    <input class="submit" type="submit" name="Salva" id="Salva" value="" />&nbsp;Salva
  </p>
</form>

</body>
</html>

<?php
}
?>