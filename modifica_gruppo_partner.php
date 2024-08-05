<?php
include 'common/generated/include_dao.php';

if(array_key_exists('Salva', $_POST) && !empty($_POST['id']) && !empty($_POST['nome']) ){
    $gruppo = new GruppiPartner();
    $gruppo->idGruppoPartner = $_POST['id'];
    $gruppo->nome = $_POST['nome'];
    try {
        DAOFactory::getGruppiPartnerDAO()->update($gruppo);
        echo 'gruppo aggiornato';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare il gruppo';
        //exit();
    }
}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

$gruppo = DAOFactory::getGruppiPartnerDAO()->load($_GET['id']);
if(!$gruppo){
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
<p>Modifica Gruppo Partner</p>
<form id="form1" method="post" action="modifica_gruppo_partner.php">
  <p>
      ID <input type="text" name="id" id="id" value="<?php echo $gruppo->idGruppoPartner ?>" readonly/> <br/>
      Nome Gruppo <input type="text" name="nome" id="nome" value="<?php echo $gruppo->nome; ?>" />
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