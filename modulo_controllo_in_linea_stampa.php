<?php

include 'common/caratteristiche_test_fase.php';


if( empty($_GET['id']) ){
    exit('accesso ad are in modo non consentito');
}

include 'common/generated/include_dao.php';

$controlli=array();
for($i=1; $i<=24; $i++){
    $controllo = DAOFactory::getControlliFaseStampaDAO()->load($_GET['id'], $i);
    $nome = "controlli_$i";
    if( $controllo ){
        $$nome= get_object_vars($controllo);
    }else{
        $$nome=get_object_vars(new ControlliFase());
    }
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>
<body>
    
<table>
  <tr>
    <td rowspan="2"><p>CARATTERISTICHE<br />
    TEST</p></td>
    <td colspan="26">FASI DEL PROCESSO RIFERITE N.3 TURNI DI 8 ORE</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <?php
    for($i=6;$i<=29;$i++){
        $ora = str_pad($i%24, 2, "0", STR_PAD_LEFT);
        if($ora=='00'){
            $ora=24;
        }
        echo "<td><a href=\"modifica_controllo_fase_stampa.php?fasestampa={$_GET['id']}&ora=$ora\">$ora</a></td>";
    }
    ?>
    <td>NOTE</td>
  </tr>

<?php

for($i=1; $i<=16; $i++){
    $nome = "controlli_$i";
    $campo = "c$i";
    echo "<tr>
    <td>$caratteristiche[$i]</td>
    <td>$operatore[$i]</td>
    <td>$controlli_6[$campo]</td>
    <td>$controlli_7[$campo]</td>
    <td>$controlli_8[$campo]</td>
    <td>$controlli_9[$campo]</td>
    <td>$controlli_10[$campo]</td>
    <td>$controlli_11[$campo]</td>
    <td>$controlli_12[$campo]</td>
    <td>$controlli_13[$campo]</td>
    <td>$controlli_14[$campo]</td>
    <td>$controlli_15[$campo]</td>
    <td>$controlli_16[$campo]</td>
    <td>$controlli_17[$campo]</td>
    <td>$controlli_18[$campo]</td>
    <td>$controlli_19[$campo]</td>
    <td>$controlli_20[$campo]</td>
    <td>$controlli_21[$campo]</td>
    <td>$controlli_22[$campo]</td>
    <td>$controlli_23[$campo]</td>
    <td>$controlli_24[$campo]</td>
    <td>$controlli_1[$campo]</td>
    <td>$controlli_2[$campo]</td>
    <td>$controlli_3[$campo]</td>
    <td>$controlli_4[$campo]</td>
    <td>$controlli_5[$campo]</td>
    <td>$note[$i]</td>
  </tr>";
    
}

?>

</table>

</body>
</html>