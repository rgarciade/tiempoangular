angular.module("apptiempo",[])
.controller("mostrar",["$scope","$http",function(interno,$http){
	interno.nombre="";
	interno.cuenta = interno.nombre.length;



	interno.cogeeer = function(){


				if(interno.nombre.length == 3  ){
				
				console.log(interno.nombre);
				//debugger
				$http.post("localidades.php",
					{
					texto :interno.nombre
					})
					.success(function(data) {
						//debugger
						console.log(data);
							var elemento = document.getElementById('nombre');
			
							
							if (elemento.autocomplete != "") {
								var elemento1 = document.getElementsByClassName('Awesomplete')[0];

								elemento1.removeChild(elemento1.children[1]);	
							}
								var awe =new Awesomplete(elemento,{
									list: (data),
									minChars: 3,
									maxItems: 8
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
				var respuesta = respuesta;
							
				console.log(respuesta);
				
				
			})

		}
	interno.taketiempo = function(){
			var name= document.getElementById('nombre').value;
			debugger
			$http.post(
				"../tiempo/takeurllocalidad.php",
				{name :name})
				.success(function(respuesta) {
					console.log(respuesta);
					debugger
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

								elemento1.removeChild(elemento1.children[1]);	
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
