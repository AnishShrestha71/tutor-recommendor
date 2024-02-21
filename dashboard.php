<?php
//include auth_session.php file on all user panel pages
include("Tauth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<?php include ('header.php'); ?>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now a teacher. Good Luck</p>
        <p><a href="Tlogout.php">Logout</a></p>
		
		<?php 
		$Ustu =  $_SESSION['username'];
		//echo $Ustu ;
		include("Sdb.php");
		$sql = "SELECT *  FROM  treg WHERE username='$Ustu'";
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
		if($row = $result->fetch_assoc()) {?>


		<div class="col-md-3"> 
		<div class="single-tutor">

		
		 <?php $uemail= $row["email"] ?></p>

		 <?php $uloc= $row["Location"] ?></p>
		 <?php $row["email"] ?></p>


		</div>
		</div>

		<?php 	}
					}

					echo $uloc;
									
						?>
						<a style="text-decoration:none" class=" text-light" href="update.php?location=<?php  echo $uloc ?>&email=<?php  echo $uemail ?>">
						<button class="btn btn-secondary mb-3">
		Update
		</button>
		</a>

		<a style="text-decoration:none" class="text-light" href="Slogout.php">			
		<button class="btn btn-success mb-3">
			Log Out
		</button>
		</a>
    </div>



    <?php
    include("Sdb.php");
    $sql = "SELECT *  FROM  student";
	$result = $con->query($sql);
	 if ($result->num_rows > 0) {
		echo '<div class="row p-3">';
												// output data of each row
	while($row = $result->fetch_assoc()) {?>
	
	
		<div class="col-md-3"> 
		<div class="single-tutor card line">
		
		
			<p><span>Student name:</span> <?php echo $row["username"] ?></p>
			<p><span>email:</span> <?php echo $row["email"] ?></p>
			<p><span>Location:</span> <?php echo $row["Location"] ?></p>
			<br><br>
			
		</div>
		</div>
		
		<?php 	}
										}
										echo "</div>"; ?>


</body>
</html>