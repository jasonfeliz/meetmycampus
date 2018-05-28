<?php 
require_once('../inc/bootstrap.php');
$typeId = $userId = $favoriteType = $check = $delete = $add = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$typeId = intval(trim(filter_input(INPUT_POST, "typeId",FILTER_SANITIZE_STRING)));
	$userId = intval(trim(filter_input(INPUT_POST, "userId",FILTER_SANITIZE_STRING)));
	$favoriteType = trim(filter_input(INPUT_POST,'favoriteType',FILTER_SANITIZE_STRING));

	if ($typeId == "" || $userId == "" || $favoriteType == "") {
		echo 'empty';
		exit();
	}
	$check = check_favorite($typeId, $userId, $favoriteType);
	if ($check) {
		$delete = delete_favorite($typeId, $userId, $favoriteType);
		if ($delete) {
			echo 'delete';
			exit();
		}else{
			echo 'fail';
			exit();
		}
	}else{
		$add = add_favorite($typeId, $userId, $favoriteType);
		if ($add) {
			echo 'add';
			exit();
		}else{
			echo 'fail';
			exit();
		}
	}
}

?>