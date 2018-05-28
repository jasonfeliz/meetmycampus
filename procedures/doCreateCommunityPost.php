<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$discussionPost = $communityId = $majorId = $storyId = $discussionTitle = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['community-id'])) {
    $discussionPost = trim(filter_input(INPUT_POST,"discussion-post",FILTER_SANITIZE_STRING));
    $communityId = intval(trim(filter_input(INPUT_POST,"community-id",FILTER_SANITIZE_STRING)));
    $categoryId = intval(trim(filter_input(INPUT_POST,"category-id",FILTER_SANITIZE_STRING)));
    if($discussionPost == ""){
        $_SESSION['create_error_message2'] = "Please fill in the required fields: Discussion Post";
       $_SESSION['discussion-post'] = $discussionPost;
        redirect('../community.php?school_name='. $urlCollegeName . '&category_id=' . $categoryId . '&community_id=' . $communityId . '&community_cat=group');
    }

    $result = create_community_discussion($collegeId,$communityId,NULL,NULL,$userId,$discussionTitle,$discussionPost);

    if ($result) {
      redirect('../community-discussion.php?school_name='. $urlCollegeName . '&community_id=' . $communityId  .'&c_discussion_id=' . $result['c_discussion_id']);
    }else{
      $_SESSION['create_error_message2'] = "Something Went Wrong!";
      $_SESSION['discussion-post'] = $discussionPost;
      redirect('../community.php?school_name='. $urlCollegeName . '&category_id=' . $categoryId . '&community_id=' . $communityId . '&community_cat=group');
    }   



  }elseif(isset($_POST['major-id'])){
    $discussionPost = trim(filter_input(INPUT_POST,"discussion-post",FILTER_SANITIZE_STRING));
    $majorId = intval(trim(filter_input(INPUT_POST,"major-id",FILTER_SANITIZE_STRING)));

    $result = create_community_discussion($collegeId,NULL,$majorId,null,$userId,$discussionTitle,$discussionPost);

    if($discussionPost == ""){
        $_SESSION['create_error_message2'] = "Please fill in the required fields: Discussion Post";
       $_SESSION['discussion-post'] = $discussionPost;
        redirect('../community.php?school_name='. $urlCollegeName . '&major_id=' . $majorId);
    }

    if ($result) {
      redirect('../community-discussion.php?school_name='. $urlCollegeName . '&major_id=' . $majorId  .'&c_discussion_id=' . $result['c_discussion_id']);
    }else{
      $_SESSION['create_error_message2'] = "Something Went Wrong!";
      $_SESSION['discussion-post'] = $discussionPost;
      redirect('../community.php?school_name='. $urlCollegeName . '&major_id=' . $majorId) ;
    } 



  }elseif(isset($_POST['story-id'])){
    $communityId = intval(trim(filter_input(INPUT_POST,"story-id",FILTER_SANITIZE_STRING)));
    $categoryId = intval(trim(filter_input(INPUT_POST,"category-id",FILTER_SANITIZE_STRING)));
    $discussionTitle = trim(filter_input(INPUT_POST,"discussion-title",FILTER_SANITIZE_STRING));
    $discussionPost = trim(filter_input(INPUT_POST,"discussion-post",FILTER_SANITIZE_STRING));  

    if($discussionPost == "" || $discussionTitle == ""){
        $_SESSION['create_error_message2'] = "Please fill in the required fields: Discussion Post";
       $_SESSION['discussion-post'] = $discussionPost;
       $_SESSION['discussion-title'] = $discussionTitle;
        redirect('../community.php?school_name='. $urlCollegeName . '&category_id=' . $categoryId . '&community_id=' . $communityId . '&community_cat=story');
    }


      $result = create_community_discussion($collegeId,null,NULL,$communityId,$userId,$discussionTitle,$discussionPost);
      if ($result) {
        redirect('../community-discussion.php?school_name='. $urlCollegeName . '&community_id=' . $communityId  .'&c_discussion_id=' . $result['c_discussion_id']);
      }else{
        $_SESSION['create_error_message2'] = "Something Went Wrong!";
        $_SESSION['discussion-title'] = $discussionTitle;
        $_SESSION['discussion-post'] = $discussionPost;
        redirect('../discussion-list.php?school_name='. $urlCollegeName . '&category_id=' . $categoryId . '&community_id=' . $communityId . '&community_cat=story') ;
      }



  }




    if ($_POST["address"] != "") {
          $_SESSION['create_error_message2']  = "Bad form input";
          $_SESSION['discussion-title'] = $discussionTitle;
          $_SESSION['discussion-post'] = $discussionPost;
          redirect('../discussion-list.php?school_name='. $urlCollegeName);
    }



}


?>