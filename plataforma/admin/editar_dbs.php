<?php 

$radio = $_REQUEST['radio'];
$id = $_REQUEST['id'];
$operacion = $_REQUEST['operacion'];

 ?>

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
				<?php 
				switch ($radio) {
					case 1:
						$sq = $conexion -> prepare("SELECT * FROM cursos WHERE id='$id'");
						$sq -> execute();	
					break;
					case 2:
						$sq = $conexion -> prepare("SELECT * FROM datos_institucion WHERE id='$id'");
						$sq -> execute();
					break;
					case 3:
						$sq = $conexion -> prepare("SELECT * FROM materias WHERE id='$id'");
						$sq -> execute();
					break;
					case 4:
						$sq = $conexion -> prepare("SELECT * FROM relestudiantepadre WHERE id='$id'");
						$sq -> execute();
					break;
					case 5:
						$sq = $conexion -> prepare("SELECT * FROM relestudiantesalon WHERE id='$id'");
						$sq -> execute();
					break;
					case 6:
						$sq = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE id='$id'");
						$sq -> execute();
					break;
					case 7:
						$sq = $conexion -> prepare("SELECT * FROM salon WHERE id='$id'");
						$sq -> execute();
					break;
					case 8:
						$sq = $conexion -> prepare("SELECT * FROM usuario WHERE id='$id'");
						$sq -> execute();
					break;
				}
				$consulta = $sq -> fetch();
				if ($operacion == 1) {
					echo "<h3>Editar</h3>";
					echo "<div class='span'>Editar datos</div><br>";
				?>
				<div class="form">
					<form method="POST" action="validar/editar_dbs.php?radio=<?php echo $radio ?>&id=<?php echo $id ?>&operacion=<?php echo $operacion ?>" enctype="multipart/form-data">
				<?php
					switch ($radio) {
						case 1:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Nombre:</label>
							<input type="text" name="nombre" value="<?php echo $consulta['nombre'] ?>">
							<label>Materia:</label>
							<input type="text" name="materia" value="<?php echo $consulta['materia'] ?>">
							<label>Salon:</label>
							<input type="text" name="salon" value="<?php echo $consulta['salon'] ?>">		
				<?php
						break;
						case 2:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Nombre:</label>
							<input type="text" name="nombre" value="<?php echo $consulta['nombre'] ?>">
							<label>Descripcion:</label>	
							<input type="text" name="descripcion" value="<?php echo $consulta['descripcion'] ?>">
							<label>Correo electronico:</label>
							<input type="text" name="email" value="<?php echo $consulta['email'] ?>">		
							<label>Telefono:</label>
							<input type="text" name="telefono" value="<?php echo $consulta['telefono'] ?>">
							<label>Coloque el escudo</label>
							<input type="file" name="foto" id="foto" style="padding-bottom: 30px;">
							<div id="imagePreview2" style="margin-bottom: 60px; margin-top: 40px;"><img src="data:image/jpg;base64,<?php echo base64_encode($fila['escudo']); ?>"></div>
							<style type="text/css">
								#imagePreview2 img{
									width: 200px;
								}
							</style>
				<?php
						break;
						case 3:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Nombre:</label>
							<input type="text" name="nombre" value="<?php echo $consulta['nombre'] ?>">
				<?php
						break;
						case 4:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Estudiante:</label>
							<input type="text" name="estudiante" value="<?php echo $consulta['estudiante'] ?>">
							<label>Padre:</label>
							<input type="text" name="padre" value="<?php echo $consulta['padre'] ?>">
							<label>Madre:</label>
							<input type="text" name="madre" value="<?php echo $consulta['madre'] ?>">
				<?php
						break;
						case 5:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Estudiante:</label>
							<input type="text" name="estudiante" value="<?php echo $consulta['estudiante'] ?>">
							<label>Salon:</label>
							<input type="text" name="salon" value="<?php echo $consulta['salon'] ?>">
				<?php
						break;
						case 6:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Profesor:</label>
							<input type="text" name="profesor" value="<?php echo $consulta['profesor'] ?>">
							<label>Cursos:</label>
							<input type="text" name="cursos" value="<?php echo $consulta['cursos'] ?>">
				<?php
						break;
						case 7:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Nombre:</label>
							<input type="text" name="nombre" value="<?php echo $consulta['nombre'] ?>">
							<label>Grado:</label>
							<input type="text" name="grado" value="<?php echo $consulta['grado'] ?>">
				<?php
						break;
						case 8:
				?>
							<label>Id:</label>
							<input type="text" disabled="true" value="<?php echo $id; ?>">
							<label>Nombres:</label>
							<input type="text" name="nombres" value="<?php echo $consulta['nombres'] ?>">
							<label>Apellidos:</label>
							<input type="text" name="apellidos" value="<?php echo $consulta['apellidos'] ?>">
							<label>Correo electronico:</label>
							<input type="text" name="email" value="<?php echo $consulta['email'] ?>">
							<label>Tipo de usuario:</label>
							<input type="text" name="tipo_usuario" value="<?php echo $consulta['tipo_usuario'] ?>">
							<label>Contraseña:</label>
							<input type="text" name="pass" value="<?php echo $consulta['pass'] ?>">
							<label>Lugar de nacimiento:</label>
							<input type="text" name="lugar_nacimiento" value="<?php echo $consulta['lugar_nacimiento'] ?>">
							<label>Fecha de nacimiento:</label>
							<input type="text" name="fecha_nacimiento" value="<?php echo $consulta['fecha_nacimiento'] ?>">
							<label>Telefono:</label>
							<input type="text" name="telefono" value="<?php echo $consulta['telefono'] ?>">
				<?php
						break;
					}
				?>
				<input type="submit" value="Guardar cambios" class="button-submit-green">
				</form>
				</div>
				<?php
				}else if($operacion == 2){
					echo "<h3>Eliminar</h3>";
				?>
				<br><h3>Seguro que desea eliminar el registro 
					<?php 
				if (isset($consulta['nombre'])){
					echo $consulta['nombre'] . " con la id ". $id;
				}else if(isset($consulta['nombres'])){
					echo $consulta['nombres']." ".$consulta['apellidos']. " con la id ". $id;;
				} ?>
				?</h3>
				<div class="form">
				<form method="POST" action="validar/editar_dbs.php?radio=<?php echo $radio ?>&id=<?php echo $id ?>&operacion=<?php echo $operacion ?>"><br><br>
					<input type="submit" value="Si" class="button-submit-green" name="submit">
					<input type="submit" value="No" class="button-submit-red" name="submit">
				</form>
				</div>
				<?php
				}

				 ?>
			</div>
		</div>
	</div>
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
</body>
</html>