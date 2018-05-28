<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$reviewCategoryId = $rating = $reviewDescription =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewCategoryId = intval(trim(filter_input(INPUT_POST,"review-category-id",FILTER_SANITIZE_STRING)));
    $ratingId = intval(trim(filter_input(INPUT_POST,"rating",FILTER_SANITIZE_STRING)));
  	$reviewDescription = trim(filter_input(INPUT_POST,"review-description",FILTER_SANITIZE_STRING));


    if($ratingId == "" || $reviewDescription == ""){
      $_SESSION['create_error_message'] = "Please fill in the required fields: Event Type, Event Description, Event Location";
      $_SESSION['review-description'] = $reviewDescription;
      $_SESSION['rating'] = $ratingId;
      redirect('../reviews.php?school_name='. $urlCollegeName);
    }

    if ($_POST["address"] != "") {
      $_SESSION['create_error_message']  = "Bad form input";
      $_SESSION['review-description'] = $reviewDescription;
      $_SESSION['rating'] = $ratingId;
      redirect('../reviews.php?school_name='. $urlCollegeName);
    }

    $result = create_review($collegeId,$reviewCategoryId,$ratingId,$userId,$reviewDescription);
    if ($result) {
        redirect('../reviews.php?school_name='. $urlCollegeName);    	
    }else{
      $_SESSION['create_error_message']  = "Something went wrong!";
      $_SESSION['review-description'] = $reviewDescription;
      $_SESSION['rating'] = $ratingId;
      redirect('../reviews.php?school_name='. $urlCollegeName);
    }

}


?>