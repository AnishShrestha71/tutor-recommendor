

<div class="container">
	<!-- <h2>Example: Star Rating System with Ajax, PHP and MySQL</h2> -->
	<h2>Teacher </h2>
	<?php

	include_once 'Rating.php';

	$rating = new Rating();
	$TeacherList = $rating->getTeacherList();
	foreach($TeacherList as $Teacher){
		$average = $rating->getRatingAverage($Teacher["id"]);
		$count = $rating->getRatingTotal($Teacher['id']);
	?>
	<div class="row">
		
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><a href="teacher_detail.php?teacher_id=<?php echo $Teacher["id"]; ?>"><?php echo $Teacher["username"]; ?></a></h4>

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
	<!--	<div><span class="average"><?php printf('%.1f', $average); ?> <small>/ 5</small></span> <span class="rating-reviews"><a href="show_rating.php?product_id=<?php echo $product["id"]; ?>">Rating & Reviews</a></span></div>-->
	  <?php
	  
		  echo '<br>';
		 
		  echo $Teacher["Subject"];
		  echo '<br>';
		  echo $Teacher["Location"];


		 ?>
		</div>
	</div>
	<?php } ?>
</div>
</div>
