<?php define("TO_ROOT", "../../../..");  header("Content-Type: application/json");require_once TO_ROOT . "/core/includes/main.inc.php";$returnData = Array();$language = ( isset( $_POST["language"] ) ) ? $_POST["language"] : false;  $language = ( !$language && isset($_GET["language"]) ) ? $_GET["language"] : $language; $token = ( isset( $_POST["token"] ) ) ? $_POST["token"] : false;  	$token = ( !$token && isset( $_GET["token"] ) ) ? $_GET["token"] : $token;  $token = ( !$token && isset( $_SESSION["token"] ) ) ? $_SESSION["token"] : $token;$language = trim($language);$language = str_replace(" ", "_", strtolower($language) );if($token){	if(Functions::__hasPermissionByToken("dictionary", "add_dictionary", $token))	{		if($language)		{			$Dictionary = Dictionary::getInstance($language);			$Dictionary->load();						if($Dictionary->save())			{						$returnData["success"] = "1";						$returnData["language"] = $language;						$returnData["reason"] = "SAVE_DICTIONARY_OK";			} else {						$returnData["success"] = "0";						$returnData["language"] = $language;						$returnData["reason"] = "NOT_SAVE_DICTIONARY";			}		} else {			$returnData["success"] = "0";			$returnData["reason"] = "NOT_LANGUAGE";		}	} else {		$returnData["success"] = "0";		$returnData["reason"] = "NOT_HAS_PERMISSION";	}} else {	$returnData["success"] = "0";	$returnData["reason"] = "INVALID_TOKEN";}echo json_encode($returnData);