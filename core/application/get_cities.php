<?php define("TO_ROOT", "../..");  header("Content-Type: application/json");$returnData = Array();$returnData["state_id"] = (isset($_GET["state_id"])) ? $_GET["state_id"] : false;$returnData["state_id"] = ($returnData["state_id"] == false) ? $_POST["state_id"] : $returnData["state_id"] ;$returnData["active"] = (isset($_GET["active"])) ? $_GET["active"] : false;$returnData["active"] = ($returnData["active"] == false && isset($_POST["active"])) ? $_POST["active"] : "1" ;if($returnData["state_id"] != false ){	require_once TO_ROOT . "/core/includes/main.inc.php";	$DbConnection = DbConnection::getInstance("_world"); 		$sql = "SELECT 				city_id, city		   FROM 		   		city 		   WHERE 		   		state_id = '{$returnData["state_id"]}'		   AND			   	active = '{$returnData["active"]}'		   ";		if($data = $DbConnection->getPair($sql))	{		$returnData["success"] = 1;		$returnData["data"] = $data;		$returnData["reason"] = "CITIES_OK";	} else {		$returnData["success"] = 1;		$returnData["reason"] = "NOT_FOUND_CITIES";	}} else {	$returnData["success"] = 0;	$returnData["reason"] = "NOT_DATA";}echo json_encode($returnData);