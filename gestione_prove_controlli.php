<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
<p>Gestione Prove e Controlli di laboratorio</p>
<table>
    <tr><th>ID</th><th>Data</th><th>Responsabile</th></tr>

    <?php
    include 'common/generated/include_dao.php';

    $prove_controlli = DAOFactory::getSchedeProveDAO()->queryAll();
    $prova = new SchedeProve();
    for($i=0; $i<count($prove_controlli); $i++){
        $prova = $prove_controlli[$i];
        echo "<tr>
        <td><a href=\"visualizza_prove_controlli.php?id=$prova->idSchedaProve\">$prova->idSchedaProve</a></td>
        <td>$prova->data</td>
        <td>$prova->rLaboratorio</td>
        <td><a href=\"modifica_prove_controlli.php?id=$prova->idSchedaProve\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
        </tr>";
    }

    ?>

</table>

<p><a href="modulo_add_scheda_prove.php"><img src="img/icon_add.png" />Aggiungi scheda prove e controlli di laboratorio</a></p>

</body>
</html>