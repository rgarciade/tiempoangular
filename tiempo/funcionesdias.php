<?php 

//sumarndias(date('Y-m-d'),1);
//sumarndiassemana(date('D'),1);
function sumarndias($date,$suma){

	
	 $date = date('Y-m-d' ,strtotime($date."+ ".$suma." days"));
return $date;
}
function sumarndiassemana($date,$suma){

	
	 $date = date('D' ,strtotime($date."+ ".$suma." days"));
return $date;
}

 ?>