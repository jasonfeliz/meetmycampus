<?php
require_once 'inc/connection.php';
require_once  'inc/functions.php';
// redirect($_SERVER["REQUEST_URI"]);
// $pageTitle = "adsf";
// $loggedIn = '';
// include('inc/main-header-test.php');
// var_dump(is_null($x['community_id']));
// $return_arr = array();
// $x = get_majors_list('finance');
// foreach ($x as $key => $value) {
//     $return_arr[$key] =  $value;
// }
// echo json_encode($return_arr);
// $y = check_major(227,210);
// print_r($y);

// $date1 = '2017-12-06 06:59:40';
// $date2 = time();
// $diff = abs($date2 - strtotime($date1));

// $years = floor($diff / (365*60*60*24));
// $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
// $weeks = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (7*60*60*24));
// $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $weeks*7*60*60*24)/ (60*60*24));
// $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
// $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ (60));


// printf("%d years, %d months, %d weeks, %d days, %d hours, %d minutes\n", $years, $months, $weeks, $days, $hours, $minutes);
// $str = '2018-02-22 10:00:00';
// $phpdate = strtotime( $str );
// $numDays = ceil((time() - $phpdate)/60/60/24);
// $numDays = ($numDays);
// if ($numDays < 0) {
// 	echo abs($numDays) . ' days until your event';
// }elseif($numDays == 0){
// 	echo "today is your event!!!";
// }else{
// 	if ($numDays > 365) {
// 		echo "it's been over 1 year since your event";
// 	}else{
// 		echo "it's been " . $numDays . " days since this event"; 
// 	}
// }

// echo date("F jS \@ h:i A",strtotime($date1));
// function post_time($date1){
//     $date2 = time();
//     $diff = abs($date2 - strtotime($date1));

//     $years = floor($diff / (365*60*60*24));
//     $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
//     $weeks = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (7*60*60*24));
//     $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $weeks*7*60*60*24)/ (60*60*24));
//     $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60));
//     $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ (60));

//     if ($years > 0) {
//         return "Over " . $years . " yrs";
//     }elseif($weeks > 0){
//         return date("M d\, Y \@h:i A",strtotime($date1));
//     }elseif($days > 0){
//         return date("D M d \@h:i A",strtotime($date1));
//     }elseif($hours > 0){
//         return $hours . " hrs ago";
//     }elseif($minutes > 0){
//         return $minutes . "m ago";
//     }
// }

// echo post_time('2017-12-06 06:59:47');
// current directory
// $x = is_admin(39,25);
// if ($x) {
	// join_community(23,35,1)

// 	if ($newRequests > 0) {
// 		echo 'aweosme';
// 	}else{
// 		echo "not-aweosme";
// 	}
// }



//$key should have been previously generated in a cryptographically safe way, like openssl_random_pseudo_bytes
// $plaintext = "message to be encrypted";
// $cipher = "aes-128-gcm";
// if (in_array($cipher, openssl_get_cipher_methods()))
// {
//     $ivlen = openssl_cipher_iv_length($cipher);
//     $iv = openssl_random_pseudo_bytes($ivlen);
//     $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv, $tag);
//     //store $cipher, $iv, and $tag for decryption later
//     $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
//     echo $original_plaintext."\n";
// }


 
 
// function get_liked_community_discussions($userId){
// 	$liked_discussions = get_user_favorites($userId)['c_discussion_id'];
// 	global $connect;
// 	if (!empty(array_filter($liked_discussions))) {
// 		try{
// 			$sqlStr = "SELECT uni_name,community_discussions.community_id,c_discussion_id,colleges.college_id,major_id,c_discussion_title,c_discussion_post,photo,community_discussions.student_id,username,post_date FROM community_discussions 
// 				INNER JOIN college_student ON community_discussions.student_id = college_student.id 
// 				INNER JOIN communities JOIN colleges ON community_discussions.community_id = communities.community_id AND communities.college_id = colleges.college_id WHERE "; 
// 			$sqlStr .= "c_discussion_id IN ('" . implode("', '", array_filter($liked_discussions)) . "')";
// 			$stmt = $connect->query($sqlStr);
// 			return $stmt->fetchAll(PDO::FETCH_ASSOC); 
// 		}catch(Exception $e){
// 			throw $e;
// 		} 
// 	}

// }


// // $x = get_liked_community_discussions(35);
// // print_r($x);
// $liked_discussions = get_user_favorites(35)['c_discussion_id'];
// print_r(implode("', '", array_filter($liked_discussions)));

// printf("uniqid(): %s\r\n", uniqid());

//TODO - MAKE INTO FUNCTION AND ADD IT TO ANY FUNCTION ON FRONT-END THAT PROCESSES SENSITIVE INFO SUCH AS COOKIES, POST/GET, ID'S, ETC....
//     $bytes = openssl_random_pseudo_bytes(10, $cstrong);
//     $bytes2 = openssl_random_pseudo_bytes(10, $cstrong);
//     $salt1 = "71&kj%kjws";
//     $salt2 = "21&!32@sdg";
//     $key   = bin2hex($bytes);
//     $key2 = bin2hex($bytes2);
//     echo $key . "<br>" . $key2.'<br>';

// $plaintext = "community_id";
// $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
// $iv = openssl_random_pseudo_bytes($ivlen);
// $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
// $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
// $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

// echo $ciphertext."<br>";
// //decrypt later....
// $c = base64_decode($ciphertext);
// $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
// $iv = substr($c, 0, $ivlen);
// $hmac = substr($c, $ivlen, $sha2len=32);
// $ciphertext_raw = substr($c, $ivlen+$sha2len);
// $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
// $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);

// if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
// {
//     echo $original_plaintext."<br>";
// }else{
// 	echo "failed, sucker!!!";
// }

// $pizza  = "piecsadase pisdyyyyfdsece piecyyye piece pie pieceffefeffefefee";
// $pieces = explode(" ", $pizza);
// print_r(max($pieces)) . "<br>";
// foreach ($pieces as $key) {
//     echo strlen($key).'<br>';
// }

$array = array('lastname', 'email', 'phone');
$comma_separated = implode(" ", $array);

echo $comma_separated;
?>


<?php include('inc/universal-nav.php'); ?>

