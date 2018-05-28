

       <div id="createCommunityModal" class="modal" <?php if (isset($_SESSION['create_error_message'])) { echo 'style="display:block"'; } ?>>
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                        <form method="POST" action="procedures/doCreateCommunity.php?school_name=<?php echo $urlCollegeName; ?>">
                          <div class="modal-header">
                            <h4>Create A Community</h4>
                          </div> 
                        
                            <div class="modal-body">  
                              <div>
                                  <div class="community-color-banner" style="background: #DF7367;"></div> 
                                  <label>Choose a Community Color:</label>
                                  <div class="community-color-selection">
                                        <label style="background-color: #DF7367;display: block;" class="button-selected">
                                            <input type="radio" name="community_color" checked value="#DF7367">
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
                                <?php if(isset($_SESSION['create_error_message'])){ echo '<p  class="submitError">' . $_SESSION['create_error_message'] . '</p>'; } ?>
                              </div>                   
                              <div>
                                  <label>Select a Category:</label>
                                  <?php 
                                  $categories = get_all_categories();
                                  $select = '<select name="category_id"><option>Category</option>';
                                    foreach ($categories as $key) {
                                      $select .= '<option value="'. $key['category_id'] .'">' . $key['category'] . '</option>';
                                    }
                                  $select .= '</select>';
                                  echo $select;
                                  ?>                            
                                </div>

                                <div>
                                  <label>Community Name:</label>
                                  <input type="text" name="community_name" placeholder="e.g., Techies, Students against Trump..." value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['community_name']; } ?>">                              
                                </div>

                                <div>
                                  <label>Welcome Message:</label>
                                  <textarea name="community_message" placeholder="Welcome your potential subcribers with a kind-hearted message" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['community_message']; session_unset();session_destroy();} ?>"></textarea>                               
                                </div>
                                <div>
                                  <label>Description:</label>
                                  <textarea name="community_description" placeholder="Write a description of what your community is about" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['community_description']; session_unset();session_destroy();} ?>"></textarea>                               
                                </div>

                                <div>
                                  <label>Community Type:</label> 
                                  <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary active" id="public">
                                      <input type="radio" name="community_type"  autocomplete="off" checked value="public"> Public 
                                    </label>
                                    <label class="btn btn-primary" id="private">
                                      <input type="radio" name="community_type"  autocomplete="off" value="private"> Private 
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
                                  <button type="submit" class="signInButton">Create Community</button>
                                </div>                            
                              </div>              
                        </form>               
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
