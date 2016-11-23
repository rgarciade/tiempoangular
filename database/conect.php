<?php 

function conectar(){
	$server  = "localhost";//nombre del servidor
	$cliente = "select";//nombre del cliente
	$pwd     = "Qser12354xc^*";//contraseña de mysql
	$db      = "tiempo";//nombre de la base de datos, en nuestro caso se llama autocompleta
	$conn = mysqli_connect($server,$cliente,$pwd,$db);
	return $conn;

}

 ?>