<?php
class Notification {

	private $user_id;
	private $connect;

	public function __construct($connect, $userId){
		$this->connect = $connect;
		$this->user_id = $userId;

	}

	public function getUnreadNumber(){
		$connect = $this->connect;
		$user_id = $this->user_id;
		try {
			$connect->beginTransaction();
			$stmt = $connect->query("SELECT * FROM notifications WHERE viewed = 0 AND user_to = $user_id");
			$connect->commit();
			return count($stmt->fetchAll(PDO::FETCH_ASSOC));
		} catch (Exception $e) {
				throw $e;	
		}		
	}

	public function getAllNotifications(){
		$connect = $this->connect;
		$user_id = $this->user_id;
		$content = "";

		try {
			$connect->beginTransaction();
			//gets all notifications in descending order it was create
			$stmt = $connect->query("SELECT * FROM notifications WHERE user_to = '$user_id' ORDER BY notification_id DESC");
			$all_notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);//toss results into a variable

			//gets new notifications. will be used to send a message to user informing how many new notitfications they have 
			$stmt = $connect->query("SELECT * FROM notifications WHERE user_to = '$user_id' AND viewed = 0");
			$new_notifications = $stmt->fetchAll(PDO::FETCH_ASSOC); //toss results into a variable
			$set_viewed_query = $connect->query("UPDATE notifications SET viewed=1  WHERE user_to='$user_id'");

			$connect->commit();				
		} catch (Exception $e) {
			throw $e;
		}

		if (count($all_notifications) == 0) {
			$content .= "<h4>You have no notifications</h4>";
		}elseif (count($new_notifications) > 0) {
				if (count($new_notifications) == 1) {
					$content .= "<h4>You have " . count($new_notifications)  ." new notification</h4>";
				}else{
					$content .= "<h4>You have " .  count($new_notifications) ." new notifications</h4>";
				}
				
		}else{
			$content .= '<h4 id="clear_notifications" style="cursor:pointer;">Clear All Notifications</h4>';
		}


		//use foreach loop to iterate though all notifications
		foreach ($all_notifications as $key) {
			$style = $link = $timeframe = "";
			//get timeframe
			$timeframe = post_time($key['datetime']);

			//get notification type and set the message per type and get information from the 'notifier' to add for link
			switch($key['type']) {
				case 'new_community':
					$com_obj = new Community($connect,$key['community_from'],$user_id);
					$community_info = $com_obj->get_community();
					$community_id = $community_info['community_id'];
					$community_cat = $community_info['community_category'];
					$college_name = urlencode($community_info['uni_name']);
					$link = '<a href="community.php?school_name='. $college_name .'&community_id='.$community_id.'&community_cat='.$community_cat.'" class="notification_link" data-n-id="'.$key["notification_id"].'"><span>' . $community_info['community_name'] . "</span> Community has been created in your <span>" . $community_info['category'] ."</span> interest<span> @".ucfirst($community_info['uni_abrev']) ."</span></a>";
					break;
				case 'new_community_discussion':
					$discussion_info = get_community_discussion($key['community_from'],$key['discussion_from']);
					$college_name = urlencode($discussion_info['uni_name']);
					$community_id = $discussion_info['community_id'];
					$discussion_id = $discussion_info['c_discussion_id'];
					$link = '<a href="community-discussion.php?school_name='. $college_name .'&community_id='.$community_id.'&c_discussion_id='.$discussion_id.'" class="notification_link" data-n-id="'.$key["notification_id"].'">A new discussion titled: "<span>'.$discussion_info['c_discussion_title'].'"</span> was posted to <span>'.$discussion_info['community_name'].'</span> Community</a>';
					break;
				case 'discussion_reply':
					$user_from_obj = new User($connect,$key['user_from']);
					$user_from_user_id = $user_from_obj->get_user_id();
					$user_from_username = $user_from_obj->get_username();
					$discussion_info = get_community_discussion($key['community_from'],$key['discussion_from']);
					$reply_id = $key['comment_from'];
					$college_name = urlencode($discussion_info['uni_name']);
					$community_id = $discussion_info['community_id'];
					$discussion_id = $discussion_info['c_discussion_id'];
					$link = '<a href="community-discussion.php?school_name='. $college_name .'&community_id='.$community_id.'&c_discussion_id='.$discussion_id.'#c_reply_'.$reply_id.'" class="notification_link" data-n-id="'.$key["notification_id"].'"><span>@'.$user_from_username . '</span> replied to your post titled: "<span>'.$discussion_info['c_discussion_title'].'"</span></a>';
					break;
				case 'reply_comment':
					$user_from_obj = new User($connect,$key['user_from']);
					$user_from_user_id = $user_from_obj->get_user_id();
					$user_from_username = $user_from_obj->get_username();
					$discussion_info = get_community_discussion($key['community_from'],$key['discussion_from']);
					$reply_id = $key['comment_from'];
					$college_name = urlencode($discussion_info['uni_name']);
					$community_id = $discussion_info['community_id'];
					$discussion_id = $discussion_info['c_discussion_id'];
					$link = '<a href="community-discussion.php?school_name='. $college_name .'&community_id='.$community_id.'&c_discussion_id='.$discussion_id.'#comment_'.$reply_id.'" class="notification_link" data-n-id="'.$key["notification_id"].'"><span>@'.$user_from_username . '</span> wrote a comment to your reply</a>';
					break;
				case 'user_followed';
					$user_from_obj = new User($connect,$key['user_from']);
					$user_from_user_id = $user_from_obj->get_user_id();
					$user_from_username = $user_from_obj->get_username();
					$link = '<a href="profile.php?profile_id='.$user_from_user_id.'" class="notification_link" data-n-id="'.$key["notification_id"].'"><span>@'.$user_from_username . '</span> started following you</a>';
					break;
				case 'new_community_event':
					$event_info = get_event(NULL,$key['community_from'],$key['event_from']);
					$college_name = urlencode($event_info['uni_name']);
					$event_id = $event_info['event_id'];
					$community_id = $event_info['community_id'];
					$link = '<a href="event.php?school_name='. $college_name .'&community_id='.$community_id.'&event_id='.$event_id.'" class="notification_link" data-n-id="'.$key["notification_id"].'">A new event, <span>' .$event_info['event_title'] . ',</span> was created in <span>'. $event_info['community_name'] .'</span> Community</a>';
					break;
			}
			//check if item has been opened, if no, add css style to background
			if ($key['opened'] == 0) {
				$style = 'style="background:#f2f7ffa8"'; 
			}
			//load content variable with content based on info
			$content .= '<li class="notifications_list_item" '.$style.'>';		
			$content .= '<div>';
			$content .= $link;
			$content .= '<span>'.$timeframe .'</span><i class="fa fa-times remove_x"></i>

';
			$content .= '</div>';
			$content .= '</li>';	



		}

