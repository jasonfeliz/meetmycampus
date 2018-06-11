<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="College communities. Best college social network. Explore Campus Life. Find out what real students are saying about their schools. Explore college life. Discover cool events or communities on campus. Connect with students. College ratings,reviews,discussion forums,Q&A">
    <meta name="author" content="">

    <title><?php echo "Meet My Campus - " . $pageTitle; ?></title>
    <link rel="icon" type="image/png" href="img/logo/logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Amatic+SC' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins|Raleway" rel="stylesheet">


    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <!-- Theme CSS -->
    <link href="css/mainStyles.css" rel="stylesheet">
    <link href="css/explore.css" rel="stylesheet">
     <link href="css/profile.css" rel="stylesheet">
     <link href="css/messages.css" rel="stylesheet">
<!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->


</head>
<body id="page-top">

<header class="bg-primary">
    <nav id="" class="main-nav-header main-container">
        <ul class="nav-list">
            <li><a class="" href="index.php" ><img class="logo" src="img/logo/logo3.gif"></a></li>
            <li class="sm-screen-search">
                <div>
                    <form method="GET" action="search.php">
                        <div>
                            <i id="search-button" class="fa fa-search fa-lg" aria-hidden="true" style="cursor: pointer;color: #DF7367;"></i>
                            <input class="sm-screen-search-input explore-colleges-input" type="text" name="search" placeholder="Search for Colleges" autocomplete="on">
                            <button type="submit" style="display: none;"></button>
                        </div>     
                    </form>                   
                </div>               
            </li>
            <?php if($loggedIn):?>
            <li class="main-menu-button">
                <i id="menu-button" class="fa fa-bars fa-2x" aria-hidden="true"></i>
            </li>
            <?php endif; ?>
            <li class="lg-screen-search">
                <form method="GET" action="home.php" id="explore-colleges-form" class='explore-college-form ui-widget'>
                    <div class="input-group stylish-input-group">
                        <input id="explore-colleges" type="text" name="school_name" class="form-control lg-screen-search-input"  placeholder="Search for Colleges" >
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>  
                        </span>
                    </div>     
                </form>
            </li>
            <li>
            <?php if($loggedIn):?>
                <ul class="header-icons-list">
                    <li><a href="home.php" class="home-button">Home</a></li>
                    <li><a href="favorites.php"><i class="fa fa-heart fa-lg favorite-btn" aria-hidden="true"></i></a></li>
