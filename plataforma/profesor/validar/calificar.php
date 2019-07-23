<?php 
include '../../conexion.php';
$id = $_POST['id'];
$curso = $_POST['curso'];
$query = "SELECT * FROM cursos WHERE id='$curso'";
$st = $conexion -> prepare($query);
$st -> execute();
$cursos = $st -> fetch();
$salon = $cursos['salon'];
$materia = $cursos['materia'];
$query = "SELECT * FROM relestudiantesalon WHERE salon='$salon'";
$st = $conexion -> prepare($query);
$st -> execute();
 ?>

 <table>
 	<tr>
 		<th>Id</th>
 		<th>Nombre</th>
 		<th>Id estudiante</th>
 		<th>Curso</th>
 		<th>Nota</th>
 	</tr>
 <?php 
 $contador = 1;
 while ($rel = $st -> fetch()) {
 	$salon = $rel['salon'];
 	$st3 = $conexion -> prepare("SELECT * FROM salon WHERE id = '$salon'");
 	$st3 -> execute();
 	$salon = $st3 -> fetch();
	$usuarioid = $rel['estudiante'];
	$st2 = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$usuarioid'");
	$st2 -> execute();
	$usuario = $st2 -> fetch();
	$usuarioap[$contador] = $usuario['apellidos'];
	$usuarioid[$contador] = $usuario['id'];
	$contador++;
}
sort($usuarioap);
$num = count($usuarioap);
for ($i=0; $i < $num; $i++) { 
	$usuarioape = $usuarioap[$i];
	$contador = $i+1;
	$sq = $conexion -> prepare("SELECT * FROM usuario WHERE apellidos='$usuarioape'");
	$sq -> execute();
	$usuario = $sq -> fetch();
	$idusuario = $usuario['id'];
	$sq2 = $conexion -> prepare("SELECT * FROM relestudiantesalon WHERE estudiante='$idusuario'");
	$sq2 -> execute();
	$rel = $sq2 -> fetch();
	if ($rel['curso'] == $cursos) {
		# code...    
	}
?>
<tr>
	<td><?php echo $contador ?></td>
	<td><?php echo $usuario['apellidos']." ".$usuario['nombres'] ?></td>
	<td><?php echo $usuario['id'] ?></td>
	<td><?php echo $salon['nombre'] ?></td>
	<td><div class="form"><input type="text"></div></td>
</tr>
<?php
}
?>
 </table>