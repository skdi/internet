function registro(usuario,nombre,pass1,pass2){
	if(limpiar(usuario)!='' && limpiar(nombre)!='' && limpiar(pass1)!='' && limpiar(pass2)!='')
		if(limpiar(pass1)!=limpiar(pass2)){
			$("error").type("text");
			$("#error").text("las contraseñas no coinciden");
		}else {
			//enviar registro
			
		}

}
function limpiar(valor){
	var cadena=valor.split(" ").join("");
	return cadena;
}