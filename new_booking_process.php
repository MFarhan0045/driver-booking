<?php

include_once 'mysqli.php';
	
$error = array();

$sql =new mysqli($server, $user, $pass, $db);

if (isset($_POST['customer'])){

	$date = mysql_real_escape_string($_POST['date']);
	$pickup = mysql_real_escape_string($_POST['pickup']);
	$destination = mysql_real_escape_string($_POST['destination']);
	
	
		if(empty($date)){
		
				array_push($error,"Date is required");
				
		}
		if(empty($pickup)){

				array-push($error,"Pickup location is required");
				
		}
		
		if(empty($destination)){
		
				array_push($error,"End point is required"));
		}
		
		if (count($error)== 0) {
			
				//$encryptpass = md5($password);//encryption
				$query = "INSERT INTO booking (user_id,date, pickup, destination) VALUES ( '".$_COOKIE["user"]."', '$date', '$pickup', '$destination')";
				
				$x = mysqli_query($sql, $query);
				
				if(x == 1){
				
					die("Successful booking");
					}
		}
					