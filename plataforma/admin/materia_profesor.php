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
				<div class="modal4" id="modal4">
					<div class="contenidomodal4">
						<div class="close4">
							<button type="button" onclick="cerrar4()">X</button>
						</div>
						<div class="form">
							<h2>Seleccione el curso</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar4" onclick="recargar4()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de cursos</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda4()" name="query4" id="query4">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm">
								<div id="datos4"></div>
							<button type="button" class="button-submit-red" onclick="nuevo_cursosiframe()">+  Nuevo Curso</button>
							<iframe src="materia_curso.php" id="iframe4"></iframe>
							<button type="button" class="button-submit-green" onclick="modalvalidar4()">Seleccionar curso</button>
							</form>
						</div>
						<br><br><br>
					</div>
							
				</div>
				<div class="modal3" id="modal3">
					<div class="contenidomodal3">
						<div class="close3">
							<button type="button" onclick="cerrar3()">X</button>
						</div>
						<div class="form">
							<h2>Seleccione el profesor</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar3" onclick="recargar3()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de profesores</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda3()" name="query3" id="query3">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm">
								<div id="datos3"></div>
							<button type="button" class="button-submit-red" onclick="nuevo_profesoriframe()">+  Nuevo profesor</button>
							<iframe src="nuevo_profesor.php" id="iframe3"></iframe>
							<button type="button" class="button-submit-green" onclick="modalvalidar3()">Seleccionar curso</button>
							</form>
						</div>
						<br><br><br>
					</div>
							
				</div>
				<h2>Diligencie la siguiente información para asignar materia a profesor:</h2>
				<div class="form">
					<form action="validar/materia_profesor.php" method="POST" enctype="multipart/form-data">
						<div class="span">Informacion materia-profesor</div><br>
						<label>Seleccione la materia:</label>
						<button onclick="seleccionar_curso()" type="button" class="boton2">Seleccionar materia</button><input type="text" name="cursos" id="cursos"><br>
						<label>Seleccione el profesor:</label>
						<button onclick="seleccionar_profesor()" type="button" class="boton2">Seleccionar profesor</button><input type="text" name="profesor" id="profesor"><br>
						<input type="submit" value="Guardar" class="button-submit-green">
					</form>
				</div>				
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>