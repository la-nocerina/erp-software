<?php
include 'common/generated/include_dao.php';

if(array_key_exists('Salva', $_POST) && !empty($_POST['id']) && !empty($_POST['descrizione']) ){

    $magazzino = new Magazzini();
    $magazzino->idMagazzino = $_POST['id'];
    $magazzino->descrizione = $_POST['descrizione'];

    try {
        DAOFactory::getMagazziniDAO()->update($magazzino);
        echo 'Magazzino aggiornato';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare il magazzino';
        //exit();
    }

}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$magazzino = DAOFactory::getMagazziniDAO()->load($_GET['id']);
if(!$magazzino){
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
<p>Modifica Magazzino</p>
<form id="form1" method="post" action="modifica_magazzino.php">
  <p>
      ID <input type="text" name="id" id="id" value="<?php echo $magazzino->idMagazzino; ?>" readonly/> <br/>
      Descrizione <input type="text" name="descrizione" id="descrizione" value="<?php echo $magazzino->descrizione; ?>" />
  </p>
  <p>
    <input class="submit" type="submit" name="Salva" id="Salva" value="" />&nbsp;Salva
  </p>
</form>
</body>
</html>

<?php
}
?>