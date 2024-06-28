<?php
include('../connection.inc.php');
include('../constant.inc.php');
include('../function.inc.php');

//include('smtp/PHPMailerAutoload.php');
$uid=$_SESSION['SUB_ADMIN_IS_LOGIN'];
$type=get_safe_value($_POST['type']);
if($type=='profile'){
	$name=get_safe_value($_POST['name']);
    $name=get_safe_value($_POST['dob']);
    $email=get_safe_value($_POST['email']);
	$mobile=get_safe_value($_POST['mobile']);
    $address=get_safe_value($_POST['address']);
    $station=get_safe_value($_POST['station']);
	$_SESSION['POLICE_USER']=$name;
	mysqli_query($con,"update police set name='$name',dob='$dob',email='$email',mobile='$mobile',address='$address',station='$station' where id='$uid'");
	$arr=array('status'=>'success','msg'=>'Profile has been updated');
	echo json_encode($arr);
}

if($type=='password'){
	$old_password=get_safe_value($_POST['old_password']);
	$new_password=get_safe_value($_POST['new_password']);
	
	$check=mysqli_num_rows(mysqli_query($con,"select * from police where password='$old_password'"));
	$res=mysqli_query($con,"select password from police where id='$uid'");
	$row=mysqli_fetch_assoc($res);
	$dbpassword=$row['password'];
	if(password_verify($old_password,$dbpassword)){
		$new_password=password_hash($new_password,PASSWORD_BCRYPT);	
		mysqli_query($con,"update police set password='$new_password' where id='$uid'");
	$arr=array('status'=>'success','msg'=>'Password has been updated');
	}else{
		$arr=array('status'=>'error','msg'=>'Please enter correct password');		
	}
	
	echo json_encode($arr);
}
?>