

function password1(){

  var password1 = document.getElementById("password").value;

   if (password1.length >= 8) {
	document.getElementById("comprobacionPassword").classList.remove("text-danger");
	document.getElementById("comprobacionPassword").classList.add("text-success");
      document.getElementById("comprobacionPassword").innerHTML = "<i class='fas fa-check'></i>";


   }else {
	document.getElementById("comprobacionPassword").classList.remove("text-success");
	document.getElementById("comprobacionPassword").classList.add("text-danger");
    document.getElementById("comprobacionPassword").innerHTML = "La contraseña tiene que tener más de 8 caracteres.";

   }

}

function passwordrepeat(){


	 var password = document.getElementById("password").value;
	var password2 = document.getElementById("password2").value;


	// Si la contraseña tiene menos de 8 caracteres
	if (password == password2 && (password.length >= 8)) {

		document.getElementById("comprobacionPasswordRepeticion").classList.remove("text-danger");
		document.getElementById("comprobacionPasswordRepeticion").classList.add("text-success");
		document.getElementById("comprobacionPasswordRepeticion").innerHTML = "<i class='fas fa-check'></i>";
   		document.getElementById("check").removeAttribute("disabled");

	} else {

		// si no coinciden, muestra mensaje de error
		document.getElementById("comprobacionPasswordRepeticion").classList.remove("text-success");
		document.getElementById("comprobacionPasswordRepeticion").classList.add("text-danger");
		document.getElementById("comprobacionPasswordRepeticion").innerHTML = "La contraseña insertada no es valida.";
		


	}

}

function enableSend(){
	document.getElementById("crear").removeAttribute("disabled");
}



$(document).ready(function(){
    $('[data-toggle="popoverTerminos"]').popover();   
});