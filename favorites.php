<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$pageTitle = "Favorites";
include('inc/main-header-test.php');

?>

<div class="main-content">
	<div class="favorites-list jumbotron">
		<div class="container">
			<div class="jumbotron-header-bar">
				<div>
					<h2>My Favorites</h2>
				</div>				
			</div><!-- end jumbotron header bar -->
			<div class="jumbotron-nav-tabs">
				<ul class="nav-tab-list">
					<li class="nav-tab-selected" id="fav-colleges" onclick="showFavoriteType(this)">
						<p>Colleges</p>
					</li>
					<li id="fav-communities" onclick="showFavoriteType(this)">
						<p>Communities</p>
					</li>
					<li id="fav-interest" onclick="showFavoriteType(this)">
						<p>Interests</p>
					</li>
					<li id="fav-discussions" onclick="showFavoriteType(this)">
						<p>Discussions</p>
					</li>
					<li id="fav-events" onclick="showFavoriteType(this)">
						<p>Events</p>
					</li>
				</ul>	
			</div><!-- end jumbotron nav tabs -->
			
		</div><!-- end container -->
		
	</div><!-- end jumbotron -->

	<div class="favorites-list">
		<section class="container" id="fav-list">
				<div>
					<a style="color: #ea7363;font-weight: 600;" href="javascript:history.go(-1);"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Back</a>
				</div>
				<?php
				$content = '<div class="communities-list-header"><h5>Schools I Follow</h5></div><ul class="communities-list-item">';
				$followed_schools = get_followed_schools($userId,NULL);
				if (!empty($followed_schools)) {
					foreach ($followed_schools as $key) {
						$content .= '<li>';
						$content .= '<a href="home.php?school_name=' . urlencode($key['uni_name']) .'" class="schools-group list-thumbnail"><img src="img/old-school.png"></a>';
						$content .= '<a href="home.php?school_name=' . urlencode($key['uni_name']) .'" class="list-thumbnail-title"> ' . $key['uni_name'] . '</a>';
						$content .= '</li>';
					}
				}else{
					$content .= '<h4 style="padding:10px;">You have not followed any schools.</h4>';
				}
				$content .= '</ul>';
				echo $content;
				?>
		</section>
	</div>
</div>

<?php include('inc/universal-nav.php'); ?>