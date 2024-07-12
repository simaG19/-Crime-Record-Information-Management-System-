<?php
include('../connection.inc.php');
include('../function.inc.php');
include('../constant.inc.php');
if(!isset($_SESSION['SUB_ADMIN_IS_LOGIN'])){
    redirect('index.php');
}
$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

$page_title='';
if($cur_path=='' || $cur_path=='manage_cases.php'){
	$page_title='SubAdmin Dashboard';
}elseif($cur_path=='case.php' || $cur_path=='manage_cases.php' || $cur_path=='case_detail.php'|| $cur_path=='case_history.php' ){
	$page_title='Manage Cases';
}elseif($cur_path=='special.php' || $cur_path=='manage_special.php' || $cur_path=='case_detail.php'){
	$page_title='Manage Special Cases';
}elseif($cur_path=='detective.php' || $cur_path=='manage_detective.php' ){
	$page_title='Manage Detective';
}elseif($cur_path=='police-grid.php' || $cur_path=='manage_police.php'){
	$page_title='Manage Police';
}elseif($cur_path=='criminal.php' ){
	$page_title='Criminal Records';
}elseif($cur_path=='staff.php' ){
	$page_title='Staff';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!--<link rel="stylesheet" href="assets/css/added.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"> </a><br>&nbsp;&nbsp;Crime Record Management System<br>
         
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['SUB_ADMIN_USER']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              
              <a class="dropdown-item" href="profile.php">
                <i class="mdi mdi-account-card-details menu-icon"></i>
                Profile
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
            
          </li>
          
          
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="manage_cases.php">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Report</span>
            </a>
          
            <li class="nav-item">
            <a class="nav-link" href="report_state.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Report State</span>
            </a>
          </li>

		  <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
          
        </ul>
      </nav>