<?php

function selectAllProducts() {

	global $db;

	$sql = "SELECT products.name AS productName,
			region.name AS regionName, format.name AS formatName, brand.name AS brandName,
			products.size AS sizeName, finish.name  AS finishName FROM products
			INNER JOIN region ON products.region_id = region.region_id
			INNER JOIN format ON products.format_id = format.format_id
			INNER JOIN brand ON products.brand_id = brand.brand_id
			INNER JOIN finish ON products.finish_id = finish.finish_id
			WHERE products.is_active = true";
	$result = $db -> query($sql);
	$numrows = $result -> num_rows;


	$output = "<div class='products'><table class='products_table'><tr>";
	$output .= "<th class='data_col'></th>
			<th class='data_col'>REGION</th>
			<th class='data_col'>FORMAT</th>
			<th class='data_col'>BRAND</th>
			<th class='data_col'>SIZE</th>
			<th class='data_col'>FINISH</th>
			<th class=''></th>
			</tr>";
	$output .= "<div class='panel'>";
	while ($row = $result -> fetch_object()) {
		$productName = $row -> productName;
		$regionName = $row -> regionName;
		$formatName = $row -> formatName;
		$brandName = $row -> brandName;
		$sizeName = $row -> sizeName;
		$finishName = $row -> finishName;
		$output .= "<tr class='datarow'>";
		$output .= "<td><img  class='data' src='images-products/lipton-bottle.jpg'></src></td>
		<td class='data' >$regionName</td>
		<td class='data' >$formatName</td>
		<td class='data' >$brandName</td>
		<td class='data' >$sizeName</td>
		<td class='data' >$finishName</td>
		<td class='prod-link'><a href='#' onclick='openNav()';>more</td>
		</tr>";
	}

	$output .= "</table>         </div>";
	return $output;
}

function getSingleProduct($prodId) {

	global $db, $prodId;

	$sql = "SELECT products.prod_id AS productId, 
				products.name AS productName, 
				products.code_name AS codeName,
				products.dimension AS dimension,
				products.material AS material,
				products.weight AS weight,
				products.size AS size,
				products.status AS status,
				products.description AS description,
				products.image_path AS imagePath,
				products.image_name AS imageName,
				region.name AS regionName, 
				format.name AS formatName, 
				brand.name AS brandName,
				finish.name  AS finishName FROM products
			INNER JOIN region ON products.region_id = region.region_id
			INNER JOIN format ON products.format_id = format.format_id
			INNER JOIN brand ON products.brand_id = brand.brand_id
			INNER JOIN finish ON products.finish_id = finish.finish_id
			WHERE products.is_active = true
			AND products.prod_id = " . $prodId;
	$result = $db -> query($sql);
	$numrows = $result -> num_rows;

	$keys = array('image360', 'header');
	$output = array_fill_keys($keys, '');


	while ($row = $result -> fetch_object()) {
		$productId = $row ->productId;
		$productName = $row -> productName;
		$codeName = $row -> codeName;
		$imagePath = $row -> imagePath;
		$imageName = $row -> imageName;
		$regionName = $row -> regionName;
		$formatName = $row -> formatName;
		$brandName = $row -> brandName;
		$size = $row -> size;
		$finishName = $row -> finishName;
		$dimension = $row -> dimension;
		$material = $row -> material;
		$weight = $row -> weight;
		$description = $row -> description;
		$status = $row -> status;

		$output['image360'] .= "<div class='floating-box-vr360'>
		<div id='container' style='height: 450px; width: 300px;'>
		</div>
		<script type='text/javascript'>
		getProductSpinnerConfig( $productId );
		</script>
		</div>";

		$output['header'] .= "
			<div class='label-wrap'>Name: &nbsp </div><div class='info'>$productName</div><br>
			<div class='label-wrap'>Code Name: &nbsp</div><div class='info'>$codeName</div><br>
			<div class='label-wrap'>Region: &nbsp</div><div class='info'>$regionName</div><br>
			<div class='label-wrap'>Format: &nbsp</div><div class='info'>$formatName</div><br>
			<div class='label-wrap'>Brand: &nbsp</div><div class='info'>$brandName</div><br>
			<div class='label-wrap'>Size: &nbsp</div><div class='info'>$size</div><br>
			<div class='label-wrap'>Material: &nbsp</div><div class='info'>$material</div><br>
			<div class='label-wrap'>Weight: &nbsp</div><div class='info'>$weight</div><br>
			<div class='label-wrap'>finish: &nbsp</div><div class='info'>$finishName</div><br>
			<div class='label-wrap'>Dimensions(HxWxD): &nbsp</div><div class='info'>$dimension</div><br>
			<div class='label-wrap'>Status: &nbsp</div><div class='info'>$status</div><br>
			<div class='label-wrap'>ID #: &nbsp</div><div class='info'>" . str_pad($productId, 5, '0', STR_PAD_LEFT) ."</div>";
		}

	return $output;
}

