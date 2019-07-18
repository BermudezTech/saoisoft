<?php 
include '../../conexion.php';
									$st = $conexion -> prepare("SELECT * FROM usuario WHERE tipo_usuario = '2'");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="radio" name="profesorradio" id="<?php echo $opciones['id'] ?>" value="<?php echo $opciones['id'] ?>" style="width: 20px;"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombres']." ".$opciones['apellidos'] ?></label><br>
								 <?php 
									}
								 ?>