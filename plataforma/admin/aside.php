<img src="../<?php echo $_SESSION['foto'] ?>" style="width: 100%;">
<h4><?php echo $_SESSION['nombres']." ".$_SESSION['apellidos']; ?></h4><br>
				<hr>
				<h4>Yo</h4>
				<button onclick="perfil()"><i class="icon-profile"></i> Mi perfil</button>
				<button onclick="mi_info()"><i class="icon-info"></i> Modificar mi informacion</button>
				<button onclick="changepass()"><i class="icon-key"></i> Cambiar mi contraseña</button>
				<!--<button><i class="icon-manual"></i> Manual de usuario</button>-->
				<hr>
				<h4>Funciones</h4>
				<button onclick="nuevo_estudiante()"><i class="icon-toga"></i> Nuevo estudiante</button>
				<button onclick="nuevo_profesor()"><i class="icon-toga"></i> Nuevo profesor</button>
				<button onclick="nueva_materia()"><i class="icon-toga"></i> Nueva materia</button>
				<button onclick="materia_curso()"><i class="icon-toga"></i> Asignar materia a curso</button>
				<button onclick="materia_profesor()"><i class="icon-toga"></i> Asignar materia a profesor</button>
				<button onclick="nuevo_curso()"><i class="icon-toga"></i> Nuevo curso</button>
				<button onclick="horario()"><i class="icon-horario"></i> Asignar horario</button>
				<button onclick="nuevo_padre()"><i class="icon-toga"></i> Nuevo padre/madre de familia</button>
				<button onclick="nuevo_correo()"><i class="icon-mail"></i> Enviar correos a usuarios</button>
				<button onclick="ver_dbs()"><i class="icon-dbs"></i> Ver todas las bases de datos</button>
				<hr>
				<h4>Pagina principal</h4>
				<button onclick="modificar_pagina()"><i class="icon-lapiz"></i> Modificar pagina</button>
				<!--<button><i class="icon-setup"></i> Opciones de la plataforma</button>-->

<script type="text/javascript" src="../icons/icons.js"></script>