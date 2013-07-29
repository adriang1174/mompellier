<?php
//Include Common Files @1-25231463
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "certificado_multi.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");

define('FPDF_FONTPATH', 'fpdf/font/');
require('rpdf.php');


$conn = new clsDBConnection2();
$sql  = "select CONCAT(Nombre,  ' ', UPPER(Apellido)) as nombre, id from participantes where asistio = 1";
$conn->query($sql);
while($conn->next_record())
{
	$pdf=new RPDF();
	$pdf->Open();

		$nombre = $conn->f('nombre');
		$id 	= $conn->f('id');
		//$nombre = 'Adrian Garcia';
		$pdf->AddPage('A4');
		$pdf->Image('diploma.jpg',0,0,280);
		$pdf->SetFont('Arial', '', 18);
		$pdf->TextWithDirection(113, 128, $nombre, 'R');
/*$pdf->TextWithDirection(110, 50, 'world!', 'U');
$pdf->TextWithDirection(110, 50, 'world!', 'R');
$pdf->TextWithDirection(110, 50, 'world!', 'D');*/
		$pdf->Output($id.'.pdf','F');
}
header("Location: participantes_list.php");
?>
