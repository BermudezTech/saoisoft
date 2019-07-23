<?php 
include '../../conexion.php';
$name = $_POST['name'];
$curso = $_POST['curso'];
$descripcion = $_POST['descripcion'];
$actividadid = $_REQUEST['actividadid'];
$tipo = $_REQUEST['tipo'];
switch ($tipo) {
	case 2:
if (isset($_POST['chk'])) {
	$tipo = 1;
}else{
	$tipo = 2;
}
$contador = 1;
$st = $conexion -> prepare("SELECT * FROM actividades");
$st -> execute();
while ($actividades = $st -> fetch()) {
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

$st = $conexion -> prepare("INSERT INTO actividades(nombre, descripcion, tipo, adjunto, cursos) VALUES ('$name','$descripcion',$tipo,'$archivo', '$curso')");
$st -> execute();
	break;
	case 4:
if (isset($_POST['chk'])) {
	$tipo = 1;
}else{
	$tipo = 2;
}
$query = "UPDATE actividades SET nombre='$name', descripcion='$descripcion', tipo = '$tipo', cursos = '$curso' WHERE id='$actividadid'";
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
$query = "DELETE FROM actividades WHERE id='$actividadid'";
$st = $conexion -> prepare($query);
$st -> execute();
echo $query;
	break;
}
$Location = 'Location: ../curso.php?id='.$curso;
header($Location);
 ?>