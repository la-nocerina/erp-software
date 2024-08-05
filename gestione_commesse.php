<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
<p>Gestione commesse</p>
<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Marca</th>
        <th>DDT</th>
        <th>Colli</th>
        <th>Kg.</th>
    </tr>

    <?php

    include 'common/generated/include_dao.php';
    $commesse = DAOFactory::getCommesseDAO()->queryAll();
    $num_comm = count($commesse);
    $commessa=new Commesse();
    for($i=0; $i<$num_comm; $i++){
        $commessa = $commesse[$i];
        echo '<tr>';
        echo "<td><a href=\"visualizza_commessa.php?id=$commessa->idCommessa\">$commessa->idCommessa</a></td>";
        echo "<td>$commessa->idPartner</td>";
        echo "<td>$commessa->marca</td>";
        echo "<td>$commessa->ddtN</td>";
        echo "<td>$commessa->colli</td>";
        echo "<td>$commessa->kg</td>";
        echo "<td><a href=\"elimina_commessa.php?id=$commessa->idCommessa\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>";
        echo "<td><a href=\"modifica_commessa.php?id=$commessa->idCommessa\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>";
        echo "<td><a href=\"lista_fasi.php?id=$commessa->idCommessa\"><img class=\"img\" src=\"img/icon_list.png\" />Visualizza fasi</a></td>";
        echo '</tr>';
    }

    ?>
    
</table>
<p><a href="modulo_add_commessa.php"><img class="img" src="img/icon_add.png" />Aggiungi commessa</a></p>
</body>
</html>
