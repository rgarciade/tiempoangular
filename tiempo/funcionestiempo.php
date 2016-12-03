<?php 

//first_sincro();

include "recoger.php";
include "funcionesdias.php";
include "../database/conect.php";


$conn = conectar();
mysqli_set_charset($conn,"utf8");

$comunidades_array = array();
$response_xml_data= false;


		

		//comprovar menor (select)  
		//borrar dias anteriores

		//$array_localidad = take_dates_localidades("http://api.tiempo.com/index.php?api_lang=es&localidad=994&affiliate_id=lz92tk47tteo");

		//print_r($array_localidad);

		//insertar o updatear
		//comvertir todo esto en funcion para lanzarlo en funcion 0
		



function take_dates_localidades($url){

	$response_xml_data = file_get_contents($url);

		if($response_xml_data){
			


			$data = simplexml_load_string($response_xml_data);

			$data1 = $data;

			$data = $data -> location -> var[0];

			$name = $data -> name;
			$forecast = $data -> data -> forecast;
			//echo $name ;

			$array_localidad = array();
			$contador=0;

			count($data1 -> location -> var);
 			foreach ($data1 -> location -> var as $key => $value) {
 				$array_localidad= data_secuence_value($contador,$array_localidad,$data1);
 				
 				//echo "<br>".$contador;
 				$contador++;
 			}
 				
 			
			
			//print_r($array_localidad);
			//print_r($data1);


		}
		return $array_localidad;
}


function first_sincro_localidades($array,$idprovincia,$conn){


	foreach ($array as $key => $value) {
				
		
		$url = $value;
		$urlhoras = $url."&v=2.0&h=1";


			$consulta = "INSERT INTO localidades ( idprovincia, nombre, url, urlhoras) VALUES (?,?,?,?)";
			$sentencia = mysqli_prepare($conn, $consulta);
			mysqli_stmt_bind_param($sentencia, "isss", $idprovincia,$key, $url, $urlhoras);

	

		/* Ejecutar la sentencia */
		mysqli_stmt_execute($sentencia);
		mysqli_stmt_close($sentencia);
			
		}

}


function take_url_localidad($name,$conn){

	$stmt = mysqli_prepare($conn, "SELECT url FROM localidades where nombre = ?");

	mysqli_stmt_bind_param($stmt, "s", $name);  


	mysqli_stmt_execute($stmt);

	mysqli_stmt_bind_result($stmt, $url);

	mysqli_stmt_fetch($stmt);

	mysqli_stmt_close($stmt);

return $url;
}



function take_id_provincia($name,$conn){

	$stmt = mysqli_prepare($conn, "SELECT id FROM provincias where nombre = ?");

	mysqli_stmt_bind_param($stmt, "s", $name);  


	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $id);

	mysqli_stmt_fetch($stmt);

	mysqli_stmt_close($stmt);

	return $id;

}


function first_sincro_provincias($array,$conn){
	
 	
	foreach ($array as $key => $value) {
		
			$consulta = "INSERT INTO provincias (url, nombre) VALUES (?,?)";
			
		$sentencia = mysqli_prepare($conn, $consulta);

		$key = (string)$key;

		mysqli_stmt_bind_param($sentencia, "ss",  $value, $key);


		/* Ejecutar la sentencia */
		mysqli_stmt_execute($sentencia);
		mysqli_stmt_close($sentencia);
	}


}



 ?>