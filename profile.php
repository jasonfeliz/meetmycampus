<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$profileInfo = $user_obj->get_profile_info();
$profileAvatar = strtoupper(substr($profileInfo['first_name'],0,1). substr($profileInfo['last_name'], 0,1));
if (!$profileInfo) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve profile";
    	redirect("error_page.php");
	}

$pageTitle = 'Profile - ' . $profileInfo['userName'];
include('inc/main-header-test.php');
?>
<div class="main-content">
	<?php include('inc/send-message.php');?>
		<div class="favorites-list jumbotron" style="margin-bottom: 10px;">
			<div class="container">
				<div class="jumbotron-header-bar profile-jumbotron">
					<div>
						<?php if ($userId != $profileId): ?>
							<div class="profile-ellipsis">
								<i class="fa fa-ellipsis-h fa-lg" aria-hidden="true" id="<?php echo $profileId; ?>" onclick="showEllipsis(this)"></i>
								<div class="ellipsis-menu">
									<ul>
										<li data-type="report_profile" data-id="<?php echo $profileId; ?>" class="ellipsis-button report-btn">Report</li>
										<li data-type="block_profile" data-id="<?php echo $profileId; ?>" class="ellipsis-button">Block User</li>
									</ul>
								</div>
							</div>
						<?php endif; ?>
						<h2><?php echo '@'.$profileInfo['userName'] ?></h2>
							<div>
								<ul class="profile-buttons">
									<?php
							            $follow = $content = "";
							            $status = '+ Follow';
							            if ($loggedIn) {
							            	$follow = 'onclick = "followMembers('.$userId.', '. $profileId .',this)"';
							            	$getFollowedMembers = get_followed_member($userId,$profileId);
							            	if ($getFollowedMembers) {
							            		$status = 'Unfollow';
							            	}
							            }
							            
							            if ($userId != $profileId) {
							            	$content .= '<li class="action-btn" id="messageBtn" style="">Message</li>';
							            	$content .= '<li class="action-btn" id="follow_id" '.$follow.'>'.$status.' </li>';
							            }else{
							            	$content .= '<li class="action-btn" style=""><a href="settings.php" >Edit Profile</a></li>';
							            }

							            echo $content;
									?>
									
									
								</ul>
							</div>
					</div>		
	
				</div><!-- end jumbotron header bar -->
			</div><!-- end container -->
			
		</div><!-- end jumbotron -->
		<div class="favorites-list">
			<section class="container">
				<div>
					<a style="color: #ea7363;font-weight: 600;display: block;margin: 0 0 20px 0;" href="javascript:history.go(-1);"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Back</a>
				</div>
				<section class="profile-main">
					<div class="profile-main-secondary">
						<div class="profile-content-section">
							<h4>About</h4>
							<div class="profile-content-body">
								<ul>
									<li>
										<p><?php echo $profileInfo['about'] ?></p>
									</li>
									<li>
										<h5>College: <span><?php echo $profileInfo['uni_name'] ?></span></h5>
										<h5>Major: <span><?php echo $profileInfo['major'] ?></span></h5> 
										<h5>Grad Year: <span><?php echo $profileInfo['grad_year'] ?></span></h5>
										<h5>From: <span><?php echo $profileInfo['location_state']?></span></h5>
									</li>
								</ul>
							</div>	<!-- end profile-content body -->
						</div> <!-- end profile content section -->					
					</div>

					<div class="profile-main-primary">
						<div class="profile-content-section" id="profile-content-section">
							<h4>Interests</h4>
							<div class="profile-content-body">
										<ul class="group-list-item">
											<?php 
											 $interests = get_interests($profileId);
											 if (!empty($interests)) {
											 	foreach ($interests as $key) {
												 	$content = '<li class="main-thumbnail ' . $key['css_style'].'">';
												 	$content .= '<div class="overlay"></div>';
												 	$content .= '<a href="category.php?school_name=' . urlencode($profileInfo['uni_name']). '&category_id='. $key['category_id'] . '" class="category-thumbnail-title">'. $key['category'] . '</a>';
												 	$content .= '</li>';
												 	echo $content;
											 	}

											 }else{
											 	echo '<li>No Interests</li>';
											 }
											?>
										</ul>	
							</div>	<!-- end profile-content body -->
						</div> <!-- end profile content section -->
						<div class="profile-content-section" id="profile-content-section">
								<h4>Communities</h4>
								<div class="profile-content-body">
													<ul class="group-list-item">
													<?php 
													 $communties = get_user_communities($profileId,null);
													 if (!empty($communties)) {
													 	foreach ( $communties as $key) {
														 	$content = '';
														 	$content.=	'<li><a href="community.php?school_name='. urlencode($key['uni_name']) . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
														 	$content .= '<img src="img/community5.png">';
														 	$content .= '<h5>' . $key['community_name']. '</h5>';
														 	$content .= '</a>';
														 	$content .= '</li>';
														 	echo $content;
													 	}

													 }else{
													 	echo '<li>No Communities</li>';
													 }
													?>
													</ul>	
							</div>	<!-- end profile-content body -->
						</div> <!-- end profile content section -->
					</div>

				</section>

			</section> <!-- end container -->
		</div>
</div>


<?php
include('inc/universal-nav.php');
?>