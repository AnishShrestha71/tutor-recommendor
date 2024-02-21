<?php 
	include('Sdb.php');

 	$teacher = $_GET['id'];
 	echo $teacher;

 	if($teacher==null) {

	echo "error occured";



	}

	else {

	$sql = "SELECT *  FROM  treg WHERE username = '$teacher' ";

	$result = $con->query($sql);

	 if ($result->num_rows > 0) {

											// output data of each row

	while($row = $result->fetch_assoc()) {?>
		<div class="col-md-3">

		<div class="single-tutor">
			<p><span> Teacher ID : </span><?php echo $row["id"] ?></p>
			<p><span> Teacher Name : </span><?php echo $row["username"] ?></p>
			<p><span> Subject: </span><?php echo $row["Subject"] ?></p>
			<p><span> location:</span> <?php echo $row["Location"] ?></p>
			
		</div>

		</div>



		<?php 	}

										}

else echo '<h1 class="error_message" style="text-align: center;color: red;">No Result Found</h1>';										}

										





	



?>