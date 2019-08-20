function perfil(){
		location.href ="mi_perfil.php";
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
function nuevo_estudiante(){
	location.href = "nuevo_estudiante.php";
}
function cerrarSesion(){
	location.href = "../cerrar_sesion.php";
}

function inicio(){
	location.href = "index.php";	
}

function nuevo_curso(){
	location.href = "nuevo_curso.php";
}

function nueva_materia(){
	location.href = "nueva_materia.php";
}

function nuevo_correo(){
	location.href = "newmail.php";
}

function seleccionar_cursos(){
	document.getElementById('modal').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_cursos.php',
		success: function(response){
			document.getElementById('datos').innerHTML = response;

		}
	});
	$('input[name=query]').focus();
}


function seleccionar_materias(){
	document.getElementById('modal2').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_materias.php',
		success: function(response){
			document.getElementById('datos2').innerHTML = response;

		}
	});
	$('input[name=query2]').focus();	
}

function seleccionar_profesor(){
	document.getElementById('modal3').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_profesores.php',
		success: function(response){
			document.getElementById('datos3').innerHTML = response;

		}
	});
	$('input[name=query3]').focus();
}

function seleccionar_curso(){
	document.getElementById('modal4').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_curso.php',
		success: function(response){
			document.getElementById('datos4').innerHTML = response;

		}
	});
	$('input[name=query4]').focus();
}

function seleccionar_estudiantes(){
	document.getElementById('modal5').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_estudiantes.php',
		success: function(response){
			document.getElementById('datos5').innerHTML = response;

		}
	});
	$('input[name=query5]').focus();
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

function seleccionar_cursos2(){
	document.getElementById('modal7').style.display = 'inline-flex';
	$.ajax({
		url: 'validar/mostrar_cursos2.php',
		success: function(response){
			document.getElementById('datos7').innerHTML = response;

		}
	});
	$('input[name=query]').focus();
}

function modalvalidar(){
	document.getElementById('modal').style.display = 'none';
	curso = document.getElementsByClassName('curso');
	console.log(curso.length);
	cursos = "";
	value = "";
	for (var i = curso.length - 1; i >= 0; i--) {
		console.log(i);
		if (curso[i].checked == true) {
			cursos = value + curso[i].value+",";
		}
		value = cursos;
	}
	cursos = cursos + "fin";
	console.log(cursos);
   	//var radioValue = $("input[name='cursoradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    document.getElementById('curso').value = cursos;
}

function cerrar(){
	modalvalidar();
	document.getElementById('modal').style.display = 'none';
}

function modalvalidar2(){
	document.getElementById('modal2').style.display = 'none';
   	var radioValue = $("input[name='materiaradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('materia').value = radioValue;
    }
}

function cerrar2(){
	modalvalidar2();
	document.getElementById('modal2').style.display = 'none';
}

function modalvalidar3(){
	document.getElementById('modal3').style.display = 'none';
   	var radioValue = $("input[name='profesorradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('profesor').value = radioValue;
    }
}

function cerrar3(){
	modalvalidar3();
	document.getElementById('modal3').style.display = 'none';
}

function modalvalidar4(){
	/*document.getElementById('modal4').style.display = 'none';
   	var radioValue = $("input[name='cursosradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('cursos').value = radioValue;
    }*/
    document.getElementById('modal4').style.display = 'none';
	curso = document.getElementsByClassName('curso');
	console.log(curso.length);
	cursos = "";
	value = "";
	for (var i = curso.length - 1; i >= 0; i--) {
		console.log(i);
		if (curso[i].checked == true) {
			cursos = value + curso[i].value+",";
		}
		value = cursos;
	}
	cursos = cursos + "fin";
	console.log(cursos);
   	//var radioValue = $("input[name='cursoradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    document.getElementById('cursos').value = cursos;
}

function cerrar4(){
	modalvalidar4();
	document.getElementById('modal4').style.display = 'none';
}

function modalvalidar5(){
	document.getElementById('modal5').style.display = 'none';
   	var radioValue = $("input[name='estudiantesradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('estudiante').value = radioValue;
    }
}

