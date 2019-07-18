<?php
	include '../conexion.php';
	$stm = $conexion->prepare("DROP DATABASE saoisoft");
	$stm->execute();
	$stm = $conexion->prepare("CREATE DATABASE saoisoft");
	$stm->execute();
	header('Location: delete_file.php');
?>
