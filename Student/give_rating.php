
<?php
	session_start();

	include("Sdb.php");

	/*if(isset($_GET['username']))
	{
		$_SESSION['username']=$_GET['username'];
		
	}
*/
	if(isset($_POST['submit']))
	{
		mysqli_query($con, "INSERT into `teacherrating` (studentname, teachername, rating) VALUES ('$_SESSION[username]','$_POST[TeacherName]',$_POST[rating])");
	}
?>
<p>Hey, <?php echo $_SESSION['username']; ?>!</p>



<form action="" method="post"> 
	
	<input type="text" name="TeacherName" id="TeacherName" placeholder="Teacher username " required="">
	<input type="number" name="rating" id="rating" placeholder="given rating to the Teacher" required="">
	<input type="submit" name="submit" value="submit">
</form>