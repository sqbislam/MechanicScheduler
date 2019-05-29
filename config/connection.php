<?php
	
	$host = '127.0.0.1'	
	$user = 'root'
	$pass = ''	
	

	$con = mysqli_connect($host, $user, $pass) //Connect to db

	if($con) echo "Successful";
	else echo myysqli_error($con);		
	
	


?>