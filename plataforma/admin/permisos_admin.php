<?php 

session_start();
if ($_SESSION['tipo_usuario'] == 0) {
	//echo "Eres administrador, tienes permiso para entrar a esta pagina...";
}else{
	echo "No eres administrador, no tienes permiso de entrar a esta pagina";
	die();
}

 ?>