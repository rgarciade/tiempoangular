<?php include "funcionestiempo.php";


$funcion = 0;





if($funcion == 0){



	mysqli_query($conn,"truncate table localidades " )or die("error");
	mysqli_query($conn,"truncate table provincias " )or die("error");




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
				//echo $idprovincia."<br><br><br>";

				
				first_sincro_localidades($localidad,$idprovincia,$conn);

			}

			//añadir funcion 1  
		}


}




 ?>