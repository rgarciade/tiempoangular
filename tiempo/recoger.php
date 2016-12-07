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
			$name = quitar_tildes($name);
			$url = (string)($localidadxml[$i] -> url[0]);
			$localidad_array[$name] = $url."&affiliate_id=lz92tk47tteo";
		}


	return $localidad_array;
 }


function quitar_tildes($cadena) {
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
$texto = str_replace($no_permitidas, $permitidas ,$cadena);
return $texto;
}

function data_secuence_value($valor,$array_localidad,$data){

	$tipo = $data-> location -> var[$valor];
	

	$tipo_interno = $tipo-> data -> forecast;

	

	$countdias = 0;
	foreach ($tipo_interno as $key => $value) {
		//print_r($value);
		$dia = (int)$value['data_sequence'];
		$temperatura = (string)$value['value'];

		if($countdias == 0){
			$array_temp_min[$dia] = $temperatura; 
		}else{
			$array_temp_min[$dia] = $temperatura; 
			
		}
		$countdias++;
	  	
	}

	$array_localidad[(string)$tipo -> name] = $array_temp_min;

	return $array_localidad;
}
?>