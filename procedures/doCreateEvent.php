<?php 
require_once('../inc/bootstrap.php');
require_once('../inc/start.php');
$eventTitle = $eventDescription = $eventTypeId = $eventTypeB = $eventDate = $eventTime = $eventLocation = $communityId = $eventPhoto = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $communityId = intval(trim(filter_input(INPUT_POST,"community-id",FILTER_SANITIZE_STRING)));
    $eventTitle = trim(filter_input(INPUT_POST,"event-title",FILTER_SANITIZE_STRING));
  	$eventDescription = trim(filter_input(INPUT_POST,"event-description",FILTER_SANITIZE_STRING));
  	$eventTypeId = intval(trim(filter_input(INPUT_POST,"event-type",FILTER_SANITIZE_STRING)));
  	$eventTypeB = trim(filter_input(INPUT_POST,"event-type-b",FILTER_SANITIZE_STRING));
  	$eventDate = trim(filter_input(INPUT_POST,"event-date",FILTER_SANITIZE_STRING));
  	$eventTime = trim(filter_input(INPUT_POST,"event-time",FILTER_SANITIZE_STRING));
    $eventLocation = trim(filter_input(INPUT_POST,"event-location",FILTER_SANITIZE_STRING));

    if($communityId == ""){
      $communityId = NULL;
    }
    if (!is_null($communityId) && $eventTypeId == "") {
      $eventTypeId = 1;
    }
    if($eventTitle == "" || $eventTypeId == "" || $eventDescription == "" || $eventLocation == ""){
      $_SESSION['create_error_message'] = "Please fill in the required fields: Event Type, Event Description, Event Location";
      $_SESSION['event-title'] = $eventTitle;
      $_SESSION['event-description'] = $eventDescription;
      $_SESSION['event-location'] = $eventLocation;
      redirect('../events-list.php?school_name='. $urlCollegeName);
    }

    if ($_POST["address"] != "") {
      $_SESSION['create_error_message']  = "Bad form input";
      $_SESSION['event-title'] = $eventTitle;
      $_SESSION['event-description'] = $eventDescription;
      $_SESSION['event-location'] = $eventLocation;
      redirect('../events-list.php?school_name='. $urlCollegeName);
    }

    $result = create_event($eventTypeId,$collegeId,$userId,$communityId,$eventTypeB,$eventTitle,$eventDescription,$eventLocation,$eventDate,$eventTime,$eventPhoto);
    if ($result) {
      if (is_null($communityId)) {
        redirect('../event.php?school_name='. $urlCollegeName . '&event_id=' . $result['event_id']);
      }else{
        $type = "new_community_event";

        //get members of the community in which this event was created
        $community_obj = new Community($connect, $communityId,$userId);
        $community_members = $community_obj->get_community_members();
        //send notification that a new event was created in the community they belong to.
        if (!empty($community_members)) {
          foreach ($community_members as $key) {
              $notification_obj = new Notification($connect,$key['student_id']);
              $notification_obj->setNotification($type, NULL, $result['community_id'], NULL, NULL,NULL, $result['event_id']);
          }
        }
        redirect('../event.php?school_name='. $urlCollegeName . '&community_id=' . $result['community_id'] . '&event_id=' . $result['event_id']);
      }
    	
    }else{
      $_SESSION['create_error_message']  = "Something went wrong!";
      $_SESSION['event-title'] = $eventTitle;
      $_SESSION['event-type'] = $eventType;
      $_SESSION['event-description'] = $eventDescription;
      $_SESSION['event-location'] = $eventLocation;
      redirect('../events-list.php?school_name='. $urlCollegeName);
    }

}


?>