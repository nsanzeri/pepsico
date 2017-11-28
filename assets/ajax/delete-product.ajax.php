<?php

require_once '../php-functions/filter.fn.php';
require_once '../php-functions/product.fn.php';

// Includes
require_once '../php-includes/connect.inc.php';
require_once '../php-includes/get-variables.inc.php';

$userID = $_POST['prod_id'];

$stmt = $db->prepare("DELETE FROM products WHERE prod_id = ?");
$stmt->bind_param('i', $prodID);
$stmt->execute();
$stmt->close();

// $stmt = $db->prepare("DELETE FROM favourites WHERE user_id = ?");
// $stmt->bind_param('i', $userID);
// $stmt->execute();
// $stmt->close();


?>