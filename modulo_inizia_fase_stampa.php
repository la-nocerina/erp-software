<?php

include 'common/generated/include_dao.php';

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$fase_stampa = DAOFactory::getFasiStampaDAO()->load($_GET['id']);
if(!$fase_stampa){
    exit('accesso ad area assente');
}
$commessa = DAOFactory::getCommesseDAO()->load($fase_stampa->idCommessa);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>
<body>
    <p>Ultima scheda di produzione:</p>
    <?php
    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->loadLastByLinea($fase_stampa->numLinea);
    if( $scheda_produzione ){
        if(($scheda_produzione->idPartner==$commessa->idPartner) && ($scheda_produzione->lavorazione==$fase_stampa->descrizione)){
        ?>
    <table>
      <tr>
        <td width="29%" rowspan="3">LN La Nocerina s.r.l.</td>
        <td width="34%" rowspan="3">REPARTO MACCHINE<br />STAMPA E<br />VERNICIATURA</td>
        <td width="28%">BICOLORE CRABTREE<br />N.</td>
        <td width="9%"><?php if($scheda_produzione->tipoMacchina=="B"){echo $scheda_produzione->linea;} ?></td>
      </tr>
      <tr>
        <td>VERNICIATRICE<br />N.</td>
        <td><?php if($scheda_produzione->tipoMacchina=="V"){echo $scheda_produzione->linea;} ?></td>
      </tr>
      <tr>
          <td colspan="2">Data <?php echo $scheda_produzione->data;?>
            Ora <?php echo $scheda_produzione->ora; ?></td>
      </tr>
    </table>
    <table>
      <tr>
        <td>TURNO:</td>
          <?php
          $selected1=$selected2=$selected3=$selected4=$txtIntermedio='';
          switch ($scheda_produzione->turno){
              case 'M': $selected1 = ' checked="checked" ';break;
              case 'P': $selected2 = ' checked="checked" ';break;
              case 'N': $selected3 = ' checked="checked" ';break;
              default : $selected4 = ' checked="checked" ';$txtIntermedio=$scheda_produzione->turno;break;
          }
          ?>
        <td><input name="turno" type="radio" id="turno1" value="M" disabled <?php echo $selected1 ?>  />Mattina<br />
          06,00<br />
          14,00
        </td>
        <td><input type="radio" name="turno" id="turno2" value="P" disabled  <?php echo $selected2 ?> />Pomeriggio<br />
          14,00<br />
          22,00</td>
        <td><input type="radio" name="turno" id="turno3" value="N" disabled  <?php echo $selected3 ?> />Notte<br />
          22,00<br />
          06,00</td>
        <td><input type="radio" name="turno" id="turno4" value="I" disabled  <?php echo $selected4 ?> />Interme.<br/>
            <?php echo $txtIntermedio; ?></td>
        <td>MACCHINISTA:<br/><?php echo $scheda_produzione->macchinista; ?></td>
      </tr>
      <tr>
        <td colspan="5">CLIENTE:<br/><?php echo $scheda_produzione->idPartner; ?></td>
        <td>LAVORAZIONE:<br/><?php echo $scheda_produzione->lavorazione; ?></td>
      </tr>
    </table>
    <?php
        }else{
            echo 'E\' necessario creare una nuava scheda di produzione';
        }
    }
    ?>

    <p><a href="modulo_add_scheda_produzione_by_fase_stampa.php?id=<?php echo $_GET['id']; ?>" >Creare nuova scheda di produzione</a></p>

    <form name="from1" method="post" action="inizia_fase_stampa.php">
    <table>
        <tr>
            <th>N°COMMESSA</th>
            <th>N°COLLAUDO</th>
            <th>DA ORA</th>
            <th>A ORA</th>
            <th>N°PACCO</th>
            <th>FOGLI</th>
            <th>CONTR. VISIVO</th>
            <th>CONTR. VISIVO</th>
            <th>NOTE</th>
            <th>VERIFICATORE</th>
        </tr>

        <?php
        if ($scheda_produzione){
            $associazioni_giac_fase_stampa = DAOFactory::getAssociaFasiStampaGiacenzeDAO()->queryByIdSchedaProduzione($scheda_produzione->idSchedaProduzione );
            $assoc_giac_fase_s = new AssociaFasiStampaGiacenze();
            for($i=0; $i<count($associazioni_giac_fase_stampa); $i++){
                $assoc_giac_fase_s = $associazioni_giac_fase_stampa[$i];
                $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($assoc_giac_fase_s->idProdottoInGiacenza);
                $certificato = new CertificatiCollaudo();
                $certificato = $cert_collaudo[0];
                $old_fase_stampa = DAOFactory::getFasiStampaDAO()->load($assoc_giac_fase_s->idFaseStampa);
                echo "<tr>
                        <td> $old_fase_stampa->idCommessa </td>
                        <td> $certificato->collN </td>
                        <td> $old_fase_stampa->oraInizio </td>
                        <td> &nbsp; </td>
                        <td> $certificato->paccoN </td>
                        <td> $assoc_giac_fase_s->numFogli </td>
                        <td> $assoc_giac_fase_s->controllo1 </td>
                        <td> $assoc_giac_fase_s->controllo2 </td>
                        <td> $assoc_giac_fase_s->note </td>
                        <td> $assoc_giac_fase_s->verificatore </td>
                    </tr>";
            }
        }
        ?>

        <tr>
            <td><input type="hidden" name="id_fase_stampa" value="<?php echo $fase_stampa->idFaseStampa; ?>" /> <?php echo $fase_stampa->idCommessa; ?></td>
            <td>&nbsp;</td>
            <td><input type="text" name="ora_inizio" value="<?php echo date('G')+1 .':' . date('i'); ?>" size="10" /> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input class="submit" name="inizia" value="" type="submit" />&nbsp;Inizia Fase</td>
        </tr>
    </table>
    </form>
</body>
</html>