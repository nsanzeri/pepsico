<?php

require_once '../php-functions/filter.fn.php';
require_once '../php-functions/product.fn.php';

// Includes
require_once '../php-includes/connect.inc.php';
require_once '../php-includes/get-variables.inc.php';
	
	
$name = $_POST['name'];
$code_name = $_POST['code_name'];
$dimension = $_POST['dimension'];
$size = $_POST['size'];
$status = $_POST['status'];
$description = $_POST['description'];
$region_id = $_POST['region_id'];
$format_id = $_POST['format_id'];
$brand_id = $_POST['brand_id'];
$finish_id = $_POST['finish_id'];
$is_active = $_POST['is_active'];

//prod_id, name, 				code_name, 		dimension, 												size, 	status, 	description, image_path, 				image_name, region_id, format_id, brand_id, finish_id, is_active, material, weight	
//NULL, 	"Alvalle 250ml", 	"N/A", 			"5.47in x 2.02in x 2.02in<br>5.47mm x 2.02mm x 2.02mm", "250ml", "Active", "Product desc", "assets/images/products", "1.jpg",  	"5", 		"2", 		"4", 	"2", 		1, 			"", 	""

$stmt = $db->prepare("INSERT INTO products (name, code_name, dimension,	size, status, description, image_path, image_name, region_id, format_id, brand_id, finish_id, is_active, material, weight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sssssssssssssss', $firstname, $lastname);
$stmt->execute();
$stmt->close();

$maxIdSQL = "SELECT MAX(user_id) AS user_id FROM movie_goers";
$maxIdResult = $db->query($maxIdSQL);
$maxIdNumrows = $maxIdResult->num_rows;

while ($row = $maxIdResult->fetch_object()) {
    $userID = $row->user_id;
    $result = $userID;
}

echo $result;

?>