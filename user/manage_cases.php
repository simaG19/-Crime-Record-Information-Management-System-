<?php
include('header.php');
$msg="";
$name="";
$gender="";
$category="";
$email="";
$gender="";
$dob="";
$image="";
$statement="";
$address="";
$phone="";
$role="";
$id="";


if(!isset($_SESSION['SUB_ADMIN_IS_LOGIN'])){
  redirect('index.php');
}
$session= $_SESSION['SUB_ADMIN_USER'];

if(isset($_POST['submit'])){
	  $name=get_safe_value($con,$_POST['name']);
    $gender=get_safe_value($con,$_POST['gender']);
	  $work=get_safe_value($con,$_POST['work']);
	
    $statement=get_safe_value($con,$_POST['statement']);
    $dob=get_safe_value($con,$_POST['dob']);
    $category=get_safe_value($con,$_POST['category']);
    $address=get_safe_value($con,$_POST['address']);
    $phone=get_safe_value($con,$_POST['phone']);

    $select = "SELECT * FROM report WHERE name = '$name' AND category = '$category' AND statement = '$statement'";
    

	if(mysqli_num_rows(mysqli_query($con,$select))>0){
		$msg="user report already added";
	}else{
		
           
        $sql = "INSERT INTO report(name, gender, category, work, dob, address,phone,statement, case_state) VALUES('$name', '$gender', '$category', '$work','$dob','$address','$phone','$statement', '0')";
        
			mysqli_query($con,$sql);
	  	redirect('manage_cases.php');
	}
}
?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
			<h3 class="card-title ml10"><strong>REPORT</strong>&nbsp;<small>Form</small></h3>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">User Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required value="<?php echo $name?>">
                    </div>
                   

                    <div class="form-group">
                    <label for="exampleInputName1">Category</label>
										<select name="category" class="form-control" required value="<?php echo $category?>">
											<option value="">Select Category</option>
											<?php

                      $res_category=mysqli_query($con,"select * from category where status='1' order by category asc");
											while($row_category=mysqli_fetch_assoc($res_category)){
												if($row_category['category']==$category_id){
													echo"<option value='".$row_category['category']."' selected>".$row_category['category']."</option>";
												}else{
													echo"<option value='".$row_category['category']."'>".$row_category['category']."</option>";
												}
											}
											?>
										</select>
									</div>

<!-- 
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" name="category" class="form-control" id="exampleInputName1" placeholder="category" required value="<?php echo $category?>">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputEmail3">Work</label>
                      <input type="text" name="work" class="form-control" id="exampleInputEmail3" placeholder="Work" value="<?php echo $email?>">
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
                      <label for="exampleInputDate1">Date</label>
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
                    <label for="exampleSelectGender" style="display: inline-block; width: 100px;">Statement</label>
<input type="text" name="statement" class="form-control" id="exampleInputCity1" placeholder="Statement" required value="<?php echo $statement?>" style="width: 1080px; height: 200px;"> 
</div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Report</button>
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





