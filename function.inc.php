<?php
function pr($arr){
    echo'<pre>';
    print_r($arr);
}
function prx($arr){
    echo'<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str){
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}
function redirect($link){
    ?>
    <script>
        window.location.href='<?php echo $link?>'
    </script>
    <?php
    die();
}
function getDetectiveNameById($id){
    global $con;
    $sql="select name,phone from user where role='detective' and id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['name'].' ('.$row['phone'].')';
    }else{
        return 'Not Assigned';
    }
}
function getArchiveById($id){
    global $con;
    $sql="select name,address from user where role='archive' and id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['name'].' ('.$row['address'].')';
    }else{
        return 'Not Assigned';
    }
}
function getCourtResultByID($id){
    global $con;
    $sql="select cases_status from cases_status where id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['cases_status'];
    }else{
        return 'Not Assigned';
    }
}
function getCrimeCategoryByID($id){
    global $con;
    $sql="select category from category where id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['category'];
    }else{
        return 'Not Assigned';
    }
}

function getUserDetailsByid(){
	global $con;
    $data['id']='';
    $data['password']='';

	$data['name']='';
    $data['dob']='';
	$data['email']='';
	$data['phone']='';
    $data['address']='';
    $data['station']='';
	
	if(isset($_SESSION['POLICE_ID'])){
		$row=mysqli_fetch_assoc(mysqli_query($con,"select * from user where id=".$_SESSION['POLICE_ID']));
		$data['id']=$row['id'];
        $data['password']=$row['password'];
        $data['name']=$row['name'];
		$data['dob']=$row['dob'];
        $data['email']=$row['email'];
		$data['phone']=$row['phone'];
        $data['address']=$row['address'];
        $data['station']=$row['station'];
	}
	return $data;
}
//juser procecutor name and phone
function getProcecutorNameById($id){
    global $con;
    $sql="select name,phone from juser where role_id='1' and id='$id'";
    $data=array();
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);
        return $row['name'].' ('.$row['phone'].')';
    }else{
        return 'Not Assigned';
    }
}
?>