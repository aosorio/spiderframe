<?php define("TO_ROOT", "../..");  require_once TO_ROOT . "/core/includes/main.inc.php";  $Page = new Page("Admin", "admin_users");  /**   if( !System::__assertLoginType( $_SESSION["login_type"], array("root","admin","super_user") ) )  {  	System::__sessionDestroy();  	$Page->setOnReady("__showMessage","{'message':'Sorry you dont have permission','options':{'OK':function(){__goToPage('index.php')}}}");  	$Page->goToPage("index.php");  }  /**/    $Page->display();