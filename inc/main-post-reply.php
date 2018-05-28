       <div id="createCommunityModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    
                    <div class="modal-content-body">
                        <?php if (!$communityConstant && !$storyConstant && !$majorConstant): ?>
                        <form method="POST" action="" id="reply-form" onsubmit="addReply(<?php echo "'".$urlCollegeName . "'" . ', '. $discussionId;?>); return false;">  
                        <?php elseif($communityConstant): ?>
                        <form method="POST" action="" id="reply-form" onsubmit="addReplyCommunity(<?php echo "'".$urlCollegeName . "'" . ', '. $communityId . ', ' . $discussionId;?>); return false;"> 
                        <?php elseif($majorConstant): ?>
                          <form method="POST" action="" id="reply-form" onsubmit="addReplyMajor(<?php echo "'".$urlCollegeName . "'" . ', '. $communityId . ', ' .$discussionId;?>); return false;">
                        <?php endif; ?>
                            <div class="modal-body">
                              <div>
                                <?php if (!$communityConstant && !$storyConstant && !$majorConstant): ?>
                                  <div class="discussion-reply-list-item" style="margin-top: 20px;">
                                    <h4 style="font-weight: bold;">RE: <?php echo ' '.$discussion['discussion_title']?></h4>
                                  </div>
                                <?php elseif ($storyConstant): ?>
                                   <div class="discussion-reply-list-item" style="margin-top: 20px;">
                                    <h4 style="font-weight: bold;">RE: <?php echo ' '.$discussion['c_discussion_title']?></h4>
                                  </div> 
                                 <?php elseif ($majorConstant || $communityConstant): ?>
                                    <div class="modal-header">
                                      <h4>Write a Reply!</h4>
                                    </div>                                                        
                                <?php endif; ?>

                              </div>
                                <div>
                                  <textarea name="discussion-reply" placeholder="Write your reply"></textarea>                               
                                </div>

 
                                <div>
                                  <button type="submit" class="signInButton">Post Reply</button>
                                </div>                            
                              </div>              
                        </form>               
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 