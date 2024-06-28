<?php
include('header.php');
if(!isset($_SESSION['SUB_ADMIN_USER_ID'])){
	redirect('login.php');
}



$uid=$_SESSION['ADMIN_ID'];



$sql = "SELECT  * FROM user  WHERE id=  '$uid'";

$result = mysqli_query($con ,$sql);
$row = mysqli_fetch_array($result);



if(isset($_POST['submit'])){


  
	$name= mysqli_real_escape_string($con,$_POST['name']);
    $dob= mysqli_real_escape_string($con,$_POST['dob']);
    $email= mysqli_real_escape_string($con,$_POST['email']);
	$phone= mysqli_real_escape_string($con,$_POST['phone']);
    $address= mysqli_real_escape_string($con,$_POST['address']);
    $station= mysqli_real_escape_string($con,$_POST['station']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);

	mysqli_query($con,"update user set name='$name',dob='$dob',email='$email',phone='$phone',address='$address',station='$station', password='$pass' where id='$uid'");
	$arr=array('Profile has been updated');
	echo json_encode($arr);
}





?>
<link rel="stylesheet" href="assets/stylee.css">
<div class="main-panel">
    <div class="content-wrapper">
        <div class="myaccount-area">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-12">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <form action="" method="post">
                                                <div class="billing-information-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h5>Personal Details</h5>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Password</label>
                                                                <input type="text" name="password" required value="<?php echo $row['password']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name</label>
                                                                <input type="text" name="name" required value="<?php echo $row['name']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Date of Birth</label>
                                                                <input type="date"name="dob" required value="<?php echo $row['dob']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Phone Number</label>
                                                                <input type="text" name="phone" value="<?php echo $row['phone']?>" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Email Address</label>
                                                                <input type="email" name="email" value="<?php echo $row['email']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Address</label>
                                                                <input type="address" name="address" value="<?php echo $row['address']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Station</label>
                                                                <input type="address" name="station" value="<?php echo $row['station']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit" name="submit">Update</button>
                                                        </div>
                                                    </div>
                                                    <div id="form_msg"></div>
                                                </div>
                                                <input type="hidden" name="type" value="profile">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form method="post" id="frmPassword">
                                                <div class="billing-information-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h5>Your Password</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Old Password</label>
                                                                <input type="password" name="old_password" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>New Password</label>
                                                                <input type="password" name="new_password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit" id="password_submit">Change</button>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" value="password">
                                                    <div id="password_form_msg"></div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
<?php include('footer.php');?>