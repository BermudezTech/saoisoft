<?php 

include '../../conexion.php';
$dato = $_POST['dato'];

$sq = $conexion -> prepare("SELECT * FROM usuario WHERE nombres LIKE '%".$dato."%' || id LIKE '%".$dato."%' || apellidos LIKE '%".$dato."%'");
$sq -> execute();

while ($queryanswer = $sq -> fetch()) {
	# code...
	$tipo_usuario = $queryanswer['tipo_usuario'];
	$sq2 = $conexion -> prepare("SELECT * FROM tipo_usuario WHERE id = '$tipo_usuario'");
	$sq2 -> execute();
	$tipo_usuario = $sq2 -> fetch();
	$tipo_usuario = $tipo_usuario['nombre'];
?>
<button onclick="usuarioperfil(<?php echo $queryanswer['id']; ?>)"><p class="consultan"><?php echo $queryanswer['nombres']." ".$queryanswer['apellidos']; ?></p><?php echo $tipo_usuario ?></button>
<?php
}
$sq = $conexion -> prepare("SELECT * FROM cursos WHERE nombre LIKE '%".$dato."%'");
$sq -> execute();

while ($queryanswer = $sq -> fetch()) {
	# code...

?>
<button><p class="consultan"><?php echo $queryanswer['nombre']; ?></p></button>
<?php
}
 ?>