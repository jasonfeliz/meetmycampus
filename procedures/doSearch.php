<?php
require_once('../inc/bootstrap.php');
$term = $collegeId = $x = "";
if (isset($_GET['term'])) {
	$term = trim(filter_input(INPUT_GET, 'term' ,FILTER_SANITIZE_STRING));
		$return_arr = array();

			$x = get_majors_list($term);
		    foreach ($x as $key => $value) {
		    	$return_arr[$key] =  $value;
		    }

	     // Toss back results as json encoded array. 
	    echo json_encode($return_arr);
}elseif (isset($_GET['search_community'])) {
	$term = trim(filter_input(INPUT_GET, 'search_community' ,FILTER_SANITIZE_STRING));
	$urlCollegeName = trim(filter_input(INPUT_GET, 'college_name' ,FILTER_SANITIZE_STRING));
	$collegeId = intval(trim(filter_input(INPUT_GET, 'college_id' ,FILTER_SANITIZE_STRING)));

	$x = search_communities($term,$collegeId);
	$content = "";
	$content .= '<h3 class="private-section">Showing ' . count($x) . ' results</h3>';
	$content .= '<ul class="communities-list-item">';
	foreach ($x as $key) {
		$content.=	'<li><a href="community.php?school_name='. $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
		$content.= '<img src="img/community5.png">';
		$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
	}
	$content .= '</ul>';

	echo $content;
}elseif (isset($_GET['search_discussion'])){
	$term = trim(filter_input(INPUT_GET, 'search_discussion' ,FILTER_SANITIZE_STRING));
	$collegeId = intval(trim(filter_input(INPUT_GET, 'college_id' ,FILTER_SANITIZE_STRING)));
	$urlCollegeName = trim(filter_input(INPUT_GET, 'college_name' ,FILTER_SANITIZE_STRING));
	$userId = 0;
	$x = search_discussion($term,$collegeId);
	$content = "";
	$content .= '<h3 class="private-section">Showing ' . count($x) . ' results</h3>';
	$content .= '<ul class="forum-list" id="discussion-list">';
	foreach ($x as $key) {
		$replies = get_all_discussion_replies($collegeId,$key['d_post_id']);
		if (count($replies)==0){
			$replyCount =  count($replies)." Replies";
		}elseif(count($replies)==1){
			$replyCount = count($replies)." Reply"; 
		}else{
			$replyCount = count($replies)." Replies";
		}
		$checkFav = check_favorite($key['d_post_id'], $userId, 'discussion');
		if($checkFav){
			$color = "style='color: #DF7367;'";
		}else{
			$color = "";
		}
		$totalVotes = get_total_votes($key['d_post_id']);
		if (!$totalVotes) {
			$totalVotes = 0;
		}
		$up = $down = '';
		$checkVote = get_vote($key['d_post_id'],$userId);{
			if ($checkVote['vote'] == 1) {
				$up = 'active-vote';
			}elseif ($checkVote['vote'] == -1) {
				$down = 'active-vote';
			}
		}
		$postTime = post_time($key['post_date']);
		$remove = "";
		$isCreator = is_creator('discussion',$userId,$key['d_post_id']);
		if ($isCreator) {
			$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion\','.$key['d_post_id'].')">Remove Discussion</li><li>Edit Discussion</li>';
		}
		$content .= '<li class="forum-item" id="discussion-forum-item-' . $key['d_post_id'] . '">';
		$content .= '<div class="forum-post-vote">';
		$content .= '<div id="vote-count-' . $key['d_post_id'] . '" class="vote-count">'. $totalVotes .' votes</div>';
		$content .= '</div>';
		$content .= '<div class="forum-main"><div class="forum-post-body">';
		$content .= '<a href="discussion.php?school_name='. $urlCollegeName . '&discussion_id='. $key['d_post_id'].'"><p class="forum-title">' . $key['discussion_title'] . '</p></a></div>';
		$content .= '<ul  class="forum-item-list"><li>Posted: <span>'. $postTime .'</span></li>';
		$content .= '<li class="forum-item-btns"><span class="fa">' . $replyCount . '</span></li></ul>';
		$content .= '</div></li>';    	
	}
	$content .= '</ul>';

	echo $content;
}

?>