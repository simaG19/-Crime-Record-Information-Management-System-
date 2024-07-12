<?php
include('../connection.inc.php');
include('../constant.inc.php');
include('../function.inc.php');
$msg='';
if(isset($_POST['submit'])){
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    $sql="select * from user where username='$username' and password='$password' and role='police' and status=1 ";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
      $row=mysqli_fetch_assoc($res);
      $_SESSION['POLICE_IS_LOGIN']='yes';
      $_SESSION['POLICE_USER']=$row['name'];
      $_SESSION['POLICE_ID']=$row['id'];
      redirect('index1.php');
    }else{
        $msg="Please enter correct login details";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
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
                <li class="nav-item nav-toggler-item"></li>
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/2.jpg"></a>&nbsp;&nbsp;   Police Station<br>&nbsp;&nbsp;Crime Record Management System<br>
                <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?php echo LOGO_IMAGE_SITE_PATH."1.jpg"?>" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                
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
        <div class="main-panel  col-lg-12">
            <div class="content-wrapper">
                <div class="container-scroller">
                    <div class="container-fluid">
                        <div class="content-wrapper d-flex align-items-center auth">
                            <div class="row w-100">
                                <div class="col-lg-6 mx-auto">
                                    <div class="auth-form-light text-left p-5">
                                        <h6 class="font-weight-light">Sign in to continue.</h6>
                                        <form class="pt-3" method="post">
                                            <div class="form-group">
                                                <input type="textbox" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                                            </div>
                                            <div class="mt-3">
                                                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN" name="submit">
                                            </div>
                                        </form>
                                        <div style="color:red;margin-top: 15px;"><?php echo $msg?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">       <?php echo date('Y')?> <a href="#" target="_blank">   </a>.  .</span>
                </div>
            </footer>
      </div>
    </div>
  </div>

  <script src="assets/js/vendor.bundle.base.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/data-table.js"></script>
</body>
</html>