<?php define("TO_ROOT", "../..");  require_once TO_ROOT . "/core/includes/main.inc.php";    $Page = new Page("Admin users", "user_list");      /* ---------------- <<<< Assert User Permissions >>>> ---------------------------------------------------------------------*/  /** *  if(!System::__assertLoginType($_SESSION["login_type"]) && !System::__hasPermission("user", "view_permission"))  {  	System::__sessionDestroy();  	$Page->setOnReady("__showMessage","{'message':'Sorry you dont have permission','options':{'OK':function(){__goToPage('index.php')}}}");  	$Page->goToPage();  }  /* ---------------- <<<< End Assert User Permissions >>>> ----------------------------------------------------------------*/      /* ---------------- <<<< Set Genarl Variables >>>> ----------------------------------------------------------------------*/  $search_user_options = (isset($_GET["search_user_options"]) && $_GET["search_user_options"] == false) ? false : true;    $__rows = AdminFunctions::__getUserList();	  $Page->assign("__rows",$__rows);  $Page->assign("search_user_options", $search_user_options);  /* ---------------- <<<< End Set Genarl Variables  >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Set Menus >>>> --------------------------------------------------------------------------------*/  $Page->setSecondaryMenu("admin_users");  /* ---------------- <<<< End Set Menus >>>> ----------------------------------------------------------------------------*/      /* ---------------- <<<< Configure Js Actions >>>> ----------------------------------------------------------------------*/  $Page->setOnReady("__activeAction");  $Page->setOnReady("search","user");  $Page->setOnReady("__focus","search_user");  /* ---------------- <<<< End Configure Js Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure CSS Theme >>>> ----------------------------------------------------------------------*/  $Page->addCssLink(TO_ROOT . "/core/style/tables.css");  /* ---------------- <<<< End Configure CSS Theme >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure JS Scripts >>>> ---------------------------------------------------------------------*/  $Page->addJsLink(TO_ROOT . "/apps/admin/subcore/scripts/script.user_list.js");  /* ---------------- <<<< End Configure JS Scripts >>>> -----------------------------------------------------------------*/      $Page->display();