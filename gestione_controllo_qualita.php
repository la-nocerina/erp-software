<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
<p>Gestione Controllo Qualità</p>

    <table>
        <tr><th>ID</th><th>DDT</th><th>del</th><th>Ultima modifica</th></tr>
    <?php
    include 'common/generated/include_dao.php';
    $controlli_q = DAOFactory::getControlliQualitaDAO()->queryAll();
    $controllo_q = new ControlliQualita();
    for($i=0; $i<count($controlli_q); $i++){
        $controllo_q = $controlli_q[$i];
        $data = DAOFactory::getDateControlliQualitaDAO()->loadLastByIdControlliQualita($controllo_q->idControlliQualita);
        echo "<tr>
                <td><a href=\"visualizza_controllo_qualita.php?id=$controllo_q->idControlliQualita\">$controllo_q->idControlliQualita</a></td>
                <td>$controllo_q->ddtN</td>
                <td>$controllo_q->dataDdt</td>
                <td>$data->data</td>
                <td><a href=\"modulo_add_pacco_controllo_q.php?id=$controllo_q->idControlliQualita\"><img class=\"img\" src=\"img/icon_add.png\" />Aggiungi controllo</a></td>
                <td><a href=\"elimina_controllo_qualita.php?id=$controllo_q->idControlliQualita\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            </tr>";
    }
    ?>
    </table>

<p><a href="modulo_add_controllo_qualita.php"><img class="img" src="img/icon_add.png" />Aggiungi scheda controllo qualità</a></p>
</body>
</html>