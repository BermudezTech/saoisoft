<?php 
session_start();
include 'permisos_estudiante.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();
//include 'permisos_admin.php';
$id = $_SESSION['id'];
$st2 = $conexion -> prepare("SELECT * FROM usuario WHERE id='$id'");
$st2 -> execute();
$usuario = $st2 -> fetch();
if (password_verify($id, $usuario['pass'])) {
?>
<div class="modal7" id="modal7" style="display: inline-flex;">
					<div class="contenidomodal7">
						<h2>Bienvenido usuario</h2><br>
						<h3>Hemos detectado que su usuario y contraseña son iguales, por seguridad, cree una nueva contraseña para su cuenta:</h3>
						<div class="iframe">
							<iframe src="changepass.php?usuario=<?php echo $id ?>&pass=<?php echo $usuario['pass'] ?>" frameborder="1" style="width: 100%; height: 120%; display: block;" id="myframe"></iframe>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
							<script>
								$('#myframe').contents().find("body")
 	.append($("<style type='text/css'>  .header,.aside{display:none;}  </style>"));
   		
							</script>
						</div>
					</div>
						<br><br><br>
					</div>
							
				</div>
<?php
}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador inicial</title>
	<link rel="stylesheet" href="../styles/main_app.css">
	<link rel="image/x-icon" href="../Finallogo.png">
</head>
<style type="text/css">
	 .header{
	 	background-color: <?php echo $fila['color1'] ?>;
	 }
	 .aside{
	 	background-color: <?php echo $fila['color2'] ?>;
	 }
	 .aside hr{
	 	color: <?php echo $fila['color3'] ?>;
	 }
	 .header .separador{
		color: <?php echo $fila['color3'] ?>;
	}
	.span{
		background-color: <?php echo $fila['color3'] ?>;
	}
</style>
<body>
	<div class="contenedor">
		<div class="header">
			<div class="izq">
				<?php include 'search_bar.php' ?>
			</div>
			
			<div class="botones">
				<?php include 'header.php' ?>
			</div>
		</div>
		<div class="body">
			<div class="aside">
				<?php include 'aside.php' ?>
			</div>
			<div class="main">
				<div class="menu" id="menu">
					<?php include 'menu.php' ?>
				</div>
				<!--

				CONTENIDO

				-->
				<h3>Bienvenido estudiante. Para acceder a sus funciones puede hacer click <a href="funciones.php">aqui</a></h3><br>
				<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 

  <!-- include libraries BS -->
  <link rel="stylesheet" href="bootstrap.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.js"></script> 

  <!-- include summernote -->
  <link rel="stylesheet" href="../dist/summernote-bs4.css">
  <script type="text/javascript" src="../dist/summernote-bs4.js"></script>
<style>
  #btn{
    cursor: pointer;
  }
  input{
    width: 100%;
  }
  .label{
    font-weight: bold;
  }
</style>
<script type="text/javascript">
    $(function() {
      $('.summernote').summernote({
        height: 200,
        placeholder: 'Escribe algo interesante...'
      });
    });
  </script>
  <form action="validar/nueva_publicacion.php" method="POST">
<div class="textarea">
	<textarea name="text" class="summernote" id="contents" title="Contents"></textarea>
	<div class="opciones"><select name="materia"><option value="0">Seleccione la materia</option>
<?php 
$iduser = $_SESSION['id'];
$sq = $conexion -> prepare("SELECT * FROM relestudiantesalon WHERE estudiante = '$iduser'");
$sq -> execute();
$relest = $sq -> fetch();
$cursoest = $relest['salon'];
$sql = "SELECT * FROM cursos WHERE salon = '$cursoest'";
$sq = $conexion -> prepare($sql);
$sq -> execute();
while ($cursos = $sq -> fetch()) {
?>
<option value="<?php echo $cursos['id'] ?>"><?php echo $cursos['nombre'] ?></option>
<?php
}
 ?>
	</select><input type="submit" value="Publicar"></div>
</div>
<style type="text/css">
	.textarea{
		border: 1px solid #a9a9a9;
		padding: 1px;
		box-sizing: border-box;
	}
	.opciones{
		width: 100%;
		height: 30px;
		display: flex;
		justify-content: space-between;
	}
	.opciones select{
		width: 1000px;
	}
	.opciones input[type=submit]{
		width: 30%;
		border: none;
		padding: 5px;
		box-sizing: border-box;
		color: #ffffff;
		background-color: <?php echo $fila['color3'] ?>;
		font-weight: bold;
		cursor: pointer;
	}
	.opciones input[type=submit]:hover{
		background-image: linear-gradient(rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.3));
	}
	textarea{
		width: 100%;
		height: 200px;
		padding: 20px;
		box-sizing: border-box;
		resize: none;
	}
