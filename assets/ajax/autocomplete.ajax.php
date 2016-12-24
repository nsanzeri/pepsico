<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
		&& ($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest')) {

	require_once '../php-functions/filter.fn.php';
	require_once '../php-functions/product.fn.php';

	// Includes
	require_once '../php-includes/connect-local.inc.php';
	require_once '../php-includes/get-variables.inc.php';
	
	$param = $_GET['term'];
	$output = getAutoCompleteData($param);
	echo $output;
}

?>