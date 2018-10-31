<?php 
class College {

	private $connect;
	private $college;
	
	//constructor
	public function __construct($connect,$collegeId = NULL,$collegeName = NULL){
		$this->connect = $connect;
		global $connect;

		if (!is_null($collegeId)) {
			try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT * FROM colleges WHERE college_id = ?");
				$stmt->bindParam(1,$collegeId,PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$this->college = $stmt->fetch(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}else if(!is_null($collegeName)){
			try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT * FROM colleges WHERE uni_name = ?");
				$stmt->bindParam(1,$collegeName,PDO::PARAM_STR);
				$stmt->execute();
				$connect->commit();
				$this->college = $stmt->fetch(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}

	}

	//methods
	public function get_school_id(){
		return $this->college['college_id'];
	}
	public function get_school_name(){
		return $this->college['uni_name'];
	}
	public function get_school_location(){
		return $this->college['city'] . ', ' . $this->college['state'];
	}
	public function get_school_url(){
		return $this->college['email_url'];
	}
	public function get_school_abbrev(){
		return '@'.$this->college['uni_abrev'];
	}
	public function get_all_communities($categoryId = NULL,$communityId=NULL){
		$connect = $this->connect;
		if (is_null($communityId)) {
			$communityId = 0;
		}
		
		if (is_null($categoryId)) {
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT * FROM communities 
												INNER JOIN categories ON communities.category_id = categories.category_id
												WHERE college_id = ? AND community_category <> 'majors' AND community_id <> ?");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->bindParam(2,$communityId,PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}else{
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT * FROM communities 
												INNER JOIN categories ON communities.category_id =  categories.category_id
												WHERE college_id = ? AND communities.category_id = ?  AND community_category <> 'majors' AND community_id <> ? LIMIT 6");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->bindParam(2,$categoryId,PDO::PARAM_INT);
					$stmt->bindParam(3,$communityId,PDO::PARAM_INT);
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

	public function get_category_communities($categoryId){
		$connect = $this->connect;
		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT * FROM communities 
											INNER JOIN categories ON communities.category_id = categories.category_id
											WHERE communities.category_id = ? AND college_id = ? AND community_category <> 'majors'");
				$stmt->bindParam(1,$categoryId,PDO::PARAM_INT);
				$stmt->bindParam(2,$this->college['college_id'],PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			throw $e;
		}
			
		return $results;

	}

	public function get_students(){
		$connect = $this->connect;
			try{
				$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT id,first_name, last_name, userName, email, uni_name 
															  FROM college_student INNER JOIN colleges ON college_student.college_id = colleges.college_id
															  WHERE colleges.college_id = ?");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			}catch(Exception $e){
				throw $e;
			}

		if (!empty($results)) {
			return $results;
		}else{
			return false;
		}
	}

	public function get_all_majors(){
		$connect = $this->connect;
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT * FROM communities WHERE college_id = ? AND community_category = 'majors'");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		if (!empty($results)) {
			return $results;
		}else{
			return false;
		}
	}

	public function get_all_stories(){
		$connect = $this->connect;

		try{
				$connect->beginTransaction();
				$stmt = $connect->prepare("SELECT * FROM communities 
											INNER JOIN categories ON communities.category_id = categories.category_id
											WHERE college_id = ? AND community_category = 'story'");
				$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
				$stmt->execute();
				$connect->commit();
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			throw $e;
		}
		if (!empty($results)) {
			return $results;
		}else{
			return false;
		}
	}

	public function get_all_discussions($interest_id = NULL){
		$connect = $this->connect;


			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT c_discussion_id,community_name,community_color,community_discussions.community_id,communities.category_id,category, community_discussions.student_id, username, c_discussion_title, c_discussion_post, post_date,community_discussion_photo FROM community_discussions 
												INNER JOIN college_student ON community_discussions.student_id = college_student.id
												INNER JOIN communities JOIN categories ON community_discussions.community_id = communities.community_id AND communities.category_id = categories.category_id
												WHERE communities.college_id = ? AND community_type = 'public' ORDER BY post_date DESC");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}

			if (!empty($results)) {
				return $results;
			}else{
				return false;
			}
	}


	public function get_all_reviews($categoryId=NULL,$ratings=NULL){
		$connect = $this->connect;
		if (!is_null($categoryId)) {
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT review_id, student_id, college_student.userName, review_ratings.rating, reviews_categories.review_category,review_description, date_created FROM reviews
												INNER JOIN college_student ON reviews.student_id = college_student.id
												INNER JOIN review_ratings ON reviews.review_rating_id = review_ratings.rating_id
		                                        INNER JOIN reviews_categories ON reviews.review_category_id =  reviews_categories.review_category_id
												WHERE reviews.college_id = ? AND reviews_categories.review_category_id= ?");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->bindParam(2,$categoryId,PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}elseif(!is_null($ratings)){
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT review_id, student_id, college_student.userName, review_ratings.rating, reviews_categories.review_category,review_description, date_created FROM reviews
												INNER JOIN college_student ON reviews.student_id = college_student.id
												INNER JOIN review_ratings ON reviews.review_rating_id = review_ratings.rating_id
		                                        INNER JOIN reviews_categories ON reviews.review_category_id =  reviews_categories.review_category_id
												WHERE reviews.college_id = ? AND review_ratings.rating_id = ?");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->bindParam(2,$ratings,PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}elseif(!is_null($ratings) && !is_null($categoryId)){
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT review_id, student_id, college_student.userName, review_ratings.rating, reviews_categories.review_category,review_description, date_created FROM reviews
												INNER JOIN college_student ON reviews.student_id = college_student.id
												INNER JOIN review_ratings ON reviews.review_rating_id = review_ratings.rating_id
		                                        INNER JOIN reviews_categories ON reviews.review_category_id =  reviews_categories.review_category_id
												WHERE reviews.college_id = ? AND review_ratings.rating_id = ? AND reviews_categories.review_category_id= ?");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->bindParam(2,$ratings,PDO::PARAM_INT);
					$stmt->bindParam(3,$categoryId,PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);
			}catch(Exception $e){
				throw $e;
			}
		}else{
			try{
					$connect->beginTransaction();
					$stmt = $connect->prepare("SELECT review_id, student_id, college_student.userName, review_ratings.rating, reviews_categories.review_category,review_description, date_created FROM reviews
												INNER JOIN college_student ON reviews.student_id = college_student.id
												INNER JOIN review_ratings ON reviews.review_rating_id = review_ratings.rating_id
		                                        INNER JOIN reviews_categories ON reviews.review_category_id =  reviews_categories.review_category_id
												WHERE reviews.college_id = ?");
					$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
					$stmt->execute();
					$connect->commit();
					$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);
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


	public function showDiscussions($discussionTopicId =NULL){
		global $userId;
		global $loggedIn;
		global $collegeAbrev;
		global $urlCollegeName;
		if(!is_null($discussionTopicId)){
			$discussionsList = $this->get_all_discussions($discussionTopicId);
		}else{
			$discussionsList = $this->get_all_discussions('all');
		}
		if(!$loggedIn){
			$userId = 0;
		}
		$content = "";
		if(!empty($discussionsList)){
				foreach ($discussionsList as $key) {
					$replies = get_all_discussion_replies($key['d_post_id']);
					if(count($replies)==1){
						$replyCount = count($replies)." reply"; 
					}else{
						$replyCount = count($replies)." replies";
					}
					$checkFav = check_favorite($key['d_post_id'], $userId, 'discussion');
					if($checkFav){
						$color = "style='color: #DF7367;'";
					}else{
						$color = "";
					}
					$totalVotes = get_total_votes($key['d_post_id']);
					if (!$totalVotes) {
						$totalVotes = 0;
					}
					$up = $down = '';
					$checkVote = get_vote($key['d_post_id'],$userId);
					if ($checkVote['vote'] == 1) {
						$up = 'active-vote';
					}elseif ($checkVote['vote'] == -1) {
						$down = 'active-vote';
					}
					$postTime = post_time($key['post_date']);
					$remove = "";
					$isCreator = is_creator('discussion',$userId,$key['d_post_id']);
					if ($isCreator) {
						$remove = '<li class="ellipsis-button" onclick="removeItem(\'discussion\','.$key['d_post_id'].')">Remove Discussion</li><li>Edit Discussion</li>';
					}
					$content .= '<li class="forum-item" id="discussion-forum-item-' . $key['d_post_id'] . '">';
					$content .= '<div class="forum-post-vote">';
					$content .= '<i id="upvote-'. $key['d_post_id'] .'" class="fa fa-sort-up fa-2x vote-button '. $up .'" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i>';
					$content .= '<div id="vote-count-' . $key['d_post_id'] . '" class="vote-count">'. $totalVotes .'</div>';
					$content .= '<i id="downvote-'. $key['d_post_id'] .'" class="fa fa-sort-down fa-2x vote-button ' . $down . '" aria-hidden="true" onclick="vote('. $key['d_post_id'] .', ' . $userId .',this)"></i></div>';
					$content .= '<div class="forum-main"><div class="forum-post-body">';
					$content .= '<a href="discussion.php?school_name='. $urlCollegeName . '&discussion_id='. $key['d_post_id'].'"><p class="forum-title">' . $key['discussion_title'] . '</p></a></div>';
					$content .= '<ul  class="forum-item-header"><li><span>Posted by: </span><a href="profile.php?profile_id='.$key['student_id'] . '">@' . $key['userName'] . '</a><span> - '. $postTime .'</span></li>';
					$content .= '<li class="forum-item-btns"><span class="fa">' . $replyCount . '</span><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="discussion-'. $key['d_post_id'] . '" onclick="doFavorites(\'discussion\',' . $key['d_post_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['d_post_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li data-type="post" data-id="'.$key['d_post_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div></li></ul>';
					$content .= '</div></li>';
				}
		}else{
			$content .= '<h3 style="padding:20px;">Be the first to start a discussion ' . $collegeAbrev . '</h3>';
		}

		return $content;
}

	public function get_all_events(){
				$connect = $this->connect;
				try{
						$connect->beginTransaction();
						$stmt = $connect->prepare("SELECT event_id, community_id,event_type, student_id, event_access, event_title, event_description, event_location, event_address, event_date, event_time, event_photo, date_created FROM events
													INNER JOIN college_student ON events.student_id = college_student.id
			                                        INNER JOIN event_type ON events.event_type_id =  event_type.event_type_id 
													WHERE events.college_id = ? ORDER BY date_created DESC");
						$stmt->bindParam(1,$this->college['college_id'],PDO::PARAM_INT);
						$stmt->execute();
						$connect->commit();
						return $stmt->fetchAll(PDO::FETCH_ASSOC);
				}catch(Exception $e){
					throw $e;
				}
	}

	public function showMeetups($interest_id = NULL){
		global $userId;
		global $loggedIn;
		global $collegeId;
		global $loggedIn;
		global $urlCollegeName;
		global $collegeAbrev;
		$eventsList = $this->get_all_events();

		if(!empty($eventsList)){
			$content = '<ul>';
			foreach ($eventsList as $key) {
				$checkFav = check_favorite($key['event_id'], $userId, 'event');
				if($checkFav){
					$color = "style='color: #DF7367;'";
				}else{
					$color = "";
				}
				$content .= '<li class="forum-item">';
				if (!is_null($key['community_id'])) {
					$content .= '<div class="event-details"><a href="event.php?school_name='. $urlCollegeName . '&community_id='. $key['community_id'] . '&event_id='. $key['event_id'].'"><h3>' . $key['event_title'] . '</h3></a><div class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="event-'. $key['event_id'] . '" onclick="doFavorites(\'event\',' . $key['event_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['event_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li data-type="meetup" data-id="'.$key['event_id'].'" class="report-btn">Report</li></ul></div></div></div>';
				}else{
					$content .= '<div class="event-details"><a href="event.php?school_name='. $urlCollegeName . '&event_id='. $key['event_id'].'"><h3>' . $key['event_title'] . '</h3></a><div class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="event-'. $key['event_id'] . '" onclick="doFavorites(\'event\',' . $key['event_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['event_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li data-type="meetup" data-id="'.$key['event_id'].'" class="report-btn">Report</li></ul></div></div></div>';
				}
				$content .= '<div><p>' . $key['event_description'] . '</p></div>';
				$content .= '<ul>';
				$content .= '<li class="event-info"><p>'. $key['event_date'] . '</p><p>' . '@' .$key['event_location'] . '</p></li>';
										
				$content .= '</ul>';

				$content .= '</li>';
			}
		$content .= '</ul>';
		}else{
			$content = '<h3 style="padding:20px;">Be the first to create an event ' . $collegeAbrev . '</h3>';
		}
									
		
		return $content;
}

}


 ?>