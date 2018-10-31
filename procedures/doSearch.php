<?php
require_once('../inc/bootstrap.php');
$term = $collegeId = $x = "";
if (isset($_GET['term'])){
		$term = trim(filter_input(INPUT_GET, 'term' ,FILTER_SANITIZE_STRING));
		$return_arr = array();

			$x = get_majors_list($term);
		    foreach ($x as $key => $value) {
		    	$return_arr[$key] =  $value;
		    }

	     // Toss back results as json encoded array. 
	    echo json_encode($return_arr);
}elseif (isset($_GET['search_community'])) {
	$term = trim(filter_input(INPUT_GET, 'search_community' ,FILTER_SANITIZE_STRING));
	$urlCollegeName = trim(filter_input(INPUT_GET, 'college_name' ,FILTER_SANITIZE_STRING));
	$collegeId = intval(trim(filter_input(INPUT_GET, 'college_id' ,FILTER_SANITIZE_STRING)));

	$x = search_communities($term,$collegeId);
	$content = "";
	$content .= '<h3 class="private-section">Showing ' . count($x) . ' results</h3>';
	$content .= '<ul class="communities-list-item">';
	foreach ($x as $key) {
												$community_obj = new Community($connect,$key['community_id'],NULL);
												$member_count = count($community_obj->get_community_members());
												if ($member_count == 1) {
													$members = $member_count . " member";
												}else{
													$members = $member_count . " members";
												}
												$content.= '<li>';
												$content.=	'<div>
																<a href="community.php?school_name='. $urlCollegeName . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . '">
																		<img src="img/community5.png">
																</a>
															</div>';

												$content.= '<div class="community_info_box">
																<p class="community_info_box_name"><a href="community.php?school_name='. $urlCollegeName . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" style="color:'. $key['community_color'] .'">'.$key['community_name']. '</a></p>
																<div>
																	<p class="community_info_box_cat"><a href="category.php?school_name='. $urlCollegeName .'&category_id='. $key['category_id'] .'">'.$key['category']. '</a></p>
																	<p>'. $members .'</p>
																</div>
															</div>';
												$content.= '</li>';
	}
	$content .= '</ul>';

	echo $content;
}elseif (isset($_GET['search_discussion'])){
	$term = trim(filter_input(INPUT_GET, 'search_discussion' ,FILTER_SANITIZE_STRING));
	$collegeId = intval(trim(filter_input(INPUT_GET, 'college_id' ,FILTER_SANITIZE_STRING)));
	$urlCollegeName = trim(filter_input(INPUT_GET, 'college_name' ,FILTER_SANITIZE_STRING));
	$userId = 0;
	$x = search_discussion($term,$collegeId);
	echo showDiscussion($x,true);
	
	
}

?>