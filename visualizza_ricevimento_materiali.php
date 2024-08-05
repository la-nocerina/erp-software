<?php
include 'common/generated/include_dao.php';

if(empty($_GET['id'])){
    exit('accesso ad area in modo non consentito');
}

$scheda = DAOFactory::getRicezioneMaterialiDAO()->load($_GET['id']);

if(!$scheda){
    exit('accesso ad area assente');
}


require_once 'common/tcpdf/config/lang/ita.php';
require_once 'common/tcpdf/tcpdf.php';
$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(5, 10, 5);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setLanguageArray($l);
$pdf->setFontSubsetting(false);
$pdf->SetFont('helvetica', '', 7, '', false);
$pdf->AddPage();


$html='';

$html.="<p>LN LA NOCERINA S.R.L.</p>
<p>MOD.18 - MODULO DI RICEVIMENTO MATERIALI - REV.0</p>
  <table width=\"100%\">
    <tr>
      <td>DOCUMENTO N° <br/> $scheda->numDocumento </td>
      <td colspan=\"6\">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan=\"5\"><p>Fornitore/Cliente:</p>
      <p>$scheda->idPartner</p></td>
      <td>D.d.t. n°  $scheda->ddtN </td>
      <td>Colli n°  $scheda->numColli </td>
      <td>Ordine n°  $scheda->ordineN </td>
      <td>&nbsp;</td>
      <td colspan=\"2\">KG.  $scheda->kg </td>
    </tr>
    ";

$destinazione = explode('|', $scheda->destinazione);
$P = $M = $L = $F = $A = ' ';
if( in_array('P', $destinazione) ){ $P = ' X '; }
if( in_array('M', $destinazione) ){ $M = ' X '; }
if( in_array('L', $destinazione) ){ $L = ' X '; }
if( in_array('F', $destinazione) ){ $F = ' X '; }
if( in_array('A', $destinazione) ){ $A = ' X '; }

$html.="<tr><td>Destinazione:</td>
          <td>[ $P ] Produz.</td>
          <td>[ $M ] Magazz.</td>
          <td>[ $L ] Laborat.</td>
          <td>[ $F ] Fotoinc.</td>
          <td>[ $A ] Altro</td>
       </tr>
    <tr>
      <td colspan=\"6\">Materiale destinato alla lavorazione di: </td>
    </tr>
    ";
        
$cap = $fond = $cor = $tap = $altro = '';
$txt_cap = $txt_fond = $txt_cor = $txt_tap = $txt_altro = '';
switch($scheda->tipo){
    case '1': $cap=' X '; $txt_cap=$scheda->tipoNote; break;
    case '2': $fond=' X '; $txt_fond=$scheda->tipoNote; break;
    case '3': $cor=' X '; $txt_cor=$scheda->tipoNote; break;
    case '4': $tap=' X '; $txt_tap=$scheda->tipoNote; break;
    case '5': $altro=' X '; $txt_altro=$scheda->tipoNote; break;
}

$html.="<tr>
       <td>[ $cap ] Capsule<br /> $txt_cap </td>
       <td>[ $fond ] Fondi<br /> $txt_fond </td>
       <td>[ $cor ] Corpi<br />Gr. $txt_cor </td>
       <td>[ $tap ] Tappi<br /> $txt_tap </td>
       <td>[ $altro ] Altro<br /> $txt_altro </td>
       <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan=\"6\">Provenienza: $scheda->idPartnerProvenienza </td>
    </tr>";
 $html.="</table>";

$controlli = explode('|', $scheda->controlli);
$c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = $c10 = $c11 = $c12 = '';
if( in_array('1', $controlli) ){ $c1=' X '; }
if( in_array('2', $controlli) ){ $c2=' X '; }
if( in_array('3', $controlli) ){ $c3=' X '; }
if( in_array('4', $controlli) ){ $c4=' X '; }
if( in_array('5', $controlli) ){ $c5=' X '; }
if( in_array('6', $controlli) ){ $c6=' X '; }
if( in_array('7', $controlli) ){ $c7=' X '; }
if( in_array('8', $controlli) ){ $c8=' X '; }
if( in_array('9', $controlli) ){ $c9=' X '; }
if( in_array('10', $controlli) ){ $c10=' X '; }
if( in_array('11', $controlli) ){ $c11=' X '; }
if( in_array('12', $controlli) ){ $c12=' X '; }

$html.="<p align=\"center\">CONTROLLO</p>

<table width=\"100%\" border=\"1\">
  <tr>
    <td width=\"19%\">Tipo controllo</td>
    <td width=\"9%\"><div align=\"center\">SI</div></td>
    <td width=\"72%\"><p align=\"center\">Non conformità rilevate</p></td>
  </tr>
  <tr>
    <td>Imballo chiuso</td>
    <td><div align=\"center\">[ $c1 ]</div></td>
    <td> $scheda->n1 </td>
  </tr>
  <tr>
    <td>Imballo a vista</td>
    <td><div align=\"center\">[ $c2 ]</div></td>
    <td> $scheda->n2 </td>
  </tr>
  <tr>
    <td>Ruggine</td>
    <td><div align=\"center\">[ $c3 ]</div></td>
    <td> $scheda->n3 </td>
  </tr>
  <tr>
    <td>Ammaccature</td>
    <td><div align=\"center\">[ $c4 ]</div></td>
    <td> $scheda->n4 </td>
  </tr>
  <tr>
    <td>Piegature</td>
    <td><div align=\"center\">[ $c5 ]</div></td>
    <td> $scheda->n5 </td>
  </tr>
  <tr>
    <td>Bordi<br />tagliati/danneggiati</td>
    <td><div align=\"center\">[ $c6 ]</div></td>
    <td> $scheda->n6 </td>
  </tr>
  <tr>
    <td>Condensa</td>
    <td><div align=\"center\">[ $c7 ]</div></td>
    <td> $scheda->n7 </td>
  </tr>
  <tr>
    <td>Ondulazione</td>
    <td><div align=\"center\">[ $c8 ]</div></td>
    <td> $scheda->n8 </td>
  </tr>
  <tr>
    <td>Impilaggio imperfetto</td>
    <td><div align=\"center\">[ $c9 ]</div></td>
    <td> $scheda->n9 </td>
  </tr>
  <tr>
    <td>Peso</td>
    <td><div align=\"center\">[ $c10 ]</div></td>
    <td> $scheda->n10 </td>
  </tr>
  <tr>
    <td>Colli</td>
    <td><div align=\"center\">[ $c11 ]</div></td>
    <td> $scheda->n11 </td>
  </tr>
  <tr>
    <td>Altro</td>
    <td><div align=\"center\">[ $c12 ]</div></td>
    <td> $scheda->n12 </td>
  </tr>
</table>
<table width=\"100%\" border=\"1\">
  <tr>
    <td width=\"40%\">Firma del Compilatore<br /> $scheda->compilatore </td>
    <td width=\"50%\" >Data<br /> $scheda->dataDdt  /  $scheda->dataScarico </td>
  </tr>
</table>";

$pdf->writeHTML($html);

$pdf->Output("ricevimento_materiali.pdf",'I');