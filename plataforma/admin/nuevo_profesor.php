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
				<h2>Diligencie la siguiente información para crear un profesor:</h2>
				<div class="form">
					<form action="validar/nuevo_profesor.php" method="POST" enctype="multipart/form-data">
						<div class="span">Informacion profesor</div><br>
						<label>Tipo de documento</label>
						<select name="tipo_documento">
							<option value="CC">Cedula de ciudadania</option>
							<option value="TI">Tarjeta de identidad</option>
							<option value="TE">Tarjeta de extranjeria</option>
							<option value="PA">Pasaporte</option>
						</select>
						<label>Coloque el documento</label>
						<input type="text" name="id" id="id">
						<label>Coloque los nombres del profesor</label>
						<input type="text" name="nombres">
						<label>Coloque los apellidos del profesor</label>
						<input type="text" name="apellidos">
						<label>Coloque el email del profesor</label>
						<input type="text" name="email">
						<label>Coloque la contraseña del profesor</label><br><br>
						<div class="chk"><input type="checkbox" id="chk" onclick="passw()"><p>Colocar la misma contraseña que el usuario</p></div>
						<input type="password" name="pass" id="pass">
						<label>Coloque el lugar de nacimiento del profesor</label>
						<input type="text" name="lnacimiento">
						<label>Coloque la fecha de nacimiento del profesor</label>
						<input type="date" name="fnacimiento">
						<label>Coloque la direccion del profesor</label>
						<input type="text" name="direccion">
						<label>Coloque el telefono del profesor</label>
						<input type="text" name="telefono">
						<label>Coloque la foto del profesor</label>
						<input type="file" name="foto" id="foto" style="padding-bottom: 30px;">
						<div id="imagePreview2" style="margin-bottom: 60px; margin-top: 40px;"></div>
						<input type="submit" value="Guardar" class="button-submit-green"  onclick="profesorsubmit()">
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