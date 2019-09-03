<?php 

if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 3) {
	//echo "Eres administrador, tienes permiso para entrar a esta pagina...";
}else{
	echo "<h1>No tiene permiso de entrar a esta pagina.</h1><h4>Si aun no a ingresado de click <a href='../'>aqui</a><br>Si usted no es padre/madre, no puede acceder a esta pagina<br>Si usted es padre/madre y no puede ver el contenido, porfavor contactese con el padre/madre del portal o intente borrar el cache de su navegador</h4>";
	die();
}

 ?>