</style>
</form>
<style type="text/css">
	.usuarioinfo{
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.usuarioinfo h4{
		color: #17346A;
	}
	.infoplus{
		margin-left: 30px;
	}
	.leftinfo{
		display: flex;
	}
	.hora-fecha{
		color: #B3B3B3;
		width: 20%;
		font-size: 14px;
	}
</style>
<?php 
$id = $_SESSION['id'];
$sq = $conexion -> prepare("SELECT * FROM relestudiantesalon WHERE estudiante='$id'");
$sq -> execute();
$salon = $sq -> fetch();
$salon = $salon['salon'];
$sq2 = $conexion -> prepare("SELECT * FROM cursos WHERE salon='$salon'");
$sq2 -> execute();
$contador = 0;
while($cursos = $sq2 -> fetch()){
	$curso[$contador] = $cursos['id'];
	$contador++;
}
for ($i=0; $i <$contador ; $i++) { 
	# code...

$sq = $conexion -> prepare("SELECT * FROM publicaciones WHERE materia='$curso[$i]' ORDER BY id DESC ");
$sq -> execute();
while ($publicacion = $sq -> fetch()) {
	$idpublicador = $publicacion['usuario'];
	$materia = $publicacion['materia'];
	$sq2 = $conexion -> prepare("SELECT * FROM usuario WHERE id = '$idpublicador'");
	$sq2 -> execute();
	$usuario = $sq2 -> fetch();
	$sq3 = $conexion -> prepare("SELECT * FROM cursos WHERE id= '$materia'");
	$sq3 -> execute();
	$materia = $sq3 -> fetch();
?>
<hr style="border: 1px solid <?php echo $fila['color3'] ?>">
<div class="usuarioinfo">
	<div class="leftinfo">
		<img src="../<?php echo $usuario['foto'] ?>" width="5%">
		<div class="infoplus">
			<h4><a href="user_profile.php?id=<?php echo $usuario['id'] ?>"><?php echo $usuario['nombres']." ".$usuario['apellidos'] ?></a></h4>
			<h4><?php echo $materia['nombre'] ?></h4>
		</div>		
	</div>
	<div class="hora-fecha">
		<?php echo $publicacion['date'] ?>
	</div>
</div>
<br>
<?php echo $publicacion['publicacion'] ?>
<!--<?php //color
/*$iduser = $_SESSION['id'];
$color = $conexion -> prepare("SELECT * FROM rellikesdislikes");
$color -> execute();
while ($colorlike= $color -> fetch()) {
	if ($colorlike['likes'] == $iduser && $colorlike['publicacion'] == $publicacion['id']) {
		$colors = $fila['color3'];
	}else{
		$colors = "#ffffff";
	}
}

 ?>
 <button class="like icon" id="like like<?php echo $publicacion['id'] ?>" onclick="likes(<?php echo $publicacion['id']; ?>)" type="button" style="background-color: <?php echo $colors; ?>"><img src="../icons/pulgarup.png"> <l id="likenumber"><?php echo $publicacion['likes'] ?></l></button>
 <button class="like icon" id="dislike" onclick="dislikes()"><img src="../icons/pulgardown.png"> <?php echo $publicacion['dislikes']*/ ?></button>
 -->
<?php
}
}
 ?>

			</div>
		</div>
	</div>
<!--<script type="text/javascript">
function convertHex(hex,opacity){
    hex = hex.replace('#','');
    r = parseInt(hex.substring(0,2), 16);
    g = parseInt(hex.substring(2,4), 16);
    b = parseInt(hex.substring(4,6), 16);

    result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
    return result;
}
function likes(id){
	var div = document.getElementById('likenumber').innerHTML;
	$.ajax({
		url: 'validar/newlike.php',
		type: "POST",
		data: { id:id},
		success: function(response){
			document.getElementById('likenumber').innerHTML = response;
			if (div < response) {
				console.log("Nuevo like");
				
			}else{
				console.log("Bye like");
			}
		}
	});
}
</script>-->
<style type="text/css">
	.like{
		margin-top: 20px;
		margin-right: 20px;
		border: none;
		cursor: pointer;
		background-color: transparent;
		font-size: 20px;
		padding: 5px;
		box-sizing: border-box;
		border-radius: 20px;

	}
</style>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>