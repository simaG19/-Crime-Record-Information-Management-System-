<?php 
include('header.php');
$msg="";
$court="";
$username="";
$password="";
$address="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from court where id='$id'"));
	$court=$row['court'];
	$username=$row['username'];
	$password=$row['password'];
	$address=$row['address'];
}

if(isset($_POST['submit'])){
	$court=get_safe_value($con,$_POST['court']);
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$address=get_safe_value($con,$_POST['address']);
	
	if($id==''){
		$sql="select * from court where court='$court'";
	}else{
		$sql="select * from court where court='$court' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="court already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into court(court,username,password,address,status) values('$court','$username','$password','$address',1)");
		}else{
			mysqli_query($con,"update court set court='$court',username='$username',password='$password', address='$address' where id='$id'");
		}
		
		redirect('court.php');
	}
}
?>
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
			<h1 class="grid_title ml10 ml15">Manage Court</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Court</label>
                      <input type="text" class="form-control" placeholder="court" name="court" required value="<?php echo $court?>">
					            <div class="error mt8"><?php echo $msg?></div>
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php echo $username?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Password</label>
                      <input type="text" class="form-control" placeholder="Password" name="password" required value="<?php echo $password?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Address</label>
                      <input type="text" class="form-control" placeholder="Order Number" name="address"  value="<?php echo $address?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
    </div>
        
<?php include('footer.php');?>