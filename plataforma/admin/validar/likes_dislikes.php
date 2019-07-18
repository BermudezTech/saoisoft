<?php 
include '../../conexion.php';
session_start();
$publicacion = 15;
$sq = $conexion -> prepare("SELECT * FROM rellikesdislikes WHERE publicacion = '$publicacion'");
$sq -> execute();
$rel = $sq -> fetch();
if ($rel['likes'] == $_SESSION['id']) {
	echo "like";
}else if ($rel['dislikes'] == $_SESSION['id']){
	echo "dislike";
}else{
	echo "nothing";
}

 ?>
