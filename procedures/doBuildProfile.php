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
		    						<a href="" target="_blank">
			    						<div class="sc_card_banner list-thumbnail" style="background:'.$key["community_color"].';">
			    							<img src="img/community5.png">
			    						</div>
			    					</a>
			    				</div>
		    					<div class="sc_card_info">
		    							<a href="" target="_blank"><div>'.$key['community_name'].'</div></a>
		    							<div style="font-style:italic;">'. $key['category'] .'</div>
		    							<div>
		    								<div>'. $members. '</div>
		    								<div>
		    									<input type="checkbox" value="Join">
		    								</div>
		    							</div>
		    							
		    					</div>
		    					
	    					</li>';
	    		$i++;
	    	}
	   	}
        $content .=  '</ul>';
        echo $content;
    }
}

 ?>