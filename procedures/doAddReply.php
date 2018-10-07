<?php
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$replyPost  = $discussionId = $majorId = $communityId = $communityId  = $addReply = $discussionTitle = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$replyPost = trim(filter_input(INPUT_POST,"discussion-reply",FILTER_SANITIZE_STRING));
	$discussionId = trim(filter_input(INPUT_POST,"discussion-id",FILTER_SANITIZE_NUMBER_INT));

	if (!isset($_POST['community-id']) && !isset($_POST['major-id'])) {
		$discussionTitle = trim(filter_input(INPUT_POST,"discussion-title",FILTER_SANITIZE_STRING));
		
		$addReply = add_reply(null, $discussionId, $userId, $replyPost);
		if($addReply){
			$content = '<li class="forum-item">';
			$content .= '<div class="discussion-second-section"><p>' . $discussionTitle . '</p></div>';
			$content .= '<div class="discussion-third-section">';
			$content .= '<div><a href="profile.php?profile_id=' . $userId . '">' .'@'. $userName . '</a><span> - 25m ago</span></div>';
			$content .= '<div><p>' . $replyPost .'</p></div>';
			$content .= '<div style="align-items: center;"><div class="forum-item-btns"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div></div></li>';
			echo $content;		
		}else{
			echo 'Something Went Wrong!';

		}

									
	}else if(isset($_POST['community-id'])){
		$communityId = trim(filter_input(INPUT_POST,"community-id",FILTER_SANITIZE_NUMBER_INT));
		$addReply = add_reply($communityId, $discussionId, $userId, $replyPost);

		if($addReply){
			$type = "discussion_reply";
			$user_to_id = intval(get_community_discussion($communityId,$discussionId)['student_id']);
			if ($user_to_id != $userId){
				$notification_obj = new Notification($connect,$user_to_id);
          		$notification_obj->setNotification($type, $userId, $communityId, $discussionId, NULL,NULL, NULL);
			}




			$content = '<li class="forum-item">';
			$content .= '<div class="discussion-third-section">';
			$content .= '<div><a href="profile.php?profile_id=' . $userId . '">' .'@'. $userName . '</a><span> - Just now</span></div>';
			$content .= '<div><p>' .$replyPost .'</p></div>';
			$content .= '<div style="align-items: center;"><div class="forum-item-btns"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div></div>';
			echo $content;		
		}else{
			echo 'Something Went Wrong!';

		}	
	}
}


?>