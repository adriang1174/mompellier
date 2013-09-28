<?php

$link =  mysqli_connect('localhost', 'uv9007', 'V*d*o*3037!','uv9007_registracionea');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$action         = $_REQUEST['a'];
$apellido       = $_REQUEST['apellido'];
$nombre 	    = $_REQUEST['nombre'];
$dni			= $_REQUEST['dni'];
$especialidad   = $_REQUEST['especialidad'];
$hospital		= $_REQUEST['institucion'];
$situacion		= $_REQUEST['condicion'];
$telefono		= $_REQUEST['telefono'];
$mail			= $_REQUEST['email'];
$matricula		= $_REQUEST['matriculaNac'];
$matricula_prov = $_REQUEST['matriculaProv'];
$idCurso        = $_REQUEST['idEvento'];

switch($action){
	case 'get_spec':
					$res = mysqli_query($link,"SELECT * FROM especialidades order by Descripcion");
					while ($row = mysqli_fetch_array($res)) {
					  $result[] = array(
						'id' => utf8_encode($row['Descripcion']),
						'desc' => utf8_encode($row['Descripcion']),
					  );
					}
					break;
	case 'get_sit':
					$res = mysqli_query($link,"SELECT * FROM situaciones order by descripcion");
					while ($row = mysqli_fetch_array($res)) {
					  $result[] = array(
						'id' => utf8_encode($row['descripcion']),
						'desc' => utf8_encode($row['descripcion']),
					  );
					}
					break;
	case 'get_inst':
					$res = mysqli_query($link,"SELECT * FROM hospitales  order by descripcion");
					while ($row = mysqli_fetch_array($res)) {
					  $result[] = array(
						'id' => utf8_encode($row['descripcion']),
						'desc' => utf8_encode($row['descripcion']),
					  );
					}
					break;					
	case 'add_res':
					$sql = "insert into partcipantes (Apellido,Nombre,Dni,especialidad,Hospital,Situacion,Telefono,Mail,Matricula,MatriculaProv) 
							values('{$apellido}','{$nombre}','{$dni}','{$especialidad}','{$hospital}','{$situacion}','{$telefono}','{$mail}','{$matricula}','{$matricula_prov}')";
					$res = mysqli_query($link,$sql);
					$idParticipante = mysqli_insert_id($link);
					
					$sql = "insert into participantescursos (idParticpiante,idCurso,asistio) 
							values({$idParticipante},{$idCurso}','0')";
					$res = mysqli_query($sql);					
					$result = "OK";
					break;
				
}
//var_dump($result);
//$result = utf8_encode($result);
echo json_encode($result);
?>