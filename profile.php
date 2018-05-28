<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$profileInfo = get_profile_info($profileId);
$profileAvatar = strtoupper(substr($profileInfo['firstName'],0,1). substr($profileInfo['lastName'], 0,1));
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
	<div class="content-body profile-body">
		<section class="profile-first-section">
			<i class="fa fa-ellipsis-h fa-lg" aria-hidden="true"></i>
			<div>
				<div style="width: 105px;margin: 10px auto;">
					<h1 class="profile-abbrev" style="padding: 20px;"><?php echo $profileAvatar; ?></h1>
				</div>
				<h3><?php echo '@'.$profileInfo['userName'] ?></h3>
				<h5><?php echo $profileInfo['uni_name'] ?></h5>
				<h5><?php echo $profileInfo['major'] ?></h5>
			</div>
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
		            	$content .= '<li id="messageBtn" style="">Message</li>';
		            	$content .= '<li id="follow_id" '.$follow.'>'.$status.' </li>';
		            }
		            echo $content;
				?>
				
				
			</ul>
		</section>
		<div class="secondary-profile-section">
			<section class="profile-content-section" id="profile-content-section">
				<h4>About Me</h4>
				<div class="profile-content-body">
					<ul>
						<li>
							<p><?php echo $profileInfo['about'] ?></p>
						</li>
						<li>
							<h5>Gender: <span><?php echo $profileInfo['gender'] ?></span></h5>
							<h5>From: <span><?php echo $profileInfo['location'] ?></span></h5>
							<h5>Grad Year: <span><?php echo $profileInfo['grad_year'] ?></span></h5>
							<h5>Major: <span><?php echo $profileInfo['major'] ?></span></h5>
						</li>

						<li>
							<p>What do you think of <?php echo $profileInfo['uni_name'].'?'; ?></p>
							<p><?php echo $profileInfo['question_1'] ?></p>
						</li>
						<li>
							<p>My favorite course at <?php echo $profileInfo['uni_name'].'?'; ?></p>
							<p><?php echo $profileInfo['question_2'] ?></p>
						</li>
						<li>
							<p>Why did I choose <?php echo $profileInfo['uni_name'].'?'; ?></p>
							<p><?php echo $profileInfo['question_3'] ?></p>
						</li>
					</ul>
				</div>
			</section>
			<section class="profile-content-section" id="profile-content-section">
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
				</div>
			</section>
			<section class="profile-content-section" id="profile-content-section">
				<h4>Communities</h4>
				<div class="profile-content-body">
									<ul class="group-list-item">
									<?php 
									 $communties = get_user_communities($profileId,null);
									 if (!empty($communties)) {
									 	foreach ( $communties as $key) {
										 	$content = '<li>';
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
				</div>
			</section>		
		</div>


	</div>	
</div>


<?php
include('inc/universal-nav.php');
?>