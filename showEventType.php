<?php

require_once('inc/bootstrap.php');
require_once('inc/start.php');
if (!empty($_GET['e_type'])) {
	if ($_GET['e_type'] == 'communities' || $_GET['e_type'] == 'recreation_sports' || $_GET['e_type'] == 'academics_career' || $_GET['e_type'] == 'student_life' || $_GET['e_type'] == 'local_events' || $_GET['e_type'] == 'meetups') {
		$eType = trim(filter_input(INPUT_GET, 'e_type', FILTER_SANITIZE_STRING));
		// $discussionsList = get_all_events($collegeId,$eType);
	}else{
		redirect("events-list.php?school_name=". $urlCollegeName . "&e_type=communities");
	}
}else{
	redirect("events-list.php?school_name=". $urlCollegeName . "&e_type=communities");
}

echo "awesome";
?>