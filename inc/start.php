<?php

$loggedIn = $categories = $userSchool  = $urlCollegeName = $userFirstName = $userLastName = $userName = $userEmail = $communityId = $categoryId = $userId = $userInfo= $majorConstant = $storyConstant = $communityConstant = $getVar = $onClick = $disableComment = $userAbbrev = "";
$_SESSION['redirect_location'] =  $_SERVER["REQUEST_URI"];

$loggedIn = authenticate_user();
if(!$loggedIn){
	$onClick = ' onclick="not_signed_in_modal()" ';
	$disableComment = 'disabled';
	$userId = 0;
}

if ($loggedIn){
	$userId = $_COOKIE['user_id'];
	$userInfo = get_user_info($userId);
	$userFirstName = ucfirst($userInfo['firstName']);
	$userLastName =  ucfirst($userInfo['lastName']);
	$userAbbrev = strtoupper(substr($userFirstName,0,1). substr($userLastName, 0,1));
	$userName = $userInfo['userName'];
	$userEmail = $userInfo['email'];
	$userSchool = $userInfo['university'];

}
$universitySearched = $userSchoolName = "";
if ($loggedIn && empty($_GET['school_name'])) {
	$schoolInfo = get_school_info($userSchool);
	$studentList = get_students($schoolInfo['college_id'],$_COOKIE['user_id']);
	if(!empty($_GET['profile_id'])){
			$profileId = intval(trim(filter_input(INPUT_GET, 'profile_id', FILTER_SANITIZE_STRING)));
	}
}elseif ($loggedIn && !empty($_GET['school_name'])) {
	$universitySearched = trim(filter_input(INPUT_GET, 'school_name', FILTER_SANITIZE_STRING));
	$schoolInfo = get_school_info($universitySearched);
	$studentList = get_students($schoolInfo['college_id'],$_COOKIE['user_id']);
	if(!empty($_GET['profile_id'])){
			$profileId = intval(trim(filter_input(INPUT_GET, 'profile_id', FILTER_SANITIZE_STRING)));
	}
}elseif (!empty($_GET['school_name'])) {
	$universitySearched = trim(filter_input(INPUT_GET, 'school_name', FILTER_SANITIZE_STRING));
	$schoolInfo = get_school_info($universitySearched);
	$studentList = get_students($schoolInfo['college_id'],null);
}

if (!empty($schoolInfo)) {
	$collegeId = $schoolInfo['college_id'];
	$collegeName = $schoolInfo['uni_name'];
	$urlCollegeName = urlencode($schoolInfo['uni_name']);
	$collegeCity = $schoolInfo['city'];
	$collegeState = $schoolInfo['state'];
	$collegeUrl = $schoolInfo['email_url'];
	$collegeAbrev = '@'.ucfirst($schoolInfo['uni_abrev']);
	$categories = get_all_categories();
	$communities = get_all_communities($collegeId,NULL);
	$stories = get_all_stories($collegeId,NULL);
	$majors = get_all_majors($collegeId);
	$studentCount = intval(get_user_count($collegeId,NULL,NULL));
	$communityCount = intval(count(get_all_communities($collegeId,NULL)));
}elseif(!empty($_GET['profile_id'])){
		$profileId = intval(trim(filter_input(INPUT_GET, 'profile_id', FILTER_SANITIZE_STRING)));
}else {
    $_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
    $_SESSION['system_error_message'] = "could not retrieve school info";
    redirect("error_page.php");
}
?>