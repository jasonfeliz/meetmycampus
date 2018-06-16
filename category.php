<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$getVar =  $_SERVER["REQUEST_URI"];
if(!empty($_GET['category_id'])){
	$categoryId = trim(filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_STRING));

	$categoryName = get_category($categoryId);
	if (!$categoryName) {
		$_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
   		$_SESSION['system_error_message'] = "could not retrieve category";
    	redirect("error_page.php");
	}
	$categoryCommunities = get_category_communities($categoryId, $collegeId);
	if ($categoryId == '23') {
		$communityCatCount = intval(count($majors));
	}else{
		$communityCatCount = intval(count(get_all_communities($collegeId,$categoryId)));
	}
	
}

$pageTitle = $collegeName . ' - ' . $categoryName;
include('inc/main-header-test.php');

?>
	<div class="main-content">
		<?php include('inc/school-nav.php');?>
		<div class="sub-main-content">
			<?php include('inc/panels.php');?>
			<?php include('inc/create-community.php');?>
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
						<div class="communities-list">
							<section>
								<div class="main-heading-section">
									<?php 
										if($loggedIn){
											$onClick = 'id="createCommunityBtn"';
										}
									?>
									<div class="home-header-section" style="border-bottom: solid 1px rgba(0,0,0,.10);">
										<h3 class="home-header category-header"><?php echo $categoryName ?></h3>
										<button <?php echo $onClick; ?> > + Create A Community</button>
									</div>			
								</div><!-- end main-heading -->
								<div class="category-action-button">
									<h5><?php echo $communityCatCount. " '" . $categoryName ."'" ?> Communities</h5>
									<div class="filter-box" id="reviews-filter">
										<select>
												<option>Newest</option>
												<option>Most Popular</option>
										</select>
									</div>
								</div>
								<ul class="communities-list-item">
								<?php 
									if(!empty($majorConstant)){
										foreach ($majors as $key){
												$content = 	'<li>';
												$content.=	'<a href="community.php?school_name='. $urlCollegeName . '&major_id=' . $key['major_id'] . '" class="majors-group list-thumbnail">';
												$content.= '<img src="img/community5.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
												echo $content;
										}
										exit();
									}
									if(!empty($categoryCommunities)){
										foreach ($categoryCommunities as $key){
												$content = 	'<li>';
												$content.=	'<a href="community.php?school_name='. $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
												$content.= '<img src="img/community5.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
												echo $content;
										}										
									}else{
										echo '<h3 style="padding:20px;">Be the first to create a ' . "'" .$categoryName . "'" .' community ' . $collegeAbrev . '</h3>';
									}
								?>
								</ul>
							</section>
						</div> <!-- end communities-list -->
					</div><!-- end content body -->
			</section>	<!-- end sschool home body -->		
		</div> <!-- end sub content -->
	</div>  <!-- end main content -->
<?php
include('inc/universal-nav.php');
?>

