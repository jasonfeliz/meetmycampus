<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$eventId = $check = $leave = $join = "";
$attending = FALSE;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$eventId = intval(trim(filter_input(INPUT_POST, "event-id",FILTER_SANITIZE_STRING)));

	if ($eventId == "" || $userId == "") {
		echo 'empty';
		exit();
	}

		$check = event_attendees($eventId);
		foreach ($check as $key) {
			if ($key['student_id'] == $userId) {
				$attending = TRUE;
				break;
			}
		}
		if ($attending) {
			$leave = leave_event($eventId,$userId);
			if ($leave) {
				echo "leave-event";
			}else{
				echo "fail";
			}
		}else{
			$join = attend_event($eventId,$userId);
			if ($join) {
				echo "attending";
			}else{
				echo "fail";
			}

		}


}else{
	echo "fail2";
}

?>