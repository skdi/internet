function register(dni,nombre,apellido){
	if(limpiar(dni)!='' && limpiar(nombre)!='' && limpiar(apellido)!=''){
		return dni,nombre,apellido;
	}

}
function limpiar(valor){
	var cadena=valor.split(" ").join("");
	return cadena;
}