function getProductInfo($prodId) {

	global $db, $prodId;

	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,
			region.name AS regionName, format.name AS formatName, brand.name AS brandName,
			products.size AS sizeName, finish.name  AS finishName FROM products
			INNER JOIN region ON products.region_id = region.region_id
			INNER JOIN format ON products.format_id = format.format_id
			INNER JOIN brand ON products.brand_id = brand.brand_id
			INNER JOIN finish ON products.finish_id = finish.finish_id
			WHERE products.is_active = true
			AND products.prod_id = " . $prodId;
	$result = $db -> query($sql);
	$numrows = $result -> num_rows;

	$output = "";
	while ($row = $result -> fetch_object()) {
		$productId = $row ->productId;
		$productName = $row -> productName;
		$imagePath = $row -> imagePath;
		$imageName = $row -> imageName;
		$regionName = $row -> regionName;
		$formatName = $row -> formatName;
		$brandName = $row -> brandName;
		$sizeName = $row -> sizeName;
		$finishName = $row -> finishName;

		$output .= '<div class="floating-box-sp">';
		$output .= '<div class="floating-box-text">'. $productName . '</div>';
		$output .= '<div class="floating-box-text">'. $regionName . '</div>';
		$output .= '<div class="floating-box-text">'. $formatName . '</div>';
		$output .= '<div class="floating-box-text">'. $brandName . '</div>';
		$output .= '<div class="floating-box-text">'. $sizeName . '</div>';
		$output .= '<div class="floating-box-text">'. $finishName . '</div>';
		$output .= '</div>';
	}

	return $output;
}


function getProductsMatchingCriteria() {
	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;
	$sql = prepareCriteriaSql();
// 	echo 'getProductsMatchingCriteria() = <br>' . $sql;
	$output = "";
	$result = $db -> query($sql);

	$output .= '<thead>
			<tr>
			<th>Image</th>
			<th>Region</th>
			<th>Format</th>
			<th>Brand</th>
			<th>Size</th>
			<th>Finish</th>
			</tr>
			</thead>
			<tbody>';
	$output .= "<div class='panel'>";
	while ($row = $result -> fetch_object()) {
		$productId = $row -> productId;
		$productName = $row -> productName;
		$imagePath = $row -> imagePath;
		$imageName = $row -> imageName;
		$regionName = $row -> regionName;
		$formatName = $row -> formatName;
		$brandName = $row -> brandName;
		$sizeName = $row -> sizeName;
		$finishName = $row -> finishName;

		$output .= "<tr>";
		$output .= "<td><div class='productId-modal'>". $productId . "</div><a href='#' class='gp-modal-product-id'><img  class='data-image' src='" . $imagePath . "/" . $productId . '/' .  $imageName . "'></a></td>
		<td>$regionName</td>
		<td>$formatName</td>
		<td>$brandName</td>
		<td>$sizeName</td>
		<td>$finishName</td>
		</tr>";
	}
	$output .= "</tbody>";
	return $output;
}

