<?php
require_once("inc/bootstrap.php");
if(isset($_COOKIE['user_id'])){
	if(isset($_SESSION['redirect_location'])){
		redirect($_SESSION['redirect_location']);
	}else{
		redirect("home.php");
	}
    
}
$pageTitle = "Join Us!";
require_once('inc/mainHeader.php');
?>
            <div class="signInBody">
                        <div>
                            <p class="campusFont">Join us - it's free!</p>
                        </div>
                    <div style="margin: 15px 0;">
                         Already a member? <a href="signin.php?status=not_signed_in" class="modal-links">Sign in here!</a>
                    </div>
                    <form id="signUpForm" method="POST" action="procedures/doRegister.php"> 
                            <div id="collegeForm" class="collegeForm">
                                <?php 
                                    if (isset($_SESSION['error_message'])) {
                                         echo "<p class='validateError' style='display:block'>". $_SESSION['error_message'] . "</p>";

                                    }

                                ?>
                                <div class="firstLastName">
                                    <label for="">First Name</label>
                                     <input class="signInInput" type="text" name="firstName" placeholder="First Name" value="<?php if (isset($_SESSION['error_message'])) { echo $_SESSION['first_name']; } ?>">        

                                    <label for="">Last Name</label>
                                    <input  type="text" class="signInInput" name="lastName" placeholder="Last Name" value="<?php if (isset($_SESSION['error_message'])) { echo $_SESSION['last_name'];} ?>">
                                </div>
                                <div>
                                    <label for="">Username</label>
                                    <input class="signInInput"  type="text" name="userName" placeholder="Choose a username">                               
                                </div>
                                <div>
                                    <label for="">Major</label>
                                    <input type="text" class="signInInput" name="userMajor" id="user-major" placeholder="Your Major">   
                                    <input type="hidden" name="majorId" id="major-id" value=''>                              
                                </div>
                                <div id="emailSchool" class="emailSchool">
                                    <label for="">Email</label>
                                    <input  class="signInInput" type="email" name="userCollegeEmail" placeholder="Email (Must be a valid .edu email)">

                                    <label for="">College or University</label>
                                    <input class="signInInput"  type="text" name="userCollege" id="collegeSignUp" placeholder="University">                            
                                </div>

                                <label for="">Choose a password</label>
                                <input class="signInInput"  type="password" name="userCollegePassword" placeholder="Choose password (Mininum 6 characters)" minlength="6" >
                            </div>

                            <div style="display:none">
                                    <label for="address">Address</label></th>
                                    <input type="text" name="address" />
                                    <p>Please leave this field blank</p></td>
                            </div>
                            <button type="submit" id="signUpButton" class="signInButton">Sign Up</button>
                            <p style="font-size: .85em;margin:10px 0;">By clicking Sign Up, you are agreeing to our <span><a href="privacy.php" class="modal-links">Privacy Policy </a> and <a href="terms.php" class="modal-links">Terms & Conditions </a></span></p>
                    </form>               
            </div>

<?php
include('inc/universal-nav.php');
    unset($_SESSION['error_message']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['email_login']);

?>