<?php 
include('header.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
  $sql="SELECT  * FROM report  WHERE id=  '$id' ";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0){
    $courtRow=mysqli_fetch_assoc($res);
  }else{
    redirect('index.php');
  }
}else{
  redirect('index.php');
}

$police=$_SESSION['POLICE_USER'];
if(isset($_POST['submit'])){
    $state=get_safe_value($con,$_POST['case_state']);
    mysqli_query($con,"update report set case_state='1' ,police='$police'where id='$id'");
	$arr=array('case taken');
    redirect('index.php');
}
?>
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
              <h3 class="page-title"> Case Details </h3>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card px-2">
                  <div class="card-body">
                    <div class="container-fluid">
                      <img src="assets/images/police.jpg" alt="logo" style="width: 100px;height: 100px;"/>
                      <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['id']?></h3>
                      <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 pl-0">
                        <p class="mt-5 mb-2"><b>Plaintiff: <i><?php echo $courtRow['name']?></i></b></p>
                        <p >Gender : <i><?php echo $courtRow['gender']?></i></p>
                        <p >Age : <i>
                          <?php
                            $dateOfBirth = $courtRow['dob'];
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dateOfBirth), date_create($today));
                            echo $diff->format('%y');
                          ?>
                        </i></p>
                        <p >Phone : <i><?php echo $courtRow['phone']?></i></p>
                        <p >Address : <i><?php echo $courtRow['address']?></i></p>
                        <p >Work : <i><?php echo $courtRow['work']?></i></p>
                      </div>
                      <div class="container-fluid d-flex justify-content-between">
                      
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                        <h5>statement</h5>
                        <p><?php echo $courtRow['statement']?></p><br>
                        
                      </div>
                    </div>
                    <div class="container-fluid w-100">
                    <form class="pt-3" method="post">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Take Case" name="submit">
                    </form>
                    </div>
                    </div>
                  </div>
                </div>
              </div>  
<?php include('footer.php');?>