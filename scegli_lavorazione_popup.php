<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript">
    function seleziona(id, descrizione){
        window.opener.scrivi_lavorazione(id, descrizione);
        window.close();
    }
</script>
</head>

<body>
    <table>
    <tr><th>id</th><th>Tipo</th><th>Descrizione</th></tr>
    <?php
    include 'common/generated/include_dao.php';
    $lavorazioni = DAOFactory::getLavorazioniDAO()->queryAll();
    $num_lavorazioni = count($lavorazioni);

    $lavorazione = new Lavorazioni();
    for($i=0;$i<$num_lavorazioni;$i++){
        $lavorazione = $lavorazioni[$i];
        echo "<tr onclick=\"javascript: seleziona($lavorazione->idLavorazione,'$lavorazione->descrizione');\">
        <td>{$lavorazione->idLavorazione}</td>
        <td>{$lavorazione->tipoLavorazione}</td>
        <td>{$lavorazione->descrizione}</td>
        </tr>";
    }
    ?>
</table>

</body>
</html>