function getProductsForGallery() {
	global $db, $page, $region, $format, $brand, $size, $finish, $regionName;
	$output = "";
	$sql = prepareCriteriaSql();
	$result = $db -> query($sql);
	$output = "";

	$output = '';
	while ($row = $result -> fetch_object()) {
		$productId = $row -> productId;
		$productName = $row -> productName;
		$imagePath = $row -> imagePath;
		$imageName = $row -> imageName;
		$regionName = $row -> regionName;
		$formatName = $row -> formatName;
		$brandName = $row -> brandName;
		$sizeName = $row -> sizeName;
		$finishName = $row -> finishName;
		$output .= '<div class="floating-box rounded">';
		$output .= '<div class="floating-box-image"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id"><img src=' . $imagePath . '/' . $productId . '/'. $imageName . '></a></div>';
		$output .= '<div class="floating-box-text"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id">' . $productName . '</a></div>';
		$output .= '</div>';
	}
	return $output;

}

function getProductsMatchingRegion($regionName) {
	global $db, $page, $region, $format, $brand, $size, $finish, $regionName, $searchTerm;
	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,
			region.name AS regionName, format.name AS formatName, brand.name AS brandName,
			products.size AS sizeName, finish.name  AS finishName FROM products
			INNER JOIN region ON products.region_id = region.region_id
			INNER JOIN format ON products.format_id = format.format_id
			INNER JOIN brand ON products.brand_id = brand.brand_id
			INNER JOIN finish ON products.finish_id = finish.finish_id
			WHERE products.is_active = true AND region.name = '" . $regionName . "'";

	if (!functionallyEmpty($format)){
		$sql .= " AND products.format_id IN (" . buildInString($format) . " 0)";
	}
	if (!functionallyEmpty($brand)){
		$sql .= " AND products.brand_id IN (" . buildInString($brand) . " 0)";
	}
	if (!functionallyEmpty($size)){
		$sql .= " AND (" . buildInStringSize($size) . ")";
	}
	if (!functionallyEmpty($finish)){
		$sql .= " AND products.finish_id IN (" . buildInString($finish) . " 0)";
	}
	if (!functionallyEmpty($searchTerm)){
		$sql .= " AND " . buildSearchTermSql($searchTerm);
	} 
// 	echo 'getProductsMatchingRegion() = <br>' . $sql;
	$result = $db -> query($sql);

	$output = '';
	while ($row = $result -> fetch_object()) {
		$productId = $row -> productId;
		$productName = $row -> productName;
		$imagePath = $row -> imagePath;
		$imageName = $row -> imageName;
		$regionName = $row -> regionName;
		$formatName = $row -> formatName;
		$brandName = $row -> brandName;
		$sizeName = $row -> sizeName;
		$finishName = $row -> finishName;
		$output .= '<div class="floating-box rounded">';
		$output .= '<div class="floating-box-image"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id"><img src=' . $imagePath . '/' . $productId . '/' . $imageName . '></a></div>';
		$output .= '<div class="floating-box-text"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id">' . $productName . '</a></div>';
		$output .= '</div>';
	}
	return $output;
}

