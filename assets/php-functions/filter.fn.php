<?phpfunction buildFilter($tableName, $idName) {	global $db, $page, $region, $format, $brand, $size, $finish;		$haystack = array();	$sql = "SELECT * FROM `" . $tableName . "` ORDER BY `name`";	$result = $db -> query($sql);	$numrows = $result -> num_rows;	// 	echo $region;	$haystack = populateHaystack($tableName);		$output = "";	$output_head = "";	$checked = "";	$active_class = "";	$show = "";	$output_head .= '<ul class="list-unstyled" style="display: none;">';	while ($row = $result -> fetch_object()) {		$id = $row->$idName;		$checked = "";// 		echo var_dump($haystack);		foreach($haystack as $item) {			if ($id == $item['value']){				$checked = " checked='checked'";				$active_class = "active";				$show = "show";				$output_head = '<ul class="list-unstyled" style="display: block;">';			}		}		$name = htmlentities($row -> name, ENT_QUOTES, "UTF-8");		$description = htmlentities($row->description, ENT_QUOTES, "UTF-8");		$active = htmlentities($row->is_active, ENT_QUOTES, "UTF-8");				$output .= '<li><a><div class="checkbox checkbox-primary checkbox-single"> <input type="checkbox" id="singleCheckbox2" aria-label="Single checkbox Two" name="' . $tableName . '_array[]" value="' . $id . '"' . $checked . '> <label></label> </div>' . $name . ' (' . getCount($tableName, $id) .' )</a></li>';	}	$output .= '</ul>';	return $output_head . $output;}function getCount($tableName, $id ) {	global $db, $page, $region, $format, $brand, $size, $finish;	$sql = "SELECT COUNT(*)  AS total FROM `products`";// 	where `" . $idName . "` in (" . $id . ")";	$sqlOperator = " WHERE ";		if ($tableName == 'region'){			$sql .= $sqlOperator . " region_id = " . $id;			$sqlOperator = " AND ";		}else{						if (!functionallyEmpty($region)){				$sql .= $sqlOperator . "region_id IN (" . buildInString($region) . " 0)";				$sqlOperator = " AND ";		 	}		}		if ($tableName == 'format'){			$sql .= $sqlOperator . " format_id = " . $id;			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($format)){				$sql .= $sqlOperator . " format_id IN (" . buildInString($format) . " 0)";				$sqlOperator = " AND ";		 	}		}		if ($tableName == 'brand'){			$sql .= $sqlOperator . " brand_id = " . $id;			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($brand)){				$sql .= $sqlOperator . " brand_id IN (" . buildInString($brand) . " 0)";				$sqlOperator = " AND ";			}		}		if ($tableName == 'size'){			$sql .= $sqlOperator . " (size >= " . getSizeRange($id, 'lower') . " AND size <= " . getSizeRange($id, 'upper') . ")";			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($size)){				$sql .= $sqlOperator . buildInStringSize($size);				$sqlOperator = " AND ";		 	}		}			if ($tableName == 'finish'){			$sql .= $sqlOperator . " finish_id = " . $id;			$sqlOperator = " AND ";		}else{			if (!functionallyEmpty($finish)){				$sql .= $sqlOperator . " finish_id IN (" . buildInString($finish) . " 0)";				$sqlOperator = " AND "; 		 	}		}		$result = $db -> query($sql);	$res = mysqli_fetch_assoc($result);//fetch data// 	echo $sql;	return $res['total'];}function getSizeRange($id, $upperOrLower ) {	global $db, $page, $size;	$sql = "SELECT size." . $upperOrLower . "_range FROM size	where size_id  = " . $id ;	$result = $db -> query($sql);	$res = mysqli_fetch_assoc($result);//fetch data	return $res[$upperOrLower . '_range'];}function buildInString($o){	$inString = "";	foreach($o as $element){		if (functionallyEmpty($element)){			continue;		}else{			$inString .= $element['value']. ", ";		}	}	return $inString;}function buildInStringSize($o){	$inString = "";	foreach($o as $element){		if (functionallyEmpty($element)){			continue;		}else{			$inString .= " (size >= " . getSizeRange($element['value'], 'lower') . " AND size <= " . getSizeRange($element['value'],  'upper') . ")";			$inString .= " OR ";		}	}		$find = 'OR';	$replace = '';	$result = preg_replace(strrev("/$find/"),strrev($replace),strrev($inString),1);// 	echo 'buildInStringSize() = ' . $result;	return strrev($result);}function populateHaystack($tableName){	global $region, $format, $brand, $size, $finish;	$haystack = array();	if ($tableName == "region") {		$haystack = $region;	}else if ($tableName == "format") {		$haystack = $format;	}else if ($tableName == "brand") {		$haystack = $brand;	}else if ($tableName == "size") {		$haystack = $size;	}else if ($tableName == "finish") {		$haystack = $finish;	}	return $haystack;}function functionallyEmpty($o){	if (empty($o)) return true;	else if (is_numeric($o)) return false;	else if (is_string($o)) return !strlen(trim($o));	else if (is_object($o)) return functionallyEmpty((array)$o);	// If it's an array!	foreach($o as $element)		if (functionallyEmpty($element)) continue;	else return false;	// all good.	return true;}?>