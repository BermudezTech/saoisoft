<?php

include 'conexion.php';
sleep(2);
$usuario = $_POST['username'];
$pass = $_POST['password'];
$estado = 0;
$busqueda = $conexion->prepare("SELECT * FROM usuario WHERE id = '$usuario'");
$busqueda->execute();
$registro = $busqueda -> fetch();
if (password_verify($pass, $registro['pass'])) {
    $estado = 1;
    $id = $registro['id'];
}
switch ($estado) {
    case 0:
        echo json_encode('error');
        break;
    case 1:
        session_start();
        echo json_encode('correcto');
        $st = $conexion -> prepare("SELECT * FROM usuario WHERE id='$id'");
        $st ->execute();
        $usuario = $st -> fetch();
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombres'] = $usuario['nombres'];
        $_SESSION['apellidos'] = $usuario['apellidos'];
        $_SESSION['foto'] = $usuario['foto'];
        $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];
        break;
}
