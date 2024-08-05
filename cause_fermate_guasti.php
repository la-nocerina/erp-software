<?php

$nomi_cause_fermate = array();
$nomi_gruppi= array();
$gruppi_inizio=array(1,5,8,19,24,28,31,36,55);
$gruppi_fine=array(4,7,18,23,27,30,35,54,73);

$nomi_gruppi[]= 'Mettifoglio';
$nomi_cause_fermate[1]='Cinghia trasmissione';
$nomi_cause_fermate[2]='Cinghia trasporto';
$nomi_cause_fermate[3]='Elettrico';
$nomi_cause_fermate[4]='Catasto';

$nomi_gruppi[]= 'Compressore';
$nomi_cause_fermate[5]='Blocco';
$nomi_cause_fermate[6]='Cambio olio';
$nomi_cause_fermate[7]='Filtro olio';

$nomi_gruppi[]= 'Verniciatrice';
$nomi_cause_fermate[8]='Pulizia macchine';
$nomi_cause_fermate[9]='Catasto';
$nomi_cause_fermate[10]='Cambio lama colt.';
$nomi_cause_fermate[11]='Attesa materiale';
$nomi_cause_fermate[12]='Cambio rullo';
$nomi_cause_fermate[13]='Registrazione';
$nomi_cause_fermate[14]='Elettrico';
$nomi_cause_fermate[15]='Attesa rullo';
$nomi_cause_fermate[16]='Cambio vernice';
$nomi_cause_fermate[17]='Materiale ondulato';
$nomi_cause_fermate[18]='Mat. formato vari';

$nomi_gruppi[]= 'Forno';
$nomi_cause_fermate[19]='Turbo';
$nomi_cause_fermate[20]='Catasto';
$nomi_cause_fermate[21]='Cinghie';
$nomi_cause_fermate[22]='Blocco bruciatore';
$nomi_cause_fermate[23]='Blocco raffr.';

$nomi_gruppi[]= 'Scaricatore';
$nomi_cause_fermate[24]='Catene ed ingr. Trasp.';
$nomi_cause_fermate[25]='cinghia di trasporto';
$nomi_cause_fermate[26]='Catasto';
$nomi_cause_fermate[27]='Elettrico';

$nomi_gruppi[]= 'Depuratore';
$nomi_cause_fermate[28]='Blocco valvole';
$nomi_cause_fermate[29]='Blocco pistone';
$nomi_cause_fermate[30]='Guarnizioni';

$nomi_gruppi[]= 'Varie';
$nomi_cause_fermate[31]='Mancanza carrello';
$nomi_cause_fermate[32]='Mancanza personale';
$nomi_cause_fermate[33]='Fermi per pranzo';
$nomi_cause_fermate[34]='Attesa istruzioni';
$nomi_cause_fermate[35]='Problemi tecnici';

$nomi_gruppi[]= 'Stampa 1° elemento';
$nomi_cause_fermate[36]='Preparazione';
$nomi_cause_fermate[37]='Avviamento';
$nomi_cause_fermate[38]='Registrazione';
$nomi_cause_fermate[39]='Bagnatura';
$nomi_cause_fermate[40]='Preparazione Generale';
$nomi_cause_fermate[41]='Macinazione';
$nomi_cause_fermate[42]='Composizione colore';
$nomi_cause_fermate[43]='Pulizia lastra/caucciù';
$nomi_cause_fermate[44]='Catasto';
$nomi_cause_fermate[45]='Elettrico';
$nomi_cause_fermate[46]='Pulizia macchina';
$nomi_cause_fermate[47]='Sostituzione caucciù';
$nomi_cause_fermate[48]='Cambio lastra';
$nomi_cause_fermate[49]='Attesa lastra';
$nomi_cause_fermate[50]='Prove colore forno';
$nomi_cause_fermate[51]='Materiale ondulato';
$nomi_cause_fermate[52]='Mat. formati vari';
$nomi_cause_fermate[53]='Attesa materiale';
$nomi_cause_fermate[54]='Problemi tecnici';

$nomi_gruppi[]= 'Stampa 2° elemento';
$nomi_cause_fermate[55]='Preparazione';
$nomi_cause_fermate[56]='Avviamento';
$nomi_cause_fermate[57]='Registrazione';
$nomi_cause_fermate[58]='Bagnatura';
$nomi_cause_fermate[59]='Preparazione Generale';
$nomi_cause_fermate[60]='Macinazione';
$nomi_cause_fermate[61]='Composizione colore';
$nomi_cause_fermate[62]='Pulizia lastra/caucciù';
$nomi_cause_fermate[63]='Catasto';
$nomi_cause_fermate[64]='Elettrico';
$nomi_cause_fermate[65]='Pulizia macchina';
$nomi_cause_fermate[66]='Sostituzione caucciù';
$nomi_cause_fermate[67]='Cambio lastra';
$nomi_cause_fermate[68]='Attesa lastra';
$nomi_cause_fermate[69]='Prove colore forno';
$nomi_cause_fermate[70]='Materiale ondulato';
$nomi_cause_fermate[71]='Mat. formati vari';
$nomi_cause_fermate[72]='Attesa materiale';
$nomi_cause_fermate[73]='Problemi tecnici';



function javascritArray($arrayName){
    global $nomi_cause_fermate;
    for($i=1; $i<=73; $i++){
        echo "$arrayName [$i] = '$nomi_cause_fermate[$i]'; \n";
    }
}

?>
