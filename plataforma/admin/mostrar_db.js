function validarchk(){
   	var radioValue = $("input[name='db']:checked").val();
    if(radioValue){
        //document.getElementById('data').innerHTML = radioValue;
    }
    mostrar(radioValue);
}

function mostrar(numero){
	console.log(numero);
	$.ajax({
		url: 'validar/mostrar_dbs.php',
		type: "POST",
		data: { numero: numero},
		success: function(response){
			document.getElementById('data').innerHTML = response;
		}
	});
}

function busquedadbs(){
	var busqueda = document.getElementById('query').value;
	console.log(busqueda);
	var radioValue = $("input[name='db']:checked").val();
	query(busqueda, radioValue);
}

function query(dato, radio){
	//console.log(dato);
	$.ajax({
		url: 'validar/buscar_dato.php',
		type: "POST",
		data: {radio: radio, dato:dato},
		success: function(response){
			document.getElementById('data').innerHTML = response;
		}
	});
}