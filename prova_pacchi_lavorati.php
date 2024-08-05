<?php

$fase=31;

include 'common/generated/include_dao.php';


/*
for($i=0; $i<count($associazioni_giacenze); $i++){
    $assoc_giac_fase = $associazioni_giacenze[$i];
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
    echo "numpacco: $certificato->paccoN  - collaudo: $certificato->collN<br/>";
}

*/

echo '<table width="100%">
    <tr>
        <td style=\"text-align:center\">NUMERO COLLAUDO/PACCO LAVORATO</td>
        <td style=\"text-align:center\">NUMERO COLLAUDO/PACCO LAVORATO</td>
        <td style=\"text-align:center\">NUMERO COLLAUDO/PACCO LAVORATO</td>
    </tr>';

echo '<tr>';

//tabella turno MATTINA
echo '<td width="33%">';
$associazioni_giacenze = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase, 'M');
$assoc_giac_fase = new AssociaFasiGiacenze();
echo "<table border=\"1\" width=\"100%\">\n";
for($i=0; $i<30;$i++){
    if(($i%6)==0){
        echo '<tr>';
    }
    if( $i<count($associazioni_giacenze) ){
        $assoc_giac_fase = $associazioni_giacenze[$i];
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
        echo "<td width=\"16.66%\"> $certificato->paccoN <hr style=\"border-top:1px dashed\"> $certificato->collN </td>";
    }else{

        echo "<td width=\"16.66%\">&nbsp;<hr style=\"border-top: medium dashed; border-bottom: 0px none;\">&nbsp;</td>";
    }
    if(($i%6)==5){
        echo "</tr>\n";
    }
}
echo '</table>';
echo '</td>';

//tabella turno POMERIGGIO
echo '<td width="33%">';
$associazioni_giacenze = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase, 'P');
$assoc_giac_fase = new AssociaFasiGiacenze();
echo "<table border=\"1\" width=\"100%\">\n";
for($i=0; $i<30;$i++){
    if(($i%6)==0){
        echo '<tr>';
    }
    if( $i<count($associazioni_giacenze) ){
        $assoc_giac_fase = $associazioni_giacenze[$i];
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
        echo "<td width=\"16.66%\"> $certificato->paccoN <hr style=\"border-top:1px dashed\"> $certificato->collN </td>";
    }else{
        echo "<td width=\"16.66%\">&nbsp;<hr style=\"border-top:1px dashed\">&nbsp;</td>";
    }
    if(($i%6)==5){
        echo "</tr>\n";
    }
}
echo '</table>';
echo '</td>';

//tabella turno NOTTE ED INTERMEDIO
echo '<td width="33%">';
$associazioni_giacenze_1 = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase, 'N');
$associazioni_giacenze_2 = DAOFactory::getAssociaFasiGiacenzeDAO()->queryByIdFaseAndTurno($fase, 'I');
$associazioni_giacenze = array_merge($associazioni_giacenze_1, $associazioni_giacenze_2);
$assoc_giac_fase = new AssociaFasiGiacenze();
echo "<table border=\"1\" width=\"100%\">\n";
for($i=0; $i<30;$i++){
    if(($i%6)==0){
        echo '<tr>';
    }
    if( $i<count($associazioni_giacenze) ){
        $assoc_giac_fase = $associazioni_giacenze[$i];
        $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($assoc_giac_fase->idProdottoInGiacenza);
        echo "<td width=\"16.66%\"> $certificato->paccoN <hr style=\"border-top:1px dashed\"> $certificato->collN </td>";
    }else{
        echo "<td width=\"16.66%\">&nbsp;<hr style=\"border-top:1px dashed\">&nbsp;</td>";
    }
    if(($i%6)==5){
        echo "</tr>\n";
    }
}
echo '</table>';
echo '</td>';

echo '</tr>';
echo '</table>';
?>
