
<?php include "localidades.php"; ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="../includes/awesomplete-gh-pages/awesomplete.css" >
	<script src="../includes/awesomplete-gh-pages/awesomplete.js"></script>
 	<title>Tiempo</title>
	<script>
		
		function taketiempo(){
			var name= document.getElementById('nombre').value;
			console.log(name);
			
		$.ajax({
			type:'POST',
			url:'../tiempo/takeurllocalidad.php',
			data:{name :name},
			success:function(respuesta) {
				console.log(respuesta);

				 var datos = takedatos(respuesta);
			}
			
		});
		}

		function takedatos(urlsend){
			//console.log(urlsend);
			$.ajax({
			type:'POST',
			url:'../tiempo/takeldateslocalidades.php',
			data:{urlsend : urlsend},
			success:function(respuesta) {
				var respuesta = JSON.parse(respuesta);
							
				console.log(respuesta);
				
				
			}
			
			});
		}



	</script>
 </head>
 <body>
 	
 <input  class="form-control " id="nombre" name="nombre"  class="mayusculas" required>
 <button onclick="taketiempo();"  >ver tiempo</button>
	<script>
	
			var elemento = document.getElementById('nombre');
			
			new Awesomplete(elemento,{
				list: arraylocalidadesJS,

			});
	</script>




 </body>
 </html> 
  