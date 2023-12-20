<?php

include '../../conexion.php';
$number = $_POST['number'];
$curso = $_POST['curso'];
$contador = 0;
for ($i = 1; $i <= $number; $i++) {
    $id = "id" . $i;
    $id = $_POST[$id];
    $hora = "hora" . $i;
    $horainput = $_POST[$hora];
    if ($horainput == "") {
        $location = 'Location: ../horario.php?curso=' . $curso;
        header($location);
        die();
    }
    $h = explode(":", $horainput);
    $h = $h[0];
    $t = explode(" ", $horainput);
    $t = $t[1];
    if ($h == 12) {
        $h = 0;
    } elseif ($h > 9) {
        $h = 9 . $h;
    }
    $h = $t . $h;
    $l = "lunes" . $i;
    $lunes = $_POST[$l];
    $ma = "martes" . $i;
    $martes = $_POST[$ma];
    $mi = "miercoles" . $i;
    $miercoles = $_POST[$mi];
    $j = "jueves" . $i;
    $jueves = $_POST[$j];
    $v = "viernes" . $i;
    $viernes = $_POST[$v];
    if ($lunes == 0) {
        $lunes = "NULL";
    }
    if ($martes == 0) {
        $martes = "NULL";
    }
    if ($miercoles == 0) {
        $miercoles = "NULL";
    }
    if ($jueves == 0) {
        $jueves = "NULL";
    }
    if ($viernes == 0) {
        $viernes = "NULL";
    }
    $st = $conexion -> prepare("SELECT * FROM horario WHERE salon='$curso'");
    $st -> execute();
    while ($fila = $st -> fetch()) {
        if ($fila['id'] == $id) {
            $contador = 1;
            $idf = $fila['id'];
            break;
        } else {
            $contador = 0;
        }
    }
    //echo "<br>" .$id."-".$idf."-".$contador."<br>";
    if ($contador > 0) {
        $query = "UPDATE horario SET hora='$horainput', lunes = '$lunes', martes='$martes', miercoles='$miercoles', jueves = '$jueves', viernes = '$viernes', h = '$h' WHERE id='$id' && salon='$curso'";
    } else {
        $query = "INSERT INTO horario(salon,hora, lunes, martes, miercoles, jueves, viernes, h) VALUES ($curso,'$horainput',$lunes,$martes,$miercoles,$jueves,$viernes, '$h')";
    }
    echo "<br>";
    echo $query;
    $st2 = $conexion -> prepare($query);
    $st2 -> execute();
}
$location = 'Location: ../horario.php?curso=' . $curso;
$location = '../horario.php?curso=' . $curso;
// header($location);
echo "<meta http-equiv='refresh' content='0; url=$location'>";
