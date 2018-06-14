								<div class="main-heading-section">

									<div class="browse-heading">
									<?php 
										if (isset($_GET['b_filter'])){
											if ($_GET['b_filter'] == 'most_popular'){
												 echo 	"<h4>Most Popular " . $collegeAbrev . "</h4>";
											}elseif ($_GET['b_filter'] == 'majors') {
												echo 	"<h4>Majors " . $collegeAbrev . "</h4>";
											}elseif ($_GET['b_filter'] == 'stories') {
												echo 	"<h4>Campus Stories " . $collegeAbrev . "</h4>";
											}else{
												echo'<script>window.location.href = "home.php?school_name=' . $urlCollegeName . '";</script>';
											}
										}else{
												echo 	"<h4>Communities  " . $collegeAbrev . "</h4>";
											}
									?>
									</div>			
								</div><!-- end main-heading -->
								<ul class="communities-list-item">
									<?php
									if (isset($_GET['b_filter'])){
										if ($_GET['b_filter'] == 'majors') {
											if(!empty($majors)){
												foreach ($majors as $key){
												$content =	'<li><a href="community.php?school_name='. $urlCollegeName . '&community_id=' . $key['community_id'] . '&community_cat=' . $key['community_category'] . '" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';" >';
												$content.= '<img src="img/community5.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
														echo $content;
												}
											exit();
											}else{
												echo '<h3 style="padding:20px;">No majors yet ' . $collegeAbrev . '</h3>';
												exit();
											}												
										}elseif($_GET['b_filter'] == 'stories'){
											if (!empty($stories)) {
												foreach ($stories as $key){
													$content = 	'<li>';
													$content.=	'<a href="community.php?school_name='. $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
													$content.= '<img src="img/community5.png">';
													$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
													echo $content;
												}
											exit();	
											}else{
												echo '<h3 style="padding:20px;">No stories yet ' . $collegeAbrev . '</h3>';
												exit();
											}
										}
									}
									if(!empty($communities)){
										foreach ($communities as $key){
												$content = 	'<li>';
												$content.=	'<a href="community.php?school_name='. $urlCollegeName . '&category_id=' . $key['category_id'] . '&community_id=' . $key['community_id']. '&community_cat=' . $key['community_category'] .'" class="list-thumbnail" style="background-color:' . $key['community_color'] . ';">';
												$content.= '<img src="img/community5.png">';
												$content.= '<h5>'.$key['community_name']. '</h5></a></li>';
												echo $content;
										}										
									}else{
										echo '<h3 style="padding:20px;">Be the first to create a community ' . $collegeAbrev . '</h3>';
									}

									?>	
									</ul>