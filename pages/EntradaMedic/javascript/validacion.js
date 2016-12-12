//validaciones con javascrip
//alert("llamar el archivo javascri");

//metodo para que no permita el acceso a un campo vacio 
function validacion(){
	var user = document.getElementById("aplica").value;
	//alerta de que el campo se encuantra vacio 
	if(user==""){
		alert("El campo esta vacio");
		return false;
		//mensaje de confirmacion de datos 
	}else{
		alert("esta seguro que los datos son correctos?")
    }
}


//metodo para que no permita la entrada de numeros
function validarSiNumero(letra){
    if (!/^([A-Za-z])*$/.test(letra))
      alert("El valor " + letra + " no es una letra");
  }


//metodo para validar solo letras 
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }