<?php 
include_once"../database/conect.php" ; 

$conn = conectar();
$arraylocalidades = array();
$consulta = "SELECT nombre FROM localidades ";
$result = mysqli_query($conn, $consulta);

while( $row = mysqli_fetch_array ( $result )) {
	$row [ "nombre" ];
	$var_inclu= (string)$row [ "nombre" ];

	array_push($arraylocalidades, $var_inclu);

}



for ($i=0; $i < count($arraylocalidades); $i++) { 
	$arraylocalidades[$i] =  utf8_encode($arraylocalidades[$i]);
}


 ?>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
 <script>var arraylocalidadesJS = <?php echo json_encode($arraylocalidades);?>;</script>