<?php 

include '../../conexion.php';
session_start();
$actividadid = $_POST['id'];
$curso = $_POST['curso'];
$estudiante = $_SESSION['id'];
$st5 = $conexion -> prepare("SELECT * FROM resp_actividad");
$st5 -> execute();
$st6 = $conexion -> prepare("SELECT * FROM actividades WHERE id = '$actividadid'");
$st6 -> execute();
$actividaddate = $st6 -> fetch();
$actividaddate = $actividaddate['fecha_fin'];
echo "<h3>Plazo maximo de envio: </h3>".$actividaddate;
$date = explode("-", $actividaddate);
$year = $date[0];
$month = $date[1];
$day = $date[2];
$actualyear = date("Y");
$actualmonth = date("m");
$actualday = date("d");
if ($year < $actualyear) {
	$vencimiento = 1;
}else if($month < $actualmonth){
	$vencimiento = 1;
}else if($day < $actualday){
	if ($month <= $actualmonth) {
		$vencimiento = 1;

	}else{
		$vencimiento = 0;
	}
}else{
	$vencimiento = 0;
}
while ($fila = $st5 -> fetch()) {
	if (($fila['actividades'] == $actividadid && $fila['estudiante'] == $estudiante) || $vencimiento == 1) {
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
$url = $fila['url'];
$texto = $fila['texto'];
 ?>
<form method="POST" action="validar/send_responder.php" enctype="multipart/form-data">
 <h2><?php echo $actividad['nombre']; ?></h2>
 <h3>Estudiante: <?php echo $estudiante['nombres']." ".$estudiante['apellidos']; ?></h3>
 <div class="oculto">
 <input type="text" name="estudiante" value="<?php echo $estudiante['id'] ?>">
 <input type="text" name="actividad" value="<?php echo $actividad['id'] ?>">
 <input type="text" name="curso" value="<?php echo $curso['id'] ?>">
 </div>
 <h3>Curso: <?php echo $curso['nombre']; ?></h3><br><br>
<h5 class="help">Usted ya no puede acceder a esta actividad puesto se ha acabado el plazo o usted ya la ha enviado</h5>
 <h4>Enviar texto:</h4>
 <textarea style="resize: none; width: 100%; height: 50%; padding: 10px; box-sizing: border-box;" name="text" disabled="true"><?php echo $texto; ?></textarea><br><br>
 <h4>Ver archivo adjunto: <?php if ($url == '') {
 	echo "No se adjuntó archivo";
 }else{ ?><a href="../<?php echo $url ?>">Descargar archivo</a></h4><br><br>
 <?php 
}
		die();
	}
}

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
<form method="POST" action="validar/send_responder.php" enctype="multipart/form-data">
 <h2><?php echo $actividad['nombre']; ?></h2>
 <h3>Estudiante: <?php echo $estudiante['nombres']." ".$estudiante['apellidos']; ?></h3>
 <div class="oculto">
 <input type="text" name="estudiante" value="<?php echo $estudiante['id'] ?>">
 <input type="text" name="actividad" value="<?php echo $actividad['id'] ?>">
 <input type="text" name="curso" value="<?php echo $curso['id'] ?>">
 </div>
 <h3>Curso: <?php echo $curso['nombre']; ?></h3><br><br>

 <h4>Enviar texto:</h4>
 <textarea style="resize: none; width: 100%; height: 50%; padding: 10px; box-sizing: border-box;" name="text"></textarea><br><br>
 <h4>Enviar archivo adjunto: <input type="file" name="archivo"></h4><br><br>
 <div class="form"><input type="submit" value="Enviar respuesta" class="button-submit-green"></div></form>