<?php 
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$category = '';
$communityPost = '';
if (isset($_GET["review_category"])){
	$category = intval(trim(filter_input(INPUT_GET,"review_category",FILTER_SANITIZE_STRING)));
	if (empty($category)){
		$reviews = get_all_reviews($collegeId,null);
	}else{
		$reviews = get_all_reviews($collegeId,$category,null);
	}
												if (!empty($reviews)) {
													foreach ($reviews as $key) {
														$remove="";
														$isCreator = is_creator('review',$userId,$key['review_id']);
														if ($isCreator) {
															$remove = '<li class="ellipsis-button" onclick="removeItem(\'review\','.$key['review_id'].')">Remove Discussion</li><li>Edit Review</li>';
														}
														$postTime = post_time($key['date_created']);
														$content = '<div class="forum-item" >';
														$content .= '<div class="review-header"><p>'. $key['review_category'] . '</p><p>' . $key['rating'] . '</p></div>';
														$content .= '<div class="review-body"><p>' . nl2br($key['review_description']) . '</p></div>';
														$content .= '<ul class="review-footer">';
														$content .= '<li><a href="profile.php?profile_id=' . $key['student_id']. '"' . '>@' .$key['userName'] . '</a><span> ' . $postTime . '</span></li>';
														$content .= '<li class="forum-item-btns"><i class="fa fa-ellipsis-h" id="ellipsis-review-'.$key['review_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></i></li>';
														$content .= '</ul>';
														$content .= '</div>';
														echo $content;
													}
												}else{
													echo '<h3 style="padding:20px;">Be the first to write a review ' . $collegeAbrev . '</h3>';
												}
  }
 if (isset($_GET["review_rating"])){
	$rating = intval(trim(filter_input(INPUT_GET,"review_rating",FILTER_SANITIZE_STRING)));
	if (empty($rating)){
		$reviews = get_all_reviews($collegeId,null,null);
	}else{
		$reviews = get_all_reviews($collegeId,null,$rating);
	}
												if (!empty($reviews)) {
													foreach ($reviews as $key) {
														$remove="";
														$isCreator = is_creator('review',$userId,$key['review_id']);
														if ($isCreator) {
															$remove = '<li class="ellipsis-button" onclick="removeItem(\'review\','.$key['review_id'].')">Remove Discussion</li><li>Edit Review</li>';
														}
														$postTime = post_time($key['date_created']);
														$content = '<div class="forum-item" >';
														$content .= '<div class="review-header"><p>'. $key['review_category'] . '</p><p>' . $key['rating'] . '</p></div>';
														$content .= '<div class="review-body"><p>' . nl2br($key['review_description']) . '</p></div>';
														$content .= '<ul class="review-footer">';
														$content .= '<li><a href="profile.php?profile_id=' . $key['student_id']. '"' . '>@' .$key['userName'] . '</a><span> ' . $postTime . '</span></li>';
														$content .= '<li class="forum-item-btns"><i class="fa fa-ellipsis-h" id="ellipsis-review-'.$key['review_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></i></li>';
														$content .= '</ul>';
														$content .= '</div>';
														echo $content;
													}
												}else{
													echo '<h3 style="padding:20px;">Be the first to write a review ' . $collegeAbrev . '</h3>';
												}
  }
if (isset($_GET["community_post"])){
	$communityPost = trim(filter_input(INPUT_GET,"community_post",FILTER_SANITIZE_STRING));
	$communityId = intval(trim(filter_input(INPUT_GET,"community_id",FILTER_SANITIZE_STRING)));
	$community = get_community($communityId,$collegeId);
	if ($communityPost == 'discussions'){
											$_SESSION['post_type'] = $communityPost;
											$cDiscussions = get_all_community_discussions($communityId);
											if (!empty($cDiscussions)) {
												foreach ($cDiscussions as $key) {
													$replies = get_all_community_discussion_replies($collegeId, $communityId, NULL,$key['c_discussion_id']);																								
													if (count($replies)==0){
														$replyCount =  count($replies)." Replies";
													}elseif(count($replies)==1){
														$replyCount = count($replies)." Reply"; 
													}else{
														$replyCount = count($replies)." Replies";
													}
													$checkFav = check_favorite($key['c_discussion_id'], $userId, 'community-discussion');
													if($checkFav){
														$color = "style='color: #DF7367;'";
													}else{
														$color = "";
													}
													$totalVotes = get_total_c_votes($key['c_discussion_id']);
													if (!$totalVotes) {
														$totalVotes = 0;
													}
													$up = $down = '';
													$checkVote = get_c_vote($key['c_discussion_id'],$userId);{
														if ($checkVote['vote'] == 1) {
															$up = 'active-vote';
														}elseif ($checkVote['vote'] == -1) {
															$down = 'active-vote';
														}
													}
													if (!$loggedIn) {
														$userId = 0;
													}
													$remove = "";
													$isCreator = is_creator('c_discussion', $userId,$key['c_discussion_id']);
													if ($isCreator) {
														$remove = '<li onclick="removeItem(\'c_discussion\','.$key['c_discussion_id'].')">Remove Discussion</li><li>Edit Discussion</li>';
													}
													$postTime = post_time($key['post_date']);
													$content = '<li class="forum-item" id="c-discussion-forum-item-' .  $key['c_discussion_id'] . '">';
													$content .= '<div class="forum-post-vote">';
													$content .= '<i id="upvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
													$content .= '<div id="vote-count-' . $key['c_discussion_id'] . '" class="vote-count">'. $totalVotes .'</div>';
													$content .= '<i id="downvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
													$content .= '</div><div class="forum-main">';
													$content .= '<ul class="forum-item-header">';
													$content .= '<li><a href="profile.php?profile_id=' . $key['student_id'] . '" class="forum-username">' . '@'.$key['userName'] . '</a><span> - ' .$postTime.'</span></li>';
													$content .= '<li class="forum-item-btns"><span class="fa">'. $replyCount .'</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="c-discussion-'. $key['c_discussion_id'] . '" onclick="doFavorites(\'community-discussion\',' . $key['c_discussion_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['c_discussion_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li>Report</li>'.$remove.'</ul></div></li>';
													$content .= '</ul>';												
													$content .= '<div class="forum-post-body"><a href="community-discussion.php?school_name=' .$urlCollegeName. '&community_id=' . $communityId . '&c_discussion_id=' . $key['c_discussion_id'] . '"><p>' . $key['c_discussion_post'] . '</p></a></div>';

													$content .= '</div></li>';
													echo $content;
												}
											}else {
												echo '<h3 style="padding:20px;">Be the first to start a discussion ' . '@' .$community['community_name'] . '</h3>';
											}

	}elseif($communityPost == 'events'){
									$_SESSION['post_type'] = $communityPost;
									$eventsList = get_all_events($collegeId,null,$communityId );
									if(!empty($eventsList)){
										foreach ($eventsList as $key) {
													$checkFav = check_favorite($key['event_id'], $userId, 'event');
													if($checkFav){
														$color = "style='color: #DF7367;'";
													}else{
														$color = "";
													}
											$content = '<li class="forum-item" style="display:block;">';
											$content .= '<div class="event-details"><a href="event.php?school_name='. $urlCollegeName . '&community_id='. $key['community_id'] . '&event_id='. $key['event_id'].'"><h3>' . $key['event_title'] . '</h3></a><div class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="event-'. $key['event_id'] . '" onclick="doFavorites(\'event\',' . $key['event_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['event_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li>Report</li></ul></div></div></div>';
											$content .= '<div><p>' . $key['event_description'] . '</p></div>';
											$content .= '<ul>';
											$content .= '<li class="event-info"><p>'. $key['event_date'] . '</p><p>' . '@' .$key['event_location'] . '</p></li>';
											$content .= '</ul>';
											$content .= '</li>';
										}
									}else{
										$content = '<h3 style="padding:20px;">Be the first to create an event ' . $collegeAbrev . '</h3>';
									}
									
									$content .= '</ul>';
									echo $content;
	}else{
		echo '<h3 style="padding:20px;">Feature coming soon!</h3>';
	}

  }

if (!empty($_GET['e_type'])) {
	if ($_GET['e_type'] == 'communities' || $_GET['e_type'] == 'recreation_sports' || $_GET['e_type'] == 'academics_career' || $_GET['e_type'] == 'student_life' || $_GET['e_type'] == 'local_events' || $_GET['e_type'] == 'meetups') {
		$eType = trim(filter_input(INPUT_GET, 'e_type', FILTER_SANITIZE_STRING));
	}
	switch ($eType) {
	    case "communities":
	        $sectionHeader = '<h3 class="section-header overlay-red">' . $collegeAbrev . ' Communities'  . '</h3>';
	        $cCss = ' class="box-selected" ';
	        break;
	    case "recreation_sports":
	       $sectionHeader = '<h3 class="section-header overlay-blue">' . 'Recreation + Sports'  . '</h3>';
	       $rCss = ' class="box-selected" ';
	        break;
	    case "academics_career":
	       $sectionHeader = '<h3 class="section-header overlay-teal">' . 'Academics + Career'  . '</h3>';
	       $aCss = 'class="box-selected"';
	        break;
	    case "student_life":
	        $sectionHeader = '<h3 class="section-header overlay-pink">' . 'Student Life'  . '</h3>';
	        $sCss = ' class="box-selected" ';
	        break;
	    case "local_events":
	        $sectionHeader = '<h3 class="section-header overlay-green">' . 'Local Events'  . '</h3>';
	        $lCss = ' class="box-selected" ';
	        break;
	    case "meetups":
	       $sectionHeader = '<h3 class="section-header overlay-purple">'  . 'Meetups' . '</h3>';
	       $mCss = ' class="box-selected" ';
	        break;
	}

									$content = '<div id="section-header">' .$sectionHeader .'</div>';
									$content .= '<ul>';
									 
									$eventsList = get_all_events($collegeId,$eType,null);
									if(!empty($eventsList)){
										foreach ($eventsList as $key) {
													$checkFav = check_favorite($key['event_id'], $userId, 'event');
													if($checkFav){
														$color = "style='color: #DF7367;'";
													}else{
														$color = "";
													}
													
											$content .= '<li class="forum-item">';
											if (!is_null($key['community_id'])) {
												$content .= '<div class="event-details"><a href="event.php?school_name='. $urlCollegeName . '&community_id='. $key['community_id'] . '&event_id='. $key['event_id'].'"><h3>' . $key['event_title'] . '</h3></a><div class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="event-'. $key['event_id'] . '" onclick="doFavorites(\'event\',' . $key['event_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['event_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li>Report</li></ul></div></div></div>';
											}else{
												$content .= '<div class="event-details"><a href="event.php?school_name='. $urlCollegeName . '&event_id='. $key['event_id'].'"><h3>' . $key['event_title'] . '</h3></a><div class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="event-'. $key['event_id'] . '" onclick="doFavorites(\'event\',' . $key['event_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['event_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li>Report</li></ul></div></div></div>';
											}
											$content .= '<div><p>' . $key['event_description'] . '</p></div>';
											$content .= '<ul>';
											$content .= '<li class="event-info"><p>'. $key['event_date'] . '</p><p>' . '@' .$key['event_location'] . '</p></li>';
											$content .= '</ul>';

											$content .= '</li>';
										}
									}else{
										$content .= '<h3 style="padding:20px;">Be the first to create an event ' . $collegeAbrev . '</h3>';
									}
									
									$content .= '</ul>';
									echo $content;
}


if (!empty($_GET['d_room'])) {
	if ($_GET['d_room'] == 'community' || $_GET['d_room'] == 'freshmen' || $_GET['d_room'] == 'undergrads' || $_GET['d_room'] == 'grad_students' || $_GET['d_room'] == 'admissions' || $_GET['d_room'] == 'getting_in') {
		$dRoom = trim(filter_input(INPUT_GET, 'd_room', FILTER_SANITIZE_STRING));
		setcookie('d_room', $dRoom,time()+860000,'/', 'localhost');
	}else{
		redirect("discussion-list.php?school_name=". $urlCollegeName . "&d_room=community");
	}
switch ($dRoom) {
    case "freshmen":
        $sectionHeader = '<h3 class="section-header overlay-blue">' . $collegeAbrev . ' Freshmen Unite'  . '</h3>';
        $fCss = ' class="box-selected" ';
        break;
    case "community":
       $sectionHeader = '<h3 class="section-header overlay-red">The ' . $collegeAbrev . ' Community'  . '</h3>';
       $cCss = ' class="box-selected" ';
        break;
    case "undergrads":
       $sectionHeader = '<h3 class="section-header overlay-teal">' . $collegeAbrev . ' Undergrads'  . '</h3>';
       $uCss = 'class="box-selected"';
        break;
    case "grad_students":
        $sectionHeader = '<h3 class="section-header overlay-pink">' . $collegeAbrev . ' Grad Students'  . '</h3>';
        $gCss = ' class="box-selected" ';
        break;
    case "admissions":
        $sectionHeader = '<h3 class="section-header overlay-green">' . $collegeAbrev . ' Admissions'  . '</h3>';
        $aCss = ' class="box-selected" ';
        break;
    case "getting_in":
       $sectionHeader = '<h3 class="section-header overlay-purple">'  . 'Getting Into ' . $collegeAbrev . '</h3>';
       $giCss = ' class="box-selected" ';
        break;
}
										$topics = get_discussion_topics();
										$content = '<div id="section-header">'. $sectionHeader .'</div>';
										$content .= '<ul>';

										$content .= '<div class="filter-box"><select class="double-select-button"><option>Most Recent</option><option>Most Upvotes</option></select>';
										$content .= '<select class="double-select-button" onchange="browseByTopic(' . "'" . $collegeId . "'"  . ',this.value)">';
										$content .= '<option value="all">Browse by Topics</option>';
										foreach ($topics as $key) {
											$content .= '<option value="' . $key['discussion_topic_id'] . '">' . $key['discussion_topic'] . '</option>';
										}
										$content .= '</select>';

										$content .= '</div>';	
										$discussionsList = get_all_discussions($collegeId,$dRoom,'all');
										$content .= '<div><ul class="forum-list" id="discussion-list">';
										if(!empty($discussionsList)){
											foreach ($discussionsList as $key) {
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
													if (!$loggedIn) {
														$userId = 0;
													}	
												$postTime = post_time($key['post_date']);
													$remove = "";
													$isCreator = is_creator('discussion',$userId,$key['d_post_id']);
													if ($isCreator) {
														$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion\','.$key['d_post_id'].')">Remove Discussion</li><li>Edit Discussion</li>';
													}										
												$content .= '<li class="forum-item" id="discussion-forum-item-' . $key['d_post_id'] . '">';
												$content .= '<div class="forum-post-vote">';
												$content .= '<i id="upvote-'. $key['d_post_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i>';
												$content .= '<div id="vote-count-' . $key['d_post_id'] . '" class="vote-count">'. $totalVotes .'</div>';
												$content .= '<i id="downvote-'. $key['d_post_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i></div>';
												$content .= '<div class="forum-main"><div class="forum-post-body">';
												$content .= '<a href="discussion.php?school_name='. $collegeName . '&discussion_id='. $key['d_post_id'].'"><p>' . $key['discussion_title'] . '</p></a></div>';
												$content .= '<ul class="forum-item-list"><li><a href="profile.php?profile_id='.$key['student_id'] . '">@' . $key['userName'] . '</a><span> - '. $postTime .'</span></li>';
												$content .= '<li class="forum-item-btns"><span class="fa">' . $replyCount . '</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="discussion-'. $key['d_post_id'] . '" onclick="doFavorites(\'discussion\',' . $key['d_post_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['d_post_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></li></ul>';
												$content .= '</div></li>';
											}
										}else{
											$content .= '<h3 style="padding:20px;">Be the first to start a discussion ' . $collegeAbrev . '</h3>';
										}
										$content .= '</ul></div>';
										echo $content;	
}
if (!empty($_GET['discussion_topic_id'])) {
	$d_topic = trim(filter_input(INPUT_GET, 'discussion_topic_id', FILTER_SANITIZE_STRING));
	if(isset($_COOKIE['d_room'])){
		$dRoom = $_COOKIE['d_room'];
	}else{
		$dRoom = 'community';
	}

	
										$discussionsList = get_all_discussions($collegeId,$dRoom,$d_topic);
										$content='';
										if(!empty($discussionsList)){
											foreach ($discussionsList as $key) {
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
													if (!$loggedIn) {
														$userId = 0;
													}	
												$postTime = post_time($key['post_date']);
													$remove = "";
													$isCreator = is_creator('discussion',$userId,$key['d_post_id']);
													if ($isCreator) {
														$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion\','.$key['d_post_id'].')">Remove Discussion</li><li>Edit Discussion</li>';
													}										
												$content .= '<li class="forum-item" id="discussion-forum-item-' . $key['d_post_id'] . '">';
												$content .= '<div class="forum-post-vote">';
												$content .= '<i id="upvote-'. $key['d_post_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i>';
												$content .= '<div id="vote-count-' . $key['d_post_id'] . '" class="vote-count">'. $totalVotes .'</div>';
												$content .= '<i id="downvote-'. $key['d_post_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i></div>';
												$content .= '<div class="forum-main"><div class="forum-post-body">';
												$content .= '<a href="discussion.php?school_name='. $collegeName . '&discussion_id='. $key['d_post_id'].'"><p>' . $key['discussion_title'] . '</p></a></div>';
												$content .= '<ul class="forum-item-list"><li><a href="profile.php?profile_id='.$key['student_id'] . '">@' . $key['userName'] . '</a><span> - '. $postTime .'</span></li>';
												$content .= '<li class="forum-item-btns"><span class="fa">' . $replyCount . '</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="discussion-'. $key['d_post_id'] . '" onclick="doFavorites(\'discussion\',' . $key['d_post_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['d_post_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></li></ul>';
												$content .= '</div></li>';
											}
										}else{
											$content .= '<h3 style="padding:20px;">Be the first to start a discussion ' . $collegeAbrev . '</h3>';
										}
										echo $content;

}

?>