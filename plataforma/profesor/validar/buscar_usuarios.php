<?php 
include '../../conexion.php';
$query = $_POST['usuario'];
									$st = $conexion -> prepare("SELECT * FROM usuario WHERE nombres LIKE '%".$query."%' || id LIKE '%".$query."%' || apellidos LIKE '%".$query."%'");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="radio" name="usuarioradio" id="<?php echo $opciones['id'] ?>" value="<?php echo $opciones['id'] ?>" style="width: 20px;"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombres']." ".$opciones['apellidos'] ?></label><br><br>
								 <?php 
									}
									$st = $conexion -> prepare("SELECT * FROM salon WHERE nombre LIKE '%".$query."%' || id LIKE '%".$query."%'");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="radio" name="usuarioradio" id="<?php echo $opciones['id'] ?>" value="<?php echo $opciones['id'] ?>" style="width: 20px;"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombre'] ?></label><br><br>
								 <?php 
									}
								 ?>