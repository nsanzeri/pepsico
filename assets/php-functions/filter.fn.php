<?phpfunction buildFilter($tableName, $idName) {	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;	$haystack = array();	$sql = "SELECT * FROM `" . $tableName . "` ORDER BY `name`";	$result = $db -> query($sql);	$numrows = $result -> num_rows;	// 	echo $searchTerm;	$haystack = populateHaystack($tableName);		$output = "";	$output_head = "";	$checked = "";	$active_class = "";	$show = "";	$output_head .= '<ul class="list-unstyled" style="display: none;">';	while ($row = $result -> fetch_object()) {		$id = $row->$idName;		$checked = "";// 		echo var_dump($haystack);		foreach($haystack as $item) {			if ($id == $item['value']){				$checked = " checked='checked'";				$active_class = "active";				$show = "show";				$output_head = '<ul class="list-unstyled" style="display: block;">';			}		}		$name = htmlentities($row -> name, ENT_QUOTES, "UTF-8");		$description = htmlentities($row->description, ENT_QUOTES, "UTF-8");		$active = htmlentities($row->is_active, ENT_QUOTES, "UTF-8");				$output .= '<li><a><div class="checkbox checkbox-primary checkbox-single"> <input type="checkbox" id="singleCheckbox2" aria-label="Single checkbox Two" name="' . $tableName . '_array[]" value="' . $id . '"' . $checked . '> <label></label> </div>' . $name . ' (' . getCount($tableName, $id) .' )</a></li>';	}	$output .= '</ul>			    <input type="hidden" name="searchTermPersisted" value="' . $searchTerm . '" />';	return $output_head . $output;}function getCount($tableName, $id ) {	global $db, $page, $region, $format, $brand, $size, $finish, $searchTerm;	$sql = "SELECT COUNT(*)  AS total FROM products			INNER JOIN region ON products.region_id = region.region_id			INNER JOIN format ON products.format_id = format.format_id			INNER JOIN brand ON products.brand_id = brand.brand_id			INNER JOIN finish ON products.finish_id = finish.finish_id			WHERE products.is_active = true ";// 	where `" . $idName . "` in (" . $id . ")";	$sqlOperator = " AND ";		if ($tableName == 'region'){			$sql .= $sqlOperator . " products.region_id = " . $id;			$sqlOperator = " AND ";		}else{						if (!functionallyEmpty($region)){				$sql .= $sqlOperator . "products.region_id IN (" . buildInString($region) . " 0)";				$sqlOperator = " AND ";		 	}		}		if ($tableName == 'format'){			$sql .= $sqlOperator . " products.format_id = " . $id;			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($format)){				$sql .= $sqlOperator . " products.format_id IN (" . buildInString($format) . " 0)";				$sqlOperator = " AND ";		 	}		}		if ($tableName == 'brand'){			$sql .= $sqlOperator . " products.brand_id = " . $id;			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($brand)){				$sql .= $sqlOperator . " products.brand_id IN (" . buildInString($brand) . " 0)";				$sqlOperator = " AND ";			}		}		if ($tableName == 'size'){			$sql .= $sqlOperator . " (products.size >= " . getSizeRange($id, 'lower') . " AND products.size <= " . getSizeRange($id, 'upper') . ")";			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($size)){				$sql .= $sqlOperator . buildInStringSize($size);				$sqlOperator = " AND ";		 	}		}			if ($tableName == 'finish'){			$sql .= $sqlOperator . " products.finish_id = " . $id;			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($finish)){				$sql .= $sqlOperator . " products.finish_id IN (" . buildInString($finish) . " 0)";				$sqlOperator = " AND "; 		 	}		}		if (!functionallyEmpty($searchTerm)){			$sql .= " AND " . buildSearchTermSql($searchTerm);		}//  	echo $sql;	$result = $db -> query($sql);	$res = mysqli_fetch_assoc($result);//fetch data	return $res['total'];}function getSizeRange($id, $upperOrLower ) {	global $db, $page, $size;	$sql = "SELECT size." . $upperOrLower . "_range FROM size	where size_id  = " . $id ;	$result = $db -> query($sql);	$res = mysqli_fetch_assoc($result);//fetch data	return $res[$upperOrLower . '_range'];}function buildInString($o){	$inString = "";	foreach($o as $element){		if (functionallyEmpty($element)){			continue;		}else{			$inString .= $element['value']. ", ";		}	}	return $inString;}function buildInStringSize($o){	$inString = "";	foreach($o as $element){		if (functionallyEmpty($element)){			continue;		}else{			$inString .= " (products.size >= " . getSizeRange($element['value'], 'lower') . " AND products.size <= " . getSizeRange($element['value'],  'upper') . ")";			$inString .= " OR ";		}	}	return removeTrailingOr($inString);}function populateHaystack($tableName){	global $region, $format, $brand, $size, $finish;	$haystack = array();	if ($tableName == "region") {		$haystack = $region;	}else if ($tableName == "format") {		$haystack = $format;	}else if ($tableName == "brand") {		$haystack = $brand;	}else if ($tableName == "size") {		$haystack = $size;	}else if ($tableName == "finish") {		$haystack = $finish;	}	return $haystack;}function functionallyEmpty($o){	if (empty($o)) return true;	else if (is_numeric($o)) return false;	else if (is_string($o)) return !strlen(trim($o));	else if (is_object($o)) return functionallyEmpty((array)$o);	// If it's an array!	foreach($o as $element)		if (functionallyEmpty($element)) continue;	else return false;	// all good.	return true;}function getAutoCompleteData($param){	$options = array();		$options = getDistinctValues('name', $param, $options);	$options = getDistinctValues('dimension', $param, $options);	$options = getDistinctValues('size', $param, $options);	$options = getDistinctValues('status', $param, $options);	$options = getDistinctValues('description', $param, $options);	$options = getDistinctValuesJoined('region', 'name', 'region_id', $param, $options);	$options = getDistinctValuesJoined('brand', 'name', 'brand_id', $param, $options);	$options = getDistinctValuesJoined('finish', 'name', 'finish_id', $param, $options);	$options = getDistinctValuesJoined('format', 'name', 'format_id', $param, $options);	echo json_encode($options, true);}function getDistinctValues($col, $param, $options){	global $db;	$sql = "SELECT distinct(" . $col . ") FROM products WHERE products.is_active = true AND " . $col . " LIKE '".$param."%'";	$result = $db -> query($sql);	while ($row = $result -> fetch_object()) {		array_push($options, $row->$col);	}	return $options;}function getDistinctValuesJoined($table, $col, $id, $param, $options){	global $db;	$aliasName = $table . $col;	$sql = "SELECT DISTINCT(" . $table . "." . $col . ") AS " . $table . $col . " FROM products			INNER JOIN " . $table . " ON products." . $id . " = " . $table .  "." . $id . 			" WHERE products.is_active = true AND " . $table . "." . $col . " LIKE '".$param."%'";// 	echo $sql . '<br>';	$result = $db -> query($sql);	while ($row = $result -> fetch_object()) {		array_push($options, $row->$aliasName);	}	return $options;}function buildSearchTermSql($searchTerm){	$searchSql = '(';	$searchSql .= buildLikeClause('name', $searchTerm);	$searchSql .= buildLikeClause('dimension', $searchTerm);	$searchSql .= buildLikeClause('size', $searchTerm);	$searchSql .= buildLikeClause('status', $searchTerm);	$searchSql .= buildLikeClause('description', $searchTerm);	$searchSql .= buildLikeClauseJoined('region', 'name', 'region_id', $searchTerm);	$searchSql .= buildLikeClauseJoined('brand', 'name', 'brand_id', $searchTerm);	$searchSql .= buildLikeClauseJoined('finish', 'name', 'finish_id', $searchTerm);	$searchSql .= buildLikeClauseJoined('format', 'name', 'format_id', $searchTerm); 	$result = removeTrailingOr($searchSql); 	$result .= ')';// 	echo $result;	return $result;}function buildLikeClause($col, $searchTerm){	$sql = " products." . $col . " LIKE '". $searchTerm ."%' OR ";	return $sql;}function buildLikeClauseJoined($table, $col, $id, $searchTerm){	$sql = '';	$aliasName = $table . $col;	$sql .= " " . $table . "." . $col . " LIKE '" . $searchTerm . "%' OR ";	return $sql;}function removeTrailingOr($inString){	$find = 'OR';	$replace = '';	$result = preg_replace(strrev("/$find/"),strrev($replace),strrev($inString),1);	return strrev($result);}?>
