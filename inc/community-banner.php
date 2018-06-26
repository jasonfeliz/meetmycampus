			<section <?php echo 'class="banner-community-home" style="background-color:' .$community['community_color'] . '"'; ?> >
	
			    <div class="banner-school-content">
					<?php
						$remove ="";
						$isCreator = is_creator('community',$userId,$communityId);
                        $checkAdmin = is_admin($userId,$communityId);
						if ($isCreator) {
							$remove = '<li class="ellipsis-button" style="text-transform: capitalize;" onclick="removeItem(\'community\','.$communityId.')">Delete Community</li><li class="ellipsis-button" style="text-transform: capitalize;" ><a href=community-settings.php?c_id='.$communityId .'> Community Settings</a></li>';
						}
                        if ($checkAdmin && $community['community_type'] == "private") {
                            $remove .= '<li class="ellipsis-button" style="text-transform: capitalize;" onclick="openCommunityRequest('.$communityId.')">Join Requests</li>';
                        }
					?>
					<div class="forum-item-btns" style="position: relative;border-bottom: none;margin:auto;width: 50px;">
						<i class="fa fa-ellipsis-h fa-lg" style="color:#fff;margin-bottom: 10px;" id="ellipsis-community-<?php echo $communityId; ?>" aria-hidden="true" onclick="showEllipsis(this)"></i>
						<div class="ellipsis-menu">
							<ul>
								<li data-type="community" data-id="<?php echo $communityId; ?>" class="ellipsis-button report-btn" style="text-transform: capitalize;">Report</li>
								<?php echo $remove; ?>
							</ul>
						</div>			
					</div>
			        <h4 class="banner-school-name"><?php echo $community['community_name'];?></h4>

			        <p class="community-info">
                        <?php 
                            if ($majorConstant) {
                                echo  "Connect and discuss the latest topics and trends with " . $community['community_name'] . " majors ".$collegeAbrev;
                            }else{
                                echo $community['community_message'];
                            }
                        ?>         
                    </p>
				<?php 
					$buttonName = '';
					if (!$loggedIn) {
						$buttonName =  'Join Community';
					}elseif($loggedIn){
						$onClick = ' onclick="joinCommunity('.$communityId .', '. $userId . ', '. "'" . $urlCollegeName . "'".',1)" ';
						$check = is_member($userId,$communityId,'yes');
						$check2 = is_member($userId,$communityId,null);
						if ($check) {
							$buttonName =  'Pending';
						}elseif($check2){
							$buttonName =  'Leave Community';
						}else{
							$buttonName =  'Join Community';
						}					
					}
				?>
				<?php  
					echo '<button id="join-button" ' . $onClick .'> ' . $buttonName . '</button>';
				 ?>

			    </div>
			</section>
            <section class="nav-community-home" style="background-color:<?php echo $community['community_color'];?>">
                <ul class="nav-community-list">
                    <li  id="about-item">
                        <div class="nav-community-item">
                            <a href="#about">About</a>
                        </div>
                    </li> 
                    <li class="nav-selected"  id="discussion-item">
                        <div class="nav-community-item">
                            <a href="#discussions">Discussions</a>
                        </div>
                    </li>
                    <li id="meetup-item">
                        <div class="nav-community-item">
                            <a href="#meetup">Meetups</a> 
                        </div>                     
                    </li>
                </ul>
            </section>

       <div id="non-community-member" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0;">
                              <?php echo  '<h4 style="line-height: 1.3;">You must be a community member of <strong>"'. $community['community_name'] . '"</strong> to write a post or create/join a community event.</h4>';?> 
						
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end -->
                <div id="non-school-student" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0">
                              <?php echo  '<h4 style="line-height: 1.3;">You must be a student '. $collegeAbrev . ' to write an anonymous campus story</h4>';?> 
						
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end -->  
       <div id="confirm-community" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0">
                              <p id="confirm-message"></p> 
							  <div class="modalButtons">
							  	<button id="closeModal">Close</button>
							  	<button id="confirmButton" <?php echo ' onclick="joinCommunity('.$communityId .', '. $userId . ', '. "'" . $urlCollegeName . "'".',2)" '; ?>>Yes</button>
							  </div>
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end -->  
        <div id="community-request" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">Community Requests</div> 
                        
                            <div class="modal-body" style="margin-bottom: 0;padding: 20px 0">
                            		<ul class="c-request-list">
                                    <?php
                                    $getRequest = get_community_request($communityId,NULL);
                                    if ($getRequest) {
                                        $content = "";
                                        foreach ($getRequest as $key) {
                                            $userAbbrev = strtoupper(substr($key['first_name'],0,1). substr($key['last_name'], 0,1));
                                            $content .= '<li id="request-'.$key['student_id'].'">';
                                            $content .= '<div><a href="profile.php?profile_id='.$key['student_id'].'"><h4 class="profile-abbrev" style="margin-right:10px;">'.$userAbbrev.'</h4></a>';
                                            $content .= '<a href="profile.php?profile_id='.$key['student_id'].'" class="connect-list-item-name">@'.$key['userName'].'</a></div>';
                                            $content .= '<div><button onclick="communityRequest(\'accept\','.$key['student_id'].','.$communityId.')">Accept</button>'. '<button  onclick="communityRequest(\'decline\','.$key['student_id'].','.$communityId.')">Decline</button></div>';
                                            $content .= '</li>';
                                        }
                                    }else{
                                        $content = '<li>0 Community Requests</li>';
                                    }
                                    echo $content;
                                    ?>                          			                            			
                            		</ul>
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end -->  