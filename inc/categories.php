								<div class="main-heading-section">

									<div class="browse-heading">
										<h4>Browse by categories</h4>
									</div>			
								</div><!-- end main-heading -->
								<ul class="group-list-item">
									<?php  

									foreach ($categories as $key){
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
									}
									?>
								</ul>