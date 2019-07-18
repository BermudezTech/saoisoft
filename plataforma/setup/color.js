var color1 = document.getElementById('color1');
var color2 = document.getElementById('color2');
var color3 = document.getElementById('color3');

function color(){
	color1.style.backgroundColor = '#2c2c54';
	var value = color1[color1.selectedIndex].value;
	switch(value){
		case '0':
			color1.style.backgroundColor = '#ffffff';
		break;
		case '1':
			color1.style.backgroundColor = '#2c2c54';
		break;
		case '2':
			color1.style.backgroundColor = '#474787';
		break;
		case '3':
			color1.style.backgroundColor = '#aaa69d';
		break;
		case '4':
			color1.style.backgroundColor = '#227093';
		break;
		case '5':
			color1.style.backgroundColor = '#218c74';
		break;
		case '6':
			color1.style.backgroundColor = '#b33939';
		break;
		case '7':
			color1.style.backgroundColor = '#cd6133';
		break;
		case '8':
			color1.style.backgroundColor = '#84817a';
		break;
		case '9':
			color1.style.backgroundColor = '#cc8e35';
		break;
		case '10':
			color1.style.backgroundColor = '#ccae62';
		break;
	}
}

function colord(){
	var value = color2[color2.selectedIndex].value;
	switch(value){
		case '0':
			color2.style.backgroundColor = '#ffffff';
		break;
		case '1':
			color2.style.backgroundColor = '#2c2c54';
		break;
		case '2':
			color2.style.backgroundColor = '#474787';
		break;
		case '3':
			color2.style.backgroundColor = '#aaa69d';
		break;
		case '4':
			color2.style.backgroundColor = '#227093';
		break;
		case '5':
			color2.style.backgroundColor = '#218c74';
		break;
		case '6':
			color2.style.backgroundColor = '#b33939';
		break;
		case '7':
			color2.style.backgroundColor = '#cd6133';
		break;
		case '8':
			color2.style.backgroundColor = '#84817a';
		break;
		case '9':
			color2.style.backgroundColor = '#cc8e35';
		break;
		case '10':
			color2.style.backgroundColor = '#ccae62';
		break;
	}
}

function colort(){
	var value = color3[color3.selectedIndex].value;
	switch(value){
		case '0':
			color3.style.backgroundColor = '#ffffff';
		break;
		case '1':
			color3.style.backgroundColor = '#40407a';
		break;
		case '2':
			color3.style.backgroundColor = '#706fd3';
		break;
		case '3':
			color3.style.backgroundColor = '#f7f1e3';
		break;
		case '4':
			color3.style.backgroundColor = '#34ace0';
		break;
		case '5':
			color3.style.backgroundColor = '#33d9b2';
		break;
		case '6':
			color3.style.backgroundColor = '#ff5252';
		break;
		case '7':
			color3.style.backgroundColor = '#ff793f';
		break;
		case '8':
			color3.style.backgroundColor = '#d1ccc0';
		break;
		case '9':
			color3.style.backgroundColor = '#ffb142';
		break;
		case '10':
			color3.style.backgroundColor = '#ffda79';
		break;
	}
}
