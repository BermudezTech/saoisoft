<?php 
session_start();
include 'permisos_admin.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();


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
	.form img{
		width: 200px;
	}
	.chk{
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		align-items: flex-start;
		vertical-align: middle;
	}
	.chk input{
		width: 10px;
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
				<div class="modal" id="modal">
					<div class="contenidomodal">
						<div class="close">
							<button type="button" onclick="cerrar()">X</button>
						</div>
						<div class="form">
							<h2>Seleccione el curso</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar" onclick="recargar()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de cursos</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda()" name="query" id="query">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm">
								<div id="datos"></div>
							<button type="button" class="button-submit-red" onclick="nuevo_cursoiframe()">+  Nuevo Curso</button>
							<iframe src="nuevo_curso.php" id="iframe"></iframe>
							<button type="button" class="button-submit-green" onclick="modalvalidar()">Seleccionar curso</button>
							</form>
						</div>
						<br><br><br>
					</div>
							
				</div>
				<div class="modal2" id="modal2">
					<div class="contenidomodal2">
						<div class="close2">
							<button type="button" onclick="cerrar2()">X</button>
						</div>
						<div class="form">
							<h2>Seleccione la materia</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar2" onclick="recargar2()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de materias</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda2()" name="query2" id="query2">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm">
								<div id="datos2"></div>
							<button type="button" class="button-submit-red" onclick="nueva_materiaiframe()">+  Nueva Materia</button>
							<iframe src="nueva_materia.php" id="iframe2"></iframe>
							<button type="button" class="button-submit-green" onclick="modalvalidar2()">Seleccionar curso</button>
							</form>
						</div>
						<br><br><br>
					</div>
							
				</div>
				<h2>Diligencie la siguiente información para crear un curso:</h2>
				<div class="form">
					<form action="validar/materia_curso.php" method="POST" enctype="multipart/form-data">
						<div class="span">Informacion curso</div><br>
						<label>Seleccione la materia:</label>
						<button onclick="seleccionar_materias()" type="button" class="boton2">Seleccionar materia</button><input type="text" name="materia" id="materia" style="display: none;"><br><br>
						<label>Seleccione el curso:</label>
						<button onclick="seleccionar_cursos()" type="button" class="boton2">Seleccionar curso</button><input type="text" name="curso" id="curso"style="display: none;"><br><br>
						<input type="submit" value="Guardar" class="button-submit-green" onclick="cursossubmit()">
					</form>
				</div>				
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>