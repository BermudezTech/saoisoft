<?php 

include '../../conexion.php';

$actividadid = $_POST['id'];
$curso = $_POST['curso'];
$estudiante = $_POST['estudiante'];

$st = $conexion -> prepare("SELECT * FROM calificaciones WHERE estudiante='$estudiante' AND actividad='$actividadid' AND curso='$curso'");
$st -> execute();
$calificacion = $st -> fetch();
$calificacion = $calificacion['nota'];

$st = $conexion -> prepare("SELECT * FROM actividades WHERE id = '$actividadid'");
$st -> execute();
$actividad = $st -> fetch();


$st2 = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$estudiante'");
$st2 -> execute();
$estudiante = $st2 -> fetch();

$st3 = $conexion -> prepare("SELECT * FROM cursos WHERE id = '$curso'");
$st3 -> execute();
$curso = $st3 -> fetch();
 ?>
<form method="POST" action="validar/calificacion_individual.php">
 <h2><?php echo $actividad['nombre']; ?></h2>
 <h3>Estudiante: <?php echo $estudiante['nombres']." ".$estudiante['apellidos']; ?></h3>
 <div class="oculto">
 <input type="text" name="estudiante" value="<?php echo $estudiante['id'] ?>">
 <input type="text" name="actividad" value="<?php echo $actividad['id'] ?>">
 <input type="text" name="curso" value="<?php echo $curso['id'] ?>">
 </div>
 <h3>Curso: <?php echo $curso['nombre']; ?></h3><br><br>

 <h4>Ver envio:</h4>
 <?php 
$estudianteid = $estudiante['id'];
$st5 = $conexion -> prepare("SELECT * FROM resp_actividad WHERE estudiante='$estudianteid' && actividades='$actividadid'");
$st5 -> execute();
$resp_actividad = $st5 -> fetch();
if ($resp_actividad['texto']!='') {
?>

 <textarea disabled="true" style="resize: none; width: 100%; height: 50%; padding: 10px; box-sizing: border-box;"><?php echo $resp_actividad['texto'] ?></textarea><br><br>
 <h4>Archivo adjunto: <?php if ($resp_actividad['url'] == '') {
 	echo "No se adjunto archivo<br><br>";
 }else{ ?><a href="../<?php echo $resp_actividad['url'] ?>">Descargar</a></h4><br><br>
<?php 
}
}else{
	echo "<br><h2>El estudiante no ha enviado actividad<h2><br>";
}
  ?>



 <h3>Calificacion: </h3><div class="form"><input type="text" name="nota" value="<?php echo $calificacion ?>"></div>
 <div class="form"><input type="submit" value="Calificar" class="button-submit-green"></div></form>