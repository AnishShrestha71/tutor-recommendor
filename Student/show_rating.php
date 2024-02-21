<?php
	include("Sdb.php");

	echo $_GET['Stdname'];

	$name = $_GET['Stdname'];


	if($name ==null) {

	echo "Student user name not found. Some error occured";



	}

	else {

	$sql = "SELECT *  FROM  teacherrating WHERE studentname ='$name' ";

	$result = $con->query($sql);

	 if ($result->num_rows > 0) {

											// output data of each row

	while($row = $result->fetch_assoc()) {?>
		<div class="col-md-3">

		<div class="single-tutor">
			<p><span> Teacher Name : </span><?php echo $row["teachername"] ?></p>
			<p><span> rating : </span><?php echo $row["rating"] ?></p>
			
			
		</div>

		</div>



		<?php 	}

										}

else echo '<h1 class="error_message" style="text-align: center;color: red;">No Result Found</h1>';										}

										?>





	</div>





