<?php

include 'common/generated/include_dao.php';

if( array_key_exists('salva', $_POST) ){

    
    $controllo = DAOFactory::getControlliAggiuntiviDAO()->load($_POST['controllo_aggiuntivo']);
    $controllo->valore = $_POST['valore'];

    try {
        DAOFactory::getControlliAggiuntiviDAO()->update($controllo);
        echo 'il controllo è stato aggiornato';
    }
    catch (Exception $exc) {
        echo 'non è stato possibile aggiornare il controllo';
    }
    
}else{


    if( empty($_GET['scheda']) || empty($_GET['linea']) ){
        exit('accesso in modo non consentito');
    }

    $scheda = DAOFactory::getSchedeProveDAO()->load($_GET['scheda']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<title>Documento senza titolo</title>
</head>
<body>

<p>Controlli per la linea: <?php echo $_GET['linea']; ?> <br/>
    Scheda del giorno: <?php echo $scheda->data; ?> </p>

<p>----------------Controlli Livello vaschetta----------------------</p>
<?php
$controllo = new ControlliAggiuntivi();
$controlli_liv_vasc = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $_GET['linea'], 1 );
for($i=0;$i<count($controlli_liv_vasc); $i++){
    $controllo = $controlli_liv_vasc[$i];
    echo "<form name=\"form_liv_vasc$i\" method=\"post\" action=\"modifica_controlli_aggiuntivi.php\" >
                <input type=\"hidden\" name=\"controllo_aggiuntivo\" value=\"$controllo->idControlloAggiuntivo\" />
                <p>Controllo ". ($i+1) .": <input type=\"text\" name=\"valore\" value=\"$controllo->valore\" />
                            <input type=\"submit\" name=\"salva\" value=\"Salva\" /></p>
            </form>";
}
?>
<form name="form_add_liv_vasc" method="post" action="add_controllo_aggiuntivo.php">
    <input type="hidden" name="scheda" value="<?php echo $scheda->idSchedaProve; ?>" />
    <input type="hidden" name="linea" value="<?php echo $_GET['linea']; ?>" />
    <input type="hidden" name="controllo" value="1" />
    <p>Aggiungi: <input type="text" name="valore" value="" />
                 <input name="aggiungi" type="submit" class="add" value=""/> 
                 aggiungi
</p>
</form>

<p>-------------------Controlli Grammatura umida>-------------------</p>
<?php
$controlli_gramm = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $_GET['linea'], 2 );
for($i=0;$i<count($controlli_gramm); $i++){
    $controllo = $controlli_gramm[$i];
    echo "<form name=\"form_gram$i\" method=\"post\" action=\"modifica_controlli_aggiuntivi.php\" >
                <input type=\"hidden\" name=\"controllo_aggiuntivo\" value=\"$controllo->idControlloAggiuntivo\" />
                <p>Controllo ". ($i+1) .": <input type=\"text\" name=\"valore\" value=\"$controllo->valore\" />
                            <input type=\"submit\" name=\"salva\" value=\"Salva\" /></p>
            </form>";
}
?>
<form name="form_add_gram" method="post" action="add_controllo_aggiuntivo.php">
    <input type="hidden" name="scheda" value="<?php echo $scheda->idSchedaProve; ?>" />
    <input type="hidden" name="linea" value="<?php echo $_GET['linea']; ?>" />
    <input type="hidden" name="controllo" value="2" />
    <p>Aggiungi: <input type="text" name="valore" value="" />
                 <input name="aggiungi" type="submit" class="add" value="" />&nbsp;Aggiungi
</p>
</form>

<p>---------------------------Viscosità>---------------------------</p>
<?php
$controlli_visc = DAOFactory::getControlliAggiuntiviDAO()->queryByIdSchedaProveAndLineaAndControllo($scheda->idSchedaProve, $_GET['linea'], 3 );
for($i=0;$i<count($controlli_visc); $i++){
    $controllo = $controlli_visc[$i];
    echo "<form name=\"form_visc$i\" method=\"post\" action=\"modifica_controlli_aggiuntivi.php\" >
                <input type=\"hidden\" name=\"controllo_aggiuntivo\" value=\"$controllo->idControlloAggiuntivo\" />
                <p>Controllo ". ($i+1) .": <input type=\"text\" name=\"valore\" value=\"$controllo->valore\" />
                            <input type=\"submit\" name=\"salva\" value=\"Salva\" /></p>
            </form>";
}
?>
<form name="form_add_visc" method="post" action="add_controllo_aggiuntivo.php">
    <input type="hidden" name="scheda" value="<?php echo $scheda->idSchedaProve; ?>" />
    <input type="hidden" name="linea" value="<?php echo $_GET['linea']; ?>" />
    <input type="hidden" name="controllo" value="3" />
    <p>Aggiungi: <input type="text" name="valore" value="" />
                 <input name="aggiungi" type="submit" class="add" value="" />&nbsp;Aggiungi
</p>
</form>

</body>
</html>

<?php
}
?>