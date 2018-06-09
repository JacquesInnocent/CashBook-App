<?php
    require_once("connectvars.php");
    $error ="Please enter your credentials to log in";

    
    session_start();


    //3.If the form is submitted or not
    //3.1 If the form is submitted
    if(isset($_POST['username']) and isset($_POST['password'])) {
        //3.1.1 Assigning posted values to variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        //3.1.2 Checking the values are existing in the database
        $query ="SELECT * FROM user WHERE password ='$password' and username ='$username'";
        $result = mysqli_query($dbc,$query)
        or die('Error querying database');
        $count = mysqli_num_rows($result);

        //3.1.2 If the posted values are equal to the database values, then session will be created for the user
        if ($count == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        } else {
            //3.1.3 If the login credentials don't match, user will be shown an error message
            $error = "Invalid Login credentials.";
        }
    }
    //3.1.4 if the user is logged in, system greets the user with a message
    if(isset($_SESSION['username'])) {
        header("location: cashin.html");
    }
?>

<html>
<head>
	<title>CASH BOOK</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="shortcut icon" href="img.ico">
	<link href="https://fonts.googleapis.com/css?family=Gudea|Roboto:700" rel="stylesheet"> 
</head>
<body>
	<div class="main">
		<form action="login.php" method="post">
			<h1 class="fleak">CASH BOOK</h1>
			<p>
			    <input class="username thing" type="username" name="username" placeholder="Username">
		    </p>
		    <p>
				<input class="password thing" type="password" name="password" placeholder="Password">
		    </p>
		    <p>
		    	<span>
					<input class="checkbox" type="checkbox"><label class="remember" for="checkbox">Remember me.</label>
					<a href="" id="ehh">Forgot password?</a>
				</span>
			</p>	
			<button class="button" type="submit" name="login">Login</button><br>
		</form>
		 <div style ="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		<div>
				<br>
				<span>Not a member yet?</span>
				<span><a href="signup.html"><button class="button">Signup</button></a></span>
			</div>	
	</div>
</body>
</html>