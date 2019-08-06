<?php 
include '../../conexion.php';
									$st = $conexion -> prepare("SELECT * FROM usuario");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="checkbox" name="usuarioradio" id="<?php echo $opciones['id'] ?>" class="usuarios" value="<?php echo $opciones['id'] ?>" style="width: 20px;"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombres']." ".$opciones['apellidos'] ?></label><br><br>
								 <?php 
									}
									$st = $conexion -> prepare("SELECT * FROM salon");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="checkbox" name="usuarioradio" id="<?php echo $opciones['id'] ?>" class="usuarios" value="<?php echo $opciones['id'] ?>" style="width: 20px;"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombre'] ?></label><br><br>
								 <?php 
									}
								 ?>
