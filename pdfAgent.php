<?php
session_start();
require_once "./dompdf/autoload.inc.php";

use Dompdf\Dompdf;


ob_start();

require_once "current_agent.php";

$html = ob_get_contents();
ob_end_clean();

$nomAgent = $_SESSION['agent']['nom'];
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper("A4", "portrait");

$dompdf->render();

$file = "agent_$nomAgent.pdf";
$dompdf->stream($file);
