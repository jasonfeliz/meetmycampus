<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$getVar =  $_SERVER["REQUEST_URI"];
if (!empty($_GET['community_id'])) {
	$communityId = intval(trim(filter_input(INPUT_GET, 'community_id' ,FILTER_SANITIZE_STRING)));
	$community = get_community($communityId,$collegeId);
	if (!$community) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve community";
    	redirect("error_page.php");
	}
	$communityConstant = TRUE;

}else{
	$community = NULL;
}
$pageTitle = $collegeName. ' - Connect';
include('inc/main-header-test.php');

?>
	<div class="main-content">
		<?php 
			if (!empty($community)) {
				include('inc/community-banner.php');
			}else{
				include('inc/school-nav.php');
			}
		?>
		<div class="sub-main-content">
			<?php include('inc/invite.php');?>
			<section class="school-home-body" id="school-home-body">
				<div class="content-body">
						<div class="communities-list">
								<section>
									<div class="main-heading-section">
										<div class="home-header-section">
											<h3 class="home-header">Connect</h3>
											<button id="createCommunityBtn"> + Invite Classmates</button>
										</div>				
									</div>									
								</section>
								<section>
									<ul class="connect-list">
						            <?php 
						            if (!empty($community)) {
						            	$studentList = get_community_members($communityId);
						            }
						            if (!empty($studentList)) {
						            	foreach ($studentList as $key) {
												$userAbbrev = strtoupper(substr($key['firstName'],0,1). substr($key['lastName'], 0,1));
							            		$content = '<li class="connect-list-item">';
							            		$content .= '<div>';	
							            		$content .= '<a href="profile.php?profile_id=' .$key['id']. '"><h4 class="profile-abbrev" style="margin-right:10px;">'. $userAbbrev .'</h4></a>';
							            		$content .= '<a href="profile.php?profile_id=' .$key['id']. '" class="connect-list-item-name">' . '@'.$key['userName'] . '</a>';
							            		$content .= '</div>';
							            		$content .= '<ul class="connect-list-item-interests"><li><p>+ Follow</p></li></ul>';
							            		
							            		$content .= '</li>';
							            		echo $content;
						            		}
						            }else{ 
						            	if (!empty($community)) {
						            		echo '<li style="padding:20px;">No members '. '@' .$community['community_name'] . '</li>';
						            	}else{
						            		echo '<li style="padding:20px;">No students '.$collegeAbrev . '. Invite your classmates to join the MeetMyCampus Community '. $collegeAbrev .'</li>';
						            	}
						            }
						            ?>

									</ul>
								</section>							
						</div>
				</div>
			</section>
		</div>
	</div>



<?php
include('inc/universal-nav.php');
?>