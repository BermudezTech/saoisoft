<?php 
include '../../conexion.php';
$name = $_POST['name'];
$curso = $_POST['curso'];
$descripcion = $_POST['descripcion'];
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
echo $carpeta_destino."/".$contador.".".$extension;

$st = $conexion -> prepare("INSERT INTO actividades(nombre, descripcion, tipo, adjunto, cursos) VALUES ('$name','$descripcion',$tipo,'$archivo', '$curso')");
$st -> execute();
 ?>