       <div id="messageModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                        <form method="POST" action="procedures/doSendMessage.php">
                          <div class="modal-header">
                            <h4>Send Message</h4>
                          </div> 
                           <div class="form-group">
                              <label for="photo-upload" class="custom-file-upload">
                                <input id="photo-upload" type="file"/><span>+ Add Photo</span>             
                              </label>
                            </div>  
                            <div class="modal-body">
                                <div>
                                    <input type="textarea" name="message-recipient" placeholder="Recipient" value="@<?php echo $profileInfo['userName'] ?>">                              
                                </div>                     

                                <div>
                                  <textarea placeholder="Message"></textarea>                               
                                </div>

 
                                <div>
                                  <button type="submit" class="signInButton">Send Message</button>
                                </div>                            
                              </div>              
                        </form>               
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
