<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$communityColor = $categoryId = $communityName = $communityMessage = $communityType = $communityPhoto = $result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$communityColor = trim(filter_input(INPUT_POST,"community_color",FILTER_SANITIZE_STRING));
	$categoryId = intval(trim(filter_input(INPUT_POST,"category_id",FILTER_SANITIZE_STRING)));
	$communityName = trim(filter_input(INPUT_POST,"community_name",FILTER_SANITIZE_STRING));
	$communityMessage = trim(filter_input(INPUT_POST,"community_message",FILTER_SANITIZE_STRING));
    $communityDescription = trim(filter_input(INPUT_POST,"community_description",FILTER_SANITIZE_STRING));
	$communityType = trim(filter_input(INPUT_POST,"community_type",FILTER_SANITIZE_STRING));


    if($categoryId == "" || $communityName == "" || $communityMessage == "" || $communityDescription == ""){
        $_SESSION['create_error_message'] = "Please fill in the required fields: Category, Community Name, Community Message";
       $_SESSION['community_name'] = $communityName;
       $_SESSION['community_message'] = $communityMessage;
       $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php?school_name='. $urlCollegeName);
    }

    $getCommunityName = get_community_name($communityName,$collegeId);
    if (!empty($getCommunityName)) {
        $_SESSION['create_error_message'] = "Oops! Seems like the Community Name you chose is already taken. Try a different name!";
        $_SESSION['community_message'] = $communityMessage;
        $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php?school_name='. $urlCollegeName);
    }


    if ($_POST["address"] != "") {
        $_SESSION['create_error_message']  = "Bad form input";
        $_SESSION['community_name'] = $communityName;
        $_SESSION['community_message'] = $communityMessage;
        $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php');
    }

    $new_community = create_community($collegeId,$categoryId,$userId,$communityName,$communityMessage,$communityDescription,$communityType,$communityColor,$communityPhoto);

    if ($new_community) {
        $type = "new_community";
        $college_id = $new_community['college_id'];

        //get users that follow the interest or category in which this new community belongs to
        try {
            $connect->beginTransaction();
            $stmt = $connect->prepare("SELECT student_id  FROM interests 
                                        INNER JOIN college_student ON interests.student_id = college_student.id
                                        WHERE category_id = ?");
            $stmt->bindParam(1,$categoryId,PDO::PARAM_INT);
            $stmt->execute();
            $connect->commit(); 

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);          
        } catch (Exception $e) {
            throw $e;
        }
        if (!empty($result)) {
            foreach ($result as $key) {
                //loop through the user's array and get the list of colleges they follow or belong to.
                $connect->beginTransaction();
                $stmt = $connect->prepare("SELECT college_id FROM school_followers WHERE user_id = ?");
                $stmt->bindParam(1,$key['student_id'],PDO::PARAM_INT);
                $stmt->execute();
                $connect->commit();
                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($array)) {
                    foreach ($array as $id) {
                        //if the college id of the new community is in the list of colleges that the target user follows, then send that user a notitfication that a new user has been created at one of their schools 
                        if (intval($id['college_id']) == $college_id) {
                            $notification_obj = new Notification($connect,$key['student_id']);
                            $notification_obj->setNotification($type, NULL, $new_community['community_id'], NULL, NULL,$categoryId, NULL);
                        }

                    }
                }


            }
        }

    	redirect('../community.php?school_name='. $urlCollegeName . '&category_id=' . $categoryId . '&community_id=' . $new_community['community_id'] . '&community_cat=' . $new_community['community_category'] );
    }else{
 		$_SESSION['create_error_message'] = "Something Went Wrong!";
       	$_SESSION['community_name'] = $communityName;
       	$_SESSION['community_message'] = $communityMessage;
        $_SESSION['community_description'] = $communityDescription;
        redirect('../home.php?school_name='. $urlCollegeName);
    }

}


?>
