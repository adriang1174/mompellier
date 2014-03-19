<?php
$link = mysqli_connect('localhost', 'root', '','registracionea');
$sql = "INSERT IGNORE INTO cursos
SET id = '2013/CongresoNacionaldeMedicina',
descripcion = 'Encuentro Académico de Residencias Medicas',
fecha = 'Miercoles 13 de Noviembre de 2013',
lugar = 'Aula del Colegio de Médicos Distrito IX, Rawson 3750'";
$res = mysqli_query($link,$sql);
?>

