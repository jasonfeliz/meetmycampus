<?php 
$returnArray = [];
if (isset($_POST['data_array'])) {
    $returnArray = trim(filter_input(INPUT_POST,'data_array',FILTER_SANITIZE_STRING));
    $array = explode(",",$returnArray);
   	$content = "<pre>";
    foreach ($array as $key) {
    	$content .= 'key: ' .$key . "<br>";
    }
    $content .= "</pre>";
    echo $content;


}

 ?>