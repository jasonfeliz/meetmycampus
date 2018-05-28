<?php 
require_once('../inc/bootstrap.php');
$categoryId = $userId = $check = $unfollow = $follow = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$categoryId = intval(trim(filter_input(INPUT_POST, "category-id",FILTER_SANITIZE_STRING)));
	$userId = intval(trim(filter_input(INPUT_POST, "user-id",FILTER_SANITIZE_STRING)));

	if ($categoryId == "" || $userId == "") {
		echo 'empty';
		exit();
	}
	$check = check_interest($categoryId,$userId);
	if ($check) {
		$unfollow = unfollow_interest($categoryId,$userId);
		if ($unfollow) {
			echo 'unfollow';
			exit();
		}else{
			echo 'fail';
			exit();
		}
	}else{
		$follow = follow_interest($categoryId,$userId);
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