function getProductCount() {

	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;
	$sql = "SELECT COUNT(*) AS total FROM products
			INNER JOIN region ON products.region_id = region.region_id
			INNER JOIN format ON products.format_id = format.format_id
			INNER JOIN brand ON products.brand_id = brand.brand_id
			INNER JOIN finish ON products.finish_id = finish.finish_id
			WHERE products.is_active = true ";

	$sqlOperator = " AND ";
	if (!functionallyEmpty($region)){
		$sql .= $sqlOperator . "products.region_id IN (" . buildInString($region) . " 0)";
	}

	if (!functionallyEmpty($format)){
		$sql .= $sqlOperator . " products.format_id IN (" . buildInString($format) . " 0)";
	}

	if (!functionallyEmpty($brand)){
		$sql .= $sqlOperator . " products.brand_id IN (" . buildInString($brand) . " 0)";
	}

	if (!functionallyEmpty($size)){
		$sql .= $sqlOperator . buildInStringSize($size);
	}

	if (!functionallyEmpty($finish)){
		$sql .= $sqlOperator . " products.finish_id IN (" . buildInString($finish) . " 0)";
	}
	
	if (!functionallyEmpty($searchTerm)){
		$sql .= $sqlOperator . buildSearchTermSql($searchTerm);
	}
// 	echo $sql;
	$output = "";
	if ($sqlOperator == " WHERE "){
		$output .= "NO CRITERIA SELECTED</div>";
	}else{
		$result = $db -> query($sql);
		$res = mysqli_fetch_assoc($result);//fetch data
		$count = $res['total'];
		$output .= "FOUND " . $count;
		if ($count == 1){
			$output .= " RESULT : ";
		}else{
			$output .= " RESULTS : ";
		}
	}
	return $output;
}


function getProductSearchCriteria() {

	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;
	$output = "";

	if (!functionallyEmpty($searchTerm)){
		$output .= $searchTerm;
	}
	if (!functionallyEmpty($region)){
		$output .= " | ";
		$sql = "SELECT name FROM region WHERE region_id IN (" . buildInString($region) . " 0)";
		$output .= buildCriteria($sql);
	}
	if (!functionallyEmpty($format)){
		$output .= " | ";
		$sql = "SELECT name FROM format WHERE format_id IN (" . buildInString($format) . " 0)";
		$output .= buildCriteria($sql);
	}
	if (!functionallyEmpty($brand)){
		$output .= " | ";
		$sql = "SELECT name FROM brand WHERE  brand_id IN (" . buildInString($brand) . " 0)";
		$output .= buildCriteria($sql);
	}
	if (!functionallyEmpty($size)){
		$output .= " | ";
		$sql = "SELECT name FROM size WHERE size_id IN (" . buildInString($size) . " 0)";
		$output .= buildCriteria($sql);
	}
	if (!functionallyEmpty($finish)){
		$output .= " | ";
		$sql = "SELECT name FROM finish WHERE finish_id IN (" . buildInString($finish) . " 0)";
		$output .= buildCriteria($sql);
	}
	if (" | " == substr($output, 0, 3)){
		$output = substr($output, 2);
	}
	return $output;
}

function buildCriteria($sql) {
	$output = "";
	global $db;
	$result = $db -> query($sql);
	while ($row = $result -> fetch_object()) {
		$name = $row -> name;
		$output .= $name . ", ";
	}
	$output = substr($output, 0, -2);
	return $output;
}

function getRegionCounts() {
	$output = "";
	global $db, $region, $page;

	if (isAllCriteriaEmpty ()) {
		$sql = "SELECT region_id, name FROM region";
		$result = $db->query ( $sql );
		while ( $row = $result->fetch_object () ) {
			$name = $row->name;
			$regionId = $row->region_id;
			$count = getCount ( 'region', $regionId );
			if ($name == "wesa" && $count > 0) {
				$output .= '<div id="region-wesa"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "nab" && $count > 0) {
				$output .= '<div id="region-nab"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "lab" && $count > 0) {
				$output .= '<div id="region-lab"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "apac" && $count > 0) {
				$output .= '<div id="region-apac"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "china" && $count > 0) {
				$output .= '<div id="region-china"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "eer" && $count > 0) {
				$output .= '<div id="region-eer"' . getStylingClasses(). '>' . $count . '</div>';
			}
		}
	} else {
		if ($page == 'map'){
			// 			 	echo "Region set <br>";
			// 			 	echo var_dump($region) . '<br>';
			// 			 	foreach($region as $item) {

			// 			 		echo $item['value']. " <br>";
			// 			 	}
			if (functionallyEmpty($region)){
				$region = array (
		 			array("name"=> "region_array[]", "value"=> "2"),
		 			array("name"=>  "region_array[]", "value"=> "3"),
						array("name"=>  "region_array[]", "value"=> "4"),
		 			array("name"=>  "region_array[]", "value"=> "5"),
		 			array("name"=>  "region_array[]", "value"=> "6"),
		 			array("name"=>  "region_array[]", "value"=> "7")
				);
			}

		}
		foreach ( $region as $item ) {
			$id = $item ['value'];
			$count = getCount ( 'region', $id );
			$sql = "SELECT name FROM region WHERE region_id = " . $id;
			$result = $db->query ( $sql );
			while ( $row = $result->fetch_object () ) {
				$name = $row->name;
			}
			if ($name == "wesa" && $count > 0) {
				$output .= '<div id="region-wesa"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "nab" && $count > 0) {
				$output .= '<div id="region-nab"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "lab" && $count > 0) {
				$output .= '<div id="region-lab"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "apac" && $count > 0) {
				$output .= '<div id="region-apac"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "china" && $count > 0) {
				$output .= '<div id="region-china"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "eer" && $count > 0) {
				$output .= '<div id="region-eer"' . getStylingClasses(). '>' . $count . '</div>';
			}
		}
	}
	return $output;
}

