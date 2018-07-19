
<?php
					if($privateCommunity){
						echo "<header class='private-section'>
						 		<h1>Oh Snap!</h1>
						 		<p>This is a private community. Only it's members have access to discussions and meetups. Send a request to join this community by clicking the 'Join Community' button above. </p>
						 		<i class='fa fa-user-secret fa-5x'></i>
						 	</header>";
					}else{
							$onClick2 = ' onclick="not_signed_in_modal()" ';
							if($loggedIn){
								$check = is_member($userId,$communityId,null);
								if (!$check) {
									$onClick = $onClick2 = ' onclick="non_community_member()" ';
									if ($userSchool != $collegeName) {
										$onClick2 = 'onclick = non_school_student_modal() ';
									}else{
										$onClick2 = ' id="createCommunityBtn2" ';
									}
									
								}else{
									$onClick2 =  ' id="createCommunityBtn2" ';									
								}

							}

								echo '<div class="community-action-button"><div><button' . $onClick2 . '> + Create Meetup</button></div></div>';								

									$eventsList = $community_obj->get_community_events();
									if(!empty($eventsList)){
										foreach ($eventsList as $key) {
													$checkFav = check_favorite($key['event_id'], $userId, 'event');
													if($checkFav){
														$color = "style='color: #DF7367;'";
													}else{
														$color = "";
													}
											$content = '<li class="forum-item" style="display:block;">';
											$content .= '<div class="event-details"><a href="event.php?school_name='. $urlCollegeName . '&community_id='. $key['community_id'] . '&event_id='. $key['event_id'].'"><h3>' . $key['event_title'] . '</h3></a><div class="forum-item-btns"><i class="fa fa-heart-o" ' . $color . ' aria-hidden="true" id="event-'. $key['event_id'] . '" onclick="doFavorites(\'event\',' . $key['event_id'] . ', ' .$userId . ', this)"></i><i class="fa fa-ellipsis-h" id="ellipsis-cd-'.$key['event_id'].'"  aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu""><ul><li data-type="meetup" data-id="'.$key['event_id'].'" class="report-btn">Report</li></ul></div></div></div>';
											$content .= '<div><p>' . $key['event_description'] . '</p></div>';
											$content .= '<ul>';
											$content .= '<li class="event-info"><p>'. $key['event_date'] . '</p><p>' . '@' .$key['event_location'] . '</p></li>';
											$content .= '</ul>';
											$content .= '</li>';
										}
									}else{
										$content = '<div class="private-section"><h3 style="padding:20px;">Be the first to create an event ' . $collegeAbrev . '</h3></div>';
									}
									
									$content .= '</ul>';
									echo $content;
						}
?>