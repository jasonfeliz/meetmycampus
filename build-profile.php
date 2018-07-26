<?php 
require_once('inc/bootstrap.php');
$pageTitle = "Join Us!";
require_once('inc/mainHeader.php');
// if (!isset($_COOKIE['username'])) {
//     redirect('index.php');
//  }
setcookie('username','arkham',time()+860000,'/', 'localhost');
 ?>

             <div class="signInBody">
                        <div>
                            <p class="campusFont">Welcome, <?php echo $_COOKIE['username']; ?>!</p>
                        </div>          
                    <div style="margin: 15px 0;">
                         We need a little bit of information to get your account set up.
                    </div>

                    <form id="signUpForm" method="POST" action="procedures/doRegister.php"> 
                            <div id="short_bio" class="active_dialogue">
                                <div style="margin: 15px 0;color:#DF7367;font-weight: bold;text-transform: uppercase; ">
                                     Step 1 of 3
                                </div>
                            	<label style="margin-bottom: 10px;">Bio</label>
                                <?php 
                                    if (isset($_SESSION['error_message'])) {
                                         echo "<p class='validateError' style='display:block'>". $_SESSION['error_message'] . "</p>";

                                    }

                                ?>
                                <div class="">
                                    <textarea class="form_input" name="profile_bio" placeholder="Write a short bio about yourself" value="<?php if (isset($_SESSION['error_message'])) { echo $_SESSION['bio'];} ?>"></textarea>
                                </div>
                                <div id="" class="">
                                    <input  class="form_input" type="text" name="major" id="user-major" placeholder="Major">                           
                                </div>
	                            <div style="text-align: left;">
	                                <select class="form_input"  type="number" name="grad_year" placeholder="Grad Year">    
	                                    <option value="0">Select Grad Year</option>
	                                    <option value="2022">2022</option>
	                                    <option value="2021">2021</option>
	                                    <option value="2020">2020</option>
	                                    <option value="2019">2019</option>
	                                    <option value="2018">2018</option>
	                                    <option value="2017">2017</option>
	                                    <option value="2016">2016</option>
	                                    <option value="2015">2015</option>
	                                    <option value="2014">2014</option>
	                                    <option value="2013">2013</option>
	                                    <option value="2012">2012</option>
	                                    <option value="2010">2010</option>
	                                    <option value="2009">2009</option>
	                                    <option value="2008">2008</option>
	                                    <option value="2007">2007</option>
	                                    <option value="2006">2006</option>
	                                    <option value="2005">2005</option>
	                                    <option value="2004">2004</option>
	                                    <option value="2003">2003</option>
	                                    <option value="2002">2002</option>
	                                    <option value="2001">2001</option>
	                                    <option value="2000">2000</option>
	                                </select>                       
	                            </div>
                                <div style="margin-top: 15px;">
                                    <label style="margin-bottom: 10px;">Where are you from?</label>
                                    <input class="form_input"  type="text" name="location" id="location_search" placeholder="City, State">      
                                </div>
                                
                                <button type="button" class="continue_btn dialogue_btn">Next&gt;</button>                                                             
                            </div>

                            <div id="profile_interests" class="">
                                <div style="margin: 15px 0;color:#DF7367;font-weight: bold;text-transform: uppercase; ">
                                     Step 2 of 3
                                </div>
                                <div>
                                    <?php 
                                    $userId = 35;
                                    $urlCollegeName = "Harvard+University";
                                    $collegeId = 227;
                                        $categories = get_all_categories();
                                        if (!empty($categories)) {
                                            foreach ($categories as $key){
                                                    $interestStatus = "Follow";
                                                    $getCatFollowers = get_category_count($key['category_id']);
                                                    $checkInterest = check_interest($key['category_id'],$userId);
                                                    if ($checkInterest) {
                                                        $interestStatus = "Unfollow";
                                                    }
                                                    echo    '<li class="main-thumbnail ' . $key["css_style"] . '">';
                                                    echo    '<div class="overlay"></div>';
                                                    echo    '<a href="category.php?school_name='. $urlCollegeName . '&category_id='. $key['category_id'] . '"' . ' class="category-thumbnail-title" target="_blank">' .  $key['category'] . '</a>';
                                                    echo '<div class="category-subBox"><div><p>'.$getCatFollowers.' Followers </p><button type="button" id="category-'.$key['category_id'].'" onclick="addInterest('.$userId.', '. $key['category_id'] .',this)">'.$interestStatus.'</button></div></div></li>';
                                            }
                                        }
                                     ?>
                                </div>
                                <button type="button" class="back_btn dialogue_btn">&lt;Back</button> 
                                <button type="button" class="continue_btn dialogue_btn">Next&gt;</button> 
                            </div>
                            <div id="suggested_communities">
                                <div style="margin: 15px 0;color:#DF7367;font-weight: bold;text-transform: uppercase; ">
                                     Step 3 of 3
                                </div>
                                <div>
                                    <?php 
                                        // $suggestedCommunities = get_suggested_communities($collegeId);
                                     ?>
                                </div>
                                <button type="button" class="back_btn dialogue_btn">&lt;Back</button> 
                                <input type="submit" class="dialogue_btn" name="setup_account" value="Set up Account">
                            </div>
                            <div style="display:none">
                                    <label for="address">Address</label></th>
                                    <input type="text" name="address" />
                                    <p>Please leave this field blank</p></td>
                            </div>

                    </form>               
            </div>
<?php require_once('inc/universal-nav.php'); ?>