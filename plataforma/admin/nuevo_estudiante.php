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
				<div class="modal7" id="modal7">
					<div class="contenidomodal7">
						<div class="close">
							<button type="button" onclick="cerrar7()">X</button>
						</div>
						<div class="form7">
							<h2>Seleccione el curso</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar7" onclick="recargar7()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de cursos</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda7()" name="query7" id="query7">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm">
								<div id="datos7"></div>
							<button type="button" class="button-submit-red" onclick="nuevo_cursoiframe()">+  Nuevo Curso</button>
							<iframe src="nuevo_curso.php" id="iframe"></iframe>
							<button type="button" class="button-submit-green" onclick="modalvalidar7()">Seleccionar curso</button>
							</form>
						</div>
						<br><br><br>
					</div>
							
				</div>
				<h2>Diligencie la siguiente información para crear un estudiante:</h2>
				<div class="form">
					<form action="validar/nuevo_estudiante.php" method="POST" enctype="multipart/form-data">
						<div class="span">Informacion estudiante</div><br>
						<label>Tipo de documento</label>
						<select name="tipo_documento">
							<option value="CC">Cedula de ciudadania</option>
							<option value="TI">Tarjeta de identidad</option>
							<option value="TE">Tarjeta de extranjeria</option>
							<option value="PA">Pasaporte</option>
						</select>
						<label>Coloque el documento</label>
						<input type="text" name="id" id="id">
						<label>Coloque los nombres del estudiante</label>
						<input type="text" name="nombres">
						<label>Coloque los apellidos del estudiante</label>
						<input type="text" name="apellidos">
						<label>Coloque el email del estudiante</label>
						<input type="text" name="email">
						<label>Coloque la contraseña del estudiante</label><br><br>
						<div class="chk"><input type="checkbox" id="chk" onclick="passw()"><p>Colocar la misma contraseña que el usuario</p></div>
						<input type="password" name="pass" id="pass">
						<label>Coloque el lugar de nacimiento del estudiante</label>
						<input type="text" name="lnacimiento">
						<label>Coloque la fecha de nacimiento del estudiante</label>
						<input type="date" name="fnacimiento">
						<label>Coloque la direccion del estudiante</label>
						<input type="text" name="direccion">
						<label>Coloque el telefono del estudiante</label>
						<input type="text" name="telefono">
						<label>Seleccione el curso del estudiante:</label>
						<button onclick="seleccionar_cursos2()" type="button" class="boton2">Seleccionar curso</button><input type="text" name="curso" id="curso"><br>
						<label>Coloque la foto del estudiante</label>
						<input type="file" name="foto" id="foto" style="padding-bottom: 30px;">
						<div id="imagePreview2" style="margin-bottom: 60px; margin-top: 40px;"></div>
						<input type="submit" value="Guardar" class="button-submit-green" onclick="estudiantesubmit()">
					</form>
				</div>				
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript">
	(function(){


		function filePreview(input){
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e){
					$('#imagePreview2').html("<img src='"+e.target.result+"'/>");
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#foto').change(function() {
			filePreview(this);
		});
		})();
</script>
<script type="text/javascript">
	function passw(){
		var text = document.getElementById('pass');
		var id = document.getElementById('id');
  if (document.getElementById("chk").checked = true){
    text.value = id.value;
  } else {
     text.value = '';
  }
	}
</script>
</body>
</html>