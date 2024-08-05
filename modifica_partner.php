<?php
include 'common/generated/include_dao.php';

if(array_key_exists('salva', $_POST) && !empty($_POST['id_partner']) && !empty($_POST['ragione_sociale']) ){
    
    $partner = new Partner();
    $partner = DAOFactory::getPartnerDAO()->load($_POST['id_partner']);

    $partner->ragioneSociale = $_POST['ragione_sociale'];

    if(!empty($_POST['piva']) ){
        $partner->partitaIva = $_POST['piva'];
    }
    if(!empty($_POST['codice_fiscale']) ){
        $partner->codiceFiscale = $_POST['codice_fiscale'];
    }
    if(!empty($_POST['indirizzo']) ){
        $partner->indirizzo = $_POST['indirizzo'];
    }
    if(!empty($_POST['provincia']) ){
        $partner->provincia = $_POST['provincia'];
    }
    if(!empty($_POST['comune']) ){
        $partner->comune = $_POST['comune'];
    }
    if(!empty($_POST['cap']) ){
        $partner->cap = $_POST['cap'];
    }
    if(!empty($_POST['nazione']) ){
        $partner->idNazione = $_POST['nazione'];
    }
    if(!empty($_POST['sito_web']) ){
        $partner->sitoWeb = $_POST['sito_web'];
    }
    $partner->aggiornatoIl = date("Y-m-d");
    $partner->isAttivo = $_POST['attivo'];
    try {
        DAOFactory::getPartnerDAO()->update($partner);
        echo 'partner aggiornato';
        //exit();
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare il partner';
        //exit();
    }
    
}
else{

if( empty($_GET['id'])){
    exit('accesso in modo non consentito');
}
$partner = DAOFactory::getPartnerDAO()->load($_GET['id']);
if(!$partner){
    exit('accesso ad area assente');
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
<p>Modifica partner</p>
<form id="form1" method="post" action="modifica_partner.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">id_partner</td>
      <td><input name="id_partner" type="text" id="id_partner" value="<?php echo $partner->idPartner; ?>" size="10" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="center">ragione_sociale</td>
      <td><input name="ragione_sociale" value="<?php echo $partner->ragioneSociale; ?>" size="40" id="ragione_sociale" type="text" /></td>
    </tr>
    <tr>
      <td align="center">partita_iva</td>
      <td><input name="piva" value="<?php echo $partner->partitaIva; ?>" size="33" id="piva" type="text" /></td>
    </tr>
    <tr>
      <td align="center">codice_fiscale</td>
      <td><input name="codice_fiscale" value="<?php echo $partner->codiceFiscale; ?>" size="40" id="codice_fiscale" type="text" /></td>
    </tr>
    <tr>
      <td align="center">is_attivo</td>
      <td>
         <select name="attivo" id="attivo">
              <?php
              $select_true = $select_false = "";
              if ($partner->isAttivo){
                  $select_true = 'selected="selected"';
              }else{
                  $select_false = 'selected="selected"';
              }
              ?>
              <option value="0" <?php echo $select_false; ?> >No</option>
              <option value="1" <?php echo $select_true; ?> >Si</option>
          </select>
      </td>
    </tr>
    <tr>
      <td align="center">indirizzo</td>
      <td><textarea name="indirizzo" rows="2" cols="40" dir="ltr" id="indirizzo" ><?php echo $partner->indirizzo; ?></textarea></td>
    </tr>
    <tr>
      <td align="center">provincia</td>
      <td><input name="provincia" value="<?php echo $partner->provincia; ?>" size="40" id="provincia" type="text" /></td>
    </tr>
    <tr>
      <td align="center">comune</td>
      <td><input name="comune" value="<?php echo $partner->comune; ?>" size="40" id="comune" type="text" /></td>
    </tr>
    <tr>
      <td align="center">cap</td>
      <td><input name="cap" value="<?php echo $partner->cap; ?>" size="15" id="cap" type="text" /></td>
    </tr>
    <tr>
      <td align="center">nazione</td>
      <td><select name="nazione" id="nazione">
              <?php
              $nazioni = DAOFactory::getNazioniDAO()->queryAll();
              $nazione = new Nazioni();
              for($i=0; $i<count($nazioni);$i++){
                  $nazione=$nazioni[$i];
                  $selected = '';
                  if($partner->idNazione==$nazione->idNazione){ $selected = 'selected="selected"'; }
                  echo "<option value=\"$nazione->idNazione\" $selected >$nazione->nomeNazione</option>";
              }
              ?>
          </select></td>
    </tr>
    <tr>
      <td align="center">sito_web</td>
      <td><textarea name="sito_web" rows="2" cols="40" dir="ltr" id="sito_web" ><?php echo $partner->sitoWeb; ?></textarea></td>
    </tr>
    <tr>
      <td align="center">creato_il</td>
      <td><input name="creato_il" type="text" id="creato_il" value="<?php echo $partner->creatoIl; ?>" size="10" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="center">aggiornato_il</td>
      <td><input name="aggiornato_il" type="text" id="aggiornato_il" value="<?php echo $partner->aggiornatoIl; ?>" size="10" readonly="readonly" /></td>
    </tr>
  </table>
  <p>
    <input class="submit" type="submit" name="salva" id="salva" value="" />&nbsp;Salva
  </p>
</form>

<p>Partner Reference</p>
<table>
    <tr><th>id</th><th>Nome</th><th>Cognome</th><th>Telefono</th><th>Mobile</th><th>Email</th></tr>
<?php
$references=DAOFactory::getPartnerReferenceDAO()->queryByIdPartner($partner->idPartner);
$num_ref = count($references);
$reference = new PartnerReference();
for($i=0; $i<$num_ref; $i++){
    $reference = $references[$i];
    echo "<tr>
    <td>$reference->idPartnerReference</td>
    <td>$reference->nome</td>
    <td>$reference->cognome</td>
    <td>$reference->telefono</td>
    <td>$reference->mobile</td>
    <td>$reference->email</td>
    <td>Elimina</td>
    <td>Modifica</td>
    </tr>";
}
?>
</table>
<form action="add_partner_reference.php" method="post" enctype="multipart/form-data" name="form2">
<p>Dati Reference</p>
<input type="hidden" value="<?php echo $partner->idPartner; ?>" name="id_partner"/>
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td align="center">nome</td>
      <td><input name="nome" value="" size="40" id="nome" type="text" /></td>
    </tr>
    <tr>
      <td align="center">cognome</td>
      <td><input name="cognome" value="" size="40" id="cognome" type="text" /></td>
    </tr>
    <tr>
      <td align="center">telefono</td>
      <td><input name="telefono" value="" size="40" id="telefono" type="text" /></td>
    </tr>
    <tr>
      <td align="center">mobile</td>
      <td><input name="mobile" value="" size="40" id="mobile" type="text" /></td>
    </tr>
    <tr>
      <td align="center">email</td>
      <td><input name="email" value="" size="40" id="email" type="text" /></td>
    </tr>
  </table>
  <p>
    <input class="add" type="submit" name="aggiungi_ref" id="aggiungi_ref" value="" />&nbsp;Aggiungi
  </p>
</form>

<p>Gruppi di appartenenza</p>
<table>
    <tr><th>id</th><th>gruppo</th></tr>
<?php
    $gruppi_assoc = DAOFactory::getAssociaGruppiPartnerDAO()->load_by_partner($partner->idPartner);
    $num_assoc_gruppi = count($gruppi_assoc);
    //echo $num_assoc_gruppi;
    $assoc_gruppo = new AssociaGruppiPartner();
    for($i=0;$i<$num_assoc_gruppi;$i++){
        $assoc_gruppo = $gruppi_assoc[$i];
        $gruppo = DAOFactory::getGruppiPartnerDAO()->load($assoc_gruppo->idGruppoPartner);
        echo "<tr><td>$gruppo->idGruppoPartner</td><td>$gruppo->nome</td><td><a href=\"elimina_associazione_gruppo_partner.php?id_partner=$partner->idPartner&id_gruppo=$gruppo->idGruppoPartner\">Rimuovi</a></td></tr>";
    }
?>
</table>
<form action="associa_a_gruppo.php" method="post" enctype="multipart/form-data" name="form3">
<p>
Aggiungi a gruppo:
<input type="hidden" value="<?php echo $partner->idPartner; ?>" name="id_partner"/>
  <select name="gruppo" id="gruppo">
      <?php
      $gruppi = DAOFactory::getGruppiPartnerDAO()->queryAll();
      $num_gruppi = count($gruppi);
      $gruppo = new GruppiPartner();
      for($i=0;$i<$num_gruppi;$i++){
          $gruppo = $gruppi[$i];
          echo "<option value=\"{$gruppo->idGruppoPartner}\">{$gruppo->nome}</option>";
      }
      ?>
  </select>
  <input class="add" type="submit" name="aggiungi" id="aggiungi" value="" />&nbsp;Aggiungi
</p>
</form>

</body>
</html>

<?php
}
?>