<?php 
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$pageTitle = "Notifications";

include('inc/main-header-test.php');

if (isset($_POST['notification_id'])) {
	if (isset($_POST['remove'])) {
		$notification_id = intval(trim(filter_input(INPUT_POST,"notification_id",FILTER_SANITIZE_STRING)));
		$notification_obj = new Notification($connect,$_COOKIE['user_id']);
		$notification_obj->removeNotification($notification_id);
		exit;
	}elseif(isset($_POST['clear_all'])){
		$notification_obj = new Notification($connect,$_COOKIE['user_id']);
		$notification_obj->clearAllNotification();
		exit;
	}else{
		$notification_id = intval(trim(filter_input(INPUT_POST,"notification_id",FILTER_SANITIZE_STRING)));
		$notification_obj = new Notification($connect,$_COOKIE['user_id']);
		$notification_obj->openNotification($notification_id);
		exit;		
	}


}
?>
<div class="main-content">
	<?php include('inc/send-message.php');?>
		<div class="favorites-list jumbotron" style="margin-bottom: 10px;">
			<div class="container">
				<div class="jumbotron-header-bar profile-jumbotron">
					<div>
						<h2>Notifications</h2>
					</div>		
	
				</div><!-- end jumbotron header bar -->
			</div><!-- end container -->
			
		</div><!-- end jumbotron -->

		<div>

			<ul class="notifications_list">
			<?php
				$notification_obj = new Notification($connect,$_COOKIE['user_id']);
				echo $notification_obj->getAllNotifications();
			?>				
			</ul>
		</div>
</div><!-- end main content -->
<?php
include('inc/universal-nav.php');
?>