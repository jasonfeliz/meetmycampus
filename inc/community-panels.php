        <section class="left-side-panel">
        		<div>
        			<h5 class="side-nav-heading">Related Communities</h5>
		            <ul class="universal-side-nav-list side-nav-recent"> 
                    <?php
                    $relatedCommunities = get_all_communities($collegeId,$community['category_id']);
                    if (!empty($relatedCommunities)) {
                        foreach ($relatedCommunities as $key) {
                            $content = '<li>';
                            $content .= '<a href="community.php?school_name=' . $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id'] . '&community_cat=' . $key['community_category'] .'">' . $key['community_name'] . '</a>';
                            $content .= '</li>';
                            echo $content;
                        }
                    }else{
                        $allCommunities = get_all_communities($collegeId,NULL);
                        if (!empty($allCommunities)) {
                            $count = 0;
                            foreach ($allCommunities as $key) {
                                if ($count <= 5) {
                                    $content = '<li>';
                                    $content .= '<a href="community.php?school_name=' . $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id'] . '&community_cat=' . $key['community_category'] .'">' . $key['community_name'] . '</a>';
                                    $content .= '</li>';
                                    $content .= '</li>';
                                    echo $content;
                                }else{
                                    break;
                                }
                            }
                        }else{
                            echo '<li style="padding:10px;">No related communites</li>';
                        }
                    }


                    ?>                
		            </ul> 
        		</div>
		        <div>
		            <ul class="universal-side-nav-list side-nav-footer">                 
		                <li><a href="#">about</a></li>
		                <li><a href="#">guidelines</a></li>
		                <li><a href="#">contact us</a></li>
		                <li><a href="#">privacy</a></li>
		                <li><a href="#">terms and conditions</a></li>
		                <li><p>&copy; 2017 Meet My Campus LLC. All Rights Reserved.</p></li>
		            </ul>
		        </div>
        </section>
 