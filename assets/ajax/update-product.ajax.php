<?php

require_once '../php-functions/filter.fn.php';
require_once '../php-functions/product.fn.php';

// Includes
require_once '../php-includes/connect.inc.php';
require_once '../php-includes/get-variables.inc.php';

$thisField = $_POST['this_field'];
$id = $_POST['id'];
$newVal = $_POST['new_val'];

$stmt = $db->prepare("UPDATE products SET $thisField = ? WHERE prod_id = ?");
$stmt->bind_param('si', $newVal, $id);
$stmt->execute();
$stmt->close();

?>