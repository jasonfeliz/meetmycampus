

       <div id="createCommunityModal2" class="modal" <?php if (isset($_SESSION['create_error_message'])) { echo 'style="display:block"'; } ?>>
                <div class="modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                        <form method="POST" action="procedures/doCreateEvent.php?school_name=<?php echo $urlCollegeName; ?>">
                            <div class="modal-header">
                                 <h4>Create an Event</h4>
                            </div>  
                            <input type="hidden" name="community-id" value="<?php echo $communityId ?>"> 
                            <div class="modal-body">
                              <div>
                                <?php if(isset($_SESSION['create_error_message'])){ echo '<p  class="submitError">' . $_SESSION['create_error_message'] . '</p>'; } ?>
                              </div> 
                                <div>
                                    <label>Hosted by:</label>
                                    <input type="text" placeholder="Your username" value="<?php echo '@'.$userName; ?>">                           
                                </div>
                                <div>
                                    <label>Event Title:</label>
                                    <textarea name="event-title" placeholder="Poker Night, Hackathon, Birthday Bash, etc..." value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['event-title']; } ?>"></textarea>                            
                                </div>
                                <div>
                                    <label>Description:</label>
                                    <textarea name="event-description" placeholder="What is this event about? Meetup, Party, Study group, etc...?" value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['event-description']; } ?>"></textarea>                            
                                </div>
                                <div>
                                    <div class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-primary active" id="public">
                                        <input type="radio" name="event-type-b" autocomplete="off" checked value="public"> Public Event
                                      </label>
                                      <label class="btn btn-primary" id="private">
                                        <input type="radio" name="event-type-b"  autocomplete="off" value="private"> Private Event
                                      </label>
                                    </div>   
                                    <p id="public-type" class="form-text text-muted">Public events allows anyone at your campus or community to view and/or attend an event.</p>
                                    <p id="private-type" class="form-text text-muted">Private events only allows accepted students to attend an event. Date, time and location will be hidden from public</p>                                      
                                </div>
                                <div>
                                    <label for="event-date">Date:</label>
                                    <input type="date" id="event-date" name="event-date" value="">
                                </div>
                                <div>
                                    <label for="event-time">Time:</label>
                                    <input type="time" id="event-time" name="event-time" value="13:30">
                                </div>

                                <div>
                                    <label>Location Name:</label>
                                    <input type="text" name="event-location" placeholder="I.e Baseball house, The Commons, etc..." value="<?php if (isset($_SESSION['create_error_message'])) { echo $_SESSION['event-location'];session_unset();session_destroy(); } ?>">                           
                                </div>
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>
                                <hr>
                                <button type="submit" class="signInButton">Create Event</button>                               
                            </div>                      
    
                        </form>
                    </div>               
                </div>
            </div>