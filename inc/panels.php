        <section class="left-side-panel">
        		<div>
        		<?php if(isset($_GET['d_room'])): ?>
        			<h5 class="side-nav-heading">Discussion Rooms</h5>
        			<ul class="universal-side-nav-list side-nav-recent">
        				<li>
        					<a href="#d_c"> <?php echo $collegeAbrev; ?> Community <?php echo '<span>' . count(get_all_discussions($collegeId,'community','all')). ' Posts</span>'; ?></a>
        				</li>
        				<li>
        					<a href="#d_f">Freshmen <?php echo '<span>' . count(get_all_discussions($collegeId,'freshmen','all')). ' Posts</span>'; ?></a>
        				</li>
         				<li>
        					<a href="#d_ug">Undergrads <?php echo '<span>' . count(get_all_discussions($collegeId,'undergrads','all')). ' Posts</span>'; ?></a>
        				</li>
        				<li>
        					<a href="#d_gs">Grad Students <?php echo '<span>' . count(get_all_discussions($collegeId,'grad_students','all')). ' Posts</span>'; ?></a>
        				</li>
         				<li>
        					<a href="#d_a">Admissions <?php echo '<span>' . count(get_all_discussions($collegeId,'admissions','all')). ' Posts</span>'; ?></a>
        				</li>
        				<li>
        					<a href="#d_gi">Getting In <?php echo $collegeAbrev .' '. '<span>' . count(get_all_discussions($collegeId,'getting_in','all')). ' Posts</span>'; ?></a>
        				</li>
        			</ul>
        		<?php elseif(isset($_GET['e_type'])):  ?>
        			<h5 class="side-nav-heading">Meetup Rooms</h5>
        			<ul class="universal-side-nav-list side-nav-recent">
        				<li>
        					<a href="#e_c"> <?php echo $collegeAbrev; ?> Community</a>
        				</li>
        				<li>
        					<a href="#e_rc">Recreation + Sports</a>
        				</li>
         				<li>
        					<a href="#e_ac">Academics + Career</a>
        				</li>
        				<li>
        					<a href="#e_sl">Student Life</a>
        				</li>
         				<li>
        					<a href="#e_le">Local Events</a>
        				</li>
        			</ul>
        		<?php endif ?>
        		</div>
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
 