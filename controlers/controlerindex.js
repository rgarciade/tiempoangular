angular.module("apptiempo", ["ngRoute"])
.config(function($routeProvider) {

    $routeProvider
        .when('/', {
            templateUrl : 'home.html',
            controller  : 'mostrar'
        })
        .when('/ultimasbusquedas', {
            templateUrl : 'ultimasbusquedas.html',
            controller  : 'ultimas'
        })

        
        .otherwise({
            redirectTo: '/'
        });
})
.controller("ultimas",["$scope","$http",function(internotodo,$http){


	 internotodo.arrayTodo = [];
	 //internotodo.lugarconcreto =[];
	internotodo.redirigirymostar = function(ultimas){

	document.cookie = "amostrar="+ultimas;
	 window.location ="#";

	}
	internotodo.getCookie =function(cname){

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
	

	let result =internotodo.getCookie("busquedas");
	debugger
	if(result){
		console.log(JSON.parse(result));
		internotodo.arrayTodo = JSON.parse(result);

	}	
}])
.controller("mostrar",["$scope","$http",function(interno,$http){
	interno.periodo =  "comun";
	interno.nombre="";
	interno.cuenta = interno.nombre.length;
	interno.respuesta = "caca";
	interno.actual = false;
	interno.respuesta = false;
	interno.dsemana = "hoy";
	interno.diaconcreto =[];
	interno.proximas = [];
	interno.lugarbusqueda = "";


	var d = new Date();

	interno.hora_actual=d.getHours()+":"+d.getMinutes();
	console.log(interno.hora_actual);
	//interno.hora_actual = "17:59";

//cookiesssssssssssssssss

	interno.getCookie =function(cname){

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
	interno.agregarcookiebusquedas = function(elemento){
		debugger
		//leer cookie actual
		let agregar = true;
		var leer1 =interno.getCookie("busquedas");
		//comprovar si ya esta en bosquedas



		if (leer1 != ""){

			var existe = JSON.parse(leer1);

			debugger
			for (var i = 0; i < existe.length; i++) {
				
				if(existe[i] == elemento){
					agregar = false;
				}
				
			}
			debugger 
			if (agregar) {

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
		}else{
			leer1 = '["'+elemento+'"]';
			document.cookie = "busquedas="+leer1;
		}



	}

	interno.comprovarredirec = function(){

		 interno.comp = interno.getCookie("amostrar");
		 debugger

		if(interno.comp != "" && interno.comp != null){
			debugger;
			document.getElementById('nombre').value = interno.comp;
			
			interno.taketiempo();
			debugger
		}
	}

	//interno.comprovarredirec();
//fin coookiiiiesss





	interno.mostrarinferior = function(mdia){
		debugger
		interno.dsemana = mdia; 
		
		var contador = 1;
		var largo = 7;
		for (var i = 1; i <= largo; i++) {
			
			if (interno.respuesta['Variable Símbolo día'][i] == mdia){
				contador = i;
				i = largo;
				
			}

		}
		console.log("contador= "+contador);
		interno.diaconcreto.definicion = interno.respuesta["Definición de Atmosfera"][contador];
		interno.diaconcreto.maxima = interno.respuesta["Temperatura máxima"][contador];
		interno.diaconcreto.minima = interno.respuesta["Temperatura mínima"][contador];
		interno.diaconcreto.simbolo = "dia/"+interno.respuesta['Variable Símbolo']['id'+contador];
		interno.diaconcreto.viento = interno.respuesta["Variable Símbolo del Viento"][contador];
		interno.diaconcreto.nombre = mdia;
		debugger

	}
	interno.proximas_horas =function(){
		debugger
		 interno.control_hora_ultima = "";
		 interno.datos_proximashoras = [];
		
		interno.control_hora_ultima = interno.hora_actual[0] + interno.hora_actual[1] ;
		
		
		for (var i = 0; i < 6; i++) {
			

			if(interno.control_hora_ultima != null){
				interno.datos_proximashora = {};
				interno.datos_proximashora

				interno.datos_proximashora.hora = null;
				
				if(interno.control_hora_ultima < 10){
					interno.control_hora_ultima = "0"+interno.control_hora_ultima;
				}



				interno.dato_dias  =  interno.respuesta.dia.hour[interno.control_hora_ultima + ":00"];

				interno.datos_proximashora.hora = interno.control_hora_ultima + ":00";
				interno.datos_proximashora.datos = interno.dato_dias ;

				
				debugger
				if(interno.hora_actual > "12:00"){
					if(interno.sol < interno.hora_actual ){
						debugger
						interno.datos_proximashora.datos.symbol.value = "noche/"+interno.datos_proximashora.datos.symbol.value;
					}else{
						interno.datos_proximashora.datos.symbol.value = "dia/"+interno.datos_proximashora.datos.symbol.value;
					}
				}else{
					if(interno.luna > interno.hora_actual ){
						debugger
						interno.datos_proximashora.datos.symbol.value = "noche/"+interno.datos_proximashora.datos.symbol.value;
					}else{
						interno.datos_proximashora.datos.symbol.value = "dia/"+interno.datos_proximashora.datos.symbol.value;
					}
				}


					

				
				
				interno.datos_proximashoras.push(interno.datos_proximashora);

				if(interno.control_hora_ultima != 24){
					interno.control_hora_ultima++;
					console.log(interno.control_hora_ultima);
				}else{
					console.log("entraaa");
					interno.control_hora_ultima= 1;
					console.log(interno.control_hora_ultima);
				}
			}
			//al terminar si es menor de 24
		}

		
		console.log(interno.datos_proximashoras);
		debugger
	}
	interno.cogeeer = function(){
		
				var elemento = document.getElementById('nombre');

				
				if(elemento.value.length == 3 ){
				console.log(interno.nombre);
				//debugger
				$http.post("localidades.php",
					{
					texto :interno.nombre
					})
					.success(function(data) {
						//debugger
						console.log(data);
							
					
							
							if (elemento.autocomplete != "") {

								var ant = document.getElementById("nombre");
								var father = document.getElementById("buscagor");

								document.getElementsByClassName("awesomplete")[0].remove();

								buscagor.appendChild(ant); 
								/*var elemento1 = document.getElementsByClassName('Awesomplete')[0];

								//debugger
								if (elemento1 != undefined) {
									
									elemento1.removeChild(elemento1.children[1]);	
								}*/
							}

								var awe =new Awesomplete(elemento,{
									list: (data),
									minChars: 3
									
								});	
					})

				interno.focuss('nombre');
			}


	}

	interno.takedatos = function(urlsend){
			//console.log(urlsend);
			$http.post('../tiempo/takeldateslocalidades.php',
			{urlsend : urlsend})
			.success(function(respuesta) {
				interno.diaconcreto =[];
				debugger
				if(respuesta != ""){
					
					for (var i = 1; i <= 7; i++) {
						delete respuesta['Variable Símbolo día']['id'+i];
					}
					
				}
				debugger
				

				interno.hora = respuesta.dia["hora_local"][0];
				interno.hora = interno.hora + respuesta.dia["hora_local"][1] + ":00";
				interno.actual = respuesta.dia.hour[interno.hora];
				
				interno.respuesta = respuesta;

				interno.sol = interno.respuesta.dia.sun.out;
				interno.luna = interno.respuesta.dia.sun.in;


				if(interno.hora_actual > "12:00"){

					if(interno.sol < interno.hora_actual){
						debugger
						interno.periodo = "noche";
						interno.imagentop = "noche/"+interno.actual.symbol['value'];
						//interno.actual.symbol['value'] = "noche/"+interno.actual.symbol['value'];
						//console.log("true");
					}else{
						interno.periodo = "dia";
						interno.imagentop = "dia/"+interno.actual.symbol['value'];
						//interno.actual.symbol['value'] = "dia/"+interno.actual.symbol['value'];
						//console.log("false");
					}
				}else{
					if(interno.luna > interno.hora_actual){

						interno.periodo = "noche";
						interno.imagentop = "noche/"+interno.actual.symbol['value'];
						//console.log("true");
					}else{
						interno.periodo = "dia";
						interno.imagentop = "dia/"+interno.actual.symbol['value'];
						//console.log("false");
					}
				}

					debugger						
				console.log(respuesta);
				//interno.mostrarinferior(2);
				interno.proximas_horas();
				
			})

		}
	interno.taketiempo = function(){

				var name= document.getElementById('nombre').value;
			

			interno.lugarbusqueda = name;
			interno.agregarcookiebusquedas(name);
			debugger
			$http.post(
				"../tiempo/takeurllocalidad.php",
				{name :name})
				.success(function(respuesta) {
					console.log(respuesta);
						
					 var datos = interno.takedatos(respuesta);debugger
					 //incluir en cookies
					 debugger
					 
					
				})
				
			document.cookie = 'amostrar=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}



	interno.cogeeerold = function(){
			
			if(interno.nombre.length == 3  ){
				
				console.log(interno.nombre);
				
				$.ajax({
					type:'POST',
					url:'localidades.php',
					data:{texto :interno.nombre},
					success:function(respuesta) {
						debugger
						console.log(respuesta);
							var elemento = document.getElementById('nombre');
			
							
							if (elemento.autocomplete != "") {
								var elemento1 = document.getElementsByClassName('Awesomplete')[0];
								debugger
								if (elemento1.children.length > 0 ) {

								elemento1.removeChild(elemento1.children[1]);	
								}
							}
								var awe =new Awesomplete(elemento,{
									list: JSON.parse(respuesta),
									minChars: 3,
									maxItems: 8
								});	
					}	
				});
				interno.focuss('nombre');
			}

	}
	interno.focuss = function(id){
			setTimeout(function(){$("#"+id).focus()}, 100);		
	}
}]);
