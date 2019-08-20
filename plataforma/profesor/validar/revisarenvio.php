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

 <h2><?php echo $actividad['nombre']; ?></h2>
 <h3>Estudiante: <?php echo $estudiante['nombres']." ".$estudiante['apellidos']; ?></h3>
 <div class="oculto">
 <input type="text" name="estudiante" value="<?php echo $estudiante['id'] ?>">
 <input type="text" name="actividad" value="<?php echo $actividad['id'] ?>">
 <input type="text" name="curso" value="<?php echo $curso['id'] ?>">
 </div>
 <h3>Curso: <?php echo $curso['nombre']; ?></h3><br><br>

 <h4>Ver envio:</h4>
 <textarea disabled="true" style="resize: none; width: 100%; height: 50%;"></textarea><br><br>
 <h4>Archivo adjunto: <a href="">Descargar</a></h4><br><br>




 <h3>Calificacion: </h3><form method="POST" action="validar/calificacion_individual.php"><div class="form"><input type="text" name="nota<?php echo $contador ?>" value="<?php echo $calificacion ?>"></div>
 <div class="form"><input type="submit" value="Calificar" class="button-submit-green"></div></form>