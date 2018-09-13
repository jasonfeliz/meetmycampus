<?php 
require_once('../inc/bootstrap.php');
$friendId = $userId = $check = $unfollow = $follow = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$friendId = intval(trim(filter_input(INPUT_POST, "friend-id",FILTER_SANITIZE_STRING)));
	$userId = intval(trim(filter_input(INPUT_POST, "user-id",FILTER_SANITIZE_STRING)));

	if ($friendId == "" || $userId == "") {
		echo 'empty';
		exit();
	}
	$check = get_followed_member($userId,$friendId);
	if ($check) {
		$unfollow = unfollow_member($userId,$friendId);
		if ($unfollow) {
			$stmt = $connect->query("DELETE FROM notifications WHERE user_to = '$friendId' AND user_from = '$userId' AND type = 'user_followed'  ");
			echo 'unfollow';
			exit();
		}else{
			echo 'fail'; 
			exit();
		}
	}else{
		$follow = follow_member($userId,$friendId);
		if ($follow) {
			$type = "user_followed";
			$user_to_id = intval($friendId);

        	$notification_obj = new Notification($connect,$user_to_id);
        	$notification_obj->setNotification($type, $userId, NULL, NULL, NULL,NULL, NULL);
			echo 'follow';
			exit();
		}else{
			echo 'fail';
			exit();
		}
	}
}

?>
