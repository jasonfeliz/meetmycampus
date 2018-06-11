<?php
require_once('../inc/bootstrap.php');
$discussionId = $discussionTitle = $discussionPost = $editInfo = "";
$edit = FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	global $connect;
    $discussionId = intval(trim(filter_input(INPUT_POST,"id",FILTER_SANITIZE_STRING)));
    $discussionTitle = trim(filter_input(INPUT_POST,"update_title",FILTER_SANITIZE_STRING));
    $discussionPost = trim(filter_input(INPUT_POST,"update_post",FILTER_SANITIZE_STRING));
    $editInfo =	trim(filter_input(INPUT_POST,"info",FILTER_SANITIZE_STRING));

    if($discussionId == "" || $discussionTitle == "" || $editInfo == ""){
        $_SESSION['edit_error_message'] = "Please fill in the required fields: Discussion Title, Discussion Post";
       	$_SESSION['discussion-title'] = $discussionTitle;
       	$_SESSION['discussion-post'] = $discussionPost;
        redirect('../discussion-list.php?school_name='. $urlCollegeName);

    }

    if ($discussionPost == "") {
    	echo "empty_post";
    	exit();
    }
    if ($editInfo == "edit_discussion") {
		$edit = edit_discussion($discussionTitle,$discussionPost,$editInfo,$discussionId);
		if($edit){
			echo "success";
		}
    }elseif ($editInfo == "edit_c_discussion") {
    	$edit = edit_discussion(NULL,$discussionPost,$editInfo,$discussionId); // set discussion to null for now until I update commmunity forun format
		if($edit){
			echo "success";
		}
    }elseif ($editInfo == "edit_reply") {
    	$edit = edit_discussion(NULL,$discussionPost,$editInfo,$discussionId); // set discussion to null for now until I update commmunity forun format
		if($edit){
			echo "success";
		}
    }elseif ($editInfo == "edit_c_reply") {
    	$edit = edit_discussion(NULL,$discussionPost,$editInfo,$discussionId); // set discussion to null for now until I update commmunity forun format
		if($edit){
			echo "success";
		}
    }elseif ($editInfo == "edit_comment") {
    	$edit = edit_discussion(NULL,$discussionPost,$editInfo,$discussionId); // set discussion to null for now until I update commmunity forun format
		if($edit){
			echo "success";
		}
    }elseif ($editInfo == "edit_c_comment") {
    	$edit = edit_discussion(NULL,$discussionPost,$editInfo,$discussionId); // set discussion to null for now until I update commmunity forun format
		if($edit){
			echo "success";
		}
    }


}
?>
