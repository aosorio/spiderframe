<?php define("TO_ROOT", "../..");  require_once TO_ROOT . "/core/includes/main.inc.php";  $Page = new Detail("View Report");    /* ---------------- <<<< Assert User Permissions >>>> ---------------------------------------------------------------------*/  /** *  if(!System::__assertLoginType($_SESSION["login_type"]) && !System::__hasPermission("user", "add_user"))  {  	System::__sessionDestroy();  	$Page->setOnReady("__showMessage","{'message':'Sorry you dont have permission','options':{'OK':function(){__goToPage('index.php')}}}");  	$Page->goToPage();  }  /* ---------------- <<<< End Assert User Permissions >>>> ----------------------------------------------------------------*/      /* ---------------- <<<< Load Class Models >>>> --------------------------------------------------------------------------*/  $report_id = (isset($_GET["report_id"])) ? $_GET["report_id"] : 0 ;    $Report = ($report_id == 0) ?  Row::getNewInstance("report", 0) : Row::getInstance("report", $report_id) ;  $Report->load();  /* ---------------- <<<< End Load Class Models >>>> ---------------------------------------------------------------------*/    /* ---------------- <<<< Set Row on Form >>>> --------------------------------------------------------------------------*/  $Page->setRow($Report);  /* ---------------- <<<< End Set Row on Form  >>>> ---------------------------------------------------------------------*/      /* ---------------- <<<< Set Genarl Variables >>>> ----------------------------------------------------------------------*/  Functions::__getNext("report", $report_id, $next, $previous);  /* ---------------- <<<< End Set Genarl Variables  >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure Fields >>>> --------------------------------------------------------------------------*/    /* ---------------- <<<< End Configure Fields >>>> ----------------------------------------------------------------------*/      /* ---------------- <<<< Configure Sturdy Row >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Configure Sturdy Row >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure PHP Antions >>>> ---------------------------------------------------------------------*/  $Page->addAction("Edit", TO_ROOT . "/apps/report/add_report.php?report_id=report_id");  $Page->addActiveAction("report-active-report_id-active");    $Page->addGeneralAction("Previuos", TO_ROOT ."/apps/report/report.php?report_id=" .  $previous, false);  $Page->addGeneralAction("Next", TO_ROOT ."/apps/report/report.php?report_id=" .  $next, false);    /* ---------------- <<<< End Configure PHP Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Configure Js Actions >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Configure Js Actions >>>> -----------------------------------------------------------------*/      /* ---------------- <<<< Set Menus >>>> --------------------------------------------------------------------------------*/ //$Page->setSecondaryMenu("report");  /* ---------------- <<<< End Set Menus >>>> ----------------------------------------------------------------------------*/      /* ---------------- <<<< Configure Jquery CSS Theme >>>> ---------------------------------------------------------------*/    /* ---------------- <<<< End Configure Jquery CSS Theme >>>> -----------------------------------------------------------*/      /* ---------------- <<<< Configure CSS Theme >>>> ----------------------------------------------------------------------*/    /* ---------------- <<<< End Configure CSS Theme >>>> ------------------------------------------------------------------*/      /* ---------------- <<<< Configure JS Scripts >>>> ---------------------------------------------------------------------*/    /* ---------------- <<<< End Configure JS Scripts >>>> -----------------------------------------------------------------*/      $Page->display();