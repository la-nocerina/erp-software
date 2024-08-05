<?php
include 'common/generated/include_dao.php';

if(array_key_exists('Salva', $_POST) && !empty($_POST['id']) && !empty($_POST['um']) ){
    $um = new UnitaMisura();
    $um->idUnitaMisura = $_POST['id'];
    $um->descrizioneUm = $_POST['um'];
    try {
        DAOFactory::getUnitaMisuraDAO()->update($um);
        echo 'unità di misura aggiornata';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare l\'unità di misura';
        //exit();
    }

}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$um = DAOFactory::getUnitaMisuraDAO()->load($_GET['id']);
if(!$um){
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
<p>Modifica Unità di misura</p>
<form id="form1" method="post" action="modifica_um.php">
  <p>
      ID <input type="text" name="id" id="id" value="<?php echo $um->idUnitaMisura; ?>" readonly/> <br/>
      Descrizione <input type="text" name="um" id="um" value="<?php echo $um->descrizioneUm; ?>" />
  </p>
  <p>
    <input name="Salva" type="submit" class="submit" id="Salva" value="" />&nbsp;Salva
  </p>
</form>
</body>
</html>

<?php
}
?>