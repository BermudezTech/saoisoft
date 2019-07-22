var formulario = document.getElementById('formulario');
var boton = document.getElementById('boton');
function hide(){
	document.getElementById('span').style.height = '0';
}
function show(){
	document.getElementById('span').style.top = '0';
	document.getElementById('span').style.height = '30px';
}
formulario.addEventListener('submit', function(e){
	document.getElementById("boton").value = "Espere...";
	e.preventDefault();
	/*console.log('me diste un click')*/

	var datos = new FormData(formulario);

	console.log(datos)
	//console.log(datos.get('username'))
	//console.log(datos.get('password'))


	fetch('validar.php',{
		method: 'POST',
		body: datos
	})
		.then(res=> res.json())
		.then(data=>{
			console.log(data)
			document.getElementById("boton").value = "Ingresar";
			if (data == 'error') {
			 	show();
			 	setTimeout('hide()',3000);
			}else if(data == 'correcto'){
				location.href = "select_user.php";
				/*document.getElementById('span').innerHTML = 'Correcto';
				document.getElementById('span').style.backgroundColor = '#58C736';
				show();
			 	setTimeout('hide()',3000);*/
			}else if(data == 'incorrecto'){
			 	show();
			 	setTimeout('hide()',3000);
			}
		})
})