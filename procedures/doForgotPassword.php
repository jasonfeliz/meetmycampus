<?php
require_once('../inc/bootstrap.php');
$userId = $userEmail = $firstName = $user = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  		$enteredEmail = trim(filter_input(INPUT_POST,"forgotEmail",FILTER_SANITIZE_EMAIL));

  		$user = findUserByEmail($enteredEmail);

  		if(empty($user)) {
  			$_SESSION['error_message'] = "The email you entered is invalid. Please enter your email again or create an account";
  			redirect('../forgotpassword.php');
  		}
      $salt1 = "qm&h*";
      $salt2 = "pg!@";
      $userId = $user['id'];
      $resetCode = hash("ripemd128", "$salt1$userId$salt2");
  		$sentMail = sendResetPasswordEmail($user,$resetCode);
  		if($sentMail){
        setResetCode($userId,$resetCode);
  			$_SESSION['email_submitted'] = 'email submitted';
  			$_SESSION['user_email'] = $enteredEmail;
  			redirect('../forgotpassword.php');
  		}
}


redirect('../forgotpassword.php');
?>