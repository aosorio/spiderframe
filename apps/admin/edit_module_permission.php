<?php define("TO_ROOT", "../..");  require_once TO_ROOT . "/core/includes/main.inc.php";  $Page = new Form("Add module permission");    /* ---------------- <<<< Assert User Permissions >>>> ---------------------------------------------------------------------*/  /** *  if(!System::__assertLoginType($_SESSION["login_type"]) && !System::__hasPermission("user", "add_user"))  {  	System::__sessionDestroy();  	$Page->setOnReady("__showMessage","{'message':'Sorry you dont have permission','options':{'OK':function(){__goToPage('index.php')}}}");  	$Page->goToPage();  }  /* ---------------- <<<< End Assert User Permissions >>>> ----------------------------------------------------------------*/      /* ---------------- <<<< Load Class Models >>>> --------------------------------------------------------------------------*/  $cat_module_permission_id = (isset($_GET["cat_module_permission_id"])) ? $_GET["cat_module_permission_id"] : 0 ;    $Permission = Row::getInstance("cat_module_permission", $cat_module_permission_id);  $Permission->load();  /* ---------------- <<<< End Load Class Models >>>> ---------------------------------------------------------------------*/    /* ---------------- <<<< Set Row on Form >>>> --------------------------------------------------------------------------*/  $Page->setRow($Permission);  $Page->assign("modules", $modules);  /* ---------------- <<<< End Set Row on Form  >>>> ---------------------------------------------------------------------*/      /* ---------------- <<<< Set Genarl Variables >>>> ----------------------------------------------------------------------*/  $cat_module = AdminFunctions::__getModuleByPermissionId($cat_module_permission_id);  /* ---------------- <<<< End Set Genarl Variables  >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure Fields >>>> --------------------------------------------------------------------------*/  $Page->setFieldRequired("all");  $Page->setFieldClass("description", "__required");     $Page->setFieldValue("cat_module_id", $Permission->data["cat_module_id"]);   $Page->insertTitle("Permission data for {$cat_module['module']} module", "cat_module_id","before"); 	  /* ---------------- <<<< End Configure Fields >>>> ----------------------------------------------------------------------*/      /* ---------------- <<<< Configure Sturdy Row >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Configure Sturdy Row >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure PHP Antions >>>> ---------------------------------------------------------------------*/  $Page->addAction("Save", "action_add");  $Page->addAction("Cancel", "action_cancel");  /* ---------------- <<<< End Configure PHP Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure Js Actions >>>> ----------------------------------------------------------------------*/  $Page->setOnReady("__focus", "first");  /* ---------------- <<<< End Configure Js Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Set Menus >>>> --------------------------------------------------------------------------------*/  $Page->setSecondaryMenu("admin_permissions");  /* ---------------- <<<< End Set Menus >>>> ----------------------------------------------------------------------------*/      /* ---------------- <<<< Configure Jquery CSS Theme >>>> ---------------------------------------------------------------*/    /* ---------------- <<<< End Configure Jquery CSS Theme >>>> -----------------------------------------------------------*/      /* ---------------- <<<< Configure CSS Theme >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Configure CSS Theme >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure JS Scripts >>>> ---------------------------------------------------------------------*/  $Page->addJsLink(TO_ROOT . "/apps/admin/subcore/scripts/script.add_module_permission.js");  /* ---------------- <<<< End Configure JS Scripts >>>> -----------------------------------------------------------------*/      $Page->display();