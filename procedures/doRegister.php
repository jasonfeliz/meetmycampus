<?php
require_once('../inc/bootstrap.php');

$collegeEmail = $university = $password = $firstName = $lastName = $hashed = $userName = $userMajor = $majorId = $createMajor = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim(filter_input(INPUT_POST,"firstName",FILTER_SANITIZE_STRING));
    $lastName = trim(filter_input(INPUT_POST,"lastName",FILTER_SANITIZE_STRING));
    $userName = trim(filter_input(INPUT_POST,"userName",FILTER_SANITIZE_STRING));
    $userMajor = trim(filter_input(INPUT_POST,"userMajor",FILTER_SANITIZE_STRING));
    $majorId = intval(trim(filter_input(INPUT_POST,"majorId",FILTER_SANITIZE_STRING)));
    $collegeEmail = trim(filter_input(INPUT_POST,"userCollegeEmail",FILTER_SANITIZE_EMAIL));
    $university = trim(filter_input(INPUT_POST,"userCollege",FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST,"userCollegePassword",FILTER_SANITIZE_STRING));
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName;

    if($firstName == "" || $lastName == "" || $collegeEmail == "" || $password == "" || $userName == "" || $userMajor == ""){
      if (isset($_SESSION['redirect_location']) && isset($_GET['status'])) {
        if ($_GET['status'] == 'not_signed_up') {
          $redirect = $_SESSION['redirect_location'];
          $_SESSION['not_signed_up_error'] = "Please fill in the required fields: First Name, Last Name, Major, Email, University, Password";
          redirect($redirect);
        }
      }else{
          $_SESSION['error_message'] = "Please fill in the required fields: First Name, Last Name, Major, Email, University, Password";
          redirect('../signup.php');    
      }
    }
    if ($majorId == "") {
      if (isset($_SESSION['redirect_location']) && isset($_GET['status'])) {
        if ($_GET['status'] == 'not_signed_up') {
          $redirect = $_SESSION['redirect_location'];
          $_SESSION['not_signed_up_error'] = "Oops! It looks like this major is not offered at your school. Try choosing one from the dropdown list as you type.";
          redirect($redirect);
        }
      }else{
          $_SESSION['error_message'] = "Oops! It looks like this major is not offered at your school. Try choosing one from the dropdown list as you type.";
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


    if ($_POST["address"] != "") {
           $_SESSION['error_message']  = "Bad form input";
            redirect('../index.php');
    }



        $createUser = create_user($university,$firstName,$lastName,$userName,$collegeEmail,$hashed);
        $checkMajor = check_major($enteredSchool['college_id'],$majorId);
        if (empty($checkMajor)) {
          $createMajor = create_major($enteredSchool['college_id'],$majorId,$userMajor);
          join_community($createMajor,$createUser['id'],1);

        }else{

          try{
            $connect->beginTransaction();
            $sql = "SELECT community_id FROM communities WHERE community_name = ? AND college_id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(1,$userMajor,PDO::PARAM_STR);
            $stmt->bindParam(2,$enteredSchool['college_id'],PDO::PARAM_INT);
            $stmt->execute();
            $connect->commit();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            join_community($result['community_id'],$createUser['id'],1);
          }catch(Exception $e){
            throw $e;
          }
          
        }

        follow_school($enteredSchool['college_id'],$createUser['id']);
        if(!empty($createUser)){
              $createProfile = create_profile($createUser['id'],$majorId);
              setcookie('user_id',$createUser['id'],time()+860000,'/', 'localhost');
              if (isset($_SESSION['redirect_location'])) {
                    $redirect = $_SESSION['redirect_location'];
                    redirect($redirect);
              }else{
                redirect('../home.php');
              }
              
            // try{
            //     $veriCode = rand(100000,999999);
            //     $emailVerify = sendVerificationEmail($collegeEmail,$veriCode);
            //     if($emailVerify){
            //         setVeriCode($emailVerify['id'],$veriCode);
            //         setcookie('user_id', $emailVerify['id']);
            //         $_SESSION['verificationCode'] = $veriCode;
            //         $_SESSION['userVerifiedB'] = "error";
            //         exit(header("Location:../verification.php")); 
            //     }  
            // }catch(Exception $e){
            //     throw $e;
            // }
        }
}

?>