<?php 

include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
session_start();

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
				<div class="modal5" id="modal5">
					<div class="contenidomodal5">
						<div class="close5">
							<button type="button" onclick="cerrar5()">X</button>
						</div>
						<div class="form5">
							<h2>Seleccione el estudiante</h2>
							<h4>Si el dato no aparece, pruebe a recargar</h4><br>
							<button type="button" class="recargar5" onclick="recargar5()">🔄  Recargar datos</button><br><br>
							<form>
								<div class="span">Lista de estudiantes</div>
								<br><div class="busqueda">
									<form>
										<input type="text" placeholder="Buscar" onkeyup="busqueda5()" name="query5" id="query5">
										<input type="submit" value="🔎" style="padding: 0; width: 30px;height: 30px;border: 1px solid #B8B8B8;">
									</form>
								</div>
								<form id="demoForm5"><br><br>
								<div id="datos5"></div><br>
							<button type="button" class="button-submit-red" onclick="nuevo_estudianteiframe()">+  Nuevo Estudiante</button>
							<iframe src="nuevo_estudiante.php" id="iframe5"></iframe>
							<button type="button" class="button-submit-green" onclick="modalvalidar5()">Seleccionar estudiante</button>
							</form>
						</div>
						<br><br><br>
					</div>
							
				</div>
				<h2>Diligencie la siguiente información para crear un padre/madre de familia:</h2>
				<div class="form">
					<form action="validar/nuevo_padre_familia.php" method="POST" enctype="multipart/form-data">
						<div class="span">Informacion estudiante</div><br>
						<label>Seleccione el estudiante:</label>
						<button onclick="seleccionar_estudiantes()" type="button" class="boton2">Seleccionar estudiante</button><input type="text" name="estudiante" id="estudiante"><br>
						<div class="span">Informacion padre</div><br>
						<label>Tipo de documento</label>
						<select name="tipo_documento">
							<option value="CC">Cedula de ciudadania</option>
							<option value="TI">Tarjeta de identidad</option>
							<option value="TE">Tarjeta de extranjeria</option>
							<option value="PA">Pasaporte</option>
						</select>
						<label>Coloque el documento</label>
						<input type="text" name="id" id="id">
						<label>Coloque los nombres del padre</label>
						<input type="text" name="nombres">
						<label>Coloque los apellidos del padre</label>
						<input type="text" name="apellidos">
						<label>Coloque el email del padre</label>
						<input type="text" name="email">
						<label>Coloque la contraseña del padre</label><br><br>
						<div class="chk"><input type="checkbox" id="chk" onclick="passw()"><p>Colocar la misma contraseña que el usuario</p></div>
						<input type="password" name="pass" id="pass">
						<label>Coloque el lugar de nacimiento del padre</label>
						<input type="text" name="lnacimiento">
						<label>Coloque la fecha de nacimiento del padre</label>
						<input type="date" name="fnacimiento">
						<label>Coloque la direccion del padre</label>
						<input type="text" name="direccion">
						<label>Coloque el telefono del padre</label>
						<input type="text" name="telefono">
						<label>Coloque la foto del padre</label>
						<input type="file" name="foto" id="foto" style="padding-bottom: 30px;">
						<div id="imagePreview2" style="margin-bottom: 60px; margin-top: 40px;"></div>


						<!--Informacion madre-->


						<div class="span">Informacion madre</div><br>
						<label>Tipo de documento</label>
						<select name="tipo_documentoM">
							<option value="CC">Cedula de ciudadania</option>
							<option value="TI">Tarjeta de identidad</option>
							<option value="TE">Tarjeta de extranjeria</option>
							<option value="PA">Pasaporte</option>
						</select>
						<label>Coloque el documento</label>
						<input type="text" name="idM" id="idM">
						<label>Coloque los nombres de la madre</label>
						<input type="text" name="nombresM">
						<label>Coloque los apellidos de la madre</label>
						<input type="text" name="apellidosM">
						<label>Coloque el email de la madre</label>
						<input type="text" name="emailM">
						<label>Coloque la contraseña de la madre</label><br><br>
						<div class="chk"><input type="checkbox" id="chkM" onclick="passwM()"><p>Colocar la misma contraseña que el usuario</p></div>
						<input type="password" name="passM" id="passM">
						<label>Coloque el lugar de nacimiento de la madre</label>
						<input type="text" name="lnacimientoM">
						<label>Coloque la fecha de nacimiento de la madre</label>
						<input type="date" name="fnacimientoM">
						<label>Coloque la direccion de la madre</label>
						<input type="text" name="direccionM">
						<label>Coloque el telefono de la madre</label>
						<input type="text" name="telefonoM">
						<label>Coloque la foto de la madre</label>
						<input type="file" name="fotoM" id="fotoM" style="padding-bottom: 30px;">
						<div id="imagePreview3" style="margin-bottom: 60px; margin-top: 40px;"></div>
						<input type="submit" value="Guardar" class="button-submit-green">
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
	(function(){


		function filePreview(input){
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e){
					$('#imagePreview3').html("<img src='"+e.target.result+"'/>");
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		$('#fotoM').change(function() {
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
	function passwM(){
		var text = document.getElementById('passM');
		var id = document.getElementById('idM');
  if (document.getElementById("chkM").checked = true){
    text.value = id.value;
  } else {
     text.value = '';
  }
	}
</script>
</body>
</html>