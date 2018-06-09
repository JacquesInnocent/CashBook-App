<?php
		session_start();
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$cashin =0;
		$cashout =0;
		$balance = 0;
		
		require_once('connectvars.php');

		$query= "SELECT * FROM cashin where password ='$password'";

		$data = mysqli_query($dbc, $query);
?>

	<html>
	<title>Report</title>
	<link rel="stylesheet" href="css/style.css">

	<body>

	<center>
	<h1>Cash In</h1>
	<?php

		echo '<table class="responstable">';
		echo '<tr>	<th>Items</th><th>Activity</th><th>Description</th><th>Amount</th>';
		
		while($row = mysqli_fetch_array($data)){
			echo '<tr><td>'.$row['items'].'</td><td>'.$row['activity'].'</td><td>'.$row['description'].'</td><td> Sh.'.$row['amount'].'</td>';
			echo '</tr>';
			$cashin +=$row['amount'];

		} 

		echo '</table>';
	?>
		<hr />

		<h1>Cash Out</h1>
	
		<table class = "responstable">
		<tr><th>Items</th><th>Activity</th><th>Description</th><th>Amount</th>
		
		<?php
			require_once('connectvars.php');
			$query1= "SELECT * FROM cashout where password ='$password'";
			$result = mysqli_query($dbc,$query1)
			or die('Error querying database');
			$data1 = mysqli_query($dbc, $query);
	

			while($row = mysqli_fetch_array($result)){
				echo '<tr><td>'.$row['items'].'</td><td>'.$row['activity'].'</td><td>'.$row['description'].'</td><td> Sh.'.$row['amount'].'</td>';
				echo '</tr>';
				$cashout +=$row['amount'];
			} 
		?>
		</table>
		<hr/>

		<?php
			
			$balance = $cashin -$cashout;
			if($balance < 0){
				echo $username.", you've made a loss of $".$balance;
			}
			if($balance >0){
				echo $username.", you've made a profit of $".$balance;
			}
		?>

	