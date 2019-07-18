<?php 

include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
session_start();
//include 'permisos_admin.php';

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
				<form method="POST" action="validar/actualizar_info_page.php">
				<div class="span">Colores de la pagina</div>
				<br><h4>Seleccione los colores de la pagina</h4>
				<br><div class="imitacion_pagina">
					<select name="color1" id="color1" onchange="color();" class="headerim">
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
					<div class="mainim">
						<select name="color2" id="color2" onchange="colord();" class="asideim">
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
						<div class="principalim"><p style="font-size: 10px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br><select name="color3" id="color3" onchange="colort();" class="thirdim">
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
			</select></div>
					</div><br><br>
			<div class="span">Pagina principal</div><br>
			<div class="textarea"><?php include 'pagina_principal.php' ?></div><br><br>
					<div class="form">
						<input type="submit" class="button-submit-green" value="Guardar cambios">	
					</div>						
				</div><br>
				
			</div>
		</div>
	</div>
	</form>
<style type="text/css">
	.headerim{
		width: 100%;
		height: 10%;
		background-color: <?php echo $fila['color1']; ?>
	}
	.mainim{
		width: 100%;
		height: 90%;
		display: flex;
	}
	.asideim{
		width: 30%;
		background-color: <?php echo $fila['color2']; ?>	
	}
	.principalim{
		width: 70%;
		padding: 20px;
		box-sizing: border-box;
	}
	.thirdim{
		width: 100%;
		height: 20px;
		background-color: <?php echo $fila['color3']; ?>	
	}
	.imitacion_pagina{
		width: 100%;
		height: 400px;
		border: 1px solid #000000;
	}
</style>
<script type="text/javascript" src="botones.js"></script>
<script type="text/javascript" src="color.js"></script>
</body>
</html>