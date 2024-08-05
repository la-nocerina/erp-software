<?php

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}

include 'common/generated/include_dao.php';

$certificati = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($_GET['id']);
if(!$certificati){
    exit('accesso ad area assente');
}

$certificato = new CertificatiCollaudo();
$certificato = $certificati[0];


$array_descrizioni[1] = "1 DORE' INT.";
$array_descrizioni[2] = "1 DORE' INT. DOPP.";
$array_descrizioni[3] = "1 DORE' INT./ZINCO";
$array_descrizioni[4] = "1 DORE' EST.";
$array_descrizioni[5] = "1 ARG. A FINIRE";
$array_descrizioni[6] = "1 SM. EST.";
$array_descrizioni[7] = "1 SM. INT.";
$array_descrizioni[7] = "1 SM. DOPP MANO";
$array_descrizioni[8] = "1 ANCORANTE INT.";
$array_descrizioni[9] = "1 ANCORANTE EST.";
$array_descrizioni[10] = "2 ANCORANTE INT.";
$array_descrizioni[11] = "1 DORE' A FINIRE";
$array_descrizioni[12] = "1 ALLUMINATA INT.";
$array_descrizioni[13] = "1 ALLUMINATA EST.";
$array_descrizioni[14] = "ORGANOSOL";
$array_descrizioni[15] = "SGRASSAGGIO";

$array_desc_stampa[1] = "1 COLORE";
$array_desc_stampa[2] = "2 COLORI";
$array_desc_stampa[3] = "2 COLORI";
$array_desc_stampa[4] = "2 COLORI";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>

<body>

<?php
$html ='
    <H1>LN  LA NOCERINA S.R.L.</H1>
    <p>MOD. 26 - CERTIFICATO DI COLLAUDO - REV.1</p>';

$cliente = DAOFactory::getPartnerDAO()->load($certificato->idPartner);
$prodotto_giac = DAOFactory::getProdottiInGiacenzaDAO()->load($certificato->idProdottoInGiacenza);

$classificazione = explode('|', $certificato->classificazione);
$checked1 = $checked2 = $checked3 = '';
$colored1 = $colored2 = $colored3 = '';
if( in_array('1', $classificazione)){ $checked1 = 'X'; $colored1=' style="background-color:green" ';}
if( in_array('2', $classificazione)){ $checked2 = 'X'; $colored2=' style="background-color:blue" ';}
if( in_array('3', $classificazione)){ $checked3 = 'X'; $colored3=' style="background-color:red" ';}

$html.= "
<table width=\"100%\">
  <tr>
    <td colspan=\"3\">CLIENTE: $cliente->ragioneSociale </td>
    <td colspan=\"2\">[ $checked1 ] <span $colored1 >CONFORME (VERDE)</span><br/>
        [ $checked2 ] <span $colored2 >DECLASSATO (BLU)</span><br/>
        [ $checked3 ] <span $colored3 >NON CONFORME (ROSSO)</span>
      </td>
  </tr>
  <tr>
    <td colspan=\"2\">D.D.T. N° <br/> $certificato->ddtN </td>
    <td>DEL <br/> $certificato->del </td>
    <td>COLLI N° <br/> $certificato->numColli </td>
    <td>KG.<br/> $certificato->kg </td>
  </tr>
  <tr>";

$band_st = $band_crom = $allum = $altro = '';
switch($certificato->materiale){
    case '1': $band_st=' X '; break;
    case '2': $band_crom=' X '; break;
    case '3': $allum=' X '; break;
    case '4': $altro=' X '; break;

}

