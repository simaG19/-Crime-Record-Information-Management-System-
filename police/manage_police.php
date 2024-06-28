<?php
include('header.php');
$msg="";
$name="";
$username="";
$password="";
$email="";
$gender="";
$dob="";
$image="";
$station="";
$address="";
$phone="";
$role="";
$id="";

$image_status='required';

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from police where id='$id'"));
	$name=$row['name'];
    $username=$row['username'];
	  $password=$row['password'];
    $email=$row['email'];
    $gender=$row['gender'];
    $dob=$row['dob'];
    $image=$row['image'];
    $station=$row['station'];
    $address=$row['address'];
    $phone=$row['phone'];
    $role=$row['role'];
    $image_status='';
}

if(isset($_POST['submit'])){
	  $name=get_safe_value($con,$_POST['name']);
    $username=get_safe_value($con,$_POST['username']);
	  $password=get_safe_value($con,$_POST['password']);
	  $email=get_safe_value($con,$_POST['email']);
    $gender=get_safe_value($con,$_POST['gender']);
    $dob=get_safe_value($con,$_POST['dob']);
    $station=get_safe_value($con,$_POST['station']);
    $address=get_safe_value($con,$_POST['address']);
    $phone=get_safe_value($con,$_POST['phone']);
    $role=get_safe_value($con,$_POST['role']);
	  $added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from user where username='$username'";
	}else{
		$sql="select * from user where username='$username' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Police Username already added";
	}else{
		if($id==''){
			$image=$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],POLICE_IMAGE_SERVER_PATH.$_FILES['image']['name']);
			mysqli_query($con,"insert into user(name,username,password,email,gender,dob,station,address,phone,role,status,added_on,image) values('$name','$username','$password','$email','$gender','$dob','$station','$address','$phone','$role',1,'$added_on','$image')");
		}else{
            $image_condition='';
            if($_FILES['image']['name']!=''){
                $image=$_FILES['image']['name'];
			          move_uploaded_file($_FILES['image']['tmp_name'],POLICE_IMAGE_SERVER_PATH.$_FILES['image']['name']);
                $image_condition=", image='$image'";
            }
            $sql="update user set name='$name', username='$username', password='$password', email='$email', gender='$gender', dob='$dob', station='$station', address='$address', phone='$phone', role='$role' $image_condition where id='$id'";
			mysqli_query($con,$sql);
		}
		
		redirect('staff.php');
	}
}
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<h3 class="card-title ml10"><strong>Police</strong>&nbsp;<small>Form</small></h3>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required value="<?php echo $name?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" name="username" class="form-control" id="exampleInputName1" placeholder="Username" required value="<?php echo $username?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="text" name="password" class="form-control" id="exampleInputName1" placeholder="Password" required value="<?php echo $password?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $email?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Image</label>
                      <input type="file" class="form-control" placeholder="Defendent Image" name="image" <?php echo $image_status?>>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control" id="exampleSelectGender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputDate1">Date of Birth</label>
                      <input type="date" name="dob" class="form-control" id="exampleInputCity1" required value="<?php echo $dob?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Phone Number</label>
                      <input type="tel" name="phone" class="form-control" id="exampleInputCity1" placeholder="Phone Number" required value="<?php echo $phone?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Address</label>
                      <input type="text" name="address" class="form-control" id="exampleInputCity1" placeholder="Location" required value="<?php echo $address?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAddress1">Station</label>
                      <input type="text" name="station" class="form-control" id="exampleInputCity1" placeholder="Station" required value="<?php echo $station?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Work Role</label>
                        <select name="role" class="form-control" id="exampleSelectrole">
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="subadmin">SubAdmin</option>
                            <option value="police">Police</option>
                            <option value="archive">Archive</option>
                            <option value="detective">Detective</option>
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <div style="color:red;margin-top: 15px;"><?php echo $msg?></div>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
		</div>
<?php
include('footer.php');
?>