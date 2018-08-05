<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$communityColor = $categoryId = $communityName = $communityMessage = $communityType = $communityPhoto = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$communityColor = trim(filter_input(INPUT_POST,"community_color",FILTER_SANITIZE_STRING));
	$categoryId = intval(trim(filter_input(INPUT_POST,"category_id",FILTER_SANITIZE_STRING)));
	$communityName = trim(filter_input(INPUT_POST,"community_name",FILTER_SANITIZE_STRING));
	$communityMessage = trim(filter_input(INPUT_POST,"community_message",FILTER_SANITIZE_STRING));
    $communityDescription = trim(filter_input(INPUT_POST,"community_description",FILTER_SANITIZE_STRING));
	$communityType = trim(filter_input(INPUT_POST,"community_type",FILTER_SANITIZE_STRING));


    if($categoryId == "" || $communityName == "" || $communityMessage == "" || $communityDescription == ""){
        $_SESSION['create_error_message'] = "Please fill in the required fields: Category, Community Name, Community Message";
       $_SESSION['community_name'] = $communityName;
       $_SESSION['community_message'] = $communityMessage;
       $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php?school_name='. $urlCollegeName);
    }

    $getCommunityName = get_community_name($communityName,$collegeId);
    if (!empty($getCommunityName)) {
        $_SESSION['create_error_message'] = "Oops! Seems like the Community Name you chose is already taken. Try a different name!";
        $_SESSION['community_message'] = $communityMessage;
        $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php?school_name='. $urlCollegeName);
    }


    if ($_POST["address"] != "") {
        $_SESSION['create_error_message']  = "Bad form input";
        $_SESSION['community_name'] = $communityName;
        $_SESSION['community_message'] = $communityMessage;
        $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php');
    }

    $result = create_community($collegeId,$categoryId,$userId,$communityName,$communityMessage,$communityDescription,$communityType,$communityColor,$communityPhoto);
    if ($result) {
    	redirect('../community.php?school_name='. $urlCollegeName . '&category_id=' . $categoryId . '&community_id=' . $result['community_id'] . '&community_cat=' . $result['community_category'] );
    }else{
 		$_SESSION['create_error_message'] = "Something Went Wrong!";
       	$_SESSION['community_name'] = $communityName;
       	$_SESSION['community_message'] = $communityMessage;
        $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php?school_name='. $urlCollegeName);
    }

}


?>
