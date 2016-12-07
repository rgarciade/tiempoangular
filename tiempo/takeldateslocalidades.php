<?php 
include "funcionestiempo.php";
//$url =$_POST['urlsend'];

$postdata = file_get_contents("php://input");
$url = json_decode($postdata);

(string)$url = $url
 -> urlsend;



$url2 =$url."&v=2.0&h=1";
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
 				$array_localidad = data_secuence_value($contador,$array_localidad,$data1);
 				
 				//echo "<br>".$contador;
 				$contador++;
 			}
 				
 			
			
			
			//print_r($data1);


		}

$arraydia = array();
$response_xml_data = file_get_contents($url2);
		if($response_xml_data){
			


			$data = simplexml_load_string($response_xml_data);

			$day = $data -> location -> day ;


			$arraydia["symbol"]["value"] =  (string)$day -> tempmin['value'];
			$arraydia["symbol"]["desc"] =  (string)$day -> tempmin['desc'];
			$arraydia["tempmin"] =  (string)$day -> tempmin['value'];
			$arraydia["tempmin"] =  (string)$day -> tempmin['value'];
			$arraydia["tempmax"] =  (string)$day -> tempmax['value'];
			
			$arraydia["wind"]["unit"] = (string)$day -> wind['value']."".(string)$day -> wind['unit'];
			$arraydia["wind"]["symbol"] = (string)$day -> wind['value']."".(string)$day -> wind['symbolB'];

			$arraydia["rain"] = (string)$day -> rain['value']."".(string)$day -> rain['unit'];

			$arraydia["humidity"] =  (string)$day -> humidity['value'];


			$arraydia["sun"]["in"] =  (string)$day -> sun['in'];
			$arraydia["sun"]["out"] =  (string)$day -> sun['out'];

			$arraydia["moon"]["in"] =  (string)$day -> moon['in'];
			$arraydia["moon"]["out"] =  (string)$day -> moon['out'];
			$arraydia["moon"]["dec"] =  (string)$day -> moon['desc'];
			$arraydia["moon"]["symbol"] =  (string)$day -> moon['symbol'];

			$arraydia["hora_local"] =  (string)$day -> local_info['local_time'];

			
			
			foreach ($day -> hour as $key => $value) {


				$arraydia["hour"][(string)$value["value"]]["temp"] =(string)$value -> temp["value"]; 

				$arraydia["hour"][(string)$value["value"]]["symbol"]["value"] =(string)$value -> symbol["value"]; 
				$arraydia["hour"][(string)$value["value"]]["symbol"]["desc"] =(string)$value -> symbol["desc2"]; 


				$arraydia["hour"][(string)$value["value"]]["wind"]["value"] =(string)$value -> wind["value"]."".(string)$value -> wind["unit"]; 
				$arraydia["hour"][(string)$value["value"]]["rain"]["value"] = (string)$day -> rain['value']."".(string)$day -> rain['unit'];
				$arraydia["hour"][(string)$value["value"]]["humidity"]["value"] =  (string)$day -> humidity['value'];
				
				$arraydia["hour"][(string)$value["value"]]["clouds"]["value"] =(string)$value -> clouds["value"]; 

				$arraydia["hour"][(string)$value["value"]]["windchill"]["value"] =(string)$value -> windchill["value"]."".(string)$value -> windchill["unit"]; 
							

			}

			
			
			

		}


$array_localidad["dia"] = $arraydia;

//print_r($arraydia);

$array_localidad["dia"] = $arraydia;
//print_r($array_localidad);
		echo json_encode($array_localidad);


 ?>