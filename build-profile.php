<?php 
require_once('inc/bootstrap.php');
$pageTitle = "Join Us!";
require_once('inc/mainHeader.php');
// if (!isset($_COOKIE['username'])) {
//     redirect('index.php');
//  }
setcookie('username','arkham',time()+860000,'/', 'localhost');
$userId = 51;
$user_obj = new User($connect,$userId);
$username = $user_obj->get_username();
$userInterests = $user_obj->get_user_interests();
$urlCollegeName = urlencode($user_obj->get_user_school());
$collegeId = 227;

 ?>

             <div class="signInBody">
                        <div>
                            <p class="campusFont">Welcome, <?php echo $username; ?>!</p>
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
                                <div style="margin: 15px 0;font-size:13px;font-weight: bold;text-align: left;">
                                    Please follow at least 6 interests to stay connected with your favorite communities!
                                </div>
                                <div>
                                    <?php 

                                        $categories = get_all_categories();
                                        if (!empty($categories)) {
                                            echo "<ul class='profile_categories_list'>";
                                            foreach ($categories as $key){
                                                    $interestStatus = "Follow";
                                                    $getCatFollowers = get_category_count($key['category_id']);
                                                    $checkInterest = check_interest($key['category_id'],$userId);
                                                    if ($checkInterest) {
                                                        $interestStatus = "Unfollow";
                                                    }
                                                    echo    '<li class="main-thumbnail ' . $key["css_style"] . '">';
                                                    echo    '<div class="overlay"></div>';
                                                    echo    '<input type="checkbox" name="check_list[]" class="category-thumbnail-title" id="checkbox_input_'.$key['category_id'].'" value="'.  $key['category_id'].'">';
                                                    echo    '<label for="checkbox_input_'.$key['category_id'].'">'.$key['category'].'</label>';
                                                    echo '<div class="category-subBox"><div><p>'.$getCatFollowers.' Followers </p></div></div></li>';
                                            }
                                            echo "</ul>";
                                        }
                                     ?>
                                </div>
                                <script>
                                           var array = [];
                                           var count = 0;

                                           $('input[type=checkbox].category-thumbnail-title').click(function(){
                                             var id = $(this).val();
                                             if (!array.includes(id)) {
                                                array.push(id)
                                             }else{
                                                for( var i = 0; i <= array.length-1; i++){ 
                                                   if ( array[i] === id) {
                                                     array.splice(i, 1); 
                                                   }
                                                }
                                             }
                                             console.log(array.length);
                                             if (array.length >= 6) {
                                                $('#continue_btn_enable').prop('disabled',false);
                                             }else{
                                                $('#continue_btn_enable').prop('disabled',true);
                                             }  
                                             $('#continue_btn_enable').click(function(){
                                                var data_str = array.join(",");
                                                console.log(data_str);
                                                $.ajax({
                                                    type:"POST",
                                                    url:"procedures/doBuildProfile.php",
                                                    data: {'data_array': data_str},
                                                    success: function(result){
                                                        document.write(result);
                                                    }
                                                })
                                             }) 
                                           });



                                </script>
                                <button type="button" class="back_btn dialogue_btn">&lt;Back</button> 
                                <button type="button" id="continue_btn_enable" class="continue_btn dialogue_btn" disabled >Next&gt;</button> 
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