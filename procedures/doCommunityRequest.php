<?php
require_once('../inc/bootstrap.php');
$id = $profileId = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = intval(trim(filter_input(INPUT_POST,"id",FILTER_SANITIZE_STRING)));

	if ($id == "") {
		echo 'empty';
		exit();
	}else{
		if (isset($_POST['action'])) {
			$profileId = intval(trim(filter_input(INPUT_POST,"profile_id",FILTER_SANITIZE_STRING)));

			if ($_POST['action'] == 'accept') {
				global $connect;
				try{
					$connect->beginTransaction();
			        $stmt = $connect->prepare("UPDATE community_members SET status = 1 WHERE community_id = ?");
					$stmt->bindParam(1,$id,PDO::PARAM_INT);
					$return = $stmt->execute();
					$connect->commit();
					echo 'accept';
			  	}catch(Exception $e){
			  	  	throw $e;
			  	}
			}elseif($_POST['action'] == 'decline'){
				leave_community($id,$profileId);
				echo 'decline';
			}
		}else{
			global $connect;
			try{
				$connect->beginTransaction();
		        $stmt = $connect->prepare("UPDATE community_members SET is_read = NULL WHERE community_id = ?");
				$stmt->bindParam(1,$id,PDO::PARAM_INT);
				$return = $stmt->execute();
				$connect->commit();
				echo 'success';
		  	}catch(Exception $e){
		  	  	throw $e;
		  	}			
		}
	
	}


}

?>