<?php
require_once('../inc/bootstrap.php');
$type = $id = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$type = trim(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
	$id = intval(trim(filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING)));

	if ($type == "" || $id == "") {
		echo "empty";
		exit;
	}
	try {
		$sql = "INSERT iNTO report_content(`content_type`,`content_id`) VALUES (?,?)";
		$connect->beginTransaction();
		$stmt = $connect->prepare($sql);
		$stmt->bindParam(1,$type,PDO::PARAM_STR);
		$stmt->bindParam(2,$id,PDO::PARAM_INT);
		$stmt->execute();
		$connect->commit();
		echo 'success';
	} catch (Exception $e) {
		throw $e;
		echo 'fail';
	}
}
?>