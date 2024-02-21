<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
	<?php
	session_start();
	include('Sdb.php');

	//echo $_SESSION['username']."</br>";

	//echo $_GET['id']."</br>";


 

	$stdname = $_SESSION['username'];
	$teaname = $_GET['id'];

	 $sql = mysqli_query($con, "SELECT `studentname` AND `teachername` FROM `teacherrating` WHERE studentname = '".$stdname."'AND teachername =  '".$teaname."'");

        if (mysqli_num_rows($sql)>0) 
        { 
            die ("rating already given rating to this teacher. Go back to  <a href='dashboard.php'>Home page</a>"); 
        } 
        else
        {
        	echo "";
        }

	

?>
<p>Hey, <?php echo $stdname; ?>!</p>
<p>Give rating to teacher <?php echo $teaname ?></p>


<form action="rating_stored.php?id=<?php  echo $_GET['id'] ?>" method="post"> 
	<div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
     </div>
	
	<span class='result'>0</span>

	<input type="hidden" name="rating">
	
	<input type="submit" name="submit" value="submit">
</form>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

	<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>

</body>
</html>
