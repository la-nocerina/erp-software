<?php

if( empty($_GET['linea']) ){
    exit('accesso in modo non autorizzato');
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
    <H1>LN LA NOCERINA S.R.L.</H1>
    <p>MOD.36 - CONTROLLO NUMERO DI FOGLI IN INGRESSO LINEA <?php echo $linea; ?> REV.0 </p>

    <table>
        <tr><th>DATA</th><th>N°COMMESSA</th><th>N°FOGLI</th></tr>

        <?php

        include 'common/generated/include_dao_ext.php';
        
        $fogli_ingresso_obj = new FogliIngressoMySqlExtDAO();
        $fogli_ingresso  =  $fogli_ingresso_obj->queryAll($linea);

        $riga_fogli_ingresso = new FogliIngresso();
        for($i=0; $i< count($fogli_ingresso); $i++){
            $riga_fogli_ingresso = $fogli_ingresso[$i];

            echo "<tr>
                    <td>$riga_fogli_ingresso->data</td>
                    <td>$riga_fogli_ingresso->id_commessa</td>
                    <td>$riga_fogli_ingresso->num_fogli_ingresso</td>
                </tr>";

        }
        
        ?>
        
    </table>
</body>
</html>