function cerrar5(){
	modalvalidar5();
	document.getElementById('modal5').style.display = 'none';
}

function modalvalidar6(){
	/*document.getElementById('modal6').style.display = 'none';
   	var radioValue = $("input[name='usuarioradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('usuariog').value = radioValue;
    }*/
    document.getElementById('modal6').style.display = 'none';
	curso = document.getElementsByClassName('usuarios');
	console.log(curso.length);
	cursos = "";
	value = "";
	for (var i = curso.length - 1; i >= 0; i--) {
		console.log(i);
		if (curso[i].checked == true) {
			cursos = value + curso[i].value+",";
		}
		value = cursos;
	}
	cursos = cursos + "fin";
	console.log(cursos);
   	//var radioValue = $("input[name='cursoradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    document.getElementById('usuariog').value = cursos;
}

function cerrar6(){
	modalvalidar6();
	document.getElementById('modal6').style.display = 'none';
}

function modalvalidar7(){
	document.getElementById('modal7').style.display = 'none';
   	var radioValue = $("input[name='cursoradio']:checked").val();
   	//console.log(document.getElementsByName("cursoradio")[4].checked);
    if(radioValue){
    	console.log(radioValue);
        document.getElementById('curso').value = radioValue;
    }
}

function cerrar7(){
	modalvalidar7();
	document.getElementById('modal7').style.display = 'none';
}

function nuevo_cursoiframe(){
	document.getElementById('iframe').style.display = 'block';
}

function nueva_materiaiframe(){
	document.getElementById('iframe2').style.display = 'block';
}

function nuevo_profesoriframe(){
	document.getElementById('iframe3').style.display = 'block';
}

function nuevo_cursosiframe(){
	document.getElementById('iframe4').style.display = 'block';
}

function nuevo_estudianteiframe(){
	document.getElementById('iframe5').style.display = 'block';
}

function recargar(){
	$.ajax({
		url: 'validar/mostrar_cursos.php',
		success: function(response){
			document.getElementById('datos').innerHTML = response;

		}
	});
}

function recargar2(){
	$.ajax({
		url: 'validar/mostrar_materias.php',
		success: function(response){
			document.getElementById('datos2').innerHTML = response;

		}
	});
}

function recargar3(){
	$.ajax({
		url: 'validar/mostrar_profesores.php',
		success: function(response){
			document.getElementById('datos3').innerHTML = response;

		}
	});
}

function recargar4(){
	$.ajax({
		url: 'validar/mostrar_curso.php',
		success: function(response){
			document.getElementById('datos4').innerHTML = response;

		}
	});
}

function recargar5(){
	$.ajax({
		url: 'validar/mostrar_estudiantes.php',
		success: function(response){
			document.getElementById('datos5').innerHTML = response;

		}
	});
}

function recargar6(){
	$.ajax({
		url: 'validar/mostrar_usuarios.php',
		success: function(response){
			document.getElementById('datos6').innerHTML = response;

		}
	});
}

function recargar7(){
	$.ajax({
		url: 'validar/mostrar_cursos2.php',
		success: function(response){
			document.getElementById('datos7').innerHTML = response;

		}
	});
}

function cursosubmit(){
	const parentDocument = window.parent.document;
	parentDocument.getElementById('iframe').style.display = 'none';
	$.ajax({
		url: 'validar/mostrar_cursos.php',
		success: function(response){
			parentDocument.getElementById('datos').innerHTML = response;
		}
	});
}

function materiasubmit(){
	const parentDocument = window.parent.document;
	parentDocument.getElementById('iframe2').style.display = 'none';
	$.ajax({
		url: 'validar/mostrar_materias.php',
		success: function(response){
			parentDocument.getElementById('datos2').innerHTML = response;
		}
	});
}

function profesorsubmit(){
	const parentDocument = window.parent.document;
	parentDocument.getElementById('iframe3').style.display = 'none';
	$.ajax({
		url: 'validar/mostrar_profesores.php',
		success: function(response){
			parentDocument.getElementById('datos3').innerHTML = response;
		}
	});
}

