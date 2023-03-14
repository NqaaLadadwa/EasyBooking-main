<?php
class Rating{
	private $host  = '127.0.0.1';
    private $user  = 'root';
    private $password   = "1234";
    private $database  = "easybooking";
    private $RatingTable = 'rating';
	private $dbConnect = false;





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


	


	public function gethallRating($hall_id){
		$sqlQuery = "
			SELECT r.id, r.user_id,r.hall_id, r.rating_number
			FROM ".$this->RatingTable." as r WHERE r.hall_id = '".$hall_id."' ";
		return  $this->getData($sqlQuery);
	}
	

	public function getRatingAverage($hall_id){
		$hallRating = $this->gethallRating($hall_id);
		$rating_score = 0;
		$count = 0;
		foreach($hallRating as $hallRatingDetails){
			$rating_score+= $hallRatingDetails['rating_number'];
			$count += 1;
		}
		$average = 0;
		if($rating_score && $count) {
			$average = $rating_score/$count;
		}
		return $average;
	}

	public function getRatingTotal($hall_id){

	 	$sqlQuery = "
			SELECT *
			FROM ".$this->RatingTable."  WHERE hall_id = '".$hall_id."'";

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
		$insertRating = "INSERT INTO ".$this->RatingTable." (user_id,hall_id,rating_number,description) VALUES (  '".$POST['user_id']."','".$POST['hall_id']."','".$POST['rating']."','".$POST['description']."')";
		mysqli_query($this->dbConnect, $insertRating);
	}


}
?>
