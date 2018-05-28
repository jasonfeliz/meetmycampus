<?php

    $host_name  = "";
    $database   = "";
    $user_name  = "";
    $pword   = "";

try {
    $connect = new PDO("mysql:host=$host_name;dbname=$database","$user_name","$pword");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $_SESSION['error_page_message'] = "Due to a disturbance in the force, this page couldn't be found.";
    $_SESSION['system_error_message'] = $e->getMessage();
    header("Location: error_page.php");
    exit();
}



function queryMysql($query)
      {
        global $connect;
        $result = $connect->query($query);
        if (!$result) die($connect->error);
        return $result;
      }





?>
