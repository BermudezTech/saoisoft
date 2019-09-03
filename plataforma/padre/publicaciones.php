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
$sq = $conexion -> prepare("SELECT * FROM cursos");
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
$sq = $conexion -> prepare("SELECT * FROM publicaciones WHERE usuario ='$id' ORDER BY id DESC");
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
			<h4><?php echo $usuario['nombres']." ".$usuario['apellidos'] ?></h4>
			<h4><?php echo $materia['nombre'] ?></h4>
		</div>		
	</div>
	<div class="hora-fecha">
		<?php echo $publicacion['date'] ?>
	</div>
</div>
<br>
<?php echo $publicacion['publicacion'] ?>
<?php
}

 ?>