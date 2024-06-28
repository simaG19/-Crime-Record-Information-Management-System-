<?php
session_start();
include('../function.inc.php');
unset($_SESSION['SUB_ADMIN_IS_LOGIN']);
redirect('login.php');
?>