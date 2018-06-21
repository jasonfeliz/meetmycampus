<?php
require_once('inc/bootstrap.php');
$_SESSION['search_status'] = TRUE;
require_once('inc/start.php');

$pageTitle = ' Search ';
include('inc/main-header-test.php');
$searchString = $_SESSION['school_search'];
?>

	<div class="main-content">
		<div class="search-list jumbotron">
			<div class="container">
				<div class="jumbotron-header-bar">
					<div>
						<h2>Search results for <?php echo '"' .  $searchString . '"'; ?></h2>
					</div>				
				</div><!-- end jumbotron header bar -->
						</div><!-- end container -->
			
		</div><!-- end jumbotron -->
	</div>

	<div class="search-list">
		<section class="container" id="fav-list">
				<div>
					<a style="color: #ea7363;font-weight: 600;" href="javascript:history.go(-1);"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Back</a>
				</div>
				<?php
				$content = '<ul class="communities-list-item">';
				$search_schools = search_schools($searchString);
				if (!empty($search_schools)) {
					foreach ($search_schools as $key) {
						$content .= '<li>';
						$content .= '<a href="home.php?school_name=' . urlencode($key['uni_name']) .'" class="schools-group list-thumbnail"><img src="img/old-school.png"></a>';
						$content .= '<a href="home.php?school_name=' . urlencode($key['uni_name']) .'" class="list-thumbnail-title"> ' . $key['uni_name'] . '</a>';
						$content .= '</li>';
					}
				}else{
					$content .= '<h4 style="padding:10px;">Sorry, there were no results for '.$searchString.'</h4>';
				}
				$content .= '</ul>';
				echo $content;
				?>
		</section>
	</div>
<?php
include('inc/universal-nav.php');
?>