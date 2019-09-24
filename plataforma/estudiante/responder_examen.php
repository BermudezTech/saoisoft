<?php 
session_start();
include 'permisos_estudiante.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();

$examen = $_REQUEST['examen'];
$sq = $conexion -> prepare("SELECT * FROM exam WHERE id='$examen'");
$sq -> execute();
$examen = $sq -> fetch();
$examenid = $examen['id'];
$examenintentos = $examen['intentos'];
$estudiante = $_SESSION['id'];
$st = $conexion -> prepare("SELECT * FROM examscores WHERE examen='$examenid' && estudiante='$estudiante'");
$st -> execute();
$contador = 0;
while ($examscores = $st ->fetch()) {
	$nota = $examscores['nota'];
	$contador++;
}
$estudianteintentos = $contador;
$actualdate = date("Y-m-d");

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador inicial</title>
	<link rel="stylesheet" href="../styles/main_app.css">
	<link rel="image/x-icon" href="../Finallogo.png">
</head>
<style type="text/css">
	 .header{
	 	background-color: <?php echo $fila['color1'] ?>;
	 }
	 .aside{
	 	background-color: <?php echo $fila['color2'] ?>;
	 }
	 .aside hr{
	 	color: <?php echo $fila['color3'] ?>;
	 }
	 .header .separador{
		color: <?php echo $fila['color3'] ?>;
	}
	.span{
		background-color: <?php echo $fila['color3'] ?>;
	}
