<?php 
require_once('../inc/bootstrap.php');
$collegeId = $userId = $check = $unfollow = $follow = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$collegeId = intval(trim(filter_input(INPUT_POST, "college-id",FILTER_SANITIZE_STRING)));
	$userId = intval(trim(filter_input(INPUT_POST, "user-id",FILTER_SANITIZE_STRING)));

	if ($collegeId == "" || $userId == "") {
		echo 'empty';
		exit();
	}
	$check = get_followed_schools($userId,$collegeId);
	if ($check) {
		$unfollow = unfollow_school($collegeId,$userId);
		if ($unfollow) {
			echo 'unfollow';
			exit();
		}else{
			echo 'fail';
			exit();
		}
	}else{
		$follow = follow_school($collegeId,$userId);
		if ($follow) {
			echo 'follow';
			exit();
		}else{
			echo 'fail';
			exit();
		}
	}
}

?>