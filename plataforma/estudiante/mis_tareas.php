<?php 
session_start();
include 'permisos_estudiante.php';
include '../conexion.php';
$st = $conexion -> prepare("SELECT * FROM datos_institucion");
$st -> execute();
$fila = $st -> fetch();


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador inicial</title>
	<link rel="stylesheet" href="../styles/main_app.css">
	<link rel="image/x-icon" href="../Finallogo.png">
	<link href='calendarioplus/core/main.css' rel='stylesheet' />
<link href='calendarioplus/daygrid/main.css' rel='stylesheet' />
<script src='calendarioplus/core/main.js'></script>
<script src='calendarioplus/interaction/main.js'></script>
<script src='calendarioplus/daygrid/main.js'></script>
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '2019-09-21',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        /*{
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-09-28'
        },*/
        <?php 
        $estudiante = $_SESSION['id'];
        $sql = "SELECT * FROM relestudiantesalon WHERE estudiante='$estudiante'";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        $salon = $st -> fetch();
        $salonid = $salon['salon'];
        $sql = "SELECT * FROM cursos WHERE salon = '$salonid'";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        while ($cursos = $st -> fetch()) {
        	$cursoid = $cursos['id'];
        	$cursomateria = $cursos['materia'];
        	$st2 = $conexion -> prepare("SELECT * FROM materias WHERE id='$cursomateria'");
        	$st2 -> execute();
        	$materias = $st2 -> fetch();
        	$st2 = $conexion -> prepare("SELECT * FROM actividades WHERE cursos ='$cursoid'");
        	$st2 -> execute();
        	while($actividades = $st2 -> fetch()){
?>
		{
			title: '<?php echo $materias['nombre']; ?>',
			url: 'curso.php?id=<?php echo $cursoid ?>',
			start: '<?php echo $actividades['fecha_fin'] ?>'
		},
<?php
        	}
        }
        

         ?>
      ]
    });

    calendar.render();
  });

</script>
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
				<div id="calendar"></div>
				<style>
  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
			</div>
		</div>
	</div>
<script type="text/javascript" src="botones.js"></script>
</body>
</html>