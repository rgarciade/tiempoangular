<?php 
$postdata = file_get_contents("php://input");
$name = json_decode($postdata);
include_once "../database/conect.php";
$conn = conectar();
//	$name = $_POST["name"];


(string)$name = $name -> name;


	$stmt = mysqli_prepare($conn, "SELECT url FROM localidades where nombre = ?");

     mysqli_stmt_bind_param($stmt, "s", $name);  

    
    mysqli_stmt_execute($stmt);
  
    mysqli_stmt_bind_result($stmt, $url);
  
    mysqli_stmt_fetch($stmt);

    mysqli_stmt_close($stmt);


	echo $url;

 ?>