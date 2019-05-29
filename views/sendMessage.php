
<?php 
	// Get users from DB and add their id and Name to select tag
	
	echo "Database Connection <br>";
	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';	
	

	$con = mysqli_connect($host, $user, $pass); //Connect to db		
	
	mysqli_select_db($con, 'mech') //Select mech database



	$sql_query = "SELECT * FROM `users`";
	$result = mysqli_query($sql_query);

	$select = '<select name = "userID">'

	mysqli_error($con);
        
        //Fetch users and add to options
         while($row = mysqli_fetch_array($result , MYSQLI_ASSOC)){
            $name = $row['Name'];
            $ID = $row['user_id'];

            //Add these values to option tags

            $select .= '<option value="'.$ID.'">'.$name.'</option>';


        }
    $select.= '</select>';
    //select tag is closed


    //When Message is posted
    if(isset($_POST['submit'])){

    	// Get current user
    	$from_id = $_COOKIE['user'];

    	//Get select option
    	$to_id = $_POST['userID'];
    	
    	//Get message posted
    	$msg = $_POST['msg'];


    	$date = date("Y/m/d");

    	// Add these to message table

    	$sql_query = "INSERT into `messages` (`Message`, `to_id`, `user_id`, `Date`) VALUES ('$msg', '$to_id', '$from_id', '$date')";
    	//execute statement if message not empty
    	if($msg != '' || $msg != NULL){
    		mysqli_query($sql_query);
    		mysqli_error($con);
    	}


    }
   	



?>


<!DOCTYPE html>
<html>
<head>
	<title>Send Messge</title>
</head>
<body>

	<form action="sendMessage.php" method="POST">
		
		Select User to send to: <?php  $select    ?>
		<br>
		Message : <input type="text" name="msg">
		<br>
		<input type="submit" name="submit">

	</form>


</body>
</html>