		return $content;


	
	}

	//sets the notifications when an event is triggered
	public function setNotification($type,$user_from = NULL,$community_from = NULL,$discussion_from = NULL,$comment_from = NULL,$category_from = NULL,$event_from = NULL){
			$connect = $this->connect;
			$user_id = $this->user_id;
			try {
				$connect->beginTransaction();
				$insert_query = $connect->prepare("INSERT INTO notifications(`user_to`,`user_from`,`community_from`,`discussion_from`,`comment_from`,`category_from`,`event_from`,`type`) VALUES(?,?,?,?,?,?,?,?)");
				$insert_query->bindParam(1,$user_id,PDO::PARAM_INT);
				$insert_query->bindParam(2,$user_from,PDO::PARAM_INT);
				$insert_query->bindParam(3,$community_from,PDO::PARAM_INT);
				$insert_query->bindParam(4,$discussion_from,PDO::PARAM_INT);
				$insert_query->bindParam(5,$comment_from,PDO::PARAM_INT);
				$insert_query->bindParam(6,$category_from,PDO::PARAM_INT);
				$insert_query->bindParam(7,$event_from,PDO::PARAM_INT);
				$insert_query->bindParam(8,$type,PDO::PARAM_STR);
				$insert_query->execute();
				$connect->commit();	

				return	TRUE;	
			} catch (Exception $e) {
				throw $e;
			}

			
	}

	public function removeNotification($notification_id){
		$connect = $this->connect;
		$user_id = $this->user_id;
		$set_opened_query = $connect->query("DELETE FROM notifications WHERE notification_id = '$notification_id' AND user_to = '$user_id'");
		return true;		
	}
	public function clearAllNotification(){
		$connect = $this->connect;
		$user_id = $this->user_id;
		$set_opened_query = $connect->query("DELETE FROM notifications WHERE user_to = '$user_id'");
		return true;		
	}
	public function openNotification($notification_id){
		$connect = $this->connect;
		$user_id = $this->user_id;
		$set_opened_query = $connect->query("UPDATE notifications SET opened=1  WHERE user_to='$user_id' AND notification_id = '$notification_id'");
		return true;
	}
}


?>