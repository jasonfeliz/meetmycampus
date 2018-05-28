<?php

require_once("../inc/bootstrap.php");

$emailSignIn = $passwordSignIn = $userEmail = $userId = $userUniversity = $userToken = $userVeriStatus = $userName = "";

if (isset($_POST["emailAddress"])) {

	$emailSignIn = trim(filter_input(INPUT_POST,"emailAddress",FILTER_SANITIZE_EMAIL));
    $passwordSignIn = trim(filter_input(INPUT_POST,"passwordSignIn",FILTER_SANITIZE_STRING));


	$user = findUserByEmail($emailSignIn);	
    if(empty($user) || !password_verify($passwordSignIn,$user['token'])) {
    	if (isset($_SESSION['redirect_location']) && isset($_GET['status'])) {
    		if ($_GET['status'] == 'not_signed_in') {
                $redirect = $_SESSION['redirect_location'];
    			$_SESSION['not_signed_in_error'] = "Username/Password combination is invalid";
                $_SESSION['email_login'] = $emailSignIn;
    			redirect($redirect);
    		}
    	}else{
	  		$_SESSION['error_message'] = "Username/Password combination is invalid";
	  		redirect('../signin.php'); 		
    	}
 
	}

	$userInfo = get_user_info($user['id']);

	$userId =  $userInfo['id'];

	// if($userVeriStatus === "no") {
 //                $veriCode = rand(100000,999999);
 //                updateVeriCode($userId,$veriCode);
 //                $emailVerify = sendVerificationEmail($userEmail,$veriCode);
 //                if($emailVerify){
 //                    setcookie('user_id', $emailVerify['id']);
 //                    $_SESSION['verificationCode'] = $veriCode;
 //                    $_SESSION['userEmail'] = $userEmail;
 //                    $_SESSION['userVerifiedB'] = "error";
 //                    $_SESSION['error_message'] = "Please verify your email!";
 //                    redirect('../verification.php'); ; 
 //                }
	// }elseif (isset($_SESSION['codeExpired'])) {
	//     $_SESSION['error_message'] = $_SESSION['codeExpired'];
	//     redirect('../signin.php');
	// }
	setcookie('user_id', $userId,time()+860000,'/', 'localhost');
    	if (isset($_SESSION['redirect_location'])) {
            $redirect = $_SESSION['redirect_location'];
            redirect($redirect);
    	}else{
    		redirect('../home.php');
    	}
		
	
}
redirect('../signin.php');
?>