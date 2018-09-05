<?php 
require_once('../inc/bootstrap.php');

if (isset($_POST['profile_interests'])) {
    if (isset($_COOKIE['data_array'])) {
    	$interestsId = explode(',',$_COOKIE['data_array']);
    	$college_obj = new College($connect,227);
    	$count = 0;
    	
    	$array = array();
        foreach ($interestsId as $key) {
        	$getCommunities = $college_obj->get_category_communities(intval($key));
        	$count += count($getCommunities);
        	if (!empty($getCommunities)) {
	        	foreach ($getCommunities as $key) {
	        		$key['num_members'] = count(get_community_members($key['community_id']));
	        		array_push($array,$key);
					
	        	}
        	}
        	
        }
	    assoc_asort($array,'num_members');
	    
        if ($count < 12) {
        	$getAllCommunities = $college_obj->get_all_communities(NULL,NULL);
        	$count += count($getAllCommunities);
        	if (!empty($getAllCommunities)) {
	        	foreach ($getAllCommunities as $key) {
	        		$key['num_members'] = count(get_community_members($key['community_id']));
	        		array_push($array,$key);
	        	}  		
        	}
        }
        $array = array_unique($array,SORT_REGULAR);
	    $finalCount = count($array);
	    $i = 1;	 
	    $content = '<ul class="sc_list">';
	    $members = "";   
	   	foreach ($array as $key) {
	   		if ($key['num_members'] === 1) {
	   			$members = $key['num_members'] . " member";
	   		}else{
	   			$members = $key['num_members'] . " members";
	   		}
	    	if ($i <=20) {
	    		$content .= '<li class="sc_list_card" style="border-color:'.$key["community_color"].';">
	    						<div>
		    						<a href="javascript:void(0);" onclick="show_popup(\''.htmlspecialchars($key['community_name']).'\',\''.$key['community_color'].'\',\''.htmlspecialchars(rawurlencode($key['community_description'])). '\',\''.htmlspecialchars(rawurlencode($key['community_message'])) . '\')">
			    						<div class="sc_card_banner list-thumbnail" style="background:'.$key["community_color"].';">
			    							<img src="img/community5.png">
			    						</div>
			    					</a>
			    				</div>
		    					<div class="sc_card_info">
		    							<a href="javascript:void(0);" onclick="show_popup(\''.htmlspecialchars($key['community_name']).'\',\''.$key['community_color'].'\',\''.htmlspecialchars(rawurlencode($key['community_description'])). '\',\''.htmlspecialchars(rawurlencode($key['community_message'])) .'\')"><div>'.$key['community_name'].'</div></a>
		    							<div style="font-style:italic;">'. $key['category'] .'</div>
		    							<div>
		    								<div>'. $members. '</div>
		    								<div class="sc_checkbox">
		    									<input type="checkbox" id="input_checkbox_'.$key['community_id'].'" name="sc_list[]" value="'.$key['community_id'].'" data-color="'.$key['community_color'].'" data-id="'.$key['community_id'].'">
		    									<label for="input_checkbox_'.$key['community_id'].'" >Follow</label>
		    								</div>
		    							</div>
		    							
		    					</div>
		    					
	    					</li>';
	    		$i++;
	    	}
	   	}
        $content .=  '</ul>';
        echo $content;
        exit;
    }
}elseif(isset($_POST['profile_step'])) {
	if ($_POST['profile_step'] == 'profile_interests') {
		$_SESSION['profile_step'] = $_POST['profile_step'];
		$_SESSION['bio'] = $_POST['bio'];
		$_SESSION['major'] = $_POST['major'];
		$_SESSION['grad_year'] = $_POST['grad_year'];
		$_SESSION['location'] = $_POST['location'];
	}elseif($_POST['profile_step'] == 'short_bio'){
		$_SESSION['profile_step'] = $_POST['short_bio'];
	}elseif($_POST['profile_step'] == 'suggested_communities'){
		$_SESSION['profile_step'] = $_POST['profile_step'];
	}elseif($_POST['profile_step'] == 'back_profile_interests'){
		$_SESSION['profile_step'] = 'profile_interests';
	}


}

?>
<?php require_once('../inc/universal-nav.php'); ?>