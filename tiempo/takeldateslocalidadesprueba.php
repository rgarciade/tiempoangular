<?php 
include "funcionestiempo.php";
$url ="http://api.tiempo.com/index.php?api_lang=es&localidad=80481&affiliate_id=lz92tk47tteo";
$url2 ="http://api.tiempo.com/index.php?api_lang=es&localidad=80481&affiliate_id=lz92tk47tteo&v=2.0&h=1";
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
			
			foreach ($day -> hour as $key => $value) {
				$arraydia["hour"][(string)$value["value"]] = false ;
				$arraydia["hour"][(string)$value["value"]]["temp"] =(string)$value -> temp["value"]; 

				$arraydia["hour"][(string)$value["value"]]["symbol"]["value"] =(string)$value -> symbol["value"]; 
				$arraydia["hour"][(string)$value["value"]]["symbol"]["desc"] =(string)$value -> symbol["desc2"]; 

			}

			
			
			

		}


$array_localidad["dia"] = $arraydia;

print_r($arraydia);
print_r($array_localidad);
		//echo json_encode($array_localidad);


 ?>