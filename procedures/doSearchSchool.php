<?php 

if (isset($_GET['term'])){
	$term = trim(filter_input(INPUT_GET, 'term' ,FILTER_SANITIZE_STRING));
	$return_arr = array();

	$searchResults = search_schools($term); 
	foreach ($searchResults as $key => $value) {
		 $return_arr[$key] =  $value;
	}

	// Toss back results as json encoded array. 
	echo json_encode($return_arr);
}

 ?>