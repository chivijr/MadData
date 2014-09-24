<?php

	// Obtiene la localización del usuario
	$lat=$_REQUEST["lat"]; 
	$lng=$_REQUEST["lng"];
	$time=$_REQUEST["time"];
	
	// Create connection
	$con=mysqli_connect("localhost","root","ninedata","freakeando");
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$fecha = (new DateTime)->getTimestamp();
	$fecha = date("Y-m-d H:i:s", strtotime($fecha)) ;
	echo $time;
	mysqli_query($con,"INSERT INTO accesos VALUES (\"" . $time . "\" , " .$lat ." , " .$lng .")");
	mysqli_close($con);
	
?>
