angular.module("apptiempo",[])
.controller("mostrar",["$scope","$http",function(interno,$http){
	interno.nombre="";
	interno.cuenta = interno.nombre.length;
	interno.respuesta = "caca";
	interno.actual = false;
	interno.respuesta = false;
	interno.dsemana = "hoy";
	interno.diaconcreto =[];

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
		interno.diaconcreto.simbolo = interno.respuesta['Variable Símbolo']['id'+contador];
		interno.diaconcreto.viento = interno.respuesta["Variable Símbolo del Viento"][contador];
		interno.diaconcreto.nombre = mdia;
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
								var elemento1 = document.getElementsByClassName('Awesomplete')[0];

								//debugger
								if (elemento1 != undefined) {
									
									elemento1.removeChild(elemento1.children[1]);	
								}
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



				if(interno.sol < respuesta.dia["hora_local"]){
					interno.periodo = "De noche";
					console.log("true");
				}else{
					interno.periodo = "De Dia";
					console.log("false");
				}

					debugger						
				console.log(respuesta);
				
				
			})

		}
	interno.taketiempo = function(){
			var name= document.getElementById('nombre').value;
			//debugger
			$http.post(
				"../tiempo/takeurllocalidad.php",
				{name :name})
				.success(function(respuesta) {
					console.log(respuesta);
					
					 var datos = interno.takedatos(respuesta);
				})
				
			
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
