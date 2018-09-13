<?php 
class Community{

	private $connect;
	private $community;
	private $user_obj;


	public function __construct($connect,$communityId,$userId){
		$this->user_obj = new User($connect,$userId);
		$this->connect = $connect;
		global $connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT communities.community_id, communities.category_id, categories.category,college_student.userName,community_name,community_message,community_category,community_description,community_type,community_color,date_created,uni_name,uni_abrev  FROM communities 
											INNER JOIN college_student ON communities.creator_id = college_student.id
		                                    INNER JOIN categories ON communities.category_id =  categories.category_id
		                                    INNER JOIN colleges ON communities.college_id =  colleges.college_id
											WHERE community_id = ?");
				$stmt->bindParam(1,$communityId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$this->community =  $stmt->fetch(PDO::FETCH_ASSOC);

		}catch(Exception $e){
			throw $e;
		}
	}

	public function get_community(){
		return $this->community;
	}

	public function is_member($all=NULL){
		$connect = $this->connect;
		$userId = $this->user_obj->get_user_info()['id'];
		$communityId = $this->community['community_id'];
		if (is_null($all)) {
			try {
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT student_id FROM community_members WHERE student_id = ? AND community_id = ? AND status = 1");
				$stmt->bindParam(1,$userId,PDO::PARAM_INT);
				$stmt->bindParam(2,$communityId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);	
			} catch (Exception $e) {
				throw $e;
			}
		}else{
			try {
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT student_id FROM community_members WHERE student_id = ? AND community_id = ? AND status = 2");
				$stmt->bindParam(1,$userId,PDO::PARAM_INT);
				$stmt->bindParam(2,$communityId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);	
			} catch (Exception $e) {
				throw $e;
			}	
		}
		if (!empty($result)) {
			return $result;
		}else{
			return false;
		}
	}

	public function is_admin(){
		$connect = $this->connect;
		try {
			$connect->beginTransaction();
			$stmt = $connect->prepare("SELECT admin_level FROM community_admins WHERE student_id = ? AND community_id = ?");
			$stmt->bindParam(1,$this->user_obj->get_user_info()['id'],PDO::PARAM_INT);
			$stmt->bindParam(2,$this->community['community_id'],PDO::PARAM_INT);
			$stmt->execute();
			$connect->commit();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);	
		} catch (Exception $e) {
			throw $e;
		}

		if($result){
			if ($result['admin_level'] == '1') {
				return 'admin';
			}elseif ($result['admin_level'] == '2'){
				return 'creator-admin';
			}
		}else{
			return false;
		}
	}

	public function get_community_requests($status=NULL){
		$connect = $this->connect;
		$communityId = $this->community['community_id'];
		if (is_null($status)) {
			try {
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT first_name, last_name, userName, student_id FROM community_members
											INNER JOIN college_student ON  community_members.student_id = college_student.id
										 WHERE community_id = ? AND status = 2");
				$stmt->bindParam(1,$communityId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);	
				if (!empty($results)) {
					return $results;
				}else{
					return false;
				}
			} catch (Exception $e) {
				throw $e;
			}
		}else{
			try {
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT COUNT(*) FROM community_members WHERE community_id = ? AND status = 2 AND is_read = 0");
				$stmt->bindParam(1,$communityId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				return $stmt->fetchColumn();	
			} catch (Exception $e) {
				throw $e;
			}		
		}
	}

	public function get_community_admins(){
		$connect = $this->connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT community_admins.student_id, college_student.id,username FROM community_admins 
											INNER JOIN college_student ON community_admins.student_id = college_student.id
											WHERE community_id = ?");
				$stmt->bindParam(1,$this->community['community_id'],PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			throw $e;
		}
		if (!empty($results)) {
			return $results;
		}else{
			return false;
		}
	}

	public function get_community_members(){
		$connect = $this->connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT community_members.student_id,college_student.id,college_student.first_name,college_student.last_name, username,user_photo FROM community_members 
											INNER JOIN college_student JOIN user_profile ON community_members.student_id = college_student.id AND college_student.id = user_profile.student_id
											WHERE community_id = ? AND status = 1 AND community_members.student_id <> 38");
				$stmt->bindParam(1,$this->community['community_id'],PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			throw $e;
		}
			return $results;

	}

	public function get_community_discussions($string){
		$connect = $this->connect;
		$communityId = $this->community['community_id'];
		if ($string == "stories") {
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT c_discussion_id, student_id, c_discussion_title, c_discussion_post, post_date,community_discussion_photo FROM community_discussions 
												INNER JOIN college_student ON community_discussions.student_id = college_student.id 
												INNER JOIN communities JOIN colleges ON community_discussions.community_id = communities.community_id AND communities.college_id = colleges.college_id 
												WHERE community_discussions.community_id = ? ORDER BY post_date DESC");
					$stmt->bindParam(1,$communityId,PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}else{
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT c_discussion_id,c_discussion_title, student_id, userName, c_discussion_post, post_date,community_discussion_photo FROM community_discussions
												INNER JOIN college_student ON community_discussions.student_id = college_student.id 
												INNER JOIN communities JOIN colleges ON community_discussions.community_id = communities.community_id AND communities.college_id = colleges.college_id 
												WHERE community_discussions.community_id = ? ORDER BY post_date DESC");
					$stmt->bindParam(1,$communityId,PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}	
		}

	}

	public function get_community_events(){
		$connect = $this->connect;
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT event_id,community_id, student_id, event_access, event_title, event_description, event_location, event_address, event_date, event_time, event_photo, date_created,event_photo FROM events
												INNER JOIN college_student ON events.student_id = college_student.id
												WHERE community_id= ?");
					$stmt->bindParam(1,$this->community['community_id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}		
	}

}

?>