<?php
require_once('inc/bootstrap.php');

$pageTitle = "Reset Password";
include('inc/mainHeader.php');
if (isset($_SESSION['userId'])) {
	echo '<div class="mainBody"><div class="veriWindow"><h3 class="veriHeader">Reset Password</h3><div class="veriBody"><form action="procedures/doResetPassword.php?userID=' . $_SESSION['userId'] . '&resetCode='. $_SESSION['reset_code'] .'"'.' method="post"><p>Please enter your new password.</p><div class="inputButton"><input type="password" style="font-size:15px;" name="newPassword" placeholder="New Password (At least 6 characters)" minlength="6" required><button type="submit" class="signInButton">Reset Password</button></div></form></div></div>';
	unset($_SESSION['userId']);
	unset($_SESSION['reset_code']);
}else{
	redirect('index.php');
}


		
?>