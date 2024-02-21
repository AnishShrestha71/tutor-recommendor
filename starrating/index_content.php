
<div class="container">
	
	<h2>Star Rating System</h2>
	<?php

	include_once 'Rating.php';

	$rating = new Rating();
	$productList = $rating->getTeacherList();
	foreach($productList as $teacher){
		$average = $rating->getRatingAverage($teacher["id"]);
		$count = $rating->getRatingTotal($teacher['id']);
	?>
	<div class="row">
		
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><a href="product_detail.php?teacher_id=<?php echo $teacher["id"]; ?>"><?php echo $teacher["username"]; ?></a></h4>

		<?php



				//$averageRating = round($average, 0);
				for ($i = 1; $i <= 5; $i++) {
					$ratingClass = "star-grey";
					if($i <= $average) {
						$ratingClass = "star-highlight";
					}


				echo	'<i class="fa fa-star '.$ratingClass. '"; aria-hidden="true"></i>';

				 }
				echo $count . ' Reviews';
			?>
	
	  <?php
		  echo '<br>';
		  echo '<div class = "product_price">$'.$teacher["Subject"].'</div>';
		  echo $teacher["Location"];

		 ?>
		</div>
	</div>
	<?php } ?>
</div>
</div>
