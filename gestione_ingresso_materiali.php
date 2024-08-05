<?php

include 'common/generated/include_dao.php';
$schede = DAOFactory::getRicezioneMaterialiDAO()->queryAll();
$num_schede = count($schede);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
    <p>Gestione ricevimento materiali</p>
    <table>
        <tr><th>ID</th><th>Cliente</th><th>DDT</th><th>Del</th><th>&nbsp;</th><th>&nbsp;</th></tr>
        <?php
		$classi[0]= ' class="tr1" ';
		$classi[1]= ' class="tr2" ';
        $scheda = new RicezioneMateriali();
            for($i=0; $i<$num_schede; $i++){
                $scheda = $schede[$i];
				$classe= $classi[$i%2];
                echo "<tr $classe >
                        <td><a href=\"visualizza_ricevimento_materiali.php?id=$scheda->idRicezioneMateriali\">$scheda->idRicezioneMateriali</a></td>
                        <td>$scheda->idPartner</td>
                        <td>$scheda->ddtN</td>
                        <td>$scheda->dataDdt</td>
                        <td><a href=\"modifica_ricevimento_materiali.php?id=$scheda->idRicezioneMateriali\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
                        <td><a href=\"elimina_ricevimento_materiali.php?id=$scheda->idRicezioneMateriali\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
                    </tr>";
            }
        ?>
    </table>
    
    <p><a href="modulo_add_ricevimento_materiali.php"><img class="img" src="img/icon_add.png" />Nuovo modulo di ricevimento materiali</a></p>

</body>
</html>