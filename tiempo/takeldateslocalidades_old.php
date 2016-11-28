<?php 
include "funcionestiempo.php";
$url =$_POST['urlsend'];

//echo $url;

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

		echo json_encode($array_localidad);


 ?>