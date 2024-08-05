<?php

include 'common/generated/include_dao.php';

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$fase = DAOFactory::getFasiDAO()->load($_GET['id']);
if(!$fase){
    exit('accesso ad area assente');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
<script type="text/javascript" src="common/js/jquery-1.4.2.js"></script>
<script type="text/javascript">
    function scegli_pacco( ){
        open('scegli_pacco_popup.php', 'Lista pacchi in magazzino', 'width=500,height=500,toolbar=0,resizable=0');
    }
    function scrivi_pacco( id ){
        $('#id_giacenza').val(id);
    }
</script>
</head>
<body>
    <?php
    $scheda_produzione = DAOFactory::getSchedeProduzioneDAO()->loadLastByLinea($fase->numLinea);
    if( $scheda_produzione ){
        ?>
    
    <table>
      <tr>
        <td width="29%" rowspan="3">LN La Nocerina s.r.l.</td>
        <td width="34%" rowspan="3">REPARTO MACCHINE<br />STAMPA E<br />VERNICIATURA</td>
        <td width="28%">BICOLORE CRABTREE<br />N.</td>
        <td width="9%"><?php if($scheda_produzione->tipoMacchina=="B"){echo $scheda_produzione->linea;}else{echo '&nbsp;';} ?></td>
      </tr>
      <tr>
        <td>VERNICIATRICE<br />N.</td>
        <td><?php if($scheda_produzione->tipoMacchina=="V"){echo $scheda_produzione->linea;}else{echo '&nbsp;';} ?></td>
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
    }
    ?>
<p><a href="modulo_add_scheda_produzione_by_fase.php?id=<?php echo $_GET['id']; ?>" >Creare nuova scheda di produzione</a></p>
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

        $associazioni_giac_fase = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFase($fase->idFase);
        $assoc_giac_fase = new AssociaFasiGiacenze();
        for($i=0; $i<count($associazioni_giac_fase); $i++){
            $assoc_giac_fase = $associazioni_giac_fase[$i];
            $cert_collaudo = DAOFactory::getCertificatiCollaudoDAO()->queryByIdProdottoInGiacenza($assoc_giac_fase->idProdottoInGiacenza);
            $certificato = new CertificatiCollaudo();
            $certificato = $cert_collaudo[0];

            if( $assoc_giac_fase->numFogli == 0 ){
                echo "<form name=\"form_lav\" method=\"post\" action=\"modifica_lavorazione_pacco.php\">
                        <tr>
                            <td> $fase->idCommessa </td>
                            <td> $certificato->collN </td>
                            <td> $fase->oraInizio </td>
                            <td> &nbsp; </td>
                            <td> $certificato->paccoN </td>
                            <td> <input type=\"text\" name=\"num_fogli\" size=\"10\" /> </td>
                            <td> <input type=\"text\" name=\"controllo1\" size=\"3\" value=\"$assoc_giac_fase->controllo1\" /> </td>
                            <td> <input type=\"text\" name=\"controllo2\" size=\"3\" value=\"$assoc_giac_fase->controllo2\" /> </td>
                            <td> <input type=\"text\" name=\"note\" value=\"$assoc_giac_fase->note\" /> </td>
                            <td> <input type=\"text\" name=\"verificatore\" value=\"$assoc_giac_fase->verificatore\" /> </td>
                            <td> <input type=\"hidden\" name=\"id_fase\" value=\"$assoc_giac_fase->idFase\" />
                                 <input type=\"hidden\" name=\"id_giacenza\" value=\"$assoc_giac_fase->idProdottoInGiacenza\" />
                                 <input type=\"submit\" name=\"salva\" value=\"Salva\" /> </td>
                            <td> <a href=\"elimina_lavorazione_pacco.php?f=$assoc_giac_fase->idFase&g=$assoc_giac_fase->idProdottoInGiacenza\" >Annulla lavorazione</a> </td>
                            <td> <a href=\"termina_lavorazione_pacco.php?f=$assoc_giac_fase->idFase&g=$assoc_giac_fase->idProdottoInGiacenza\" >Termina</a> </td>
                        </tr>
                    </form>";
            }
            else{
                if($scheda_produzione->idSchedaProduzione!= $assoc_giac_fase->idSchedaProduzione){
                    continue;
                }else{
                    echo "<tr>
                            <td> $fase->idCommessa </td>
                            <td> $certificato->collN </td>
                            <td> $fase->oraInizio </td>
                            <td> &nbsp; </td>
                            <td> $certificato->paccoN </td>
                            <td> $assoc_giac_fase->numFogli </td>
                            <td> $assoc_giac_fase->controllo1 </td>
                            <td> $assoc_giac_fase->controllo2 </td>
                            <td> $assoc_giac_fase->note </td>
                            <td> $assoc_giac_fase->verificatore </td>
                        </tr>";
                }
            }
        }
        ?>
    </table>

    <p>Lavorazione pacco per la fase <?php echo $fase->idFase; ?> della commessa <?php echo $fase->idCommessa; ?> </p>
    <form name="form1" method="post" action="associa_giacenza_fase.php" >
        <p>Pacco da lavorare:
            <input type="hidden" name="id_fase" value="<?php echo $fase->idFase; ?>" />
            <input type="text" name="id_giacenza" id="id_giacenza" value="" readonly />
            <input class="select" type="button" value="" name="btn_scegli_pacco" onclick="javascript: scegli_pacco()" />
            <br/>
            <input class="submit" type="submit" value="" name="aggiungi" />&nbsp;Aggiungi a fase lavorazione
        </p>
    </form>
    <p><a href="termina_fase_lavorazione.php?fase=<?php echo $fase->idFase; ?>" >Termina fase di lavorazione</a></p>
</body>
</html>