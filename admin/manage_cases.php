<?php 
include('header.php');
$msg="";
$category_id="";
$accuser="";
$image="";
$agender="";
$adob="";
$aaddress="";
$aphone="";
$awork="";
$pstatement="";
$defendent="";
$dgender="";
$ddob="";
$dmother="";
$dfather="";
$dwork="";
$dfamily="";
$daddress="";
$dphone="";
$cine="";
$accusation="";
$imprisioned="";
$arn="";
$dstatement="";

$image_status='required';
$image_error="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from cases where id='$id'"));
	$category_id=$row['category_id'];
	$accuser=$row['accuser'];
	$agender=$row['agender'];
	$adob=$row['adob'];
	$aaddress=$row['aaddress'];
	$aphone=$row['aphone'];
	$awork=$row['awork'];
	$pstatement=$row['pstatement'];
	$defendent=$row['defendent'];
	$dgender=$row['dgender'];
	$ddob=$row['ddob'];
	$dmother=$row['dmother'];
	$dfather=$row['dfather'];
	$dwork=$row['dwork'];
	$dfamily=$row['dfamily'];
	$daddress=$row['daddress'];
	$dphone=$row['dphone'];
	$cine=$row['cine'];
	$accusation=$row['accusation'];
	$imprisioned=$row['imprisioned'];
	$arn=$row['arn'];
	$dstatement=$row['dstatement'];
	$image=$row['image'];
	$image_status='';
}

