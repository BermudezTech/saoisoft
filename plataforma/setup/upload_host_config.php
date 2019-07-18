<?php 

	$host = $_POST['host'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$database = $_POST['database'];

	$file = '../conexion.php';
	if ($archivo = fopen($file, "a")) {
		$mensaje = "<?php 
		"."$"."conexion=new PDO('mysql:host=".$host.";dbname=".$database."','".$username."','".$password."');
		"."$"."conexion->exec('set names utf8');
		?>";
		$crear=fwrite($archivo, $mensaje);
		if ($crear) {
			echo "Se ha ejecutado correctamente";
		}else{
			echo "Hubo un error en la ejecucion.";
		}
		fclose($archivo);
		header('Location: create_tables.php');
	}
?>