<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

if (isset($_POST['fav_type'])) {
	$favType = trim(filter_input(INPUT_POST,"fav_type",FILTER_SANITIZE_STRING));
	if ($favType == 'fav-colleges') {
		$content = '<div class="communities-list-header"><h5>Schools I Follow</h5></div><ul class="communities-list-item">';
		$followed_schools = get_followed_schools($userId);
		if (!empty($followed_schools)) {
			foreach ($followed_schools as $key) {
				$content .= '<li>';
				$content .= '<a href="home.php?school_name=' . urlencode($key['uni_name']) .'" class="schools-group list-thumbnail"><img src="img/old-school.png"></a>';
				$content .= '<a href="home.php?school_name=' . urlencode($key['uni_name']) .'" class="list-thumbnail-title"> ' . $key['uni_name'] . '</a>';
				$content .= '</li>';
			}
		}else{
			$content .= '<h4 style="padding:20px;">You have not followed any schools.</h4>';
		}
		$content .= '</ul>';
		echo $content;
	}elseif($favType == 'fav-communities'){
		$content = '<div class="communities-list-header"><h5>My Communities</h5></div><ul class="communities-list-item">';
		$liked_communities = get_user_communities($userId,true);
		if(!empty($liked_communities)){
				foreach ($liked_communities as $key){
					$content.=	'<li><a href="community.php?school_name='. urlencode($key['uni_name']) . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
					$content.= '<img src="img/community5.png">';
					$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
				}										
		}else{
			$content .= '<h4 style="padding:20px;">You have not joined a community yet. Be awesome and start joining and creating some communities!</h4>';
		}
		$content .= '</ul>';
		echo $content;
	}elseif($favType == 'fav-interest'){
		$content = '<div class="communities-list-header"><h5>My Interests</h5></div><ul class="communities-list-item">';
		$liked_interests = get_interests($userId);
		if(!empty($liked_interests)){
			foreach ($liked_interests as $key){
				$interestStatus = "Follow";
				$getCatFollowers = get_category_count($key['category_id']);
				$checkInterest = check_interest($key['category_id'],$userId);
				if ($checkInterest) {
					$interestStatus = "Unfollow";
				}
				$content.= 	'<li class="main-thumbnail ' . $key["css_style"] . '">';
				$content.=	'<div class="overlay"></div>';
				$content.=	'<a href="category.php?school_name='. urlencode($key['uni_name']) . '&category_id='. $key['category_id'] . '"' . ' class="category-thumbnail-title">' .  $key['category'] . '</a>';
				$content.= '<div class="category-subBox"><div><p>'.$getCatFollowers.' Followers </p><button id="category-'.$key['category_id'].'" onclick="addInterest('.$userId.', '. $key['category_id'] .',this)">'.$interestStatus.'</button></div></div></li>';
			}										
		}else{
			$content .= '<h4 style="padding:20px;">You have not followed any interests!</h4>';
		}
		$content .= '</ul>';
		echo $content;
	}elseif($favType == 'fav-discussions'){
				$content = '<div class="communities-list-header"><h5>Discussions I like</h5></div><ul class="forum-list" id="forum-list">';
				$get_discussions = get_user_favorites($userId,'discussion');
				if(!empty($get_discussions)){
					foreach ($get_discussions as $key) {
						$liked_discussions = get_liked_discussions($key['type_id']);
						foreach ($liked_discussions as $key) {
							$replies = get_all_discussion_replies($key['d_post_id']);
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
								$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion\','.$key['d_post_id'].')">Remove Discussion</li>';
							}
							$content .= '<li class="forum-item" id="discussion-forum-item-' . $key['d_post_id'] . '">';
							$content .= '<div class="forum-post-vote">';
							$content .= '<i id="upvote-'. $key['d_post_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i>';
							$content .= '<div id="vote-count-' . $key['d_post_id'] . '" class="vote-count">'. $totalVotes .'</div>';
							$content .= '<i id="downvote-'. $key['d_post_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i></div>';
							$content .= '<div class="forum-main"><div class="forum-post-body">';
							$content .= '<a href="discussion.php?school_name='. $collegeName . '&discussion_id='. $key['d_post_id'].'"><p>' . $key['discussion_title'] . '</p></a></div>';
							$content .= '<ul  class="forum-item-list"><li><a href="profile.php?profile_id='.$key['student_id'] . '">@' . $key['username'] . '</a><span> - '. $postTime .'</span></li>';
							$content .= '<li class="forum-item-btns"><span class="fa">' . $replyCount . '</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="discussion-'. $key['d_post_id'] . '" onclick="doFavorites(\'discussion\',' . $key['d_post_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['d_post_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></li></ul>';
							$content .= '</div></li>';
						}

					}

				}
				$get_community_discussions = get_user_favorites($userId,'community_discussion');
				if (!empty($get_community_discussions)) {
					foreach ($get_community_discussions as $key) {
						$liked_community_discussions = get_liked_community_discussions($key['type_id']);
						foreach ($liked_community_discussions as $key) {
							$checkFav = check_favorite($key['c_discussion_id'], $userId, 'community_discussion');
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
							$checkVote = get_c_vote($key['c_discussion_id'],$userId);
							if ($checkVote['vote'] == 1) {
								$up = 'active-vote';
							}elseif ($checkVote['vote'] == -1) {
								$down = 'active-vote';
							}
							if (!$loggedIn) {
								$userId = 0;
							}							
							$remove = "";
							$isCreator = is_creator('c_discussion',$userId,$key['c_discussion_id']);
							if ($isCreator) {
								$remove = '<li class="ellipsis-button" onclick="removeItem(\'c_discussion\','.$key['c_discussion_id'].')">Remove Discussion</li>';
							}
							$postTime = post_time($key['post_date']);
							$content .= '<li class="forum-item">';
							$content .= '<div class="forum-post-vote">';
							$content .= '<i id="upvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
							$content .= '<div id="vote-count-' . $key['c_discussion_id'] . '" class="vote-count">'. $totalVotes .'</div>';
							$content .= '<i id="downvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
							$content .= '</div><div class="forum-main">';
							$content .= '<ul class="forum-item-header">';
								$replies = get_all_community_discussion_replies($key['c_discussion_id']);
								if (count($replies)==0){
									$replyCount =  count($replies)." Replies";
								}elseif(count($replies)==1){
									$replyCount = count($replies)." Reply"; 
								}else{
									$replyCount = count($replies)." Replies";
								}
								$content .= '<li><a href="profile.php?profile_id=' . $key['student_id'] . '" class="forum-username">' . '@'.$key['username'] . '</a><span> - '. $postTime.'</span></li>';
								$content .= '<li class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="c-discussion-'. $key['c_discussion_id'] . '" onclick="doFavorites(\'community_discussion\',' . $key['c_discussion_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['c_discussion_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></li>';
								$content .= '</ul>';
								$content .= '<div class="forum-post-body"><a href="community-discussion.php?school_name=' .$urlCollegeName ;
								$content .= '&community_id=' . $key['community_id'] . '&c_discussion_id=' . $key['c_discussion_id'] . '"><p class="forum-title community-forum">'. nl2br($key['c_discussion_title']) .'</p><p class="forum-title community-forum">' . nl2br($key['c_discussion_post']) . '</p></a></div>';	
								$content .= '</li>';					
						}
													
					}
				}

				if(empty($liked_community_discussions) && empty($liked_discussions)){
					$content = '<h4 style="padding:20px;">You do not have any favorite discussions.</h4>';
				}
				$content .= '</ul>';
				echo $content;
	}elseif($favType == 'fav-events'){
				$content = '<div class="communities-list-header"><h5>Events I like</h5></div><ul>';
				$get_events = get_user_favorites($userId,'event');
				if(!empty($get_events)){
					foreach ($get_events as $key) {
						$liked_events = get_liked_events($userId,$key['type_id']);

						foreach ($liked_events as $key) {
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

					}
				}else{
					$content .= '<h4 style="padding:20px;">You do not have any favorite events.</h4>';
				}
									
				$content .= '</ul>';
				
				echo $content;
	}
}	

?>