<!--                     <li><a href="messages.php"><i class="fa fa-envelope-o fa-lg nav-secondary-btn" aria-hidden="true"></i></a></li> -->
                    <li><a href="notifications.php"><i class="fa fa-bell-o fa-lg nav-secondary-btn" aria-hidden="true"></i></a></li>
                    <li style="border-left: solid 1px #c5c5c53d;"><a href="profile.php?profile_id=<?php echo $userId;  ?>"><h5 class="profile-abbrev"><?php echo $userAbbrev ?></h5></a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            <?php endif; ?>
            <?php if (!$loggedIn):?>
                <ul class="header-icons-list">
                    <li>
                        <button onclick="not_signed_in_modal('login')" class="signIn-button">Sign In</button>
                    </li>
                    <li>
                        <button id="joinUsOverlay" class="register-button">Join Us</button>
                    </li>
                </ul>
            <?php endif; ?> 
            </li>
        </ul>
       <div id="not-signed-in" class="modal" <?php if (isset($_SESSION['not_signed_in_error'])) { echo 'style="display:block"'; } ?>>
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header">
                            <h4 id="login-modal-header"></h4>
                          </div> 
                        
                            <div class="modal-body ">
                                <div>
                                    Not a member? <a href="signup.php?status=not_signed_up" class="modal-links">Join us here!</a>
                                </div>
                                <form method="POST" action="procedures/doSignIn.php?status=not_signed_in">

                                    <?php 
                                        if(isset($_SESSION['not_signed_in_error'])) {
                                            echo '<p class="submitError">'.  $_SESSION['not_signed_in_error'] .'</p>';
                                            
                                        }
                                    ?>
                                    <div>
                                        <input type="email" class="signInInput" name="emailAddress" placeholder="Email Address" value="<?php if(isset($_SESSION['not_signed_in_error'])){echo $_SESSION['email_login'];} ?>">                                        
                                    </div>

                                   <div>
                                       <input type="password" class="signInInput" name="passwordSignIn" placeholder="Enter Password">
                                   </div>

                                   <div class="forgot-password">
                                        <a href="procedures/doForgotPassword.php" class="modal-links">Forgot Password?</a>
                                   </div>

                                    <button type="submit" class="signInButton">Sign In</button>
                                </form> 
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 

        <div id="myModal" class="modal"<?php if (isset($_SESSION['not_signed_up_error'])) {echo 'style="display:block"';}?>>
            <div class="modal-content">
                <div class="modal-content-header">
                    <span class="close">&times;</span>
                </div><!-- /.modal-content-header end -->
                <div class="modal-content-body">
                    <div class="modal-header">
                        <h4>Join us - it's free</h4>
                    </div> 
                    <div class="modal-body">
                        <div>
                            Already a member? <a href="signin.php?status=not_signed_in" class="modal-links">Sign in here!</a>
                        </div>
                        <form id="signUpForm" action="procedures/doRegister.php?status=not_signed_up" method="POST">               
                            <div id="collegeForm" class="collegeForm">
                                <?php 
                                    if (isset($_SESSION['not_signed_up_error'])) {
                                         echo "<p class='validateError' style='display:block'>". $_SESSION['not_signed_up_error'] . "</p>";

                                    }

                                ?>
                                <div class="firstLastName">
                                        <label for="">First Name</label>
                                        <input class="signInInput" type="text" name="firstName" placeholder="First Name" value="<?php if (isset($_SESSION['not_signed_up_error'])) { echo $_SESSION['first_name']; } ?>">        

                                    <label for="">Last Name</label>
                                    <input  type="text" class="signInInput" name="lastName" placeholder="Last Name" value="<?php if (isset($_SESSION['not_signed_up_error'])) { echo $_SESSION['last_name']; session_unset();session_destroy();} ?>">
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
             
                </div><!-- /modal-content-body end -->
            </div><!-- /modal-content end -->
        </div><!-- /modal end -->

<?php 
    unset($_SESSION['not_signed_in_error']);
    unset($_SESSION['not_signed_up_error']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['email_login']);
?>

    </nav>

</header>
<div id="mobile-menu">
    <div>
        <ul class="mobile-menu-primary">
            <li>
                <div>
                    <a href="home.php">Welcome, <?php echo '@'.$userName; ?></a>
                </div>
                
            </li>
            <li>
                <div>
                    <a href="profile.php?profile_id=<?php echo $userId;?>">My Profile</a>
                </div>
                
            </li>
            <li>
                <div>
                    <a href="favorites.php">My Favorites</a>
                </div>
            </li>
            <li>
                <div>
                    <a href="notifications.php">My Notifications</a>
                </div>
                
            </li>
        </ul>
        <ul class="mobile-menu-secondary">
            <li>
                <a href="settings.php?profile_id=<?php echo $userId; ?>">Settings</a>
            </li>
            <li>
                <a href="l">About</a>
            </li>
            <li>
                <a href="">Guidelines</a>
            </li>
            <li>
                <a href="">Terms & Conditions</a>
            </li>
            <li>
                <a href="">Privacy Policy</a>
            </li>
            <li>
                <a href="">Contact</a>
            </li>
            <li>
                <a href="logout.php" style="color: #DF7367;font-weight: bold;">Log out</a>
            </li>               
        </ul>
    </div>
</div>
<div class="main-body">
 


