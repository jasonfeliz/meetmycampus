<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$discussionRoomId = $discussionTopicId = $discussionTitle = $discussionPost = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $discussionRoomId = intval(trim(filter_input(INPUT_POST,"discussion-room-id",FILTER_SANITIZE_STRING)));
    $discussionTopicId = intval(trim(filter_input(INPUT_POST,"discussion-topic-id",FILTER_SANITIZE_STRING)));
    $discussionTitle = trim(filter_input(INPUT_POST,"discussion-title",FILTER_SANITIZE_STRING));
    $discussionPost = trim(filter_input(INPUT_POST,"discussion-post",FILTER_SANITIZE_STRING));

    if($discussionTopicId == "" || $discussionTitle == "" || $discussionPost == ""){
        $_SESSION['create_error_message'] = "Please fill in the required fields: Topic, Discussion Title, Discussion Post";
       $_SESSION['discussion-title'] = $discussionTitle;
       $_SESSION['discussion-post'] = $discussionPost;
        redirect('../discussion-list.php?school_name='. $urlCollegeName);
    }

    if ($_POST["address"] != "") {
          $_SESSION['create_error_message']  = "Bad form input";
          $_SESSION['discussion-title'] = $discussionTitle;
          $_SESSION['discussion-post'] = $discussionPost;
          redirect('../discussion-list.php?school_name='. $urlCollegeName);
    }

    $result = create_discussion($discussionRoomId,$discussionTopicId,$collegeId,$userId,$discussionTitle,$discussionPost);

    if ($result) {
      redirect('../discussion.php?school_name='. $urlCollegeName . '&discussion_id=' . $result['d_post_id']);
    }else{
      $_SESSION['create_error_message'] = "Something Went Wrong!";
      $_SESSION['discussion-title'] = $discussionTitle;
      $_SESSION['discussion-post'] = $discussionPost;
      redirect('../discussion-list.php?school_name='. $urlCollegeName);
    }

}


?>