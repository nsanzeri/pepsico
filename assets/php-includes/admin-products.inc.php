<?php

$dataRow = showTable('products');

echo "\t\t<section class='admin'>\n";
echo "\t\t\t<div class='admin_users'>\n";

// if ($testUsers != "no_data") {
//     echo "\t\t\t\t<h2> $dataRow </h2>\n";
// }
                
//prod_id, name, 				code_name, 		dimension, 												size, 	status, 	description, image_path, 				image_name, region_id, format_id, brand_id, finish_id, is_active, material, weight	
//NULL, 	"Alvalle 250ml", 	"N/A", 			"5.47in x 2.02in x 2.02in<br>5.47mm x 2.02mm x 2.02mm", "250ml", "Active", "Product desc", "assets/images/products", "1.jpg",  	"5", 		"2", 		"4", 	"2", 		1, 			"", 	""
                
echo "\t\t\t\t<table class='admin_table'>\n";
echo "\t\t\t\t\t<tr>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Product Name</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Dimension</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Size</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Status</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Description</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Region</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Format</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Brand</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Finish</th>\n";
echo "\t\t\t\t\t\t<th class='data_col'>Is Active</th>\n";
echo "\t\t\t\t\t\t<th class='admin_col'>Insert/Delete</th>\n";
echo "\t\t\t\t\t</tr>\n";
echo $dataRow;
echo "\t\t\t\t\t<tr class='newdatarow'>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='name' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='lastname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='firstname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='lastname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='firstname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='lastname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='firstname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='lastname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='firstname' value=''></td>\n";
echo "\t\t\t\t\t\t<td><input class='newdata' type='text' name='lastname' value=''></td>\n";


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


echo "\t\t\t\t\t\t<td class='insertcell'><div class='insert hidden'></div></td>\n";
echo "\t\t\t\t\t</tr>\n";
echo "\t\t\t\t</table>\n";
echo "\t\t\t</div>\n";
echo "\t\t</section>\n\n";