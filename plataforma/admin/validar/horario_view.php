<?php
include '../../conexion.php';
$contador = 0;
$curso = $_POST['curso'];
$st = $conexion -> prepare("SELECT * FROM horario");
$st -> execute();
while ($horario = $st -> fetch()) {
	if ($horario['salon'] == $curso) {
		$contador++;
	}
}
if ($contador == 0) {
?>
							<tr>
								<th>Hora</th>
								<th>Lunes</th>
								<th>Martes</th>
								<th>Miercoles</th>
								<th>Jueves</th>
								<th>Viernes</th>
							</tr>
							<tr class="fila">
								<td><input type="text" name="hora1"></td>
								<td><select name="lunes1"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id1" value="1"style="display: none;"></td>
								<td><select name="martes1"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id1" value="1"style="display: none;"></td>
								<td><select name="miercoles1"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id1" value="1"style="display: none;"></td>
								<td><select name="jueves1"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id1" value="1"style="display: none;"></td>
								<td><select name="viernes1"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id1" value="1"style="display: none;"></td>
							</tr>

<?php }else{
?>
<tr>
	<th>Hora</th>
	<th>Lunes</th>
	<th>Martes</th>
	<th>Miercoles</th>
	<th>Jueves</th>
	<th>Viernes</th>
</tr>
<?php 
$st2 = $conexion -> prepare("SELECT * FROM horario WHERE salon = '$curso' ORDER BY h ASC, hora ASC");
$st2 -> execute();
$contador = 1;
while ($fila2 = $st2 -> fetch()) {
?>
<tr class="fila">
								<td><input type="text" name="hora<?php echo $contador ?>" value="<?php echo $fila2['hora'] ?>"></td>
								<td><select name="lunes<?php echo $contador ?>"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>" <?php if($fila2['lunes']==$materias['id']){echo "selected";} ?>><?php echo $materias['nombre']; ?></option>
								<?php } ?></select><input type="text" name="id<?php echo $contador ?>" value="<?php echo $fila2['id'] ?>"style="display: none;"></td>

								<td><select name="martes<?php echo $contador ?>"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>" <?php if($fila2['martes']==$materias['id']){echo "selected";} ?>><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id<?php echo $contador ?>" value="<?php echo $fila2['id'] ?>"style="display: none;"></td>

								<td><select name="miercoles<?php echo $contador ?>"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"<?php if($fila2['miercoles']==$materias['id']){echo "selected";} ?>><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id<?php echo $contador ?>" value="<?php echo $fila2['id'] ?>"style="display: none;"></td>

								<td><select name="jueves<?php echo $contador ?>"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"<?php if($fila2['jueves']==$materias['id']){echo "selected";} ?>><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id<?php echo $contador ?>" value="<?php echo $fila2['id'] ?>"style="display: none;"></td>

								<td><select name="viernes<?php echo $contador ?>"><option value="0">Seleccione</option><?php $st = $conexion -> prepare("SELECT * FROM materias"); $st->execute();while ($materias = $st -> fetch()) {	 ?><option value="<?php echo $materias['id'] ?>"<?php if($fila2['viernes']==$materias['id']){echo "selected";} ?>><?php echo $materias['nombre']; ?></option> 
								<?php } ?></select><input type="text" name="id<?php echo $contador ?>" value="<?php echo $fila2['id'] ?>"style="display: none;"></td>
							</tr>
<?php
$contador++;
}
 ?>
<?php
}?>