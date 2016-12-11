<?php

session_start();

if(isset( $_COOKIE['your_cookie_name'] ) ) {
echo "aaa";
	 $data = json_decode($_COOKIE['your_cookie_name'], true);

	 array_push($data, "cacaaaa");
	// setcookie('your_cookie_name', json_encode($data), time()+3600);
}else{
echo "bb";

 $data = array(1 => "caca", 2=> "caca2");
}


setcookie('your_cookie_name', json_encode($data), time()+3600);


$data = json_decode($_COOKIE['your_cookie_name'], true);

//var_dump($data);
 ?>

 <script>
 	var aa = <?php echo  $_COOKIE['your_cookie_name'] ?>
 	debugger
 </script>