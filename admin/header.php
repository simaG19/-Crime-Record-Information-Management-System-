<?php
include('../connection.inc.php');
include('../function.inc.php');
include('../constant.inc.php');
if(!isset($_SESSION['ADMIN_IS_LOGIN'])){
    redirect('login.php');
}
$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

$page_title='';
if($cur_path=='' || $cur_path=='index.php'){
	$page_title='Admin Dashboard';
}elseif($cur_path=='case.php' || $cur_path=='manage_cases.php' || $cur_path=='case_detail.php' || $cur_path=='case_history.php' ){
	$page_title='Manage Cases';
}elseif($cur_path=='detective.php' || $cur_path=='manage_detective.php' ){
	$page_title='Manage Detective';
}elseif($cur_path=='category.php' || $cur_path=='manage_category.php' ){
	$page_title='Manage Category';
}elseif($cur_path=='special.php' || $cur_path=='manage_special.php' || $cur_path=='case_detail.php'){
	$page_title='Manage Special Cases';
}elseif($cur_path=='court.php' || $cur_path=='manage_court.php' ){
	$page_title='Manage Court';
}elseif($cur_path=='prision.php' || $cur_path=='manage_prision.php' ){
	$page_title='Manage Prision';
}elseif($cur_path=='staff.php' || $cur_path=='manage_police.php'){
	$page_title='Manage Police';
}elseif($cur_path=='criminal.php' ){
	$page_title='Criminal Records';
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
          <a class="navbar-brand brand-logo" href="index.php"></a>Crime Record Management System<br>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?php echo LOGO_IMAGE_SITE_PATH."1.jpg"?>" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['ADMIN_USER']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="profile.php">
                <i class="mdi mdi-logout text-primary"></i>
                Profile
              </a>
              <a class="dropdown-item" href="case_history.php">
                <i class="mdi mdi-logout text-primary"></i>
                Cases history
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
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="category.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="prision.php">
              <i class="mdi mdi-lock-reset menu-icon"></i>
              <span class="menu-title">Stations</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff.php">
              <i class="mdi mdi-incognito menu-icon"></i>
              <span class="menu-title">Staff</span>
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="case.php">
              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">Cases</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="report.php">
              <i class="mdi mdi-account-card-details menu-icon"></i>
              <span class="menu-title">Reports</span>
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