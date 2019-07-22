<?php 

include '../conexion.php';

//Datos institucion
$nombre = $_POST['nombre'];
$cargarEscudo = ($_FILES['escudo']['tmp_name']);
$escudo = addslashes(file_get_contents($cargarEscudo));
$color1 = $_POST['color1'];
$color2 = $_POST['color2'];
$color3 = $_POST['color3'];
$direccion = $_POST['direccion'];
$email_ins = $_POST['email_ins'];
$telefono_ins = $_POST['telefono_ins'];
//Datos administrador
$tipo_documento = $_POST['tipo_documento'];
$id = $_POST['id'];
$nombres_admin = $_POST['nombres_admin'];
$apellidos_admin = $_POST['apellidos_admin'];
$email_admin = $_POST['email_admin'];
$pass_admin = $_POST['pass_admin'];
$direccion_admin = $_POST['direccion_admin'];
$telefono_admin = $_POST['telefono_admin'];
$date_admin = $_POST['date_admin'];
$cargarFoto = ($_FILES['foto_admin']['tmp_name']);
$pass_admin = password_hash($pass_admin, PASSWORD_DEFAULT);
$folder = "../usuarios/";
mkdir($folder);
$carpeta_destino =$folder."/fotos";
$carpeta2 = $folder ."/actividades";
mkdir($carpeta2);
mkdir($carpeta_destino);
move_uploaded_file($_FILES['foto_admin']['tmp_name'], $carpeta_destino."/".$id.".jpg");
$foto_admin = "usuarios/fotos/".$id.".jpg";

include 'colortable.php';
$sql = "INSERT INTO datos_institucion(escudo, nombre, color1, color2, color3, email, telefono) VALUES ('$escudo', '$nombre', '$color1', '$color2', '$color3', '$email_ins', '$telefono_ins')";
//echo $sql;
$sq = $conexion -> prepare($sql);
$sq->execute();

$sq2 = $conexion->prepare("INSERT INTO tipo_usuario(nombre) VALUES('Administrador')");
$sq2 -> execute();

$sq3 = $conexion->prepare("INSERT INTO usuario(id, nombres, apellidos, email, tipo_usuario, pass, lugar_nacimiento, fecha_nacimiento, direccion, telefono, foto, tipo_documento) VALUES('$id','$nombres_admin','$apellidos_admin', '$email_admin',0, '$pass_admin', NULL, '$date_admin', '$direccion_admin', '$telefono_admin', '$foto_admin', '$tipo_documento')");
$sq3 -> execute();

$sq4 = $conexion->prepare("INSERT INTO tipo_usuario(id, nombre) VALUES(1,'Estudiante')");
$sq4 -> execute();
$sq5 = $conexion->prepare("INSERT INTO tipo_usuario(id, nombre) VALUES(2,'Profesor')");
$sq5 -> execute();
$sq6 = $conexion->prepare("INSERT INTO tipo_usuario(id, nombre) VALUES(3,'Padre de familia')");
$sq6 -> execute();
$sq7 = $conexion -> prepare("
	INSERT INTO grado(id,nombre) VALUES (12, 'Pre-jardin');
	INSERT INTO grado(id,nombre) VALUES (13, 'Jardin');
	INSERT INTO grado(id,nombre) VALUES (14, 'Transicion');
	INSERT INTO grado(id,nombre) VALUES (1, 'Primero');
	INSERT INTO grado(id,nombre) VALUES (2, 'Segundo');
	INSERT INTO grado(id,nombre) VALUES (3, 'Tercero');
	INSERT INTO grado(id,nombre) VALUES (4, 'Cuarto');
	INSERT INTO grado(id,nombre) VALUES (5, 'Quinto');
	INSERT INTO grado(id,nombre) VALUES (6, 'Sexto');
	INSERT INTO grado(id,nombre) VALUES (7, 'Septimo');
	INSERT INTO grado(id,nombre) VALUES (8, 'Octavo');
	INSERT INTO grado(id,nombre) VALUES (9, 'Noveno');
	INSERT INTO grado(id,nombre) VALUES (10, 'Decimo');
	INSERT INTO grado(id,nombre) VALUES (11, 'Once');
	");
$sq7 -> execute();
header('Location: ../');
 ?>
