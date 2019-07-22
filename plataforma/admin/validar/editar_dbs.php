<?php 
include '../../conexion.php';
$id = $_REQUEST['id'];
$operacion = $_REQUEST['operacion'];
$radio = $_REQUEST['radio'];

if ($operacion == 1) {
	switch ($radio) {
		case 1:
			$nombre = $_POST['nombre'];
			$materia = $_POST['materia'];
			$salon = $_POST['salon'];
			$query = "UPDATE cursos SET nombre = '$nombre', materia = '$materia', salon = '$salon' WHERE id='$id'";
		break;
		case 2:
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];
			$cargarEscudo = ($_FILES['foto']['tmp_name']);
			$escudo = addslashes(file_get_contents($cargarEscudo));
			$query = "UPDATE datos_institucion SET nombre='$nombre', descripcion = '$descripcion', email = '$email', telefono='$telefono', escudo = '$escudo' WHERE id='$id'";
		break;
		case 3:
			$nombre = $_POST['nombre'];
			$query="UPDATE materias SET nombre='$nombre' WHERE id='$id'";
		break;
		case 4:
			$estudiante = $_POST['estudiante'];
			$padre = $_POST['padre'];
			$madre = $_POST['madre'];
			$query = "UPDATE relestudiantepadre SET estudiante = '$estudiante', padre = '$padre', madre = '$madre' WHERE id='$id'";
		break;
		case 5:
			$estudiante = $_POST['estudiante'];
			$salon = $_POST['salon'];
			$query = "UPDATE relestudiantesalon SET estudiante = '$estudiante', salon = '$salon' WHERE id = '$id'";
		break;
		case 6:
			$profesor = $_POST['profesor'];
			$cursos = $_POST['cursos'];
			$query = "UPDATE relprofesorcursos SET profesor = '$profesor', cursos = '$cursos' WHERE id ='$id'";
		break;
		case 7:
			$nombre = $_POST['nombre'];
			$grado = $_POST['grado'];
			$query = "UPDATE salon SET nombre = '$nombre', grado='$grado' WHERE id = '$id'";
		break;
		case 8:
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$email = $_POST['email'];			
			$tipo_usuario = $_POST['tipo_usuario'];			
			$lugar_nacimiento = $_POST['lugar_nacimiento'];
			$fecha_nacimiento = $_POST['fecha_nacimiento'];
			$telefono = $_POST['telefono'];
			$query = "UPDATE usuario SET nombres = '$nombres', apellidos = '$apellidos', email = '$email', tipo_usuario = '$tipo_usuario', lugar_nacimiento = '$lugar_nacimiento', fecha_nacimiento = '$fecha_nacimiento', telefono = '$telefono' WHERE id = '$id'";
		break;
	}
	$sq = $conexion -> prepare($query);
	$sq -> execute();
}else if ($operacion == 2) {
	$submit = $_POST['submit'];
	if ($submit == "Si") {
		switch ($radio) {
			case 1:
				$query = "DELETE FROM cursos WHERE id='$id'";
			break;
			case 2:
				$query = "DELETE FROM datos_institucion WHERE id='$id'";
			break;
			case 3:
				$sq2 = $conexion -> prepare("SELECT * FROM cursos");
				$sq2 -> execute();
				$contador = 0;
				echo $id."<br>";
				while ($respuesta = $sq2 -> fetch()) {
					echo $respuesta['materia'] . "<br>";	
					if ($respuesta['materia'] == $id) {
						$contador = 1;
						$respuestaid = $respuesta['id'];
					}
				}
				if ($contador == 1) {
					$query3 = "UPDATE cursos SET materia=NULL WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}
				$query = "DELETE FROM materias WHERE id='$id'";
			break;
			case 4:
				$query = "DELETE FROM relestudiantepadre WHERE id='$id'";
			break;
			case 5:
				$query = "DELETE FROM relestudiantesalon WHERE id='$id'";
			break;
			case 6:
				$query = "DELETE FROM relprofesorcursos WHERE id='$id'";
			break;
			case 7:
				$sq2 = $conexion -> prepare("SELECT * FROM relestudiantesalon");
				$sq2 -> execute();
				$contador = 0;
				while ($respuesta = $sq2 -> fetch()) {
					if ($respuesta['salon'] == $id) {
						$contador = 1;
						$respuestaid = $respuesta['id'];
					}
				}
				if ($contador == 1) {
					$query3 = "UPDATE relestudiantesalon SET salon=NULL WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}
				$sq2 = $conexion -> prepare("SELECT * FROM cursos");
				$sq2 -> execute();
				$contador = 0;
				while ($respuesta = $sq2 -> fetch()) {
					if ($respuesta['salon'] == $id) {
						$contador = 1;
						$respuestaid = $respuesta['id'];
					}
				}
				if ($contador == 1) {
					$query3 = "UPDATE cursos SET salon=NULL WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}
				$query = "DELETE FROM salon WHERE id='$id'";
			case 8:
				$sq2 = $conexion -> prepare("SELECT * FROM relestudiantepadre");
				$sq2 -> execute();
				$contador = 0;
				while ($respuesta = $sq2 -> fetch()) {
					if ($respuesta['estudiante'] == $id) {
						$contador = 1;
						$respuestaid = $respuesta['id'];
					}
					if ($respuesta['padre'] == $id) {
						$contador = 2;
						$respuestaid = $respuesta['id'];	
					}
					if ($respuesta['madre'] == $id) {
						$contador = 2;
						$respuestaid = $respuesta['id'];	
					}
				}
				if ($contador == 1) {
					$query3 = "DELETE FROM relestudiantepadre WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}else if($contador == 2){
					$query3 = "UPDATE relestudiantepadre SET padre=NULL WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}else if($contador == 3){
					$query3 = "UPDATE relestudiantepadre SET madre=NULL WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}
				$sq4 = $conexion -> prepare("DELETE FROM relprofesorcursos WHERE profesor='$id'");
				$sq4 -> execute();
				$sq2 = $conexion -> prepare("SELECT * FROM relestudiantesalon");
				$sq2 -> execute();
				$contador = 0;
				while ($respuesta = $sq2 -> fetch()) {
					if ($respuesta['estudiante'] == $id) {
						$contador = 1;
						$respuestaid = $respuesta['id'];
					}
				}
				if ($contador == 1) {
					$query3 = "DELETE FROM relestudiantesalon WHERE id='$respuestaid'";
					$sq3 = $conexion -> prepare($query3);
					$sq3 -> execute();
				}
				$query = "DELETE FROM usuario WHERE id='$id'";
			break;
		}
	echo $query3;
	echo "<br>";
	echo $query;
	$sq = $conexion -> prepare($query);
	$sq -> execute();
	}else{
		echo "No eliminar";
	}
}
header('Location: ../ver_bases_datos.php');
 ?>