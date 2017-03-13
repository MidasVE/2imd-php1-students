<?php
   
    // check of er gepost is?
    if( !empty( $_POST ) )
    {
        // controle of alles is ingevuld
       if( !empty( $_POST['username'] ) && !empty( $_POST['password'] ) && isset( $_POST['robot'] ) ){
       
        // connectie maken met sql
        $conn = new PDO('mysql:host=localhost;dbname=spotify', "root", "");
       
        // insert query: gegevens naar databank sturen
        $email = $_POST["username"];
		$options = [
			'cost'=>12,	
		];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT,$options);
		$sth = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password);");
		$sth->bindParam(':email', $email);
		$sth->bindParam(':password', $password);
			// Or sth->bindParam(':name', $_POST['namefromform']); depending on application
		$sth->execute();
        if( $sth -> execute() )
        {
            // OK
            session_start();
            $_SESSION["user"] = $email;
            header("Location: login.php");
        }
        else
        {
            echo "<h1>Oops, something went terribly wrong</h1>";
        }
       
	   }
	   }
   
   
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style>
		body
		{
			background-image: url(https://images.pexels.com/photos/26504/pexels-photo.jpg?w=1260&h=750&auto=compress&cs=tinysrgb);
			background-size: cover;
			font-family:montserrat;
			color:white;
		}
		.container
		{
			display:flex;
			flex-wrap:wrap;
			flex-direction:row;
			width:80%;
			margin:auto;
			height:100vh;
			justify-content:space-around;
			align-items: center
		}
		.title
		{
			color: green;
			font-size:1.5em;
		}
		.form
		{
			border-right:2px solid white;
			padding-right:50px;
			width:30%;
		}
		.logosp
		{
			background-image: url(http://shamtrax.com/wp-content/uploads/2015/04/6274-spotify-logo-horizontal-white-rgb.png);
			width:160px;
			background-size: cover;
			height:50px;
			margin:auto;
			margin-bottom:20px;
		}
		.loginfb
		{
			background-color: #3b5998;
			width:100%;
			height:50px;
			border-radius:50px;
			cursor:pointer;
			margin-bottom:20px;
		}
		.loginfb p
		{
			margin:auto;
			color:white;
			width:230px;
			height:10px;
			padding-top:15px;
		}
		.username
		{
			display:flex;
			flex-direction: column;
			flex-wrap:wrap;
		}
		.password
		{
			display:flex;
			flex-direction: column;
			flex-wrap:wrap;
		}
		.robot
		{
			display:flex;
			flex-direction: row;
			flex-wrap:wrap;
			background-color: dimgray;
			margin-bottom:20px;
		}
		label
		{
			margin-bottom:20px;
		}
		input
		{
			margin-bottom:20px;
		}
		input[type="text"]
		{
			border:none;
			border-bottom:2px solid white;	background:transparent;
		}
		input[type="password"]
		{
			border:none;
			border-bottom:2px solid white;	background:transparent;
		}
		input[type="checkbox"]
		{
			margin-top:18px;
			margin-left:20px;
			margin-right:25px;
		}
		button
		{
			width:100%;
			height:50px;
			border:2px solid white;
			border-radius:50px;
			font-family:montserrat;
			color:white;
			background:transparent;
			font-size:1.5em;
			cursor:pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="form">
			<div class="logosp"></div>
			<div class="loginfb">
				<p>
					REGISTER WITH FACEBOOK
				</p>
			</div>
			<form action="" method="post">
				<div class="username">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" placeholder="Your email or username"></div>
				<div class="password">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="Your password">
				</div>
				<div class="robot">
				<input type="checkbox" name="robot" id="robot" value="I'm not a robot">
				<p>I'm not a robot</p>
				</div>
				<button>
					Register
				</button>
			</form>
		</div>
		<div class="title">
			<H1>Get the right music, right now</H1>
		</div>
	</div>
</body>
</html>