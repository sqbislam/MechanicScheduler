<?php 

//GET current user id from COOKIE
$userID = $_COOKIE['user'];

$div = "<div>";

// Fetch messages and names from messages table only where to_id is the current user ID
$sql_query = "SELECT * FROM `messages` WHERE `to_id` = '$userID'";

$result = mysqli_query($sql_query);


	while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){
		
		$from_id = $row['from_id'];

		//Get name from user table
		$query = "SELECT * FROM `users` WHERE `user_id` = '$from_id'";
		$result = mysqli_query($query);
		$nrow = mysqli_fetch_assoc($result);
		$name = $nrow['Name'];
		
		//Get the message
		$msg = $row['Message'];

		//Format and add inside div
		$div .= '<h5>'.$name.'</h5> <br>';
		$div .= '<p>'.$msg.'</p> <br><br>';

	}

	$div .= '</div>';	

?>


<html>
<head>
	<title></title>
</head>
<body>

<?php 
	
	$div

?>
</body>
</html>