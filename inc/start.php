<?php
ob_start();
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
	$userInfo = new User($connect,$_COOKIE['user_id']);
	$userFullName = $userInfo->get_full_name();
	$userAbbrev = $userInfo->get_abbrevated_name();
	$userName = $userInfo->get_username();
	$userEmail = $userInfo->get_user_email();
	$userSchool = $userInfo->get_user_school();
	$userType = $userInfo->get_user_type();
	$userDeletedStatus = $userInfo->is_deleted();
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
	if(empty($schoolInfo)){
	    $_SESSION['school_search'] = $universitySearched;
	    redirect("search_college.php");
	}
}elseif (!empty($_GET['school_name'])) {
	$universitySearched = trim(filter_input(INPUT_GET, 'school_name', FILTER_SANITIZE_STRING));
	$schoolInfo = get_school_info($universitySearched);
	if(empty($schoolInfo)){
	    $_SESSION['school_search'] = $universitySearched;
	    redirect("search_college.php");
	}
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
	$majors = get_all_majors($collegeId,NULL); //TO-DO
	$studentCount = intval(get_user_count($collegeId,NULL,NULL));
	$communityCount = intval(count(get_all_communities($collegeId,NULL)));
}elseif(!empty($_GET['profile_id'])){
		$profileId = intval(trim(filter_input(INPUT_GET, 'profile_id', FILTER_SANITIZE_STRING)));
}elseif(isset($_SESSION['search_status'])){
		echo "";
}else {
    $_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
    $_SESSION['system_error_message'] = "could not retrieve school info";
    redirect("error_page.php");
}
?>