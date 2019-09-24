<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
$examen = $_REQUEST['examen'];
$st = $conexion -> prepare("SELECT * FROM exam WHERE id='$examen'");
$st -> execute();
$exameninfo = $st -> fetch();

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
<body>
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
				<h1><?php echo $exameninfo['nombre'] ?></h1>
				<div class="span">Vista previa</div>
				<style>
					textarea{
						width: 100%;
						height: 80px;
						resize: none;
						padding: 5px;
						box-sizing: border-box;
					}
				</style>
				<?php 
				/*$numeros = range(1,4);
				shuffle($numeros);
				foreach ($numeros as $numero) {
					# code...
					echo $numero;
				}*/
				 ?>
				<?php 
				$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examen'");
				$st -> execute();
				$contador = 1;
				while ($preguntas = $st -> fetch()) {
?>
<br><br><h4><?php echo $contador ?>. <?php echo $preguntas['pregunta'] ?></h4><br>
<?php
if ($preguntas['tipo']==1) {
?>
<textarea name="<?php echo $preguntas['id'] ?>"></textarea>
<?php
}else{
	$pid = $preguntas['id'];
	$st2 = $conexion -> prepare("SELECT * FROM answer WHERE question = '$pid' && estado=1");
	$st2 -> execute();
	$respuestacorrecta=$st2->fetch();
	$respuestas[1] = $respuestacorrecta['respuesta'];
	$st3 = $conexion -> prepare("SELECT * FROM answer WHERE question='$pid' && estado=2");
	$st3 -> execute();
	$contador2 = 2;
	while ($respuestasincorrectas = $st3 -> fetch()) {
		$respuestaid=$respuestasincorrectas['id'];
		$respuestas[$contador2] = $respuestasincorrectas['respuesta'];
		$contador2++;
	}
	$contador2 = $contador2 - 1;
$numeros = range(1,$contador2);
shuffle($numeros);
foreach ($numeros as $numero) {
?>
<input type="radio" id="<?php echo $pid.$numero ?>" name="<?php echo $pid ?>"><label for="<?php echo $pid.$numero ?>"> <?php echo $respuestas[$numero] ?></label><br><br>
<?php
}
}
$contador++;
				}

				 ?>
				 <br><br><div class="form">
<button class="buttonsexamen" id="validarexamen3" onclick="atras()">Atras</button><button class="buttonsexamen" id="validarexamen2" onclick="finalizar()" type="button">Finalizar examen</button></div>
		</div>
			</div>

<style type="text/css">
						.buttonsexamen{
							border: none;
							padding: 10px;
							box-sizing: border-box;
							width: 50%;
							background-color: <?php echo $fila['color2'] ?>;
							color: #ffffff;
							cursor: pointer;
						}
						.buttonsexamen:hover{
							opacity: 0.7;
						}
					</style>
	</div>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript">
	function atras(){
		var examen = <?php echo $_REQUEST['examen']; ?>;
		location.href = "nuevo_examen.php?examen="+examen;
	}
	function finalizar(){
		alert('Examen finalizado, el estudiante puede ver el examen disponible en la bandeja de la clase. Si desea editar este examen más tarde, ingrese a la materia correspondiente y busque el examen.');
		location.href = 'index.php';
	}
</script>
</body>
</html>