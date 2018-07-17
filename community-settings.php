<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');
$checkFav = $color = "";
$privateCommunity = FALSE;

if (!empty($_GET['c_id'])) {
	$communityId = intval(trim(filter_input(INPUT_GET, 'c_id' ,FILTER_SANITIZE_STRING)));
	$community = get_community($communityId,$collegeId);	
	$isCreator = is_creator('community',$userId,$communityId);
	if (!$community || !$isCreator) {
    	redirect("home.php");
	}
  try {
    $stmt = $connect->query("SELECT uni_name FROM communities 
                            INNER JOIN colleges ON communities.college_id = colleges.college_id 
                            WHERE  community_id = '$communityId'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $collegeUrl = urlencode($result['uni_name']);
  } catch (Exception $e) {
    throw $e;
  }
  
}else{
	redirect("home.php");
}

$pageTitle = "Community Settings";
include('inc/main-header-test.php');

?>
<div class="main-content" style="background: #fff;">
	<div class="favorites-list jumbotron"  style="background: <?php echo $community['community_color']; ?>;">
		<div class="container">
			<div class="jumbotron-header-bar">
				<div>
					<h2>Community Settings</h2>
				</div>				
			</div><!-- end jumbotron header bar -->
		</div><!-- end container -->
		
	</div><!-- end jumbotron -->

	<div class="community-settings-body">
              <div style="margin: 10px 0">
                <a style="color: #ea7363;font-weight: 600;font-size: 1.15em;" href="community.php?school_name=<?php echo $collegeUrl . '&category_id='.$community['category_id']. '&community_id='.$communityId . '&community_cat=group'?>"><i class="fa fa-angle-left fa-lg" aria-hidden="true" style="font-size: 1.75em;margin-right: 5px;"></i>Community Home</a>
              </div>
							 <?php 
							 if (isset($_SESSION['settings_error'])) {
							 	echo '<div><p class="submitError">'.$_SESSION['settings_error'].'</p></div>';
							 	unset($_SESSION['settings_error']);
							 } elseif(isset($_SESSION['settings_success'])){
							 	echo '<div><p class="submitSuccess">'.$_SESSION['settings_success'].'</p></div>';
							 	unset($_SESSION['settings_success']);
							 }

							 ?>
                    <div class="modal-content-body">
                        <form method="POST" action="procedures/doUpdateCommunity.php">
                            <div class="modal-body">  
                              <div>
                                  <div class="community-color-banner" style="background: <?php echo $community['community_color']; ?>;"></div> 
                                  <label>Change Community Color:</label>
                                  <input type="hidden" id="colorValue" value="<?php echo $community['community_color']; ?>">
                                  <input type="hidden" name="c_id" value="<?php echo $communityId; ?>">
                                  <div class="community-color-selection">
                                        <label style="background-color: #DF7367;display: block;">
                                            <input type="radio" name="community_color" value="#DF7367">
                                        </label>
                                         <label style="background-color: #313133;display: block;">
                                            <input type="radio" name="community_color" value="#313133">
                                        </label>
                                        <label style="background-color: #7baf86;display: block;">
                                            <input type="radio" name="community_color" value="#7baf86">
                                        </label>
                                         <label style="background-color: #477bd2;display: block;">
                                            <input type="radio" name="community_color" value="#477bd2">
                                        </label>
                                         <label style="background-color: #ad91c5;display: block;">
                                            <input type="radio" name="community_color" value="#ad91c5">
                                        </label>
                                         <label style="background-color: #5a626f;display: block;">
                                            <input type="radio" name="community_color" value="#5a626f">
                                        </label>
                                         <label style="background-color: #ffcc2c;display: block;">
                                            <input type="radio" name="community_color" value="#ffcc2c">
                                        </label>
                                         <label style="background-color: #46baac;display: block;">
                                            <input type="radio" name="community_color" value="#46baac">
                                        </label>
                                         <label style="background-color: #ffbdbd;display: block;">
                                            <input type="radio" name="community_color" value="#ffbdbd">
                                        </label>
                                         <label style="background-color: #b0bac3;display: block;">
                                            <input type="radio" name="community_color" value="#b0bac3">
                                        </label>
                                         <label style="background-color: #a1a9c1;display: block;">
                                            <input type="radio" name="community_color" value="#a1a9c1">
                                        </label>
                                         <label style="background-color: #8fc1c1;display: block;">
                                            <input type="radio" name="community_color" value="#8fc1c1">
                                        </label>
                                  </div>                       
                              </div>                  
                              <div>
                                  <label>change category:</label>
                                  <?php 
                                  $categories = get_all_categories();
                                  $select = '<select name="category_id"><option value="'.$community['category_id'].'" selected>'.$community['category'].'</option>';
                                    foreach ($categories as $key) {
                                      $select .= '<option value="'. $key['category_id'] .'">' . $key['category'] . '</option>';
                                    }
                                  $select .= '</select>';
                                  echo $select;
                                  ?>                            
                                </div>

                                <div>
                                  <label>Community Name:</label>
                                  <input type="text" name="community_name" placeholder="e.g., Techies, Students against Trump..." value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['community_name']; }else{ echo $community['community_name'];} ?>">                              
                                </div>

                                <div>
                                  <label>Welcome Message:</label>
                                  <textarea name="community_message" placeholder="Welcome your potential subcribers with a kind-hearted message" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['community_message']; session_unset();session_destroy();} ?>"><?php echo $community['community_message'] ?></textarea>                               
                                </div>
                                <div>
                                  <label>Description:</label>
                                  <textarea name="community_description" placeholder="Write a description of what your community is about" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['community_description']; session_unset();session_destroy();} ?>"><?php echo $community['community_description'] ?></textarea>                               
                                </div>
                                <div>
                                	<?php
                                		$private = $public = "";
                                		if ($community['community_type'] == 'public') {
                                			$public = 'active checked';
                                		}else{
                                			$private =  'active checked';
                                		}

                                	?>
                                  <label>Community Type:</label> 
                                  <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary <?php echo $public; ?>" id="public">
                                      <input type="radio" name="community_type"  autocomplete="off" <?php echo $public; ?> value="public"> Public 
                                    </label>
                                    <label class="btn btn-primary <?php echo $private; ?>" id="private">
                                      <input type="radio" name="community_type"  autocomplete="off" <?php echo $private; ?> value="private"> Private 
                                    </label>
                                  </div>
                                  <p id="public-type" class="form-text text-muted">Public communities allow anyone to join and view community discussions and events.</p>
                                  <p id="private-type" class="form-text text-muted">Only community members are allowed to view community discussions and events. Community administrator must accept all join requests</p>                       
                                </div>  
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>
                                <div>
                                  <button type="submit" class="signInButton">Update Community Settings</button>
                                </div>                            
                              </div>              
                        </form>               
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
</div>
<?php include('inc/universal-nav.php'); ?>