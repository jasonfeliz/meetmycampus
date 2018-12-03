<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

$discussionTopics = get_discussion_topics();

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
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
    				<div class="search-overlay">
    					<div>
    						<input type="text" name="search_discussion" placeholder="Search Discussions" onkeyup="search_discussion(this.value,<?php echo $collegeId . ", '". $urlCollegeName . "' "; ?>)">
    						<span class="closeSearch">X</span>
    					</div>
    					<div class="" id="search_results_d">
    						<ul class="forum-list" id="search_discussion_list">
    						</ul>
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
											</div>

											<div>
												<input type="text" name="community_search" placeholder="Search discussions">
											</div>
										</div>
									</div>
								</section>
								<section class="filter_sort">

									<div class="">
										<label for="sort-by">Sort By</label>
										<select class="" id="sort-by">
												<option value="popular">Most Popular</option>
												<option value="votes">Most Votes</option>
												<option value="date">Most Recent</option>
										</select>
									</div>

									<div class="">
										<label for="filter-by">Filter</label>
										<select class=""  id="filter-by">
											<option>All Topics</option>
											<?php
												$content = "";
												foreach($discussionTopics as $key){
													$content .= "<option value='{$key['discussion_topic_id']}'>{$key['discussion_topic']}</option>";
												}
												echo $content;
											?>
										</select>
									</div>

								</section>
								<section id="show-room" class="tabs">
									<div id="d_c" class="active">
										<ul class="forum-list" id="discussion-list">
											<?php


													$discussions = $schoolInfo->get_all_discussions();
													echo showDiscussion($discussions,null);


											 ?>
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
