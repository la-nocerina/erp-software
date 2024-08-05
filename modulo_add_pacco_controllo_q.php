<?php
if(empty($_GET['id'])){
    exit('accesso ad are in modo non consentito');
}

include 'common/generated/include_dao.php';
$scheda=DAOFactory::getControlliQualitaDAO()->load($_GET['id']);
if(!$scheda){
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
    id_scheda = <?php echo $_GET['id']; ?> ;
    lavorazione_pacco=false;
    function scegli_pacco( ){
        if(!lavorazione_pacco){
            open('scegli_pacco_by_codice_popup.php', 'Lista pacchi in magazzino', 'width=500,height=500,toolbar=0,resizable=0');
        }
    }
    function scrivi_pacco( id, num_pacco, formato ){
        lavorazione_pacco = true;
        riga = "<tr>";
        riga+= "<td><input name=\"id_giacenza\" type=\"hidden\" value=\""+id+"\" />"
        riga+= "<input name=\"id_scheda\" type=\"hidden\" value=\""+id_scheda+"\" /> "+num_pacco+"</td>";
        l_l = formato.split(' X ');
        riga+= "<td><input name=\"larghezza\" type=\"text\" id=\"larghezza\" size=\"5\" maxlength=\"5\" value=\""+l_l[0]+"\" /></td>";
        riga+= "<td><input name=\"lunghezza\" type=\"text\" id=\"lunghezza\" size=\"5\" maxlength=\"5\" value=\""+l_l[1]+"\" /></td>";
        riga+= "<td>0,<input name=\"spessore\" type=\"text\" id=\"spessore\" size=\"10\" maxlength=\"10\" /></td>";
        riga+= "<td>T.<input name=\"durezza\" type=\"text\" id=\"durezza\" size=\"10\" maxlength=\"10\" /></td>";
        riga+= "<td><input name=\"copertura\" type=\"text\" id=\"copertura\" size=\"10\" maxlength=\"10\" /></td>";
        riga+= "<td><input name=\"peso\" type=\"text\" id=\"peso\" size=\"10\" maxlength=\"10\" /></td>";
        riga+= "<td><input name=\"pacco\" type=\"text\" id=\"pacco\" size=\"10\" maxlength=\"10\" /></td>";
        riga+= "<td ><input name=\"controllo_visivo\" type=\"text\" id=\"controllo_visivo\" size=\"5\" maxlength=\"5\" /></td>";
        riga+= "<td><input name=\"txt_controllo_visivo\" type=\"text\" id=\"txt_controllo_visivo\" size=\"20\" maxlength=\"20\" /></td>";
        riga+= "<td><input name=\"commessa\" type=\"text\" id=\"commessa\" size=\"15\" maxlength=\"15\" /></td>";
        riga+= "<td><input name=\"note\" type=\"text\" id=\"note\" size=\"30\" maxlength=\"100\" /></td>";
        riga+= "<td><input type=\"submit\" name=\"salva\" value=\"Salva\" /><br/><input type=\"button\" name=\"annulla\" value=\"Annulla\" onclick=\"javascript:window.location.reload();\" /></td>";
        riga+= "</tr>";
        $('#tabella_pacchi').append(riga);
    }
</script>
</head>
<body>
    <p>MOD.32 - CONTROLLO QUALITA' BANDA STAGNATA / CROMATA ED ALLUMINIO - REV.1</p>
<?php
$associazioni = DAOFactory::getAssociaGiacenzaControlloDAO()->queryByIdControlliQualita($_GET['id']);
$ass_giac_contr = new AssociaGiacenzaControllo();
$materiali[1] = $materiali[2] = $materiali[3] = $materiali[4] = 0;
for($i=0; $i<count($associazioni); $i++){
    $ass_giac_contr = $associazioni[$i];
    $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_contr->idProdottoInGiacenza);
    switch ($certificato->materiale){
        case '1': $materiali[1]=1; break;
        case '2': $materiali[2]=1; break;
        case '3': $materiali[3]=1; break;
        case '4': $materiali[4]=1; break;
    }
}
echo "<p>
        Committente: $scheda->idPartner<br/>
        DDT: $scheda->ddtN<br/>
        del: $scheda->dataDdt<br/>
        colli: $scheda->numColli<br/>
        kg: $scheda->kg<br/>
        n°Collaudo: $scheda->idControlliQualita<br/>
        tipo: $scheda->tipo - $scheda->txtCorpi<br/>
        num ferriera: $scheda->numFerriera<br/>
        materiale: ";
if( $materiali[1] ){ echo "- BANDA STAGN. -"; }
if( $materiali[2] ){ echo "- BANDA CROM. -"; }
if( $materiali[3] ){ echo "- ALLUMINIO -"; }
if( $materiali[4] ){ echo "- ALTRO -"; }
echo "</p>";
?>
<form name="form_add_pacco" method="post" action="add_pacco_controllo_q.php" >
    <table id="tabella_pacchi">
        <tr>
            <th>BALLA N°</th>
            <th>LARGH. mm</th>
            <th>LUNG. mm</th>
            <th>SPESS. mm</th>
            <th>DUREZZA HR30TM</th>
            <th>COPERT G/m2</th>
            <th>PESO</th>
            <th>PACCO</th>
            <th colspan="2">CONTR.VISIVO</th>
            <th>COMM.</th>
            <th>NOTE</th>
        </tr>
        <?php
        
        for($i=0; $i<count($associazioni); $i++){
            $ass_giac_contr = $associazioni[$i];
            $certificato = DAOFactory::getCertificatiCollaudoDAO()->loadByIdGiacenza($ass_giac_contr->idProdottoInGiacenza);
            $dimensioni = explode(' X ', $certificato->formato);
            echo "<tr>
                    <td>$certificato->paccoN</td>
                    <td>{$dimensioni[0]}</td>
                    <td>{$dimensioni[1]}</td>
                    <td>0,$certificato->spessore</td>
                    <td>T. $certificato->tempra</td>
                    <td>$ass_giac_contr->copertura</td>
                    <td>$ass_giac_contr->peso</td>
                    <td>$ass_giac_contr->pacco</td>
                    <td>$ass_giac_contr->controlloVisivo</td>
                    <td>$ass_giac_contr->controlloVisivoTxt</td>
                    <td>$certificato->commN</td>
                    <td>$ass_giac_contr->note</td>
                </tr>";
        }
        ?>
    </table>
    </form>
    <input class="submit" type="button" name="aggiungi" value="" onclick="javascript: scegli_pacco();" />&nbsp;Aggiungi pacco
</body>
</html>