<?php
	header('Refresh: 5; url=http://localhost/farm/login.php');

	require_once('connectvars.php');
	
		//Grab the bio data from post
		$username = $_POST['username'];
		$email = $_POST['email'];
		$location = $_POST['location'];
		$number = $_POST['number'];
		$password = $_POST['password'];

		
		
		//Write the data into the database
		$query = "INSERT INTO biodata VALUES(0,'$username','$email','$location','$number')";
		mysqli_query($dbc,$query);

		$query1 = "INSERT INTO user VALUES('$username','$password')"
		or die('Error querying database');
		
		mysqli_query($dbc,$query1);

		echo 'Hey <strong>'.$username;
		echo '</strong>,<br />Your data has been submitted successfully submitted <br />';
		echo 'In 5 seconds, you\'ll be taken to the login page';
		mysqli_close($dbc);
			
?>