$html.= "<td rowspan=\"2\">MATERIALE <br/>
[ $band_st ] BANDA STAGN.<br/>
[ $band_crom ] BANDA CROM.<br/>
[ $allum ] ALLUMINIO<br/>
[ $altro ] ALTRO
</td>
    <td colspan=\"2\">FORMATO <br/> $certificato->formato </td>
    <td>TEMPRA <br/> $certificato->tempra </td>
    <td>SPESSORE <br/> $certificato->spessore </td>
  </tr>
  <tr>
    <td>N°PACCO FERRIERA <br/> $certificato->numPaccoFerriera </td>
    <td>COMM. N° <br/> $certificato->commN </td>
    <td>COLL. N° <br/> $certificato->collN </td>
    <td>PACCO N° <br/> $certificato->paccoN </td>
  </tr>
  <tr>
    <td colspan=\"5\">BOZZETTO: <br/> $certificato->bozzetto </td>
  </tr>
  </table>";


$lavorazioni = explode('|', $certificato->lavorazioni);
$da_stampare = array(' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ');
for($i=1; $i<=16; $i++){
    if(in_array($i, $lavorazioni)){
        $da_stampare[$i] = 'X';
    }
}

$html.="<table width=\"100%\" border=\"1\">";

$html.= "<tr>
    <td colspan=\"2\">VERNICIATURA INTERNA <br/>";

     $html .= "ANCORANTE 1 [ {$da_stampare[9]} ]<br/>";
     $html .= "ANCORANTE 2 [ {$da_stampare[11]} ]<br/>";
     $html .= "ORGANOSOL [ {$da_stampare[15]} ]<br/>";
     $html .= "DORE' 1 [ {$da_stampare[1]} ]<br/>";
     $html .= "DORE' 2 [ {$da_stampare[2]} ]<br/>";
     $html .= "DORE' CON PASTA [ {$da_stampare[3]} ]<br/>";
     $html .= "SMALTO 1 [ {$da_stampare[7]} ]<br/>";
     $html .= "SMALTO 2 [ {$da_stampare[8]} ]<br/>";
     $html .= "ALLUMINIO [ {$da_stampare[13]} ]<br/>";
     $html .= "SGRASSAGGIO [ {$da_stampare[16]} ]<br/>";
     $html .= "ALTRO [ ]";
    $html .= "</td>
        <td colspan=\"2\">VERNICIATURA ESTERNA <br/> ";


    $html .= "SMALTO [ {$da_stampare[6]} ]<br/>";
    $html .= "DORE' [ {$da_stampare[4]} ]<br/>";
    $html .= "ANCORANTE [ {$da_stampare[10]} ]<br/>";
    $html .= "DORE' A FINIRE [ {$da_stampare[12]} ]<br/>";
    $html .= "TRASPARENTE [ {$da_stampare[5]} ]<br/>";
    $html .= "ALLUMINIO [ {$da_stampare[14]} ]<br/>";
    $html .= "ALTRO [ ]";

    $html .= '</td></tr>';

    $html.='<tr>
    <td colspan="4">STAMPA <br/>';

    $html .= '1 COLORE '; if( $certificato->numStampe==1){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '2 COLORI '; if( $certificato->numStampe==2){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '3 COLORI '; if( $certificato->numStampe==3){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '4 COLORI '; if( $certificato->numStampe==4){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '5 COLORI '; if( $certificato->numStampe==5){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '6 COLORI '; if( $certificato->numStampe==6){ $html.='[ X ]';}else{$html.='[ ]';} $html .='<br/>';
    $html .= '7 COLORI '; if( $certificato->numStampe==7){ $html.='[ X ]';}else{$html.='[ ]';}

    $html .= "</td>
  </tr>
  <tr>
    <td width=\"25%\">FOGLI <br/> $prodotto_giac->quantita </td>
    <td width=\"25%\">&nbsp;</td>
    <td width=\"25%\">DATA <br/> $certificato->data </td>
    <td width=\"25%\">VERIFICATORE <br/> $certificato->verificatore </td>
  </tr>
  <tr>
    <td colspan=\"4\">DA RESTITUIRE IN CASO DI CONTESTAZIONE <br/> $certificato->contestazione </td>
  </tr>
  <tr>
    <td colspan=\"4\">NOTE <br/> $certificato->note </td>
  </tr>
  <tr>
    <td colspan=\"4\">Codice univoco (BarCode) <br/>";

/*include 'common/Image_Barcode-1.1.1/Image/Barcode/ean13.php';
$bc_gen = new Image_Barcode_ean13();
$code = str_pad($certificato->idProdottoInGiacenza, 12, "0", STR_PAD_LEFT);
$img = $bc_gen->draw($code);
$name_img = uniqid('barcode_').'.png';
imagepng($img, $name_img);*/

$html .="&nbsp;<img src=\"common/barcode_png.php?code=$certificato->idProdottoInGiacenza\" height=\"80\" width=\"200\"/>";

$html.="</td></tr>";
$html.="</table>";

echo $html;

?>
<p>Stampa Cartellino: <a href="recupera_certificato_collaudo.php?id=<?php echo $prodotto_giac->idProdottoInGiacenza; ?>">Cert.Coll</a> </p>
    <p>Fasi di lavorazione:</p>
    <table>
        <tr><th>ID Fase</th><th>Descrizione</th><th>Cod.Prod.</th> <th>Terminato</th> </tr>
        <?php
        $associazioni_fase_giac = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdProdottoInGiacenza($certificato->idProdottoInGiacenza);
        $ass_fase_giac = new AssociaFasiGiacenze();
        for($i=0; $i<count($associazioni_fase_giac); $i++){
            $ass_fase_giac = $associazioni_fase_giac[$i];
            $fase = DAOFactory::getFasiDAO()->load($ass_fase_giac->idFase);
            $terminato='NO';
            if(!empty($ass_fase_giac->numFogli)){
                $terminato ='SI';
            }
            echo "<tr>
                    <td><a href=\"visualizza_fase.php?id=$ass_fase_giac->idFase\">$ass_fase_giac->idFase</a></td>
                    <td>{$array_descrizioni[$fase->descrizione]}</td>
                    <td>$fase->codiceInternoProdotto</td>
                    <td>$terminato</td>
                </tr>";
        }
        ?>
    </table>

        <p>Fasi di stampa:</p>
    <table>
        <tr><th>ID Fase stampa</th><th>Descrizione</th><th>Cod.Prod.</th><th>Terminato</th> </tr>
        <?php
        $associazioni_fase_stampa_giac = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->queryByIdProdottoInGiacenza($certificato->idProdottoInGiacenza);
        $ass_fase_stampa_giac = new AssociaFasiStampaGiacenze();
        for($i=0; $i<count($associazioni_fase_stampa_giac); $i++){
            $ass_fase_stampa_giac = $associazioni_fase_stampa_giac[$i];
            $fase_stampa = DAOFactory::getFasiStampaDAO()->load($ass_fase_stampa_giac->idFaseStampa);
            $terminato='NO';
            if(!empty($ass_fase_giac->numFogli)){
                $terminato ='SI';
            }
            echo "<tr>
                    <td><a href=\"visualizza_fase_stampa.php?id=$ass_fase_stampa_giac->idFaseStampa\">$ass_fase_stampa_giac->idFaseStampa</a></td>
                    <td>{$array_desc_stampa[$fase_stampa->descrizione]} </td>
                    <td>$fase_stampa->codiceInternoPtodotto </td>
                    <td>$terminato</td>
                </tr>";
        }
        ?>
    </table>

        <?php
        if( empty($prodotto_giac->idMagazzino) ){
            //materiale presso cliente
            echo '<p>Il materiale è stato inviato al cliente<br/>';
            echo "DDT: $prodotto_giac->uscitaDdtN  del $prodotto_giac->uscitaDataDdt</p>";
        }else{
            $magazzino = DAOFactory::getMagazziniDAO()->load($prodotto_giac->idMagazzino);
            echo "<p>Il materiale è presso il magazzino: $magazzino->descrizione";
        }
        ?>
</body>
</html>

<?php
    unlink($name_img);
?>