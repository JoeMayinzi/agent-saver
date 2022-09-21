<?php


require_once "./dompdf/autoload.inc.php";

use Dompdf\Dompdf;


ob_start();

require_once "pdfliste_agents.php";

$html_list = ob_get_contents();
ob_end_clean();


$dompdf = new Dompdf();

$dompdf->loadHtml($html_list);

$dompdf->setPaper("A4", "portrait");

$dompdf->render();

$file = "liste_agents.pdf";
$dompdf->stream($file);
