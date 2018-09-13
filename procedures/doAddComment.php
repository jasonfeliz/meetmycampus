
<?php
require_once('../inc/bootstrap.php');
$eventComment = $collegeId = $communityId = $eventId = $studentId = $username = $addEvent = "";
if (isset($_POST['add-event-comment'])) {

	$eventComment = trim(filter_input(INPUT_POST,"add-event-comment",FILTER_SANITIZE_STRING));
	$collegeId = trim(filter_input(INPUT_POST,"college-id",FILTER_SANITIZE_NUMBER_INT));
	$communityId = trim(filter_input(INPUT_POST,"community-id",FILTER_SANITIZE_NUMBER_INT));
	$eventId = trim(filter_input(INPUT_POST,"event-id",FILTER_SANITIZE_NUMBER_INT));
	$studentId = trim(filter_input(INPUT_POST,"student-id",FILTER_SANITIZE_NUMBER_INT));
	$username = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING));
	
	if ($communityId) {
 		$addEvent = add_event_comments($communityId, $eventId, $studentId, $eventComment);
	}elseif(!$communityId){
		$addEvent = add_event_comments(NULL, $eventId, $studentId, $eventComment);		
	}

	if($addEvent){

		$comments = '<li class="comment-list-item">';
		$comments .= '<a href="profile.php?profile_id=' . $studentId . '" class="reply-link">'. '@'. $username . '</a><span> - Just now</span>';
		$comments .= '<p>'. $eventComment .'</p>';
		$comments .= '</li>';
		echo $comments;		
	}else{
		echo 'Something Went Wrong!';

	}

								
}



?>