<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$checkFav = $color = "";
$privateCommunity = $newRequests = FALSE;
if (!empty($_GET['community_id'])) {
	$communityId = intval(trim(filter_input(INPUT_GET, 'community_id' ,FILTER_SANITIZE_STRING)));
	$categoryId = intval(trim(filter_input(INPUT_GET, 'category_id' ,FILTER_SANITIZE_STRING)));
	$communityCat = trim(filter_input(INPUT_GET, 'community_cat' ,FILTER_SANITIZE_STRING));
	$community = get_community($communityId,$collegeId);	
	if (!$community) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve community";
    	redirect("error_page.php");
	}
	if (!$communityCat || $communityCat != $community['community_category']) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve category";
    	redirect("error_page.php");
	}elseif($communityCat == 'group'){
		$communityConstant = TRUE;
		$majorConstant = FALSE;
		$storyConstant = FALSE;		
	}elseif($communityCat == 'story'){
		$communityConstant = FALSE;
		$majorConstant = FALSE;
		$storyConstant = TRUE;	
	}elseif($communityCat == 'majors'){
		$communityConstant = TRUE;
		$majorConstant = TRUE;
		$storyConstant = FALSE;	
	}

	$checkMember = is_member($userId,$communityId,null);
	if ($community['community_type'] == "private" && !$checkMember) {
		$privateCommunity = TRUE;
	}


	$studentCount = intval(get_user_count(NULL,$communityId,NULL));
}else{
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve get variables";
    	redirect("error_page.php");	
}

$pageTitle =  $community['community_name'] . " Community";
require_once('inc/main-header-test.php');

?>

