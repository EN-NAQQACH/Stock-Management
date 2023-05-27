
<?php

require_once(__DIR__ . '/../dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;
$_HTML = ' <img src="../php/fotor_2023-4-23_14_43_30.png">';
$pdf = new Dompdf();
$pdf -> loadHtml($_HTML);
$pdf -> setPaper('A4', 'portrait');
$pdf -> render();
$pdf -> stream("", array("Attachment" => false));
?>