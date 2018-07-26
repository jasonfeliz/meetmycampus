<?php
require_once('../inc/bootstrap.php');

$collegeEmail = $university = $password = $firstName = $lastName = $hashed = $userName = $userMajor = $majorId = $createMajor = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST['setup_account']) {
    echo 'account setup';
  }else{
    $firstName = trim(filter_input(INPUT_POST,"firstName",FILTER_SANITIZE_STRING));
    $lastName = trim(filter_input(INPUT_POST,"lastName",FILTER_SANITIZE_STRING));
    $userName = trim(filter_input(INPUT_POST,"userName",FILTER_SANITIZE_STRING));
    $collegeEmail = trim(filter_input(INPUT_POST,"userCollegeEmail",FILTER_SANITIZE_EMAIL));
    $university = trim(filter_input(INPUT_POST,"userCollege",FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST,"userCollegePassword",FILTER_SANITIZE_STRING));
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName;

    if($firstName == "" || $lastName == "" || $collegeEmail == "" || $password == "" || $userName == ""){
      if (isset($_SESSION['redirect_location']) && isset($_GET['status'])) {
        if ($_GET['status'] == 'not_signed_up') {
          $redirect = $_SESSION['redirect_location'];
          $_SESSION['not_signed_up_error'] = "Please fill in the required fields: First Name, Last Name, Email, University, Password";
          redirect($redirect);
        }
      }else{
          $_SESSION['error_message'] = "Please fill in the required fields: First Name, Last Name, Email, University, Password";
          redirect('../signup.php');    
      }
    }

    $enteredSchool = get_school_info($university);
    if(empty($enteredSchool)){
      if (isset($_SESSION['redirect_location']) && isset($_GET['status'])) {
        if ($_GET['status'] == 'not_signed_up') {
          $redirect = $_SESSION['redirect_location'];
          $_SESSION['not_signed_up_error'] = "Oh No! Seems like MeetMyCampus has yet to arrive at your school. Be patient, we'll get to you soon!" ;
          redirect($redirect);
        }
      }else{
          $_SESSION['error_message'] = "Oh No! Seems like MeetMyCampus has yet to arrive at your school. Be patient, we'll get to you soon!" ;
          redirect('../signup.php');    
      }
    }

    $user = findUserByEmail($collegeEmail);

    if(!empty($user)){
        if ($_GET['status'] == 'not_signed_up') {
          $redirect = $_SESSION['redirect_location'];
          $_SESSION['not_signed_up_error'] = "Oops! This email has already been used. Try Signing In";
          redirect($redirect);
      }else{
          $_SESSION['error_message'] = "Oops! This email has already been used. Try Signing In";
          redirect('../signup.php');    
      }
    }
    $checkUsername = check_username($userName);
    if(!empty($checkUsername)){
        if ($_GET['status'] == 'not_signed_up') {
          $redirect = $_SESSION['redirect_location'];
          $_SESSION['not_signed_up_error'] = "Oops! This username is taken. Try another one.";
          redirect($redirect);
      }else{
          $_SESSION['error_message'] = "Oops! This username is taken. Try another one.";
          redirect('../signup.php');    
      }
    }
    if ($_POST["address"] != "") {
           $_SESSION['error_message']  = "Bad form input";
            redirect('../index.php');
    }



        $createUser = create_user($university,$firstName,$lastName,$userName,$collegeEmail,$hashed,'college_student');
        follow_school($enteredSchool['college_id'],$createUser['id']);
        if(!empty($createUser)){
              $createProfile = create_profile($createUser['id'],NULL);
              setcookie('username',$userName,time()+860000,'/', 'localhost'); 
              setcookie('user_id',$createUser['id'],time()+860000,'/', 'localhost');
              redirect('../build-profile.php');
        }
  }

}

?>