if(isset($_POST['submit'])){
	$category_id=get_safe_value($con,$_POST['category_id']);
	$accuser=get_safe_value($con,$_POST['accuser']);
	$agender=get_safe_value($con,$_POST['agender']);
	$adob=get_safe_value($con,$_POST['adob']);
	$aaddress=get_safe_value($con,$_POST['aaddress']);
	$aphone=get_safe_value($con,$_POST['aphone']);
	$awork=get_safe_value($con,$_POST['awork']);
	$pstatement=get_safe_value($con,$_POST['pstatement']);
	$defendent=get_safe_value($con,$_POST['defendent']);
	$dgender=get_safe_value($con,$_POST['dgender']);
	$ddob=get_safe_value($con,$_POST['ddob']);
	$dmother=get_safe_value($con,$_POST['dmother']);
	$dfather=get_safe_value($con,$_POST['dfather']);
	$dwork=get_safe_value($con,$_POST['dwork']);
	$dfamily=get_safe_value($con,$_POST['dfamily']);
	$daddress=get_safe_value($con,$_POST['daddress']);
	$dphone=get_safe_value($con,$_POST['dphone']);
	$cine=get_safe_value($con,$_POST['cine']);
	$accusation=get_safe_value($con,$_POST['accusation']);
	$imprisioned=get_safe_value($con,$_POST['imprisioned']);
	$arn=get_safe_value($con,$_POST['arn']);
	$dstatement=get_safe_value($con,$_POST['dstatement']);
	
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from cases where accuser='$accuser'";
	}else{
		$sql="select * from cases where accuser='$accuser' and id!='$id'";
	}
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Case already added";	
	}else{
		if($id==''){
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],CASE_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into cases(category_id,accuser,agender,adob,aaddress,aphone,awork,pstatement,defendent,dgender,ddob,dmother,dfather,dwork,dfamily,daddress,dphone,dstatement,cine,accusation,imprisioned,arn,status,added_on,image) values('$category_id','$accuser','$agender','$adob','$aaddress','$aphone','$awork','$pstatement','$defendent','$dgender','$ddob','$dmother','$dfather','$dwork','$dfamily','$daddress','$dphone','$dstatement','$cine','$accusation','$imprisioned','$arn',1,'$added_on','$image')");
		}else{
			$image_condition='';
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],CASE_IMAGE_SERVER_PATH.$image);
				$image_condition=" image='$image'";
			}
			$sql="update cases set category_id='$category_id',accuser='$accuser',agender='$agender',adob='$adob',aaddress='$aaddress',aphone='$aphone',awork='$awork',pstatement='$pstatement',defendent='$defendent',dgender='$dgender',ddob='$ddob',dmother='$dmother',dfather='$dfather',dwork='$dwork',dfamily='$dfamily',daddress='$daddress',dphone='$dphone',dstatement='$dstatement',cine='$cine',accusation='$accusation',imprisioned='$imprisioned',arn='$arn' $image_condition where id='$id'";
			mysqli_query($con,$sql);
		}
		
		redirect('case.php');
	}
}
$res_category=mysqli_query($con,"select * from category where status='1' order by category asc");
?>
<div class="main-panel">
  <div class="content-wrapper">
	<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Case</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
					  <div class="accordion">
					  		<!--- 1 ---> 
							<div class="contentBx">
								<div class="label">Accuser information</div>
								<div class="content">
									<br>
									<div class="form-group">
										<label for="exampleInputName1">Crime Category</label>
										<select name="category_id" class="form-control" required value="<?php echo $category?>">
											<option value="">Select Category</option>
											<?php
											while($row_category=mysqli_fetch_assoc($res_category)){
												if($row_category['id']==$category_id){
													echo"<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
												}else{
													echo"<option value='".$row_category['id']."'>".$row_category['category']."</option>";
												}
											}
											?>
										</select>
									</div>

										<div class="form-group">
										<label for="exampleInputName1">Plaintiff</label>
										<input type="text" class="form-control" placeholder="Accuser Name" name="accuser" required value="<?php echo $accuser?>">
										</div>
										<div class="form-group">
											<label for="gender" class=" form-control-label">Gender</label>
											<select name="agender" class="form-control" required value="<?php echo $agender?>">
												<option value="">Select Gender</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Date of Birth</label>
											<input type="date" class="form-control" placeholder="Date of Birth" name="adob" required value="<?php echo $adob?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Address</label>
											<input type="text" class="form-control" placeholder="Address" name="aaddress" required value="<?php echo $aaddress?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Phone Number</label>
											<input type="text" class="form-control" placeholder="Phone Number" name="aphone" required value="<?php echo $aphone?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Work</label>
											<input type="text" class="form-control" placeholder="Work" name="awork" required value="<?php echo $awork?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Plaintiff's statement</label>
											<textarea class="form-control" placeholder="Plaintiff's statement" name="pstatement" id="" cols="30" rows="10" required value="<?php echo $pstatement?>"></textarea>
										</div>

								</div>
							</div>
							<!--- 2 --->
							<div class="contentBx">
								<div class="label">Defendent information</div>
								<div class="content">
									<br>
										<div class="form-group">
											<label for="exampleInputName1">Defendent</label>
											<input type="text" class="form-control" placeholder="Accused Name" name="defendent" required value="<?php echo $defendent?>">
											<div class="error mt8"><?php echo $msg?></div>
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Image</label>
											<input type="file" class="form-control" placeholder="Defendent Image" name="image" <?php echo $image_status?>>
										</div>

										<div class="form-group">
											<label for="gender" class=" form-control-label">Gender</label>
											<select name="dgender" class="form-control" required value="<?php echo $dgender?>">
												<option value="">Select Gender</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Date of Birth</label>
											<input type="date" class="form-control" placeholder="Date of Birth" name="ddob" required value="<?php echo $ddob?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Mother Name</label>
											<input type="text" class="form-control" placeholder="Accused Mother Name" name="dmother" required value="<?php echo $dmother?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Father Name</label>
											<input type="text" class="form-control" placeholder="Accused Father Name" name="dfather" required value="<?php echo $dfather?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Family Status</label>
											<input type="text" class="form-control" placeholder="Family Status" name="dfamily" required value="<?php echo $dfamily?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Address</label>
											<input type="text" class="form-control" placeholder="Address" name="daddress" required value="<?php echo $daddress?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Phone</label>
											<input type="text" class="form-control" placeholder="Phone" name="dphone" required value="<?php echo $dphone?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Work</label>
											<input type="text" class="form-control" placeholder="Work" name="dwork" required value="<?php echo $dwork?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Defendent's statement</label>
											<textarea class="form-control" placeholder="Defendent's statement" name="dstatement" id="" cols="30" rows="10" required value="<?php echo $dstatement?>"></textarea>
										</div>
								</div>
							</div>

							<!--- 3 --->
							<div class="contentBx">
								<div class="label">Case information</div>
								<div class="content">
								<br>
									<div class="form-group">
										<label for="exampleInputName1">Crime Cine</label>
										<input type="text" class="form-control" placeholder="Crime Cine" name="cine" required value="<?php echo $cine?>">
									</div>

									<div class="form-group">
										<label for="exampleInputName1">Accusation Date</label>
										<input type="datetime-local" class="form-control" placeholder="Accusation Date" name="accusation" required value="<?php echo $accusation?>">
									</div>

									<div class="form-group">
										<label for="exampleInputName1">Imprisioned Date</label>
										<input type="datetime-local" class="form-control" placeholder="Imprisioned Date" name="imprisioned" value="<?php echo $imprisioned?>">
									</div>

									<div class="form-group">
										<label for="exampleInputName1">Arrested Register Number</label>
										<input type="text" class="form-control" placeholder="Arrested Register Number" name="arn" value="<?php echo $arn?>">
									</div>
										<button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
								</div>
							</div>
						</div>
						
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
		<script>
			const accordion = document.getElementsByClassName('contentBx');
			for(i=0; i<accordion.length; i++){
				accordion[i].addEventListener('click',function(){
					this.classList.toggle('active')
				})
			}
		</script>
<?php include('footer.php');?>