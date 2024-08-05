<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript">
    function seleziona( id, num_pacco, formato){
        window.opener.scrivi_pacco(id, num_pacco, formato );
        window.close();
    }
</script>
</head>
<body>
    <form name="form1" method="post" action="scegli_pacco_by_codice_popup.php">
        Codice: <input name="codice" type="text" size="20" />
        <input name="cerca" type="submit" class="select" value="Cerca" />
    </form>
<table id="tabella_fasi">
    <tr><th>Codice</th><th>Materiale</th><th>Formato</th></tr>
<?php
if(!empty($_POST['codice'])){
    include 'common/generated/include_dao.php';
    $prodotto = DAOFactory::getProdottiInGiacenzaDAO()->load($_POST['codice']);
    if($prodotto){
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($prodotto->idProdottoInGiacenza);
        echo "<tr onclick=\"javascript: seleziona($prodotto->idProdottoInGiacenza, '$certificato->paccoN', '$certificato->formato')\">
            <td>$prodotto->idProdottoInGiacenza</td>
            <td>&nbsp;</td>
            <td>$certificato->formato </td>
            </tr>";
    }
}
?>
</table>

</body>
</html>