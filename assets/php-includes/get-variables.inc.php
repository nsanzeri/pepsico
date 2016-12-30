<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else if (isset($_POST['page'])) {
	$page = $_POST['page'];
}else {
	$page = 'map';
}

// if (isset($_POST['page'])) {
// 	$page = $_POST['page'];
// } else {
// 	$page = 'map';
// }

if (isset($_POST['regionName'])) {
	$regionName = $_POST['regionName'];
}

if (isset($_GET['metric'])) {
	$showMetric = $_GET['metric'];
} else if (isset($_POST['metric'])) {
	$showMetric = $_POST['metric'];
}

if (isset($_GET['searchTerm'])) {
	$searchTerm = $_GET['searchTerm'];
} else if (isset($_POST['searchTerm'])) {
	$searchTerm = $_POST['searchTerm'];
// 	echo $searchTerm;
}

if (isset($_GET['prodId'])) {
	$prodId = $_GET['prodId'];
}else if (isset($_POST['prodId'])) {
	$prodId = $_POST['prodId'];
}

if (isset($_POST['region'])) {
 	$region = json_decode(stripslashes($_POST['region']), true);
//  	echo "Region set <br>";
//  	echo var_dump($region);
//  	foreach($region as $item) {
//  		echo $item['value']. " ";
//  	}
} else {
// 	echo "REGIOn not set";
	$region = array();
}

if (isset($_POST['format'])) {
	$format = json_decode(stripslashes($_POST['format']), true);
} else {
	$format = array();
}

if (isset($_POST['brand'])) {
	$brand = json_decode(stripslashes($_POST['brand']), true);
} else {
	$brand = array();
}
if (isset($_POST['size'])) {
	$size = json_decode(stripslashes($_POST['size']), true);
} else {
	$size = array();
}
if (isset($_POST['finish'])) {
	$finish = json_decode(stripslashes($_POST['finish']), true);
} else {
	$finish = array();
}

?>