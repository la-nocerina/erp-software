<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript">
    function seleziona( codice ){
        window.opener.scrivi_codProdStampa( codice );
        window.close();
    }

</script>
</head>
<body>
<table id="tabella_fasi">
    <tr><th>ID</th><th>Descrizione</th><th>Codice Interno</th><th>gr.um</th><th>gr.sec</th><th>vel.</th><th>temp.forno</th><th>visc</th></tr>
<?php
include 'common/generated/include_dao.php';
$prodotti = DAOFactory::getProdottiDAO()->queryByIsAttivo(1);
$num_prodotti = count($prodotti);
$prodotto = new Prodotti();
    for($i=0;$i<$num_prodotti;$i++){
        $prodotto = $prodotti[$i];
        $schede_tecniche = DAOFactory::getSchedeTecnicheDAO()->queryByIdProdotto($prodotto->idProdotto);
        if( count($schede_tecniche>0) ){
            $scheda = new SchedeTecniche();
            for($j=0; $j<count($schede_tecniche); $j++ ){
                $scheda = $schede_tecniche[$j];
                echo "<tr onclick=\"javascript: seleziona('$prodotto->codiceInterno')\">
                    <td>{$prodotto->idProdotto}</td>
                    <td>$scheda->descrizione</td>
                    <td>{$prodotto->codiceInterno}</td>
                    <td>$scheda->grUmido</td>
                    <td>$scheda->grSecco</td>
                    <td>$scheda->velocita</td>
                    <td>$scheda->tempForno</td>
                    <td>$scheda->viscosita</td>
                    </tr>";
            }
        }

        /*
        echo "<tr onclick=\"javascript: seleziona($prodotto->idProdotto, '$prodotto->codiceInterno')\">
        <td>{$prodotto->idProdotto}</td>
        <td>{$prodotto->codiceInterno}</td>
        </tr>";
        *
         */
    }
?>
</table>

</body>
</html>