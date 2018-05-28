<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

$reviewsCount = count(get_all_reviews($collegeId,null,null));
if ($reviewsCount == 0) {
	$awesome = 0;
	$veryGood = 0;
	$average = 0;
	$kindaBad = 0;
	$horrible = 0;
}else{
	$awesome = round((count(get_all_reviews($collegeId,null,1))/$reviewsCount)*100);
	$veryGood = round((count(get_all_reviews($collegeId,null,2))/$reviewsCount)*100);
	$average = round((count(get_all_reviews($collegeId,null,3))/$reviewsCount)*100);
	$kindaBad = round((count(get_all_reviews($collegeId,null,4))/$reviewsCount)*100);
	$horrible = round((count(get_all_reviews($collegeId,null,5))/$reviewsCount)*100);	
}


$pageTitle = $collegeName . 'Reviews';
include('inc/main-header-test.php');

?>
	<div class="main-content">
		<?php include('inc/school-nav.php');?>
			<div class="sub-main-content">
			<?php include('inc/write-review.php');?>
			<?php include('inc/panels.php');?>
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
						<div class="communities-list">
								<section>
									<div class="main-heading-section">
										<div class="home-header-section">
											<?php 
												if($loggedIn){
													if ($userSchool != $collegeName) {
														$onClick = 'onclick = non_school_student_modal() ';
													}else{
														$onClick = 'id="createCommunityBtn"';
													}
													
												}
											?>
											<h3 class="home-header">Reviews</h3>
											<button <?php echo $onClick; ?> > + Write A Review</button>
										</div>	
<!-- 										<div class="search-section">
											<input type="text" name="school-connect-search" class="connect-search-input" placeholder="Search Reviews">
											<button><img class="search-icon" src="img/icons/search_icon2.png"></button>
										</div> -->				
									</div>	
									<div class="bar-chart-ratings">
										<ul>
											<li>
												<?php 
													if ($reviewsCount == 1) {
														echo '<p>' . $reviewsCount . ' Review<span> - Average Stars</span></p>';
													}else{
														echo '<p>' . $reviewsCount . ' Reviews<span> - Average Stars</span></p>';
													}
												?>
												
												<ul class="ratings-box">
													<li class="progress-item">
										                <div class="progress">
										                    <div class="progress-bar" <?php echo 'style="width:' . $awesome . '%"';?>></div>
										                 </div>
										                 <p> Awesome - <?php echo $awesome . '%';  ?> </p>			
													</li>	
													<li class="progress-item">
										                <div class="progress">
										                    <div class="progress-bar" <?php echo 'style="width:' . $veryGood . '%"';?>></div>
										                 </div>
										                 <p> Very Good - <?php echo $veryGood . '%';  ?> </p>					
													</li>	
													<li class="progress-item">
										                <div class="progress">
										                    <div class="progress-bar" <?php echo 'style="width:' . $average . '%"';?>></div>
										                 </div>		
										                 <p> Average - <?php echo $average . '%';  ?> </p>			
													</li>	
													<li class="progress-item">
										                <div class="progress">
										                    <div class="progress-bar" <?php echo 'style="width:' . $kindaBad . '%"';?>></div>
										                 </div>	
										                 <p> Kinda Bad - <?php echo $kindaBad . '%';  ?> </p>				
													</li>	
													<li class="progress-item">
										                <div class="progress">
										                    <div class="progress-bar" <?php echo 'style="width:' . $horrible . '%"';?>></div>
										                 </div>	
										                 <p> Horrible - <?php echo $horrible . '%';  ?> </p>				
													</li>																
												</ul>
												<div class="filter-box" id="reviews-filter">
													<select name = 'category' onchange="showReviews(<?php echo "'" . $urlCollegeName . "'";?>,this.value)">
														<option value="">All Categories</option>
														<option value="1">Overall Experience</option>
														<option value="2">Food Scene</option>
														<option value="3">Party Life</option>
														<option value="4">Workload</option>
														<option value="5">Professors</option>
														<option value="6">Greek Life</option>
														<option value="7">Dorm Life</option>
														<option value="8">City Life</option>
														<option value="9">Admissions</option>
														<option value="10">Social Life</option>
														<option value="11">Diversity</option>
														<option value="12">Financial Aid</option>
														
													</select>
													<select name="rating" onchange="showReviewsRatings(<?php echo "'" . $urlCollegeName . "'";?>,this.value)">
														<option value="">All Ratings</option>
														<option value="1">Awesome</option>
														<option value="2">Very Good</option>
														<option value="3">Average</option>
														<option value="4">Bad</option>
														<option value="5">Terrible</option>
													</select>
												</div>	
											</li>
										</ul>
											<div id="review-item">
												<?php
												$reviews = get_all_reviews($collegeId,null,null);
												
												if (!empty($reviews)) {
													foreach ($reviews as $key) {
														$remove="";
														$isCreator = is_creator('review',$userId,$key['review_id']);
														if ($isCreator) {
															$remove = '<li class="ellipsis-button" onclick="removeItem(\'review\','.$key['review_id'].')">Remove Discussion</li>';
														}
														$postTime = post_time($key['date_created']);
														$content = '<div class="forum-item" >';
														$content .= '<div class="review-header"><p>'. $key['review_category'] . '</p><p>' . $key['rating'] . '</p></div>';
														$content .= '<div class="review-body"><p>' . nl2br($key['review_description']) . '</p></div>';
														$content .= '<ul class="review-footer">';
														$content .= '<li><a href="profile.php?profile_id=' . $key['student_id']. '"' . '>@' .$key['userName'] . '</a><span> ' . $postTime . '</span></li>';
														$content .= '<li class="forum-item-btns"><i class="fa fa-ellipsis-h" id="ellipsis-review-'.$key['review_id'].'" aria-hidden="true" onclick="showEllipsis(this)"></i><div class="ellipsis-menu"><ul><li data-type="review" data-id="'.$key['review_id'].'" class="ellipsis-button report-btn">Report</li>'.$remove.'</ul></div></i></li>';
														$content .= '</ul>';
														$content .= '</div>';
														echo $content;
													}
												}else{
													echo '<h3 style="padding:20px;">Be the first to write a review ' . $collegeAbrev . '</h3>';
												}


												?>												
											</div>
											

											


									</div>								
								</section>
						</div>
					</div>

			</section>
	</div>
       <div id="non-school-student" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0">
                              <?php echo  '<h4>You must be a student '. $collegeAbrev . ' to write a review.</h4>';?> 
						
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
<?php
include('inc/universal-nav.php');
?>