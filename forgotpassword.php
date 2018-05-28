<?php
require_once('inc/bootstrap.php');

$pageTitle = "Forgot Password?";
include('inc/mainHeader.php');
    if (isset($_SESSION['email_submitted'])) {
           echo '<div class="mainBody"><div class="veriWindow" style="text-align:center";><h3 class="">Thank You!</h3><hr><div class="veriBody">We have sent an email to <strong>' . $_SESSION['user_email'] . '</strong></div></div></div>';
           session_destroy();
    }else{
			  echo '<div class="mainBody"><div class="veriWindow">';
				if(isset($_SESSION['error_message'])){
            echo('<h4 class="submitError">' . $_SESSION['error_message'] . '</h4>');session_destroy();
        }
				echo '<h3 class="veriHeader">Forgot Password?</h3><div class="veriBody"><form action="procedures/doForgotPassword.php" method="post"><p>Enter your email address below and we\'ll get you back on track.</p><div class="inputButton"><input style="font-size:15px;" name="forgotEmail" placeholder="Enter your email" required><button type="submit" class="signInButton">Get Reset Link</button></div></form></div></div></div>';
		}

?>

