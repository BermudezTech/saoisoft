<form method="POST" action="validar/calificar_usuario.php">
<?php 
include '../../conexion.php';
$id = $_POST['id'];
$idactividad = $id;
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
 		<th>Revisar respuesta</th>
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
	$calificacion = "";
	$sq3 = $conexion -> prepare("SELECT * FROM calificaciones WHERE estudiante='$idusuario' && actividad='$idactividad'");
	$sq3 -> execute();
	$calificacion = $sq3 -> fetch();
	$calificacion = $calificacion['nota'];
?>
<tr>
	
	<td><?php echo $contador ?></td>
	<td><?php echo $usuario['apellidos']." ".$usuario['nombres'] ?></td>
	<td><?php echo $usuario['id'] ?><input type="text" name="id<?php echo $contador ?>" value="<?php echo $usuario['id'] ?>" style="display: none;"></td>
	<td><?php echo $salon['nombre'] ?><input type="text" name="salon<?php echo $contador ?>" value="<?php echo $salon['id'] ?>" style="display: none;"><input type="curso" name="curso" value="<?php echo $curso ?>" style="display: none;"></td>
	<td><a href="#" onclick="revisarenvio(<?php echo $idactividad ?>, <?php echo $curso; ?>,<?php echo $usuario['id'] ?>)"><img src="../icons/ojo.png"></a></td>
	<td><div class="form"><input type="text" name="nota<?php echo $contador ?>" value="<?php echo $calificacion ?>"></div></td>
	
</tr>
<?php
}
?>
 </table>
 <br><br>
 <input type="text" name="idactividad" value="<?php echo $idactividad; ?>" style="display: none;">
 <input type="text" name="contador" value="<?php echo $contador; ?>" style="display: none;">
 <div class="form"><input type="submit" value="Calificar" class="button-submit-green"></div>
 </form>
 