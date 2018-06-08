<?php
require_once('inc/bootstrap.php');
if (isset($_SESSION['error_page_message'])) {
    unset($_SESSION['error_page_message']);
    unset($_SESSION['system_error_message']);
}

if (isset($_COOKIE['user_id'])) {
    redirect('home.php');
}
require_once("inc/header.php");
?>
lets do some branching in github!
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="header-links nav navbar-nav">
                <ul class="logo-left-side">
                    <li class="">
                            <a class="page-scroll" href="#page-top"><img class="logo" src="img/logo3.gif"></a>
                    </li>
                </ul>
                <ul class="navbar-nav nav collapse navbar-collapse">
                    <li>
                        <a class="page-scroll" href="#communities">Communities</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#connect">Connect</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#campus_life">Campus Life</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#reviews">Reviews</a>
                    </li>
                </ul>
            </div><!-- /.header-links end -->
            <div class="navbar-nav navbar-right">
                <ul class="header-buttons">
                    <li>
                        <button id="signInOverlay" class="signIn-button">Sign In</button>
                    </li>
                    <li>
                        <button id="joinUsOverlay" class="register-button">Join Us</button>
                    </li>
                </ul>
            </div><!-- /.header-buttons end -->
            
        <div id="myModal" class="modal"<?php if (isset($_SESSION['error_message'])) {echo 'style="display:block"';}?>>
            <div class="modal-content">
                <div class="modal-content-header">
                    <span class="close">&times;</span>
                    <p>Join us!</p>                
                </div><!-- /.modal-content-header end -->
                <div class="modal-content-body">
                    <form id="signUpForm" action="procedures/doRegister.php" method="POST">               

                        <div class="signUpFormHeader">
                            <p>MeetMyCampus</p>
                        </div>
                        <div id="collegeForm" class="collegeForm">
                            <?php 
                                if (isset($_SESSION['error_message'])) {
                                     echo "<p class='validateError' style='display:block'>". $_SESSION['error_message'] . "</p>";

                                }

                            ?>
                            <p class="submitError">College students must register with a valid .edu email</p>
                            <div class="firstLastName">
                                <label for="">First Name</label>
                                <input type="text" name="firstName" placeholder="First Name" value="<?php if (isset($_SESSION['error_message'])) { echo $_SESSION['first_name']; } ?>">

                                <label for="">Last Name</label>
                                <input type="text" name="lastName" placeholder="Last Name" value="<?php if (isset($_SESSION['error_message'])) { echo $_SESSION['last_name']; session_unset();session_destroy();} ?>">
                            </div>
                            <div>
                                <label for="">Username</label>
                                <input type="text" name="userName" placeholder="Choose a username">                               
                            </div>
                            <div>
                                <label for="">Major</label>
                                <input type="text" name="userMajor" id="user-major" placeholder="Your Major">   
                                <input type="hidden" name="majorId" id="major-id" value=''>                              
                            </div>
                            <div id="emailSchool" class="emailSchool">
                                <label for="">Email</label>
                                <input type="email" name="userCollegeEmail" placeholder="Email (Must be a valid .edu email)">

                                <label for="">College or University</label>
                                <input type="text" name="userCollege" id="collegeSignUp" placeholder="University">                            
                            </div>

                            <label for="">Choose a password</label>
                            <input type="password" name="userCollegePassword" placeholder="Choose password (Mininum 6 characters)" minlength="6" >
                        </div>

                        <div style="display:none">
                                <label for="address">Address</label></th>
                                <input type="text" id="address" name="address" />
                                <p>Please leave this field blank</p></td>
                        </div>
                        <button type="submit" id="signUpButton" class="signUpButton">Sign Up</button>
                        <p class="signUpAgreement">By clicking Sign Up, you are agreeing to our <span><a href="privacy.php">Privacy Policy </a> and <a href="terms.php">Terms & Conditions </a></span></p>


                    </form>               
                </div><!-- /modal-content-body end -->
            </div><!-- /modal-content end -->
        </div><!-- /modal end -->
        <div id="mySignInModal" class="signInModal">
            <div class="modal-content">
                <div class="modal-content-header">
                    <span class="close">&times;</span>
                    <img class="logo" src="img/logo4.gif">              
                </div><!-- /.modal-content-header end -->

                <div class="modalContentBodySignIn">
                    <form method="POST" action="procedures/doSignIn.php"> 
                        <div>
                            <p>Log In</p>
                        </div>
                        <hr class="">
                        <p class="submitError">Email and/or Password you entered are not correct </p>
                        <label for="">Email</label>
                        <input type="email" name="emailAddress" placeholder="Email Address">

                       <div>
                           <label for="password">Password</label>
                            <a class="spanLinks" href="procedures/doForgotPassword.php">Forgot Password?</a>
                       </div>

                        <input type="password" name="passwordSignIn" placeholder="Enter Password">

                        <button type="submit" class="signInButton">Sign In</button>
                    </form>               
                </div><!-- /modal-content-body end -->
            </div><!-- /modal-content end -->
        </div><!-- /modal end -->
    </nav><!-- navbar -->
  
    <header>
        <div class="overlay"></div>
        <?php 
        if (isset($_GET['logout_type']) && $_GET['logout_type'] == 'deleted_account') {
            echo '<div class="message" style="background: #5ca05c;">Your account has been successfully deleted.</div>';
        }

        ?>
        <div class="header-content">
            <div class="header-content-inner ">
                <img src="img/mmc_font.png">
                <h1 id="homeHeading">Join the best place to discover your campus!</h1>
                <div class="header-content-inner-form border-color">
                    <p>Discover. Create. Collaborate.</p>
                    <form id="explore-colleges-form" class='explore-college-form ui-widget' action="home.php" method="GET">
                        <input id="explore-colleges" name="school_name" placeholder="Explore a campus..." class="explore-colleges-input" autocomplete="on">
                        <button type="submit" class="search-button ">Search</button>
                    </form>
                </div>
            </div>
            <a href="#communities" class="btn btn-primary btn-xl page-scroll  ">Learn More</a>
        </div>
    </header>
