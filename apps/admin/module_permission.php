<?php define("TO_ROOT", "../..");  require_once TO_ROOT . "/core/includes/main.inc.php";    $Page = new Page("Permission", "module_permission");      /* ---------------- <<<< Assert User Permissions >>>> ---------------------------------------------------------------------*/  /** *  if(!System::__assertLoginType($_SESSION["login_type"]) && !System::__hasPermission("user", "add_user"))  {  	System::__sessionDestroy();  	$Page->setOnReady("__showMessage","{'message':'Sorry you dont have permission','options':{'OK':function(){__goToPage('index.php')}}}");  	$Page->goToPage();  }  /* ---------------- <<<< End Assert User Permissions >>>> ----------------------------------------------------------------*/      /* ---------------- <<<< Load Class Models >>>> --------------------------------------------------------------------------*/  $cat_module_permission_id = (isset($_GET["cat_module_permission_id"])) ? $_GET["cat_module_permission_id"] : false ;    $Permission = Row::getInstance("cat_module_permission", $cat_module_permission_id);  $Permission->load();    $Module = AdminFunctions::__getModuleByPermissionId($cat_module_permission_id);  /* ---------------- <<<< End Load Class Models >>>> ---------------------------------------------------------------------*/  /* ---------------- <<<< Set Genarl Variables >>>> ----------------------------------------------------------------------*/  Functions::__getNext("cat_module_permission", $cat_module_permission_id, $next, $previous);    $Page->assign("next", $next);  $Page->assign("Module", $Module);  $Page->assign("previous", $previous);  $Page->assign("Permission", $Permission);  /* ---------------- <<<< End Set Genarl Variables  >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure Js Actions >>>> ----------------------------------------------------------------------*/  $Page->setOnReady("__activeAction");  /* ---------------- <<<< End Configure Js Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Set Menus >>>> --------------------------------------------------------------------------------*/  $Page->setSecondaryMenu("admin_permissions");  /* ---------------- <<<< End Set Menus >>>> ----------------------------------------------------------------------------*/      /* ---------------- <<<< Configure CSS Theme >>>> ----------------------------------------------------------------------*/  $Page->addCssLink(TO_ROOT . "/core/style/tables.css");  /* ---------------- <<<< End Configure CSS Theme >>>> ------------------------------------------------------------------*/      $Page->display();