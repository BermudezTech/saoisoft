<?php 
include '../../conexion.php';
$estudiante = $_POST['estudiante'];
$examen = $_POST['id'];
$curso = $_POST['curso'];
if (isset($_POST['estado'])) {
	$pregunta = $_POST['pregunta'];
	$estado = $_POST['estado'];
	$intento = $_POST['intento'];
	$st = $conexion -> prepare("UPDATE relestudianteresp SET estado='$estado' WHERE estudiante='$estudiante' && pregunta='$pregunta' && intento='$intento'");
	$st -> execute();
	$st = $conexion -> prepare("SELECT * FROM examscores WHERE examen='$examen' && estudiante='$estudiante'");
	$st -> execute();
	$i = 1;
	while ($nota = $st -> fetch()) {
		$minota[$i] = $nota['nota'];
		$i++;
	}
	$nota = max($minota);
	$sql = "SELECT * FROM examscores WHERE cast(nota AS decimal) = cast('$nota' AS decimal) && examen='$examen' && estudiante='$estudiante'";
	$st = $conexion -> prepare($sql);
	$st -> execute();
	$examscoresid = $st -> fetch();
	$examscoresid = $examscoresid['id'];
	$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examen'");
	$st -> execute();
	$questionnumber = 0;
	while ($question = $st -> fetch()) {
		$questionnumber++;
	}
	$st = $conexion -> prepare("SELECT * FROM exam WHERE id='$examen'");
	$st -> execute();
	$examen = $st -> fetch();
	$maxscore = $examen['maxscore'];
	$scoreperquesion = $maxscore/$questionnumber;
	if ($estado == 1) {
		$nuevanota = $nota + $scoreperquesion;
	}else{
		$nuevanota = $nota;
	}
	if(round($nuevanota,2) == $maxscore){
		$nuevanota = round($nuevanota,2);
	}
	$examen = $_POST['id'];
	$sql = "UPDATE examscores SET nota='$nuevanota' WHERE id='$examscoresid'";
	$st = $conexion -> prepare($sql);
	$st -> execute();
}
$estudiante = $_POST['estudiante'];
$examen = $_POST['id'];
$curso = $_POST['curso'];
$st = $conexion -> prepare("SELECT * FROM examscores WHERE examen='$examen' && estudiante='$estudiante'");
$st -> execute();
$i = 1;
while ($nota = $st -> fetch()) {
	$minota[$i] = $nota['nota'];
	$i++;
}
if ($i == 1) {
	echo "<h1>El estudiante no realizó la prueba<h1>";
?>
<a href="#" onclick="calificarexamen(<?php echo $examen ?>, <?php echo $curso ?>)">Regresar</a>
<?php
	die();
}else{
?>
 <a href="#" onclick="calificarexamen(<?php echo $examen ?>, <?php echo $curso ?>)">Regresar</a><br><br>
<?php
}
$nota = max($minota);
$st = $conexion -> prepare("SELECT * FROM exam WHERE id='$examen'");
$st -> execute();
$examen = $st -> fetch();
$examenid = $examen['id'];
 ?>
<style>
	.thistabla tr,td{
		border: 1px solid <?php echo $fila['color3'] ?>;
		padding: 5px;
	}
</style><br>
<table style="width: 100%; border: 3px solid <?php echo $fila['color3'] ?>; border-collapse: collapse;" class="thistabla">
	<tr>
		<td>Nota obtenida</td>
		<td><?php if(isset($nota)){echo $nota;} ?></td>
	</tr>
</table>
<br><h2>Retroalimentacion:</h2>
<h1><?php echo $examen['nombre'] ?></h1><br>

<?php 

