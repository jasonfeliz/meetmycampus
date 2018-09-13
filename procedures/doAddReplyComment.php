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
	$discussionId = trim(filter_input(INPUT_POST,"discussion-id",FILTER_SANITIZE_NUMBER_INT));
	$dReplyId = trim(filter_input(INPUT_POST,"discussion-reply-id",FILTER_SANITIZE_NUMBER_INT));
	$studentId = trim(filter_input(INPUT_POST,"student-id",FILTER_SANITIZE_NUMBER_INT));
	$username = trim(filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING));
		
	$addReplyCommentId = intval(add_c_reply_comments($dReplyId, $studentId, $rReplyPost));
	

	if($addReplyCommentId != ""){
		$type = "reply_comment";
		$stmt = $connect->prepare("SELECT c_discussion_replies.student_id,community_discussions.community_id,c_discussion_replies.c_discussion_id FROM c_discussion_r_reply 
											INNER JOIN c_discussion_replies JOIN community_discussions JOIN communities ON c_discussion_r_reply.c_discussion_reply_id = c_discussion_replies.c_discussion_reply_id AND c_discussion_replies.c_discussion_id = community_discussions.c_discussion_id AND community_discussions.community_id = communities.community_id
											WHERE r_reply_id = ?");
		$stmt->bindParam(1,$addReplyCommentId,PDO::PARAM_INT);
		$stmt->execute();
		$info = $stmt->fetch(PDO::FETCH_ASSOC);

		$user_to_id = intval($info['student_id']);
		$community_id = intval($info['community_id']);
		$discussion_id = intval($info['c_discussion_id']);

        $notification_obj = new Notification($connect,$user_to_id);
        $notification_obj->setNotification($type, $studentId, $community_id, $discussion_id,$addReplyCommentId,NULL, NULL);

		$comments = '<li class="discussion-reply-list-item">';
		$comments .= '<a href="profile.php?profile_id='. $studentId . '" class="reply-link">' . '@' . $username . '</a><span> - Just now</span>';
		$comments .= '<p>'. $rReplyPost . '</p></li>';
		echo $comments;		
	}else{
		echo 'Something Went Wrong!';

	}
}
?>