function getStylingClasses(){
	return 'class="box" data-toggle="modal" data-target="region-dialog"';
}

function isAllCriteriaEmpty() {

	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;
	$output = "";
	$empty = true;
	if (!functionallyEmpty($region)){
		$empty = false;
	}
	if (!functionallyEmpty($format)){
		$empty = false;
	}
	if (!functionallyEmpty($brand)){
		$empty = false;
	}
	if (!functionallyEmpty($size)){
		$empty = false;
	}
	if (!functionallyEmpty($finish)){
		$empty = false;
	}
	if (!functionallyEmpty($searchTerm)){
		$empty = false;
	}
	if (" | " == substr($output, 0, 3)){
		$empty = false;
	}
	return $empty;
}

function getRegionCount($id) {

	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;
	$sql = "SELECT COUNT(*)  AS total FROM products
			WHERE products.is_active = true ";

	// 	where `" . $idName . "` in (" . $id . ")";
	$sqlOperator = " AND ";
	$sql .= $sqlOperator . " region_id = " . $id;

	$result = $db -> query($sql);
	$res = mysqli_fetch_assoc($result);//fetch data
	return $res['total'];
}


function prepareCriteriaSql(){
	global $db, $page, $region, $format, $brand, $size, $finish, $regionName, $searchTerm;
	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,
			region.name AS regionName, format.name AS formatName, brand.name AS brandName,
			products.size AS sizeName, finish.name  AS finishName FROM products
			INNER JOIN region ON products.region_id = region.region_id
			INNER JOIN format ON products.format_id = format.format_id
			INNER JOIN brand ON products.brand_id = brand.brand_id
			INNER JOIN finish ON products.finish_id = finish.finish_id
			WHERE products.is_active = true ";

	$sqlOperator = " AND ";
	if (!functionallyEmpty($region)){
		$sql .= $sqlOperator . "products.region_id IN (" . buildInString($region) . " 0)";
	}

	if (!functionallyEmpty($format)){
		$sql .= $sqlOperator . "products.format_id IN (" . buildInString($format) . " 0)";
	}

	if (!functionallyEmpty($brand)){
		$sql .= $sqlOperator . " products.brand_id IN (" . buildInString($brand) . " 0)";
	}

	if (!functionallyEmpty($size)){
		$sql .= $sqlOperator .  buildInStringSize($size);
	}

	if (!functionallyEmpty($finish)){
		$sql .= $sqlOperator . " products.finish_id IN (" . buildInString($finish) . " 0)";
	}

	if (!functionallyEmpty($searchTerm)){
		$sql .= $sqlOperator . buildSearchTermSql($searchTerm);
	}
	$sql .= '  ORDER BY regionName ASC, formatName ASC, brandName ASC, sizeName ASC, finishName ASC';
	// 	echo 'prepareCriteriaSql() = ' . $sql;
	return $sql;
}

?> 
