<br><br>
<?php 
include '../../conexion.php';
$tipo = $_POST['tipo'];
session_start();
$id = $_SESSION['id'];
$actividadid = $_REQUEST['actividadid'];
switch ($tipo) {
	case 2:
?>
<div class="form">
	<div class="span">Nueva tarea</div><br>
	<form action="validar/newtaskupload.php?tipo=<?php echo $tipo ?>" method="POST" enctype="multipart/form-data">
		<label>Nombre:</label>
		<input type="text" name="name">
		<label>Seleccione el curso:</label>
		<select name="curso"><option value="0">Seleccionar curso</option>
<?php 
		$st = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE profesor = '$id'");
		$st -> execute();
		$i = 1;
		while ($rel = $st -> fetch()) {
			$cursos[$i] = $rel['cursos'];
			$i++;
		}
		$num = count($cursos);
		for ($i=1; $i <= $num; $i++) { 
			$idc = $cursos[$i];
			$st2 = $conexion -> prepare("SELECT * FROM cursos WHERE id='$idc'");
			$st2 -> execute();
			$curso = $st2 -> fetch();
		?>
		<option value="<?php echo $curso['id'] ?>"><?php echo $curso['nombre']; ?></option>
		<?php
		}
		 ?>
		</select>
		<label>Descripcion:</label>
		<textarea name="descripcion" style="width: 100%; height: 100px; resize: none; padding: 5px; box-sizing: border-box;"></textarea><br><br>
		<label>Envio de tarea</label><br><br>
		<input type="checkbox" name="chk" id="chk" style="width: 10px; height: 10px;">
		<label for="chk">Permitir al usuario enviar la actividad por medio de la plataforma</label><br>
		<label>Fecha de finalizacion</label>
		<input type="date" name="date">
		<label>Adjuntar archivo:</label>
		<input type="file" style="padding-bottom: 30px;" name="archivo">
		<input type="submit" class="button-submit-green">
	</form>

</div>
<?php
	break;
	case 4:
	$sq = $conexion -> prepare("SELECT * FROM actividades WHERE id='$actividadid'");
	$sq -> execute();
	$actividad = $sq -> fetch();
?>
<div class="form">
	<div class="span">Nueva tarea</div><br>
	<form action="validar/newtaskupload.php?tipo=<?php echo $tipo ?>&actividadid=<?php echo $actividadid ?>" method="POST" enctype="multipart/form-data">
		<label>Nombre:</label>
		<input type="text" name="name" value="<?php echo $actividad['nombre'] ?>">
		<label>Seleccione el curso:</label>
		<select name="curso"><option value="0">Seleccionar curso</option>
<?php 
		$st = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE profesor = '$id'");
		$st -> execute();
		$i = 1;
		while ($rel = $st -> fetch()) {
			$cursos[$i] = $rel['cursos'];
			$i++;
		}
		$num = count($cursos);
		for ($i=1; $i <= $num; $i++) { 
			$idc = $cursos[$i];
			$st2 = $conexion -> prepare("SELECT * FROM cursos WHERE id='$idc'");
			$st2 -> execute();
			$curso = $st2 -> fetch();
		?>
		<option value="<?php echo $curso['id'] ?>" <?php if ($curso['id']==$actividad['cursos']) {
			echo "selected";
		} ?>><?php echo $curso['nombre']; ?></option>
		<?php
		}
		 ?>
		</select>
		<label>Descripcion:</label>
		<textarea name="descripcion" style="width: 100%; height: 100px; resize: none; padding: 5px; box-sizing: border-box;"><?php echo $actividad['descripcion']; ?></textarea><br><br>
		<label>Envio de tarea</label><br><br>
		<input type="checkbox" name="chk" id="chk" style="width: 10px; height: 10px;" <?php if ($actividad['tipo'] == 1) {
			echo "checked";
		} ?>>
		<label for="chk">Permitir al usuario enviar la actividad por medio de la plataforma</label><br>
		<label>Fecha de finalizacion</label>
		<input type="date" name="date" value="<?php echo $actividad['fecha_fin'] ?>">
		<?php 
			if (!isset($_REQUEST['actividadid'])) {
		?>
		<label>Adjuntar archivo:</label>
		<input type="file" style="padding-bottom: 30px;" name="archivo">
		
		<?php
			}
		 ?>
		<input type="submit" class="button-submit-green">
	</form>

</div>
<?php
	break;
	case 5:
?>
	<div class="form">
		<form action="validar/newtaskupload.php?tipo=<?php echo $tipo ?>&actividadid=<?php echo $actividadid ?>" method="POST">
			<?php 
				$st = $conexion -> prepare("SELECT * FROM actividades WHERE id='$actividadid'");
				$st -> execute();
				$actividad = $st -> fetch();
			 ?>
			<h2>Desea eliminar la actividad <?php echo $actividad['nombre'] ?>?</h2>
			<input type="submit" class="button-submit-green" value="SI">
		</form>
	</div>
<?php
	break;
}

 ?>