<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$pageTitle = $collegeName;
$browseFile = '';
$getVar =  $_SERVER["REQUEST_URI"];
if (isset($_GET['b_type'])){
	if ($_GET['b_type'] == "categories"){
		$browseFile = 'inc/categories.php';
	}elseif ($_GET['b_type'] == "communities") {
		$browseFile = 'inc/communities_like.php';
	}else{
		redirect('home.php');
	}
}else{
	redirect('home.php');
}

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
    						<input type="text" name="search_community" placeholder="Search Communities" onkeyup="search_community(this.value,<?php echo $collegeId . ", '". $urlCollegeName . "' "; ?>)">
    						<span class="closeSearch">X</span>
    					</div> 
    					<div  id="search_results_c">

    					</div>   					
    				</div>
						<div class="communities-list">
							<section>
							<?php 
								include($browseFile);
							?>
							</section>

						</div> <!-- end communities-list -->
					</div><!-- end content body -->
			</section>	<!-- end sschool home body -->		
		</div> <!-- end sub content -->
	</div>  <!-- end main content -->
<?php
include('inc/universal-nav.php');
?>