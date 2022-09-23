<?php

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();

require_once "./liste_agents.php";
$html = ob_get_contents();

ob_end_clean();

// instantiate and use the dompdf class
$options = new Options();
$options->set("defaultFont", "Oswald");
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$file_name = "liste-agent";
$dompdf->stream($file_name);
