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
				<button onclick="clases()"><i class="icon-materia"></i> Materias</button>
				<button onclick="nuevo_correo()"><i class="icon-mail"></i> Enviar correo</button>
				<button onclick="revisar_tareas()"><i class="icon-task"></i> Revisar tareas/eventos estudiante</button>

<script type="text/javascript" src="../icons/icons.js"></script>