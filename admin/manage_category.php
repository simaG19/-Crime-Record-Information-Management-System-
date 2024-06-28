<?php 
include('header.php');
$msg="";
$category="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from category where id='$id'"));
	$category=$row['category'];
}

if(isset($_POST['submit'])){
	$category=get_safe_value($con,$_POST['category']);
	$address=get_safe_value($con,$_POST['address']);
	
	if($id==''){
		$sql="select * from category where category='$category'";
	}else{
		$sql="select * from category where category='$category' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="category already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into category(category,status) values('$category',1)");
		}else{
			mysqli_query($con,"update category set category='$category' where id='$id'");
		}
		
		redirect('category.php');
	}
}
?>
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
			<h1 class="grid_title ml10 ml15">Manage Category</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" placeholder="category" name="category" required value="<?php echo $category?>">
					    <div class="error mt8"><?php echo $msg?></div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
    </div>
        
<?php include('footer.php');?>