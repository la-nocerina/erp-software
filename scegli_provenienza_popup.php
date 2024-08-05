<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="Style.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript">
    function seleziona(id){
        window.opener.scrivi_provenienza(id);
        window.close();
    }
</script>
</head>
<body>
<table>
    <tr><th>id</th><th>Ragione Sociale</th><th>Attivo</th></tr>
<?php
include 'common/generated/include_dao.php';
$partners = DAOFactory::getPartnerDAO()->queryAll();
$num_partners = count($partners);
$partner = new Partner();
for($i=0;$i<$num_partners;$i++){
    $partner = $partners[$i];
    echo "<tr onclick=\"javascript: seleziona($partner->idPartner)\" >
    <td>{$partner->idPartner}</td>
    <td>{$partner->ragioneSociale}</td>
    <td>{$partner->isAttivo}</td>
    </tr>";
}
?>
</table>
</body>
</html>