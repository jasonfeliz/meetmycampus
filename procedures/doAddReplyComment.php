<?php
require_once('../inc/bootstrap.php');
$rReplyPost = $collegeId = $discussionId = $dReplyId = $communityId = $communityId = $studentId = $username = $addReplyComment = "";
if (isset($_POST['r-reply-post'])) {

	$rReplyPost = trim(filter_input(INPUT_POST,"r-reply-post",FILTER_SANITIZE_STRING));
	$collegeId = trim(filter_input(INPUT_POST,"college-id",FILTER_SANITIZE_NUMBER_INT));
	$discussionId = trim(filter_input(INPUT_POST,"discussion-id",FILTER_SANITIZE_NUMBER_INT));
	$dReplyId = trim(filter_input(INPUT_POST,"discussion-reply-id",FILTER_SANITIZE_NUMBER_INT));
	$studentId = trim(filter_input(INPUT_POST,"student-id",FILTER_SANITIZE_NUMBER_INT));
	$username = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING));
	
	$addReplyComment = add_reply_comments($dReplyId, $studentId, $rReplyPost);

	if($addReplyComment){
		$comments = '<li class="discussion-reply-list-item">';
		$comments .= '<a href="profile.php?profile_id='. $studentId . '" class="reply-link">' . '@' . $username . '</a><span> - Just now</span>';
		$comments .= '<p>'. $rReplyPost . '</p></li>';
		echo $comments;		
	}else{
		echo 'Something Went Wrong!';

	}

								
}elseif(isset($_POST['community-r-reply-post'])){

	$rReplyPost = trim(filter_input(INPUT_POST,"community-r-reply-post",FILTER_SANITIZE_STRING));
	$communityId = trim(filter_input(INPUT_POST,"community-id",FILTER_SANITIZE_NUMBER_INT));
	$majorId = trim(filter_input(INPUT_POST,"major-id",FILTER_SANITIZE_NUMBER_INT));
	$discussionId = trim(filter_input(INPUT_POST,"discussion-id",FILTER_SANITIZE_NUMBER_INT));
	$dReplyId = trim(filter_input(INPUT_POST,"discussion-reply-id",FILTER_SANITIZE_NUMBER_INT));
	$studentId = trim(filter_input(INPUT_POST,"student-id",FILTER_SANITIZE_NUMBER_INT));
	$username = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING));
	if($communityId){
		$addReplyComment = add_c_reply_comments($dReplyId, $studentId, $rReplyPost);
	}elseif($majorId){
		$addReplyComment = add_c_reply_comments($dReplyId, $studentId, $rReplyPost);
	}
	

	if($addReplyComment){
		$comments = '<li class="discussion-reply-list-item">';
		$comments .= '<a href="profile.php?profile_id='. $studentId . '" class="reply-link">' . '@' . $username . '</a><span> - Just now</span>';
		$comments .= '<p>'. $rReplyPost . '</p></li>';
		echo $comments;		
	}else{
		echo 'Something Went Wrong!';

	}
}
?>