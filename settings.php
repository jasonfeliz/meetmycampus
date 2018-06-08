<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

$profileInfo = get_profile_info($_COOKIE['user_id']);
$profileAvatar = strtoupper(substr($userFirstName,0,1). substr($userLastName, 0,1));
$pageTitle = "Settings";
include('inc/main-header-test.php');
$setting = "you are amazing, jason felix"
?>


<div class="main-content" style="background: #fff;">
	<div class="favorites-list jumbotron"">
		<div class="container">
			<div class="jumbotron-header-bar">
				<div>
					<h2>Profile Settings</h2>
				</div>				
			</div><!-- end jumbotron header bar -->
		</div><!-- end container -->
		
	</div><!-- end jumbotron -->

	<div class="settings-body">
		<div class="account-settings">
			<div>
				<div class="settings-avatar">
					<h4>Account</h4>
					<div>
						<div style="width: 105px;margin: 10px auto;">
							<h1 class="profile-abbrev" style="padding: 20px;"><?php echo $profileAvatar; ?></h1>
						</div>
					</div>
					<div>
						<button>
							Change
							<i class="fa fa-camera"></i>
						</button>
					</div>
				</div>

				<form method="POST" action="" id="ud-profile" onsubmit="updateProfile(); return false;">
					<div class="settings-input">
						<div>
							<h5>My Info</h5>
						</div>
						<div>
							 <?php 
							 if (isset($_SESSION['settings_error'])) {
							 	echo '<p class="submitError">'.$_SESSION['settings_error'].'</p>';
							 	unset($_SESSION['settings_error']);
							 } elseif(isset($_SESSION['settings_success'])){
							 	echo '<p class="submitSuccess">'.$_SESSION['settings_success'].'</p>';
							 	unset($_SESSION['settings_success']);
							 }

							 ?>
						</div>
						<div>
							<label>Name</label>
							<input type="text" name="" value="<?php echo $userFirstName .' '. $userLastName; ?>" disabled>
						</div>
						<div>
							<label>Username</label>
							<input type="text" name="ud-username" id="ud-username" value="<?php echo $userName; ?>">
						</div>
						<div>
							<label>Major</label>
							<input type="text" name="ud-major" id="ud-major" value="<?php echo $profileInfo['major']; ?>">
							<input type="hidden" name="ud-major-id" id="ud-major-id" value="<?php echo $profileInfo['major_id']; ?>">
						</div>
						<div>
							<label>Email</label>
							<input type="email" name="ud-email" id="ud-email" value="<?php echo $userEmail; ?>">

							<label>College</label>
							<input type="text" name="ud-university" id="ud-university" value="<?php echo $userSchool; ?>" readonly>
						</div>
						<div>

	                        <div style="display:none">
	                                <label for="address">Address</label></th>
	                                <input type="text" id="address" name="address" />
	                                <p>Please leave this field blank</p></td>
	                        </div>
							<button id="save-button">Save Changes</button>
						</div>
					</div>			
				</form>				
			</div>


			<hr style="max-width: 80%;border-color:rgba(0,0,0,.1);">
			<div>
				<form method="POST" action="procedures/doUpdateProfile.php">
					<div class="settings-new-password">
							<div>
								<h5>Change Password</h5>
							</div>
							<div>
								<input type="password" name="old-pw" placeholder="Enter old password">			
							</div>
							<div>
								<input type="password" name="new-pw" placeholder="Enter new password">
							</div>
							<div>
								<input type="password" name="confirm-pw" placeholder="Confirm Password">						
							</div>
							<div>
								<input type="hidden" name="password" value="true">
								<button>Set New Password</button>
							</div>
					</div>			
				</form>	
			</div>

			
		</div><!-- end account settings -->

		<div class="delete-account">
			<p onclick="deleteAccount()">Delete Account?</p>
		</div><!-- end about me -->
	</div> <!-- end settings body -->


</div> <!-- end main content -->

<?php include('inc/universal-nav.php'); ?>