<?php 
include '../../conexion.php';
$name = $_POST['name'];
$curso = $_POST['curso'];
$descripcion = $_POST['descripcion'];
$actividadid = $_REQUEST['actividadid'];
$tipo = $_REQUEST['tipo'];
$date = $_POST['date'];
switch ($tipo) {
	case 2:
if (isset($_POST['chk'])) {
	$tipo = 1;
}else{
	$tipo = 2;
}
$st = $conexion -> prepare("SELECT * FROM actividades");
$st -> execute();
while ($actividades = $st -> fetch()) {
	$contador = $actividades['id'];
	$contador++;
}
echo $contador;

$extension = end(explode(".", $_FILES['archivo']['name']));
$carpeta_destino = "../../usuarios/actividades";
move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino."/".$contador.".".$extension);
$archivo = "usuarios/actividades/".$contador.".".$extension;
if ($extension == "") {
	$archivo = NULL;
}
echo $carpeta_destino."/".$contador.".".$extension;

$st = $conexion -> prepare("INSERT INTO actividades(nombre, descripcion, tipo, adjunto, cursos, fecha_fin) VALUES ('$name','$descripcion',$tipo,'$archivo', '$curso','$date')");
$st -> execute();
	break;
	case 4:
if (isset($_POST['chk'])) {
	$tipo = 1;
}else{
	$tipo = 2;
}
$query = "UPDATE actividades SET nombre='$name', descripcion='$descripcion', tipo = '$tipo', cursos = '$curso', fecha_fin='$date' WHERE id='$actividadid'";
$st = $conexion -> prepare($query);
$st -> execute();
echo $query;
	break;
	case 5:
echo $actividadid;
$st = $conexion -> prepare("SELECT * FROM actividades WHERE id='$actividadid'");
$st -> execute();
$curso = $st -> fetch();
$curso = $curso['cursos'];
echo $curso."hello";
$query = "DELETE FROM resp_actividad WHERE actividades='$actividadid'";
$st = $conexion -> prepare($query);
$st -> execute();
$query = "DELETE FROM calificaciones WHERE actividad='$actividadid'";
$st = $conexion -> prepare($query);
$st -> execute();
$query = "DELETE FROM actividades WHERE id='$actividadid'";
$st = $conexion -> prepare($query);
$st -> execute();
echo $query;
	break;
}
$Location = 'Location: ../curso.php?id='.$curso;
header($Location);
 ?>