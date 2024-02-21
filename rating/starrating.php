<?php
class Rating{
	private $host  = '127.0.0.1';
    private $user  = 'root';
    private $password   = "";
    private $database  = "studentreg";
	private $StudentTable = 'sreg';
	private $TeacherTable = 'treg';
    private $TeacherRatingTable = 'rating';
	private $dbConnect = false;
	private $settingClass = 'loginRequired'; // value can be set to 'loginRequired' or '' ,customer need to be a registered buyer to rate the product





    public function __construct(){
        if(!$this->dbConnect){
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	public function getSetting(){
		return  $this->settingClass;
	}


	public function StudentLogin($username, $password){
		$sqlQuery = "
			SELECT *
			FROM ".$this->StudentTable"
			WHERE username='".$username."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}
	public function TeacherList(){
		$sqlQuery = "
			SELECT * FROM ".$this->TeacherTable;
		return  $this->getData($sqlQuery);
	}
	public function getProduct($teacher_id){
		$sqlQuery = "
			SELECT * FROM ".$this->TeacherTable."
			WHERE id='".$teacher_id."'";
		return  $this->getData($sqlQuery);
	}

	public function getTeacherRating($teacher_id){
		$sqlQuery = "
			SELECT r.rid, r.teacher_id,r.username, r.uid, s.usernmae, r.rating_score, r.comment, r.reviewer,r.created_at, r.updated_at
			FROM ".$this->TeacherRatingTable." as r
			LEFT JOIN ".$this->StudentTable." as s ON (r.uid = s.id)
			WHERE r.teacher_id = '".$teacher_id."' ORDER BY r.created_at DESC";
		return  $this->getData($sqlQuery);
	}

/*
	public function getProductRating($product_id){
		$sqlQuery = "
			SELECT r.id, r.product_id, r.rating_score, r.title, r.comment, r.reviewer, r.email, r.created_at, r.updated_at
			FROM ".$this->productRatingTable." as r WHERE r.product_id = '".$product_id."' ORDER BY r.created_at DESC";
		return  $this->getData($sqlQuery);
	}
	*/

	public function getRatingAverage($teacher_id){
		$TeacherRating = $this->getProductRating($teacher_id);
		$rating_score = 0;
		$count = 0;
		foreach($TeacherRating as $TeacherRatingDetails){
			$rating_score+= $TeacherRatingDetails['rating_score'];
			$count += 1;
		}
		$average = 0;
		if($rating_score && $count) {
			$average = $rating_score/$count;
		}
		return $average;
	}

	public function getRatingTotal($teacher_id){

	 	$sqlQuery = "
			SELECT *
			FROM ".$this->TeacherRatingTable."  WHERE teacher_id = '".$teacher_id."'";

	  $count = $this->getNumRows($sqlQuery);

		return $count;
	}

/*
	public function saveRating($POST, $user_id){
		$insertRating = "INSERT INTO ".$this->productRatingTable." (product_id, user_id, rating_score, title, comments, created_at, updated_at) VALUES ('".$POST['product_id']."', '".$user_id."', '".$POST['rating']."', '".$POST['title']."', '".$POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);
	}
*/
	public function saveRating($POST){
		$insertRating = "INSERT INTO ".$this->TeacherRatingTable." (teacher_id,  rating_score, comment,reviewer, created_at, updated_at) VALUES ('".$POST['product_id']."',  '".$POST['rating']."', '".$POST['comment']."', '".$POST['reviewer']."',  '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
		mysqli_query($this->dbConnect, $insertRating);
	}


}
?>
