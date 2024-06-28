<?php
include('../connection.inc.php');
include('../function.inc.php');
include('../constant.inc.php');
if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $username=get_safe_value($con,$_POST['username']);
	$email=get_safe_value($con,$_POST['email']);
	$password=get_safe_value($con,$_POST['password']);
    $gender=get_safe_value($con,$_POST['gender']);
    $dob=get_safe_value($con,$_POST['dob']);
    $phone=get_safe_value($con,$_POST['phone']);
    $address=get_safe_value($con,$_POST['address']);
    $station=get_safe_value($con,$_POST['station']);
    $added_on=date('Y-m-d h:i:s');

    $sql="insert into police(name,username,password,email,gender,dob,station,address,phone,status,added_on,image) values('$name','$username','$password','$email','$gender','$dob','$station','$address','$phone',1,'$added_on','$image')";
    $sql_run=mysqli_query($con,$sql);

    if($sql_run){
        $_SESSION['success']="Admin Profile Is Not Added";
        header("location:manage_police1.php");
    }else{
        $_SESSION['status']="Admin Profile Is Not Added";
        header("location:manage_police1.php");
    }

}













?>