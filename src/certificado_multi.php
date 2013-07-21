<?php
//Include Common Files @1-25231463
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "certificado_multi.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");

define('FPDF_FONTPATH', 'fpdf/font/');
require('rpdf.php');

$pdf=new RPDF();
$pdf->Open();

$conn = new clsDBConnection2();
$sql  = "select CONCAT(Nombre,  ' ', UPPER(Apellido)) as nombre from participantes where asistio = 1";
$conn->query($sql);
while($conn->next_record())
{
		$nombre = $conn->f('nombre');
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 26);
		$pdf->TextWithDirection(123, 190, $nombre, 'U');
/*$pdf->TextWithDirection(110, 50, 'world!', 'U');
$pdf->TextWithDirection(110, 50, 'world!', 'R');
$pdf->TextWithDirection(110, 50, 'world!', 'D');*/
}
$pdf->Output();
?>
