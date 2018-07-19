<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$pageTitle = $collegeName . ' Events';
include('inc/main-header-test.php');

?>
	<div class="main-content">
		<?php include('inc/school-nav.php');?>
		<div class="sub-main-content">
			<?php include('inc/panels.php');?>
			<?php include('inc/create-event.php'); ?>
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
						<div class="communities-list">
								<section>
									<div class="main-heading-section">
										<?php 
											if($loggedIn){
												$onClick = 'id="createCommunityBtn"';
											}elseif(!$loggedIn){
												$userId = 0;
											}
										?>
										<div class="home-header-section">
											<h3 class="home-header">Meetups</h3>
											<button <?php echo $onClick; ?> > + Create Meetup</button>
										</div>				
									</div>
					
								</section>

								<section id="show-event" class="tabs">
									<div id="e_c" class="active">
										<?php echo $schoolInfo->showMeetups('communities'); ?>
									</div>
									<div id="e_rc">
										<?php echo showMeetups('recreation_sports'); ?>
									</div>
									<div id="e_ac">
										<?php echo showMeetups('academics_career'); ?>
									</div>
									<div id="e_sl">
										<?php echo showMeetups('student_life'); ?>
									</div>
									<div id="e_le">
										<?php echo showMeetups('local_events'); ?>
									</div>
								</section>
						</div>
					</div>
			</section>

<?php
include('inc/universal-nav.php');
?>