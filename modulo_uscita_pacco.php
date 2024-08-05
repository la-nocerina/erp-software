<?php

if( empty($_GET['id']) ){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($_GET['id']);
if( !$prodotto_giac ){
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
<p>Invio merce al cliente</p>

<form id="form1" method="post" action="add_uscita_pacco.php">
    <input type="hidden" name="id_giacenza" value="<?php echo $prodotto_giac->idProdottoInGiacenza; ?>" />
  <p>Numero DDT
    <input type="text" name="ddt_n" id="ddt_n" />
    <br />
    Del
    <input type="text" name="data_ddt" id="data_ddt" />
  </p>
  <p>
    <input class="submit" type="submit" name="salva" id="salva" value="" />&nbsp;Salva
  </p>
</form>
</body>
</html>

