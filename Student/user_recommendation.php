<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 
	include('Sdb.php');
	include ('recommend.php');

	$sql = mysqli_query($con,"SELECT * from teacherrating");

	$matrix = array();

	while($res = mysqli_fetch_array($sql))
	{
		$matrix[$res['studentname']][$res['teachername']] = $res['rating'];
	}

	echo "<pre>";
	print_r($matrix);
	echo "</pre>";
	
	$user = $_GET['Stdname'];

	

	
?>
	<h1> recommended teachers</h1>
 	
<?php 
	$recommndation =array();
	$recommendation = getRecommendation($matrix, $user);

	foreach ($recommendation as $teacher => $rating) {
	echo $rating;
?>
		
 
   <?php
   		$sql = "SELECT *  FROM  treg WHERE username='$teacher'";
   		$result = $con->query($sql);
	 if ($result->num_rows > 0) {
											// output data of each row
	while($row = $result->fetch_assoc()) {?>
			
	
		<div class="col-md-3"> 
		<div class="single-tutor">
		
			<p><span>Teacher id: </span><?php echo $row["id"] ?></p>
			<p><span>Teacher name:</span> <?php echo $row["username"] ?></p>
			<p><span>Subject:</span> <?php echo $row["Subject"] ?></p>
			<p><span>Location:</span> <?php echo $row["Location"] ?></p>

			<br>
			
		</div>
		</div>
	<?php }
	} ?>


<?php } ?>



</body>
</html> 