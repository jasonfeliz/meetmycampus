<?php
$pageTitle = "Johnson & Wales University";


?>
       <div id="createCommunityModal" class="modal" <?php if (isset($_SESSION['create_error_message'])) { echo 'style="display:block"'; } ?>>
                <div class="modal-content ">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                        <form method="POST" action="procedures/doCreateReview.php?school_name=<?php echo $urlCollegeName; ?>"> 
                            <div class="modal-header">
                                <h4 class="">Write a Review</h4>
                            </div>
                              <div>
                                <?php if(isset($_SESSION['create_error_message'])){ echo '<p  class="submitError">' . $_SESSION['create_error_message'] . '</p>'; } ?>
                              </div>                      
                            <div class="modal-body">
                                   <div>
                                        <label>Pick a category:</label>
                                      <?php 
                                      $categories = get_review_categories();
                                      $select = '<select name="review-category-id">';
                                        foreach ($categories as $key) {
                                          $select .= '<option value="' . $key['review_category_id'] .'">' . $key['review_category'] . '</option>';
                                        }
                                      $select .= '</select>';
                                      echo $select;
                                      ?>  
                                 
                                    </div> 

                                    <div class="rating-section">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="1" /><label for="star5" title="Awesome!"></label>
                                            <input type="radio" id="star4" name="rating" value="2" /><label for="star4" title="Very Good"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Eh, Average"></label>
                                            <input type="radio" id="star2" name="rating" value="4" /><label for="star2" title="Kinda bad"></label>
                                            <input type="radio" id="star1" name="rating" value="5" /><label for="star1" title="Horrible"></label>
                                        </fieldset>
                                        <h2 id="review-rating"></h2>
                                    </div>     
                                    <div>
                                       <textarea name="review-description" placeholder="Tell us about your experience"></textarea> 
                                    </div>   
                                <div style="display:none">
                                        <label for="address">Address</label></th>
                                        <input type="text" id="address" name="address" />
                                        <p>Please leave this field blank</p></td>
                                </div>                          
                                <div>
                                    <button type="submit" class="signInButton">Submit Review</button>
                                </div>
                                    
                            </div>
                            
                        </form>               
                    </div>
                </div>
        </div>

