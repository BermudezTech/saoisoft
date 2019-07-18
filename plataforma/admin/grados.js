function myFunction() {
  var x = document.getElementById("grado").value;
  var input = document.getElementById('nombre');
  switch(x){
			case '0':
				input.value = '';
			break;
			case '1':
				input.value = 'Primero ';
			break;
			case '2':
				input.value = 'Segundo ';
			break;
			case '3':
				input.value = 'Tercero ';
			break;
			case '4':
				input.value = 'Cuarto ';
			break;
			case '5':
				input.value = 'Quinto ';
			break;
			case '6':
				input.value = 'Sexto ';
			break;
			case '7':
				input.value = 'Septimo ';
			break;
			case '8':
				input.value = 'Octavo ';
			break;
			case '9':
				input.value = 'Noveno ';
			break;
			case '10':
				input.value = 'Decimo ';
			break;
			case '11':
				input.value = 'Once ';
			break;
		}
}
function grado(){
		var grado = document.getElementById('grado');
		var input = document.getElementById('nombre');
		var value = grado[grado.selectedIndex].value;
		console.log('Hello');
		switch(value){
			case '0':
				input.value = '';
			break;
			case '1':
				input.value = 'Primero ';
			break;
			case '2':
				input.value = 'Segundo ';
			break;
			case '3':
				input.value = 'Tercero ';
			break;
			case '4':
				input.value = 'Cuarto ';
			break;
			case '5':
				input.value = 'Quinto ';
			break;
			case '6':
				input.value = 'Sexto ';
			break;
			case '7':
				input.value = 'Septimo ';
			break;
			case '8':
				input.value = 'Octavo ';
			break;
			case '9':
				input.value = 'Noveno ';
			break;
			case '10':
				input.value = 'Decimo ';
			break;
			case '11':
				input.value = 'Once ';
			break;
		}
	}