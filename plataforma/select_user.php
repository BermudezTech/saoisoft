<?php 

session_start();

if ($_SESSION['tipo_usuario'] == 0) {
	header('Location: admin/');
}else if($_SESSION['tipo_usuario'] == 1){
	header('Location:estudiante/');
}else if($_SESSION['tipo_usuario']==2){
	header('Location:profesor/');
}else if($_SESSION['tipo_usuario']==3){
	header('Location:padre/');
}

 ?>