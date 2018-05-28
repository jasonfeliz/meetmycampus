
			<section class="banner-school-home">
				<?php 
				
					if(!$loggedIn){
						echo '<button class="banner-school-button"' . $onClick .'">+ Follow School</button>';
					}elseif($loggedIn){
						if ($userSchool == $collegeName){
							echo '<button class="banner-school-button">My Campus</button>';
						}else{
							$followedSchools = get_followed_schools($userId,$collegeId);
							if ($followedSchools) {
								echo  '<button class="banner-school-button" id="follow-button" onclick="followSchool('. $userId . ', ' .$collegeId .',this)" value="">Unfollow School</button>';
							}else{
								echo  '<button class="banner-school-button" id="follow-button" onclick="followSchool('. $userId . ', ' .$collegeId .',this)" value="">+ Follow School</button>';
							}	

						}
					}
				?>
				
			    <div class="banner-school-content">
			       <!--  <img class="banner-profile-pic" src="img/bg-cta.jpg"> -->
			        <h4 class="banner-school-name"><?php echo $collegeName; ?></h4>
			    </div>
			        <ul class="banner-school-info-list">
			        	<li>
			        		<h5><?php echo $collegeCity.", ".$collegeState; ?></h5>
			        	</li>
			        	<li>
			        		<h5><?php if($studentCount==1){echo $studentCount . ' Student';}else{echo $studentCount. ' Students';}?></h5>
			        	</li>

			        	<li>
			        		<a href="browse.php?b_type=communities&school_name=<?php echo $urlCollegeName ?>">
			        			<h5><?php if($communityCount==1){echo $communityCount . ' Community';}else{echo $communityCount. ' Communities';}?></h5>
			        		</a>
			        	</li>
			        </ul>
			</section>
		<section class="nav-school-home">
			<ul class="nav-school-list">
				<li id="">
			            <div class="nav-school-item">
 			                <a href="home.php?school_name=<?php echo $urlCollegeName ?>">Communities</a>
			             </div>						

				</li>
				<li class=""  id="">
			            <div class="nav-school-item">
 			                <a href="discussion-list.php?school_name=<?php echo $urlCollegeName . '&d_room=community'; ?>">Discussions</a>
			             </div>

				</li>
				<li id="">
			            <div class="nav-school-item">
 			                <a href="events-list.php?school_name=<?php echo $urlCollegeName . '&e_type=communities'; ?>">Meetups</a> 
			             </div>						
				</li>
				<li id="">
			            <div class="nav-school-item">
 			                <a href="reviews.php?school_name=<?php echo $urlCollegeName ?>">Reviews</a>
			             </div>						
				</li>
			</ul>
		</section>