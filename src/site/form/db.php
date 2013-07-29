<?php

$link =  mysqli_connect('localhost', 'uv9007', 'V*d*o*3037!','registracionea');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$action         = $_REQUEST['a'];
$apellido       = $_REQUEST['apellido'];
$nombre 	    = $_REQUEST['nombre'];
$especialidad   = $_REQUEST['especialidad'];
$hospital		= $_REQUEST['institucion'];
$situacion		= $_REQUEST['condicion'];
$telefono		= $_REQUEST['telefono'];
$mail			= $_REQUEST['email'];
$matricula		= $_REQUEST['matriculaNac'];
$matricula_prov = $_REQUEST['matriculaProv'];


switch($action){
	case 'get_spec':
					$res = mysqli_query("SELECT * FROM especialidades");
					while ($row = mysqli_fetch_array($res)) {
					  $result[] = array(
						'id' => $row['idEspecialidad'],
						'desc' => $row['Descripcion'],
					  );
					}
					break;
	case 'get_sit':
					$res = mysqli_query("SELECT * FROM situaciones");
					while ($row = mysqli_fetch_array($res)) {
					  $result[] = array(
						'id' => $row['idEspecialidad'],
						'desc' => $row['Descripcion'],
					  );
					}
					break;
	case 'add_res':
					$sql = "insert into partcipantes (Apellido,Nombre,especialidad,Hospital,Situacion,Telefono,Mail,Matricula,MatriculaProv) 
							values('{$apellido}','{$nombre}','{$especialidad}','{$hospital}','{$situacion}','{$telefono}','{$mail}','{$matricula}','{$matricula_prov}')";
					$res = mysqli_query($link,$sql);
					$idParticipante = mysqli_insert_id($link);
					
					$sql = "insert into participantescursos (idParticpiante,idCurso,asistio) 
							values({$idParticipante},{$idCurso}','0')";
					$res = mysqli_query($sql);					
					$result = "OK";
					break;
				
}
echo json_encode($result);
?>