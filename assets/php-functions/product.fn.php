<?php
function selectAllProducts() {	global $db;	$sql = "SELECT products.name AS productName,			region.name AS regionName, format.name AS formatName, brand.name AS brandName,			size.name AS sizeName, finish.name  AS finishName FROM products			INNER JOIN region ON products.region_id = region.region_id			INNER JOIN format ON products.format_id = format.format_id			INNER JOIN brand ON products.brand_id = brand.brand_id			INNER JOIN size ON products.size_id = size.size_id			INNER JOIN finish ON products.finish_id = finish.finish_id";	$result = $db -> query($sql);	$numrows = $result -> num_rows;	$output = "<div class='products'><table class='products_table'><tr>";	$output .= "<th class='data_col'></th>			<th class='data_col'>REGION</th>			<th class='data_col'>FORMAT</th>			<th class='data_col'>BRAND</th>			<th class='data_col'>SIZE</th>			<th class='data_col'>FINISH</th>			<th class=''></th>			</tr>";	$output .= "<div class='panel'>";	while ($row = $result -> fetch_object()) {		$productName = $row -> productName;		$regionName = $row -> regionName;		$formatName = $row -> formatName;		$brandName = $row -> brandName;		$sizeName = $row -> sizeName;		$finishName = $row -> finishName;		$output .= "<tr class='datarow'>";		$output .= "<td><img  class='data' src='images-products/lipton-bottle.jpg'></src></td>		<td class='data' >$regionName</td>		<td class='data' >$formatName</td>		<td class='data' >$brandName</td>		<td class='data' >$sizeName</td>		<td class='data' >$finishName</td>		<td class='prod-link'><a href='#' onclick='openNav()';>more</td>		</tr>";	}	$output .= "</table>         </div>";	return $output;}function getSingleProduct($prodId) {	global $db, $prodId;	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,			region.name AS regionName, format.name AS formatName, brand.name AS brandName,			size.name AS sizeName, finish.name  AS finishName FROM products			INNER JOIN region ON products.region_id = region.region_id			INNER JOIN format ON products.format_id = format.format_id			INNER JOIN brand ON products.brand_id = brand.brand_id			INNER JOIN size ON products.size_id = size.size_id			INNER JOIN finish ON products.finish_id = finish.finish_id WHERE products.prod_id = " . $prodId;	$result = $db -> query($sql);	$numrows = $result -> num_rows;	$keys = array('image360', 'header');	$output = array_fill_keys($keys, '');		while ($row = $result -> fetch_object()) {		$productId = $row ->productId;		$productName = $row -> productName;		$imagePath = $row -> imagePath;		$imageName = $row -> imageName;		$regionName = $row -> regionName;		$formatName = $row -> formatName;		$brandName = $row -> brandName;		$sizeName = $row -> sizeName;		$finishName = $row -> finishName;				$output['image360'] .= "<div class='floating-box-vr360'>								<div id='container' style='height: 440px; width: 340px;'>			</div>			<script type='text/javascript'>				getProductSpinnerConfig( $productId );			</script>			</div>";				$output['header'] .= "<div class='floating-box-sp'>		<div class='floating-box-text-sp'> $productName  </div>		<div class='floating-box-text-sp'> $regionName  </div>		<div class='floating-box-text-sp'> $formatName  </div>		<div class='floating-box-text-sp'> $brandName  </div>		<div class='floating-box-text-sp'> $sizeName  </div>		<div class='floating-box-text-sp'> $finishName  </div>		</div>";	}	return $output;}function getProductInfo($prodId) {	global $db, $prodId;	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,			region.name AS regionName, format.name AS formatName, brand.name AS brandName,			size.name AS sizeName, finish.name  AS finishName FROM products			INNER JOIN region ON products.region_id = region.region_id			INNER JOIN format ON products.format_id = format.format_id			INNER JOIN brand ON products.brand_id = brand.brand_id			INNER JOIN size ON products.size_id = size.size_id			INNER JOIN finish ON products.finish_id = finish.finish_id WHERE products.prod_id = " . $prodId;	$result = $db -> query($sql);	$numrows = $result -> num_rows;	$output = "";	while ($row = $result -> fetch_object()) {		$productId = $row ->productId;		$productName = $row -> productName;		$imagePath = $row -> imagePath;		$imageName = $row -> imageName;		$regionName = $row -> regionName;		$formatName = $row -> formatName;		$brandName = $row -> brandName;		$sizeName = $row -> sizeName;		$finishName = $row -> finishName;		$output .= '<div class="floating-box-sp">';		$output .= '<div class="floating-box-text">'. $productName . '</div>';		$output .= '<div class="floating-box-text">'. $regionName . '</div>';		$output .= '<div class="floating-box-text">'. $formatName . '</div>';		$output .= '<div class="floating-box-text">'. $brandName . '</div>';		$output .= '<div class="floating-box-text">'. $sizeName . '</div>';		$output .= '<div class="floating-box-text">'. $finishName . '</div>';		$output .= '</div>';	}	return $output;}function getProductsMatchingCriteria() {	global $db, $page, $region, $format, $brand, $size, $finish;	$sql = prepareCriteriaSql();	$output = "";// 	if(($x_pos = strpos($sql, ' WHERE ')) == FALSE ){// 		$output .= "NO CRITERIA SELECTED</div>";// 	}else{		$result = $db -> query($sql);				$output .= '<thead>			<tr>				<th>Image</th>				<th>Region</th>				<th>Format</th>				<th>Brand</th>				<th>Size</th>				<th>Finish</th>			</tr>		</thead> 		<tbody>';								$output .= "<div class='panel'>";		while ($row = $result -> fetch_object()) {			$productId = $row -> productId;			$productName = $row -> productName;			$imagePath = $row -> imagePath;			$imageName = $row -> imageName;			$regionName = $row -> regionName;			$formatName = $row -> formatName;			$brandName = $row -> brandName;			$sizeName = $row -> sizeName;			$finishName = $row -> finishName;							$output .= "<tr>";			$output .= "<td><div class='productId-modal'>". $productId . "</div><a href='#' class='gp-modal-product-id'><img  class='data-image' src='" . $imagePath . "/" . $imageName . "'></a></td>			<td>$regionName</td>			<td>$formatName</td>			<td>$brandName</td>			<td>$sizeName</td>			<td>$finishName</td>			</tr>";		}		$output .= "</tbody>";// 	}	return $output;}function getProductsForGallery() {	global $db, $page, $region, $format, $brand, $size, $finish, $regionName;	$output = "";	$sql = prepareCriteriaSql();// 	if(($x_pos = strpos($sql, ' WHERE ')) == FALSE ){// 		$output .= "NO CRITERIA SELECTED</div>";// 	}else{		$result = $db -> query($sql);		$output = "";				$output = '';		while ($row = $result -> fetch_object()) {			$productId = $row -> productId;			$productName = $row -> productName;			$imagePath = $row -> imagePath;			$imageName = $row -> imageName;			$regionName = $row -> regionName;			$formatName = $row -> formatName;			$brandName = $row -> brandName;			$sizeName = $row -> sizeName;			$finishName = $row -> finishName;			$output .= '<div class="floating-box rounded">';			$output .= '<div class="floating-box-image"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id"><img src=' . $imagePath . '/' . $imageName . '></a></div>';			$output .= '<div class="floating-box-text"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id">' . $productName . '</a></div>';			$output .= '</div>';// 		}	}	return $output;}function getProductsMatchingRegion($regionName) {	global $db, $page, $region, $format, $brand, $size, $finish, $regionName;	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,			region.name AS regionName, format.name AS formatName, brand.name AS brandName,			size.name AS sizeName, finish.name  AS finishName FROM products			INNER JOIN region ON products.region_id = region.region_id			INNER JOIN format ON products.format_id = format.format_id			INNER JOIN brand ON products.brand_id = brand.brand_id			INNER JOIN size ON products.size_id = size.size_id			INNER JOIN finish ON products.finish_id = finish.finish_id";	// 	where `" . $idName . "` in (" . $id . ")";	$sql .= " WHERE region.name = '" . $regionName . "'";	if (!functionallyEmpty($format)){		$sql .= " AND products.format_id IN (" . buildInString($format) . " 0)";	}	if (!functionallyEmpty($brand)){		$sql .= " AND products.brand_id IN (" . buildInString($brand) . " 0)";	}	if (!functionallyEmpty($size)){		$sql .= " AND products.size_id IN (" . buildInString($size) . " 0)";	}	if (!functionallyEmpty($finish)){		$sql .= " AND products.finish_id IN (" . buildInString($finish) . " 0)";	}	$result = $db -> query($sql);// 	$numrows = $result -> num_rows;// 	echo $sql;	$output = '';	while ($row = $result -> fetch_object()) {		$productId = $row -> productId;		$productName = $row -> productName;		$imagePath = $row -> imagePath;		$imageName = $row -> imageName;		$regionName = $row -> regionName;		$formatName = $row -> formatName;		$brandName = $row -> brandName;		$sizeName = $row -> sizeName;		$finishName = $row -> finishName;		$output .= '<div class="floating-box rounded">';		$output .= '<div class="floating-box-image"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id"><img src=' . $imagePath . '/' . $imageName . '></a></div>';		$output .= '<div class="floating-box-text"><div class="productId-modal">'. $productId . '</div><a href="#" class="gp-modal-product-id">' . $productName . '</a></div>';		$output .= '</div>';	}	return $output;	}function getProductCount() {	global $db, $page, $region, $format, $brand, $size, $finish;	$sql = "SELECT COUNT(*) AS total FROM `products`";	$sqlOperator = " WHERE ";	if (!functionallyEmpty($region)){		$sql .= $sqlOperator . "region_id IN (" . buildInString($region) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($format)){		$sql .= $sqlOperator . " format_id IN (" . buildInString($format) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($brand)){		$sql .= $sqlOperator . " brand_id IN (" . buildInString($brand) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($size)){		$sql .= $sqlOperator . " size_id IN (" . buildInString($size) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($finish)){		$sql .= $sqlOperator . " finish_id IN (" . buildInString($finish) . " 0)";		$sqlOperator = " AND ";	}	$output = "";	if ($sqlOperator == " WHERE "){		$output .= "NO CRITERIA SELECTED</div>";	}else{		$result = $db -> query($sql);		$res = mysqli_fetch_assoc($result);//fetch data		$count = $res['total'];		$output .= "FOUND " . $count;		if ($count == 1){			$output .= " RESULT : ";		}else{			$output .= " RESULTS : ";		}// 		$output .= "</div><br>	<div id='stats-current-search-label'>CURRENT SEARCH:</div>";	}	return $output;}function getProductSearchCriteria() {	global $db, $page, $region, $format, $brand, $size, $finish;	$output = "";	if (!functionallyEmpty($region)){		$sql = "SELECT name FROM region WHERE region_id IN (" . buildInString($region) . " 0)";		$output .= buildCriteria($sql);	}	if (!functionallyEmpty($format)){		$output .= " | ";		$sql = "SELECT name FROM format WHERE format_id IN (" . buildInString($format) . " 0)";		$output .= buildCriteria($sql);	}	if (!functionallyEmpty($brand)){		$output .= " | ";		$sql = "SELECT name FROM brand WHERE  brand_id IN (" . buildInString($brand) . " 0)";		$output .= buildCriteria($sql);	}	if (!functionallyEmpty($size)){		$output .= " | ";		$sql = "SELECT name FROM size WHERE size_id IN (" . buildInString($size) . " 0)";		$output .= buildCriteria($sql);	}	if (!functionallyEmpty($finish)){		$output .= " | ";		$sql = "SELECT name FROM finish WHERE finish_id IN (" . buildInString($finish) . " 0)";		$output .= buildCriteria($sql);	} 	if (" | " == substr($output, 0, 3)){		$output = substr($output, 2); 	}	return $output;}function buildCriteria($sql) {	$output = "";	global $db;	$result = $db -> query($sql);	while ($row = $result -> fetch_object()) {		$name = $row -> name;		$output .= $name . ", ";	}	$output = substr($output, 0, -2);	return $output;}function getRegionCounts() {
	$output = "";
	global $db, $region;
	
	if (isAllCriteriaEmpty ()) {
		$sql = "SELECT region_id, name FROM region";
		$result = $db->query ( $sql );
		while ( $row = $result->fetch_object () ) {
			$name = $row->name;
			$regionId = $row->region_id;
			if ($name == "Africa") {
				$output .= '<div id="region-africa" ' . getStylingClasses(). '>' . getRegionCount ( $regionId ) . '</div>';
			}
			if ($name == "North America") {
				$output .= '<div id="region-north-america" ' . getStylingClasses(). '>' . getRegionCount ( $regionId ) . '</div>';
			}
			if ($name == "South America") {
				$output .= '<div id="region-south-america" ' . getStylingClasses(). '>' . getRegionCount ( $regionId ) . '</div>';
			}
			if ($name == "Australia") {
				$output .= '<div id="region-australia" ' . getStylingClasses(). '>' . getRegionCount ( $regionId ) . '</div>';
			}
			if ($name == "Asia") {
				$output .= '<div id="region-asia" ' . getStylingClasses(). '>' . getRegionCount ( $regionId ) . '</div>';
			}
			if ($name == "Europe") {
				$output .= '<div id="region-europe" ' . getStylingClasses(). '>' . getRegionCount ( $regionId ) . '</div>';
			}
		}
	} else {
		foreach ( $region as $item ) {
			$id = $item ['value'];
			$count = getCount ( 'region', $id );
			$sql = "SELECT name FROM region WHERE region_id = " . $id;
			$result = $db->query ( $sql );
			while ( $row = $result->fetch_object () ) {
				$name = $row->name;
			}
			if ($name == "Africa" && $count > 0) {
				$output .= '<div id="region-africa"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "North America" && $count > 0) {
				$output .= '<div id="region-north-america"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "South America" && $count > 0) {
				$output .= '<div id="region-south-america"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "Australia" && $count > 0) {
				$output .= '<div id="region-australia"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "Asia" && $count > 0) {
				$output .= '<div id="region-asia"' . getStylingClasses(). '>' . $count . '</div>';
			}
			if ($name == "Europe" && $count > 0) {
				$output .= '<div id="region-europe"' . getStylingClasses(). '>' . $count . '</div>';
			}
		}
	}
	return $output;
}function getStylingClasses(){	return 'class="box waves-effect waves-light" data-toggle="modal" data-target="region-dialog"';}function isAllCriteriaEmpty() {	global $db, $page, $region, $format, $brand, $size, $finish;	$output = "";	$empty = true;	if (!functionallyEmpty($region)){$empty = false;}	if (!functionallyEmpty($format)){$empty = false;}	if (!functionallyEmpty($brand)){$empty = false;}	if (!functionallyEmpty($size)){$empty = false;}	if (!functionallyEmpty($finish)){$empty = false;}	if (" | " == substr($output, 0, 3)){$empty = false;}	return $empty;}function getRegionCount($id) {	global $db, $page, $region, $format, $brand, $size, $finish;	$sql = "SELECT COUNT(*)  AS total FROM `products`";	// 	where `" . $idName . "` in (" . $id . ")";	$sqlOperator = " WHERE ";	$sql .= $sqlOperator . " region_id = " . $id;	$result = $db -> query($sql);	$res = mysqli_fetch_assoc($result);//fetch data	return $res['total'];}function prepareCriteriaSql(){	global $db, $page, $region, $format, $brand, $size, $finish, $regionName;	$sql = "SELECT products.prod_id AS productId, products.name AS productName, products.image_path AS imagePath,products.image_name AS imageName,			region.name AS regionName, format.name AS formatName, brand.name AS brandName,			size.name AS sizeName, finish.name  AS finishName FROM products			INNER JOIN region ON products.region_id = region.region_id			INNER JOIN format ON products.format_id = format.format_id			INNER JOIN brand ON products.brand_id = brand.brand_id			INNER JOIN size ON products.size_id = size.size_id			INNER JOIN finish ON products.finish_id = finish.finish_id ";	$sqlOperator = " WHERE ";	if (!functionallyEmpty($region)){		$sql .= $sqlOperator . "products.region_id IN (" . buildInString($region) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($format)){		$sql .= $sqlOperator . "products.format_id IN (" . buildInString($format) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($brand)){		$sql .= $sqlOperator . " products.brand_id IN (" . buildInString($brand) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($size)){		$sql .= $sqlOperator . " products.size_id IN (" . buildInString($size) . " 0)";		$sqlOperator = " AND ";	}	if (!functionallyEmpty($finish)){		$sql .= $sqlOperator . " products.finish_id IN (" . buildInString($finish) . " 0)";		$sqlOperator = " AND ";	}	$sql .= '  ORDER BY regionName ASC, formatName ASC, brandName ASC, sizeName ASC, finishName ASC';	return $sql;}?>