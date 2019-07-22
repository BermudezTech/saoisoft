<style type="text/css">
	a{
		text-decoration: none;
	}
</style>
<?php 
session_start();
include '../../conexion.php';
if (!isset($_POST['radio'])) {
	echo "Por favor seleccione una base de datos para buscar";
	die();
}
$numero = $_POST['radio'];
$dato = $_POST['dato'];
switch ($numero) {
	//CASO 1
	case '1':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM cursos WHERE nombre LIKE '%".$dato."%' || id LIKE '%".$dato."%' || salon LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>nombre</th>
		<th>materia</th>
		<th>salon</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['nombre'] ?></td>
		<td><?php echo $consulta['materia'] ?></td>
		<td><?php echo $consulta['salon'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 2
	case '2':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM datos_institucion");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>id</th>
		<th>nombre</th>
		<th>escudo</th>
		<th>color1</th>
		<th>color2</th>
		<th>color3</th>
		<th>descripcion</th>
		<th>email</th>
		<th>telefono</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['nombre'] ?></td>
		<td><img src="data:image/jpg;base64,<?php echo base64_encode($consulta['escudo']); ?>" width="100px"></td>
		<td><?php echo $consulta['color1'] ?></td>
		<td><?php echo $consulta['color2'] ?></td>
		<td><?php echo $consulta['color3'] ?></td>
		<td><?php echo $consulta['descripcion'] ?></td>
		<td><?php echo $consulta['email'] ?></td>
		<td><?php echo $consulta['telefono'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 3
	case '3':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM materias WHERE nombre LIKE '%".$dato."%' || id LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>nombre</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['nombre'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 4
	case '4':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM relestudiantepadre WHERE estudiante LIKE '%".$dato."%' || padre LIKE '%".$dato."%' || madre LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>estudiante</th>
		<th>padre</th>
		<th>madre</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['estudiante'] ?></td>
		<td><?php echo $consulta['padre'] ?></td>
		<td><?php echo $consulta['madre'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 5
	case '5':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM relestudiantesalon WHERE estudiante LIKE '%".$dato."%' || salon LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>estudiante</th>
		<th>salon</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['estudiante'] ?></td>
		<td><?php echo $consulta['salon'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 6
	case '6':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM relprofesorcursos WHERE profesor LIKE '%".$dato."%' || cursos LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>profesor</th>
		<th>cursos</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['profesor'] ?></td>
		<td><?php echo $consulta['cursos'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 7
	case '7':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM salon WHERE nombre LIKE '%".$dato."%' || id LIKE '%".$dato."%' || grado LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>nombre</th>
		<th>grado</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['nombre'] ?></td>
		<td><?php echo $consulta['grado'] ?></td>
	</tr>
<?php
		}
	echo " </table>";
	break;
	//CASO 8
	case '8':
		echo "<br>";
		$sq = $conexion -> prepare("SELECT * FROM usuario WHERE nombres LIKE '%".$dato."%' || apellidos LIKE '%".$dato."%' || id LIKE '%".$dato."%'");
		$sq -> execute();
?>
<table>
	<tr>
		<th>✏️</th>
		<th>🗑️</th>
		<th>id</th>
		<th>nombres</th>
		<th>apellidos</th>
		<th>email</th>
		<th>tipo_usuario</th>
		<th>lugar_nacimiento</th>
		<th>fecha_nacimiento</th>
		<th>direccion</th>
		<th>telefono</th>
		<th>tipo_documento</th>
	</tr>
<?php
		while ($consulta = $sq -> fetch()) {
?>
	
		<?php 
		if ($consulta['id'] == $_SESSION['id']) {
	?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td> </td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['nombres'] ?></td>
		<td><?php echo $consulta['apellidos'] ?></td>
		<td><?php echo $consulta['email'] ?></td>
		<td><?php echo $consulta['tipo_usuario'] ?></td>
		<td><?php echo $consulta['lugar_nacimiento'] ?></td>
		<td><?php echo $consulta['fecha_nacimiento'] ?></td>
		<td><?php echo $consulta['direccion'] ?></td>
		<td><?php echo $consulta['telefono'] ?></td>
		<td><?php echo $consulta['tipo_documento'] ?></td>
	</tr>
	<?php
		}else{

		 ?>
	<tr>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=1">✏️</a></td>
		<td><a href="editar_dbs.php?radio=<?php echo $numero ?>&id=<?php echo $consulta['id'] ?>&operacion=2">🗑️</a></td>
		<td><?php echo $consulta['id'] ?></td>
		<td><?php echo $consulta['nombres'] ?></td>
		<td><?php echo $consulta['apellidos'] ?></td>
		<td><?php echo $consulta['email'] ?></td>
		<td><?php echo $consulta['tipo_usuario'] ?></td>
		<td><?php echo $consulta['lugar_nacimiento'] ?></td>
		<td><?php echo $consulta['fecha_nacimiento'] ?></td>
		<td><?php echo $consulta['direccion'] ?></td>
		<td><?php echo $consulta['telefono'] ?></td>
		<td><?php echo $consulta['tipo_documento'] ?></td>
	</tr>
<?php
}
		}
	echo " </table>";
	break;
}

 ?>

 <style type="text/css">
 	table{
 		width: 100%;
 		border-collapse: collapse;
 	}
 	td, th{
 		border: 1px solid #dddddd;
 		text-align: left;
 		padding: 8px;
 		box-sizing: border-box;
 	}
 	tr:nth-child(even){
 		background-color: #dddddd;
 	}
 </style>