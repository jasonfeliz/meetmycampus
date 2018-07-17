<?php 
class User {
	private $userId;
	private $connect;

	//construct
	public function __construct($connect,$userId){
		$this->connect = $connect;
		global $connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT id,first_name, last_name, username, email, token, uni_name,user_type,deleted
														  FROM college_student INNER JOIN colleges ON college_student.college_id = colleges.college_id WHERE id=?");
				$stmt->bindParam(1,$userId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$this->user = $stmt->fetch(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			throw $e;
		}
	}
	public function get_user_id(){
		return $this->user['id'];
	}
	public function get_full_name(){
		return ucfirst($this->user['first_name']) . ' ' . ucfirst($this->user['last_name']);
	}
	public function get_abbrevated_name(){
		return strtoupper(substr($this->user['first_name'],0,1). substr($this->user['last_name'], 0,1));;
	}
	public function get_username(){
		return $this->user['username'];
	}
	public function get_user_type(){
		return $this->user['user_type'];
	}
	public function get_user_school(){
		return $this->user['uni_name'];
	}
	public function get_user_email(){
		return $this->user['email'];
	}
	public function is_deleted(){
		if ($this->user['deleted'] == 1) {
			return true;
		}else{
			return false;
		}
	}
	public function delete_user(){
		$connect = $this->connect;
		try{
			$connect->beginTransaction();
			$stmt = $connect->prepare("UPDATE college_student SET deleted = 1 WHERE id = ?");
			$stmt->bindParam(1,$this->user['id'],PDO::PARAM_INT);
			$return = $stmt->execute();
			$connect->commit();
			return $return;
	  	}catch(Exception $e){
	  	  	throw $e;
	  	}
	}

	public function get_user_communities($all=null){
		$connect = $this->connect;
		if (is_null($all)) {
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT uni_name,community_members.community_id, community_name, category_id,community_category,community_color  FROM community_members
												INNER JOIN communities JOIN colleges ON community_members.community_id = communities.community_id AND communities.college_id = colleges.college_id
												WHERE student_id = ? AND status = 1");
					$stmt->bindParam(1,$this->user['id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			}catch(Exception $e){
				throw $e;
			}
		}else{
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT uni_name,community_members.community_id, community_name, category_id,community_category,community_color  FROM community_members
												INNER JOIN communities JOIN colleges ON community_members.community_id = communities.community_id AND communities.college_id = colleges.college_id
												WHERE student_id = ?");
					$stmt->bindParam(1,$this->user['id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			}catch(Exception $e){
				throw $e;
			}	
		}

		if (!empty($results)) {
			return $results;
		}else{
			return false;
		}

	}
	
	public function get_user_interests(){
		$connect = $this->connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT uni_name,interests.category_id, category, css_style  FROM interests
											INNER JOIN categories ON interests.category_id = categories.category_id 
											INNER JOIN college_student JOIN colleges ON interests.student_id = college_student.id AND college_student.college_id = colleges.college_id
											WHERE student_id = ?");
				$stmt->bindParam(1,$this->user['id'],PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(Exception $e){
			throw $e;
		}
	}

	public function get_followers(){
		$connect = $this->connect;
		$userId = $this->user['id'];
		try {
			$connect->beginTransaction();
			$stmt = $connect->query("SELECT friend_id FROM friend_followers WHERE user_id = '$userId'");
			$connect->commit();
			$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);	
		} catch (Exception $e) {
			throw $e;
		}
		if (!empty($results)) {
			return $results;
		}else{
			return false;
		}

	}

	public function get_profile_info(){
		$connect = $this->connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT id, colleges.college_id, uni_name,first_name,last_name,userName, email,about,gender,location_city,location_state,grad_year,major_id,major  FROM user_profile 
											INNER JOIN college_student JOIN colleges ON user_profile.student_id = college_student.id AND college_student.college_id = colleges.college_id
											INNER JOIN majors_list ON user_profile.major_id = majors_list.major_list_id
											WHERE user_profile.student_id = ?");
				$stmt->bindParam(1,$this->user['id'],PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				return $stmt->fetch(PDO::FETCH_ASSOC);

		}catch(Exception $e){
			throw $e;
		}
	}
	public function update_user($collegeId,$email,$username,$majorId,$about){
		$connect = $this->connect;
		try {
			$connect->beginTransaction();
			$stmt = $connect->prepare("UPDATE college_student SET college_id = ?, email = ?, username = ? WHERE id = ?");
			$stmt->bindParam(1,$collegeId,PDO::PARAM_INT);
			$stmt->bindParam(2,$email,PDO::PARAM_STR);
			$stmt->bindParam(3,$username,PDO::PARAM_STR);
			$stmt->bindParam(4,$this->user['id'],PDO::PARAM_INT);
			$stmt->execute();

			$stmt = $connect->prepare("UPDATE user_profile SET major_id = ?,about = ? WHERE student_id = ?");
			$stmt->bindParam(1,$majorId,PDO::PARAM_INT);
			$stmt->bindParam(2,$about,PDO::PARAM_STR);
			$stmt->bindParam(3,$this->user['id'],PDO::PARAM_INT);
			$stmt->execute();
			$connect->commit();
			return true;		
		} catch (Exception $e) {
			throw $e;
		}
	}
	public function update_password($hashed){
		$connect = $this->connect;
		try {
			$connect->beginTransaction();
			$stmt = $connect->prepare("UPDATE college_student SET token = ? WHERE id = ?");
			$stmt->bindParam(1,$hashed,PDO::PARAM_STR);
			$stmt->bindParam(2,$this->user['id'],PDO::PARAM_INT);
			$stmt->execute();
			$connect->commit();
			return true;		
		} catch (Exception $e) {
			throw $e;
		}
	}
}

 ?>