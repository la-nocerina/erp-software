<?php

if( empty($_GET['linea']) ){
    exit('accesso in modo non consentito');
}
$linea = $_GET['linea'];

include 'common/generated/include_dao.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
    <p>Gestione fermate e guasti - Linea <?php echo $linea; ?></p>

    <table>
        <tr><th>ID</th><th>Data</th><th>Turno</th></tr>
        <?php
        $moduli_fermate_guasti = DAOFactory::getFermateGuastiDAO()->queryByLinea($linea);
        $modulo = new FermateGuasti();
        for($i=0; $i<count($moduli_fermate_guasti); $i++){
            $modulo = $moduli_fermate_guasti[$i];
            echo "<tr>
                    <td><a href=\"visualizza_controllo_fermate_guasti.php?id=$modulo->idFermateGuasti\">$modulo->idFermateGuasti</a></td>
                    <td>$modulo->data</td>
                    <td>$modulo->turno</td>
                    <td><a href=\"modifica_fermate_guasti.php?id=$modulo->idFermateGuasti\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
                </tr>";
        }
        ?>
    </table>

    <p><a href="modulo_add_fermate_guasti.php?linea=<?php echo $_GET['linea']; ?>" ><img class="img" src="img/icon_add.png" />Nuovo modulo - Controllo fermate e guasti </a></p>

</body>
</html>