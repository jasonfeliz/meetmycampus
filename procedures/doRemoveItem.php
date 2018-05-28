<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$typeId  = $type = $check = $remove  = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$type = trim(filter_input(INPUT_POST, "type",FILTER_SANITIZE_STRING));
	$typeId = intval(trim(filter_input(INPUT_POST, "type-id",FILTER_SANITIZE_STRING)));

	if ($type == "" || $typeId == "") {
		echo 'empty';
		exit();
	}
	$check = is_creator($type,$userId,$typeId);
	if ($check) {
		$remove = remove_item($type,$userId,$typeId);
		if ($remove) {
			echo 'success';
			exit();
		}else{
			echo "remove failed";
		}
	}else{
		echo "check failed";
	}
}

?>