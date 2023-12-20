<?php

include '../../conexion.php';
$name = $_POST['name'];
$curso = $_POST['curso'];
$descripcion = $_POST['descripcion'];
$actividadid = $_REQUEST['actividadid'];
$tipo = $_REQUEST['tipo'];
$date = $_POST['date'];
switch ($tipo) {
    case 1:
        $name = $_POST['name'];
        $curso = $_POST['curso'];
        $date = $_POST['date'];
        $trys = $_POST['trys'];
        $hours = $_POST['hours'];
        $minutes = $_POST['minutes'];
        $maxscore = $_POST['maxscore'];
        $sq = $conexion -> prepare("INSERT INTO exam(nombre, curso, fecha, intentos, horas, minutos,maxscore) VALUES ('$name','$curso','$date','$trys','$hours','$minutes','$maxscore')");
        $sq -> execute();
        header('Location: ../nuevo_examen.php');
        die();
        break;
    case 2:
        if (isset($_POST['chk'])) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }
        $st = $conexion -> prepare("SELECT * FROM actividades");
        $st -> execute();
        while ($actividades = $st -> fetch()) {
            $contador = $actividades['id'];
            $contador++;
        }
        echo $contador;

        $extension = end(explode(".", $_FILES['archivo']['name']));
        $carpeta_destino = "../../usuarios/actividades";
        move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . "/" . $contador . "." . $extension);
        $archivo = "usuarios/actividades/" . $contador . "." . $extension;
        if ($extension == "") {
            $archivo = null;
        }
        echo $carpeta_destino . "/" . $contador . "." . $extension;

        $st = $conexion -> prepare("INSERT INTO actividades(nombre, descripcion, tipo, adjunto, cursos, fecha_fin) VALUES ('$name','$descripcion',$tipo,'$archivo', '$curso','$date')");
        $st -> execute();
        break;
    case 4:
        if (isset($_POST['chk'])) {
            $tipo = 1;
        } else {
            $tipo = 2;
        }
        $query = "UPDATE actividades SET nombre='$name', descripcion='$descripcion', tipo = '$tipo', cursos = '$curso', fecha_fin='$date' WHERE id='$actividadid'";
        $st = $conexion -> prepare($query);
        $st -> execute();
        echo $query;
        break;
    case 3:
        $titulo = $_POST['titulo'];
        $extension = end(explode(".", $_FILES['archivo']['name']));
        if ($extension != '') {

            $st = $conexion -> prepare("SELECT * FROM multimedia");
            $st -> execute();
            while ($actividades = $st -> fetch()) {
                $contador = $actividades['id'];
                $contador++;
            }

            $carpeta_destino = "../../usuarios/multimedia";
            move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . "/" . $contador . "." . $extension);
            $url = "usuarios/multimedia/" . $contador . "." . $extension;
        } else {
            echo "No se ha subido ningun archivo";
            $url = $_POST['url'];
            echo $url;
        }
        $sql = "INSERT INTO multimedia(titulo,url, curso) VALUES ('$titulo','$url',$curso)";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        echo "<br>" . $sql;
        break;
    case 5:
        echo $actividadid;
        $st = $conexion -> prepare("SELECT * FROM actividades WHERE id='$actividadid'");
        $st -> execute();
        $curso = $st -> fetch();
        $curso = $curso['cursos'];
        echo $curso . "hello";
        $query = "DELETE FROM resp_actividad WHERE actividades='$actividadid'";
        $st = $conexion -> prepare($query);
        $st -> execute();
        $query = "DELETE FROM calificaciones WHERE actividad='$actividadid'";
        $st = $conexion -> prepare($query);
        $st -> execute();
        $query = "DELETE FROM actividades WHERE id='$actividadid'";
        $st = $conexion -> prepare($query);
        $st -> execute();
        echo $query;
        break;
    case 6:
        $st = $conexion -> prepare("SELECT * FROM multimedia WHERE id='$actividadid'");
        $st -> execute();
        $curso = $st -> fetch();
        $curso = $curso['curso'];
        $query = "DELETE FROM multimedia WHERE id='$actividadid'";
        $st = $conexion -> prepare($query);
        $st -> execute();
        break;
    case 7:
        $sql = "SELECT * FROM question WHERE examen = '$actividadid'";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        echo $sql . ";<br>";
        while ($preguntas = $st -> fetch()) {
            $pregunta = $preguntas['id'];
            $sql = "DELETE FROM answer WHERE question='$pregunta'";
            $st2 = $conexion -> prepare($sql);
            $st2 -> execute();
            echo $sql . ";<br>";
        }
        $sql = "DELETE FROM question WHERE examen = '$actividadid'";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        echo $sql . ";<br>";

        $sql = "SELECT * FROM exam WHERE id='$actividadid'";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        $examen = $st -> fetch();
        $curso = $examen['curso'];
        $sql = "DELETE FROM exam WHERE id='$actividadid'";
        $st = $conexion -> prepare($sql);
        $st -> execute();
        echo $sql . ";<br>";
        break;
}
// $Location = 'Location: ../curso.php?id='.$curso;
$location = '../curso.php?id=' . $curso;
// header($Location);
echo "<meta http-equiv='refresh' content='0; url=$location'>";