function cursossubmit(){
	const parentDocument = window.parent.document;
	parentDocument.getElementById('iframe4').style.display = 'none';
	$.ajax({
		url: 'validar/mostrar_curso.php',
		success: function(response){
			parentDocument.getElementById('datos4').innerHTML = response;
		}
	});
}

function estudiantesubmit(){
	const parentDocument = window.parent.document;
	parentDocument.getElementById('iframe5').style.display = 'none';
	$.ajax({
		url: 'validar/mostrar_estudiantes.php',
		success: function(response){
			parentDocument.getElementById('datos5').innerHTML = response;
		}
	});
}

function busqueda(){
	var busqueda = document.getElementById('query').value;
	console.log(busqueda);
	prueba(busqueda);
}

function prueba(cursos){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_cursos.php',
		type: "POST",
		data: { cursos: cursos},
		success: function(response){
			document.getElementById('datos').innerHTML = response;
		}
	});
}

function busqueda2(){
	var busqueda = document.getElementById('query2').value;
	console.log(busqueda);
	prueba2(busqueda);
}

function prueba2(materias){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_materias.php',
		type: "POST",
		data: { materias: materias},
		success: function(response){
			document.getElementById('datos2').innerHTML = response;
		}
	});
}

function busqueda3(){
	var busqueda = document.getElementById('query3').value;
	console.log(busqueda);
	prueba3(busqueda);
}

function prueba3(profesores){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_profesores.php',
		type: "POST",
		data: { profesores: profesores},
		success: function(response){
			document.getElementById('datos3').innerHTML = response;
		}
	});
}

function busqueda4(){
	var busqueda = document.getElementById('query4').value;
	console.log(busqueda);
	prueba4(busqueda);
}

function prueba4(curso){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_curso.php',
		type: "POST",
		data: { curso: curso},
		success: function(response){
			document.getElementById('datos4').innerHTML = response;
		}
	});
}

function busqueda5(){
	var busqueda = document.getElementById('query5').value;
	console.log(busqueda);
	prueba5(busqueda);
}

function prueba5(estudiante){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_estudiantes.php',
		type: "POST",
		data: { estudiante: estudiante},
		success: function(response){
			document.getElementById('datos5').innerHTML = response;
		}
	});
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

function busqueda7(){
	var busqueda = document.getElementById('query7').value;
	console.log(busqueda);
	prueba7(busqueda);
}

function prueba7(cursos){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_cursos2.php',
		type: "POST",
		data: { cursos: cursos},
		success: function(response){
			document.getElementById('datos7').innerHTML = response;
		}
	});
}

function nuevo_profesor(){
	location.href = "nuevo_profesor.php";
}

function materia_curso(){
	location.href = "materia_curso.php";
}

function materia_profesor(){
	location.href = "materia_profesor.php";
}

function nuevo_padre(){
	location.href = "nuevo_padre_familia.php";
}

function ver_dbs(){
	location.href = "ver_bases_datos.php";
}

function mi_info(){
	location.href = "mi_info.php";
}

function modificar_pagina(){
	location.href = "modificar_pagina.php";
}

function querysearchbar(){
	var busqueda = document.getElementById('querysearchbar').value;
	console.log(busqueda);
	querysearchbarq(busqueda);
}

function querysearchbarq(dato){
	//console.log('escribio algo...');
	$.ajax({
		url: 'validar/buscar_todo.php',
		type: "POST",
		data: { dato: dato},
		success: function(response){
			document.getElementById('querysearchbardiv').innerHTML = response;
		}
	});
}

function usuarioperfil(id){
	location.href = "user_profile.php" + "?id=" + id;
}

function funciones(){
	location.href = "funciones.php";
}

function changepass(){
	location.href = "changepass.php";
}

function horario(){
	location.href = "horario.php";
}

function cursopublicacion(id){
	location.href = "publicaciones_curso.php?id=" + id;
}