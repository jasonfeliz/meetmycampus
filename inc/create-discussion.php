       <div id="createCommunityModal" class="modal" <?php if (isset($_SESSION['create_error_message'])) { echo 'style="display:block"'; } ?>>
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         <form method="POST" action="procedures/doCreateDiscussion.php?school_name=<?php echo $urlCollegeName; ?>">
                          <div class="modal-header">
                            <h4>Start A Discussion</h4>
                          </div> 
<!--                           <div id="image-preview">
                            <label for="image-upload" id="image-label">+ Add Photo</label>
                            <input type="file" name="discussion-image" id="image-upload" />
                          </div>  -->
                            <div class="modal-body">
                              <div>
                                <?php if(isset($_SESSION['create_error_message'])){ echo '<p  class="submitError">' . $_SESSION['create_error_message'] . '</p>'; } ?>
                              </div>                     
                              <div>
                                  <label>Select a Topic:</label>
                                  <?php 
                                  $topics = get_discussion_topics();
                                  $select = '<select name="discussion-topic-id"><option value="">Topic</option>';
                                    foreach ($topics as $key) {
                                      $select .= '<option value="'. $key['discussion_topic_id'] . '">' . $key['discussion_topic'] . '</option>';
                                    }
                                  $select .= '</select>';
                                  echo $select;
                                  ?>
                            
                                </div>

                                <div>
                                  <label>Discussion Title:</label>
                                  <input type="text" name="discussion-title" placeholder="What are we talking about today?" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['discussion-title']; } ?>">                              
                                </div>

                                <div>
                                  <textarea name="discussion-post" placeholder="What's on your mind?" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['discussion-post']; session_unset();session_destroy();} ?>"></textarea>                               
                                </div>
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" id="address" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>
 
                                <div>
                                  <button type="submit" class="signInButton">Post Discussion</button>
                                </div>                            
                              </div>              
                        </form>               
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
