<?php
session_start();

setcookie('user_id', '', time()-(365*24*60*60),'/','localhost');

 session_unset();
 session_destroy();
echo'<script>window.location.href = "index.php";</script>';
end();
?>