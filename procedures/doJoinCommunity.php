<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$userId = $communityId = $check = $leave = $join = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$communityId = intval(trim(filter_input(INPUT_POST, "community-id",FILTER_SANITIZE_STRING)));
	$userId = intval(trim(filter_input(INPUT_POST, "user-id",FILTER_SANITIZE_STRING)));

	if ($communityId == "" || $userId == "") {
		echo 'empty';
		exit();
	}

	if (isset($_POST['leave'])) {
		$postLeave = trim(filter_input(INPUT_POST, "leave",FILTER_SANITIZE_STRING));
		if($postLeave == 'post-leave'){
			$leave = leave_community($communityId,$userId);
			if ($leave) {
				echo 'leave-confirmed';
				exit();
			}else{
				echo 'fail';
				exit();
			}			
		}

	}else{
		$check = is_member($userId,$communityId,'yes');
		$check2 = is_member($userId,$communityId,null);
		if ($check) {
			echo 'cancel-pending-request';
			exit();
		}elseif($check2){
			echo 'leave-pending';
			exit();
		}else{
			$groupType = get_community($communityId,$collegeId)['community_type'];
			if($groupType == 'public'){
				$join = join_community($communityId,$userId,1);
				if ($join) {
					echo 'joined';
					exit();
				}else{
					echo 'fail';
					exit();
				}
			}elseif($groupType == 'private'){
				$join = join_community($communityId,$userId,2);
				if ($join) {
					echo 'join-pending';
					exit();
				}else{
					echo 'fail';
					exit();
				}
			}else{
				echo "fail1";
			}

		}
	}


}else{
	echo "fail2";
}

?>