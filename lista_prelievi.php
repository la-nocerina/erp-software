<?php

include 'common/generated/include_dao.php';

$prelievi = DAOFactory::getPrelievoLastreDAO()->queryByData($_GET['data']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    function scegli_partner(){
        open('scegli_partner_popup.php', 'Lista partner', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_partner(id){
        $('#id_partner').val(id);
    }
</script>
</head>

<body>
<p>Gestione Prelievo lastre</p>
<table>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Nome Lavoro</th>
        <th>N°Lastre</th>
        <th>Colori</th>
        <th>Firma</th>
    </tr>
    <?php
    $prelievo = new PrelievoLastre();
    for($i=0; $i<count($prelievi); $i++){
        $prelievo = $prelievi[$i];
        echo "<tr>
                <td>$prelievo->idPrelievoLastre</td>
                <td>$prelievo->idPartner</td>
                <td>$prelievo->nomeLavoro</td>
                <td>$prelievo->numLastre</td>
                <td>$prelievo->colori</td>
                <td>$prelievo->firma</td>
                <td><a href=\"elimina_prelievo_lastre.php?id=$prelievo->idPrelievoLastre\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            </tr>";
    }
    ?>
</table>

<p><a href="visualizza_lista_prelievi.php?data=<?php echo $_GET['data']; ?>">Stampa in pdf</a></p>

</body>
</html>
