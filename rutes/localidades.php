<?php 
include_once"../database/conect.php" ; 

if (isset($_POST["texto"])) {
     $texto = $_POST["texto"];
}else{  
    $texto = "ç";
}


$conn = conectar();
$arraylocalidades = array();
//$consulta = "SELECT nombre FROM localidades ";
$consulta = "SELECT nombre FROM localidades where nombre REGEXP '.*$texto' ";
$result = mysqli_query($conn, $consulta);

while( $row = mysqli_fetch_array ( $result )) {
	$row [ "nombre" ];
	$var_inclu= (string)$row [ "nombre" ];

	array_push($arraylocalidades, $var_inclu);

}



for ($i=0; $i < count($arraylocalidades); $i++) { 
	$arraylocalidades[$i] =  utf8_encode($arraylocalidades[$i]);
}


 echo json_encode($arraylocalidades);
 ?>