<?php 

//first_sincro();

include "recoger.php";
include "funcionesdias.php";
include "database/conect.php";


$conn = conectar();
mysqli_set_charset($conn,"utf8");

$comunidades_array = array();
$response_xml_data= false;
$funcion = 1;







switch ($funcion) {
	case 0:
		$response_xml_data = file_get_contents("http://api.tiempo.com/index.php?api_lang=es&pais=18&affiliate_id=lz92tk47tteo");

		if($response_xml_data){
			


			$data = simplexml_load_string($response_xml_data);


			$comunidadesxml = $data-> location -> data;



			
			for ($i=0; $i < count ($comunidadesxml ); $i++) { 
				$name = (string)($comunidadesxml[$i] -> name[0]);
				$url = (string)($comunidadesxml[$i] -> url[0]);
				$comunidades_array[$name] = $url."&affiliate_id=lz92tk47tteo";

			}

			first_sincro_provincias($comunidades_array,$conn);


			


			foreach ($comunidades_array as $key => $value) {
				
				//echo "provincias".$key."<br>";
				
				$localidad = peticion_localidad($value);
				
				//print_r($localidad);
				
				
				$idprovincia = take_id_provincia($key,$conn);
				first_sincro_localidades($localidad,$idprovincia,$conn);

			}


		}
		break;
	
	case 1:

		take_dates_localidades("http://api.tiempo.com/index.php?api_lang=es&localidad=994&affiliate_id=lz92tk47tteo");

		break;
}

function take_dates_localidades($url){

	$response_xml_data = file_get_contents($url);

		if($response_xml_data){
			


			$data = simplexml_load_string($response_xml_data);

			$data1 = $data;

			$data = $data -> location -> var[0];

			$name = $data -> name;
			$forecast = $data -> data -> forecast;
			echo $name ;

			$array_localidad = array();
			$contador=0;

			count($data1 -> location -> var);
 			foreach ($data1 -> location -> var as $key => $value) {
 				$array_localidad= data_secuence_value($contador,$array_localidad,$data1);
 				
 				echo "<br>".$contador;
 				$contador++;
 			}
 				
 			
			
			print_r($array_localidad);
			//print_r($data1);


		}
}


function first_sincro_localidades($array,$idprovincia,$conn){


	$consulta1 = "INSERT INTO localidades ( idprovincia, nombre, url) VALUES (?,?,?)";

 	
	foreach ($array as $key => $value) {
		
		//echo "<br>".$key;
		//echo "<br>".$value;

		$sentencia1 = mysqli_prepare($conn, $consulta1);


		mysqli_stmt_bind_param($sentencia1, "iss", $idprovincia,$key, $value);


		/* Ejecutar la sentencia */
		mysqli_stmt_execute($sentencia1);
		mysqli_stmt_close($sentencia1);
	}




}




function take_id_provincia($name,$conn){
//$name = "Burgos";
$stmt = mysqli_prepare($conn, "SELECT id FROM provincias where nombre = ?");

     mysqli_stmt_bind_param($stmt, "s", $name);  

    /* execute query */
    mysqli_stmt_execute($stmt);
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $id);
    /* fetch value */
    mysqli_stmt_fetch($stmt);
    /* Alternative, use a while:
    while (mysqli_stmt_fetch($stmt)) {
        // use $col1 and $col2 
    }
    */
    /* use $col1 and $col2 */
  //  echo "aa".$id;
    /* close statement */
    mysqli_stmt_close($stmt);

return $id;
}


function first_sincro_provincias($array,$conn){
	

	$consulta = "INSERT INTO provincias (nombre, url) VALUES (?,?)";

 	
	foreach ($array as $key => $value) {
		
		//echo "<br>".$key;
		//echo "<br>".$value;

		$sentencia = mysqli_prepare($conn, $consulta);


		mysqli_stmt_bind_param($sentencia, "ss", $key, $value);


		/* Ejecutar la sentencia */
		mysqli_stmt_execute($sentencia);
		mysqli_stmt_close($sentencia);
	}


}



 ?>