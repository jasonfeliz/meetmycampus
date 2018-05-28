<?php
require_once("inc/bootstrap.php");
if(isset($_COOKIE['user_id'])){
    if(isset($_SESSION['redirect_location'])){
        redirect($_SESSION['redirect_location']);
    }else{
        redirect("home.php");
    }
}
$pageTitle = "Sign In";
require_once('inc/mainHeader.php')
?>
            <div class="signInBody">
                    <form method="POST" action="procedures/doSignIn.php"> 
                        <div>
                            <p class="campusFont">Log In</p>
                        </div>
                        <hr class="">
                        <?php 
                        	if(isset($_SESSION['error_message'])) {
                        		echo '<p class="submitError">'.  $_SESSION['error_message'] .'</p>';
                        	}elseif (isset($_SESSION['reset_password'])) {
                                echo '<p class="">'.  $_SESSION['reset_password'] .'</p>';
                            }
                        ?>
                        <label for="">Email</label>
                        <input type="email" class="signInInput" name="emailAddress" placeholder="Email Address">

                       <div class="inlineSpanItems">
                           <label>Password</label>
                            <a class="spanLinks" href="procedures/doForgotPassword.php">Forgot Password?</a>
                       </div>

                        <input type="password" class="signInInput" name="passwordSignIn" placeholder="Enter Password">

                        <button type="submit" class="signInButton">Sign In</button>
                    </form>               
            </div>
<?php
    unset($_SESSION['error_message']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['email_login']);

?>