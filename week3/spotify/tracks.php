<?php
	session_start();
	$albumid=$_GET['albumid'];
	if ( isset($_SESSION['user'] ) ){
		
	}
	else{
		header('Location: login.php');
	}
		/*$con = new mysqli("localhost","root","","spotify");
		$query = "SELECT * FROM albums WHERE (id = '".$albumid."');";
		$result = $con->query($query);
		$res = $result->fetch_assoc();
		echo "<div class='artists'><img class='photo' src='".$res['cover']."' alt='cover'><p class='artisname'>".$res['title']."</p></div>";
		$query2 = "SELECT * FROM tracks where(album_id='".$albumid."');";
		$result2 = $con->query($query2);
		while( $row = mysqli_fetch_array($result2) ){
			echo"<p>".$row['title']."</p>";
		}*/
		$conn = new PDO('mysql:host=localhost;dbname=spotify', "root", "");
		$sth = $conn->prepare("SELECT * FROM albums WHERE id = :id;");
		$sth->bindParam(':id', $albumid);
		// Or sth->bindParam(':name', $_POST['namefromform']); depending on application
		$sth->execute();
		$res = $sth->fetch();
		$sth2 = $conn->prepare("SELECT * FROM tracks WHERE album_id = :id;");
		$sth2->bindParam(':id', $albumid);
		// Or sth->bindParam(':name', $_POST['namefromform']); depending on application
		$sth2->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tracks</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style>
		body
		{
			background-color: #121314;
			font-family: montserrat;
			color:white;
		}
		.container
		{
			width:80%;
			margin:auto;
			display:flex;
			flex-direction: column;
			flex-wrap: wrap;
			justify-content:space-around;
		}
		.artists
		{
			background-color: #222326;
			height:150px;
			width:100%;
			margin:50px;
			display:flex;
			flex-direction: row;
			cursor:pointer;
		}
		a
		{
			text-align: center;
			text-decoration: none;
			color:white;
			font-family:montserrat
		}
		.photo
		{
			background-color: white;
			order:-1;
			width:150px;
			height:150px;
			margin-right:50px;
		}
		.logout
		{
			background: transparent;
			border:2px solid white;
			width:100px;
			height:50px;
			border-radius:50px;
			float:right;
			margin-right:100px;
		}
	</style>
</head>
<body>
<a href="login.php?logout=true"><div class="logout"><p>Log Out</p></div></a>
<div class="container">
	<!--<div class="artists"><div class="photo"></div><p class="artisname"></p></div>-->
	<?php

		echo "<div class='artists'><img class='photo' src='".$res['cover']."' alt='cover'><p class='artisname'>".$res['title']."</p></div>";
		while( $row = $sth2->fetch() ){
			echo"<p>".$row['title']."</p>";
		}
	?>	
	</div>
</body>
</html>