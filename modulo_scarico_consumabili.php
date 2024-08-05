<?php

if( empty($_GET['id_giac']) || empty($_GET['fase']) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';
$batch_fase = DAOFactory::getBatchFaseDAO()->load($_GET['id_giac'], $_GET['fase']);

if(!$batch_fase){
    exit('accesso ad area assente');
}

$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['id_giac']);
$prodotto = DAOFactory::getProdottiDAO()->load($prodotto_giac->idProdotto);
$unita_misura = DAOFactory::getUnitaMisuraDAO()->load($prodotto->idUnitaMisura);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>

<p>Aggioramento quantità materiale</p>
<p>Vecchia quantità: <?php echo $prodotto_giac->quantita ." ". $unita_misura->descrizioneUm; ?> </p>
<form id="form1" method="post" action="add_scarico_materiale.php">
 <input type="hidden" name="id_giacenza" value="<?php echo $_GET['id_giac']; ?>" />
      <input type="hidden" name="fase" value="<?php echo $_GET['fase']; ?>" />
    <p>Nuova Quantità <input type="text" name="quantita" id="quantita" /> <?php echo $unita_misura->descrizioneUm; ?>
  </p>
  <p>
    <input class="submit" type="submit" name="salva" id="salva" value="" />&nbsp;Salva
  </p>
</form>
</body>
</html>
