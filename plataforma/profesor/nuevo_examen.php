<?php 
session_start();
include 'permisos_profesor.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
$sq = $conexion -> prepare("SELECT * FROM exam ORDER BY id DESC");
$sq -> execute();
$examen = $sq -> fetch();
$examenid = $examen['id'];
if(!isset($_REQUEST['examen'])){
	header("location: nuevo_examen.php?examen=$examenid&num=1");
}
$examenid = $_REQUEST['examen'];
$st3 = $conexion -> prepare("SELECT * FROM exam WHERE id='$examenid'");
$st3 -> execute();
$examen = $st3 -> fetch();
if (isset($_REQUEST['num'])) {
	$num = $_REQUEST['num'];
	$st = $conexion -> prepare("SELECT * FROM question WHERE examen = '$examenid'");
	$st -> execute();
	$i = 1;
	while ($pregunta = $st -> fetch()) {
		$id[$i] = $pregunta['id'];
		$preguntas[$i] = $pregunta['pregunta'];
		$tipo[$i] = $pregunta['tipo'];
		$i++;
	}
}else{
	$num = 1;
}

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
<body onload="verificar()">
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
				<h1><?php echo $examen['nombre'] ?></h1>
				<div class="form"><br>
					<div class="span">Crear examen</div><br>
					<div class="preguntas">
					<?php 
						$st = $conexion -> prepare("SELECT * FROM question WHERE examen='$examenid'");
						$st -> execute();
						$contador = 1;
						
						while ($pregunta = $st -> fetch()) {
						if ($contador==20 || $contador==40 || $contador ==60 || $contador == 80 || $contador ==100) {
?>
</div>
<div class="preguntas">
<?php
						}
?>
<button style="width: 10%;height: 36px;" class="buttonsexamen" type="button" onclick="goquestion(<?php echo $contador ?>)"><?php echo $contador; ?></button>
<?php
						$contador++;

						}
					 ?>
						
					</div>
					<label>Crear pregunta:</label><br><br>
					<button class="examselection" onclick="abierta()">Abierta</button>
					<button class="examselection" onclick="cerrada()">Seleccion multiple</button>
					<style type="text/css">
						.examselection{
							border: none;
							cursor: pointer;
							padding: 10px;
							color: #ffffff;
							background-color: <?php echo $fila['color2'] ?>;
							box-sizing: border-box;
						}
						.examselection:hover{
							opacity: 0.7;
						}
						textarea{
							width: 100%;
							resize: none;
							padding: 5px;
							box-sizing: border-box;
							height: 100px;
						}
						#abierta{
							display: none;
						}
						#cerrada{
							display: none;
						}
					</style><br>
					<form action="validar/subirpregunta.php" method="POST">
						<input type="text" name="num" value="<?php echo $num ?>" style="display: none;">
					<input type="text" name="examen" value="<?php echo $examenid ?>" style="display: none;">
					<?php 

					if (isset($id[$num])) {
					?>
					<input type="text" name="preguntadb" value="<?php echo $id[$num] ?>" style="display: none;">
					<?php
					}

					 ?>
					<div id="abierta">
					<br><label>Pregunta:</label><textarea onkeydown="habilitarbotones()" name="preguntaa"><?php if(isset($tipo[$num]) && $tipo[$num] == 1){ if(isset($preguntas[$num])){ echo $preguntas[$num];}} ?></textarea></div>
					<div id="cerrada"><br><br><label>Pregunta:</label><br><textarea onkeydown="habilitarbotones()" name="preguntac"><?php if(isset($tipo[$num]) && $tipo[$num] == 2){ if(isset($preguntas[$num])){ echo $preguntas[$num];}} ?></textarea><br><br><label>Respuesta correcta</label>
					<?php 
						if(isset($tipo[$num]) && $tipo[$num] == 2){
							$idp = $id[$num];
							$st = $conexion ->prepare("SELECT * FROM answer WHERE question ='$idp' && estado=1");
							$st -> execute();

							$respuesta = $st -> fetch();
							$respuestacorrecta = $respuesta['respuesta'];
							$st = $conexion ->prepare("SELECT * FROM answer WHERE question ='$idp' && estado=2");
							$st -> execute();
							$c = 1;
							while ($adicional = $st -> fetch()) {
								$adicionales[$c] = $adicional['respuesta'];
								$c++;
							}
							if (!isset($adicionales[1])) {
								$adicionales[1] = "";	
							}
							if (!isset($adicionales[2])) {
								$adicionales[2] = "";	
							}
							if (!isset($adicionales[3])) {
								$adicionales[3] = "";	
							}
						}else{
							$respuestacorrecta = "";
							$adicionales[1] = "";
							$adicionales[2] = "";
							$adicionales[3] = "";
						}

					 ?>
						<input type="text" name="correcta" value="<?php echo $respuestacorrecta ?>"><br><hr><br><label>Respuesta adicional</label><input type="text" name="adicional1" value="<?php echo $adicionales[1] ?>"><br><label>Respuesta adicional</label><input type="text" name="adicional2" value="<?php echo $adicionales[2] ?>"><br><label>Respuesta adicional</label><input type="text" name="adicional3" value="<?php echo $adicionales[3] ?>"></div><br>
					<div class="form" style="display: flex; height: 36px;"><input type="submit" value="Siguiente pregunta/Guardar pregunta" style="width: 50%;height: 36px;" class="buttonsexamen" id="validarexamen"><button class="buttonsexamen" id="validarexamen3" type="button" onclick="vista_previa()">Vista Previa</button><button class="buttonsexamen" id="validarexamen2" onclick="finalizar()" type="button">Finalizar examen</button></div><br><br>
					<style>
						.preguntas{
							display: flex;
							justify-content: center;
							direction: row;
						}
					</style>
					</form>
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
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript">
	function abierta(){
		document.getElementById('cerrada').style.display='none';
		document.getElementById('abierta').style.display='block';
	}
	function cerrada(){
		document.getElementById('abierta').style.display='none';
		document.getElementById('cerrada').style.display='block';
	}
	function habilitarbotones(){
		document.getElementById('validarexamen2').disabled = "false";
	}
	function goquestion(numero){
		location.href="nuevo_examen.php?examen=<?php echo $examenid ?>&num="+numero;
	}
	function vista_previa(){
		var examen = <?php echo $_REQUEST['examen']; ?>;
		location.href = "vista_previa.php?examen="+examen;
		console.log("hola");
	}
	function verificar(){
		<?php 
		if(isset($tipo[$num])){



		if ($tipo[$num] == 1) {
		?>
		document.getElementById('abierta').style.display='block';
		<?php
		}else if($tipo[$num] == 2){
		?>
		document.getElementById('cerrada').style.display='block';
		<?php
		}
}
		 ?>
	}
	function finalizar(){
		alert('Examen finalizado, el estudiante puede ver el examen disponible en la bandeja de la clase. Si desea editar este examen más tarde, ingrese a la materia correspondiente y busque el examen.');
		location.href = 'index.php';
	}
</script>
</body>
</html>