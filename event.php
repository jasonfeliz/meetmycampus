<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

if (!empty($_GET['community_id']) && !empty($_GET['event_id'])) {
	$communityId = intval(trim(filter_input(INPUT_GET, 'community_id' ,FILTER_SANITIZE_STRING)));
	$eventId = intval(trim(filter_input(INPUT_GET, 'event_id' ,FILTER_SANITIZE_STRING)));
	$community = get_community($communityId,$collegeId);
	$event = get_event($collegeId,$communityId,$eventId);
	if (!$community) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve community";
    	redirect("error_page.php");
	}
	if (!$event) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this event couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve event";
    	redirect("error_page.php");
	}
	$communityConstant = TRUE;
	$majorConstant = FALSE;
	$studentCount = intval(get_user_count(NULL,$communityId,NULL));

}elseif(empty($_GET['community_id']) && !empty($_GET['event_id'])){
	$eventId = intval(trim(filter_input(INPUT_GET, 'event_id' ,FILTER_SANITIZE_STRING)));
	$communityId = NULL;
	$community = NULL;
	$event = get_event($collegeId,$communityId,$eventId);
	if (!$event) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this event couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve event";
    	redirect("error_page.php");
	}
}else{
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this PAGE couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve GET request for event_id and community_id";
    	redirect("error_page.php");
}
$pageTitle = $collegeName;
require_once('inc/main-header-test.php');

