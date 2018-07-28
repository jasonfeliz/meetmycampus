<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$pageTitle = $collegeName;

include('inc/main-header-test.php');



?>
	<div class="main-content">
		<?php include('inc/school-nav.php');?>
		<div class="sub-main-content">
			<?php include('inc/panels.php');?>
			<?php include('inc/create-community.php');?>
			<section class="school-home-body" id="school-home-body">
					<div class="content-body">
    				<div class="search-overlay">
    					<div>
    						<input type="text" name="search_community" placeholder="Search Communities" onkeyup="search_community(this.value,<?php echo $collegeId . ", '". $urlCollegeName . "' "; ?>)">
    						<span class="closeSearch">X</span>
    					</div> 
    					<div  id="search_results_c">

    					</div>   					
    				</div>
						<div class="communities-list">
							<section>
								<div class="main-heading-section">
									<?php 
										if($loggedIn){
											$onClick = 'id="createCommunityBtn"';
										}
									?>
									<div class="home-header-section">
										<h3 class="home-header">Communities</h3>
										<button <?php echo $onClick; ?> > + Create Community</button>
										<div>
											<input type="text" name="community_search" placeholder="Search communities">
										</div>
									</div>		
		
								</div>
								<div class="communities-list-header">
									<h5>Explore by Categories:</h4>
									<a href="browse.php?school_name=<?php echo $urlCollegeName ?>&b_type=categories">Browse All</a>			
								</div>
										
								<ul class="categories-list-item">
									<?php  
									$count=0;

									foreach ($categories as $key){
										if ($count<=11) {
											$interestStatus = "Follow";
											$getCatFollowers = get_category_count($key['category_id']);
											$checkInterest = check_interest($key['category_id'],$userId);
											if ($checkInterest) {
												$interestStatus = "Unfollow";
											}
											echo 	'<li class="main-thumbnail ' . $key["css_style"] . '">';
											echo	'<div class="overlay"></div>';
											echo	'<a href="category.php?school_name='. $urlCollegeName . '&category_id='. $key['category_id'] . '"' . ' class="category-thumbnail-title">' .  $key['category'] . '</a>';
											echo '<div class="category-subBox"><div><p>'.$getCatFollowers.' Followers </p><button id="category-'.$key['category_id'].'" onclick="addInterest('.$userId.', '. $key['category_id'] .',this)">'.$interestStatus.'</button></div></div></li>';
											$count++;											
										}else{
											break;
										}
									}
									?>	
								</ul>
			
							</section>

							<section>
								<div class="communities-list-header">
									<h5>Communities <?php echo $collegeAbrev; ?>:</h4>
									<a href="browse.php?school_name=<?php echo $urlCollegeName ?>&b_type=communities">Browse All</a>			
								</div>
								
									<?php  
									$count=0;
									if(!empty($communities)){
										$content = 	'<ul class="communities-list-item">';
										foreach ($communities as $key){
											
											if ($count<=11) {
												
												$content.=	'<li><a href="community.php?school_name='. $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . '">';
												$content.= '<img src="img/community5.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
												$count++;											
											}else{
												break;
											}
										}
									$content .= '</ul>';
									echo $content;										
									}else{
										echo '<h3 style="padding:20px;">Be the first to create a community ' . $collegeAbrev . '</h3>';
									}

									?>										

											
							</section>
							<section>
								<div class="communities-list-header">
									<h5>Majors <?php echo $collegeAbrev; ?>:</h4>
									<a href="browse.php?school_name=<?php echo $collegeName ?>&b_type=communities&b_filter=majors">Browse All</a>			
								</div>
									<?php  
									$count=0;
									if(!empty($majors)){
										$content = 	'<ul class="communities-list-item">';
										foreach ($majors as $key){
											if ($count<=11) {
												
												$content.=	'<li><a href="community.php?school_name='. $urlCollegeName . '&community_id=' . $key['community_id'] . '&community_cat=' . $key['community_category'] . '" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';" >';
												$content.= '<img src="img/major_icon.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
												$count++;											
											}else{
												break;
											}
										}
									$content .= '</ul>';
									echo $content;																			
									}else{
										echo '<h3 style="padding:20px;">No majors yet ' . $collegeAbrev . '</h3>';
									}

									?>				
							</section>

							<section>
								<div class="communities-list-header">
									<h5>Anonymous Campus Stories <?php echo $collegeAbrev; ?>:</h5>
									<a href="browse.php?school_name=<?php echo $collegeName ?>&b_type=communities&b_filter=stories">Browse All</a>			
								</div>
									<?php  
									$count=0;
									if(!empty($stories)){
										$content = 	'<ul class="communities-list-item">';
										foreach ($stories as $key){
											if ($count<=8) {
												
												$content.=	'<li><a href="community.php?school_name='. $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
												$content.= '<img src="img/community5.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
												$count++;											
											}else{
												break;
											}
										}
									$content .= '</ul>';
									echo $content;																			
									}else{
										echo '<h3 style="padding:20px;">No campus stories yet ' . $collegeAbrev . '</h3>';
									}

									?>	
							</section>
						</div>
					</div>




			</section>
	    </div><!-- <p>end- sub-main-content</p> -->
	</div>  <!-- end main content -->
</div>  <!-- end main body -->
<?php
include('inc/universal-nav.php');
?>