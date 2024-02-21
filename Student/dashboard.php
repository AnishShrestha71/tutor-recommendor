<?php
//include auth_session.php file on all user panel pages
include("Sauth_session.php");



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
	<?php include ('header.php'); ?>
	
    <div class="form">
        <p class="text-secondary">Hey, <?php echo $_SESSION['username']; ?>!</p>
         
        <p class="text-secondary">You are now user dashboard page.</p>
        

		<?php 
		$Ustu =  $_SESSION['username'];
		//echo $Ustu ;
		include("Sdb.php");
		$sql = "SELECT *  FROM  student WHERE username='$Ustu'";
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

					//echo $uloc;
									
						?>
			
		
		
		<!-- <form method="POST" action="search_result.php" class="mb-3 ">
			<input type= "text" name="subject" id="subject" class="form-control mb-2" placeholder="Enter the subject for your tutor">
			<button   class="btn btn-warning">search</button>
		</form> -->
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

        <!-- <p><a style="text-decoration:none" class="text-info" href="teacher_search.php">search for teacher</a></p> -->
    </div>

    <!-- <form action="give_rating.php">
			<input type="submit" name="gotorating" class="btn-btn-priamry" value="Give Rating">
			<input type="hidden" name="Stdname" value="<?php echo $_SESSION['username']?>">
	</form> -->

	<!-- <form action="show_rating.php">
			<input type="submit" name="showrating" class="btn-btn-priamry" value="Show Rating">
			<input type="hidden" name="Stdname" id="Stdname" value="<?php echo $_SESSION['username']?>">
	</form> -->
	
	<!-- <form action="user_recommendation.php">
			<input type="submit" name="showteacher" class="btn-btn-priamry" value="Show user_recommendation">
			<input type="hidden" name="Stdname" id="Stdname" value="<?php echo $_SESSION['username']?>">
	</form>
 -->
	

	<?php 
		include ('recommend.php');
		include('Sdb.php');
	
		$sql = mysqli_query($con,"SELECT * from teacherrating");

		$matrix = array();

		while($res = mysqli_fetch_array($sql))
		{
			$matrix[$res['studentname']][$res['teachername']] = $res['rating'];
		}

	/*echo "<pre>";
	print_r($matrix);
	echo "</pre>";*/
	
		$user =  $_SESSION['username'];

	

	
	?>
 	<h1 class="mx-4">Recommended teachers</h1>
	
	<?php 
	

	 $query    = "SELECT * FROM `teacherrating` WHERE studentname='$user'";
	 $result = mysqli_query($con, $query) or die(mysql_error());
	 $rows = mysqli_num_rows($result);
	  if ($rows == 0)
	  {
	  	echo "";
	  }
	 
	else{
	
		$recommndation =array();
		$recommendation = getRecommendation($matrix, $user);
		
		echo '<div class="row p-3 ">'; 
		foreach ($recommendation as $teacher => $rating) {
	
	?>

   		<?php
   		$sql = "SELECT *  FROM  treg WHERE username='$teacher'";
   		$result = $con->query($sql);

	 if ($result->num_rows > 0) {
									// output data of each row
	while($row = $result->fetch_assoc()) {?>
	
	
		<div class="col-md-3 p-3 mb-4"> 
		<div class="single-tutor line card">
			<div class="content  py-3">
			<p><span>Predicted rating= </span><?php echo $rating ?></p>
			<p><span>Teacher id: </span><?php echo $row["id"] ?></p>
			<p><span>Teacher name:</span> <?php echo $row["username"] ?></p>
			<p><span>Subject:</span> <?php echo $row["Subject"] ?></p>
			<p><span>Location:</span> <?php echo $row["Location"] ?></p>
			<p><span>Email:</span> <?php echo $row["email"] ?></p>
			<p><span>Experience:</span> <?php echo $row["Experience"] ?></p>


			</div>

			<div class="rating mx-auto pb-4">
			<a style="text-decoration:none"  href="rr.php?id=<?php  echo $row["username"] ?>">
			<button class="btn btn-outline-danger">
				Give Rating
			</button>
			</a>
			</div>
			
			
		</div>
		</div>
		
	<?php } } 
	} 
	echo '</div>';?>
	


<?php } ?>


<?php 
			$stu =  $_SESSION['username'];
			//echo $stu ;
			include("Sdb.php");
			$sql = "SELECT *  FROM  student WHERE username='$stu'";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
			if($row = $result->fetch_assoc()) {?>


			<div class="col-md-3"> 
			<div class="single-tutor line">

			 <?php  $row["id"] ?>
		 	<?php  $row["username"] ?>

 <?php $loc= $row["Location"] ?>

</div>
</div>

<?php 	}
										}
										
										//echo $loc;

										
										
										
										
										
										?>


<h1  class="mx-4">Teachers of <?php echo $loc; ?></h1>

<?php //echo $loc; 
										
	include("Sdb.php");
										
			$sql = "SELECT *  FROM  treg WHERE Location ='$loc' AND Experience >= '2' AND Average >= '60'";
			$result = $con->query($sql);
			if ($result->num_rows > 0) {
				echo '<div class="row mb-3 p-3">';
				// output data of each row
			while($row = $result->fetch_assoc())  {?>


			<div class="col-md-3 p-3 mb-4 "> 
			<div class="card line">
			<div class="content py-3">
			<p><span>Teacher id: </span><?php echo $row["id"] ?></p>
			<p><span>Teacher name:</span> <?php echo $row["username"] ?></p>
			<p><span>Subject:</span> <?php echo $row["Subject"] ?></p>
			<p><span>Location:</span> <?php echo $row["Location"] ?></p>
			<p><span>Email:</span> <?php echo $row["email"] ?></p>
			<p><span>Experience:</span> <?php echo $row["Experience"] ?> years</p>

			</div>

			<div class="rating mx-auto pb-4">
			<a style="text-decoration:none"  href="rr.php?id=<?php  echo $row["username"] ?>">
			<button class="btn btn-outline-danger">
				Give Rating
			</button>
			</a>
			</div>

			

			


</div>
</div>

<?php 	}echo '</div>';
			}
			
			?>








<h1  class="mx-4">Teachers available</h1>

    <?php
    include("Sdb.php");
    $sql = "SELECT *  FROM  treg";
	$result = $con->query($sql);
	 if ($result->num_rows > 0) {
		echo '<div class="row p-3">';
											// output data of each row
	while($row = $result->fetch_assoc()) {?>
	
	
		
		<div class="col-md-3 p-3 mb-4 px-6 line">
		<div class="card">
			<div class="content py-3">
			<p >Teacher id: <?php echo $row["id"] ?></p>
			<p>Teacher name: <?php echo $row["username"] ?></p>
			<p>Subject: <?php echo $row["Subject"] ?></p>
			<p>Location: <?php echo $row["Location"] ?></p>
			<p><span>Email:</span> <?php echo $row["email"] ?></p>
			<p><span>Experience:</span> <?php echo $row["Experience"] ?> years</p>

			</div>
			<div class="rating mx-auto pb-4">
			<a style="text-decoration:none"  href="rr.php?id=<?php  echo $row["username"] ?>">
			<button class="btn btn-outline-danger">
				Give Rating
			</button>
			</a>
			</div>
			<!-- <a style="text-decoration:none" class="rating" href="rr.php?id=<?php  echo $row["username"] ?>">Give Rating</a> -->
		</div>
		</div>
		
		
		<?php 	}echo '</div>';
										} ?>


 	
			

			
		





		
</body>
</html>
