<?php 
include('header.php');
$msg="";
$prision="";
$address="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from prision where id='$id'"));
	$prision=$row['prision'];
	$address=$row['address'];
}

if(isset($_POST['submit'])){
	$prision=get_safe_value($con,$_POST['prision']);
	$address=get_safe_value($con,$_POST['address']);
	
	if($id==''){
		$sql="select * from prision where prision='$prision'";
	}else{
		$sql="select * from prision where prision='$prision' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="prision already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into prision(prision,address,status) values('$prision','$address',1)");
		}else{
			mysqli_query($con,"update prision set prision='$prision', address='$address' where id='$id'");
		}
		
		redirect('prision.php');
	}
}
?>
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
			<h1 class="grid_title ml10 ml15">Manage Station</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Station</label>
                      <input type="text" class="form-control" placeholder="prision" name="prision" required value="<?php echo $prision?>">
					            <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Address</label>
                      <input type="text" class="form-control" placeholder="Address" name="address"  value="<?php echo $address?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
    </div>
        
<?php include('footer.php');?>