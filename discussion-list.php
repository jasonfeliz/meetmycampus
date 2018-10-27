<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

$discussionTopicId = NULL;
if (!empty($_GET['discussion_topic_id'])) {
	$discussionTopicId = trim(filter_input(INPUT_GET, 'discussion_topic_id', FILTER_SANITIZE_STRING));
}
$pageTitle = $collegeName . ' Discussions';
include('inc/main-header-test.php');
?>
	<div class="main-content">
	<?php include('inc/school-nav.php');?>
		<div class="sub-main-content">
			<?php include('inc/panels.php');?>
			<?php include('inc/create-discussion.php');?>
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
    				<div class="search-overlay">
    					<div>
    						<input type="text" name="search_discussion" placeholder="Search Discussions" onkeyup="search_discussion(this.value,<?php echo $collegeId . ", '". $urlCollegeName . "' "; ?>)">
    						<span class="closeSearch">X</span>
    					</div> 
    					<div  id="search_results_d">
    					</div>   					
    				</div>
						<div class="communities-list">
								<section>
									<div class="main-heading-section">
										<div class="home-header-section">
											<?php 
												if($loggedIn){
													$onClick = 'id="createCommunityBtn"';
												}
											?>
											<div>
												<h3 class="home-header">Discussions</h3>
												<button <?php echo $onClick; ?> > + Start Discussion</button>												
											</div>

											<div>
												<input type="text" name="community_search" placeholder="Search discussions">
											</div>
										</div>				
									</div>												
								</section>
								<section id="show-room" class="tabs">
									<div id="d_c" class="active">
										<ul class="forum-list" id="discussion-list">
											<?php 

													$interests_array = [];
													$discussions_id_array = [];
													$discussions_array = [];
													$content = "";
													$discussions = $schoolInfo->get_all_discussions();
													if (!empty($discussions)) {
														for ($i=0; $i < count($discussions); $i++) {
															$current_id = intval($discussions[$i]["c_discussion_id"]);
															$total_votes_replies = intval(get_total_votes($current_id)) + count(get_all_community_discussion_replies($current_id));
															$get_discussion = $discussions[$i];
															$get_discussion['total_votes_replies'] = $total_votes_replies;
															array_push($discussions_array,$get_discussion);
															
														}
														assoc_asort($discussions_array,"total_votes_replies");
													}
													

													if (!empty($discussions_array)) {

														foreach ($discussions_array as $key) {
															$replies = get_all_community_discussion_replies($key['c_discussion_id']);
															
															if(count($replies)==1){
																$replyCount = count($replies)." reply"; 
															}else{
																$replyCount = count($replies)." replies";
															}
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
															$content .= '<li class="forum-item" id="c-discussion-forum-item-' .  $key['c_discussion_id'] . '">';
															$content .= '<div class="forum-post-vote">';
															$content .= '<i id="upvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
															$content .= '<div id="vote-count-' . $key['c_discussion_id'] . '" class="vote-count">'. $totalVotes .'</div>';
															$content .= '<i id="downvote-'. $key['c_discussion_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="c_vote('. $key['c_discussion_id'] .', ' . $userId .',this)"></i>';
															$content .= '</div><div class="forum-main">';
															$content .= '<div class="forum-post-body"><a href="community-discussion.php?school_name=' .$urlCollegeName . '&community_id=' . $key['community_id'] . '&c_discussion_id=' . $key['c_discussion_id'] . '"><p class="forum-title community-forum">' . nl2br($key['c_discussion_title']) . '</p></a></div>';
																$content .= '<ul class="forum-item-header">';
															if ($storyConstant) {
																$content .= '<li>Anonymous - '. $postTime.'</li>';
															}else{
																$content .= '<li><span>Posted by: </span><a href="profile.php?profile_id=' . $key['student_id'] . '" class="forum-username">' . '@'.$key['userName'] . '</a><span> - '. $postTime.'</span></li>';
															}
															$content .= '<li class="forum-item-btns"><span class="fa">'. $replyCount .'</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="c-discussion-'. $key['c_discussion_id'] . '" onclick="doFavorites(\'community_discussion\',' . $key['c_discussion_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['c_discussion_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li data-type="c_post" data-id="'.$key['c_discussion_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div></li>';
																$content .= "<li class='forum-item-links'>
																		<span style='border-color:{$key['community_color']};'><a href='#' style='color:{$key['community_color']};'>{$key['community_name']}</a></span>
																		<span><a href='#'>{$key['category']}</a></span>
																</li>";														
																$content .= '</ul>';
															}	

															$content .= '<div></li>';
															
													}else{
														$content =  '<div class="private-section"> <h3 style="padding:20px;">Be the first to start a discussion '  .$collegeAbrev . '</h3></div>';
													}
													echo $content;												

											 ?>
										</ul>
									</div>


									<div>

									</div>
								</section>
						</div>
					</div>
			</section>



<?php
include('inc/universal-nav.php');
?>
</div>
