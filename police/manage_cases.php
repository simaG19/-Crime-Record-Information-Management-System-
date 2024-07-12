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

if(isset($_GET['cases_details_id']) && $_GET['cases_details_id']>0){
	$cases_details_id=get_safe_value($con,$_GET['cases_details_id']);
	$id=get_safe_value($con,$_GET['id']);
	mysqli_query($con,"delete from cases_details where id='$cases_details_id'");
	redirect('manage_cases.php?id='.$id);
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
		$user_id=$_SESSION['POLICE_ID'];
		$sql="select * from cases where user_id='$user_id' and accuser='$accuser' and defendent='$defendent'";
	}else{
		$user_id=$_SESSION['POLICE_ID'];
		$sql="select * from cases where user_id='$user_id' and accuser='$accuser' and defendent='$defendent' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Case already added";	
	}else{
		$type=$_FILES['image']['type'];
		if($id==''){
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format";
			}else{
				$user_id=$_SESSION['POLICE_ID'];
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],CASE_IMAGE_SERVER_PATH.$image);
				mysqli_query($con,"insert into cases(user_id,category_id,accuser,agender,adob,aaddress,aphone,awork,pstatement,defendent,dgender,ddob,dmother,dfather,dwork,dfamily,daddress,dphone,dstatement,cine,accusation,imprisioned,arn,status,added_on,image,casetype) values('$user_id','$category_id','$accuser','$agender','$adob','$aaddress','$aphone','$awork','$pstatement','$defendent','$dgender','$ddob','$dmother','$dfather','$dwork','$dfamily','$daddress','$dphone','$dstatement','$cine','$accusation','$imprisioned','$arn',1,'$added_on','$image',0)");
				$did=mysqli_insert_id($con);
				
				$witnessArr=$_POST['witness'];
				$statementArr=$_POST['statement'];
				
				foreach($witnessArr as $key=>$val){
					$witness=$val;
					$statement=$statementArr[$key];
					mysqli_query($con,"insert into cases_details(cases_id,witness,statement,status,added_on) values('$did','$witness','$statement',1,'$added_on')");
					//echo "insert into dish_details(cases_id,witness,statement,status,added_on) values('$did','$witness','$statement',1,'$added_on')";
				}
				
				redirect('case.php');
			}
		}else{
			$image_condition='';
			if($_FILES['image']['name']!=''){
				if($type!='image/jpg' && $type!='image/png'){
					$image_error="Invalid image format";
				}else{
					$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],CASE_IMAGE_SERVER_PATH.$image);
					$image_condition=", image='$image'";
					
					$oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from case where id='$id'"));
					$oldImage=$oldImageRow['image'];
					unlink($SERVER_DISH_IMAGE.$oldImage);
		
				}
			}
			if($image_error==''){
				$user_id=$_SESSION['POLICE_ID'];
				$sql="update cases set category_id='$category_id',accuser='$accuser',agender='$agender',adob='$adob',aaddress='$aaddress',aphone='$aphone',awork='$awork',pstatement='$pstatement',defendent='$defendent',dgender='$dgender',ddob='$ddob',dmother='$dmother',dfather='$dfather',dwork='$dwork',dfamily='$dfamily',daddress='$daddress',dphone='$dphone',dstatement='$dstatement',cine='$cine',accusation='$accusation',imprisioned='$imprisioned',arn='$arn' $image_condition where id='$id' and user_id='$user_id'";
				mysqli_query($con,$sql);
				
				$witnessArr=$_POST['witness'];
				$statementArr=$_POST['statement'];
				$casesDetailsIdArr=$_POST['cases_details_id'];
				
				foreach($witnessArr as $key=>$val){
					$witness=$val;
					$statement=$statementArr[$key];
					
					if(isset($casesDetailsIdArr[$key])){
						$did=$casesDetailsIdArr[$key];
						mysqli_query($con,"update cases_details set witness='$witness',statement='$statement' where id='$did'");
					}else{
						mysqli_query($con,"insert into cases_details(cases_id,witness,statement,status,added_on) values('$id','$witness','$statement',1,'$added_on')");
					}
					
					
					//echo "insert into dish_details(cases_id,witness,statement,status,added_on) values('$did','$witness','$statement',1,'$added_on')";
				}
				redirect('case.php');
			}
		}
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
								<div class="label"><b>I.</b> <b>Accuser Information</b></div>
								<div class="content">
									<br>
									<div class="form-group">
										<label for="exampleInputName1">Crime Category *</label>
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
										<label for="exampleInputName1">Plaintiff *</label>
										<input type="text" class="form-control" placeholder="Accuser Name" name="accuser" required value="<?php echo $accuser?>">
										</div>
										<div class="form-group">
											<label for="gender" class=" form-control-label">Gender *</label>
											<select name="agender" class="form-control" required value="<?php echo $agender?>">
												<option value="">Select Gender</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Date of Birth</label>
											<input type="date" class="form-control" placeholder="Date of Birth" name="adob" value="<?php echo $adob?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Address *</label>
											<input type="text" class="form-control" placeholder="Address" name="aaddress" required value="<?php echo $aaddress?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Phone Number *</label>
											<input type="text" class="form-control" placeholder="Phone Number" name="aphone" value="<?php echo $aphone?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Work</label>
											<input type="text" class="form-control" placeholder="Work" name="awork" value="<?php echo $awork?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Plaintiff's statement *</label>
											<textarea class="form-control" placeholder="Plaintiff's statement" name="pstatement" id="" cols="30" rows="10" required ><?php echo $pstatement?></textarea>
										</div>

								</div>
							</div>
                            <!--- 2 --->
							<div class="contentBx">
								<div class="label"><b>II.</b> <b>Defendent Information</b> </div>
								<div class="content">
									<br>
										<div class="form-group">
											<label for="exampleInputName1">Defendent *</label>
											<input type="text" class="form-control" placeholder="Accused Name" name="defendent" required value="<?php echo $defendent?>">
											<div class="error mt8"><?php echo $msg?></div>
										</div>

										

										<div class="form-group">
											<label for="gender" class=" form-control-label">Gender *</label>
											<select name="dgender" class="form-control" required value="<?php echo $dgender?>">
												<option value="">Select Gender</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Date of Birth</label>
											<input type="date" class="form-control" placeholder="Date of Birth" name="ddob" value="<?php echo $ddob?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Mother Name</label>
											<input type="text" class="form-control" placeholder="Accused Mother Name" name="dmother" value="<?php echo $dmother?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Father Name</label>
											<input type="text" class="form-control" placeholder="Accused Father Name" name="dfather" value="<?php echo $dfather?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Family Status</label>
											<input type="text" class="form-control" placeholder="Family Status" name="dfamily" value="<?php echo $dfamily?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Address</label>
											<input type="text" class="form-control" placeholder="Address" name="daddress" value="<?php echo $daddress?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Phone</label>
											<input type="text" class="form-control" placeholder="Phone" name="dphone" value="<?php echo $dphone?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Work</label>
											<input type="text" class="form-control" placeholder="Work" name="dwork" value="<?php echo $dwork?>">
										</div>

										<div class="form-group">
											<label for="exampleInputName1">Defendent's statement</label>
											<textarea class="form-control" placeholder="Defendent's statement" name="dstatement" id="" cols="30" rows="10"><?php echo $dstatement?></textarea>
										</div>
								</div>
							</div>
                            <!--- 3 --->
							<div class="contentBx">
								<div class="label"><b>III.</b> <b>Case Information</b> </div>
								<div class="content">
								<br>
									<div class="form-group">
										<label for="exampleInputName1">Crime Cine *</label>
										<input type="text" class="form-control" placeholder="Crime Cine" name="cine" required value="<?php echo $cine?>">
									</div>

									<div class="form-group">
										<label for="exampleInputName1">Accusation Date *</label>
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

									<div class="form-group">
										<input type="hidden" name="casetype" value="0">
									</div>

									<div class="form-group" id="dish_box1">
                                        <label for="exampleInputEmail3"><b>Witness Form</b></label>
                                        <?php if(true){?>
                                            <div class="row">
                                                <div class="col-5">
                                                    <input type="text" class="form-control" placeholder="Witness Name" name="witness[]" required>
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" class="form-control" placeholder="Statement" name="statement[]" required>
                                                </div>
                                                
                                            </div>
                                        <?php } else{
                                            $cases_details_res=mysqli_query($con,"select * from cases_details where cases_id='$id'");
                                            $ii=1;
                                            while($cases_details_row=mysqli_fetch_assoc($cases_details_res)){
                                            ?>
                                            <div class="row mt8">
                                                <div class="col-5">
                                                    <input type="hidden" name="cases_details_id[]" value="<?php echo $cases_details_row['id']?>">
                                                    <input type="text" class="form-control" placeholder="Witness Name" name="witness[]" required value="<?php echo $cases_details_row['witness']?>">
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" class="form-control" placeholder="Statement" name="statement[]" required  value="<?php echo $cases_details_row['statement']?>">
                                                </div>
                                                <?php if($ii!=1){
                                                ?>
                                                <div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick="remove_more_new('<?php echo $cases_details_row['id']?>')">Remove</button></div>
                                                
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        <?php 
                                        $ii++;
                                        } } ?>
                                        
                                    </div>
                                    <div>
                                        <button type="button" class="btn badge-danger mr-2" onclick="add_more()">Add Witness</button>
                                    </div>
                            </div>
					</div>
                    	
                    <button type="submit" class="btn btn-primary mr-2 mt8" name="submit">Submit</button>
                    <div class="error mt8"><?php echo $msg?></div>
					
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
         <style>
			 .mt8{
				 margin-top:8px;
			 }
             .error{
                 color:red;
             }
		 </style>
		 <input type="hidden" id="add_more" value="1"/>
        <script>
            const accordion = document.getElementsByClassName('contentBx');
			for(i=0; i<accordion.length; i++){
				accordion[i].addEventListener('click',function(){
					this.classList.toggle('active')
				})
			}
		function add_more(){
			var add_more=jQuery('#add_more').val();
			add_more++;
			jQuery('#add_more').val(add_more);
			var html='<div class="row mt8" id="box'+add_more+'"><div class="col-5"><input type="text" class="form-control" placeholder="witness" name="witness[]" required></div><div class="col-5"><input type="text" class="form-control" placeholder="statement" name="statement[]" required></div><div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
			jQuery('#dish_box1').append(html);
		}
		
		function remove_more(id){
			jQuery('#box'+id).remove();
		}
		
		function remove_more_new(id){
			var result=confirm('Are you sure?');
			if(result==true){
				var cur_path=window.location.href;
				window.location.href=cur_path+"&cases_details_id="+id;
			}
		}	
		</script>
<?php include('footer.php');?>