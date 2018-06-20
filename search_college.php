<?php
require_once('inc/bootstrap.php');
require_once('inc/start.php');

$pageTitle = ' Search ';
include('inc/main-header-test.php');
echo $_SESSION['school_search'];
?>

<div class="main-content">
	<div>Search Results</div>
</div>

<?php
include('inc/universal-nav.php');
?>