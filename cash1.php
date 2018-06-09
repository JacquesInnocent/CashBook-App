<?php
	header('Refresh: 0.1; url=http://localhost/farm/cashout.html');

	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	require_once('connectvars.php');

	$items =$_POST['Items'];
	$activity = $_POST['Activity'];
	$Description = $_POST['Description']; 
	$Amount = $_POST['Amount'];

	$query = "INSERT INTO cashout VALUES('$username','$password','$items','$activity','$Description','$Amount')";
	mysqli_query($dbc,$query); 

	mysqli_close($dbc);

?>