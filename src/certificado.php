<?php
//Include Common Files @1-25231463
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "certificado.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");

$conn = new clsDBConnection2();
$sql  = "select CONCAT(Nombre,  ' ', UPPER(Apellido)) as nombre from participantes where id = ". $_REQUEST['id'];
$conn->query($sql);
$conn->next_record();
$nombre = $conn->f('nombre');
?>
<html>
<head>
<style>

.verticaltext {
  -webkit-transform: rotate(-90deg);
  -moz-transform: rotate(-90deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}
</style> 

<script type="text/javascript">
function printpage()
  {
  window.print()
  }
</script>
</head>
<body onload="printpage()"> 

	
<div id="separa" style="border: 0;font-family: Arial; height: 125px; width: 21cm">
</div>

<div id="verticaltext" class="verticaltext" style="border: 0;font-family: Arial; font-size:26px;margin-right: 7cm;height: 125px;width: 20cm">
<?php echo $nombre; ?>
</div>
<!--
<input type="button" value="Print this page" onclick="printpage()" />

  display:block;
  position:absolute;
  right:-5px;
  top:15px;

-->
</body>
</html>