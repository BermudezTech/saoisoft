<?php 
include '../../conexion.php';
									$st = $conexion -> prepare("SELECT * FROM salon");
									$st -> execute();
									while ($opciones = $st -> fetch()) {
								 ?>
								 <input type="checkbox" name="cursoradio" id="<?php echo $opciones['id'] ?>" value="<?php echo $opciones['id'] ?>" style="width: 20px;" class="curso"><label for="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombre'] ?></label><br>
								 <?php 
									}
								 ?>