$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examenid'");
$st -> execute();
$i = 1;
while ($pregunta = $st -> fetch()) {
	$preguntas[$i] = $pregunta['pregunta'];
	$preguntaid[$i] = $pregunta['id'];
	$preguntatipo[$i] = $pregunta['tipo'];
	$i++;
}
$i = $i - 1;
$numeros = range(1,$i);
shuffle($numeros);
$c = 1;
foreach ($numeros as $numero) {
?>
<h3><?php echo $c ?>. <?php echo $preguntas[$numero] ?>
<?php
$st7= $conexion -> prepare("SELECT * FROM examscores WHERE estudiante='$estudiante' && examen='$examenid'");
$st7-> execute();
$o = 1;
while ($intentos = $st7 -> fetch()) {
	if ($nota == $intentos['nota']) {
		$thisintento = $o;
	}
	$o++;
}
$preguntaidd = $preguntaid[$numero];
$sql = "SELECT * FROM relestudianteresp WHERE estudiante='$estudiante' && pregunta='$preguntaidd' && intento='$thisintento'";
$st5 = $conexion -> prepare($sql);
		$st5 -> execute();
		$relestudianteresp = $st5 -> fetch();
		if ($relestudianteresp['estado']==1) {
?>
<img src="../icons/Visto_Bueno.png" width="20px" style="padding-left: 20px;"></h3><br>
<?php
		}else if($preguntatipo[$numero] == 1){
?>
<img src="../icons/exclamacion.png" width="20px" style="padding-left: 20px;" title="Necesita ser revisado por el profesor"><br><h3>Calificar:</h3><button style=" background-color: transparent; padding: 5px; box-sizing: border-box; cursor: pointer; border: 1px solid #000000;" onclick="calificarpregunta(1,<?php echo $preguntaid[$numero] ?>, <?php echo $estudiante ?>, <?php echo $examenid ?>, <?php echo $curso ?>, <?php echo $thisintento ?>)"><img src="../icons/Visto_Bueno.png" style="width: 20px; height: 20px;"></button><button style=" background-color: transparent; padding: 5px; box-sizing: border-box; cursor: pointer; border: 1px solid #000000;" onclick="calificarpregunta(0,<?php echo $preguntaid[$numero] ?>, <?php echo $estudiante ?>, <?php echo $examenid ?>, <?php echo $curso ?>, <?php echo $thisintento ?>)"><img src="../icons/x-mal.png" style="width: 20px; height: 20px;"></button></h3><br><br>
<?php
		}else{
?>
<img src="../icons/x-mal.png" width="20px" style="padding-left: 20px;"></h3><br>
<?php
}
if ($preguntatipo[$numero] == 2) {

$st2 = $conexion -> prepare("SELECT * FROM answer WHERE question = '$preguntaid[$numero]'");
$st2 -> execute();
$o = 1;
	while ($respuestas = $st2 -> fetch()) {
		$respuesta[$o] = $respuestas['respuesta'];
		$respuestaid[$o] = $respuestas['id'];
		$o++;
	}
	$o = $o -1;
	$numeros2 = range(1,$o);
	shuffle($numeros2);
	foreach ($numeros2 as $numero2) {
		$preguntaidd = $preguntaid[$numero];
		$st5 = $conexion -> prepare("SELECT * FROM relestudianteresp WHERE estudiante='$estudiante' && pregunta='$preguntaidd'");
		$st5 -> execute();
		$relestudianteresp = $st5 -> fetch();
?>
<input type="radio" id="<?php echo $respuestaid[$numero2] ?>" name="<?php echo $preguntaid[$numero] ?>" value="<?php echo $respuestaid[$numero2] ?>" disabled <?php if($relestudianteresp['respuestac']==$respuestaid[$numero2]){}else{echo "s";} ?>checked><label for="<?php echo $respuestaid[$numero2] ?>"> <?php echo $respuesta[$numero2] ?></label><br><br>
<?php
	}
}else{
		$preguntaidd = $preguntaid[$numero];
		$st5 = $conexion -> prepare("SELECT * FROM relestudianteresp WHERE estudiante='$estudiante' && pregunta='$preguntaidd'");
		$st5 -> execute();
		$relestudianteresp = $st5 -> fetch();
?>
<textarea style="width: 100%; height: 100px; padding: 5px; margin-bottom: 10px; box-sizing: border-box; resize: none;" disabled><?php echo $relestudianteresp['respuestaa'] ?></textarea>
<?php
}
$c++;
}
/*$numeros = range(1,4);
				shuffle($numeros);
				foreach ($numeros as $numero) {
					# code...
					echo $numero;
				}*/
				$estudiante = $_POST['estudiante'];
$examen = $_POST['id'];
$curso = $_POST['curso'];
 ?></form>
 <a href="#" onclick="calificarexamen(<?php echo $examen ?>, <?php echo $curso ?>)">Regresar</a><br><br><br>