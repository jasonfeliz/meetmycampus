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
	$user_obj = new User($connect,$_COOKIE['user_id']);
	$userDeletedStatus = $user_obj->is_deleted();
	$userFullName = $user_obj->get_full_name();
	$userAbbrev = $user_obj->get_abbrevated_name();
	$userInfo = $user_obj->get_user_info();
	$userName = $userInfo['username'];
	$userEmail = $userInfo['email'];
	$userSchool = $userInfo['uni_name'];
	$userType = $userInfo['user_type'];

    $profile_status = $user_obj->get_profile_info()['profile_build']; 
    if ($profile_status == 0) {  //if profile has already not beencompleted, send user to build profile pagew.
        redirect('build-profile.php');
    }
	
}
$universitySearched = $userSchoolName = "";
if ($loggedIn && empty($_GET['school_name'])) {
	$schoolInfo = new College($connect,NULL,$userSchool);
	$studentList = $schoolInfo->get_students();
	if(!empty($_GET['profile_id'])){
			$profileId = intval(trim(filter_input(INPUT_GET, 'profile_id', FILTER_SANITIZE_STRING)));
	}
}elseif ($loggedIn && !empty($_GET['school_name'])) {
	$universitySearched = trim(filter_input(INPUT_GET, 'school_name', FILTER_SANITIZE_STRING));
	$schoolInfo = new College($connect,NULL,$universitySearched);
	$studentList = $schoolInfo->get_students();
	if(!empty($_GET['profile_id'])){
			$profileId = intval(trim(filter_input(INPUT_GET, 'profile_id', FILTER_SANITIZE_STRING)));
	}
	if(empty($schoolInfo->get_school_id())){
	    $_SESSION['school_search'] = $universitySearched;
	    redirect("search_college.php");
	}
}elseif (!empty($_GET['school_name'])) {
	$universitySearched = trim(filter_input(INPUT_GET, 'school_name', FILTER_SANITIZE_STRING));
	$schoolInfo = new College($connect,NULL,$universitySearched);
	if(empty($schoolInfo->get_school_id())){
	    $_SESSION['school_search'] = $universitySearched;
	    redirect("search_college.php");
	}
}

if (!empty($schoolInfo)) {
	$collegeId = $schoolInfo->get_school_id();
	$collegeName = $schoolInfo->get_school_name();
	$urlCollegeName = urlencode($schoolInfo->get_school_name());
	$collegeLocation = $schoolInfo->get_school_location();
	$collegeUrl = $schoolInfo->get_school_url();
	$collegeAbrev = $schoolInfo->get_school_abbrev();
	$categories = get_all_categories();
	$communities = $schoolInfo->get_all_communities(NULL,NULL);
	$stories = $schoolInfo->get_all_stories();
	$majors = $schoolInfo->get_all_majors(); //TO-DO
	$students = $schoolInfo->get_students();
	$studentCount = intval(count($students));
	$communityCount = intval(count($communities));
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