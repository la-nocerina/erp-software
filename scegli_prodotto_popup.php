<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript">
    function seleziona(id){
        window.opener.scrivi_id(id);
        window.close();
    }
</script>
</head>
<body>
<table>
    <tr><th>ID</th><th>Codice Interno</th><th>Descrizione</th></tr>
<?php
include 'common/generated/include_dao.php';
$prodotti = DAOFactory::getProdottiDAO()->queryByIsAttivo(1);
$num_prodotti = count($prodotti);
$prodotto = new Prodotti();
    for($i=0;$i<$num_prodotti;$i++){
        $prodotto = $prodotti[$i];
        echo "<tr onclick=\"javascript: seleziona($prodotto->idProdotto, '$prodotto->codiceInterno')\">
        <td>{$prodotto->idProdotto}</td>
        <td>{$prodotto->codiceInterno}</td>
        <td>{$prodotto->descrizione}</td>
        </tr>";
    }
?>
</table>

</body>
</html>