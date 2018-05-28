<?php
require_once('../inc/bootstrap.php');
$enteredPassword = $userId = $userEmail = $firstName = $lastName = $userUniversity = $hashed = "";

if(isset($_GET['userID'])){
	$userId = trim(filter_input(INPUT_GET, 'userID', FILTER_SANITIZE_NUMBER_INT));
	$userResetCode = trim(filter_input(INPUT_GET, 'resetCode', FILTER_SANITIZE_STRING));
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$enteredPassword = trim(filter_input(INPUT_POST,"newPassword",FILTER_SANITIZE_STRING));
				$hashed = password_hash($enteredPassword, PASSWORD_DEFAULT);

			    $resetCode = getResetCode($userId)['reset_code'];
			    if ($userResetCode === $resetCode) {
			    	updatePassword($userId,$hashed);
			    	deleteResetCode($userId);
					$_SESSION['reset_password'] = "Awesome, your password has been updated";
					redirect('../signin.php');
			    }
			    $_SESSION['error_message'] = "Oops! Something went wrong. Seems like the link you tried to access is broken";
			    redirect('../signin.php');

	}

	$_SESSION['userId'] = $userId;
	$_SESSION['reset_code'] = $userResetCode;
	redirect('../resetpassword.php');
}

redirect('../signin.php');




?>