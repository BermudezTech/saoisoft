<?php 
include '../../conexion.php';
session_start();
$publicacion = $_POST['id'];
$iduser = $_SESSION['id'];
$estado = 0;
$sq2 = $conexion -> prepare("SELECT * FROM rellikesdislikes WHERE publicacion='$publicacion'");
$sq2 -> execute();
while ($prueba = $sq2 -> fetch()) {
	if ($prueba['likes'] == $iduser) {
		$estado = 1;
	}else if ($prueba['dislikes'] == $iduser) {
		$estado = 2;
	}
}
if ($estado == 0) {
	$id = $iduser;
	$sq = $conexion -> prepare("INSERT INTO rellikesdislikes(publicacion, likes) VALUES ('$publicacion','$id')");
	$sq -> execute();
	$sq = $conexion -> prepare("SELECT * FROM publicaciones WHERE id='$publicacion'");
	$sq -> execute();
	$numero = $sq -> fetch();
	$numero = $numero['likes'] + 1;
	$sq = $conexion -> prepare("UPDATE publicaciones SET likes='$numero' WHERE id = '$publicacion'");
	$sq -> execute();
	echo $numero;
}else if ($estado == 1) {
	$id = $iduser;
	$sq = $conexion -> prepare("DELETE FROM rellikesdislikes WHERE likes='$iduser'");
	$sq -> execute();
	$sq = $conexion -> prepare("SELECT * FROM publicaciones WHERE id='$publicacion'");
	$sq -> execute();
	$numero = $sq -> fetch();
	$numero = $numero['likes'] - 1;
	$sq = $conexion -> prepare("UPDATE publicaciones SET likes='$numero' WHERE id = '$publicacion'");
	$sq -> execute();
	echo $numero;
}else if($estado == 2){
	$id = $iduser;
	$sq = $conexion -> prepare("DELETE FROM rellikesdislikes WHERE dislikes='$iduser'");
	$sq -> execute();
	$sq = $conexion -> prepare("SELECT * FROM publicaciones WHERE id='$publicacion'");
	$sq -> execute();
	$numero = $sq -> fetch();
	$numero2 = $numero['dislikes'] -1;
	$numero = $numero['likes'] + 1;
	$sq = $conexion -> prepare("UPDATE publicaciones SET likes='$numero', dislikes='$numero2' WHERE id = '$publicacion'");
	$sq -> execute();
	echo $numero;
}

 ?>