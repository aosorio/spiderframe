<?php define("TO_ROOT", "../..");  require_once TO_ROOT . "/core/includes/main.inc.php";  $Page = new Form("Add Company");    /* ---------------- <<<< Assert User Permissions >>>> ---------------------------------------------------------------------*/  /** *  if(!System::__assertLoginType($_SESSION["login_type"]) && !System::__hasPermission("user", "add_user"))  {  	System::__sessionDestroy();  	$Page->setOnReady("__showMessage","{'message':'Sorry you dont have permission','options':{'OK':function(){__goToPage('index.php')}}}");  	$Page->goToPage();  }  /* ---------------- <<<< End Assert User Permissions >>>> ----------------------------------------------------------------*/      /* ---------------- <<<< Load Class Models >>>> --------------------------------------------------------------------------*/  $cat_company_id = (isset($_GET["cat_company_id"])) ? $_GET["cat_company_id"] : 0 ;    $Company = ($cat_company_id >= 1) ? Row::getInstance("cat_company", $cat_company_id) : Row::getNewInstance("cat_company", 0);  $Company->load();  /* ---------------- <<<< End Load Class Models >>>> ---------------------------------------------------------------------*/ 	  $address_id = FiscalFunctions::__getCompanyAddressID($cat_company_id);  $Address = ($address_id >= 1) ? UserAddress::getInstance($address_id) : UserAddress::getNewInstance("user_address", 0);  $Address->load();      /* ---------------- <<<< Set Row on Form >>>> --------------------------------------------------------------------------*/  $Page->setRow($Company);  $Page->setRow($Address);     /* ---------------- <<<< End Set Row on Form  >>>> ---------------------------------------------------------------------*/      /* ---------------- <<<< Set Genarl Variables >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Set Genarl Variables  >>>> -----------------------------------------------------------------*/  $location =  Functions::__getLocationByCity($Address->data["city_id"]);  $city_id = ($location["city_id"]) ? $location["city_id"] : CITY_ID ;  $state_id = ($location["state_id"]) ? $location["state_id"] : STATE_ID ;  $country_id = ($location["country_id"]) ? $location["country_id"] : COUNTRY_ID ;     $countries_array = Functions::__getCountries();  $states_array = Functions::__getStates($country_id);  $cities_array = Functions::__getCities($state_id);  $client_array = FiscalFunctions::__getClient();  /* ---------------- <<<< Configure Fields >>>> --------------------------------------------------------------------------*/  $Page->setFieldRequired("all");  $Page->unsetFieldRequired(array("postal_zip","place","interior","address_detail","address_cross"));    $Page->setFieldValue("user_login_id", $_SESSION['user_login_id']);  $Page->hideField("status_company");  $Page->hideField("date");  $Page->hideField("date_low");   $Page->insertTitle("Client", "company","before");   $Page->showField("cat_client_id");  $Page->setLabel("cat_client_id", "Client");  $Page->setFieldProperty("cat_client_id","type", "select");  $Page->moveBefore("cat_client_id", "company");    $Page->insertTitle("Company data", "company","before");  $Page->insertTitle("Address data", "city_id","before");  $Page->insertField("state_id", "", "city_id", "before");  $Page->setFieldProperty("state_id", "type", "select");  $Page->setLabel("state_id", "State");  $Page->showField("city_id");  $Page->setFieldProperty("city_id", "type", "select"); /* ---------------- <<<< End Configure Fields >>>> ----------------------------------------------------------------------*/      /* ---------------- <<<< Configure Sturdy Row >>>> ----------------------------------------------------------------------*/  $Page->setSturdyRowTransformDate("cat_client", "date");  $Page->setSturdyRowTransformDate("cat_client", "date_low");  $Page->setSturdyRowAsignValue("user_address", array("user_id"=>"cat_company_id", "cat_address_id"=>"7") );   /* ---------------- <<<< End Configure Sturdy Row >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure PHP Antions >>>> ---------------------------------------------------------------------*/  $Page->addAction("Save");  $Page->addAction("Cancel");  /* ---------------- <<<< End Configure PHP Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure Js Actions >>>> ----------------------------------------------------------------------*/  $Page->setOnReady("__focus", "first");  $Page->setOnReady("__setCitiesOnSelect", "state_id_0", "city_id_{$address_id}");  $Page->setOnReady("__createOptionForComboBox", "state_id_0", json_encode($states_array), $state_id);  $Page->setOnReady("__createOptionForComboBox", "city_id_{$address_id}", json_encode($cities_array), $city_id);  $Page->setOnReady("__createOptionForComboBox", "cat_client_id_{$cat_company_id}", json_encode($client_array), $Company->data["cat_client_id"]);   /* ---------------- <<<< End Configure Js Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Set Menus >>>> --------------------------------------------------------------------------------*/ //$Page->setSecondaryMenu("report");  /* ---------------- <<<< End Set Menus >>>> ----------------------------------------------------------------------------*/      /* ---------------- <<<< Configure Jquery CSS Theme >>>> ---------------------------------------------------------------*/  //$Page->setJQueryTheme("sunny");  /* ---------------- <<<< End Configure Jquery CSS Theme >>>> -----------------------------------------------------------*/      /* ---------------- <<<< Configure CSS Theme >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Configure CSS Theme >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure JS Scripts >>>> ---------------------------------------------------------------------*/  $Page->addJsLink(TO_ROOT . "/apps/fiscal/subcore/scripts/script.add_company.js");  /* ---------------- <<<< End Configure JS Scripts >>>> -----------------------------------------------------------------*/      $Page->display();