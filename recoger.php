<?php 


function peticion_ciudad($url){

	$array_ciudad = array();
	$array_temp_min = array();

	$array_temperaturas_min = array();

	$response_xml_data = file_get_contents($url);

	$data = simplexml_load_string($response_xml_data);


	for ($i=0; $i <= 5; $i++) { 
		$array_ciudad = data_secuence_value($i,$array_ciudad,$data);
	}


	//print_r($array_ciudad);
	
	


	return $array_ciudad; 

}
function peticion_localidad($urlprovincia){
	
	$array_localidad = array();

	$response_xml_data = file_get_contents($urlprovincia);
 
	$data = simplexml_load_string($response_xml_data);

	$localidadxml = $data-> location -> data;

		for ($i=0; $i < count ($localidadxml ); $i++) { 
			$name = (string)($localidadxml[$i] -> name[0]);
			$url = (string)($localidadxml[$i] -> url[0]);
			$localidad_array[$name] = $url."&affiliate_id=lz92tk47tteo";

		}


	return $localidad_array;
 }




function data_secuence_value($valor,$array_ciudad,$data){

	$tipo = $data-> location -> var[$valor];
	

	$tipo_interno = $tipo-> data -> forecast;

	

	$countdias = 0;
	foreach ($tipo_interno as $key => $value) {
		//print_r($value);
		$dia = (int)$value['data_sequence'];
		$temperatura = (string)$value['value'];

		if($countdias == 0){
			$array_temp_min[date('Y-m-d')] = $temperatura; 
		}else{
			$array_temp_min[sumarndias(date('Y-m-d'),$countdias)] = $temperatura; 
			
		}
		$countdias++;
	  	
	}

	$array_ciudad[(string)$tipo -> name] = $array_temp_min;

	return $array_ciudad;
}
?>