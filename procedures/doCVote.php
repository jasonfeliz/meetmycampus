<?php
require_once('../inc/bootstrap.php');
$discussionId = $userId = $upvote = $downvote =  $check = $action =  "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$action = trim(filter_input(INPUT_POST,"action",FILTER_SANITIZE_STRING));
		$userId = trim(filter_input(INPUT_POST,"user-id",FILTER_SANITIZE_NUMBER_INT));
		$discussionId = trim(filter_input(INPUT_POST,"discussion-id",FILTER_SANITIZE_NUMBER_INT));

		if ($userId == "" || $discussionId == "") {
			echo "empty";
			exit();
		}
		
		$check = get_c_vote($discussionId,$userId);

		if(!empty($check)){
			if ($action == "upvote-".$discussionId) {
				if ($check['vote'] == 1) {
					echo "already-voted";
				}elseif($check['vote'] == 0){
					update_c_vote($discussionId,$userId,'up');
					echo "add-upvote";
				}elseif($check['vote'] == -1){
					update_c_vote($discussionId,$userId,'up');
					echo "clear-upvote";
				}	
			}elseif($action == "downvote-".$discussionId){
				if ($check['vote'] == -1) {
					echo "already-voted";
				}elseif($check['vote'] == 0){
					update_c_vote($discussionId,$userId,'down');
					echo "add-downvote";
				}elseif($check['vote'] == 1){
					update_c_vote($discussionId,$userId,'down');
					echo "clear-downvote";
				}
			}
		}else{
			if ($action == "upvote-".$discussionId) {
				$upvote = new_c_vote($discussionId,$userId,'up');	
				echo "new-upvote";
			}elseif($action == "downvote-".$discussionId){
				$upvote = new_c_vote($discussionId,$userId,'down');
				echo "new-downvote";
			}
		}



}
?>