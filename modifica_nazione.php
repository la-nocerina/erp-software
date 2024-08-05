<?php
include 'common/generated/include_dao.php';

if(array_key_exists('salva', $_POST) && !empty($_POST['id']) && !empty($_POST['nome_nazione']) ){
    $nazione = DAOFactory::getNazioniDAO()->load($_POST['id']);
    if(!$nazione){
        exit('accesso ad area assente');
    }

    $nazione->nomeNazione = $_POST['nome_nazione'];
    try {
        DAOFactory::getNazioniDAO()->update($nazione);
        header('Location: gestione_nazioni.php');
        //echo 'nazione aggiornata';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare la nazione';
        //exit();
    }
}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

$nazione = DAOFactory::getNazioniDAO()->load($_GET['id']);
if(!$nazione){
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
<p>Modifica Nazione</p>
<form id="form1" method="post" action="modifica_nazione.php">
  <p>
      ID <input type="text" name="id" id="id" value="<?php echo $nazione->idNazione; ?>" readonly/> <br/>
      Nome Nazione <input type="text" name="nome_nazione" id="nome_nazione" value="<?php echo $nazione->nomeNazione; ?>" />
  </p>
  <p>
    <input class="submit" type="submit" name="salva" id="Salva" value="" />&nbsp;Salva
  </p>
</form>
</body>
</html>

<?php
}
?>