?>
<div class="main-content">
	<?php include('inc/invite.php');?>
	<?php 
		if (!empty($community)) {
			include('inc/community-banner.php');
		}else{
			include('inc/school-nav.php');
		}
	?>
	<div class="main-event-content">
        <section class="left-side-panel event-panel">
        		<div>
		            <h5 class="side-nav-heading">Related Events</h5>
		            <ul class="universal-side-nav-list side-nav-recent"> 
		            <?php
		            	if (!empty($community)) {
			            	$eventsList = get_all_events($collegeId,$event['event_type'],$event['community_id']);
			            	if (!empty($eventsList)) {
			            		foreach ($eventsList as $key) {
			            			$content = '<li>';
			            			$content = '<a href="event.php?school_name=' . $urlCollegeName . '&community_id='. $key['community_id'] .'&event_id='. $key['event_id'] .'">' . $key['event_title'] . '</a>';
			            			$content .= '</li>';
			            			echo $content;
			            		}
			            	}else{
			            		echo '<li style="padding:10px;">No related events</li>';
			            	}
		            	}else{
			            	$eventsList = get_all_events($collegeId,$event['event_type'],null);
			            	if (!empty($eventsList)) {
			            		foreach ($eventsList as $key) {
			            			$content = '<li>';
			            			$content = '<a href="event.php?school_name=' . $urlCollegeName . '&event_id='. $key['event_id'] .'">' . $key['event_title'] . '</a>';
			            			$content .= '</li>';
			            			echo $content;
			            		}
			            	}else{
			            		echo '<li style="padding:10px;">No related events</li>';
			            	}	       
		            	}

		            ?>                


		            </ul>       			
        		</div>
        </section>
		<div class="event-primary-content">
				<div style="margin: 10px 0 10px 10px;">
					<a style="color: #ea7363;font-weight: 600;" href="javascript:history.go(-1);"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Back</a>
				</div>
			<?php
				$remove ="";
				$isCreator = is_creator('event',$userId,$eventId);
				if ($isCreator) {
					$remove = '<li class="ellipsis-button" onclick="removeItem(\'event\','.$eventId.')">Delete Event</li>';
				}
			?>
			<section class="event-section">
				<div class="forum-item-btns" style="position: relative;border-bottom: none;margin:auto;width: 50px;">
					<i class="fa fa-ellipsis-h" id="ellipsis-event-<?php echo $eventId; ?>" aria-hidden="true" onclick="showEllipsis(this)"></i>
					<div class="ellipsis-menu">
						<ul>
							<li data-type="event" data-id="<?php echo $eventId; ?>" class="ellipsis-button report-btn">Report</li>
							<?php echo $remove; ?>
						</ul>
					</div>			
				</div>

												
				<div>
					<h3><?php echo $event['event_title'] ?></h3>
					<p><?php echo $event['event_description'] ?></p>
					<p class=""><?php echo ucfirst($event['event_access']) . ' - '  . count(event_attendees($eventId)) ?> Attending </p>
				</div>

				<div>
					<p class="event-date"><?php echo $event['event_date'].' @' . $event['event_time']  ?></p>
				</div>	
				<div>
					<h5><?php echo '@'.$event['event_location'] ?></h5>
				</div>
			</section>

			<section class="event-section">
				<div>
					<h4 style="padding-bottom: 5px;margin-bottom:5px;border-bottom:solid 1px rgba(0,0,0,.2);">Comments</h4>
					<ul class="comment-list" id="event-comments-list">
						<?php
							$eventComments = get_event_comments($collegeId, $eventId);
							if (!empty($eventComments)) {
								foreach ($eventComments as $key) {
								$postTime = post_time($key['post_date']);
								$remove = "";
								$isCreator = is_creator('event_comment',$userId,$key['e_comment_id']);
								if ($isCreator) {
									$remove = '<li class="ellipsis-button" onclick="removeItem(\'event_comment\','.$key['e_comment_id'].')">Remove Comment</li><li>Edit Event</li>';
								}
								$comments = '<li class="comment-list-item">';
								$comments .= '<a href="profile.php?profile_id=' . $key['student_id']. '" class="reply-link">'. '@'.$key['userName'] . '</a><span> - '.$postTime.'</span><i class="fa fa-ellipsis-h" id="ellipsis-cdrr-'.$key['e_comment_id'].'" aria-hidden="true" onclick="showEllipsis(this)" style="position:absolute;right:15px;"></i><div class="ellipsis-menu"><ul><li data-type="event_comment" data-id="'.$key['e_comment_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div>';
								$comments .= '<p>'. $key['comment'] .'</p>';
								$comments .= '</li>';
								echo $comments;
								}

							}else {
								echo '<h4 style="padding:20px;" id="first-event-comment">Be the first to add a comment for this event.</h4>';
							}
							?>
					</ul>
					<form method="POST" action="" id="add-event-comment" onsubmit="addEventComment(); return false;">
						<input type="text" name="add-event-comment" placeholder="Add Comment" <?php echo $disableComment; ?>>
						<input type="hidden" name="college-id" value="<?php echo $collegeId; ?>">
						<input type="hidden" name="community-id"  value="<?php echo $communityId; ?>">
						<input type="hidden" name="event-id"  value="<?php echo $eventId; ?>">
						<input type="hidden" name="student-id" value="<?php echo $userId; ?>">
						<input type="hidden" name="username"  value="<?php echo $userName; ?>">
						<input type="submit" style="display: none;">
					</form>
					
				</div>
			</section>	
			
		</div>

		<div class="event-secondary-content">
			<section class="event-section">
				<div>
					<ul class="event-info-list">
						<?php 
						$eventInfo = '';
						if (!is_null($community)) {
							$eventInfo .= '<li><h5>Hosted by:</h5><a href="community.php?school_name=' . $urlCollegeName  .'&community_id=' . $event['community_id'] .'&category_id='.$event['category_id'].'&community_cat='.$event['community_category'].'">#' . preg_replace('/\s+/', '', $event['community_name']) . '</a></li>';
							$eventInfo .= '<li><h5>Created by:</h5><a href="profile.php?profile_id=' . $event['id'] .'">@'. $event['userName'] . '</a></li>';
							echo $eventInfo;
						}else{
							$eventInfo .= '<li><h5>Created by:</h5><a href="profile.php?profile_id=' . $event['id'] .'">@'. $event['userName'] . '</a></li>';
							$eventInfo .= '<li><h5>Event Type:</h5><a href="events-list.php?school_name=' . $urlCollegeName . '">#' .  $event['event_type']. '</a></li>';
							echo $eventInfo;
						}
						?>
					</ul>
				</div>

			</section>
			<section class="event-section">
				<div>
					<ul class="event-action-list">
					<?php 
						$attending = FALSE;
						$check = event_attendees($eventId);
						foreach ($check as $key) {
							if ($key['student_id'] == $userId) {
								$attending = TRUE;
								break;
							}
						}
						if ($attending) {
							$bg = 'style="background:aliceblue;"';
							$color = 'style="color:rgb(118, 214, 108)"';
							$div = "I am attending";
						}else{
							$bg = 'style="background:#fff;"';
							$color = 'style="color:rgba(0,0,0,.3)"';
							$div = "I want to attend";

						}
							if($loggedIn){
								if ($community) {
									$check = is_member($userId,$communityId,null);
									if (!$check) {
										$onClick = ' onclick="non_community_member()" ';
									}else{
										$onClick = ' onclick="attendEvent('. $eventId .', '. "'" . $urlCollegeName . "'".',this)" ';
									}
								}else{
									$onClick = ' onclick="attendEvent('. $eventId .', '. "'" . $urlCollegeName . "'".',this)" ';
								}


							}
					?>
						<li id="event-action"  <?php echo $onClick . $bg;?>>
							<i id="event-action-icon" class="fa fa-check-square-o fa-2x event-action-icon" <?php echo $color; ?> aria-hidden="true"></i>
							<div><?php echo $div ?></div>
						</li>
						<li id="createCommunityBtn">
							<i class="fa fa-users fa-2x event-action-icon" aria-hidden="true"></i>
							<div>Invite Classmates</div>
						</li>
					</ul>
				</div>	
			</section>
         <section class="right-side-panel">
           <h5 class="side-nav-heading"><?php echo count(event_attendees($eventId)) ?> Attending</h5>
            <ul class="universal-side-nav-list side-nav-follow"> 
            <?php 
            $count = 0;
            $eventAttendees = event_attendees($eventId);
            if (!empty($eventAttendees)) {
            	foreach ($eventAttendees as $key) {
                        $follow = "";
                        $status = '+ Follow';
                        if ($loggedIn) {
                            $follow = 'onclick = "followMembers('.$userId.', '. $key['id'] .',this)"';
                            $getFollowedMembers = get_followed_member($userId,$key['id']);
                            if ($getFollowedMembers) {
                                $status = 'Unfollow';
                            }
                        }
            		if ($count <= 9) {
	            		$content = '<li>';
	            		$content .= '<a href="profile.php?profile_id='.$key['id'] .'">';
	            		$content .= '@'. $key['userName'];
	            		$content .= '</a>';
	            		$content .= '<p id=follow-id-'.$key['id'].' '. $follow.'>'.$status.'</p>';
	            		$content .= '</li>';
	            		echo $content;
	            		$count ++;
            		}
            	}
            }else{ 
            	echo '<li>No Students '.$collegeAbrev . '</li>';
            }
            ?>                  

            </ul>
        </section>

		</div>
	</div>


</div>


<?php 
include('inc/universal-nav.php');
?>