<div class="sections sections-primary-bg">
    <section class="container" id="communities">
        <div>
            <div class="row">
                <div class=" text-center main-section">
                    <div class="">
                        <img class='section-icon sr-icons' src="img/community4.png" alt="College communities"> 
                    </div>
                    <h2 class="section-heading">Build Communities!</h2>
                    <hr class="">
                    <p class="section-description">Collaborate with your peers by building communities. Create a movement on campus, share ideas, interests and dislikes. Let your voice be heard.</p>

                </div>
            </div>
        </div>
    </section>
    <section class="container" id="connect">
         <div>
            <div class="row">
                <div class=" text-center main-section">
                    <div class="">
                        <img class='section-icon sr-icons' src="img/connect-icon2.png" alt="Connect with college students"> 
                    </div>
                    <h2 class="section-heading">Connect with Students!</h2>
                    <hr class="">
                    <p class="section-description">Meet and chat with verified-students from around the world. Find your future roomates. Start meetups with your classmates. Connect with each other.   </p>
                </div>
            </div>
        </div>
    </section>
    

    <section class="container" id="campus_life">
         <div>
            <div class="row">
                <div class=" text-center main-section">
                    <div class="">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons section-icon" alt="explore campus college life"></i> 
                    </div>
                    <h2 class="section-heading">Explore Campus Life!</h2>
                    <hr class="">
                    <p class="section-description">Each university has a unique story to tell. Discover adventures, parties, events and much more. Explore&nbsp;social life at any campus.  </p>
                </div>
            </div>
        </div>
    </section>
    <section class="container " id="reviews">
         <div>
            <div class="row">
                <div class=" text-center main-section">
                    <div class="">
                        <i class="fa fa-4x fa-star-half-o text-primary sr-icons section-icon" alt="college ratings and reviews"></i> 
                    </div>
                    <h2 class="section-heading">Ratings & Reviews!</h2>
                    <hr class="">
                    <p class="section-description">Search professors, courses, and campus reviews before making any decisions. Find out what other students are saying about your college.</p>
                </div>
            </div>
        </div>
    </section>  
</div>


    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2 class="section-heading">Join now - It's Free!</h2>
                <input type="text" id="joinUsBottom" name="join-us" placeholder="Enter your college email..." class="join-us-input border-color">
                <button type="submit" id="joinUsButtonBottom" class="search-button btn-bg">Join Us!</button>
            </div>
        </div>
    </aside>

    <footer class="bg-dark">
        <div class="container border-color">
            <ul class="footer-links">
                <li><a href="#">about</a></li>
                <li><a href="#">guidelines</a></li>
                <li><a href="#">contact us</a></li>
                <li><a href="#">privacy</a></li>
                <li><a href="#">terms and conditions</a></li>
            </ul>
            <hr>
            <p class="logo-text-color">&copy; 2017 Meet My Campus LLC. All Rights Reserved.</p>
        </div>
    </footer>    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
