<?php 
include '../../conexion.php';
$query = $_POST['estudiante'];
									$st = $conexion -> prepare("SELECT * FROM usuario WHERE tipo_usuario = 1 && (nombres LIKE '%".$query."%' || id LIKE '%".$query."%')");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="radio" name="estudiantesradio" id="<?php echo $opciones['id'] ?>" value="<?php echo $opciones['id'] ?>" style="width: 20px;"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombres']." ".$opciones['apellidos'] ?></label><br><br>
								 <?php 
									}
								 ?>