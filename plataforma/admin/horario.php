<?php 

include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
session_start();
//include 'permisos_admin.php';
if (isset($_REQUEST['curso'])) {
	$curso = $_REQUEST['curso'];
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
<body onload="mostrar_horario()">
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
				<div class="form">
					<div class="span">Asignar horario a curso</div><br>
					<form action="validar/horario.php" method="POST">
						<label>Seleccionar salon: </label>
						<select name="curso" id="cursoselect" onchange="mostrar_horario()">
							<option value="0">Seleccione el curso</option>
							<?php 
								$st = $conexion -> prepare("SELECT * FROM salon");
								$st -> execute();
								while ($salon = $st -> fetch()) {
							?>
							<option value="<?php echo $salon['id'] ?>" <?php 
							if (isset($curso)) {
								if($salon['id']==$curso){
									echo "selected";
								}
							}
							 ?>><?php echo $salon['nombre'] ?></option>
							<?php
								}
							 ?>
						</select>
						<div class="span">Horario</div><br>
						<div class="help">Rellene primero el espacio para poder agregar una nueva casilla. <br>Para que funcione correctamente, porfavor coloque la hora con el siguiente formato: 0:00 a.m.</div>
						<table class="horario" id="new">
						</table>
						<table class="horario">
							<tr><td><button type="submit" class="button-submit-red" style="border: none; width: 80%; color: #ffffff; padding: 5px; box-sizing: border-box; font-weight: bold; cursor: pointer;" onclick="nuevahora()">+</button><input type="text" id="number" style="height: 26px;" value="1" name="number"></td></tr>
						</table>
						<br><br><input type="submit" value="Guardar horario" class="button-submit-green" onclick="contar()">
					</form>
				</div>
			</div>
		</div>
	</div>
<style>
	.horario{
		width: 100%;
		border-collapse: collapse;
		border: 3px solid <?php echo $fila['color1']; ?>;
	}
	.horario th, .horario td{
		text-align: center;
		border: 1px solid <?php echo $fila['color1']; ?>;
		padding: 5px;
		box-sizing: border-box;
	}
	.horario select{
		border: none;
	}
	.horario input[type=text]{
		width: 100px;
	}
</style>
<script>
	function newhour(){
		var divhora = document.getElementById('new');
		var filas = document.getElementsByClassName('fila');
		var contador = filas.length + 1;
		console.log(contador);
		var number = document.getElementById('number');
		number.value = contador;
		<?php 
			$st = $conexion -> prepare("SELECT * FROM horario");
			$st -> execute();
			while ($horario = $st -> fetch()) {
				$id = $horario['id'];
			}
			$lastid = $id + 1;
		 ?>
		 <?php echo "var lastid = ".$lastid.";"; ?>
		var curso = document.getElementById('cursoselect').value;
		console.log(curso);
		divhora.innerHTML += "<tr class='fila'><td><input type='text' name='hora"+contador+"'></td><td><select name='lunes"+contador+"'><option value='0'>Seleccione</option><?php $st = $conexion -> prepare('SELECT * FROM materias'); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value='<?php echo $materias['id'] ?>'><?php echo $materias['nombre']; ?></option><?php } ?></select><input type='text' name='id"+contador+"' value='"+lastid+"' style='display: none;'></td><td><select name='martes"+contador+"'><option value='0'>Seleccione</option><?php $st = $conexion -> prepare('SELECT * FROM materias'); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value='<?php echo $materias['id'] ?>'><?php echo $materias['nombre']; ?></option><?php } ?></select></td><td><select name='miercoles"+contador+"'><option value='0'>Seleccione</option><?php $st = $conexion -> prepare('SELECT * FROM materias'); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value='<?php echo $materias['id'] ?>'><?php echo $materias['nombre']; ?></option><?php } ?></select></td><td><select name='jueves"+contador+"'><option value='0'>Seleccione</option><?php $st = $conexion -> prepare('SELECT * FROM materias'); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value='<?php echo $materias['id'] ?>'><?php echo $materias['nombre']; ?></option><?php } ?></select></td><td><select name='viernes"+contador+"'><option value='0'>Seleccione</option><?php $st = $conexion -> prepare('SELECT * FROM materias'); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value='<?php echo $materias['id'] ?>'><?php echo $materias['nombre']; ?></option><?php } ?></select></td></tr>";
		
	}
	function mostrar_horario(){
		var curso = document.getElementById('cursoselect').value;
		console.log(curso);
		$.ajax({
			url: 'validar/horario_view.php',
			type: "POST",
			data: { curso: curso},
			success: function(response){
				document.getElementById('new').innerHTML = response;

			}
		});
		$('input[name=query]').focus();
		setTimeout(
    function() {
      var filas = document.getElementsByClassName('fila');
		var contador = filas.length;
		console.log(contador);
		var number = document.getElementById('number');
		number.value = contador;
		newhour();
    }, 500);
	}
</script>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>