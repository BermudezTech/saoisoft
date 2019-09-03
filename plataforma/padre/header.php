<button onclick="perfil()"><?php echo $_SESSION['nombres']." ".$_SESSION['apellidos']; ?></button>
				<span class="separador">|</span>
				<button onclick="inicio()">Inicio</button>
				<span class="separador">|</span>
				<button onclick="funciones()">Funciones</button>
				<span class="separador">|</span>
				<button>🔔</button>
				<span class="separador">|</span>
				<button onclick="menu_show()" id="menu_btn1">▼</button>
				<button onclick="menu_hide()" id="menu_btn2">▲</button>
				<span class="espacio">    </span>