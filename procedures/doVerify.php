<?php

require_once("../inc/bootstrap.php");

$enteredCode  = $userId = "";
$yes = "yes";

if(isset($_GET['code'])){
	$userId = trim(filter_input(INPUT_GET, 'userID', FILTER_SANITIZE_NUMBER_INT));	
	$collegeEmail = findUserById($userId)['email'];

	$veriStatus = getVerifiedStatus($userId);
	if($veriStatus['verified']  == "no"){
 		$veriCode = getVeriCode($userId);
		if($_GET['code'] == $veriCode['verification_code'] && $userId == $veriCode['id']){
			updateVeriStatus($userId,$yes);
			deleteVeriCode($userId);
			$_SESSION['userVerifiedA'] = "verified";
			redirect('../verification.php');
		}else{
			$_SESSION['userEmail'] = $collegeEmail;
			$_SESSION['error_message'] = "Invalid Code. Please try again";
			$_SESSION['userVerifiedB'] = "error";
			redirect('../verification.php');
		}
	}else{
		$_SESSION['error_message'] = "Your email has already been verified. Please sign in!";
		redirect('../signin.php');
	}

}elseif(isset($_SESSION['verificationCode'])){
	$userId = $_COOKIE['user_id'];
	$collegeEmail = $_SESSION['userEmail'];
	$veriStatus = getVerifiedStatus($userId);

  	if($veriStatus['verified']  == "no"){
  		if  ($_SERVER["REQUEST_METHOD"] == "POST"){
  				$enteredCode = trim(filter_input(INPUT_POST,"sixDigitCode",FILTER_SANITIZE_NUMBER_INT));
  				if ($enteredCode == $_SESSION['verificationCode']){

  					$_SESSION['userVerifiedA'] = "verified";
					updateVeriStatus($userId,$yes);
					deleteVeriCode($userId);
					redirect('../verification.php');
  				}else{
  					$_SESSION['error_message'] = "Invalid Code. Please try again";
  					$_SESSION['userVerifiedB'] = "error";
  					redirect('../verification.php');
  				}
  		}elseif (isset($_GET['requestType'])) {

                $veriCode = rand(100000,999999);
                updateVeriCode($userId,$veriCode);
				$emailVerify = sendVerificationEmail($collegeEmail,$veriCode);

				if($emailVerify){
                    $_SESSION['verificationCode'] = $veriCode;
                    $_SESSION['userVerifiedB'] = "error";
                    $_SESSION['error_message'] = "We've sent you a new verification code.";
                    redirect('../verification.php');
				}
				
            }
			
  	}elseif($veriStatus['verified']  == "yes"){
  		$_SESSION['error_message'] = "Your email has already been verified. Please sign in!";
  		redirect('../signin.php');
  	}
}elseif (!isset($_SESSION['verificationCode'])) {
	$_SESSION['codeExpired'] = "This code has expired. Sign In to send new verification code:";
	redirect('doSignin.php');
}
redirect('../index.php');
?>