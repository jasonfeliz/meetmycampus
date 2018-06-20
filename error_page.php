<?php
session_start();

define("DEBUG_MODE", TRUE);

function debug_print($message) {
  if (DEBUG_MODE) {
    echo $message;
  }
}


$pageTitle = "Oops! An Error Occurred...";
  require_once('inc/mainHeader.php');

  if (isset($_SESSION['error_page_message'])) {
    $error_message = preg_replace("/\\\\/", '', $_SESSION['error_page_message']);  
  } else{
    $error_message = 'Due to a disturbance in the force, this page couldn\'t be found.'; 
  }

  if (isset($_SESSION['system_error_message'])) {
    $system_error_message = preg_replace("/\\\\/", '', $_SESSION['system_error_message']);  
  } else {
    $system_error_message = "No system-level error message was reported.";
  }
?>


<div class="error-page-body">
      <h2 class="error-page-header">Oops! An error has occured...</h2>
      <div>
        <img src="img/yoda.svg" class="yoda"/>
      </div>
      <div class="error-page-content">
        
        <h5 class="error-message" ><?php echo $error_message; ?></h5>
        <ul style="display: flex;justify-content: space-between;">
          <li style="margin: 10px 5px 10px auto;padding: 10px 20px ;border: solid 1px #c74444;border-radius: 20px;">
            <a style="color: #c74444" href="javascript:history.go(-1);">Go Back</a>
          </li>
          <li style="margin: 10px auto 10px 5px;padding: 10px 20px ;border: solid 1px #c74444;border-radius: 20px;">
            <a style="color: #c74444" href="index.php">Home</a>
          </li>
        </ul> 
        <?php

          debug_print("<hr/>");
          debug_print("<p>The following system-level message was received: <b>{$system_error_message}</b></p>");          
        ?>
      </div>
</div>

</body>
