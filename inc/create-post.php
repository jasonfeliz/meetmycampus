	    <div id="createCommunityModal" class="modal"<?php if (isset($_SESSION['create_error_message2'])) { echo 'style="display:block"'; } ?>>
            <div class="modal-content">
                <span class="close">&times;</span> 
	            <div class="modal-content-body">
	                <form method="POST" action="procedures/doCreateCommunityPost.php?school_name=<?php echo $urlCollegeName; ?>"> 
	                    <div class="modal-body">

		                   <?php if($communityConstant):?>
			                    <div class="modal-header" style="margin-bottom: 30px;">
			                    	<h4 class="">Create A Post</h4>
			                    </div>		                  
<!-- 	                          	<div id="image-preview">
	                            	<label for="image-upload" id="image-label">+ Add Photo</label>
	                            	<input type="file" name="image" id="image-upload" />
	                          	</div> --> 
	                            <div class="modal-body">
	                              <div>
	                                <?php if(isset($_SESSION['create_error_message2'])){ echo '<p  class="submitError">' . $_SESSION['create_error_message2'] . '</p>'; } ?>
	                              </div> 	                            
	                                <div>
	                                  <textarea name="discussion-post" placeholder="What's on your mind?" value="<?php if (isset($_SESSION['create_error_message2'])) { echo $_SESSION['discussion-post']; session_unset();session_destroy(); } ?>"></textarea>                           
	                                </div>
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" id="address" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>	                                
		                            <div>
		                                <button type="submit" class="signInButton">Post Discussion</button>
		                            </div> 
		                        <?php if($communityConstant): ?>
		                            <input type="hidden" name="community-id" value="<?php echo $communityId; ?>">
		                            <input type="hidden" name="category-id" value="<?php echo $categoryId; ?>">
		                        <?php endif; ?>                   		
			                    </div>		      
	                        <?php elseif($storyConstant): ?>
	                            <div class="modal-body">
				                    <div class="modal-header" style="margin-bottom: 30px;">
				                    	<h4 class="">Write an Anonymous Story</h4>
				                    </div>	 
		                              <div>
		                                <?php if(isset($_SESSION['create_error_message'])){ echo '<p  class="submitError">' . $_SESSION['create_error_message2'] . '</p>'; } ?>
		                              </div>                            	
	                                <div>
	                                  <label>Story Title:</label>
	                                  <input type="text" name="discussion-title" placeholder="What is the title of your story?" value="<?php if (isset($_SESSION['create_error_message2'])) { echo $_SESSION['discussion-title']; } ?>">                    
	                                </div>	                        
	                                <div>
	                                  <textarea name="discussion-post" placeholder="Tell us a Campus Story" value="<?php if (isset($_SESSION['create_error_message2'])) { echo $_SESSION['discussion-post']; session_unset();session_destroy(); } ?>" style="height:350px;" ></textarea>                       
	                                </div>
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>	                                
		                            <div>
		                                <button type="submit" class="signInButton">Post Story</button>
		                            </div>     
		                            <input type="hidden" name="story-id" value="<?php echo $communityId; ?>">
		                            <input type="hidden" name="category-id" value="<?php echo $categoryId; ?>">               		
			                    </div>	
	                         <?php endif; ?>       		 
	                    	
	                    </div> 
	                </form>               
	            </div>
            </div><!-- /modal-content end -->
        </div><!-- /modal end -->