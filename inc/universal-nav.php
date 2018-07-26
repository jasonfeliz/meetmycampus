       <div id="confirm-modal" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0">
                              <p id="confirm-message2"></p> 
                              <div class="modalButtons">
                                <button id="closeModal2">Close</button>
                                <button id="confirmModalButton">Yes</button>
                              </div>
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
       <div id="redirect-modal" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0">
                              <p id="confirm-message3"></p> 
                              <div class="modalButtons">
                                <button id="closeModal3">Close</button>
                                <form method="post" action="procedures/doUpdateProfile.php" id="form">
                                  <button id="confirmModalButton3">Yes</button>
                                </form>
                                
                              </div>
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
       <div id="report-modal" class="modal">
                <div class="modal-content signIn-modal-content">
                    <span class="close">&times;</span>  

                    <div class="modal-content-body">
                         
                          <div class="modal-header" style="margin-bottom: 0;">
                          </div> 
                        
                            <div class="modal-body modal-header" style="margin-bottom: 0;padding: 20px 0">
                              <p id="report-message">Are you sure you want to report this as inappropriate, offensive, and/or malicious?</p> 
                              <div class="modalButtons">
                                <button id="reportYes" >Yes</button>
                                <button >No</button>
                                
                              </div>
                            </div>              
                                      
                    </div><!-- /modal-content-body end -->
                </div><!-- /modal-content end -->
         </div><!-- /modal end --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="vendor/dropzone.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.js"></script>
    <script type="text/javascript">
        function activatePlacesSearch(){
            var input = document.getElementById('location_search');
            var options = {
                language: 'en-US',
                types: ['(cities)'],
                componentRestrictions: { country: "us" }
            };
            var autocomplete = new google.maps.places.Autocomplete(input,options);
        }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoEpM9sCpbSwwzmVfbe_XMyi-NV3aFM4w&sensor=false&libraries=places&callback=activatePlacesSearch"></script>
    <script src="js/uploadPreview.min.js"></script>
    <script src="js/ajax.js"></script>
    <script type="text/javascript">


    </script>

</body>

</html>