        <section class="left-side-panel">
        		<div>
        			<h5 class="side-nav-heading">Popular Forum Topics</h5>
				<?php
					$popularTopic = get_popular_forum_topic($collegeId);
					$count = 0;
					$content = '<ul class="universal-side-nav-list side-nav-recent"> ';
					foreach ($popularTopic as $key => $value) {
						if ($count <= 5) {
							$topic = get_topic($key);
							$content .= '<li>';
							$content .= '<a href="discussion-list.php?school_name=' . $urlCollegeName . '&d_room=true&discussion_topic_id=' . $topic['discussion_topic_id'] . '">' . $topic['discussion_topic'] . '</a>';
							$content .= '</li>';
							$count ++;
						}else{
							break;
						}

					}
					$content .= '</ul> ';
					echo $content;

				?> 
        		</div>
        		<div>
        			<h5 class="side-nav-heading">Top Communities <?php echo $collegeAbrev; ?></h5>
					<?php
						$topCommunities = get_top_communities($collegeId);
						$count = 0;
						$content = '<ul class="universal-side-nav-list side-nav-recent"> ';
						if(!empty($topCommunities)){
							foreach ($topCommunities as $key => $value) {
								if ($count <= 5) {
									$getCommunity = get_community($key,$collegeId);
									$content .= '<li>';
									$content .= '<a href="community.php?school_name=' . $urlCollegeName . '&category_id=' . $getCommunity['category_id'] . '&community_id=' . $getCommunity['community_id'] . '&community_cat=' . $getCommunity['community_category'] .'">' . $getCommunity['community_name'] . '</a>';
									$content .= '</li>';
									$count ++;
								}else{
									break;
								}

							}
							$content .= '</ul> ';
							echo $content;							
						}else{
							$content .= '<li>No Communities yet '.$collegeAbrev . '</li>';
							$content .= '</ul> ';
							echo $content;
						}


					?> 
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
 