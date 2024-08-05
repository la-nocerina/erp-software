<?php
include 'common/generated/include_dao.php';

if(array_key_exists('Salva', $_POST) && !empty($_POST['id']) && !empty($_POST['nomeCategoria']) ){
    $categoria = new CategorieProd();
    $categoria->idCategorieProd = $_POST['id'];
    $categoria->nomeCategoria = $_POST['nomeCategoria'];
    try {
        DAOFactory::getCategorieProdDAO()->update($categoria);
        echo 'categoria aggiornata';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare lca categoria';
        //exit();
    }
}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$categoria = DAOFactory::getCategorieProdDAO()->load($_GET['id']);
if(!$categoria){
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
<p>Modifica Categoria</p>
<form id="form1" method="post" action="modifica_categoria.php">
  <p>
      ID <input type="text" name="id" id="id" value="<?php echo $categoria->idCategorieProd ?>" readonly/> <br/>
      Nome Categoria <input type="text" name="nomeCategoria" id="nomeCategoria" value="<?php echo $categoria->nomeCategoria; ?>" />
  </p>
  <p>
    <input name="Salva" type="submit" class="submit" id="Salva" value="" />
  salva</p>
</form>
</body>
</html>

<?php
}
?>