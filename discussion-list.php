<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

$discussionTopicId = NULL;
if (!empty($_GET['discussion_topic_id'])) {
	$discussionTopicId = trim(filter_input(INPUT_GET, 'discussion_topic_id', FILTER_SANITIZE_STRING));
}
$pageTitle = $collegeName . ' Discussions';
include('inc/main-header-test.php');
?>
	<div class="main-content">
	<?php include('inc/school-nav.php');?>
		<div class="sub-main-content">
			<?php include('inc/panels.php');?>
			<?php include('inc/create-discussion.php');?>
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
    				<div class="search-overlay">
    					<div>
    						<input type="text" name="search_discussion" placeholder="Search Discussions" onkeyup="search_discussion(this.value,<?php echo $collegeId . ", '". $urlCollegeName . "' "; ?>)">
    						<span class="closeSearch">X</span>
    					</div> 
    					<div  id="search_results_d">
    					</div>   					
    				</div>
						<div class="communities-list">
								<section>
									<div class="main-heading-section">
										<div class="home-header-section">
											<?php 
												if($loggedIn){
													$onClick = 'id="createCommunityBtn"';
												}
											?>
											<div>
												<h3 class="home-header">Discussions</h3>
												<button <?php echo $onClick; ?> > + Start Discussion</button>												
											</div>

											<div>
												<input type="text" name="community_search" placeholder="Search discussions">
											</div>
										</div>				
									</div>												
								</section>
									
								<section id="show-room" class="tabs">
									<?php 
										$topics = get_discussion_topics();
										echo '<section><div class="filter-box"><select class="double-select-button"><option>Most Recent</option><option>Most Upvotes</option></select>';
										echo '<select class="double-select-button" onchange="browseByTopic(' . "'" . $collegeId . "'"  . ',this.value)">';
										echo '<option value="all">Browse by Topics</option>';
										foreach ($topics as $key) {
											echo '<option value="' . $key['discussion_topic_id'] . '">' . $key['discussion_topic'] . '</option>';
										}

										echo '</select>';	
										echo '</div></section>';								
									?>
									<div id="d_c" class="active">
										<ul class="forum-list" id="discussion-list">
											<?php echo $schoolInfo->showDiscussions($discussionTopicId);?>
										</ul>
									</div>


									<div>

									</div>
								</section>
						</div>
					</div>
			</section>



<?php
include('inc/universal-nav.php');
?>
</div>
