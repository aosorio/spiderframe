<?php $returnData = array();date_default_timezone_set("America/Mexico_City");$returnData["day"] = ( isset( $_GET["day"] ) && $_GET["day"] >= 1 ) ? $_GET["day"] : date("d") ;  	$returnData["year"] = ( isset( $_GET["year"] ) && $_GET["year"] >= 1 ) ? $_GET["year"] : date("Y") ;  	$returnData["month"] = ( isset( $_GET["month"] ) && $_GET["month"] >= 1 ) ? $_GET["month"] : date("m") ;  	$returnData["now"] = mktime( date("H"), date("i"), date("s"), (int)$returnData["month"], (int)$returnData["day"], (int)$returnData["year"]);$returnData["mktime"] = mktime( date("H"), date("i"), date("s"), (int)$returnData["month"], (int)$returnData["day"], (int)$returnData["year"]);$returnData["date_time"] = date("Y-m-d H:i:s", $returnData["mktime"] );  	echo json_encode($returnData);