</style>
<body onload='timeout()'>
	<div class="contenedor">
		<div class="header">
			<div class="izq">
				<?php include 'search_bar.php' ?>
			</div>
			
			<div class="botones">
				<?php include 'header.php' ?>
			</div>
		</div>
		<div class="body">
			<div class="aside">
				<?php include 'aside.php' ?>
			</div>
			<div class="main">
				<div class="menu" id="menu">
					<?php include 'menu.php' ?>
				</div>
				<!--

				CONTENIDO

				-->
				<style>
					.main button, input[type="submit"],.button{
						background-color: <?php echo $fila['color3'] ?>;
						padding: 5px;
						border: none;
						box-sizing: border-box;
						width: 100%;
						color: #ffffff;
						cursor: pointer;
						text-decoration: none;
					}
					.main button:hover, input[type="submit"]:hover,.button:hover{
						opacity: 0.7;
					}
				</style>
				<form action="validar/revisar_examen.php?examen=<?php echo $examenid ?>" method="POST" id="form1">
				<?php 

				if (!isset($_REQUEST['inicio'])) {
?>
<style>
	tr,td{
		border: 1px solid <?php echo $fila['color3'] ?>;
		font-size: 20px;
		padding: 5px;
	}
</style>
<table style="width: 100%; border: 3px solid <?php echo $fila['color3'] ?>; border-collapse: collapse;">
	<tr>
		<td><b>Examen:</b> </td>
		<td><?php echo $examen['nombre'] ?></td>
	</tr>
	<tr>
		<td><b>Intentos: </b></td>
		<td><?php echo $examen['intentos'] ?></td>
	</tr>
	<tr>
		<td><b>Fecha de caducidad:</b> </td>
		<td><?php echo $examen['fecha'] ?></td>
	</tr>
	<tr>
		<td><b>Tiempo para presentar el examen: </b></td>
		<td><?php echo $examen['horas'] ?> hora(s) y <?php echo $examen['minutos']; ?> minutos</td>
	</tr>
	<tr>
		<td><b>Puntaje máximo posible: </b></td>
		<td><?php echo $examen['maxscore'] ?></td>
	</tr>
	<tr>
		<td><b>Iniciar: </b></td>
		<?php 
			if ($estudianteintentos >= $examenintentos){
				$inicio = 2;
			}else{
				$inicio = 1;
			}
		 ?>
		<td><button type="button" onclick="location.href='responder_examen.php?examen=<?php echo $examenid ?>&inicio=<?php echo $inicio ?>'">Responder</button></td>
	</tr>
</table><br>
<table style="width: 100%; border: 3px solid <?php echo $fila['color3'] ?>; border-collapse: collapse;">
	<?php 
$estudiante=$_SESSION['id'];
$thisexamen = $_REQUEST['examen'];
$sq2 = $conexion -> prepare("SELECT * FROM examscores WHERE estudiante='$estudiante' && examen='$thisexamen'");
$sq2 -> execute();
$u = 1;
while ($intentos = $sq2 -> fetch()) {
	$intento[$u] = $intentos['nota'];
	$u++;
}
$u = 1;
while ($u <= $examen['intentos']) {
?>
<tr>
		<td>Intento <?php echo $u ?>:</td>
		<td><?php if (isset($intento[$u])) {
			# code...
			 echo $intento[$u];
		} ?></td>
	</tr>
<?php
$u++;
}

	 ?>
</table>
<br><table style="width: 100%; border: 3px solid <?php echo $fila['color3'] ?>; border-collapse: collapse;">
	<tr>
		<td>Nota final</td>
		<td><?php if(isset($intento)){echo max($intento);} ?></td>
	</tr>
</table>
<?php
				}else{
					if (($estudianteintentos >= $examenintentos) || ($_REQUEST['inicio']==2) || ($actualdate > $examen['fecha'])) {
						echo "<h1>No tiene permiso para acceder a este examen</h1>";
						echo "<h3>Si ya realizó el número de intentos permitidos, no puede acceder. Si la fecha permitida caducó, ya no puede realizar este examen. Es posible que aun tenga intentos disponibles sin embargo, esta es la retroalimentacion.</h3>";
?>
<style>
	tr,td{
		border: 1px solid <?php echo $fila['color3'] ?>;
		font-size: 20px;
		padding: 5px;
	}
</style><br>
<table style="width: 100%; border: 3px solid <?php echo $fila['color3'] ?>; border-collapse: collapse;">
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
$preguntaidd = $preguntaid[$numero];
$st5 = $conexion -> prepare("SELECT * FROM relestudianteresp WHERE estudiante='$estudiante' && pregunta='$preguntaidd' ORDER BY id DESC");
		$st5 -> execute();
		$relestudianteresp = $st5 -> fetch();
		if ($relestudianteresp['estado']==1) {
?>
<img src="../icons/Visto_Bueno.png" width="20px" style="padding-left: 20px;"></h3><br>
<?php
		}else if($relestudianteresp == 2){
?>
<img src="../icons/exclamacion.png" width="20px" style="padding-left: 20px;" title="Necesita ser revisado por el profesor"></h3><br>
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
		$estudiante=$_SESSION['id'];
		$preguntaidd = $preguntaid[$numero];
		$st5 = $conexion -> prepare("SELECT * FROM relestudianteresp WHERE estudiante='$estudiante' && pregunta='$preguntaidd'");
		$st5 -> execute();
		$relestudianteresp = $st5 -> fetch();
?>
<input type="radio" id="<?php echo $respuestaid[$numero2] ?>" name="<?php echo $preguntaid[$numero] ?>" value="<?php echo $respuestaid[$numero2] ?>" disabled <?php if($relestudianteresp['respuestac']==$respuestaid[$numero2]){}else{echo "s";} ?>checked><label for="<?php echo $respuestaid[$numero2] ?>"> <?php echo $respuesta[$numero2] ?></label><br><br>
<?php
	}
}else{
		$estudiante=$_SESSION['id'];
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

$examenid = $_REQUEST['examen'];
 ?>
<a href="responder_examen.php?examen=<?php echo $examenid ?>" class="button">Regresar</a></form>
<?php
				

				 ?>
<?php
						die();
					}
?>
<h1><?php echo $examen['nombre'] ?></h1><br>
<div class='timer' style='text-align: center;'><h4>Tiempo restante:<strong><div id='demo'>Tiempo Agotado</div></strong></div></h4>

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
<h3><?php echo $c ?>. <?php echo $preguntas[$numero] ?></h3><br>
<?php
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
?>
<input type="radio" id="<?php echo $respuestaid[$numero2] ?>" name="<?php echo $preguntaid[$numero] ?>" value="<?php echo $respuestaid[$numero2] ?>"><label for="<?php echo $respuestaid[$numero2] ?>"> <?php echo $respuesta[$numero2] ?></label><br><br>
<?php
	}
}else{
?>
<textarea name="<?php echo $preguntaid[$numero] ?>" style="width: 100%; height: 100px; resize: none; padding: 5px; box-sizing: border-box; margin-bottom: 10px;"></textarea>
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


 ?>
<input type="submit"></form>
<?php
				}

				 ?>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
<script>
	
<?php 
$horas = $examen['horas'] * 60;
$minutos = $examen['minutos'];
$minutos = $minutos + $horas;
echo "var minutos = $minutos;";
 ?>
	
	var timeLeft=minutos*60;

	function timeout(){
		var minute = Math.floor(timeLeft/60);
		var second = timeLeft%60;
		if(timeLeft <= 0){
			document.getElementById('form1').submit();
			clearTimeout(tm);
			}else{
				if(minute<10){
					minutee = '0' + minute;
					}else{
						minutee = minute;
					}
					if(second<10){
						secondd = '0' + second;
						}else{
							secondd = second;
						}
						document.getElementById('demo').innerHTML= minutee+ ':' +secondd;
					}
					timeLeft--;
					var tm= setTimeout(function(){timeout()},1000)
				}
</script>
</body>
</html>