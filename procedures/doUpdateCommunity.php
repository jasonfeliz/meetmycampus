<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$communityColor = $categoryId = $communityName = $communityMessage = $communityType =  $communityId = $communityDescription = $communityPhoto = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$communityColor = trim(filter_input(INPUT_POST,"community_color",FILTER_SANITIZE_STRING));
	$categoryId = intval(trim(filter_input(INPUT_POST,"category_id",FILTER_SANITIZE_STRING)));
	$communityName = trim(filter_input(INPUT_POST,"community_name",FILTER_SANITIZE_STRING));
	$communityMessage = trim(filter_input(INPUT_POST,"community_message",FILTER_SANITIZE_STRING));
    $communityDescription = trim(filter_input(INPUT_POST,"community_description",FILTER_SANITIZE_STRING));
	$communityType = trim(filter_input(INPUT_POST,"community_type",FILTER_SANITIZE_STRING));
	$communityId = intval(trim(filter_input(INPUT_POST,"c_id",FILTER_SANITIZE_STRING)));

    if($categoryId == "" || $communityName == "" || $communityMessage == "" || $communityDescription == ""){
        $_SESSION['settings_error'] = "Please fill in the required fields: Category, Community Name, Community Message, Community Description";
        redirect('../community-settings.php?c_id='.$communityId);
    }
   
    $oldCommunityName = get_community($communityId,$collegeId)['community_name'];
    if ($communityName != $oldCommunityName) {
    	 $getCommunityName = get_community_name($communityName,$collegeId);
	    if (!empty($getCommunityName)) {
	        $_SESSION['settings_error'] = "Oops! Seems like the Community Name you chose is already taken. Try a different name!";
	        redirect('../community-settings.php?c_id='.$communityId);
	    }
    }

    if ($_POST["address"] != "") {
        $_SESSION['settings_error']  = "Bad form input";
        redirect('../community-settings.php?c_id='.$communityId);
    }

    $date = date("Y-m-d h:i:s");
    $result = update_community($communityId,$categoryId,$communityName,$communityMessage,$communityDescription,$communityType,$communityColor,$date,$communityPhoto);
    if ($result) {
    	$_SESSION['settings_success'] = "Community settings has been successfully updated";
    	redirect('../community-settings.php?c_id='.$communityId);
    }else{
 		$_SESSION['settings_error'] = "Something Went Wrong!";
        redirect('../community-settings.php?c_id='.$communityId);;
    }

}

?>