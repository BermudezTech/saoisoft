<?php


$color1 = $_POST['color1'];
$color2 = $_POST['color2'];
$color3 = $_POST['color3'];
include 'color_table.php';
include '../../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();

if ($color1 == '#ffffff') {
    $color1 = $fila['color1'];
}
if ($color2 == '#ffffff') {
    $color2 = $fila['color2'];
}
if ($color3 == '#ffffff') {
    $color3 = $fila['color3'];
}
// echo $color1;
// echo $color2;
// echo $color3;
$sq = $conexion -> prepare("UPDATE datos_institucion SET color1 = '$color1',color2 = '$color2',color3 = '$color3' WHERE id = '1'");
$sq -> execute();
$text = $_POST['text'];
$sq = $conexion -> prepare("UPDATE datos_institucion SET main = '$text' WHERE id = '1'");
$sq -> execute();
header('Location: ../modificar_pagina.php');
// echo '<meta http-equiv="refresh" content="0; url=../modificar_pagina.php">';
