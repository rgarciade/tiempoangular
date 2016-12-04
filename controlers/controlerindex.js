angular.module("apptiempo",[])
.controller("mostrar",["$scope","$http",function(c1,$http){
	c1.nombre="";
	c1.cuenta = c1.nombre.length;



	c1.cogeeer = function(){


				if(c1.nombre.length == 3  ){
				
				console.log(c1.nombre);
				//debugger
				$http.post("localidades.php",
					{
					texto :c1.nombre
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

				c1.focuss('nombre');
			}


	}

	c1.takedatos = function(urlsend){
			//console.log(urlsend);
			$http.post('../tiempo/takeldateslocalidades.php',
			{urlsend : urlsend})
			.success(function(respuesta) {
				var respuesta = respuesta;
							
				console.log(respuesta);
				
				
			})

		}
	c1.taketiempo = function(){
			var name= document.getElementById('nombre').value;
			debugger
			$http.post(
				"../tiempo/takeurllocalidad.php",
				{name :name})
				.success(function(respuesta) {
					console.log(respuesta);
					debugger
					 var datos = c1.takedatos(respuesta);
				})
				
			
		}



	c1.cogeeerold = function(){
			
			if(c1.nombre.length == 3  ){
				
				console.log(c1.nombre);
				
				$.ajax({
					type:'POST',
					url:'localidades.php',
					data:{texto :c1.nombre},
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
				c1.focuss('nombre');
			}

	}
	c1.focuss = function(id){
			setTimeout(function(){$("#"+id).focus()}, 100);		
	}
}]);
