<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Configuracion inicial</title>
	<link rel="stylesheet" href="../styles/config.css">
	<link rel="stylesheet" href="../styles/botones.css">
	<link rel="stylesheet" href="../styles/main.css">
</head>
<style>
	body{
		background-image: url(https://previews.123rf.com/images/malven/malven1405/malven140500114/28632430-resumen-textura-de-tela-%C3%A1spera-para-los-fondos-del-color-blanco.jpg);
		background-size: 30%;
	}
	.formulario{
		text-align: left;
		padding: 30px;
		box-sizing: border-box;
	}
	input{
		margin-bottom: 20px;
		height: 30px;
		padding: 10px;
		box-sizing: border-box;
	}
	img{
		width: 200px;
	}
</style>
<body>
	<div class="contenedor">
		<div class="formulario" style="width: 100%;">
			<form action="upload_main_config.php" method="POST" enctype="multipart/form-data">
			<h1>Datos institucion</h1>
			<h2>Datos basicos:</h2>
			<label for="nombre">Nombre de la institucion:</label>
			<input type="text" name="nombre">
			<label for="escudo">Coloque el escudo de su institucion.:</label>
			<input type="file" name="escudo" id="escudo">
			<div id="imagePreview">
		
			</div>
			<h3 id="text">Colores</h3>
			<select name="color1" id="color1" onchange="color();">
				<option value="0">Seleccione un color</option>
				<option value="1" style="background-color: #2c2c54" onclick="color()"></option>
				<option value="2" style="background-color: #474787" onclick="color()"></option>
				<option value="3" style="background-color: #aaa69d" onclick="color()"></option>
				<option value="4" style="background-color: #227093" onclick="color()"></option>
				<option value="5" style="background-color: #218c74" onclick="color()"></option>
				<option value="6" style="background-color: #b33939" onclick="color()"></option>
				<option value="7" style="background-color: #cd6133" onclick="color()"></option>
				<option value="8" style="background-color: #84817a" onclick="color()"></option>
				<option value="9" style="background-color: #cc8e35" onclick="color()"></option>
				<option value="10" style="background-color: #ccae62" onclick="color()"></option>
			</select>
			<select name="color2" id="color2" onchange="colord();">
				<option value="0">Seleccione un color</option>
				<option value="1" style="background-color: #2c2c54" onclick="colord()"></option>
				<option value="2" style="background-color: #474787" onclick="colord()"></option>
				<option value="3" style="background-color: #aaa69d" onclick="colord()"></option>
				<option value="4" style="background-color: #227093" onclick="colord()"></option>
				<option value="5" style="background-color: #218c74" onclick="colord()"></option>
				<option value="6" style="background-color: #b33939" onclick="colord()"></option>
				<option value="7" style="background-color: #cd6133" onclick="colord()"></option>
				<option value="8" style="background-color: #84817a" onclick="colord()"></option>
				<option value="9" style="background-color: #cc8e35" onclick="colord()"></option>
				<option value="10" style="background-color: #ccae62" onclick="colord()"></option>
			</select>
			<select name="color3" id="color3" onchange="colort();">
				<option value="0">Seleccione un color</option>
				<option value="1" style="background-color: #40407a" onclick="colort()"></option>
				<option value="2" style="background-color: #706fd3" onclick="colort()"></option>
				<option value="3" style="background-color: #f7f1e3" onclick="colort()"></option>
				<option value="4" style="background-color: #34ace0" onclick="colort()"></option>
				<option value="5" style="background-color: #33d9b2" onclick="colort()"></option>
				<option value="6" style="background-color: #ff5252" onclick="colort()"></option>
				<option value="7" style="background-color: #ff793f" onclick="colort()"></option>
				<option value="8" style="background-color: #d1ccc0" onclick="colort()"></option>
				<option value="9" style="background-color: #ffb142" onclick="colort()"></option>
				<option value="10" style="background-color: #ffda79" onclick="colort()"></option>
			</select><br><br>
			<br><br>
			<label>Coloque la dirección de la institucion:</label>
			<input type="text" name="direccion">
			<label>Coloque el email de contacto de la institucion: </label>
			<input type="email" name="email_ins">
			<label>Coloque el telefono de la institucion: </label>
			<input type="text" name="telefono_ins">
			<hr>
			<h2>Datos administrador:</h2>
			<label>Tipo de documento:</label>
			<select name="tipo_documento">
				<option value="CC">Cedula de ciudadania</option>
				<option value="TI">Tarjeta de identidad</option>
				<option value="TE">Tarjeta de extranjeria</option>
				<option value="PA">Pasaporte</option>
			</select><br><br>
			<label>Coloque el documento del administrador:</label>
			<input type="text" name="id">
			<label>Coloque nombres del administrador:</label>
			<input type="text" name="nombres_admin">
			<label>	Coloque apellidos del administrador:</label>
			<input type="text" name="apellidos_admin">
			<label>Coloque email del administrador:</label>
			<input type="email" name="email_admin">
			<label>Coloque contraseña del administrador:</label>
			<input type="password" name="pass_admin" id="pass">
			<label>Confirme contraseña del administrador:</label>
			<input type="password" name="pass_admin_2" id="pass_2" onkeyup="myFunction()">
			<span id="span"></span>
			<br><br><br>
			<label>Direccion:</label>
			<input type="text" name="direccion_admin" >
			<label>Telefono:</label>
			<input type="text" name="telefono_admin" >
			<label>Coloque fecha de nacimiento del administrador:</label>
			<input type="date" name="date_admin">
			<label>Coloque foto del administrador.:</label>
			<input type="file" name="foto_admin" id="foto_admin">
			<div id="imagePreview2">
		
			</div>
			<input type="submit" class="button-submit-green">
			</form>
		</div>
	</div>

<script>
	var span = document.getElementById('span');
	var pass = document.getElementById('pass');
	var pass_2 = document.getElementById('pass_2');
	function myFunction(){
		if (pass.value == pass_2.value) {
			span.style.color = 'green';
			span.innerHTML = 'Correcto';
		}else{
			span.style.color = 'red';
			span.innerHTML = '<img src="http://www.gifde.com/gif/otros/decoracion/cargando-loading/cargando-loading-041.gif" class="gif">No coinciden las contraseñas';
		}
	}	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	.gif{
		width: 17px;
	}
</style>
<script src="escudo.js"></script>
<script src="color.js"></script>
</body>
</html>