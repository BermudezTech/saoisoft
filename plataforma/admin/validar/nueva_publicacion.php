<?php

session_start();
$text = $_POST['text'];
$materia = $_POST['materia'];
$id = $_SESSION['id'];
// echo $text;
include '../../conexion.php';
$sql = "INSERT INTO publicaciones(usuario, publicacion, materia) VALUES ($id,'$text', $materia)";
// echo $sql;
$sq = $conexion -> prepare($sql);
$sq -> execute();

header('Location: ../index.php');
