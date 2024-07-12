<?php
session_start();
include('../function.inc.php');
unset($_SESSION['POLICE_IS_LOGIN']);
unset($_SESSION['POLICE_USER']);
redirect('index.php');
?>