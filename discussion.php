<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
if (!empty($_GET['discussion_id'])) {
	$discussionId = intval(trim(filter_input(INPUT_GET, 'discussion_id' ,FILTER_SANITIZE_STRING)));
	$discussion = get_discussion($collegeId,$discussionId);
	if (empty($discussion)) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve discussion";
    	redirect("error_page.php");
	}
	$communityConstant = FALSE;
	$majorConstant = FALSE;
	$storyConstant = FALSE;
}else{
	$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   	$_SESSION['system_error_message'] = "get variables not set";
    redirect("error_page.php");
}

$replies = get_all_discussion_replies($discussionId);
$postTime = post_time($discussion['post_date']);
$pageTitle = $collegeName . 'Discussion';
include('inc/main-header-test.php');

?>
	<div class="main-content">
		<?php include('inc/school-nav.php');?>
		<div class="sub-main-content">
			<?php include('inc/main-post-reply.php');?>
			<?php include('inc/panels.php');?>
			<section class="school-home-body" id="school-home-body">
				<div>
					<a style="color: #ea7363;font-weight: 600;" href="javascript:history.go(-1);"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Back</a>
				</div>
				
					<div class="content-body">
										<div class="forum-item edit-forum">
											<div class="discussion-first-section">
												<div><?php if (count($replies)==0){echo "No Replies";}elseif(count($replies)==1){echo count($replies)." Reply"; }else{echo count($replies)." Replies";} ?></div>
											</div>
											<div class="discussion-second-section">
												<p id="forum_title"><?php echo nl2br($discussion['discussion_title']); ?></p>
											</div>
											<div class="discussion-third-section" id="discussion-forum-item-<?php echo $discussionId; ?>">
												<div>
													<?php echo '<a href="profile.php?profile_id='.$discussion['student_id'] .'">' . '@'.$discussion['userName'] . '</a><span> - '.$postTime .'</span>' ?>
												</div>
												<div class="discussion-main">
												<?php
													$totalVotes = get_total_votes($discussionId);
													if (!$totalVotes) {
														$totalVotes = 0;
													}
													$up = $down = '';
													$checkVote = get_vote($discussionId,$userId);{
														if ($checkVote['vote'] == 1) {
															$up = 'active-vote';
														}elseif ($checkVote['vote'] == -1) {
															$down = 'active-vote';
														}
													}
													$disableComment = '';
													if (!$loggedIn) {
														$userId = 0;
														$disableComment = ' disabled ';
													}elseif($loggedIn){										
														$onClick = ' id="createCommunityBtn" ';
													}
												?>
													<div class="forum-post-vote">
														<i id="upvote-<?php echo $discussionId;?>" class="fa fa-sort-up fa-2x vote-button <?php echo $up ?>" aria-hidden="true" onclick="vote(<?php echo $discussionId . ', ' . $userId;?> , this)"></i>
														<div id="vote-count-<?php echo $discussionId;?>" class="vote-count"><?php echo $totalVotes; ?></div>
														<i id="downvote-<?php echo $discussionId;?>" class="fa fa-sort-down fa-2x vote-button <?php echo $down ?>" aria-hidden="true" onclick="vote(<?php echo $discussionId . ', ' . $userId;?> , this)"></i>
													</div>

													<p id="forum_post"><?php echo nl2br($discussion['discussion_post']); ?></p>
												</div>	
												<div style="align-items: center;">
													<div class="forum-item-btns">
													<?php
														$checkFav = check_favorite($discussionId, $userId, 'discussion');
														if($checkFav){
															$color = "style='color: #DF7367;'";
														}else{
															$color = "";
														}
													$remove = "";
													$isCreator = is_creator('discussion',$userId,$discussionId);
													if ($isCreator) {
														$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion\','.$discussionId.')">Remove Discussion</li><li class="edit_discussion">Edit Discussion</li>';
													}
													?>
														<i class="fa fa-heart-o" <?php echo $color;?> aria-hidden="true" id="discussion-<?php echo $discussionId;?>" onclick="doFavorites('discussion', <?php echo $discussionId . ', ' . $userId;?> , this)"></i>
														<i class="fa fa-ellipsis-h" id="ellipsis-cd-<?php echo $discussionId; ?>" aria-hidden="true" onclick="showEllipsis(this)"></i>
														<div class="ellipsis-menu">
															<ul>
																<li data-type="post" data-id="<?php echo $discussionId; ?>" class="ellipsis-button report-btn">Report</li>
																<?php echo $remove; ?>
															</ul>
														</div>
													</div>
													<button <?php echo $onClick; ?> class="reply-button" id="discussion-reply"><i class="fa fa-reply" aria-hidden="true"></i>Reply</button>	
												</div>
																						
											</div>										

										</div>
									<div class="discussion-reply-header">
										<h3>Replies to: <span> <?php echo nl2br($discussion['discussion_title']) ?></span></h3>
									</div>
									<ul class="forum-list" id="show-replies">
										<?php 
										if (!empty($replies)) {
											foreach ($replies as $key) {
												$postTime = post_time($key['post_date']);
													$remove = "";
													$isCreator = is_creator('discussion_reply',$userId,$key['d_reply_id']);
													if ($isCreator) {
														$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion_reply\','.$key['d_reply_id'].')">Remove reply</li><li class="edit_reply" data-info="d_reply_edit_" data-id="'.$key['d_reply_id'].'">Edit Reply</li>';
													}
												$content = '<li class="forum-item">';
												$content .= '<div class="discussion-third-section">';
												$content .= '<div><a href="profile.php?profile_id=' . $key['student_id'] . '">' .'@'. $key['userName'] . '</a><span> - ' .$postTime .'</span></div>';
												$content .= '<div style="display:block;position:relative"><p id="d_reply_edit_'.$key['d_reply_id'].'">' . nl2br($key['reply_post']) .'</p><textarea class="edit_text_area"></textarea><div class="edit_buttons"><button class="cancel_button" data-info="d_reply_edit_" data-id="'.$key['d_reply_id'].'">Cancel</button><button class="save_button" data-info="d_reply_edit_" data-id="'.$key['d_reply_id'].'" data-type="edit_reply">Save</button></div></div>';
												$content .= '<div style="align-items: center;"><div class="forum-item-btns"><i class="fa fa-ellipsis-h" id="ellipsis-cdr-'.$key['d_reply_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li data-type="post_reply" data-id="'.$key['d_reply_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div></div></div>';
												$content .= '<div><ul class="discussion-reply-list" id="discussion-reply-list-' .$key['d_reply_id']. '">';
												$rReplies = get_all_discussion_r_replies($discussionId,$key['d_reply_id']);
												if (!empty($rReplies)) {
													
													foreach ($rReplies as $key2) {
														$postTime = post_time($key2['post_date']);
														$remove = "";
														$isCreator = is_creator('discussion_reply_comment',$userId,$key2['r_reply_id']);
														if ($isCreator) {
															$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion_reply_comment\','.$key2['r_reply_id'].')">Remove comment</li><li class="edit_comment" data-info="d_comment_edit_" data-id="'.$key2['r_reply_id'].'">Edit Comment</li>';
														}
														$content .= '<li class="discussion-reply-list-item"><a href="profile.php?profile_id='.$key2['student_id'] . '" class="reply-link">' . '@' . $key2['userName'] . '</a><span> - ' . $postTime. '</span><i class="fa fa-ellipsis-h" id="ellipsis-cdrr-'.$key2['r_reply_id'].'" aria-hidden="true" onclick="showEllipsis(this)" style="position:absolute;right:15px;"></i><div class="ellipsis-menu"><ul><li data-type="post_reply_comment" data-id="'.$key2['r_reply_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div><p id="d_comment_edit_'.$key2['r_reply_id'].'">'. $key2['r_reply_post']. '</p><textarea class="edit_text_area area_comment"></textarea><div class="edit_buttons"><button class="cancel_button" data-info="d_comment_edit_" data-id="'.$key2['r_reply_id'].'">Cancel</button><button class="save_button" data-info="d_comment_edit_" data-id="'.$key2['r_reply_id'].'" data-type="edit_comment">Save</button></div></li>';
													}
													
												}
												$content .= '</ul></div>';
												$content .= '</div>';
												$content .= '<form method="POST" action="" id="add-reply-comment-'. $key['d_reply_id'] .'" onsubmit="addReplyComment('.$key['d_reply_id'] . '); return false;">';
												$content .= '<input type="text" name="r-reply-post" placeholder="Add Comment"'.$disableComment.'>';
												$content .= '<input type="hidden" name="college-id" value="' . $collegeId . '">';
												$content .= '<input type="hidden" name="discussion-id"  value="' . $discussionId . '">';
												$content .= '<input type="hidden" name="discussion-reply-id"  value="' . $key['d_reply_id'] . '">';
												$content .= '<input type="hidden" name="student-id" value="' . $userId .'">';
												$content .= '<input type="hidden" name="username"  value="' . $userName . '">';
												$content .= '<input type="submit" style="display: none;">';
												$content .= '</form>';
												$content .= '</li>';
												echo $content;
											}
										}else{
											echo '<h3 style="padding:20px;">Be the first to reply to ' . '@' .$discussion['userName'] . '\'s discussion</h3>';
										}
										?>
									
									</ul>
       <div id="edit_forum_popup" class="modal" <?php if (isset($_SESSION['edit_error_message'])) { echo 'style="display:block"'; } ?>>
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         <form method="POST" action="" onsubmit="return false;" id="edit_form">
                          <div class="modal-header">
                            <h4>Edit Discussion</h4>
                          </div> 
                            <div class="modal-body">
                              <div>
                                <?php if(isset($_SESSION['edit_error_message'])){ echo '<p  class="submitError">' . $_SESSION['edit_error_message'] . '</p>'; } ?>
                              </div>                     

                                <div class="modalInput">
                                  <label>Discussion Title:</label>
                                  <input type="text" name="update_title" placeholder="What are we talking about today?" value="<?php if (isset($_SESSION['edit_error_message'])) { echo $_SESSION['discussion-title']; }else{ echo nl2br($discussion['discussion_title']); } ?>">                              
                                </div>

                                <div class="modalInput">
                                  <textarea name="update_post" placeholder="What's on your mind?" value="<?php if (isset($_SESSION['edit_error_message'])) { echo $_SESSION['discussion-post']; session_unset();session_destroy();}?>"><?php echo $discussion['discussion_post']; ?></textarea>                               
                                </div>
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" id="address" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>
 
                                <div>
                                  <button type="submit" class="signInButton" id="save_change" data-info="edit_discussion" data-id="<?php echo $discussionId; ?>">Save Changes</button>
                                </div>                            
                              </div>              
                        </form>               
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 

					</div><!-- end content body -->
			</section>	<!-- end sschool home body -->		
		</div> <!-- end sub content -->
	</div>  <!-- end main content -->

<?php
include('inc/universal-nav.php');
?>