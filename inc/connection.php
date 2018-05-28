<?php

    $host_name  = "localhost";
    $database   = "meetmycampus";
    $user_name  = "arkham";
    $pword   = "eltorito9";

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

function createTable($name, $query)
	{
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)"."ENGINE=INNODB");
	}



createTable('collegeStudent',
      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       firstName VARCHAR(100),
       lastName VARCHAR(100),
       userName VARCHAR(30),
       email VARCHAR(100),
       token VARCHAR(100),
      verified varchar(255) DEFAULT "no",
      dateSignedUp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      universityID INT UNSIGNED,
      FOREIGN KEY (universityID) REFERENCES university(universityID)');



?>