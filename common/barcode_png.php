<?php

include 'Image_Barcode-1.1.1/Image/Barcode/ean13.php';
$bc_gen = new Image_Barcode_ean13();
$code = str_pad($_GET['code'], 12, "0", STR_PAD_LEFT);
$img = $bc_gen->draw($code);

header('Content-type: image/png');
imagepng($img);


?>
