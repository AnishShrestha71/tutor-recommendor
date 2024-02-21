<?php
//include auth_session.php file on all user panel pages
include("Sauth_session.php");



?>
<!DOCTYPE html>
<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<?php include ('header.php'); ?>
	<section id="tutorlist">
<div class="p-3">
<h2>Searched Result</h2>
	<div class="row mb-4">

	

	<?php

	$host="localhost";
	$username="root";
	$password="";
	$dbName="studentreg";

	// Check connection
	$conn = new mysqli($host, $username, $password, $dbName);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sub=$_POST['subject'];

	//$loc=$_POST['country'];

	if($sub==null) {

	echo "Some Technical Error Occured";



	}

	else {

	$sql = "SELECT *  FROM  treg WHERE Subject='$sub'  ";

	$result = $conn->query($sql);

	 if ($result->num_rows > 0) {

											// output data of each row

	while($row = $result->fetch_assoc()) {?>
		<div class="col-md-3">

		<div class="single-tutor line card mb-4">
		<div class="content  py-3">
			<p><span> Teacher Name : </span><?php echo $row["id"] ?></p>
			<p><span> Teacher Name : </span><?php echo $row["username"] ?></p>
			<p><span> Subject: </span><?php echo $row["Subject"] ?></p>
			<p><span> location:</span> <?php echo $row["Location"] ?></p>
		</div>
			
		</div>

		</div>



		<?php 	}

										}

else echo '<h1 class="error_message" style="text-align: center;color: red;">No Result Found</h1>';										}

										?>





	</div>

</div>



</section>

	
	</body>
</html>

