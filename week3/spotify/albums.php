<?php
	session_start();
	$artistid=$_GET['artistid'];
	if ( isset($_SESSION['user'] ) ){
		
	}
	else{
		header('Location: login.php');
	}
		/*$con = new mysqli("localhost","root","","spotify");
		$query = "SELECT * FROM albums WHERE (artist_id = '".$artistid."');";
		$result = $con->query($query);
		while( $row = mysqli_fetch_array($result) ){
			echo "<a href='http://localhost/lesweek3/exercise/tracks.php?albumid=".$row['id']."'><div class='artists'><img class='photo' src='".$row['cover']."' alt='cover'><p class='artisname'>".$row['title']."</p></div></a>";
		}*/
		$conn = new PDO('mysql:host=localhost;dbname=spotify', "root", "");
		$sth = $conn->prepare("SELECT * FROM albums WHERE artist_id = :id;");
		$sth->bindParam(':id', $artistid);
		// Or sth->bindParam(':name', $_POST['namefromform']); depending on application
		$sth->execute();
		
		$sth2 = $conn->prepare("SELECT * FROM tracks WHERE album_id = :albId");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Albums</title>
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
	<?php while( $row = $sth->fetch() ):?>
		<?php
			$sth2->bindParam(':albId',$row['id']);
			$sth2->execute();	
		?>
		<a href='tracks.php?albumid=<?php echo $row['id']?>'><div class='artists'><img class='photo' src='<?php echo $row['cover']?>' alt='cover'><p class='artisname'><?php echo $row['title']?></p></div></a>
		<?php while($track = $sth2->fetch()):?>
			<p><?php echo $track['title']?></p>
		<?php endwhile; ?>
	<?php endwhile; ?>	
	</div>
</body>
</html>