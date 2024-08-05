<?php

include 'common/generated/include_dao.php';
$categorie = DAOFactory::getCategorieProdDAO()->queryAll();
$num_categorie = count($categorie);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>

<script type="text/javascript" src="common/js/jquery-1.4.2.js" ></script>
<script type="text/javascript">
$(function(){
	$("table tr:event").addClass("tr1");
	$("table tr:odd").addClass("tr2");
});
</script>
</head>

<body>
Gestione Categorie

<table>

    <tr><th>id</th><th>Nome Categoria</th></tr>
    <?php
        for($i=0;$i<$num_categorie;$i++){
            $categoria = $categorie[$i];
            echo "<tr>
            <td>{$categoria->idCategorieProd}</td>
            <td>{$categoria->nomeCategoria}</td>
            <td><a href=\"elimina_categoria.php?id={$categoria->idCategorieProd}\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_categoria.php?id={$categoria->idCategorieProd}\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_categoria.html"><img class="img" src="img/icon_add.png" />Aggiungi Categoria</a></p>
</body>
</html>