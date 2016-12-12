
<script>

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
/*

var leer1 =getCookie("array1");
//console.log("primero");
//console.log(JSON.parse(leer1));
leer1 = JSON.parse(leer1);


leer1[leer1.length]= "caacaa";


//debugger
document.cookie = "array1="+JSON.stringify(leer1);

//debugger


var leer =getCookie("array1");
//debugger
console.log(JSON.parse(leer));

debugger

*/
debugger
var url = "http://api.tiempo.com/index.php?api_lang=es&localidad=4447&affiliate_id=lz92tk47tteo";
agregarcookiebusquedas(url);
debugger
function agregarcookiebusquedas(elemento){
	//leer cookie actual
	var leer1 =getCookie("busquedas");

	if(leer1 != null && leer1 != ""){
		debugger
		//si existe
		//pasar a json 
		leer1 = JSON.parse(leer1);
		//agregar nuevo
		leer1[leer1.length]= elemento;
	
		//pasar a string y guardar
		document.cookie = "busquedas="+JSON.stringify(leer1);
	
	}else{
		//si no existe
		leer1 = '["'+elemento+'"]';
		document.cookie = "busquedas="+leer1;
		
	}

}






 </script>