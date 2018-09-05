<?php 
require_once('inc/bootstrap.php');
$pageTitle = "Join Us!";
require_once('inc/mainHeader.php');

if (!isset($_COOKIE['user_id'])) {
    redirect('index.php');
}else{
    $userId = $_COOKIE['user_id'];
    $user_obj = new User($connect,$userId);

    // gets profile_build field_name from users_profile and checks if user has completed profiile. 1=complete, 0 = incomplete
    $profile_status = $user_obj->get_profile_info()['profile_build']; 
    if ($profile_status == 1) {  //if profile has already been completed, send user to home page.
        redirect('home.php');
    }else{
        if (!isset($_SESSION['profile_step'])) {
            $_SESSION['profile_step'] = "short_bio";
        }
        $username = $user_obj->get_username();
        $urlCollegeName = urlencode($user_obj->get_user_school());
        $collegeName = $user_obj->get_user_school();
        $collegeId = $user_obj->get_user_school_id(); 
        setcookie('college_id',$collegeId,time()+860000,'/', 'localhost');      
    }
}




 ?>

             <div class="signInBody">
                        <div>
                            <p class="campusFont">Welcome, <?php echo $username; ?>!</p>
                        </div>          
                    <div style="margin: 15px 0;">
                         We need a little bit of information to get your account set up.
                    </div>

                    <form id="signUpForm" method="POST" action="procedures/doRegister.php"> 
                            <div id="short_bio"
                             <?php 
                                if(isset($_SESSION['profile_step'])) {
                                    if($_SESSION['profile_step'] == "short_bio"){
                                        echo 'class="active_dialogue"';
                                    }
                                }
                                ?> >
                                <div style="margin: 15px 0;color:#DF7367;font-weight: bold;text-transform: uppercase; ">
                                     Step 1 of 3
                                </div>
                            	<label style="margin-bottom: 10px;">Bio</label>
                                <div class="form_error"> </div>
                                <div>
                                    <textarea class="form_input" name="profile_bio" id="profile_bio" placeholder="Write a short bio about yourself"></textarea>
                                </div> 

                                <div id="" class="">
                                    <input  class="form_input" type="text" name="major" id="user-major" placeholder="Type your major">                           
                                </div>
	                            <div style="text-align: left;">
	                                <select class="form_input"  type="number" name="grad_year" id="grad_year" placeholder="Grad Year">    
	                                    <option value="">Select Grad Year</option>
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
                          
                                <button type="button" class="dialogue_btn next_btn" data-id="bio_continue_btn">Next</button>
                                <script>
                                        $(document).ready(function(){



                                                $('#profile_bio').focus();

                                                <?php 
                                                    $bio = (isset($_SESSION['bio'])) ? $_SESSION['bio'] : "";
                                                    $major = (isset($_SESSION['major'])) ? $_SESSION['major'] : "";
                                                    $grad_year = (isset($_SESSION['grad_year'])) ? $_SESSION['grad_year'] : "";
                                                    $location = (isset($_SESSION['location'])) ? $_SESSION['location'] : "";
                                                ?>
                                                $('#profile_bio').val("<?php echo $bio; ?>");
                                                $('#user-major').val("<?php echo $major; ?>");
                                                $('#grad_year').val("<?php echo $grad_year; ?>");
                                                $('#location_search').val("<?php echo $location; ?>");

                                                $('#profile_bio, #user-major, #grad_year, #location_search').blur(function(){
                                                    if ($(this).val() != "") {
                                                        $(this).css('border-color','#dadada');
                                                    }
                                                })

                                                $('button[data-id="bio_continue_btn"]').click(function(){
                                                        var _array = [];
                                                        $('#short_bio').find('.form_input').each(function(){
                                                            
                                                            if ($(this).val() === "") {
                                                                var id = $(this).attr('id');
                                                                _array.push(id)
                                                            }else{
                                                                $(this).css('border-color','#dadada');
                                                            }
                                                        })
                                                        if (!jQuery.isEmptyObject(_array)) {
                                                            $('.form_error').text("Please fill out all fields");
                                                            $.each(_array,function(index, value){
                                                                $('#'+value).css('border-color','red')
                                                            })
                                                            array = [];
                                                        }else{
                                                            $('.form_error').text('');
                                                            var activeId = $('.active_dialogue').attr('id');
                                                            var bio = $('#profile_bio').val();
                                                            var major = $('#user-major').val();
                                                            var grad_year = $('#grad_year').val();
                                                            var location = $('#location_search').val();
                                                            $.ajax({
                                                                type: "POST",
                                                                url: 'procedures/doBuildProfile.php',
                                                                data: {'profile_step': 'profile_interests','bio':bio,'major':major,'grad_year':grad_year,'location':location},
                                                                success: function(result) {
                                                                    window.location.reload() 
                                                                }
                                                            });                                        
                                                        }
                                                })
                                                                                    
                                        })




                                </script>                                                             
                            </div>

                            <div id="profile_interests" 
                             <?php 
                                if(isset($_SESSION['profile_step'])) {
                                    if($_SESSION['profile_step'] == "profile_interests"){
                                        echo 'class="active_dialogue"';
                                    }
                                }
                                ?> 
                                >
                                <div style="margin: 15px 0;color:#DF7367;font-weight: bold;text-transform: uppercase; ">
                                     Step 2 of 3
                                </div>
                                <div style="margin: 15px 0;font-size:13px;font-weight: bold;text-align: left;">
                                    Select at least 6 interests to stay connected with your favorite communities!
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
                                <script>
                                            $(document).ready(function(){

                                                        <?php

                                                        $data_array = array();
                                                            if (isset($_COOKIE['data_array'])) {
                                                                if (!empty($_COOKIE['data_array'])) {
                                                                    $data_array = $_COOKIE['data_array'];
                                                                }else{
                                                                    $data_array  = "";
                                                                }
                                                            }else{
                                                                $data_array  = "";
                                                            }
                                                        ?>


                                                        var array = [<?php echo $data_array ?>];
                                                        if (array != ''){

                                                            $( 'li input[type="checkbox"]').map(function() {
                                                                _val = parseInt($(this).val());
                                                                if($.inArray( _val, array ) != -1 ){
                                                                    $(this).prop('checked',true);
                                                                }
                                                            });                                                       
                                                        }
                                                   //user checks/unchecks an interests
                                                   //get value, then checks if value is in array
                                                   //if not, push value into array. if its already in array(because its been selected), remove value from array using splice function
                                                   $('input[type=checkbox].category-thumbnail-title').click(function(){ 
                                                    
                                                     var value = parseInt($(this).val());
                                                     if (!array.includes(value)) {
                                                        array.push(value);
                                                        document.cookie = "data_array="+ array +"; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/";
                                                     }else{
                                                        for( var i = 0; i <= array.length-1; i++){ 
                                                           if ( array[i] === value) {
                                                             array.splice(i, 1); 
                                                           }
                                                        }
                                                        document.cookie = "data_array="+ array +"; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/";
                                                     }
                                                     console.log(array.length);
                                                     console.log(array);
                                                     //if the length of the array is >= 6 then enable the continue button, else keep it disabled.
                                                     if (array.length >= 6) {
                                                        $('button[data-id="to_communities"]').prop('disabled',false);
                                                        
                                                     }else{
                                                        $('button[data-id="to_communities"]').prop('disabled',true);
                                                     }                                                 
                                                   });

                                                     //if the length of the array is >= 6 then enable the continue button, else keep it disabled.
                                                     if (array.length >= 6) {
                                                        $('button[data-id="to_communities"]').prop('disabled',false);
                                                        
                                                     }else{
                                                        $('button[data-id="to_communities"]').prop('disabled',true);
                                                     }

                                                

                                            })
                                </script>
                                </div>


                                <button type="button" data-id="back_to_bio_btn" class="back_btn dialogue_btn">Back</button> 
                                <button type="button" data-id="to_communities" class="dialogue_btn next_btn" disabled >Next</button> 


                            </div>



                            <div id="suggested_communities"
                              <?php 
                                if(isset($_SESSION['profile_step'])) {
                                    if($_SESSION['profile_step'] == "suggested_communities"){
                                        echo 'class="active_dialogue"';
                                    }
                                }
                                ?> 
                                >
                                <script>
                                    $(document).ready(function(){
                                        if ($('#suggested_communities').hasClass('active_dialogue')) {
                                            $.ajax({
                                                type: "POST",
                                                url: 'procedures/doBuildProfile.php',
                                                data: {'profile_interests': 'true'},
                                                success: function(result) {
                                                    $('#load_suggested_communities').html(result)
                                                     $('input[type="submit"]').prop('disabled',false);
                                                }
                                            });                                           
                                        }

                                    })

                                </script>
                                <div style="margin: 15px 0;color:#DF7367;font-weight: bold;text-transform: uppercase; ">
                                     Step 3 of 3
                                </div>
                                <div style="margin: 15px 0;font-size:13px;font-weight: bold;text-align: left;">
                                    Join some communities <?php echo '@'.$collegeName; ?> and see where you fit in!
                                </div>
                                <div id="load_suggested_communities"></div>
                                <button type="button" data-id="back_to_interest" class="back_btn dialogue_btn">Back</button> 
                                <input type="submit" class="dialogue_btn next_btn" name="setup_account" value="Set up Account" disabled>
                            </div>
                            <div style="display:none">
                                    <label for="address">Address</label></th>
                                    <input type="text" name="address" />
                                    <p>Please leave this field blank</p></td>
                            </div>
                                <script>
                                    $('.dialogue_btn').click(function(){
                                        var _data_id = $(this).data('id');
                                       if (_data_id == "back_to_bio_btn") {
                                            $.ajax({
                                                type: "POST",
                                                url: 'procedures/doBuildProfile.php',
                                                data: {'profile_step': 'short_bio'},
                                                success: function(result) {
                                                    window.location.reload()                                                           
                                                }
                                            }); 
                                       }else if (_data_id == "to_communities"){
                                             $('input[type="submit"]').prop('disabled',false);
                                            $.ajax({
                                                type: "POST",
                                                url: 'procedures/doBuildProfile.php',
                                                data: {'profile_step':'suggested_communities'},
                                                success: function(result) {
                                                    window.location.reload()
                                                }
                                            });
                                       }else if(_data_id == "back_to_interest"){
                                            $('input[type="submit"]').prop('disabled',true);
                                            $.ajax({
                                                type: "POST",
                                                url: 'procedures/doBuildProfile.php',
                                                data: {'profile_step':'back_profile_interests'},
                                                success: function(result) {
                                                    window.location.reload()
                                                }
                                            });
                                       }

                                    })

                                </script>


                    </form>               
            </div>

            <div id="sc_popup">

                <div class="sc_popup_container">
                    <span id="close_popup">X</span>
                     <div id="sc_popup_banner">
                        <div id="sc_name"></div>
                        <div id="sc_message"></div>
                    </div>
                    <div class="sc_popup_info">
                        <h4>About</h4>
                        <div id="sc_description"></div>
                    </div>                   
                </div>

            </div>

<?php require_once('inc/universal-nav.php'); ?>