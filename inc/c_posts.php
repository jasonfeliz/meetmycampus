
<div class="community-action-button">
							<?php
							$onClick2 = $onClick3 = ' onclick="not_signed_in_modal()" ';
							if($loggedIn){
								$check = is_member($userId,$communityId,null);
								if (!$check) {
									$onClick = $onClick2 = ' onclick="non_community_member()" ';
									if ($userSchool != $collegeName) {
										$onClick3 = 'onclick = non_school_student_modal() ';
									}else{
										$onClick3 = ' id="createCommunityBtn" ';
									}
									
								}else{
									$onClick = $onClick3 = ' id="createCommunityBtn" ';
									$onClick2 =  ' id="createCommunityBtn2" ';									
								}

							}
							$writePost = "+ Create Post";
							if($storyConstant){
								$writePost = "+ Write Story";
							}
								echo '<div id="reviews-filter">';
								echo '<select>';
								echo '<option>Most Recent</option><option>Most Upvotes</option>';
								echo '</select></div>';	
								echo '<div><button' . $onClick3 . '>'.$writePost.'</button></div>';							
							?>
								
						</div>	
						<ul class="forum-list" id="forum-list">
										<?php 
											if ($communityConstant) {
												$cDiscussions = get_all_community_discussions($communityId,NULL);
											}elseif($storyConstant){
												$cDiscussions = get_all_community_discussions(NULL,$communityId);
											}
											if (!empty($cDiscussions)) {

												foreach ($cDiscussions as $key) {
													$replies = get_all_community_discussion_replies($key['c_discussion_id']);
													
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
													$isCreator = is_creator('c_discussion',$userId,$key['c_discussion_id']);
													if ($isCreator) {
														$remove = '<li class="ellipsis-button" onclick="removeItem(\'c_discussion\','.$key['c_discussion_id'].')">Remove Discussion</li><li>Edit Discussion</li>';
													}
													$postTime = post_time($key['post_date']);
													$content = '<li class="forum-item" id="c-discussion-forum-item-' .  $key['c_discussion_id'] . '">';
													$content .= '<div class="forum-post-vote">';
													$content .= '<i id="upvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
													$content .= '<div id="vote-count-' . $key['c_discussion_id'] . '" class="vote-count">'. $totalVotes .'</div>';
													$content .= '<i id="downvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
													$content .= '</div><div class="forum-main">';
													$content .= '<ul class="forum-item-header">';
													if ($storyConstant) {
														$content .= '<li>Anonymous - '. $postTime.'</li>';
														$content .= '<li class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="c-discussion-'. $key['c_discussion_id'] . '" onclick="doFavorites(\'community-discussion\',' . $key['c_discussion_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['c_discussion_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li class="ellipsis-button">Report</li>'.$remove.'</ul></div></li>';
														$content .= '</ul>';
														$content .= '<div class="forum-post-body"><a href="community-discussion.php?school_name=' .$urlCollegeName ;
													}else{
														$content .= '<li><a href="profile.php?profile_id=' . $key['student_id'] . '" class="forum-username">' . '@'.$key['userName'] . '</a><span> - '. $postTime.'</span></li>';
														$content .= '<li class="forum-item-btns"><span class="fa">'. $replyCount .'</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="c-discussion-'. $key['c_discussion_id'] . '" onclick="doFavorites(\'community-discussion\',' . $key['c_discussion_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['c_discussion_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li data-type="c_post" data-id="'.$key['c_discussion_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div></li>';
														$content .= '</ul>';
														$content .= '<div class="forum-post-body"><a href="community-discussion.php?school_name=' .$urlCollegeName ;														
													}
													if ($communityConstant) {
														$content .= '&community_id=' . $communityId . '&c_discussion_id=' . $key['c_discussion_id'] . '"><p class="forum-title community-forum">' . nl2br($key['c_discussion_title']) . '</p></a></div>';
													}elseif($storyConstant)	{
														$content .= '&community_id=' . $communityId . '&c_discussion_id=' . $key['c_discussion_id'] . '"><p class="forum-title community-forum">'. nl2br($key['c_discussion_title']) .'</p><p class="forum-title community-forum">' . nl2br($key['c_discussion_post']) . '</p></a></div>';
													}											
													$content .= '<div></li>';
													echo $content;
												}
											}else {
												echo '<div class="private-section"> <h3 style="padding:20px;">Be the first to start a discussion ' . '@' .$community['community_name'] . '</h3></div>';
											}

										?>
						</ul>
