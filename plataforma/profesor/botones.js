function inicio(){
	location.href = "index.php";
}

function funciones(){
	location.href = "funciones.php";
}

function menu_show(){
	document.getElementById('menu').style.display = 'block';
	document.getElementById('menu_btn1').style.display = 'none';
	document.getElementById('menu_btn2').style.display = 'inline';
}

function menu_hide(){
	document.getElementById('menu').style.display = 'none';
	document.getElementById('menu_btn1').style.display = 'inline';
	document.getElementById('menu_btn2').style.display = 'none';
}

function perfil(){
	location.href = "mi_perfil.php";
}

function clases(){
	location.href = "mis_clases.php";
}

function mi_info(){
	location.href = "mi_info.php";
}

function nuevo_correo(){
	location.href = "newmail.php";
}

function seleccionar_usuario(){
	document.getElementById('modal6').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_usuarios.php',
		success: function(response){
			document.getElementById('datos6').innerHTML = response;

		}
	});
	$('input[name=query6]').focus();
}

function busqueda6(){
	var busqueda = document.getElementById('query6').value;
	console.log(busqueda);
	prueba6(busqueda);
}

function prueba6(usuario){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_usuarios.php',
		type: "POST",
		data: { usuario: usuario},
		success: function(response){
			document.getElementById('datos6').innerHTML = response;
		}
	});
}

function modalvalidar6(){
	document.getElementById('modal6').style.display = 'none';
   	var radioValue = $("input[name='usuarioradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('usuariog').value = radioValue;
    }
}

function cerrar6(){
	modalvalidar6();
	document.getElementById('modal6').style.display = 'none';
}

function recargar6(){
	$.ajax({
		url: 'validar/mostrar_usuarios.php',
		success: function(response){
			document.getElementById('datos6').innerHTML = response;

		}
	});
}

function cerrarSesion(){
	location.href = "../cerrar_sesion.php";
}

function newactivity(){
	location.href = "newactivity.php";	
}

function changepass(){
	location.href = "changepass.php";
}