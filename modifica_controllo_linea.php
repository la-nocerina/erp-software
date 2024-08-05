<?php

if( empty($_GET['scheda']) || empty($_GET['linea']) || empty($_GET['ora']) ){
    exit('accesso ad area in modo non consentito');
}


$test = array();
$test[1]="Pacco";
$test[2]="Comm.";
$test[3]="Fase";
$test[4]="Gr.Media";
$test[5]="Temper.Forno";
$test[6]="Polimerizzazione";
$test[7]="Porosità";
$test[8]="Aderenza";
$test[9]="Cod.Barra";
$test[10]="Sterilizzazione";
$test[11]="Prova mastice";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>
<body>

    <p>Linea: <?php echo $_GET['linea']; ?></p>
    <form name="form1" method="post" action="add_controllo_linea.php">
        <?php
        include 'common/generated/include_dao.php';
        $controllo = DAOFactory::getProveControlliLineaDAO()->load($_GET['scheda'], $_GET['linea'], $_GET['ora']);
        $txt = array();
        $id_giac = '';
        $id_fase = '';
        $id_fase_stampa='';
        if(!$controllo){
            $txt[1]='';//pacco
            $txt[2]='';//commessa
            $txt[3]='';//fase
            $ass_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->loadLastByLinea($_GET['linea']);
            if( $ass_giac_fase ){
                //la linea sta lavorando una fase di verniciatura
                $id_giac = $ass_giac_fase->idProdottoInGiacenza;
                $id_fase = $ass_giac_fase->idFase;
                $fase = DAOFactory::getFasiDAO()->load( $ass_giac_fase->idFase );
                $txt[3] = $fase->numFase;
                $txt[2] = $fase->idCommessa;
                $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_fase->idProdottoInGiacenza);
                $txt[1] = $certificato->paccoN;
            }else{
                $assoc_giac_fase_s = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->loadLastByLinea($_GET['linea']);
                if( $assoc_giac_fase_s ){
                    $id_giac = $assoc_giac_fase_s->idProdottoInGiacenza;
                    $id_fase_stampa = $assoc_giac_fase_s->idFaseStampa;
                    $fase_stampa = DAOFactory::getFasiStampaDAO()->load( $assoc_giac_fase_s->idFaseStampa );
                    $txt[3] = $fase_stampa->numFase;
                    $txt[2] = $fase_stampa->idCommessa;
                    $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase_s->idProdottoInGiacenza);
                    $txt[1] = $certificato->paccoN;
                }else{
                    echo '<p>la linea non sta lavorando... non è possibile effetturare controlli</p>';
                }
            }

        }else{
            $ass_giac_fase = $assoc_giac_fase_s = NULL;
            if( $controllo->idFase ){
                $ass_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->load($controllo->idProdottoInGiacenza, $controllo->idFase );
                $id_giac = $ass_giac_fase->idProdottoInGiacenza;
                $id_fase = $ass_giac_fase->idFase;
                $fase = DAOFactory::getFasiDAO()->load( $ass_giac_fase->idFase );
                $txt[3] = $fase->numFase;
                $txt[2] = $fase->idCommessa;
                $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_fase->idProdottoInGiacenza);
                $txt[1] = $certificato->paccoN;
            }else{
                $assoc_giac_fase_s = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->load($controllo->idProdottoInGiacenza, $controllo->idFaseStampa );
                $id_giac = $assoc_giac_fase_s->idProdottoInGiacenza;
                $id_fase = $assoc_giac_fase_s->idFaseStampa;
                $fase_stampa = DAOFactory::getFasiStampaDAO()->load( $assoc_giac_fase_s->idFaseStampa );
                $txt[3] = $fase_stampa->numFase;
                $txt[2] = $fase_stampa->idCommessa;
                $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase_s->idProdottoInGiacenza);
                $txt[1] = $certificato->paccoN;
            }
            $txt[4]= $controllo->c1;
            $txt[5]= $controllo->c2;
            $txt[6]= $controllo->c3;
            $txt[7]= $controllo->c4;
            $txt[8]= $controllo->c5;
            $txt[9]= $controllo->c6;
            $txt[10]= $controllo->c7;
            $txt[11]= $controllo->c8;
        }
        ?>
        <input type="hidden" name="scheda" value="<?php echo $_GET['scheda']; ?>" />
        <input type="hidden" name="linea" value="<?php echo $_GET['linea']; ?>" />
        <input type="hidden" name="ora" value="<?php echo $_GET['ora']; ?>" />

        <input type="hidden" name="id_giac" value="<?php echo $id_giac; ?>" />
        <input type="hidden" name="id_fase" value="<?php echo $id_fase; ?>" />
        <input type="hidden" name="id_fase_stampa" value="<?php echo $id_fase_stampa; ?>" />
<table>
    <tr><td>&nbsp;</td><td><?php echo $_GET['ora']; ?></td> </tr>
    <?php
    for($i=1; $i<=count($test); $i++){
        if($i<4){
            echo "<tr><td>$test[$i]</td><td> $txt[$i] </td></tr>";
        }else{
            $num = $i-3;
            if( !empty($txt[$i]) ){
                echo "<tr><td>$test[$i]</td><td><input type=\"text\" name=\"c$num\" size=\"10\" value=\"$txt[$i]\" /> </td></tr>";
            }else{
                echo "<tr><td>$test[$i]</td><td><input type=\"text\" name=\"c$num\" size=\"10\" /> </td></tr>";
            }
        }
    }

    ?>
</table>
        <?php
        if( $ass_giac_fase || $assoc_giac_fase_s ){
            echo "<p><input type=\"submit\" name=\"salva\" value=\"Salva\" /> </p>";
        }else{
            echo "<p><input type=\"button\" name=\"salva\" value=\"Salva\" /> </p>";
        }
        ?>
    </form>

</body>
</html>