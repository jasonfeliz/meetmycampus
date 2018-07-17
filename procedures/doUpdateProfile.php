<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$newUserName = $newMajorId = $newEmail = $newCollege = $newMajor = $oldPassword = $newPassword = $confirmPassword = $about = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['profile'])) {
      $about = urldecode(trim(filter_input(INPUT_POST,"ud-about",FILTER_SANITIZE_STRING))); 
      $newUserName = urldecode(trim(filter_input(INPUT_POST,"ud-username",FILTER_SANITIZE_STRING)));
      $newMajor = urldecode(trim(filter_input(INPUT_POST,"ud-major",FILTER_SANITIZE_STRING)));
      $newMajorId = trim(filter_input(INPUT_POST,"ud-major-id",FILTER_SANITIZE_NUMBER_INT));
      $newEmail = urldecode(trim(filter_input(INPUT_POST,"ud-email",FILTER_SANITIZE_EMAIL)));
      $newCollege = urldecode(trim(filter_input(INPUT_POST,"ud-university",FILTER_SANITIZE_STRING)));

      if ($newUserName == "" || $newMajor == "" || $newEmail == "" || $newCollege == "" || $about == "") {
        $_SESSION['settings_error'] = "Please fill in the required fields: Username, Major, Email, University, About";
        redirect('../settings.php');
      }


      if ($newMajorId == "") {
        $_SESSION['settings_error'] = "Oops! It looks like this major is not offered at your school. Try choosing one from the dropdown list as you type.";
        redirect('../settings.php');
       }

      $enteredSchool = get_school_info($newCollege);
      if(empty($enteredSchool)){
        $_SESSION['settings_error'] = "Oh No! Seems like MeetMyCampus has yet to arrive at your new school. Be patient, we'll get to you soon!" ;
        redirect('../settings.php');
       }

      if ($_POST["address"] != "") {
             echo "Bad form input";
      } 
       
        $checkMajor = check_major($enteredSchool['college_id'],$newMajorId);
        if (empty($checkMajor)) {
          $message =   "Connect and discuss the latest topics and trends with " . $newMajor . " majors @".$newCollege;
          create_major($enteredSchool['college_id'],$newMajorId,$newMajor,$message);
        }

        $updateUser = update_user($userId,$enteredSchool['college_id'],$newEmail,$newUserName,$newMajorId,$about);
        follow_school($enteredSchool['college_id'],$userId);

        $_SESSION['settings_success'] = "Your settings have been successfully saved!";
        redirect('../settings.php');
  }elseif(isset($_POST['password'])){
        $oldPassword = trim(filter_input(INPUT_POST,"old-pw",FILTER_SANITIZE_STRING));
        $newPassword = trim(filter_input(INPUT_POST,"new-pw",FILTER_SANITIZE_STRING));
        $confirmPassword = trim(filter_input(INPUT_POST,"confirm-pw",FILTER_SANITIZE_STRING));
        $hashed = password_hash($confirmPassword, PASSWORD_DEFAULT);

        if ($oldPassword == "" || $newPassword == "" || $confirmPassword == "") {
          $_SESSION['settings_error'] = "Please fill in the required fields: Old Password, New Password, Confirm Password";
          redirect('../settings.php');
        }

        $user = get_user_info($userId);
        if (!password_verify($oldPassword,$user['token'])) {
          $_SESSION['settings_error'] = "You entered an invalid password. Try Again" ;
          redirect('../settings.php');
        }elseif($newPassword != $confirmPassword){
          $_SESSION['settings_error'] = "Your passwords don't match. Try again" ;
          redirect('../settings.php');
        }else{
          update_password($userId,$hashed);
          $_SESSION['settings_success'] = "Your password has been successfully updated!";
          redirect('../settings.php');         
        }

  }elseif (isset($_POST['delete_account'])) {

    delete_user($userId);
    setcookie('user_id', '', time()-(365*24*60*60),'/','localhost');
    redirect('../index.php?logout_type=deleted_account');

  }elseif(isset($_POST['confirm_password'])){
        $newPassword = trim(filter_input(INPUT_POST,"new-pw",FILTER_SANITIZE_STRING));
        $confirmPassword = trim(filter_input(INPUT_POST,"confirm-pw",FILTER_SANITIZE_STRING));
  }

}
?>