<div class="main-content">

	<?php 

	if ($community['community_type'] == "private") {
		$checkAdmin = is_admin($userId,$communityId);
		if ($checkAdmin) {
			if (isset($_SESSION['cid-'.$communityId])) {
				$_SESSION['cid-'.$communityId] = ++$_SESSION['cid-'.$communityId];
			}else{
				$_SESSION['cid-'.$communityId] = 1;
			}

			$newRequests = intval(get_community_request($communityId,'new'));
				if ($_SESSION['cid-'.$communityId] == 1 || $newRequests > 0) {
					echo '<div id="c-requests-message" class="message-bar"><h4 class="message-header" id=request-id-'.$communityId.' onclick="openCommunityRequest('.$communityId.')">'.$newRequests . ' New Join Requests'.'</h4><span id="removeX">x</span></div>';
				}
		}
	}



	include('inc/community-banner.php');

	?>

	<div class="sub-main-content">
		<?php include('inc/community-panels.php');?>
		<?php include('inc/create-post.php');?>
		<?php include('inc/create-c-event.php');?>
		<?php include('inc/send-message.php');?>

		<section <?php if($storyConstant){echo 'class="school-home-body-story"';}else{ echo 'class="school-home-body"';}?> id="school-home-body">
				<div style="margin: 10px 0">
					<a style="color: #ea7363;font-weight: 600;" href="javascript:history.go(-1);"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Back</a>
				</div>
			<div class="content-body">


				<style type="text/css">

				</style>
				<section class="community-top-section tabs" id="load-community-section">
						<div id="discussions" class="active"><?php include('inc/c_posts.php');?></div>
						<div id="meetup"><?php include('inc/c_meetups.php');?></div>
						<div id="about">
							<div class="about-section">
								<div class="about-subsection">
									<div class="about-description">
										<h4 class="home-header">Description</h4>
										<p><?php 
										if ($majorConstant) {
											echo "Connect and discuss the latest topics and trends with " . $community['community_name'] . " majors ".$collegeAbrev;
										}elseif(is_null($community['community_description'])){
											echo "No Description";
										} else{
											echo nl2br($community['community_description']);
										}

										?></p>
									</div>	
									<div class="about-details">
										<h4 class="home-header">Details</h4>
										<ul class="about-list">
											<li>
												<span>College home: </span>
								        		<a href="home.php?school_name= <?php echo $urlCollegeName;?>" style="color:<?php echo $community['community_color']; ?>">
								        			<h5 style="font-weight: bold;"> <?php echo $collegeAbrev;?></h5>
								        		</a>
											</li>
											<li>
												<span>Category: </span>
				        						<a href="category.php?school_name=<?php echo $urlCollegeName; ?>&category_id=<?php echo $community['category_id']; ?>" style="color:<?php echo $community['community_color']; ?>"><h5 style="font-weight: bold;"><?php echo preg_replace('/\s+/', '', $community['category']); ?></h5></a>
											</li>
											<li>
												<div><?php echo count(get_community_members($communityId)); ?> Community subscribers</div>
											</li>
											<li>
												<div>Created on: <span><?php echo post_time($community['date_created']); ?><span></div>
											</li>
										</ul>
									</div>								
								</div>	
								<div>
									<?php
						            if ($communityConstant && !$majorConstant) {
						                $content = '<h5 class="side-nav-heading">Admin(' . count(get_community_admins($communityId)) .')</h5>';
						                $content .= '<ul class="universal-side-nav-list side-nav-follow">';

						                $admins = get_community_admins($communityId);
						                if (!empty($admins)) {
						                    foreach ($admins as $key) {
						                        $follow = "";
						                        $status = '+ Follow';
						                        if ($loggedIn) {
						                            $follow = 'onclick = "followMembers('.$userId.', '. $key['student_id'] .',this)"';
						                            $getFollowedMembers = get_followed_member($userId,$key['id']);
						                            if ($getFollowedMembers) {
						                                $status = 'Unfollow';
						                            }
						                        }
						                        $content .= '<li>';
						                        $content .= '<a href="profile.php?profile_id=' . $key['student_id']. '">' . '@' . $key['userName'] .'</a> ';
						                        $content .= '<p id=follow-id-a-'.$key['student_id'].' '. $follow.'>'.$status.'</p>';
						                        $content .= '<li>';
						                    }
						                }else{
						                   $content .= '<li style="padding:10px;">No admins '. '@' .$community['community_name'] . '</li>';
						                }

						                $content .= '</ul>';
						                echo $content;
						            }
						            ?>
						           <h5 class="side-nav-heading">
						            <?php 
						          		if ($communityConstant) {
						                	echo 'Subscribers('. count(get_community_members($communityId)) .')';
						                }
						            ?>
						            </h5>
						            <ul class="universal-side-nav-list side-nav-follow">                 
						            <?php
						            $members = "";
						            if ($communityConstant) {
						            	$members = get_community_members($communityId);
						            }
						            
						            if (!empty($members)) {
						                foreach ($members as $key) {
						                        $follow = "";
						                        $status = '+ Follow';
						                        if ($loggedIn) {
						                            $follow = 'onclick = "followMembers('.$userId.', '. $key['student_id'] .',this)"';
						                            $getFollowedMembers = get_followed_member($userId,$key['id']);
						                            if ($getFollowedMembers) {
						                                $status = 'Unfollow';
						                            }
						                        }
						                        $content = '<li>';
						                        $content .= '<a href="profile.php?profile_id=' . $key['student_id']. '">' . '@' . $key['userName'] .'</a> ';
						                        $content .= '<p id=follow-id-b-'.$key['student_id'].' '. $follow.'>'.$status.'</p>';
						                        $content .= '<li>';
						                    echo $content;
						                }
						            }else{
						            	if ($storyConstant) {
						            		 echo '';
						            	}else{
						            		echo '<li style="padding:10px;">No members '. '@' .$community['community_name'] . '</li>';
						            	}
						                
						            }

						            ?> 
						            </ul>
								</div>
							</div>
							
						</div>
				</section>
			</div>
		</section>
	</div>

</div>


															

<?php 
include('inc/universal-nav.php');
?>