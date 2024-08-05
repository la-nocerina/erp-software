<?php

include 'common/generated/include_dao.php';
$certificati = DAOFactory::getCertificatiCollaudoDAO()->queryAll();
$num_certificati = count($certificati);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>
Gestione Certificati di collaudo

<table>

    <tr><th>ID</th><th>Cliente</th></tr>
    <?php
        $certificato = new CertificatiCollaudo();
        for($i=0;$i<$num_certificati;$i++){
            $certificato = $certificati[$i];
            $cliente = DAOFactory::getPartnerDAO()->load($certificato->idPartner);
            echo "<tr>
            <td><a href=\"visualizza_certificato_collaudo.php?id=$certificato->idCertificatoCollaudo\">$certificato->idCertificatoCollaudo</a></td>
            <td>$cliente->ragioneSociale</td>
            <td><a href=\"elimina_certificato.php?id=$certificato->idCertificatoCollaudo\"><img class=\"img\" src=\"img/icon_delete.png\" />Elimina</a></td>
            <td><a href=\"modifica_certificato.php?id=$certificato->idCertificatoCollaudo\"><img class=\"img\" src=\"img/icon_mod.png\" />Modifica</a></td>
            <td><a href=\"duplica_certificato_collaudo.php?id=$certificato->idCertificatoCollaudo\"><img class=\"img\" src=\"img/icon_copy.png\" />Duplica</a></td>
            </tr>";
        }
    ?>
</table>
<p><a href="modulo_add_certificato_collaudo.php"><img class="img" src="img/icon_add.png" />Aggiungi Certificato di collaudo</a></p>
</body>
</html>