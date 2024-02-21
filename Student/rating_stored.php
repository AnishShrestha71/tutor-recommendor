<?php

	session_start();
	include('Sdb.php');

	$stdname = $_SESSION['username'];
	$teaname = $_GET['id'];

	if(isset($_POST['submit']))
	{
		mysqli_query($con, "INSERT into `teacherrating` (studentname, teachername, rating) VALUES ('$stdname','$teaname',$_POST[rating])");

		echo "thank you for rating <a href='dashboard.php'>Home page</a>";

	}
	else
	{
		echo "error occured";
	}
?>